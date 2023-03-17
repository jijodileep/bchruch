<div class="content-wrapper">
  <br />


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
          <div class="card-header">
                <div class="row">
                  <div class="col-6">
                  <h2 class="card-title">Family Members</h2>
                  </div>
                  <div class="col-6">
                  <a class="btn btn-primary float-right" href="<?php echo base_url(); ?>familymembers/create/<?php echo $id?>">Create</a>
                  </div>
                </div>

              </div>
              <input type="hidden" id="id" name="id" value="<?php echo $id?>"/>
            <input type="hidden" id="fid" name="fid" value="<?php echo $fid?>"/>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="user_data" class="table table-bordered table-striped">  
                     <thead>  
                          <tr>  
                               <th width="10%">ID</th>  
                               <th width="35%">Name</th>
                               <th width="25%">Date of Birth</th>
                               <th width="15%">CPR No</th> 
                               <th width="20%">Dependency</th>

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
    var id=$('#id').val();
    var dataTable = $('#user_data').DataTable({
      "processing": true,
      "serverSide": true,
      "order": [],
      "ajax": {
        url: "<?php echo base_url() . 'familymembers/listmembers'; ?>/"+id,
        type: "POST",
        data: {id: id}

      
      } 
    });


    
  });
  function deleteFun(id)
		{
			if(confirm('Are you sure?')==true)
			{
				$.ajax({
				
          url: "<?php echo base_url() . 'familymembers/delete'; ?>/"+id,
					method:"post",
					dataType:"json",
					data:{id:id},
          success:function(data)  
                     {  
                          $('#user_data').DataTable().ajax.reload(); 
                     }  
				})
			}
		}


</script>