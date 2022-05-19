<?php

namespace App\Controllers;


class laporan_keluar extends BaseController
{
    public function view_lap_keluar()
    {
        session()->remove('awal2');
        session()->remove('akhir2');
        $db = \Config\Database::connect();
        $lapkeluar = $db->query("SELECT 
        `obat_keluar`.`kd_obat_keluar`,`is_obat`.`kode_obat`,`satuan`,`kode_detail`,
        DATE_FORMAT(`obat_keluar`.`tanggal_keluar`, '%d-%m-%Y') AS tanggal_keluar,`nama_obat`,`username`,`jumlah_keluar`
        FROM `detail_obat_keluar` 
        JOIN `is_obat` ON `is_obat`.`kode_obat`=`detail_obat_keluar`.`kode_obat`
        JOIN `obat_keluar` ON `obat_keluar`.`kd_obat_keluar`=`detail_obat_keluar`.`kd_obat_keluar`
        JOIN `is_users` ON `is_users`.`id_user`=`obat_keluar`.`id_user`")->getResultArray();

        $data = [
            'title' => 'Laporan obat keluar',
            'lapkeluar' => $lapkeluar

        ];

        return view('lapobat_keluar/view', $data);
    }

    public function lihat_lap_keluar()
    {

        $awal = $this->request->getPost('awal');
        $akhir = $this->request->getPost('akhir');
        session()->set('awal2', $awal);
        session()->set('akhir2', $akhir);
        if ($awal > $akhir) {
            session()->setFlashdata('error', 'Tanggal awal lebih besar dari tanggal akhir');
            return redirect()->to('/lap_obkeluar/view');
        } else {


            $db = \Config\Database::connect();
            $lapkeluar = $db->query("SELECT 
            `obat_keluar`.`kd_obat_keluar`,`is_obat`.`kode_obat`,`satuan`,`kode_detail`,
            DATE_FORMAT(`obat_keluar`.`tanggal_keluar`, '%d-%m-%Y') AS tanggal_keluar,`nama_obat`,`username`,`jumlah_keluar`
            FROM `detail_obat_keluar` 
            JOIN `is_obat` ON `is_obat`.`kode_obat`=`detail_obat_keluar`.`kode_obat`
            JOIN `obat_keluar` ON `obat_keluar`.`kd_obat_keluar`=`detail_obat_keluar`.`kd_obat_keluar`
            JOIN `is_users` ON `is_users`.`id_user`=`obat_keluar`.`id_user` WHERE `tanggal_keluar` BETWEEN '$awal' and '$akhir' order by `tanggal_keluar` asc ")->getResultArray();

            $data = [
                'title' => 'Laporan obat keluar',
                'lapkeluar' => $lapkeluar

            ];

            return view('/lapobat_keluar/view', $data);
        }
    }
}
