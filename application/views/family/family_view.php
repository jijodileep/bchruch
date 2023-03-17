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
                                        <h2 class="card-title">Family</h2>
                                    </div>
                                    <div class="col-6">
                                        <a class="btn btn-primary float-right"
                                            href="<?php echo base_url(); ?>family">Back</a>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-6">
                                        <div class="text-left">
                                            <div id="imagediv"></div>
                                            <!-- <img class="profile-user-img img-fluid img-circle"
                                                src="<?php echo base_url('uploads/images/'); ?>" + result.photo
                                                alt="Photo"> -->
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Name:</label>
                                            </div>


                                            <div class="col-6">
                                                <p class="text-muted" id="fanm"></p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label>House Name:</label>
                                            </div>


                                            <div class="col-6">
                                                <p class="text-muted" id="hnam">
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Permanent Address:</label>
                                            </div>


                                            <div class="col-6">
                                                <p class="text-muted" id="paddr"> </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Communication Address:</label>
                                            </div>


                                            <div class="col-6">
                                                <p class="text-muted" id="commaddr">
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Date of Birth:</label>
                                            </div>


                                            <div class="col-6">
                                                <p class="text-muted" id="dob">
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Designation :</label>
                                            </div>


                                            <div class="col-6">
                                                <p class="text-muted" id="designation">
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Blood Group :</label>
                                            </div>


                                            <div class="col-6">
                                                <p class="text-muted" id="bloodgrp">
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Parish Name :</label>
                                            </div>


                                            <div class="col-6">
                                                <p class="text-muted" id="parish">
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Family Cell Name :</label>
                                            </div>


                                            <div class="col-6">
                                                <p class="text-muted" id="fcellname">
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Zone :</label>
                                            </div>


                                            <div class="col-6">
                                                <p class="text-muted" id="zone">
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Area :</label>
                                            </div>


                                            <div class="col-6">
                                                <p class="text-muted" id="area">
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Contact No :</label>
                                            </div>


                                            <div class="col-6">
                                                <p class="text-muted" id="contactno">
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Whatsapp :</label>
                                            </div>


                                            <div class="col-6">
                                                <p class="text-muted" id="whatsapp">
                                                </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Email ID :</label></td>
                                            </div>


                                            <div class="col-6">
                                                <p class="text-muted" id="emailid"></p>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-6">

                                        <!-- <div class="form-group">
                                            <label>Country</label>
                                            <input type="text" class="form-control" style="width:300px" id="country"
                                                name="country" placeholder="Country">
                                        </div> -->

                                        <div class="card-body">
                                            <div id="carouselExampleIndicators" class="carousel slide"
                                                data-ride="carousel">
                                                <ol class="carousel-indicators">


                                                    <li data-target="#carouselExampleIndicators" data-slide-to="0"
                                                        class="active"></li>
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                                </ol>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100"
                                                            src="https://placehold.it/900x500/39CCCC/ffffff&text=I+Love+Bootstrap"
                                                            alt="First slide">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100"
                                                            src="https://placehold.it/900x500/3c8dbc/ffffff&text=I+Love+Bootstrap"
                                                            alt="Second slide">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100"
                                                            src="https://placehold.it/900x500/f39c12/ffffff&text=I+Love+Bootstrap"
                                                            alt="Third slide">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleIndicators"
                                                    role="button" data-slide="prev">
                                                    <span class="carousel-control-custom-icon" aria-hidden="true">
                                                        <i class="fas fa-chevron-left"></i>
                                                    </span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleIndicators"
                                                    role="button" data-slide="next">
                                                    <span class="carousel-control-custom-icon" aria-hidden="true">
                                                        <i class="fas fa-chevron-right"></i>
                                                    </span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>



                                    </div>



                                </div>





                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->


                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
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

        var id = $("#id").val();

        $.ajax({

            url: "<?php echo site_url('family/getfamilyview'); ?>/" + id,
            async: false,
            success: function (results) {

                var result = JSON.parse(results);

                $("#fanm").html(result.fname);
                $("#hnam").html(result.house_name);
                $("#paddr").html(result.permanent_addr);
                $("#commaddr").html(result.comm_addr);
                $("#dob").html(result.date_of_birth);
                $("#designation").html(result.designation);
                $("#bloodgrp").html(result.bloodgroup);
                $("#parish").html(result.parish_name);
                $("#fcellname").html(result.family_cell_name);
                $("#zone").html(result.zone);
                $("#area").html(result.area);
                $("#contactno").html(result.contact_no);
                $("#whatsapp").html(result.whatsapp);
                $("#emailid").html(result.emailid);

                $("#imagediv").attr("src", "<?php echo base_url('uploads/images/'); ?>" + result.photo);
                var text = '<img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('uploads/images/'); ?>' + result.photo + '" alt="Smiley face" height="42" width="42">';
                $('#imagediv').html(text);
            }

        });

        $.ajax({

            url: "<?php echo site_url('family/ getfamilymembers'); ?>/" + id,
            async: false,
            success: function (results) {

                var result = JSON.parse(results);
           

            }

        });


    });



</script>