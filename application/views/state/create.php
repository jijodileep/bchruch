<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>State</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">State</li>
          </ol>
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>
  
  <form action="<?php echo base_url();?>index.php/State/save" method="post">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"></h3>
            </div>
            <a href="<?php echo base_url();?>index.php/State/listall">Back</a>
            <!-- /.card-header -->
            <div class="card-body">
             <div>
                State:
             </div>
             <div><input type="text" id="state" name="state"<?php echo $data['state']; ?>/></div>

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>  
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </section>
  </form>
  <!-- /.content -->
</div>
<?php $this->load->view('layout/script'); ?>
<script type="text/javascript">
  $(document).ready(function () {

  });

</script>