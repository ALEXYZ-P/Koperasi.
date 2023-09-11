<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!DOCTYPE html>
<html>
<?php $this->load->view("admin/_includes/head.php") ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view("admin/_includes/header.php") ?>
  <?php $this->load->view("admin/_includes/sidebar.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Alert -->
      <?php if ($this->session->flashdata('success')): ?>
        <div class="box-body">
          <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-info"></i>Alert!</h4>
            <?php echo $this->session->flashdata('success'); ?><br>
            <a href="<?php echo base_url('Anggota_controller/detail/'.$pasangan->id_anggota) ?>">Saya Mengerti</a>
          </div>
        </div>
      <?php endif; ?>
      <!-- Alert -->

    <section class="content-header">
      <h1>
        Kelola
        <small>Data Simpanan Pokok</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Pinjaman_controller/list_anggota') ?>"><i class="fa fa-fw fa-child"></i>Lihat Data Anggota</a></li>
        <li><a href="#">Tambah Simpanan Pokok</a></li>
      </ol>
    </section>
    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pengisian Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url('Pinjaman_controller/add'); ?>" method="post">
                                <div class="form-group">
                                    <label for="id_user">User</label>
                                    <select name="id_user" id="id_user" class="form-control">
                                        <?php foreach ($users as $user) : ?>
                                            <option value="<?php echo $user['id_user']; ?>"><?php echo $user['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="no_pinjaman">No Pinjaman</label>
                                    <input name="no_pinjaman" id="no_pinjaman" class="form-control" placeholder="No pinjaman" type="text" required />
                                </div>

                                <div class="form-group">
                                    <label for="jumlah_pinjaman">Jumlah Pinjaman</label>
                                    <input name="jumlah_pinjaman" id="jumlah_pinjaman" class="form-control" placeholder="Jumlah pinjaman" step="0,1" type="number" required />
                                </div>

                                <div class="form-group">
                                    <label for="lama">Lama (bulan)</label>
                                    <input name="lama" id="lama" class="form-control" placeholder="Lama (bulan)" type="number" required />
                                </div>

                                <div class="form-group">
                                    <label for="bunga">Bunga (% per bulan)</label>
                                    <input name="bunga" id="bunga" class="form-control" placeholder="Bunga (% per bulan)" type="number" required />
                                </div>

                                <button class="btn btn-success" type="submit" name="submit"><i class="fa fa-fw fa-plus"></i>Save</button>
                                <a href="<?php echo base_url('Pinjaman_controller/index') ?>" class="btn btn-danger" type="button"><i style="margin-left: -3px;"></i>Cancel</a>
                            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view("admin/_includes/footer.php") ?>
  <?php $this->load->view("admin/_includes/control_sidebar.php") ?>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php $this->load->view("admin/_includes/bottom_script_view.php") ?>
<!-- page script -->
</body>
</html>
  