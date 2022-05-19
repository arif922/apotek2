<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Aplikasi Persediaan Obat pada Apotek">
    <meta name="author" />

    <!-- favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>/template/assets/img/favicon.png" />

    <!-- Bootstrap 3.3. -->
    <link href="<?= base_url() ?>/template/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?= base_url() ?>/template/assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?= base_url() ?>/template/assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?= base_url() ?>/template/assets/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>/template/assets/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body class="login-page bg-login">
    <div class="login-box">


        <!-- pesan validasi error -->
        <?php if (session()->getFlashdata('terdaftar')) : ?>
            <div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='icon fa fa-check-circle'></i> <?= session()->getFlashdata('terdaftar'); ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('gagal')) : ?>
            <div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <li> <?= session()->getFlashdata('gagal'); ?></li>
            </div>
        <?php endif; ?>


        <div class="login-box-body">
            <p class="login-box-msg"> Masukkan Password Baru</p>
            <br />

            <form method="POST" action="<?php echo base_url('/auth/ubahpass') ?>">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="email" autocomplete="off" value="<?= session()->getFlashdata('email'); ?>" readonly />
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control form-password" name="pass" placeholder="Password Baru" autocomplete="off" required />
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="checkbox" id="show-hide" class="form-checkbox" name="show-hide" value="" />
                    <label for="show-hide">&nbsp; Tampilkan Password</label>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-lg btn-block btn-flat">Reset</button>
                        <a href="<?php echo base_url('') ?>" class="btn btn-default btn-lg btn-block btn-flat">Batal</a>
                        <!-- <input type="submit" class="btn btn-primary btn-lg btn-block btn-flat" name="login" value="Login" /> -->
                    </div><!-- /.col -->
                </div>

            </form>

        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="<?= base_url() ?>/template/assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?= base_url() ?>/template/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- manampilkan password -->
    <script src="<?= base_url() ?>/template/assets/js/myjs.js"></script>
    <style>
        @media screen {
            a#debug-icon-link {
                display: none;
            }
        }
    </style>
</body>

</html>