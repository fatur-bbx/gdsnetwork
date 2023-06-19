<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
<h1 class="h3 mb-2 text-gray-800"><?= $judul ?></h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data <?= $judul ?></h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('index.php/pelanggan/tambahPelanggan')?>" method="post">
            <label for="nama">Nama Pelanggan</label>
            <input type="text" class="form-control mb-3" name="nama" id="nama" require>
            <label for="alamat">Alamat Pelanggan</label>
            <input type="text" class="form-control mb-3" name="alamat" id="alamat" require>
            <label for="no_hp">Nomor HP Pelanggan</label>
            <input type="number" class="form-control mb-3" name="no_hp" id="no_hp" require>
            <label for="email">Email Pelanggan</label>
            <input type="email" class="form-control mb-3" name="email" id="email" require>
            <label for="id_bts">Nama BTS</label>
            <select name="id_bts" id="id_bts" class="form-control mb-3">
                <option value="">Pilih Nama BTS</option>
                <?php foreach($bts_model->findAll() as $bts) : ?>
                    <option value="<?= $bts["id_bts"]?>"><?= $bts["nama_bts"] ?></option>
                <?php endforeach; ?>
            </select>
            <label for="id_perangkat">Nama Perangkat</label>
            <select name="id_perangkat" id="id_perangkat" class="form-control mb-3">
                <option value="">Pilih Nama Perangkat</option>
                <?php foreach($perangkat_model->findAll() as $perangkat) : ?>
                    <option value="<?= $perangkat["id_perangkat"]?>"><?= $perangkat["nama_perangkat"] ?></option>
                <?php endforeach; ?>
            </select>
            <label for="id_paket">Nama Paket</label>
            <select name="id_paket" id="id_paket" class="form-control mb-3">
                <option value="">Pilih Nama Perangkat</option>
                <?php foreach($paket_model->findAll() as $paket) : ?>
                    <option value="<?= $paket["id_paket"]?>"><?= $paket["nama_paket"] ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="form-control btn btn-primary" name="tambah">Tambah</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>