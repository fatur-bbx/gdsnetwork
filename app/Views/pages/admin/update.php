<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
<h1 class="h3 mb-2 text-gray-800"><?= $judul ?></h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Data <?= $judul ?></h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('index.php/admin/updateAdmin')?>" method="post">
            <input type="hidden" value="<?= $dataEdit['id_user'] ?>" name="id_user">
            <label for="email">Email User</label>
            <input class="form-control mb-3" type="email" name="email" id="email" value="<?= $dataEdit['email'] ?>" autofocus require>
            <label for="password">Password</label>
            <input class="form-control mb-3" type="password" name="password" id="password" value="<?= $dataEdit['password'] ?>" autofocus require>
            <label for="nama">Nama Lengkap</label>
            <input class="form-control mb-3" type="text" name="nama" id="nama" value="<?= $dataEdit['nama'] ?>" autofocus require>
            <label for="id_level">Nama Level</label>
            <select name="id_level" id="id_level" class="form-control mb-3">
                <option value="">Pilih Level</option>
                <?php foreach($level->findAll() as $lvl) : ?>
                    <option value="<?= $lvl["id_level"] ?>" <?= ( $lvl["id_level"] == $dataEdit["id_level"]) ? "selected" : "" ?>><?= $lvl["level"] ?></option>
                <?php endforeach;?>
            </select>
            <button type="submit" class="form-control btn btn-primary" name="update">Update</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>