<?php

namespace App\Models;

use CodeIgniter\Model;

class Users_model extends Model {
    protected $uuidFields = ['id_user'];
    protected $table      = 'users';
    protected $primaryKey = 'id_user';
    protected $useSoftDeletes = false;
    protected $useTimestamps = false;
 
    protected $allowedFields = ['id_user','email','password','nama','id_level'];

    protected $validationRules    = [
        'email'     => 'required|min_length[3]',
        'password'        => 'required|min_length[3]',
        'nama'        => 'required|min_length[3]',
        'id_level'        => 'required',
    ];

    protected $validationMessages = [
        'email'        => [
            'required' => 'Email harus diisi!',
            'min_length' => 'Minimal 3 Karakter'
        ],
        'password'        => [
            'required' => 'Password harus diisi!',
            'min_length' => 'Minimal 3 Karakter'
        ],
        'nama'        => [
            'required' => 'Nama harus diisi!',
            'min_length' => 'Minimal 3 Karakter'
        ],
        'id_level'        => [
            'required' => 'Level harus dipilih!'
        ]
    ];

    protected $skipValidation  = false;
}