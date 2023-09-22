<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assetAdmin/dist/img/pfp1.jpg')?> " class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

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
        <li class="header">Navigation</li>


        <li><a href="<?php echo base_url('Dashboard_controller') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="<?php echo base_url('Staff_controller') ?>"><i class="fa fa-fw fa-male"></i> <span>Staff</span></a>
        <li><a href="<?php echo base_url('Member_controller') ?>"><i class="fa fa-fw fa-users"></i> <span>Member</span></a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-tasks"></i> <span>Transaction</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('Tabungan_controller') ?>"><i class="fa fa-circle-o"></i>Saving</a></li>
            <li><a href="<?php echo base_url('Pinjaman_controller') ?>"><i class="fa fa-circle-o"></i>Loan</a></li>
            <li><a href="<?php echo base_url('Angsuran_controller') ?>"><i class="fa fa-circle-o"></i>Installments</a></li>
          </ul>
        </li>
        <!--
        <li><a href="<?php echo base_url('') ?>"><i class="fa fa-fw fa-money"></i> <span>R</span></a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-dollar"></i> <span>R</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('Angsuran_controller') ?>"><i class="fa fa-circle-o"></i>Kelola Angsuran</a></li>
            <li><a href="<?php echo base_url('Angsuran_controller/list_anggota') ?>"><i class="fa fa-circle-o"></i>Detail Angsuran</a></li>
          </ul>
        </li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
