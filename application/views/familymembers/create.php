<div class="content-wrapper">
  <br />

  <form id="formfamily" action="<?php echo base_url(); ?>familymembers/save" method="post" enctype="multipart/form-data">
    <input type="hidden" id="id" name="id" value="<?php echo $id ?>" />
    <input type="hidden" id="fid" name="fid" value="<?php echo $fid ?>" />
    <input type="hidden" value="<?php echo $view ?>" name="view" id="view" />
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
   
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-6">
                    <h2 class="card-title">Family Members</h2>
                  </div>
                  <div class="col-6">
                    <a class="btn btn-primary float-right" href="<?php echo base_url(); ?>familymembers/index/<?php echo $id ?>">Back</a>
                  </div>
                </div>

              </div>
                <!-- /.card-header -->
                <div class="card-body">


                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="name"> Member Name</label>
                        <input type="text" class="form-control" style="width:300px" id="membername" name="membername"
                          placeholder="Member Name">
                      </div>

  <div class="form-group">
                        <label for="name">Designation</label>
                        <input type="text" class="form-control" style="width:300px" id="designation" name="designation"
                          placeholder="Designation">
                      </div>

                      <div class="form-group">
                        <label for="name"> CPR No</label>
                        <input type="text" class="form-control" style="width:300px" id="cprno" name="cprno"
                          placeholder=" CPR No">
                      </div>
                      <div class="form-group">
                        <label for="name">Photo</label>
                        <!-- <input type="file" name="userfile" size="20"> -->
                        <input type="file" name="file" id="file">
                        <input type="hidden" name="file" id="file" value="" /><br />
                      </div>
                      <div id="imagediv">

                      </div>
                      

                     

                    </div>
                    <div class="col-md-4">

                    <div class="form-group">
                        <label for="name">Date of Birth</label>
                        <input type="date" class="form-control" style="width:300px" id="dob" name="dob"
                          placeholder="Date of Birth">
                      </div>
                      <div class="form-group">
                        <label for="name">Blood Group</label>
                        <input type="text" class="form-control" style="width:300px" id="bloodgroup" name="bloodgroup"
                          placeholder="Blood Group">
                      </div>
                    
                      <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" class="form-control" style="width:300px" id="emailid" name="emailid"
                          placeholder="Email">
                      </div>

                    </div>

                    <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Contact Number</label>
                        <input type="text" class="form-control" style="width:300px" id="contactno" name="contactno"
                          placeholder="Contact Number">
                      </div>
                      <div class="form-group">
                        <label for="name">Whtasapp</label>
                        <input type="text" class="form-control" style="width:300px" id="whtasapp" name="whtasapp"
                          placeholder="Whatsapp">
                      </div>
                      <div class="form-group">
                        <label for="dependency">Dependency</label>
                        <select name="dependency" id="dependency" class="form-control" data-validation="required">
                          <option value="">Select</option>
                        </select>
                      </div>

                  </div>


                  <div>
                    <?php if ($view != 'view') { ?>
                      <button type="submit" id="btn" nmae="btn" class="btn btn-primary">Submit</button>
                    <?php } ?>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.container-fluid -->
         
      </div>
    </section>
  </form>
  <!-- /.content -->
</div>
<?php $this->load->view('layout/script'); ?>
<script type="text/javascript">
  $(document).ready(function () {



    $.ajax({
      async: false,
      url: "<?php echo site_url('familymembers/getdependency'); ?>",
      success: function (result) {
        $('#dependency').html(result);

      }
    });

    $.ajax({
      async: false,
      url: "<?php echo site_url('familymembers/getcountry'); ?>",
      success: function (result) {
        $('#country').html(result);

      }
    });

    $("#formfamily").submit(function (e) {

      e.preventDefault(); // avoid to execute the actual submit of the form.

      var form = $(this);
      var actionUrl = form.attr('action');
      var data = new FormData();
      var file = document.getElementById("file").files[0];

      data.append("file", file);
      var other_data = $(formfamily).serializeArray();
      $.each(other_data, function (key, input) {
        data.append(input.name, input.value);
      });
      $.ajax({
        type: "POST",
        url: actionUrl,
        data: data, // send it here

        // serializes the form's elements.
        processData: false,
        contentType: false,
        success: function (data) {
          window.location.href = '<?php echo base_url(); ?>family';
        }
      });

    });

    load();
  });

  function load() {
    var id = $("#id").val();
    var fid = $("#fid").val();
    var view = $("#view").val();
    var type = $("#type").val();

    if (id > 0) {
      var st = 0;
      var dis = 0;
      $.ajax({

        url: "<?php echo site_url('familymembers/getdetails'); ?>/" + fid,
        async: false,
        success: function (results) {
          var result = JSON.parse(results);
          console.log(result);
          $("#membername").val(result.fname);
          $("#dob").val(result.date_of_birth);
          $("#cprno").val(result.cpr_no);
          $("#dependency").val(result.dependency);
          $("#file_id").val(result.photo);

          $("#designation").val(result.designation);
          $("#bloodgroup").val(result.bloodgroup);
          $("#contactno").val(result.contact_no);
          $("#whtasapp").val(result.whatsapp);
          $("#emailid").val(result.emailid);
          

          $("#imagediv").attr("src", "<?php echo base_url('uploads/images/'); ?>" + result.photo);
          var text = '<img style="height:100px;width: 100px;" src="<?php echo base_url('uploads/images/'); ?>' + result.photo + '" alt="Smiley face" height="42" width="42">';
          $('#imagediv').html(text);
        }

      });

    }

  }

</script>