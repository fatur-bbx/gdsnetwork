<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
<h1 class="h3 mb-2 text-gray-800"><?= $judul ?></h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Data <?= $judul ?></h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('index.php/level/updateLevel')?>" method="post">
            <input type="hidden" value="<?= $dataEdit['id_level'] ?>" name="id_level">
            <label for="level">Nama Level</label>
            <input class="form-control mb-3" type="text" name="level" id="level" value="<?= $dataEdit['level'] ?>" autofocus require>
            <label for="description">Deskripsi</label>
            <input class="form-control mb-3" type="text" name="description" id="description" value="<?= $dataEdit['description'] ?>" autofocus require>
            <button type="submit" class="form-control btn btn-primary" name="update">Update</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>