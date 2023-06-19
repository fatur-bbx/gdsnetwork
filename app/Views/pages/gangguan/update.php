<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
<h1 class="h3 mb-2 text-gray-800"><?= $judul ?></h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Data <?= $judul ?></h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('index.php/bts/updateBTS')?>" method="post">
            <input type="hidden" value="<?= $dataEdit['id_bts'] ?>" name="idbts">
            <label for="namaBTS">Nama BTS</label>
            <input class="form-control mb-3" type="text" name="namaBTS" id="namaBTS" value="<?= $dataEdit['nama_bts'] ?>" autofocus require>
            <label for="alamatBTS">Alamat BTS</label>
            <input class="form-control mb-3" type="text" name="alamatBTS" id="alamatBTS" value="<?= $dataEdit['alamat'] ?>" require>
            <button type="submit" class="form-control btn btn-primary" name="update">Update</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>