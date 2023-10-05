<!DOCTYPE html>
<html>

<?php $this->load->view("admin/_includes/head.php") ?>


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/Profile.css">
    <?php $this->load->view("admin/_includes/head.php") ?>
  <title>Koperasi Terserah</title>

  <style>
    /* Add padding to all <td> elements in the table */
    table.bio-table td {
      padding: 4px;
      padding-left: 15px;
      font-family: Arial, Helvetica, sans-serif;
      font-size: medium;
    }

    #img-circle {
        padding: 50px;
       
    }

    h3  {
    margin-left: 15px;
}
  </style>
</head>
<body>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php $this->load->view("admin/_includes/header.php") ?>
<?php $this->load->view("admin/_includes/sidebar.php") ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Alert 
    <?php /**if ($this->session->flashdata('success')): ?>
      <div class="box-body">
        <div class="alert alert-info alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-info"></i>Alert!</h4>
          <?php echo $this->session->flashdata('success'); ?>
        </div>
      </div>
    <?php endif; */ ?>
    Alert -->

    <section class="content-header">
          <h1>
            Manage
            <small>Staff</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('Staff_controller/index') ?>"><i class="fa fa-fw fa-male"></i>  Staff</a></li>
            <li><a href="#">Staff Details</a></li>
          </ol>
        </section>

    <!-- Content Header (Page header) -->
    <section class="content-header">

<div class="container bootstrap snippets bootdey">
<div class="row">
  <div class="profile-nav col-md-3">
      <div class="panel">
          <div class="user-heading round">
              <a href="#"><center>
              <img src="<?php echo base_url('assetAdmin/dist/img/pfp1.jpg')?> " class="img-circle" id="img-circle" alt="User Image">
              </a></center> 
              <h1><center><?php echo $nama; ?></center></h1>
              <p><center><?php echo $level; ?></center></p>
              <br>
              
          </div>
         <div>
          <table class="bio-table" >
            <tr>
                <td class="active"><i class="fa fa-envelope"></i></a></td>
                <td><right><?php echo $email; ?></right></td>
            </tr>
            <tr>
                <td><i class="fa fa-phone"></i></a></td>
                <td><right><?php echo $nohp; ?></right></td>
            </tr>
          </table>
         </div>

      </div>

      <div class="panel">
          <div class="user-heading round">
              <h3>Registered</h3>
              <br>
              
          </div>
         <div>
          <table class="bio-table" >
            <tr>
                <td class="active"><i class="fa fa-calendar"></i></a></td>
                <td><right><?php echo $tanggal; ?></right></td>
            </tr>
            
          </table>
         </div>

      </div>

  </div>
  <div class="profile-info col-md-9">
      
      <div class="panel">                            
          <div class="panel-body bio-graph-info">
              <h1><b>Profile</b></h1>
              <div class="row">
    <table class="bio-table">
    <tr class="bio-row">
            <td><span>NIK</span></td>
            <td> : </td>
            <td><?php echo $nia; ?></td>
        </tr>
        <tr class="bio-row">
            <td><span>Full name</span></td>
            <td> : </td>
            <td><?php echo $nama; ?></td>
        </tr>
        <tr class="bio-row">
            <td><span>Birthday</span></td>
            <td> : </td>
            <td><?php echo $birthday; ?></td>
        </tr>
        <tr class="bio-row">
            <td><span>Place of birth</span></td>
            <td> : </td>
            <td><?php echo $tempat_lahir; ?></td>
        </tr>
        <tr class="bio-row">
            <td><span>Gender</span></td>
            <td> : </td>
            <td><?php echo $jenis_kelamin; ?></td>
        </tr>
        <tr class="bio-row">
            <td><span>Address</span></td>
            <td> : </td>
            <td><?php echo $alamat; ?></td>
        </tr>       
        
    </table>

             </div>
           </div>
          </div>
          <div class="col-md-6">
                  <div class="panel">
                      <div class="panel-body">
                          <div class="bio-chart">
                          </div>
                              <div class="bio-desk">
                              <h4 class="terques">Total Savings</h4>
                              <p><?php echo $total_savings; ?></p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="panel">
                      <div class="panel-body">
                          <div class="bio-chart">
                          </div>
                          <div class="bio-desk">
                              <h4 class="terques">Qurban </h4>
                              <p><?php echo $total_savings; ?></p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="panel">
                      <div class="panel-body">
                          <div class="bio-chart">
                          </div>
                              <div class="bio-desk">
                              <h4 class="terques">Tabungan Pokok</h4>
                              <p><?php echo $total_savings; ?></p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="panel">
                      <div class="panel-body">
                          <div class="bio-chart">
                          </div>
                              <div class="bio-desk">
                              <h4 class="terques">Tabungan Pokok</h4>
                              <p><?php echo $total_savings; ?></p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="panel">
                      <div class="panel-body">
                          <div class="bio-chart">
                          </div>
                              <div class="bio-desk">
                              <h4 class="terques">Pinjaman</h4>
                              <p><?php echo $total_debt; ?></p>
                              
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="panel">
                      <div class="panel-body">
                          <div class="bio-chart">
                          </div>
                              <div class="bio-desk">
                              <h4 class="terques">Angsuran</h4>
                              <p>Lorem</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
</div>

</section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
<?php $this->load->view("admin/_includes/footer.php") ?>
<?php $this->load->view("admin/_includes/control_sidebar.php") ?>
<?php $this->load->view("admin/_includes/bottom_script.php") ?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>







</body>
</html>
