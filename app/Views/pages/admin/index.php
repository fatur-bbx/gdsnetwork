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

        <form action="<?= base_url('index.php/admin')?>" method="post">
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
                        <th>Email</th>
                        <th>Nama Lengkap</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nomor</th>
                        <th>Email</th>
                        <th>Nama Lengkap</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data_user as $data) : ?>
                        <tr>
                            <td><?= $nomor++ ?></td>
                            <td><?= $data["email"] ?></td>
                            <td><?= $data["nama"] ?></td>
                            <td><?php 
                            
                            
                            $id_level = $data['id_level'];
                            $lvl = $level->find($id_level);
                            if($lvl){
                                echo $lvl["level"];
                            }
                            

                            ?></td>
                            <td>
                                <div class="text-center">
                                    <div class="row">
                                        <div class="col">
                                            <form action="" method="post">
                                                <input type="hidden" value="<?= $data["id_user"] ?>" name="id_user">
                                                <button class="btn btn-warning" name="updateBTN">Edit</button>
                                            </form>
                                        </div>
                                        <div class="col">
                                            <form action="" method="post">
                                                <input type="hidden" value="<?= $data["id_user"] ?>" name="id_user">
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