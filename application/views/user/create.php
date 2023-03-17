<div class="content-wrapper">
    <br />

    <form id="formuser" action="<?php echo base_url(); ?>user/save" method="post" enctype="multipart/form-data">
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
                                        <h2 class="card-title">User</h2>
                                    </div>
                                    <div class="col-6">
                                        <a class="btn btn-primary float-right"
                                            href="<?php echo base_url(); ?>user">Back</a>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>User Name</label>
                                            <input type="text" class="form-control" style="width:300px" id="username"
                                                name="username" placeholder="User Name">
                                        </div>
                                       

                                    </div>
                                    <div class="col-md-4">
                                    <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" style="width:300px" id="password"
                                                name="password" placeholder="Password">
                                        </div>
                                    
                                    </div>
                                    <div class="col-md-4">
                                    <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" style="width:300px" id="email"
                                                name="email" placeholder="email">
                                        </div>
                                    </div>


                                    <!-- /.col -->

                                    <!-- /.col -->
                                </div>




                                <div>
                                    <?php if ($view != 'view') { ?>
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

        $("#formuser").submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var actionUrl = form.attr('action');

            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize(), // serializes the form's elements.
                success: function (data) {
                    window.location.href = '<?php echo base_url(); ?>user';
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

                url: "<?php echo site_url('user/getdetails'); ?>/" + id,
                async: false,
                success: function (results) {
                    var result = JSON.parse(results);
                    $("#username").val(result.username);
                    $("#password").val(result.password);
                    $("#email").val(result.email);

                }

            });

        }

    }

</script>