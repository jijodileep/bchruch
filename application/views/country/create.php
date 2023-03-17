<div class="content-wrapper">
  <br />

  <form id="formfamily" action="<?php echo base_url(); ?>country/save" method="post" enctype="multipart/form-data">
    <input type="hidden" id="id" name="id" value="<?php echo $id ?>" />
   
    <input type="hidden" value="<?php echo $view ?>" name="view" id="view" />
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
          <div class="card-header">
                <div class="row">
                  <div class="col-6">
                    <h2 class="card-title">Country</h2>
                  </div>
                  <div class="col-6">
                    <a class="btn btn-primary float-right" href="<?php echo base_url(); ?>country">Back</a>
                  </div>
                </div>

              </div>
            <!-- /.card-header -->
            <div class="card-body">
           
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Country</label>
                  <input type="text" class="form-control" style="width:300px" id="country" name="country" placeholder="Country">
                </div>
             
              
                 
             
                 
                <!-- /.form-group -->
               
                <!-- /.form-group -->
              </div>
             
              <!-- /.col -->
            
              <!-- /.col -->
            </div>


           

            <div>
            <?php if ($view !='view') { ?>
            <button type="submit" id="btn" nmae="btn" class="btn btn-primary">Submit</button>
            <?php } ?>
</div>  
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
            </div>
      <!-- /.container-fluid -->
  </section>
  </form>
  <!-- /.content -->
</div>
<?php $this->load->view('layout/script'); ?>
<script type="text/javascript">
  $(document).ready(function () {

    $("#formcountry").submit(function(e) {

e.preventDefault(); // avoid to execute the actual submit of the form.

var form = $(this);
var actionUrl = form.attr('action');

$.ajax({
    type: "POST",
    url: actionUrl,
    data: form.serialize(), // serializes the form's elements.
    success: function(data)
    {
        window.location.href = '<?php echo base_url();?>country';
    }
});

});

    load();
  });

  function load() {
        var id = $("#id").val();
        var eid = $("#enq").val();
        var view = $("#view").val();
        var type = $("#type").val();
        
        if (id > 0 ) {
            var st = 0;
            var dis =0;
            $.ajax({
                
                url: "<?php echo base_url('country/getdetails'); ?>/" + id,
                async:false,
                success: function (results) {
                    var result = JSON.parse(results);                   
                    $("#country").val(result.country);			
                            
                }
               
            });
          
        }
        
    }

</script>