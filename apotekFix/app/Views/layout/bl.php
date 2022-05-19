<!DOCTYPE html>
<html>
<?php

$id = session()->get('id_user');


if (empty($id)) {

?>
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="shortcut icon" href="<?= base_url() ?>/img/logo.png" />

    <body style="background-color: #ECF0F5;">

        <div style="text-align: center; margin-top: 14%;">
            <h1>404</h1>
            <h1><i class="fa fa-warning"></i> Oops! Page Error</h1>
            <h2>Anda Belum Login, Silahkan Login Terlebih dahulu</h2>
            <h4>Silahkan Login<a href="<?php echo base_url('') ?>"> Disini</a></h4>
        </div>
    </body>

<?php return redirect()->to(base_url(''));
} ?>

<?php echo view('layout/l_head') ?>


<body class="hold-transition skin-blue fixed sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <?php echo view('layout/l_header') ?>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <?php echo view('layout/l_nav') ?>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?= $this->renderSection('content'); ?>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php echo view('layout/l_footer') ?>


        <?php echo view('layout/setting') ?>
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="<?= base_url() ?>/template/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url() ?>/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?= base_url() ?>/template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url() ?>/template/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>/template/dist/js/demo.js"></script>

    <!-- DataTables -->
    <script src="<?= base_url() ?>/template/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/template/bower_components/datatables.net/js/jquery.dataTables2.js"></script>
    <script src="<?= base_url() ?>/template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


</body>
<!-- <script>
    $('.sidebar-menu ul li').find('a').each(function() {
        var link = new RegExp($(this).attr('href')); //Check if some menu compares inside your the browsers link
        if (link.test(document.location.href)) {
            if (!$(this).parents().hasClass('active')) {
                $(this).parents('li').addClass('menu-open');
                $(this).parents().addClass("active");
                $(this).addClass("active"); //Add this too
            }
        }
    });
</script> -->

<script>
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>


<!-- menghilangkan icon ci4 -->
<style>
    @media screen {

        /* a#debug-icon-link  */

        #toolbarContainer {
            display: none;
        }
    }
</style>

<!-- page script -->
<script type="text/javascript">
    $(function() {
        // datepicker plugin
        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true
        });

        // chosen select
        $('.chosen-select').chosen({
            allow_single_deselect: true
        });
        //resize the chosen on window resize

        // mask money
        $('#harga_beli').maskMoney({
            thousands: '.',
            decimal: ',',
            precision: 0
        });
        $('#harga_jual').maskMoney({
            thousands: '.',
            decimal: ',',
            precision: 0
        });

        $(window)
            .off('resize.chosen')
            .on('resize.chosen', function() {
                $('.chosen-select').each(function() {
                    var $this = $(this);
                    $this.next().css({
                        'width': $this.parent().width()
                    });
                })
            }).trigger('resize.chosen');
        //resize chosen on sidebar collapse/expand
        $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
            if (event_name != 'sidebar_collapsed') return;
            $('.chosen-select').each(function() {
                var $this = $(this);
                $this.next().css({
                    'width': $this.parent().width()
                });
            })
        });


        $('#chosen-multiple-style .btn').on('click', function(e) {
            var target = $(this).find('input[type=radio]');
            var which = parseInt(target.val());
            if (which == 2) $('#form-field-select-4').addClass('tag-input-style');
            else $('#form-field-select-4').removeClass('tag-input-style');
        });

    });
</script>


<!-- tippy.js -->
<script src="<?= base_url() ?>/template/dist/css/tippy/popper.min.js"></script>
<script src="<?= base_url() ?>/template/dist/css/tippy/tippy-bundle.umd.min.js"></script>

<!-- membuat tooltip -->
<!-- awal -->
<script>
    tippy('#detail', {
        content: "Detail",
    });
</script>

<script>
    tippy('#hapus', {
        content: "Hapus",
    });
</script>

<script>
    tippy('#ubah', {
        content: "Ubah",
    });
</script>

<script>
    tippy('#Notifikasi', {
        content: "Notifikasi",
    });
