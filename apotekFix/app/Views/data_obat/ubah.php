<?= $this->extend('layout/bl'); ?>
<?= $this->section('content'); ?>


<section class="content-header">
    <h1>
        <i class="fa fa-edit icon-title"></i> Ubah Data Obat
    </h1>
    <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-home"></i> Beranda </a></li>
        <li><a href="/data_obat/view"> Obat </a></li>
        <li class="active"> Ubah </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <!-- form start -->
                <form role="form" class="form-horizontal" action="/dt_obat/updateobat" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <?php foreach ($obat as $ob) : ?>
                            <input type="hidden" name="fotolama" value="<?= $ob['foto']; ?>">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kode Obat</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="kode_obat" value="<?= $ob['kode_obat']; ?>" readonly required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama obat</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="nama_obat" name="nama_obat" autocomplete="off" value="<?= $ob['nama_obat']; ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Golongan obat</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="jenis_obat" autocomplete="off" value="<?= $ob['jenis_obat']; ?>" required>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-sm-2 control-label">Satuan</label>
                                <div class="col-sm-5">
                                    <select class="form-control" name="satuan" required>
                                        <option <?php if ($ob['satuan'] == "Box") {
                                                    echo "selected";
                                                } ?> value="Box">Box</option>
                                        <option <?php if ($ob['satuan'] == "Botol") {
                                                    echo "selected";
                                                } ?> value="Botol">Botol</option>
                                        <option <?php if ($ob['satuan'] == "Kotak") {
                                                    echo "selected";
                                                } ?> value="Kotak">Kotak</option>
                                        <option <?php if ($ob['satuan'] == "pcs") {
                                                    echo "selected";
                                                } ?> value="pcs">Pcs</option>
                                        <option <?php if ($ob['satuan'] == "saset") {
                                                    echo "selected";
                                                } ?> value="saset">Saset</option>
                                        <option <?php if ($ob['satuan'] == "strip") {
                                                    echo "selected";
                                                } ?> value="strip">Strip</option>
                                        <option <?php if ($ob['satuan'] == "tablet") {
                                                    echo "selected";
                                                } ?> value="tablet">Tablet</option>
                                        <option <?php if ($ob['satuan'] == "Tube") {
                                                    echo "selected";
                                                } ?> value="Tube">Tube</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Komposisi</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="komposisi" autocomplete="off" value="<?= $ob['komposisi']; ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Penyimpanan</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="penyimpanan" autocomplete="off" value="<?= $ob['penyimpanan']; ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Deskripsi Obat</label>
                                <div class="col-sm-5">
                                    <textarea required class="form-control" rows="3" name="deskripsi_obat"><?= $ob['deskripsi_obat']; ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Foto</label>
                                <div class="col-sm-5">
                                    <input type="file" name="ftobat" id="ftobat" value="<?= $ob['foto']; ?>">
                                    <br />
                                    <img style="border:1px solid #eaeaea;border-radius:5px;" src="<?= base_url() ?>/img/obat/<?= $ob['foto']; ?>" width="128">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div><!-- /.box body -->

                    <div class="box-footer">
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="btn btn-primary btn-submit btn-standar" name="simpan" value="Ubah">
                                <a href="/data_obat/view" class="btn btn-danger btn-reset btn-standar" style="margin-left: 11px;">Batal</a>
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