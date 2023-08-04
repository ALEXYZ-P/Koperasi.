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

      <section class="content-header">
        <h1>
          Kelola
          <small>Data Anggota</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-fw fa-user-plus"></i> Anggota</a></li>
          <li><a href="<?php echo base_url('Pegawai_controller/index') ?>">Lihat Data Anggota</a></li>
          <li><a href="<?php echo base_url('Pegawai_controller/add') ?>">Tambah Data Anggoata</a></li>
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
              <form role="form" action="<?php echo base_url('Profile_anggota_controller/add') ?>" method="post">
                <div class="box-body">

                <div class="form-group">
                    <label>Email</label>
                    <input name="nama" class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>" placeholder="Email" type="email">
                    <div class="invalid-feedback">
                      <?php echo form_error('email') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Mobile Phone</label>
                    <input name="nohp" class="form-control <?php echo form_error('nohp') ? 'is-invalid':'' ?>" placeholder="Mobile Phone" type="text"/>
                    <div class="invalid-feedback">
                      <?php echo form_error('nohp') ?>
                    </div>
                  </div>

                <div class="form-group">
                    <label>Username</label>
                    <input name="nama" class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>" placeholder="Username" type="text">
                    <div class="invalid-feedback">
                      <?php echo form_error('username') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <input name="nama" class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>" placeholder="Password" type="password">
                    <div class="invalid-feedback">
                      <?php echo form_error('password') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Name</label>
                    <input name="nama" class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" placeholder="Name" type="text">
                    <div class="invalid-feedback">
                      <?php echo form_error('nama') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>NIK</label>
                    <input name="nia" class="form-control <?php echo form_error('nia') ? 'is-invalid':'' ?>" placeholder="NIK" type="text"/>
                    <div class="invalid-feedback">
                      <?php echo form_error('nia') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Place of birth</label>
                    <input name="nama" class="form-control <?php echo form_error('tempat_lahir') ? 'is-invalid':'' ?>" placeholder="Place of birth" type="text">
                    <div class="invalid-feedback">
                      <?php echo form_error('tempat_lahir') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Date of birth</label>
                    <input name="nama" class="form-control <?php echo form_error('birthday') ? 'is-invalid':'' ?>" placeholder="Date of birth" type="date">
                    <div class="invalid-feedback">
                      <?php echo form_error('birthdays') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Alamat</label>
                    <input name="alamat" class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>" placeholder="Address" type="text"/>
                    <div class="invalid-feedback">
                      <?php echo form_error('alamat')?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Gender</label>
                    <div class="radio">
                      <label>
                        <input type="radio" class="<?php echo form_error('jenis_kelamin') ? 'is-invalid':'' ?>" name="jenis_kelamin" value="Laki-Laki" checked="">
                        Laki-Laki
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" class="<?php echo form_error('jenis_kelamin') ? 'is-invalid':'' ?>" name="jenis_kelamin" value="Perempuan">
                        Perempuan
                      </label>
                    </div>
                  </div>

                </div>
                  
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-plus"></i>Simpan</button>
                  <?php
                                    
                    if ($this->session->flashdata('error')) {
                        echo '<div class="error" id="errror">' . $this->session->flashdata('error') . '</div>';

                    }elseif ($this->session->flashdata('error2')) {
                        echo '<div class="error">' . $this->session->flashdata('error2') . '</div>'; 

                    }elseif ($this->session->flashdata('error2')) {
                        echo '<div class="error">' . $this->session->flashdata('error3') . '</div>'; 

                    }else {

                    if($this->session->flashdata('error4')) {
                        echo '<div class="error">' . $this->session->flashdata('error4') . '</div>';

                    }
                }
                ?>

                  <a href="<?php echo base_url('Profile_anggota_controller/index') ?>" class="btn btn-danger" type="reset"><i style="margin-left: -3px;" class="fa fa-fw fa-times" ></i>Batal</a>
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
