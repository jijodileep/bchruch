<div class="content-wrapper">
  <br />
  <!-- Content Header (Page header) -->


  <form id="formfamily" action="<?php echo base_url(); ?>family/save" method="post" enctype="multipart/form-data">
    <input type="hidden" id="id" name="id" value="<?php echo $id ?>" />
    <input type="hidden" id="fid" name="fid" value="<?php echo $fid ?>" />
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
                    <h2 class="card-title">Family</h2>
                  </div>
                  <div class="col-6">
                    <a class="btn btn-primary float-right" href="<?php echo base_url(); ?>family">Back</a>
                  </div>
                </div>

              </div>
              <div class="card card-primary">
                <!-- /.card-header -->
                <div class="card-body">

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>House Name</label>
                        <input type="text" class="form-control" style="width:300px" id="housename" name="housename"
                          placeholder="House Name">
                      </div>
                      <div class="form-group">
                        <label for="City"> City</label>
                        <input type="text" class="form-control" style="width:300px" id="city" name="city"
                          placeholder="City">
                      </div>
                      <div class="form-group">
                        <label for="area">Mobile Number</label>
                        <input type="text" class="form-control" style="width:300px" id="mobno" name="mobno"
                          placeholder="Mobile Number">
                      </div>


                      <div class="form-group">
                        <label for="contact Number">Contact Number</label>
                        <input type="text" class="form-control" style="width:300px" id="contactnumber"
                          name="contactnumber" placeholder="Contact Number">
                      </div>
                      <div class="form-group">
                        <label for="contact Number">Email</label>
                        <input type="text" class="form-control" style="width:300px" id="email" name="email"
                          placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="zone">Flat</label>
                        <input type="text" class="form-control" style="width:300px" id="flat" name="flat"
                          placeholder="Flat">
                      </div>
                      <div class="form-group">
                        <label for="zone">Block</label>
                        <input type="text" class="form-control" style="width:300px" id="block" name="block"
                          placeholder="Block">
                      </div>
                      <!-- /.form-group -->

                      <!-- /.form-group -->
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="Parish Name">Parish Name</label>
                        <input type="text" class="form-control" style="width:300px" id="parishname" name="parishname"
                          placeholder="Parish Name">
                      </div>
                      <div class="form-group">
                        <label for="Country">Country</label>
                        <select name="country" id="country" class="form-control" data-validation="required">
                          <option value="">Select</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="zone">Zone</label>
                        <input type="text" class="form-control" style="width:300px" id="zone" name="zone"
                          placeholder="Zone">
                      </div>
                      <div class="form-group">
                        <label for="zone">Whatsapp</label>
                        <input type="text" class="form-control" style="width:300px" id="whattsapp" name="whattsapp"
                          placeholder="Whatsapp">
                      </div>
                      <div class="form-group">
                        <label for="zone">Road</label>
                        <input type="text" class="form-control" style="width:300px" id="road" name="road"
                          placeholder="Road">
                      </div>


                      <div class="form-group">
                        <label for="zone">Building</label>
                        <input type="text" class="form-control" style="width:300px" id="building" name="building"
                          placeholder="Building">
                      </div>


                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="Place"> Place</label>
                        <input type="text" class="form-control" style="width:300px" id="place" name="place"
                          placeholder="Place">
                      </div>
                      <!-- /.form-group -->



                      <div class="form-group">
                        <label for="familycellname">Family Cell Name</label>
                        <input type="text" class="form-control" style="width:300px" id="familycellname"
                          name="familycellname" placeholder="Family Cell Name">
                      </div>
                      <div class="form-group">
                        <label for="area">Area</label>
                        <input type="text" class="form-control" style="width:300px" id="area" name="area"
                          placeholder="Area">
                      </div>
                      <div class="form-group">
                        <label for="communicationAddress">Communication Address</label>
                        <textarea class="form-control" rows="3" style="width:300px" id="commaddr" name="commaddr"
                          placeholder="Communication Address"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="communicationAddress">Permanent Address</label>
                        <textarea class="form-control" rows="3" style="width:300px" id="permaddr" name="permaddr"
                          placeholder="Permanent Address"></textarea>
                      </div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->


                  <!-- /.row -->
                </div>
              </div>

              <div>

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



                  </div>


                  <div>
                    <?php if ($view != 'view') { ?>
                      <button type="submit" id="btn" nmae="btn" class="btn btn-primary">Submit</button>
                    <?php } ?>
                  </div>
                  <!-- /.card-body -->

                  <!-- /.card -->
                </div>
              </div>

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
    var eid = $("#enq").val();
    var view = $("#view").val();
    var type = $("#type").val();

    if (id > 0) {
      var st = 0;
      var dis = 0;
      $.ajax({

        url: "<?php echo site_url('family/getdetails'); ?>/" + id,
        async: false,
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
          $("#membername").val(result.fname);
          $("#dob").val(result.date_of_birth);
          $("#whattsapp").val(result.whtattsapp);
          $("#email").val(result.email);
          $("#road").val(result.road);
          $("#flat").val(result.flat);
          $("#building").val(result.building);
          $("#permaddr").val(result.permanent_addr);
          $("#block").val(result.block);      

          // $("#photoupload").val(result.photo);
          $("#cprno").val(result.cpr_no);
          $("#fid").val(result.family_id);
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