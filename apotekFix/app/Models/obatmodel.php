<?php

namespace App\Models;

use CodeIgniter\Model;

class obatmodel extends Model
{
    protected $obat = 'is_obat';

    public function update_exp_obat($x, $kd)
    {
        return $this->db->table('is_obat')
            ->update(['expired' => $x], ['kode_obat' => $kd]);
    }

    public function tampil_obat()
    {
        return $this->db->table($this->obat)
            ->select('*')
            ->get()->getResultArray();
    }

    public function go_ubahobat($kode_obat)
    {
        return $this->db->table($this->obat)
            ->select('*')
            ->where(['kode_obat' => $kode_obat])
            ->get()->getResultArray();
    }

    public function ubah_obat($data, $k_obat)
    {
        return $this->db->table($this->obat)
            ->update($data, ['kode_obat' => $k_obat]);
    }

    public function simpan_obat($data)
    {
        return $this->db->table($this->obat)
            ->insert($data);
    }

    public function hapus_obat($kode_obat)
    {
        return $this->db->table($this->obat)
            ->delete(['kode_obat' => $kode_obat]);
    }
}
