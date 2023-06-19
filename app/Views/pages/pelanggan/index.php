<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
<h1 class="h3 mb-2 text-gray-800"><?= $judul ?></h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Data <?= $judul ?></h6>
    </div>
    <div class="card-body">
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('berhasil')) : ?>
            <div class="alert alert-success"><?= session()->getFlashdata('berhasil') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('index.php/pelanggan')?>" method="post">
            <button type="submit" class="btn btn-primary mb-3" name="tambahBTN">
                Tambah data
            </button>
        </form>

        <div class="table-responsive">
        <?php $nomor = 1 ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama Pelanggan</th>
                        <th>Alamat Pelanggan</th>
                        <th>Nomor HP</th>
                        <th>Email</th>
                        <th>Nama BTS</th>
                        <th>Nama Perangkat</th>
                        <th>Tanggal</th>
                        <th>Nama Paket</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama Pelanggan</th>
                        <th>Alamat Pelanggan</th>
                        <th>Nomor HP</th>
                        <th>Email</th>
                        <th>Nama BTS</th>
                        <th>Nama Perangkat</th>
                        <th>Tanggal</th>
                        <th>Nama Paket</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data_pelanggan as $data) : ?>
                        <tr>
                            <td><?= $nomor++ ?></td>
                            <td><?= $data["nama"]
                            
                            
                            // $idPelanggan = $data['id_pelanggan'];
                            // $pelanggan = $Pelanggan_model->find($idPelanggan);
                            // if($pelanggan){
                            //     echo $pelanggan["nama"];
                            // }
                            
                            
                            ?></td>
                            <td><?= $data["alamat"] ?></td>
                            <td><?= $data["no_hp"] ?></td>
                            <td><?= $data["email"] ?></td>
                            <td><?php 
                            
                            
                            $id_bts = $data['id_bts'];
                            $bts = $bts_model->find($id_bts);
                            if($bts){
                                echo $bts["nama_bts"];
                            }
                            
                            
                            ?></td>
                            <td><?php 
                            
                            
                            $id_perangkat = $data['id_perangkat'];
                            $perangkat = $perangkat_model->find($id_perangkat);
                            if($perangkat){
                                echo $perangkat["nama_perangkat"];
                            }
                            
                            
                            ?></td>
                            <td><?= $data['tanggal'] ?></td>
                            <td><?php 
                            
                            
                            $id_paket = $data['id_paket'];
                            $paket = $paket_model->find($id_paket);
                            if($paket){
                                echo $paket["nama_paket"];
                            }
                            
                            
                            ?></td>
                            <td>
                                <div class="text-center">
                                    <div class="row">
                                        <div class="col">
                                            <form action="" method="post">
                                                <input type="hidden" value="<?= $data["id_pelanggan"] ?>" name="id_pelanggan">
                                                <button class="btn btn-warning" name="updateBTN">Edit</button>
                                            </form>
                                        </div>
                                        <div class="col">
                                            <form action="" method="post">
                                                <input type="hidden" value="<?= $data["id_pelanggan"] ?>" name="id_pelanggan">
                                                <button class="btn btn-danger" name="hapusBTN">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>