
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
        Tambah
        <small>Tabungan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('') ?>"><i class="fa fa-fw fa-child"></i>Kelola Tabnungan</a></li>
        <li><a href="#">Tambah Tabungan</a></li>
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
              <h3 class="box-title">Form tambah tabungan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url('Tabungan_controller/add/'.$tabungan->id_tabungan) ?>" method="post">
            <div class="box-body">

            <div class="form-group">
              <label for="id_user">User</label>
                <select name="id_user" id="id_user" class="form-control" <?php echo form_error('id_user') ? 'is-invalid':'' ?>>
                  <?php foreach ($users as $user) : ?>
                    <option value="<?php echo $user['id']; ?>"><?php echo $user['nama']; ?></option>
                  <?php endforeach; ?>
                </select>
                  <div class="invalid-feedback">
                    <?php echo form_error('id_user') ?>
                  </div>
            </div>

            <div class="form-group">
              <label for="jumlah_tabungan">Jumlah Tabungan : </label>
                <input name="jumlah_tabungan" id="jumlah_tabungan" class="form-control <?php echo form_error('nohp') ? 'is-invalid':'' ?>" placeholder="Jumlah tabungan" type="text"/>
                  <div class="invalid-feedback">
                    <?php echo form_error('jumlah_tabungan') ?>
                  </div>
            </div>

            <div class="form-group">
              <label for="id_jenis_tabungan">Jenis Tabungan:</label>
                <select name="id_jenis_tabungan" id="id_jenis_tabungan" class="form-control" <?php echo form_error('id_jenis_tabungan') ? 'is-invalid':'' ?>>
                  <?php foreach ($jenis_tabungan as $jenis) : ?>
                      <option value="<?php echo $jenis['id']; ?>"><?php echo $jenis['nama_jenis_tabungan']; ?></option>
                  <?php endforeach; ?>
                </select>
                  <div class="invalid-feedback">
                    <?php echo form_error('id_jenis_tabungan') ?>
                  </div>
            </div>
        
                <div class="box-footer">
                  <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-plus"></i>Save</button>
                  <a href="<?php echo base_url('Tabungan_controller/index') ?>" class="btn btn-danger" type="reset"><i style="margin-left: -3px;"  ></i>Cancel</a>
                </div>    
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
  