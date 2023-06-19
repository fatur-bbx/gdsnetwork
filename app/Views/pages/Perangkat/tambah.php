<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
<h1 class="h3 mb-2 text-gray-800"><?= $judul ?></h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data <?= $judul ?></h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('index.php/perangkat/tambahPerangkat') ?>" method="post" enctype="multipart/form-data">
            <label for="nama_perangkat">Nama Perangkat</label>
            <input class="form-control mb-3" type="text" name="nama_perangkat" id="nama_perangkat" autofocus require>
            <label for="tipe_perangkat">Tipe Perangkat</label>
            <input class="form-control mb-3" type="text" name="tipe_perangkat" id="tipe_perangkat" autofocus require>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input class="form-control" type="file" id="gambar" name="gambar" require>
            </div>
            <button type="submit" class="form-control btn btn-primary" name="tambah">Tambah</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>