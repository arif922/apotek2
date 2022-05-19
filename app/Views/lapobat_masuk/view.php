<?= $this->extend('layout/bl'); ?>
<?= $this->section('content'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-file-text-o"></i> Laporan Obat Masuk
    </h1>
    <ol class="breadcrumb">
        <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda</a></li>
        <li class="active">Laporan Obat Masuk</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php if (session()->getFlashdata('salah')) : ?>
                <div class='alert alert-gagal'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4> <i class="fa fa-exclamation-circle"></i> Gagal!</h4>
                    <li style="margin-left: 2%;"> <?= session()->getFlashdata('salah'); ?></li>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('gagal')) : ?>
                <div class='alert alert-gagal'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4> <i class="fa fa-exclamation-circle"></i> Gagal!</h4>
                    <?= session()->getFlashdata('gagal'); ?>
                </div>
            <?php endif; ?>
            <!-- Form Laporan -->
            <div style="background: white; padding-top: 15px;">
                <!-- form start -->
                <form role="form" class="form-horizontal" method="POST" action="<?php echo base_url('/laporan_masuk/lihat_lap_masuk'); ?>">
                    <div class="box-body hapus">
                        <div class="col-sm-6">
                            <?php
                            $awal = session()->get('awal');
                            $akhir = session()->get('akhir');
                            ?>

                            <div class="form-group">
                                <label class="col-sm-4">Tanggal Awal</label>
                                <div class="col-sm-5">

                                    <input type="date" class="form-control" name="awal" autocomplete="off" value="<?= $awal; ?>" required>

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">

                            <div class="form-group">
                                <label class="col-sm-4">Tanggal Akhir</label>
                                <div class="col-sm-5">

                                    <input type="date" class="form-control" name="akhir" autocomplete="off" value="<?= $akhir; ?>" required>

                                </div>
                            </div>
                        </div>


                        <br><br><br>


                        <div class="form-group">
                            <div style="margin-left: 19%;">
                                <input type="submit" class="btn btn-success btn-submit btn-standar" style="margin-right: 11px;" value=" Lihat">
                                <!-- <a href="" class="btn btn-success btn-submit" style="margin-right: 11px;"> Lihat</a> -->
                                <a href="" onclick="window.print()" class="btn btn-primary btn-submit btn-standar" style="margin-right: 11px;"> Cetak</a>
                                <a href="/lap_obmasuk/view" class="btn btn-default btn-submit" style="margin-right: 11px;"> Refresh</a>

                            </div>
                        </div>
                    </div>

                    <!-- untuk laporan -->
                    <div class="kotak" hidden>
                        <div style="color:#3c8dbc" class="login-logo">
                            <img style="margin-top:-12px" src="<?= base_url() ?>/img/logo.jpg" class="pull-left" alt="Logo" height="100">
                            <div class="laporan">
                                <b>Apotek Hilda</b>
                                <p style="font-size: 20px;">Jl Turi, Panggung, Lumbungrejo, Kec. Tempel <br> Kabupaten Sleman, DI Yogyakarta 55552</p>
                            </div>
                            <div class="border" style=" border-width: 5px; border-bottom-style: outset; border-color: #000;">
                            </div>
                            <p class="center" style="font-size: 32px; margin-bottom: -30px;"><b> Laporan Obat Masuk</b></p>
                        </div>
                    </div>

                    <hr class="hr1" style="border-width: 15px; border-color: #ECF0F5;">
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="masuk">
                                    <div class="box-body table-responsive">
                                        <!-- tampilan tabel obat -->
                                        <table id="example1" class="table table-striped table-hover">
                                            <!-- tampilan tabel header -->
                                            <thead>
                                                <tr class="hilang">
                                                    <th class="center">No.</th>
                                                    <th>Kode Transaksi</th>
                                                    <th>Kode Detail</th>
                                                    <th>Tanggal</th>
                                                    <th>Nama Obat</th>
                                                    <!-- <th >Kode Obat</th> -->
                                                    <th>No.Faktur</th>
                                                    <th>User</th>
                                                    <th>Supplier</th>
                                                    <th>Jumlah</th>


                                                </tr>
                                            </thead>
                                            <!-- tampilan tabel body -->
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($lapmasuk as $o) : ?>
                                                    <tr class="hilang2">
                                                        <td class='center' width='40'><?= $i++; ?></td>
                                                        <td><?= $o['kd_obat_masuk']; ?></td>
                                                        <td><?= $o['kode_detail']; ?></td>
                                                        <td><?= $o['tanggal_masuk']; ?></td>
                                                        <td><?= $o['nama_obat']; ?></td>
                                                        <td><?= $o['faktur']; ?></td>
                                                        <td><?= $o['username']; ?></td>
                                                        <td><?= $o['nama_supplier']; ?></td>
                                                        <td width='40'><?= $o['jumlah_masuk']; ?></td>

                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr id="hilangsub">
                                                    <th rowspan="" colspan="9"></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div>
                            <!--/.col -->
                        </div> <!-- /.row -->
                    </section>

            </div>
            <!--/.col -->
        </div> <!-- /.row -->
</section>

<?= $this->endSection() ?>