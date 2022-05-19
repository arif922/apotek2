<?= $this->extend('layout/bl'); ?>
<?= $this->section('content'); ?>

<section class="content-header">
    <h1>
        <i class="fa fa-edit icon-title"></i> Tambah Data User
    </h1>
    <!-- <div class="alert alert-dashboard ling" style="margin-top: 5px; margin-bottom: -5px;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p style="font-size:15px; color: black;">
            <i class="icon fa fa-home"></i><a href="">Beranda</a> / <a href="">User</a> / <a style="color: #3C8DBC;" href="">Input</a>
        </p>
    </div> -->
    <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="/data_user/view"> User </a></li>
        <li class="aktif"> Tambah </li>
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
                <!-- mengambil error dari controller dt_user/input -->
                <form role="form" class="form-horizontal" method="POST" action="/dt_user/save_user" enctype="multipart/form-data">
                    <!-- agar form hanya dapat diinput lewat halaman ini saja -->
                    <?= csrf_field(); ?>
                    <div class="box-body">

                        <input type="hidden" name="id_user" value="9">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="username" autocomplete="off" required value="<?= old('username'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control " name="password" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="alamat" autocomplete="off" required value="<?= old('alamat'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-5">
                                <input type="email" class="form-control" name="email" autocomplete="off" value="<?= old('email'); ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Telepon</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="telepon" value="<?= old('telepon'); ?>" autocomplete="off" maxlength="13" onKeyPress="return goodchars(event,'0123456789',this)" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jabatan</label>
                            <div class="col-sm-5">
                                <select class="form-control" name="hak_akses" required>
                                    <option value="" selected hidden>-- Pilih --</option>
                                    <option value="APA">APA</option>
                                    <option value="APING">APING</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" id="label1">Foto</label>
                            <div class="col-sm-5">
                                <input type="file" class="custom-file-input" name="ftuser" id="ftuser" onchange="previewImage();">
                                <br />
                                <!-- <img style="border:1px solid #eaeaea;border-radius:5px;" src="/img/default.png" width="128" id="img-preview"> -->
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