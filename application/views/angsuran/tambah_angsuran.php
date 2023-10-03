<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!DOCTYPE html>
<html>
<style>

  .input-container {
    display: flex; /* Use flexbox */
    justify-content: space-between; /* Distribute space between elements */
    align-items: center; /* Align items vertically */
    padding: 0px; /* Add some padding for better spacing */
    border: 1px none;
    background-color: white;
}
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
        <small>Data Angsuran</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Angsuran_controller/') ?>"><i class="fa fa-fw fa-child"></i>Lihat Data Angsuran</a></li>
        <li><a href="#">Tambah Angsuran</a></li>
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
            <div class="box-body">
            <!-- form start -->
            <form role="form" action="<?php echo base_url('Angsuran_controller/add'); ?>" method="post">
              <div class="form-group" >
             <label for="id_pinjaman">Pilih ID Pinjaman:</label>
                <select name="id_pinjaman" id="id_pinjaman" class="half-width-form">
                  <option value="">Pilih ID Pinjaman</option>
                <?php foreach ($pinjaman as $pinjaman_item) : ?>
                  <option value="<?php echo $pinjaman_item['id_pinjaman']; ?>"><?php echo $pinjaman_item['id_pinjaman']; ?></option>
                <?php endforeach; ?>
                </select>

                <!-- Bagian Select ID User -->
                <label for="id_user">Pilih ID User:</label>
                <select name="id_user" id="id_user" class="half-width-form">
    <!-- Pilihan id_user akan diisi secara dinamis oleh JavaScript -->
                </select>          
                </div>       
                    

                <div class="form-group">
                <label for="no_angsuran">No Angsuran</label>
                <input name="no_angsuran" id="no_angsuran" class="form-control" placeholder="No angsuran" type="text" required />
                </div>

                <div class="form-group">
                <label for="jumlah_angsuran">Jumlah Angsuran</label>
                <input name="jumlah_angsuran" id="jumlah_angsuran" class="form-control" placeholder="Jumlah Angsuran"   type="number" required />
                </div>
              
              <!-- /.box-body -->

              <div class="box-footer">
                <button class="btn btn-success" name="submit" type="submit"><i class="fa fa-fw fa-plus"></i>Simpan</button>
                <a href="<?php echo base_url('Pinjaman_controller/index') ?>" class="btn btn-danger" type="reset"><i style="margin-left: -3px;"  ></i>Batal</a>
              </div>
            </form>
          </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#id_pinjaman').on('change', function() {
        var id_pinjaman = $(this).val();
        $.ajax({
            url: '<?php echo base_url('angsuran_controller/get_id_user'); ?>',
            method: 'post',
            data: {id_pinjaman: id_pinjaman},
            dataType: 'json',
            success: function(data) {
                $('#id_user').html('<option value="">Pilih ID User</option>');
                $.each(data, function(index, value) {
                    $('#id_user').html('<option value="' + data.id_user + '">' + data.id_user + '</option>');
                });
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error('AJAX Error: ' + textStatus, errorThrown);
            }
        });
    });
});
</script>
</body>
</html>
  
