        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar ">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url('foto/' . session()->get('foto')) ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= session()->get('nama_user') ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li><a href="<?= base_url('home') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                    <li><a href="<?= base_url('kategori') ?>"><i class="fa fa-folder-open"></i> <span>Data Kategori</span></a></li>
                    <li><a href="<?= base_url('departemen') ?>"><i class="fa  fa-building"></i> <span>Departemen</span></a></li>
                    <li><a href="<?= base_url('user') ?>"><i class="fa fa-user"></i> <span>Data Admin</span></a></li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa  fa-file"></i>
                            <span>Arsip</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('arsip') ?>"><i class="fa fa-circle-o"></i> Surat Masuk</a></li>
                            <li><a href="<?= base_url('arsipp') ?>"><i class="fa fa-circle-o"></i> Surat Keluar</a></li>
                        </ul>
                    </li>
                    <li><a href="<?= base_url('auth/logout') ?>"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>

                </ul>


            </section>


            <!-- /.sidebar -->
        </aside>