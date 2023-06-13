<?php

namespace App\Controllers;
use App\Models\Bts_model;

class Home extends BaseController
{
    public function index()
    {
        $bts = new Bts_model();
        $data = [
            "judul" => "Dashboard",
            // "bts" => $bts->getData(),
        ];
        return view('pages/index', $data);
    }
}
