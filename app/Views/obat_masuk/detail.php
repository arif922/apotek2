<?= $this->extend('layout/bl'); ?>
<?= $this->section('content'); ?>


<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-file-o"></i> Detail Obat Masuk
    </h1>
    <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="/obat_masuk/view"> Obat Masuk </a></li>
        <li> Detail </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-body table-responsive">
                    <!-- tampilan tabel user -->
                    <table id="example1" class="table table-bordered table-striped table-hover">
                        <!-- tampilan tabel header -->
                        <thead>
                            <tr>
                                <th class="center">No.</th>
                                <th class="center">Kode Transaksi</th>
                                <th class="center">Kode Detail</th>
                                <th class="center">Nama Obat</th>
                                <th class="center">Kode Obat</th>
                                <th class="center">Jumlah</th>
                                <th class="center">Expired</th>

                            </tr>
                        </thead>
                        <!-- tampilan tabel body -->
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($detailobatmasuk as $m) : ?>
                                <tr class='center'>
                                    <td width='40'><?= $i++; ?></td>

                                    <td><?= $m['kd_obat_masuk']; ?></td>
                                    <td><?= $m['kode_detail']; ?></td>
                                    <td><?= $m['nama_obat']; ?></td>
                                    <td><?= $m['kode_obat']; ?></td>

                                    <td><?= $m['jumlah_masuk']; ?></td>
                                    <td><?= $m['expired']; ?></td>
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
<!-- /.content-->


<?= $this->endSection() ?>