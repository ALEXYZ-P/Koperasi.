<!DOCTYPE html>
<html>
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

     <!-- Alert -->
      <?php if ($this->session->flashdata('success')): ?>
        <div class="box-body">
          <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-info"></i>Alert!</h4>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        </div>
      <?php endif; ?>
      <!-- Alert -->


    <section class="content-header">
      <h1>
        Manage
        <small>Installment</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-fw fa-money"></i>Installment</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="<?php echo base_url('Angsuran_controller/add') ?>" class="btn btn-tosca"><i class="fa fa-fw fa-plus"></i>Add</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th><center>No</th>
                      <th>Name</th>
                      <th><center>Loan Number</th>
                      <th><center>Installment Number</th>
                      <th>Loan Count</th>
                      <th><center>Loan period</th>
                      <th><center>Interest</th>
                      <th>Installment/M</th>
                      <th>Total Loan</th>
                      <th>Installment Count</th>
                      <th><center>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($angsuran as $value) : ?>
                            <tr>
                              <td><center><?php echo $no++ ?></td>
                              <td><?php echo $value->nama ?></td>
                              <td><center><?php echo $value->no_pinjaman ?></td>
                              <td><center><?php echo $value->no_angsuran ?></td>
                              <td><?php echo "Rp. " . (number_format($value->jumlah_pinjaman,2,',','.')) ?></td>
                              <td><center><?php echo $value->lama ?></td>
                              <td><center><?php echo $value->bunga ?></td>
                              <td><?php echo "Rp. " . (number_format($value->cicilan,2,',','.')) ?></center></td>
                              <td><?php echo "Rp. " . (number_format($value->total_peminjaman,2,',','.')) ?></center></td>
                              <td><?php echo "Rp. " . (number_format($value->jumlah_angsuran,2,',','.')) ?></td>
                              <td><center><?php echo $value->tanggal_pinjaman ?></td>
                            </tr>
                  <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                      <th><center>No</th>
                      <th>Name</th>
                      <th><center>Loan Number</th>
                      <th><center>Installment Number</th>
                      <th>Loan Count</th>
                      <th><center>Loan period</th>
                      <th><center>Interest</th>
                      <th>Installment/M</th>
                      <th>Total Loan</th>
                      <th>Installment Count</th>
                      <th><center>Date</th>
                    </tr>
                  </tfoot>
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
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>
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
