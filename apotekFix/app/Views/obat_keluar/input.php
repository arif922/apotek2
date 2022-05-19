<?= $this->extend('layout/bl'); ?>
<?= $this->section('content'); ?>
<style>
    .form-group .control-label {
        text-align: left;
    }
</style>


<section class="content-header">
    <h1>
        <i class="fa fa-edit icon-title"></i> Input Obat Keluar
    </h1>
    <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-home"></i> Beranda </a></li>
        <li><a href="/obat_keluar/view"> Obat Keluar </a></li>
        <li class="active"> Input </li>
    </ol>
</section>


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- menampilkan data berhasil disimpan -->
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class='alert berhasil'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4> <i class='icon fa fa-check-circle'></i> Sukses!</h4>
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('eror')) : ?>
                <div class='alert alert-gagal'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4> <i class="fa fa-exclamation-circle"></i> Gagal!</h4>
                    <li style="margin-left: 2%;"> <?= session()->getFlashdata('eror'); ?></li>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('gagal')) : ?>
                <div class='alert alert-gagal'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4> <i class="fa fa-exclamation-circle"></i> Gagal!</h4>
                    <?= session()->getFlashdata('gagal'); ?>
                </div>
            <?php endif; ?>
            <div class="box box-primary">
                <!-- form start -->
                <form role="form" class="form-horizontal" method="POST" action="/ob_keluar/tambahdump" enctype="multipart/form-data">
                    <div class="box-body row">
                        <!-- kiri -->
                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label class="col-sm-4 control-label">Kode Transaksi</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="kd_trans" autocomplete="off" value="<?= $kdtrans; ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label text-xl-left">Kode Detail</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="kode_detail" autocomplete="off" value="<?= $kddet;
                                                                                                                            date_default_timezone_set('Asia/Jakarta');
                                                                                                                            echo date("h-i-s"); ?>" readonly required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nama Obat</label>
                                <div class="col-sm-5">
                                    <select class="form-control select2" id="nama_obat" onchange="kdobat()" name="nm_obat" required>
                                        <option value="" selected hidden>-- Pilih --</option>
                                        <?php foreach ($obat as $ob) : ?>
                                            <option value="<?= $ob['kode_obat']; ?>|<?= $ob['satuan']; ?>"> <?= $ob['nama_obat']; ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>



                        </div>

                        <!-- kanan -->
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label class="col-sm-4 control-label text-xl-left">Kode Obat</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="kode_obat" name="kode_obat" autocomplete="off" value="" readonly required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label text-xl-left">Satuan</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="satuan" name="satuan" autocomplete="off" value="" readonly required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Jumlah</label>
                                <div class="col-sm-5">
                                    <input type="number" id="jml_keluar" min="1" class="form-control" name="jml_keluar" autocomplete="off" maxlength="13" onKeyPress="return goodchars(event,'0123456789',this)" value="" required>
                                </div>
                            </div>


                        </div>

                    </div><!-- /.box body -->

                    <div class="box-footer">
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">

                                <input type="submit" class="btn btn-success btn-submit" name="simpan" value="Tambah">
                                <a href="" class="btn btn-primary btn-reset" style="margin-right: 11px; margin-left: 11px;" data-toggle="modal" data-target="#modal-default">Rincian</a>
                                <a href="/obat_keluar/view" class="btn btn-danger btn-reset btn-standar">Batal</a>
                            </div>
                        </div>
                    </div><!-- /.box footer -->

                </form>

                <?php
                $user = session()->get('username');
                $id = session()->get('id_user');
                ?>

                <!-- Modal Awal-->
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color:  steelblue; color: white;">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><b>Lengkapi Data</b> </h4>
                            </div>
                            <div class="modal-body">
                                <form action="/ob_keluar/simpan2" method="POST">

                                    <input type="hidden" class="form-control" name="kd_trans" autocomplete="off" value="<?= $kdtrans; ?>" readonly>

                                    <!-- <div class="form-group">
                                            <label class="col-sm-2 control-label">User</label>
                                            <div class="col-sm-6">
                                                <select class="form-control " name="user1" id="username" onchange="kduser()" required>
                                                    <option value="" selected hidden>-- Pilih --</option>
                                                   
                                                </select>
                                            </div>
                                        </div> -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">User </label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="user" name="user" autocomplete="off" value="<?php echo $user; ?>" readonly required>
                                        </div>
                                        <label class="col-sm-1 control-label">Id </label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="id_user" name="id_user" autocomplete="off" value="<?php echo $id; ?>" readonly required>

                                        </div>
                                    </div>
                                    <!-- <br><br>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Id </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="id_user" name="id_user" autocomplete="off" value="<?php echo $id; ?>" readonly required>
                                        </div>
                                    </div> -->
                                    <br><br><br>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Tanggal</label>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control" name="tgl1" autocomplete="off" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                            echo date("Y-m-d"); ?>" required>
                                        </div>
                                    </div>

                                    <br>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-danger btn-standar" data-dismiss="modal">Batal</button>
                            </div>


                            </form>

                        </div><!-- /.box -->
                    </div>
                </div>

            </div><!-- /.box -->
        </div>
        <?php echo view('obat_keluar/view_dump'); ?>
        <!--/.col -->
    </div> <!-- /.row -->
</section><!-- /.content -->


<?= $this->endSection() ?>