<!DOCTYPE html>
<html lang="en">
<style>

</style>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Church</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>Church</b></a>
      </div>
      <div class="card-body">

        <div class="alert alert-danger print-error-msg" style="display:none">
        </div>

        <form id="formlogin" method="post" action="<?php echo base_url(); ?>login/user_login_process">
          <div class="input-group mb-3">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email">

            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>

          </div>
          <span style="color:red" id="errormsg1"></span>
          <div class="input-group mb-3">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">

            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>

          </div>
          <p class="login-box-msg" style="color:red "  id="errormsg2"></p>
          <!-- <span style="color:red " id="errormsg2"></span> -->
          <div class="row">
            <div class="col-4">

            </div>
            <!-- /.col -->
            <div class="col-4">
              <!-- <button type="submit" class="btn btn-primary btn-block"  onclick="submitform()">Sign In</button> -->
              <button type="submit" id="btn" name="btn" class="btn btn-primary btn-block">Submit</button>
              <!-- <input type="submit" name="submit" class="btn btn-primary btn-block" value="submit"/> -->

            </div>

            <div class="col-4">

            </div>
            <!-- /.col -->
          </div>
        </form>


        <!-- /.social-auth-links -->


      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>assets/dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
</body>

</html>
<script type="text/javascript">
  $(document).ready(function () {

    $("#formlogin").submit(function (e) {

      e.preventDefault(); // avoid to execute the actual submit of the form.

      var form = $(this);
      var actionUrl = form.attr('action');

      $.ajax({
        type: "POST",
        url: actionUrl,
        data: form.serialize(), // serializes the form's elements.
        success: function (data) {
          if (parseInt(data) == 1) {
            window.location.href = '<?php echo base_url(); ?>family';

          }
          else {

            $('#errormsg2').html('Invalid Email or Password');

          }


        }
      });

    });

    


  });




</script>