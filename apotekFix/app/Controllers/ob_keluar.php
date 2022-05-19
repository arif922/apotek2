<?php

namespace App\Controllers;

class ob_keluar extends BaseController
{
    public function view()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT `kd_obat_keluar`,DATE_FORMAT(tanggal_keluar, '%d-%m-%Y') AS tanggal_keluar,`obat_keluar`.`id_user`,`username` FROM `obat_keluar` JOIN `is_users` ON `obat_keluar`.`id_user`=`is_users`.`id_user`")->getResultArray();

        //delet dump obat masuk
        $query2 = $db->query("DELETE FROM `dump_obkeluar`");



        $data = [
            'title' => 'Data Obat keluar',
            'obatkeluar' => $query

        ];
        return view('obat_keluar/view', $data);
    }
    public function input_ob_keluar()
    {
        //MEMBUAT KODE TRANSAKSI oabt keluar
        // AWAL
        date_default_timezone_set("Asia/Jakarta");
        $date = date("Y-m-d");

        //mengambil kode transaksi dengan kode paling besar

        $db = \Config\Database::connect();
        $qq1 = $db->query("SELECT max(kd_obat_keluar) as maxKode FROM obat_keluar")->getResultArray();
        foreach ($qq1 as $aaa) {
            $bbb = $aaa['maxKode'];
        }

        $noOrder = $bbb;
        $noUrut = (int) substr($noOrder, 10, 6);
        $noUrut++;
        $char = "TK";
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
        $qq2 = $db->query("SELECT max(kode_detail) as maxKode FROM dump_obkeluar")->getResultArray();
        foreach ($qq2 as $aaaa) {
            $bbbb = $aaaa['maxKode'];
        }

        $noOrder = $bbbb;
        $noUrut = (int) substr($noOrder, 10, 0);
        $noUrut++;
        $char = "DK";
        // 2020-10-17 = 10 karakter
        //setelah karakter ke 2 ambil 2 karakter
        $tahun = substr($date, 2, 2);
        //setelah karakter ke 5 ambil 2 karakter
        $bulan = substr($date, 5, 2);
        //setelah karakter ke 8 ambil 2 karakter
        $tgl = substr($date, 8, 2);
        $kddet = $char . "-" . $tgl . $bulan . $tahun . "-" . sprintf("", $noUrut);
        // AKHIR

        //MENAMPILKAN DATA USER PADA DROPDOWN
        $user = $db->query("SELECT * FROM is_users")->getResultArray();
        //MENAMPILKAN DATA SUPPLIER PADA DROPDOWN
        $supplier = $db->query("SELECT * FROM supplier")->getResultArray();

        //MENAMPILKAN DATA OBAT PADA DROPDOWN dengan jumlah stok lbih dr 0
        $obat = $db->query("SELECT * FROM is_obat where stok > 0")->getResultArray();


        //MENAMPILKAN DATA DUMP OBAT keluar
        $db = \Config\Database::connect();
        $query = $db->query("SELECT `kode_detail`,`kd_obat_keluar`,`dump_obkeluar`.`kode_obat`,`jumlah_keluar`,`nama_obat`,`satuan` FROM `dump_obkeluar` JOIN `is_obat` ON `dump_obkeluar`.`kode_obat`=`is_obat`.`kode_obat`")->getResultArray();

        $data = [
            'title' => 'Data Obat keluar',
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
        return view('obat_keluar/input', $data);
    }


    public function tambahdump()
    {

        if (!$this->validate([
            'kode_obat' => [
                'rules' => 'is_unique[dump_obkeluar.kode_obat]',
                'errors' => [
                    'is_unique' => 'Kode obat sudah ada'
                ]
            ]


        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('gagal', $validation->listErrors());
            return redirect()->to(base_url('/obat_keluar/input'));
        }

        $kd_det = $this->request->getVar('kode_detail');
        $kd = $this->request->getVar('kd_trans');
        // $nm = $this->request->getVar('nm_obat');
        $kdobt = $this->request->getVar('kode_obat');
        $jml = $this->request->getVar('jml_keluar');

        //cek apakah jml keluar melebihi jml stok obat 
        $db = \Config\Database::connect();
        $cek = $db->query("SELECT * FROM is_obat where kode_obat='$kdobt'")->getResultArray();
        foreach ($cek as $a) {
            $jum = $a['stok'];

            if ($jum < $jml) {
                //menampilkan data berhasil disimpan
                session()->setFlashdata('eror', 'Jumlah keluar melebihi stok');
                return redirect()->to(base_url('/obat_keluar/input'));
            } else {


                $db = \Config\Database::connect();
                $query = $db->query("INSERT INTO dump_obkeluar values('$kd_det','$kd','$kdobt','$jml')");

                //menampilkan data berhasil disimpan
                session()->setFlashdata('pesan', 'Data Berhasil Ditambah.');


                return redirect()->to(base_url('/obat_keluar/input'));
            }
        }
    }

    //delet dump obat keluar
    public function delete($kode_detail)
    {
        $db = \Config\Database::connect();
        $db->query("DELETE FROM dump_obkeluar where kode_detail = '$kode_detail'");

        // dd($kode_obat);
        //menampilkan data berhasil disimpan
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        //kembali ke data obat view  
        return redirect()->to(base_url('/obat_keluar/input'));
    }

    public function simpan2()
    {
        $db = \Config\Database::connect();
        $g =  $db->query("SELECT COUNT('kode_detail') as kd_det FROM dump_obkeluar")->getResultArray();
        foreach ($g as $t) {
            $hasil = $t['kd_det'];
        }

        if ($hasil < 1) {
            //menampilkan data berhasil disimpan
            session()->setFlashdata('eror', 'Data masih kosong');
            return redirect()->to(base_url('/obat_keluar/input'));
        } else {


            // dd($this->request->getVar());
            $kode = $this->request->getVar('kd_trans');
            $tanggal = $this->request->getVar('tgl1');
            $user = $this->request->getVar('id_user');

            $db = \Config\Database::connect();
            // echo $user . "-" . $kode . "-" . $tanggal;

            $query = $db->query(
                "INSERT INTO obat_keluar VALUES ('$kode','$tanggal', '$user');"
            );
            $query2 = $db->query(
                "INSERT INTO detail_obat_keluar select * from `dump_obkeluar`"
            );

            $querydumpdet = $db->query("SELECT * FROM dump_obkeluar")->getResultArray();
            foreach ($querydumpdet as $a) {
                $kd_obat = $a['kode_obat'];
                $jml_keluar = $a['jumlah_keluar'];

                $cekobat = $db->query("SELECT * FROM is_obat where kode_obat='$kd_obat'")->getResultArray();
                foreach ($cekobat as $b) {
                    $stok = $b['stok'];
                }
                $stokupdate =  $stok - $jml_keluar;

                $queryupdatestok = $db->query("UPDATE is_obat SET stok='$stokupdate' WHERE kode_obat='$kd_obat'");
            }

            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
            return redirect()->to(base_url('/obat_keluar/view'));
        }
    }
    //menghapus 2 tabel pada view obat keluar
    public function hapus_ob_keluar($kode_obat_keluar)
    {
        $db = \Config\Database::connect();
        $query2 = $db->query(
            "DELETE FROM detail_obat_keluar WHERE kd_obat_keluar = '$kode_obat_keluar'"
        );
        $query3 = $db->query(
            "DELETE FROM obat_keluar WHERE kd_obat_keluar = '$kode_obat_keluar'"
        );
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/obat_keluar/view'));
    }

    public function detail_ob_keluar($kode_obat_keluar)
    {
        $db = \Config\Database::connect();
        $query2 = $db->query(
            "SELECT `kode_detail`,`kd_obat_keluar`,`detail_obat_keluar`.`kode_obat`,`jumlah_keluar`,`nama_obat`,`satuan` FROM `detail_obat_keluar` JOIN `is_obat` ON `detail_obat_keluar`.`kode_obat`=`is_obat`.`kode_obat` WHERE kd_obat_keluar = '$kode_obat_keluar'"
        )->getResultArray();
        $data = [
            'title' => 'Detail Obat keluar',
            'detailobatkeluar' => $query2

        ];
        return view('obat_keluar/detail', $data);
    }
}
