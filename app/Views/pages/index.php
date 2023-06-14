<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Halaman Utama</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Gangguan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
                        <a class="text-xs font-weight-bold text-primary text-uppercase mb-1" href="">
                            Cek disini</a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-hammer fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Pelanggan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">2431</div>
                        <a class="text-xs font-weight-bold text-primary text-uppercase mb-1" href="">
                            Cek disini</a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Row -->
<div class="row">
    <div class="col-lg mb-4">

        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Mengenai Perusahaan</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="<?= base_url('/assets/img/gds_network_logo.png')?>" alt="...">
                </div>
                <p>PT.Globalriau Data Solusi atau disingkat GDS Network merupakan sebuah perusahaan yang berdiri pada tahun 2014 di Pekanbaru. Bermula dari keinginan para pendiri yang telah lama berkecimpung di bidang IT, Network, dan Elektronika dan juga melihat perkembangan Kota Pekanbaru dan Riau pada umumnya yang kian hari kian pesat termasuk perkembangan Teknologi IT dan jaringan. Sebelum berkembang menjadi sebuah Perseroan Terbatas, Pada tahun 2009 GDS terlebih dahulu membentuk sebuah CV dengan nama Global Designs Solution yang bergerak di bidang IT Solution, dan pada tahun 2012 mengalami perubahan struktur dengan masuknya beberapa orang yang diharapkan akan mampu mengembangkan dan berkiprah lebih banyak lagi dalam kemajuan GDS. GDS diharapkan akan mampu menjadi perusahaan yang selalu mengusung nilai manfaat bagi para praktisi IT dan pengguna teknologi khusunya di Pekanbaru. Dan diharapkan akan bisa mengembangkan berbagai divisi yang tentu saja dengan background Informasi Teknologi dan Jaringan.</p>
                <a target="_blank" rel="nofollow" href="https://gds.net.id/">Selengkapnya &rarr;</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>