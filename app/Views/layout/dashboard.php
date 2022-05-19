<?= $this->extend('layout/bl'); ?>
<?= $this->section('content'); ?>
<?php
date_default_timezone_set("Asia/Jakarta");
$tanggal = date("d-M-Y");

$hari   = date('l', microtime($tanggal));
$hari_indonesia = array(
    'Monday'  => 'Senin',
    'Tuesday'  => 'Selasa',
    'Wednesday' => 'Rabu',
    'Thursday' => 'Kamis',
    'Friday' => 'Jumat',
    'Saturday' => 'Sabtu',
    'Sunday' => 'Minggu'
);

$nama = session()->get('username');
$hak = session()->get('hak_akses');

?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-home icon-title"></i> Beranda
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda</a></li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="alert alert-dashboard">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p style="font-size:15px">
                    <!-- <i class="icon fa fa-user"></i>Selamat datang <strong><?= $nama; ?></strong>, anda login pada <?php echo $hari_indonesia[$hari] . '&nbsp;' . $tanggal ?> -->
                    <i class="icon fa fa-user"></i>Selamat datang <strong><?= $nama; ?></strong>, anda login sebagai <?= $hak ?>
                </p>
            </div>
        </div>
    </div>

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <?php foreach ($user as $sup) : ?>
            <?php if ($hak == 'Manajer') { ?>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div style="background-color:#605CA8;color:#fff" class="small-box">
                        <div class="inner">
                            <h3><?= $sup['jml_user']; ?></h3>
                            <p>Data User</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <a href="/data_user/input" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
                    </div>
                </div><!-- ./col -->
            <?php } ?>

        <?php endforeach; ?>

        <?php foreach ($supplier as $sup) : ?>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div style="background-color:#00c0ef;color:#fff" class="small-box">
                    <div class="inner">
                        <h3><?= $sup['jml_supplier']; ?></h3>
                        <p>Data supplier</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="/data_supplier/input" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
                </div>
            </div><!-- ./col -->
        <?php endforeach; ?>

        <?php foreach ($obat as $det) : ?>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div style="background-color:#00a65a;color:#fff" class="small-box">
                    <div class="inner">
                        <h3><?= $det['jumlah']; ?></h3>
                        <p>Data Obat</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-medkit"></i>
                    </div>
                    <a href="/data_obat/input" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
                </div>
            </div><!-- ./col -->
        <?php endforeach; ?>

        <?php foreach ($obmasuk as $obm) : ?>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div style="background-color:#f39c12;color:#fff" class="small-box">
                    <div class="inner">
                        <h3><?= $obm['jml_masuk']; ?></h3>
                        <p>Data Obat Masuk</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file-text"></i>
                    </div>
                    <a href="/obat_masuk/input" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
                </div>
            </div><!-- ./col -->
        <?php endforeach; ?>

        <?php foreach ($obkeluar as $obk) : ?>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div style="background-color:#DD4B39;color:#fff" class="small-box">
                    <div class="inner">
                        <h3><?= $obk['jml_keluar']; ?></h3>
                        <p>Data Obat Keluar</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file-text"></i>
                    </div>
                    <a href="/obat_keluar/input" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
                </div>
            </div><!-- ./col -->
        <?php endforeach; ?>

    </div><!-- /.row -->
</section><!-- /.content -->
<?= $this->endSection(); ?>