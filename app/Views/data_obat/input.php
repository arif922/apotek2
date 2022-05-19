<?= $this->extend('layout/bl'); ?>
<?= $this->section('content'); ?>


<section class="content-header">
    <h1>
        <i class="fa fa-edit icon-title"></i> Input Obat
    </h1>
    <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-home"></i> Beranda </a></li>
        <li><a href="/data_obat/view"> Obat </a></li>
        <li class="active"> Tambah </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">

            <?php if (session()->getFlashdata('error')) : ?>
                <div class='alert alert-gagal'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4> <i class="fa fa-exclamation-circle"></i> Gagal!</h4>
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <div class="box box-primary">
                <!-- form start -->
                <form role="form" class="form-horizontal" action="/dt_obat/save" method="POST" enctype="multipart/form-data">
                    <div class="box-body">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kode Obat</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="kode_obat" readonly required value="<?php
                                                                                                                    echo $kdobat;
                                                                                                                    ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama obat</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="<?= old('nama_obat'); ?>" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Golongan obat</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="jenis_obat" autocomplete="off" placeholder="" required value="<?= old('jenis_obat'); ?>">
                            </div>
                        </div>

                        <!-- JENIS OBAT MENGGUNAKAN SELECT DROPWON -->
                        <!-- <div class="form-group">
                                <label class="col-sm-2 control-label">Jenis Obat</label>
                                <div class="col-sm-5">
                                    <select class="form-control" id="jenis_obat" name="jenis_obat[]" multiple="multiple" required>
                                        <option value="Box">Box</option>
                                        <option value="Botol">Botol</option>
                                        <option value="Kotak">Kotak</option>
                                        <option value="Strip">Strip</option>
                                        <option value="Tube">Tube</option>
                                    </select>
                                </div>
                            </div> -->

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Satuan</label>
                            <div class="col-sm-5">
                                <select class="form-control" name="satuan" required>
                                    <option value="" hidden selected>-- Pilih --</option>
                                    <option value="Box">Box</option>
                                    <option value="Botol">Botol</option>
                                    <option value="Kotak">Kotak</option>
                                    <option value="pcs">Pcs</option>
                                    <option value="saset">Saset</option>
                                    <option value="strip">Strip</option>
                                    <option value="tablet">Tablet</option>
                                    <option value="Tube">Tube</option>
                                </select>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-sm-2 control-label">Komposisi</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="komposisi" autocomplete="off" required value="<?= old('komposisi'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Penyimpanan</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="penyimpanan" autocomplete="off" value="<?= old('penyimpanan'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Deskripsi Obat</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" rows="3" name="deskripsi_obat" value="<?= old('deskripsi_obat'); ?>"><?= old('deskripsi_obat'); ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Foto</label>
                            <div class="col-sm-5">
                                <input type="file" name="ftobat" id="ftobat">
                                <br />

                            </div>
                        </div>

                    </div><!-- /.box body -->

                    <div class="box-footer">
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                                <a href="" class="btn btn-danger btn-reset btn-standar" style="margin-left: 11px;">Batal</a>
                            </div>
                        </div>
                    </div><!-- /.box footer -->
                </form>
            </div><!-- /.box -->
        </div>
        <!--/.col -->
    </div> <!-- /.row -->
</section><!-- /.content -->


<?= $this->endSection() ?>