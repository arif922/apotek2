<?php
$usr = session()->get('username');
$fto = session()->get('foto');
$jbt = session()->get('hak_akses');
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

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
            if ($jbt == 'Manajer') : ?>
                <li><a href="/data_user/view"><i class="fa fa-user"></i><span> Manajemen User</span></a></li>
            <?php endif; ?>
        </ul>
    </section>
    <!-- /.sidebar -->

</aside>