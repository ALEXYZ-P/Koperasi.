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
      <div class="alert alert-success">
          <?= $this->session->flashdata('success') ?>
      </div>
      <?php elseif ($this->session->flashdata('error')): ?>
          <div class="alert alert-danger">
              <?= $this->session->flashdata('error') ?>
          </div>
      <?php endif; ?> 
      <!-- Alert -->

        <section class="content-header">
          <h1>
            Manage
            <small>Staff</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-fw fa-male"></i>  Staff</a></li>
            <!-- <li><a href="#">See Staff</a></li> -->
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <a href="<?php echo base_url('Staff_controller/add') ?>" class="btn btn-tosca"><i class="fa fa-fw fa-plus"></i>Add</a>
                  <!-- <a href="<?php echo base_url("Staff_controller/export"); ?>" class="btn btn-carot"><i class="fa fa-fw fa-download"></i>Export Data</a>
                  <a class="btn btn-ijo" href="<?php echo base_url("Staff_controller/form"); ?>"><i class="fa fa-fw fa-upload"></i>Import Data</a> -->
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-hover"><!--search bar--> 
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIK</th>
                      <th>Name</th>
                      <th>Gender</th>
                      <th>Address</th>
                      <th>Phone Number</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;?>
                    <?php foreach ($user as $value): ?>
                      <tr>
                        <td><?php cetak($no++) ?></td>
                        <td><?php cetak($value->nia)  ?></td>
                        <td><?php cetak($value->nama ) ?></td>
                        <td><?php cetak($value->jenis_kelamin)  ?></td>
                        <td><?php cetak($value->alamat)  ?></td>
                        <td><?php cetak($value->nohp) ?></td>
                        <td>
                          <a class="btn btn-ref" href="<?php echo site_url('Staff_controller/edit_data/'.$value->id_user) ?>"><i class="fa fa-fw fa-edit"></i> Edit</a>

                          <a onclick="deleteConfirm('<?php echo site_url('Staff_controller/delete/'.$value->id_user) ?>')" href="#!" class="btn btn-danger" class="btn btn-mandarin"><i class="fa fa-fw fa-trash"></i> Delete</a>
    
                          <a class="btn btn-warning" href="<?php echo site_url('Staff_controller/detail/'.$value->id_user) ?>"><i class="fa fa-fw fa-users"></i>Detail</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIK</th>
                      <th>Name</th>
                      <th>Gender</th>
                      <th>Address</th>
                      <th>Phone Number</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
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

 <!-- Logout Delete Confirmation-->

 <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Deleted data cannot be recovered.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>

 <!-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>-->
<!-- ./wrapper -->
<?php $this->load->view("admin/_includes/bottom_script_view.php") ?>
<!-- page script -->
<script>
function deleteConfirm(url){
  $('#btn-delete').attr('href', url);
  $('#deleteModal').modal();
}
</script>
</body>
</html>
