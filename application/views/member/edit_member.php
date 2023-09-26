<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!DOCTYPE html>
<html>
  <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.input-container {
    display: flex; /* Use flexbox */
    justify-content: space-between; /* Distribute space between elements */
    align-items: center; /* Align items vertically */
    padding: 0px; /* Add some padding for better spacing */
    border: 1px none;
    background-color: white;
}

/* Style the form container */
.half-width-form {
    display: flex; /* Use flexbox */
    justify-content: space-between; /* Distribute space between elements */
    align-items: center; /* Align items vertically */
    width: 49%; /* Take full width of the container */
    padding: 7px; /* Add some padding for better spacing */
    border: 1px solid #ccc;
    background-color: white; /* Make sure the color is lowercased */
}




  </style>
<?php $this->load->view("admin/_includes/head.php") ?>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view("admin/_includes/header.php") ?>
    <!-- Sidebar -->
    <?php
        $level = $this->session->userdata('level');

        if ($level === 'admin') {
            $this->load->view("admin/_includes/sidebar.php");
        } elseif ($level === 'staff') {
            $this->load->view("admin/_includes/sb_staff.php");
        } else {
            $this->load->view("admin/_includes/sidebar.php");
        }
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <section class="content-header">
        <h1>
          Manage
          <small>Member</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-fw fa-male"></i>  Member</a></li>
          <li><a href="<?php echo base_url('Member_controller/index') ?>">See Member</a></li>
          <li><a href="#">Edit Member</a></li>
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
                <h3 class="box-title">Form</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
             
            <form action="<?php echo base_url('Member_controller/update'); ?>" method="post">
              <div class="box-body">
              
              <input type="hidden" name="id_user" value="<?php echo $id_user?>">

                <div class="form-group">
                    <label>Email</label>
                    <input name="email" class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>" placeholder="Email" type="email" value="<?php echo $email; ?>">
                    <div class="invalid-feedback">
                      <?php echo form_error('email') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Phone Number</label>
                    <input name="nohp" class="form-control <?php echo form_error('nohp') ? 'is-invalid':'' ?>" placeholder="Phone Number" type="text" value="<?php echo $nohp ?>">
                    <div class="-feedback">
                      <?php echo form_error('nohp') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Username</label>
                    <input name="username" class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>" placeholder="username" type="text" value="<?php echo $username ?>">
                    <div class="invalid-feedback">
                      <?php echo form_error('username') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <input name="password" class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>" placeholder="password" type="password" value="<?php echo $password ?>">
                    <div class="invalid-feedback">
                      <?php echo form_error('password') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>NIK</label>
                    <input name="nia" class="form-control <?php echo form_error('nia') ? 'is-invalid':'' ?>" placeholder="Masukan NIK" type="text" value="<?php echo $nia ?>">
                    <div class="invalid-feedback">
                      <?php echo form_error('nia') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Name</label>
                    <input name="nama" class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>" placeholder="Name" type="text" value="<?php echo $nama ?>">
                    <div class="invalid-feedback">
                      <?php echo form_error('name') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Gender</label>
                    <div class="radio">
                      <label>
                        <input type="radio" class="<?php echo form_error('jenis_kelamin') ? 'is-invalid':'' ?>" name="jenis_kelamin" value="Male"  <?php if ($jenis_kelamin === 'Male') echo 'checked' ?>>
                        Male
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" class="<?php echo form_error('jenis_kelamin') ? 'is-invalid':'' ?>" name="jenis_kelamin" value="Female" <?php if ($jenis_kelamin === 'Female') echo 'checked' ?>>
                        Female
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Alamat</label>
                    <input name="alamat" class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>" placeholder="Alamat" type="text" value="<?php echo $alamat ?>">
                    <div class="invalid-feedback">
                      <?php echo form_error('alamat')?>
                    </div>
                  </div>


                  <div class="form-group">
                    <label>Place and Date of Birth</label>
                    <div class="input-container " >
                      <input name="tempat_lahir" id="half-width-form" class="half-width-form <?php echo form_error('tempat_lahir') ? 'is-invalid':'' ?>" placeholder="Place of Birthday" type="text" value="<?php echo $tempat_lahir ?>">
                      <div class="invalid-feedback">
                      <?php echo form_error('tempat_lahir')?>
                      </div>
                      <input name="birthday" id="half-width-form" class="half-width-form <?php echo form_error('birthday') ? 'is-invalid':'' ?>" placeholder="Date of Birthday" type="date" value="<?php echo $birthday ?>">
                      <div class="invalid-feedback">
                      <?php echo form_error('birthday')?>
                      </div>
                    </div>            
                   </div>
                  </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <!--<button class="btn btn-success" name="save" type="save"><i class="fa fa-fw fa-plus"></i>Update</button>-->
                <input class="btn btn-success" name="save" type="submit" value="save">
                <a href="<?php echo base_url('Member_controller/index') ?>" class="btn btn-danger" type="reset"><i style="margin-left: -3px;"  ></i>cancel</a>
              </div>
            </form>
            
            </div>
            <!-- /.box -->

          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $cm ?></h3>

                  <p>Total Member</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer"> </a>
              </div>
            </div>
          <!-- ./col -->
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