<?= $this->extend('layout/bl'); ?>
<?= $this->section('content'); ?>


<body onload="window.print()">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <i class="fas fa-file-invoice"></i>&nbsp; Laporan Obat Masuk
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
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class='alert alert-gagal'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4> <i class="fas fa-exclamation-circle"></i> Gagal!</h4>
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <!-- Form Laporan -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form role="form" class="form-horizontal" method="POST" action="<?php echo base_url('/laporan_masuk/lihat_lap_masuk'); ?>">
                            <div class="box-body">
                                <div class="col-sm-6">


                                    <div class="form-group">
                                        <label class="col-sm-4">Tanggal Awal</label>
                                        <div class="col-sm-5">
                                            <input type="date" class="form-control" name="awal" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label class="col-sm-4">Tanggal Akhir</label>
                                        <div class="col-sm-5">
                                            <input type="date" class="form-control" name="akhir" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>


                                <br><br><br>


                                <div class="form-group">
                                    <div style="margin-left: 19%;">
                                        <input type="submit" class="btn btn-success btn-submit" style="margin-right: 11px;" value="Lihat">
                                        <!-- <a href="" class="btn btn-success btn-submit" style="margin-right: 11px;"> Lihat</a> -->
                                        <a href="/lap_obmasuk/view" class="btn btn-primary btn-submit" style="margin-right: 11px;"> Refresh</a>
                                        <a href="" class="btn btn-danger btn-submit" style="margin-right: 11px;" onclick="window.print()"> Cetak</a>

                                    </div>
                                </div>
                            </div>


                            <!-- Main content -->
                            <section class="content">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="box box-primary">
                                            <div class="box-body table-responsive">
                                                <!-- tampilan tabel obat -->
                                                <table id="dataTables1" class="table table-bordered table-striped table-hover">
                                                    <!-- tampilan tabel header -->
                                                    <thead>
                                                        <tr>
                                                            <th class="center">No.</th>
                                                            <th class="center">Kode Transaksi</th>
                                                            <th class="center">Kode Detail</th>
                                                            <th class="center">Tanggal</th>
                                                            <th class="center">Nama Obat</th>
                                                            <!-- <th class="center">Kode Obat</th> -->
                                                            <th class="center">No.Faktur</th>
                                                            <th class="center">User</th>
                                                            <th class="center">Supplier</th>
                                                            <th class="center">Jumlah</th>


                                                        </tr>
                                                    </thead>
                                                    <!-- tampilan tabel body -->
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($lapmasuk as $o) : ?>
                                                            <tr class='center'>
                                                                <td width='40'><?= $i++; ?></td>
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
    </div><!-- /.content-wrapper -->
    <?= $this->endSection() ?>