<?php

namespace App\Controllers;

// use App\Models\obat_masukModel;

class ob_masuk extends BaseController
{
    // protected $obat_masuk;
    // public function __construct()
    // {
    //     $this->obat_masukModel = new obat_masukModel();
    // }

    // menamplkan data obat masuk
    public function view_ob_masuk()
    {
        $db = \Config\Database::connect();
        $query = $db->query(" SELECT kd_obat_masuk, DATE_FORMAT(`tanggal_masuk`, '%d-%m-%Y') AS `tanggal_masuk`, `faktur`, `username`, `nama_supplier` FROM `is_users` 
        JOIN `obat_masuk` ON `is_users`.`id_user`=`obat_masuk`.`id_user` 
        JOIN `supplier` ON `obat_masuk`.`id_supplier`=`supplier`.`id_supplier`")->getResultArray();

        //delet dump obat masuk
        $query2 = $db->query("DELETE FROM `dump_obmasuk`");


        $data = [
            'title' => 'Data Obat Masuk',
            'obatmasuk' => $query

        ];

        return view('obat_masuk/view', $data);
    }

    public function input_ob_masuk()
    {

        // $dbb = \Config\Database::connect();
        // $jml_data_dump = $dbb->query("SELECT * FROM `obat_masuk`");
        // $total->$this->mysqli_num_row($jml_data_dump);

        //MEMBUAT KODE TRANSAKSI
        // AWAL
        date_default_timezone_set("Asia/Jakarta");
        $date = date("Y-m-d");

        //mengambil kode transaksi dengan kode paling besar
        $db = \Config\Database::connect();
        $qq1 = $db->query("SELECT MAX(SUBSTRING(kd_obat_masuk, 11)) AS maxKode FROM obat_masuk")->getResultArray();
        foreach ($qq1 as $aaa) {
            $bbb = $aaa['maxKode'];
        }

        // $noOrder = $bbb;
        // $noUrut = (int) substr($noOrder, 10, 6);


        $noUrut = $bbb;
        $noUrut++;
        $char = "TM";
        // 2020-10-17 = 10 karakter
        //setelah karakter ke 2 ambil 2 karakter
        $tahun = substr($date, 2, 2);
        //setelah karakter ke 5 ambil 2 karakter
        $bulan = substr($date, 5, 2);
        //setelah karakter ke 8 ambil 2 karakter
        $tgl = substr($date, 8, 2);
        $kdtrans = $char . "-" . $tgl . $bulan . $tahun . "-" . sprintf("%06s", $noUrut);
        // AKHIR

        //MEMBUAT KODE DETAIL TRANSAKSI
        // AWAL
        date_default_timezone_set("Asia/Jakarta");
        $date = date("Y-m-d");

        //mengambil kode transaksi dengan kode paling besar

        $db = \Config\Database::connect();
        $qq2 = $db->query("SELECT max(kd_obat_masuk) as maxKode FROM obat_masuk")->getResultArray();
        foreach ($qq2 as $ddd) {
            $eee = $ddd['maxKode'];
        }

        $noOrder = $eee;
        $noUrut = (int) substr($noOrder, 10, 0);
        $noUrut;
        $char = "DM";
        // 2020-10-17 = 10 karakter
        //setelah karakter ke 2 ambil 2 karakter
        $tahun = substr($date, 2, 2);
        //setelah karakter ke 5 ambil 2 karakter
        $bulan = substr($date, 5, 2);
        //setelah karakter ke 8 ambil 2 karakter
        $tgl = substr($date, 8, 2);
        $kddet = $char . "-" . $tgl . $bulan . $tahun . "-" . sprintf("", $noUrut);
        // AKHIR

        $user = $db->query("SELECT * FROM is_users")->getResultArray();
        //MENAMPILKAN DATA SUPPLIER PADA DROPDOWN
        $supplier = $db->query("SELECT * FROM supplier")->getResultArray();

        //MENAMPILKAN DATA OBAT PADA DROPDOWN
        $obat = $db->query("SELECT * FROM is_obat")->getResultArray();

        //MENAMPILKAN DATA DUMP OBAT MASUK
        $db = \Config\Database::connect();
        $query = $db->query("SELECT `kode_detail`,`kd_obat_masuk`,`dump_obmasuk`.`kode_obat`,`jumlah_masuk`,`dump_obmasuk`.`expired`,`nama_obat` FROM dump_obmasuk JOIN is_obat ON dump_obmasuk.kode_obat=is_obat.kode_obat")->getResultArray();

        $data = [
            'title' => 'Data Obat Masuk',
            // 'kdtransaksi' => $kd_transaksi,
            // 'kddetail' => $kd_detail,
            'supplier' => $supplier,
            'user' => $user,
            'obat' => $obat,
            'validation' => \Config\Services::validation(),
            'viewdump' => $query,
            'kdtrans' => $kdtrans,
            'kddet' => $kddet
        ];
        return view('obat_masuk/input', $data);
    }

    public function tambahdump()
    {
        if (!$this->validate([
            'kode_obat2' => [
                'rules' => 'is_unique[dump_obmasuk.kode_obat]',
                'errors' => [
                    'is_unique' => 'Kode obat sudah ada'
                ]
            ]


        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('error', $validation->listErrors());
            return redirect()->to(base_url('/obat_masuk/input'))->withInput();
        }

        $kd_det = $this->request->getVar('kode_detail');
        $kd = $this->request->getVar('kd_trans');
        // $nm = $this->request->getVar('nm_obat');
        $kdobt = $this->request->getVar('kode_obat2');
        // $fak = $this->request->getVar('faktur');
        $jml = $this->request->getVar('jml_masuk');
        $exp = $this->request->getVar('expired');

        $db = \Config\Database::connect();
        $query = $db->query("INSERT INTO dump_obmasuk values('$kd_det','$kd','$kdobt','$jml','$exp')");

        //menampilkan data berhasil disimpan
        session()->setFlashdata('pesan', 'Data Berhasil Ditambah.');
        return redirect()->to(base_url('/obat_masuk/input'));
    }

    //delet dump obat masuk
    public function delete($kode_detail)
    {
        $db = \Config\Database::connect();
        $db->query("DELETE FROM dump_obmasuk where kode_detail = '$kode_detail'");

        // dd($kode_obat);
        //menampilkan data berhasil disimpan
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        //kembali ke data obat view  
        return redirect()->to(base_url('/obat_masuk/input'));
    }

    public function simpan2()
    {

        $db = \Config\Database::connect();
        $g =  $db->query("SELECT COUNT('kode_detail') as kd_det FROM dump_obmasuk")->getResultArray();
        foreach ($g as $t) {
            $hasil = $t['kd_det'];
        }
        if ($hasil < 1) {
            //menampilkan data berhasil disimpan
            session()->setFlashdata('eror', 'Data masih kosong');
            return redirect()->to(base_url('/obat_masuk/input'));
        } else {


            // dd($this->request->getVar());
            $kode = $this->request->getVar('kd_trans');
            $user = $this->request->getVar('id_user');
            $supplier = $this->request->getVar('id_supplier');
            $tanggal = $this->request->getVar('tgl1');
            $faktur = $this->request->getVar('faktur');

            $db = \Config\Database::connect();
            // echo $user . "-" . $kode . "-" . $tanggal;

            $query = $db->query(
                "INSERT INTO obat_masuk VALUES ('$kode','$tanggal','$user','$supplier','$faktur');"
            );



            //query update stok
            //ambil semua data dr dump obmasuk
            $querydumpdet = $db->query("SELECT * FROM dump_obmasuk")->getResultArray();
            foreach ($querydumpdet as $a) {
                // ambil kode obat dan jumlah masuknya
                $kd_obat = $a['kode_obat'];
                $jml_mas = $a['jumlah_masuk'];

                //ambil data obat berdasarkan kode obat di atas
                $cekobat = $db->query("SELECT * FROM is_obat where kode_obat='$kd_obat'")->getResultArray();
                foreach ($cekobat as $b) {
                    //ambil data stok nya
                    $stok = $b['stok'];
                }
                //menjumlah obat masuk dengan stok saat ini
                $stokupdate = $jml_mas + $stok;
                //update stok obat berdasarkan kode obat diatas
                $queryupdatestok = $db->query("UPDATE is_obat SET stok='$stokupdate' WHERE kode_obat='$kd_obat'");
            }

            // update dt tgl expired
            $ambil_dump = $db->query("SELECT `kode_obat` as kd, MIN(`expired`) as xp FROM `dump_obmasuk` WHERE `expired` >= 'NOW' GROUP BY `kode_obat`")->getResultArray();
            // dd($ambil_dump);
            foreach ($ambil_dump as $aa) {
                $bb = $aa['kd'];
                $cc = $aa['xp'];

                $ambil_isobat = $db->query("SELECT * FROM is_obat WHERE kode_obat = '$bb'")->getResultArray();
                foreach ($ambil_isobat as $xx) {
                    $yy = $xx['expired'];

                    if (($yy < $cc) || ($yy > $cc)) {

                        $update1 = $db->query("UPDATE is_obat SET expired = '$cc' WHERE kode_obat='$bb'");
                        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
                        // return redirect()->to(base_url('/obat_masuk/view'));
                    } else {

                        session()->setFlashdata('pesan', 'Data Gagal Ditambahkan');
                        // return redirect()->to(base_url('/obat_masuk/view'));
                    }
                }
            }
            //menyalin data dr dump obat ke detail oabat masuk
            $query2 = $db->query(
                "INSERT INTO detail_obat_masuk select * from `dump_obmasuk`"
            );
            return redirect()->to(base_url('/obat_masuk/view'));
        }
    }

    //menghapus 2 tabel pada view obat masuk
    public function hapus_ob_masuk($kode_obat_masuk)
    {
        $db = \Config\Database::connect();
        $query2 = $db->query(
            "DELETE FROM detail_obat_masuk WHERE kd_obat_masuk = '$kode_obat_masuk'"
        );
        $query3 = $db->query(
            "DELETE FROM obat_masuk WHERE kd_obat_masuk = '$kode_obat_masuk'"
        );
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/obat_masuk/view'));
    }


    public function detail_ob_masuk($kode_obat_masuk)
    {
        $db = \Config\Database::connect();
        $query2 = $db->query(
            "SELECT `kode_detail`,`kd_obat_masuk`,`detail_obat_masuk`.`kode_obat`,`jumlah_masuk`,DATE_FORMAT(detail_obat_masuk.expired, '%d-%m-%Y') AS expired,`nama_obat` FROM detail_obat_masuk JOIN is_obat ON detail_obat_masuk.kode_obat=is_obat.kode_obat WHERE `kd_obat_masuk` = '$kode_obat_masuk'"
        )->getResultArray();
        $data = [
            'title' => 'Detail Obat Masuk',
            'detailobatmasuk' => $query2

        ];
        return view('obat_masuk/detail', $data);
    }
}
