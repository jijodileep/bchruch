<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Family</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Family</li>
          </ol>
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>
  
  <form id="formfamily" action="<?php echo base_url();?>family/save" method="post" enctype="multipart/form-data" >
  <input type="hidden" id="id" name="id" value="<?php echo $id?>"/>
  <input type="hidden" value="<?php echo $view?>" name="view" id="view" />
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Family</h3>
            </div>
            <a href="<?php echo base_url();?>family">Back</a>
            <div class="card card-primary"> 
            <!-- /.card-header -->
            <div class="card-body">
          
            <!-- /.row -->

           
            <!-- /.row -->
          </div>
            </div>

            <div>
           
            <div class="row">    
            <div class="col-md-4">
              <div class="form-group">
                    <label for="name"> Member Name</label>
                    <input type="text" class="form-control"  style="width:300px"id="membername" name="membername" placeholder="Member Name">
                  </div>
                  <div class="form-group">
                  <label for="dependency">Dependency</label>
                  <select name="dependency" id="dependency" class="form-control"
                                        data-validation="required">
                                        <option value="">Select</option>
                                    </select>
                </div> 

           </div>
           <div class="col-md-4">
              <div class="form-group">
                    <label for="name">Date of Birth</label>
                    <input type="date" class="form-control"  style="width:300px"id="dob" name="dob" placeholder="Date of Birth">
                  </div>
                  <div class="form-group">
                  <label for="name">Photo</label>
                  <!-- <input type="file" name="userfile" size="20"> -->
                  <input type="file" name="file" id="file">
                                    <input type="hidden" name="file" id="file"  value=""/><br />
                                    <div id="imagediv">
                  
                  </div>

           </div>
           <div class="col-md-4">
              <div class="form-group">
                    <label for="name"> CPR No</label>
                    <input type="text" class="form-control"  style="width:300px"id="cprno" name="cprno" placeholder=" CPR No">
                  </div>

           </div>
</div>
           
            

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
      <!-- /.container-fluid -->
  </section>
  </form>
  <!-- /.content -->
</div>
<?php $this->load->view('layout/script'); ?>
<script type="text/javascript">
  $(document).ready(function () {

    $('#file').change(function () {
            var data = new FormData();
            var file = document.getElementById("file").files[0];
            if (file !== undefined) {
                data.append("file", file);
                $.ajax({
                    url: "<?php echo site_url('family/saveprofile'); ?>",
                    type: 'POST',
                    data: data,
                    processData: false,
                    contentType: false, // send it here
                    success: function (result) {
                        $('#file_id').val();
                        if (result !== "") {
                            $('#file_id').val(result);
                            var text = '<img style="height:100px;width: 100px;" src="<?php echo site_url('uploads/images/'); ?>' + result + '" alt="Smiley face" height="42" width="42">';
                            $('#imagediv').html(text);
                        }
                    }
                });

            }
        });
    
    $.ajax({
            async: false,
            url: "<?php echo site_url('family/getdependency'); ?>",
            success: function (result) {
                $('#dependency').html(result);

            }
        });

        $.ajax({
            async: false,
            url: "<?php echo site_url('family/getcountry'); ?>",
            success: function (result) {
                $('#country').html(result);

            }
        });

    $("#formfamily").submit(function(e) {

e.preventDefault(); // avoid to execute the actual submit of the form.

var form = $(this);
var actionUrl = form.attr('action');
var data = new FormData();
var file = document.getElementById("file").files[0];

data.append("file", file);
var other_data = $(formfamily).serializeArray();
            $.each(other_data, function(key, input) {
                data.append(input.name, input.value);
            });
$.ajax({
    type: "POST",
    url: actionUrl,
    data: data, // send it here
                
     // serializes the form's elements.
     processData: false,  
    contentType: false,
    success: function(data)
    {
        window.location.href = '<?php echo base_url();?>family';
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
                
                url: "<?php echo site_url('family/getdetails'); ?>/" + id,
                async:false,
                success: function (results) {
                    var result = JSON.parse(results);                   
                    $("#housename").val(result.house_name);			
                    $("#city").val(result.city);		
                    $("#contactnumber").val(result.contact_number);		
                    $("#zone").val(result.zone);		
                    $("#parishname").val(result.parish_name);		
                    $("#country").val(result.country);	

                    $("#dependency").val(result.dependency);

                    $("#mobno").val(result.mobile);		
                    $("#area").val(result.area);		
                    $("#place").val(result.place);	
                    $("#commaddr").val(result.comm_addr);	
                    $("#familycellname").val(result.family_cell_name);	
                    $("#membername").val(result.name);	
                    $("#dob").val(result.date_of_birth);	
                   // $("#photoupload").val(result.photo);
                    $("#cprno").val(result.cpr_no); 
                    var text = '<img style="height:100px;width: 100px;" src="<?php echo site_url('uploads/images/'); ?>' + result.photo + '" alt="Smiley face" height="42" width="42">';
                                    $('#imagediv').html(text);        
                }
               
            });
          
        }
        
    }

</script>