</script>

<script>
    tippy('#Pengaturan', {
        content: "Pengaturan",
    });
</script>
<!-- akhir -->




<!-- membuat dropdown multipel select -->
<script>
    $(document).ready(function() {

        $("#jenis_obat").select2({
            maximumSelectionLength: 2,
            placeholder: "  -- Pilih --",
            allowClear: true
        });
    });
</script>

<!-- image preview -->
<!-- <script type="text/javascript">
        function tampil() {
            //id input
            const ftuser = document.querySelector('#label1');
            //nama clas dr label
            const ftuserLabel = document.querySelector('.control-label');
            //nama class dr gambar
            const imgPreview = document.querySelector('.img-preview');


            ftuserLabel.textContent = ftuser.files[0].name;

            const fileUser = new FileReader();
            fileUser.readAsDataURL(ftuser.files[0]);

            fileUser.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>

    <script type="text/javascript">
        function previewImage() {
            document.getElementById("image-preview").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("ftuser").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview").src = oFREvent.target.result;
            };
        };
    </script> -->
</body>
<!-- saat nama obat di pilih maka kode obat keluar otomatis (expload) -->
<script type="text/javascript">
    function kdobat() {
        var obat = document.getElementById("nama_obat").value;
        var explode = obat.split("|");
        document.getElementById("kode_obat").value = explode[0];
        document.getElementById("satuan").value = explode[1];



    }
</script>

<!-- user -->
<script type="text/javascript">
    function kduser() {
        var user = document.getElementById("username").value;
        var explode = user.split("|");
        document.getElementById("id_user").value = user;

    }
</script>

<!-- supplier -->
<script type="text/javascript">
    function kdsupplier() {
        var supplier = document.getElementById("nama_supplier").value;
        var explode = supplier.split("|");
        document.getElementById("id_supplier").value = supplier;

    }
</script>

<!-- nama obat di transaksi obat masuk -->
<script type="text/javascript">
    function kdobat_mas() {
        var obat = document.getElementById("nama_obat").value;
        var explode = obat.split("|");
        document.getElementById("kode_obat1").value = obat;

    }
</script>

<!-- membatasi jumlah stok yg keluar
<script type="text/javascript">
    function jml_keluar() {
        var jml = document.getElementById("jml_keluar").;
        var explode = jml.split("|");
        document.getElementById("jml_keluar").value = jml;

    }
</script> -->

<style>
    @media print {
        @page {
            margin-top: 30px;
            margin-bottom: 10px;
        }

        .row .col-xs-6,
        .row .col-sm-5,
        .row .col-sm-7,
        footer,
        a#debug-icon-link,
        .box-body .col-sm-6,
        .form-group .btn-submit,
        .content .hapus,
        .hr1 {
            display: none;
        }

        .kotak {
            display: contents;
        }
    }
</style>




<!-- Fungsi untuk membatasi karakter yang diinputkan -->
<script language="javascript">
    function getkey(e) {
        if (window.event)
            return window.event.keyCode;
        else if (e)
            return e.which;
        else
            return null;
    }

    function goodchars(e, goods, field) {
        var key, keychar;
        key = getkey(e);
        if (key == null) return true;

        keychar = String.fromCharCode(key);
        keychar = keychar.toLowerCase();
        goods = goods.toLowerCase();

        // check goodkeys
        if (goods.indexOf(keychar) != -1)
            return true;
        // control keys
        if (key == null || key == 0 || key == 8 || key == 9 || key == 27)
            return true;

        if (key == 13) {
            var i;
            for (i = 0; i < field.form.elements.length; i++)
                if (field == field.form.elements[i])
                    break;
            i = (i + 1) % field.form.elements.length;
            field.form.elements[i].focus();
            return false;
        };
        // else return false
        return false;
    }
</script>

<!-- Select2 -->
<script src="<?= base_url() ?>/template/bower_components/select2/dist/js/select2.full.min.js"></script>

<!-- membuat dropdown search -->
<script type="text/javascript">
    $('.select2').select2()
</script>

</html>