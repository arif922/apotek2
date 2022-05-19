<?php
$usr = session()->get('username');
$fto = session()->get('foto');
$jbt = session()->get('hak_akses');
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- <div class="user-panel" style="height: 70px;">
            <div class="pull-left image">
                <img src="/img/<?= $fto; ?>" class="img-circle" alt="User Image" style="height: 50px;">
            </div>
            <div class="pull-left info">
                <p class="center"><?= $usr; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div> -->
        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form> -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header" style="background-color: #1A2226; color: #B8C7CE;">MAIN MENU</li>

            <li>
                <a href="/dashboard">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>

            <!-- DATA MASTER -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-database"></i>
                    <span>Data Master</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li><a href="/data_supplier/view"><i class="fa fa-circle-o"></i> Data Supplier</a></li>
                    <li><a href="/data_obat/view"><i class="fa fa-circle-o"></i> Data Obat</a></li>

                </ul>
            </li>


            <!-- 
            Transkasi
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Transkasi</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu siderbar1">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Data Stok</a></li>
                </ul>
            </li> -->
            <!-- <li class="header" style="background-color: #1A2226; color: #4B646F;">
                <a href="#">
                <i class="fa fa-shopping-cart" style="margin-left: 3%;"></i> <span style="margin-left: 8px;">Transaksi</span>
                </a>
            </li> -->
            <li class="header" style="background-color: #1A2226; color: #B8C7CE;">TRANSAKSI</li>

            <li><a href="/obat_masuk/view"><i class="glyphicon glyphicon-save-file"></i> <span>Obat Masuk</span> </a></li>
            <li><a href="/obat_keluar/view"><i class="glyphicon glyphicon-open-file"></i> <span>Obat Keluar</span></a></li>

            <!-- Laporan -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart"></i>
                    <span>Laporan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/lap_obmasuk/view"><i class="fa fa-circle-o"></i> Obat Masuk</a></li>
                    <li><a href="/lap_obkeluar/view"><i class="fa fa-circle-o"></i> Obat Keluar</a></li>
                    <li><a href="/lap_stok/view"><i class="fa fa-circle-o"></i> Stok Obat</a></li>
                </ul>
            </li>

            <li class="header" style="background-color: #1A2226; color: #B8C7CE;">LABELS</li>
            <?php
            if ($jbt == 'APA') { ?>
                <li><a href="/data_user/view"><i class="fa fa-user"></i><span> Manajemen User</span></a></li>
            <?php  } ?>
        </ul>
    </section>
    <!-- /.sidebar -->

</aside>