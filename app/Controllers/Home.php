<?php

namespace App\Controllers;

use App\Models\Bts_model;

use function PHPUnit\Framework\isNull;

class Home extends BaseController
{

    public function index()
    {
        $data = [
            "judul" => "Dashboard"
        ];
        return view('pages/index', $data);
    }

    public function bts()
    {
        helper(['session']);
        $bts = new Bts_model();
        $data = [
            "judul" => "BTS",
            "data_bts" => $bts->findAll(),
        ];
        if (isset($_POST['tambahBTN'])) {
            return view('pages/bts/tambah', $data);
        } else if(isset($_POST['updateBTN'])) {
            $dataAll = [
                "judul" => "BTS",
                "dataEdit" => $bts->find($_POST['id']),
            ];
            return view('pages/bts/update', $dataAll);
        } else if(isset($_POST['hapusBTN'])){
            $masuk = $bts->delete($_POST['id']);
            if ($masuk === false) {
                $errors = $bts->errors();
                session()->setFlashdata('error', $errors);
                return redirect()->to(base_url('index.php/bts'));
            } else {
                session()->setFlashdata('berhasil', 'Data BTS berhasil dihapus!');
                return redirect()->to(base_url('index.php/bts'));
            }
        } else {
            return view('pages/bts/index', $data);
        }
    }

    public function tambahBTS()
    {
        helper(['session']);
        $bts = new Bts_model();
        $uuid = service('uuid');
        $uuid4 = $uuid->uuid4();
        $string = $uuid4->toString();
        $namaBTS = $_POST['namaBTS'];
        $alamatBTS = $_POST['alamatBTS'];
        $masuk = $bts->insert([
            "id_bts" => $string,
            "nama_bts" => $namaBTS,
            "alamat" => $alamatBTS
        ]);
        if ($masuk === false) {
            $errors = $bts->errors();
            session()->setFlashdata('error', $errors);
            return redirect()->to(base_url('index.php/bts'));
        } else {
            session()->setFlashdata('berhasil', 'Data BTS berhasil ditambahkan!');
            return redirect()->to(base_url('index.php/bts'));
        }
    }

    public function updateBTS()
    {
        helper(['session']);
        $bts = new Bts_model();
        $id = $_POST['idbts'];
        $namaBTS = $_POST['namaBTS'];
        $alamatBTS = $_POST['alamatBTS'];
        $masuk = $bts->update($id,[
            "nama_bts" => $namaBTS,
            "alamat" => $alamatBTS
        ]);
        if ($masuk === false) {
            $errors = $bts->errors();
            session()->setFlashdata('error', $errors);
            return redirect()->to(base_url('index.php/bts'));
        } else {
            session()->setFlashdata('berhasil', 'Data BTS berhasil diubah!');
            return redirect()->to(base_url('index.php/bts'));
        }
    }
}
