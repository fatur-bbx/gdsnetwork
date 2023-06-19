<?php

namespace App\Controllers;

use App\Models\Bts_model;
use App\Models\Gangguan_model;
use App\Models\Paket_model;
use App\Models\Pelanggan_model;
use App\Models\Perangkat_model;
use App\Models\User_level_model;
use App\Models\Users_model;

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





    // BTS






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




    // GANGGUAN




    public function gangguan()
    {
        helper(['session']);
        $gangguan = new Gangguan_model();
        $pelanggan = new Pelanggan_model();
        $data = [
            "judul" => "Gangguan",
            "data_gangguan" => $gangguan->findAll(),
            "data_pelanggan" => $pelanggan->findAll(),
            "Pelanggan_model" => $pelanggan,
        ];

        if (isset($_POST['tambahBTN'])) {
            return view('pages/gangguan/tambah', $data);
        } else if(isset($_POST['hapusBTN'])){
            $masuk = $gangguan->delete($_POST['id']);
            if ($masuk === false) {
                $errors = $gangguan->errors();
                session()->setFlashdata('error', $errors);
                return redirect()->to(base_url('index.php/gangguan'));
            } else {
                session()->setFlashdata('berhasil', 'Data Gangguan berhasil dihapus!');
                return redirect()->to(base_url('index.php/gangguan'));
            }
        } else if(isset($_POST['verifikasi'])) {
            $masuk = $gangguan->update($_POST['id'],
            [
                'tanggal_close' => date('Y-m-d'),
                'status' => 1
            ]);
            if ($masuk === false) {
                $errors = $gangguan->errors();
                session()->setFlashdata('error', $errors);
                return redirect()->to(base_url('index.php/gangguan'));
            } else {
                session()->setFlashdata('berhasil', 'Data Gangguan berhasil diverifikasi!');
                return redirect()->to(base_url('index.php/gangguan'));
            }
        }else {
            return view('pages/gangguan/index', $data);
        }
    }

    public function tambahGangguan()
    {
        helper(['session']);
        $gangguan = new Gangguan_model();
        $uuid = service('uuid');
        $uuid4 = $uuid->uuid4();
        $string = $uuid4->toString();
        $masuk = $gangguan->insert([
            "id_gangguan" => $string,
            "id_pelanggan" => $_POST['namaPelanggan'],
            "laporan" => $_POST['laporanGangguan'],
            "tanggal_open" => $_POST['tanggalOpen'],
            "status" => "0"
        ]);
        if ($masuk === false) {
            $errors = $gangguan->errors();
            
            session()->setFlashdata('error', $errors);
            return redirect()->to(base_url('index.php/gangguan'));
        } else {
            session()->setFlashdata('berhasil', 'Data Gangguan berhasil ditambahkan!');
            return redirect()->to(base_url('index.php/gangguan'));
        }
    }





    // Paket





    public function paket()
    {
        helper(['session']);
        $paket = new Paket_model();
        $data = [
            "judul" => "Paket",
            "data_paket" => $paket->findAll(),
        ];
        if (isset($_POST['tambahBTN'])) {
            return view('pages/paket/tambah', $data);
        } else if(isset($_POST['updateBTN'])) {
            $dataAll = [
                "judul" => "Paket",
                "dataEdit" => $paket->find($_POST['id_paket']),
            ];
            return view('pages/paket/update', $dataAll);
        } else if(isset($_POST['hapusBTN'])){
            $masuk = $paket->delete($_POST['id_paket']);
            if ($masuk === false) {
                $errors = $paket->errors();
                session()->setFlashdata('error', $errors);
                return redirect()->to(base_url('index.php/paket'));
            } else {
                session()->setFlashdata('berhasil', 'Data Paket berhasil dihapus!');
                return redirect()->to(base_url('index.php/paket'));
            }
        } else {
            return view('pages/paket/index', $data);
        }
    }

    public function tambahPaket()
    {
        helper(['session']);
        $paket = new Paket_model();
        $uuid = service('uuid');
        $uuid4 = $uuid->uuid4();
        $string = $uuid4->toString();
        $masuk = $paket->insert([
            "id_paket" => $string,
            "nama_paket" => $_POST['nama_paket']
        ]);
        if ($masuk === false) {
            $errors = $paket->errors();
            session()->setFlashdata('error', $errors);
            return redirect()->to(base_url('index.php/paket'));
        } else {
            session()->setFlashdata('berhasil', 'Data Paket berhasil ditambahkan!');
            return redirect()->to(base_url('index.php/paket'));
        }
    }

    public function updatePaket()
    {
        helper(['session']);
        $paket = new Paket_model();
        $masuk = $paket->update($_POST['id_paket'],[
            "nama_paket" => $_POST['nama_paket']
        ]);
        if ($masuk === false) {
            $errors = $paket->errors();
            session()->setFlashdata('error', $errors);
            return redirect()->to(base_url('index.php/paket'));
        } else {
            session()->setFlashdata('berhasil', 'Data BTS berhasil diubah!');
            return redirect()->to(base_url('index.php/paket'));
        }
    }




    // Perangkat



    function randomizeImageName($filename) {
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $name = pathinfo($filename, PATHINFO_FILENAME);
    
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $length = 10;
    
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        $randomizedName = $randomString . '_' . $name . '.' . $extension;
    
        return $randomizedName;
    }
    



    public function perangkat()
    {
        helper(['session']);
        $perangkat = new Perangkat_model();
        $data = [
            "judul" => "Perangkat",
            "data_perangkat" => $perangkat->findAll(),
        ];
        if (isset($_POST['tambahBTN'])) {
            return view('pages/perangkat/tambah', $data);
        } else if(isset($_POST['updateBTN'])) {
            $dataAll = [
                "judul" => "Perangkat",
                "dataEdit" => $perangkat->find($_POST['id_perangkat']),
            ];
            return view('pages/perangkat/update', $dataAll);
        } else if(isset($_POST['hapusBTN'])){
            $prg = $perangkat->find($_POST['id_perangkat']);
            if (file_exists('assets/img/perangkat/'.$prg['gambar'])) {
                unlink('assets/img/perangkat/'.$prg['gambar']);
            } else {
                session()->setFlashdata('error', "Gambar gagal dihapus, file tidak ada!");
                return redirect()->to(base_url('index.php/perangkat'));
            }
            $masuk = $perangkat->delete($_POST['id_perangkat']);
            if ($masuk === false) {
                $errors = $perangkat->errors();
                session()->setFlashdata('error', $errors);
                return redirect()->to(base_url('index.php/perangkat'));
            } else {
                session()->setFlashdata('berhasil', 'Data Perangkat berhasil dihapus!');
                return redirect()->to(base_url('index.php/perangkat'));
            }
        } else {
            return view('pages/perangkat/index', $data);
        }
    }

    public function tambahPerangkat()
    {
        helper(['session']);
        $perangkat = new Perangkat_model();
        $uuid = service('uuid');
        $uuid4 = $uuid->uuid4();
        $string = $uuid4->toString();
        $uploadedFile = $_FILES['gambar'];
        $filename = $uploadedFile['name'];
        $randomizedName = $this->randomizeImageName($filename);
        move_uploaded_file($uploadedFile['tmp_name'], 'assets/img/perangkat/' . $randomizedName);
        $masuk = $perangkat->insert([
            "id_perangkat" => $string,
            "nama_perangkat" => $_POST['nama_perangkat'],
            "tipe_perangkat" => $_POST['tipe_perangkat'],
            "gambar" => $randomizedName,
        ]);
        if ($masuk === false) {
            $errors = $perangkat->errors();
            session()->setFlashdata('error', $errors);
            return redirect()->to(base_url('index.php/perangkat'));
        } else {
            session()->setFlashdata('berhasil', 'Data Perangkat berhasil ditambahkan!');
            return redirect()->to(base_url('index.php/perangkat'));
        }
    }

    public function updatePerangkat()
    {
        helper(['session']);
        $perangkat = new Perangkat_model();
        if($_FILES['gambar']){
            $prg = $perangkat->find($_POST['id_perangkat']);
            if (file_exists('assets/img/perangkat/'.$prg['gambar'])) {
                unlink('assets/img/perangkat/'.$prg['gambar']);
            } else {
                session()->setFlashdata('error', "Gambar gagal dihapus, file tidak ada!");
                return redirect()->to(base_url('index.php/perangkat'));
            }
            $uploadedFile = $_FILES['gambar'];
            $filename = $uploadedFile['name'];
            $randomizedName = $this->randomizeImageName($filename);
            move_uploaded_file($uploadedFile['tmp_name'], 'assets/img/perangkat/' . $randomizedName);
            $masuk = $perangkat->update($_POST['id_perangkat'],[
                "nama_perangkat" => $_POST['nama_perangkat'],
                "tipe_perangkat" => $_POST['tipe_perangkat'],
                "gambar" => $randomizedName,
            ]);
        }else{
            $masuk = $perangkat->update($_POST['id_perangkat'],[
                "nama_perangkat" => $_POST['nama_perangkat'],
                "tipe_perangkat" => $_POST['tipe_perangkat'],
            ]);
        }
        
        if ($masuk === false) {
            $errors = $perangkat->errors();
            session()->setFlashdata('error', $errors);
            return redirect()->to(base_url('index.php/perangkat'));
        } else {
            session()->setFlashdata('berhasil', 'Data Perangkat berhasil diubah!');
            return redirect()->to(base_url('index.php/perangkat'));
        }
    }

    // Pelanggan

    public function pelanggan()
    {
        helper(['session']);
        $pelanggan = new Pelanggan_model();
        $bts = new Bts_model();
        $perangkat = new Perangkat_model();
        $paket = new Paket_model();
        $data = [
            "judul" => "Pelanggan",
            "data_pelanggan" => $pelanggan->findAll(),
            "bts_model" => $bts,
            "perangkat_model" => $perangkat,
            "paket_model" => $paket
        ];

        if (isset($_POST['tambahBTN'])) {
            return view('pages/pelanggan/tambah', $data);
        } else if(isset($_POST['hapusBTN'])){
            $masuk = $pelanggan->delete($_POST['id_pelanggan']);
            if ($masuk === false) {
                $errors = $pelanggan->errors();
                session()->setFlashdata('error', $errors);
                return redirect()->to(base_url('index.php/pelanggan'));
            } else {
                session()->setFlashdata('berhasil', 'Data Pelanggan berhasil dihapus!');
                return redirect()->to(base_url('index.php/pelanggan'));
            }
        } else if(isset($_POST['updateBTN'])) {
            $dataAll = [
                "judul" => "Pelanggan",
                "dataEdit" => $pelanggan->find($_POST['id_pelanggan']),
                "bts_model" => $bts,
                "perangkat_model" => $perangkat,
                "paket_model" => $paket
            ];
            return view('pages/pelanggan/update', $dataAll);
        } else {
            return view('pages/pelanggan/index', $data);
        }
    }

    public function tambahPelanggan()
    {
        helper(['session']);
        $pelanggan = new Pelanggan_model();
        $uuid = service('uuid');
        $uuid4 = $uuid->uuid4();
        $string = $uuid4->toString();
        $masuk = $pelanggan->insert([
            "id_pelanggan" => $string,
            "nama" => $_POST['nama'],
            "alamat" => $_POST['alamat'],
            "no_hp" => $_POST['no_hp'],
            "email" => $_POST['email'],
            "id_bts" => $_POST['id_bts'],
            "id_perangkat" => $_POST['id_perangkat'],
            "tanggal" => date('Y-m-d'),
            "id_paket" => $_POST['id_paket']
        ]);
        if ($masuk === false) {
            $errors = $pelanggan->errors();
            session()->setFlashdata('error', $errors);
            return redirect()->to(base_url('index.php/pelanggan'));
        } else {
            session()->setFlashdata('berhasil', 'Data Pelanggan berhasil ditambahkan!');
            return redirect()->to(base_url('index.php/pelanggan'));
        }
    }

    public function updatePelanggan()
    {
        helper(['session']);
        $pelanggan = new Pelanggan_model();
        $masuk = $pelanggan->update($_POST['id_pelanggan'],[
            "nama" => $_POST['nama'],
            "alamat" => $_POST['alamat'],
            "no_hp" => $_POST['no_hp'],
            "email" => $_POST['email'],
            "id_bts" => $_POST['id_bts'],
            "id_perangkat" => $_POST['id_perangkat'],
            "id_paket" => $_POST['id_paket']
        ]);
        if ($masuk === false) {
            $errors = $pelanggan->errors();
            session()->setFlashdata('error', $errors);
            return redirect()->to(base_url('index.php/pelanggan'));
        } else {
            session()->setFlashdata('berhasil', 'Data Pelanggan berhasil diubah!');
            return redirect()->to(base_url('index.php/pelanggan'));
        }
    }



    // Pelanggan

    public function level()
    {
        helper(['session']);
        $level = new User_level_model();
        $data = [
            "judul" => "Level Admin",
            "data_level" => $level->findAll()
        ];

        if (isset($_POST['tambahBTN'])) {
            return view('pages/level/tambah', $data);
        } else if(isset($_POST['hapusBTN'])){
            $masuk = $level->delete($_POST['id_level']);
            if ($masuk === false) {
                $errors = $level->errors();
                session()->setFlashdata('error', $errors);
                return redirect()->to(base_url('index.php/level'));
            } else {
                session()->setFlashdata('berhasil', 'Data Level berhasil dihapus!');
                return redirect()->to(base_url('index.php/level'));
            }
        } else if(isset($_POST['updateBTN'])) {
            $dataAll = [
                "judul" => "Level Admin",
                "dataEdit" => $level->find($_POST['id_level'])
            ];
            return view('pages/level/update', $dataAll);
        } else {
            return view('pages/level/index', $data);
        }
    }

    public function tambahLevel()
    {
        helper(['session']);
        $level = new User_level_model();
        $uuid = service('uuid');
        $uuid4 = $uuid->uuid4();
        $string = $uuid4->toString();
        $masuk = $level->insert([
            "id_level" => $string,
            "level" => $_POST['level'],
            "description" => $_POST['description']
        ]);
        if ($masuk === false) {
            $errors = $level->errors();
            session()->setFlashdata('error', $errors);
            return redirect()->to(base_url('index.php/level'));
        } else {
            session()->setFlashdata('berhasil', 'Data Level berhasil ditambahkan!');
            return redirect()->to(base_url('index.php/level'));
        }
    }

    public function updateLevel()
    {
        helper(['session']);
        $level = new User_level_model();
        $masuk = $level->update($_POST['id_level'],[
            "level" => $_POST['level'],
            "description" => $_POST['description']
        ]);
        if ($masuk === false) {
            $errors = $level->errors();
            session()->setFlashdata('error', $errors);
            return redirect()->to(base_url('index.php/level'));
        } else {
            session()->setFlashdata('berhasil', 'Data Level berhasil diubah!');
            return redirect()->to(base_url('index.php/level'));
        }
    }



    // Admin

    public function admin()
    {
        helper(['session']);
        $user = new Users_model();
        $level = new User_level_model();
        $data = [
            "judul" => "Admin",
            "data_user" => $user->findAll(),
            "level" => $level
        ];

        if (isset($_POST['tambahBTN'])) {
            return view('pages/admin/tambah', $data);
        } else if(isset($_POST['hapusBTN'])){
            $masuk = $user->delete($_POST['id_user']);
            if ($masuk === false) {
                $errors = $user->errors();
                session()->setFlashdata('error', $errors);
                return redirect()->to(base_url('index.php/admin'));
            } else {
                session()->setFlashdata('berhasil', 'Data Admin berhasil dihapus!');
                return redirect()->to(base_url('index.php/admin'));
            }
        } else if(isset($_POST['updateBTN'])) {
            $dataAll = [
                "judul" => "Admin",
                "dataEdit" => $user->find($_POST['id_user']),
                "level" => $level
            ];
            return view('pages/admin/update', $dataAll);
        } else {
            return view('pages/admin/index', $data);
        }
    }

    public function tambahAdmin()
    {
        helper(['session']);
        $user = new Users_model();
        $level = new User_level_model();
        $uuid = service('uuid');
        $uuid4 = $uuid->uuid4();
        $string = $uuid4->toString();
        $masuk = $user->insert([
            "id_user" => $string,
            "email" => $_POST['email'],
            "password" => $_POST['password'],
            "nama" => $_POST['nama'],
            "id_level" => $_POST['id_level'],
            "level" => $level
        ]);
        if ($masuk === false) {
            $errors = $user->errors();
            session()->setFlashdata('error', $errors);
            return redirect()->to(base_url('index.php/admin'));
        } else {
            session()->setFlashdata('berhasil', 'Data User berhasil ditambahkan!');
            return redirect()->to(base_url('index.php/admin'));
        }
    }

    public function updateAdmin()
    {
        helper(['session']);
        $user = new Users_model();
        $level = new User_level_model();
        $masuk = $user->update($_POST['id_user'],[
            "email" => $_POST['email'],
            "password" => $_POST['password'],
            "nama" => $_POST['nama'],
            "id_level" => $_POST['id_level'],
            "level" => $level
        ]);
        if ($masuk === false) {
            $errors = $user->errors();
            session()->setFlashdata('error', $errors);
            return redirect()->to(base_url('index.php/admin'));
        } else {
            session()->setFlashdata('berhasil', 'Data User berhasil diubah!');
            return redirect()->to(base_url('index.php/admin'));
        }
    }
}
