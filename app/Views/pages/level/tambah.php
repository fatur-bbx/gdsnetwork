<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
<h1 class="h3 mb-2 text-gray-800"><?= $judul ?></h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data <?= $judul ?></h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('index.php/level/tambahLevel')?>" method="post">
            <label for="level">Nama Level</label>
            <input class="form-control mb-3" type="text" name="level" id="level" autofocus require>
            <label for="description">Deskripsi</label>
            <input class="form-control mb-3" type="text" name="description" id="description" autofocus require>
            <button type="submit" class="form-control btn btn-primary" name="tambah">Tambah</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>