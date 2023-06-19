<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
<h1 class="h3 mb-2 text-gray-800"><?= $judul ?></h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data <?= $judul ?></h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('index.php/gangguan/tambahGangguan')?>" method="post">
            <label for="namaPelanggan">Nama Pelanggan</label>
            <select name="namaPelanggan" id="namaPelanggan" class="form-control mb-3" require autofocus>
                <option value="">Pilih Pelanggan</option>
                <?php foreach($data_pelanggan as $pelanggan) : ?>
                    <option value="<?= $pelanggan['id_pelanggan']?>"><?= $pelanggan['nama'] ?></option>
                <?php endforeach;?>
            </select>
            <label for="laporanGangguan">Laporan</label>
            <input class="form-control mb-3" type="text" name="laporanGangguan" id="laporanGangguan" require>
            <label for="tanggalOpen">Tanggal Open Gangguan</label>
            <input type="date" class="form-control mb-3" name="tanggalOpen">
            <button type="submit" class="form-control btn btn-primary" name="tambah">Tambah</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>