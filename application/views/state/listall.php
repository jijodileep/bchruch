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
  

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"></h3>
            </div>
            <a href="<?php echo base_url();?>/index.php/State/create" >Create</a>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="datatable" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>SNo</th>
                    <th>State</th>
                    <th></th>

                  </tr>
                </thead>
                <tbody>
                  <?php $no = 0; ?>
                  <?php foreach ($state as $lst) {
                    $no++
                      ?>
                    <tr>
                      <td>
                        <?php echo $no; ?>
                      </td>
                      <td>
                        <?php echo $lst->state; ?>
                      </td>
                      <td><a href="<?php echo base_url();?>/index.php/State/edit/<?php echo $lst->id; ?>">Edit</a>|<a href="<?php echo base_url();?>/index.php/State/view/<?php echo $lst->id; ?>">View</a>|<a href="<?php echo base_url();?>/index.php/State/delete/<?php echo $lst->id; ?>">Delete</a></td>
                    </tr>
                    <!-- print_r($lst->state); -->




                  <?php } ?>



                </tbody>
                <tfoot>

                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?php $this->load->view('layout/script'); ?>
<script type="text/javascript">
  $(document).ready(function () {

  });

</script>