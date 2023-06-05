<!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?= base_url() ?>public/lte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?= $this->session->userdata('nama'); ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <?php if($this->session->userdata('level') == '1'){ ?>
            <li class="dashboard" id="dashboard">
              <a href="<?= base_url() ?>dashboard">
                <i class="fa fa-th"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="treeview master">
                <a href="#">
                    <i class="fa fa-database"></i> <span>Data Master</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="ibu"><a href="<?= base_url() ?>ibu"><i class="fa fa-circle-o"></i> Data Ibu</a></li>
                    <li class="anak"><a href="<?= base_url() ?>anak"><i class="fa fa-circle-o"></i> Data Anak</a></li>
                    <li class="jenis"><a href="<?= base_url() ?>jenisimunisasi"><i class="fa fa-circle-o"></i> Jenis Imunisasi</a></li>
                    <li class="kader"><a href="<?= base_url() ?>kader"><i class="fa fa-circle-o"></i> Data Kader</a></li>
                </ul>
            </li>
            <li class="addtimbang">
                <a href="<?= base_url() ?>timbang/add">
                    <i class="fa fa-dashboard"></i> <span>Timbang Anak</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-balance-scale"></i> <span>Hasil Timbang</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url() ?>timbang"><i class="fa fa-circle-o"></i> Data Timbang</a></li>
                    <li><a href="<?= base_url() ?>statusgizi"><i class="fa fa-circle-o"></i> Data Status Gizi Anak</a></li>
                    <!-- <li><a href="<?= base_url() ?>viewBGM') }}"><i class="fa fa-circle-o"></i> Data BGM dan 2T</a></li> -->
                </ul>
            </li>
            <li>
                <a href="<?= base_url() ?>imunisasi">
                    <i class="fa fa-eyedropper"></i> <span>Imunisasi</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>vitA">
                    <i class="fa fa-medkit"></i> <span>Vitamin A</span>
                </a>
            </li>
            <li class="agenda">
                <a href="<?= base_url() ?>agenda">
                    <i class="fa fa-calendar"></i> <span>Agenda</span>
                </a>
            </li>
            <?php } ?>
            <li class="laporan" id="laporan">
              <a href="<?= base_url() ?>laporan">
                <i class="fa fa-file"></i> <span>Laporan</span>
              </a>
            </li>
            <li class="profil" id="profil">
              <a href="<?= base_url() ?>profil">
                <i class="fa fa-user"></i> <span>Profil Pengguna</span>
              </a>
            </li>
            <li>
              <a href="<?= base_url() ?>login/logout">
                <i class="fa fa-sign-out"></i> <span>Logout</span>
              </a>
            </li>
            
          </ul>
        </section>
        <!-- /.sidebar -->