<?php

namespace App\Controllers;

// use App\Models\obat_masukModel;

class laporan_stok extends BaseController
{
    public function view_lap_stok()
    {
        $db = \Config\Database::connect();
        $stok = $db->query("SELECT kode_obat, nama_obat, stok, satuan, DATE_FORMAT(expired, '%d-%m-%Y') AS expired  FROM `is_obat`")->getResultArray();
        $data = [
            'title' => 'Laporan stok obat',
            'stok' => $stok

        ];

        return view('lap_stok/view', $data);
    }
}
