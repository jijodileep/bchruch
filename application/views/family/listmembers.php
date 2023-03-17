<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Family Members</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Family Members</li>
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
            <a href="<?php echo base_url(); ?>family/addmembers">Add Members</a>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="user_data" class="table table-bordered table-striped">  
                     <thead>  
                          <tr>  
                               <th width="10%">ID</th>  
                               <th width="35%">Name</th>
                               <th width="25%">date_of_birth</th>
                               <th width="15%">cpr_no</th> 
                               <th width="20%">dependency</th>

                               <th></th>  
                               <th></th>
                               <th></th>

                          </tr>  
                     </thead>  
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
<script type="text/javascript" language="javascript">
  $(document).ready(function() {
    var dataTable = $('#user_data').DataTable({
      "processing": true,
      "serverSide": true,
      "order": [],
      "ajax": {
        url: "<?php echo base_url() . 'family/fetch_user'; ?>",
        type: "POST"
      } 
    });
  });

  
</script>