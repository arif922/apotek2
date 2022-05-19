<?php

namespace App\Models;

use CodeIgniter\Model;


class model_auth extends Model
{

    public function save_register($data)
    {
        $this->db->table('is_users')->insert($data);
    }

    // public function login($username, $password)
    // {
    //     return $this->db->table('is_users')->where([
    //         'username' => $username,
    //         'password' => $password,

    //     ])->get()->getRowArray();
    // }

    public function login($email, $password)
    {
        return $this->db->table('is_users')
            ->where([
                'email' => $email,
                'password' => $password,

            ])->get()->getRowArray();
    }
    // public function usernamee($username)
    // {
    //     return $this->db->table('is_users')->where([
    //         'username' => $username
    //     ])->get()->getRowArray();
    // }
    public function emaill($email)
    {
        return $this->db->table('is_users')->where([
            'email' => $email
        ])->get()->getRowArray();
    }
}
