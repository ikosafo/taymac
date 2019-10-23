<?php include('config.php');

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/styles.php') ?>
</head>
<body>
<!-- START APP WRAPPER -->
<div id="app">
    <!-- START MENU SIDEBAR WRAPPER -->
    <?php require('includes/sidebar.php'); ?>
    <!-- END MENU SIDEBAR WRAPPER -->
    <div class="content-wrapper">
        <!-- START LOGO WRAPPER -->
        <?php include('includes/navbar.php') ?>
        <!-- END TOP TOOLBAR WRAPPER -->
        <div class="content">
            <!--START PAGE HEADER -->

            <!--END PAGE HEADER -->
            <!--START PAGE CONTENT -->
            <section class="page-content container-fluid" id="search_area">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <h5 class="card-header">
                                <strong>STATISTICS </strong>
                            </h5>
                            <div class="row m-0 col-border-xl">
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="card-body">
                                        <div class="icon-rounded icon-rounded-primary float-left m-r-20">
                                            <i class="icon dripicons-home"></i>
                                        </div>
                                        <h5 class="card-title m-b-5 counter" data-count="<?php

                                        $query_1 = $mysqli->query("select * from properties");
                                        echo $count_1 = mysqli_num_rows($query_1);

                                        ?>">0</h5>

                                        <h6 class="text-muted m-t-40">
                                            PROPERTIES
                                        </h6>

                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="card-body">
                                        <div class="icon-rounded icon-rounded-success float-left m-r-20">
                                            <i class="icon dripicons-user-group"></i>
                                        </div>
                                        <h5 class="card-title m-b-5 counter" data-count="<?php

                                        $query_1 = $mysqli->query("select * from tenants");
                                        echo $count_1 = mysqli_num_rows($query_1);

                                        ?>">0</h5>

                                        <h6 class="text-muted m-t-40">
                                            TENANTS
                                        </h6>

                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="card-body">
                                        <div class="icon-rounded icon-rounded-primary float-left m-r-20">
                                            <i class="icon dripicons-user"></i>
                                        </div>
                                        <h5 class="card-title m-b-5 counter" data-count="<?php

                                        $query_1 = $mysqli->query("select * from staff");
                                        echo $count_1 = mysqli_num_rows($query_1);

                                        ?>">0</h5>

                                        <h6 class="text-muted m-t-40">
                                            STAFF
                                        </h6>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <header class="text-center m-b-30 m-t-30">
                    <h1>You can now search for an applicant here!</h1>
                </header>
                <div class="row">


                    <div class="col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">
                        <form>
                            <div class="search-wrapper page-search mt-2 mb-2">
                                <button class="search-button-submit"
                                        type="submit"><i class="icon dripicons-search"></i></button>
                                <input type="text" class="search-input" id="applicant_pin"
                                       placeholder="Select Applicant for details">
                                <input type="hidden" id="applicantid"/>
                            </div>
                            <small>
                                Please search by typing applicant's name, pin, email address or profession
                            </small>


                        </form>

                    </div>

                    <div class="col-lg-3">
                        <a href="#" class="btn btn-primary btn-floating" id="search_applicant"
                           style="height: 56px">
                            <i class="zmdi zmdi-search zmdi-hc-fw text-white
                            font-size-45 v-align-text-bottom"></i>
                        </a>
                    </div>
                </div>

            </section>


            <!--END PAGE CONTENT -->
        </div>
        <!-- SIDEBAR QUICK PANNEL WRAPPER -->

        <!-- END SIDEBAR QUICK PANNEL WRAPPER -->
    </div>
</div>
<!-- END CONTENT WRAPPER -->
<!-- ================== GLOBAL VENDOR SCRIPTS ==================-->
<?php include('includes/scripts.php') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>


<script>
    //  swal({
    //      title:"Software License",
    //      text:"You are using the trial version( UNPAID) of this software which will expire on 07/04/2019 and will be inaccessible",
    //      type:"warning",
    //      confirmButtonText: "I, understand",
    //      });


    $(function () {
        $("#applicant_pin").autocomplete({
            source: "namesearch.php",
            select: function (event, ui) {
                $("#applicant_pin").val(ui.item.value); // display the selected text
                $("#applicantid").val(ui.item.id); // save selected id to hidden input
            }
            /* source: [ "PHP", "Python", "Ruby", "JavaScript", "MySQL", "Oracle" ]*/
        });
    });


    $("#search_applicant").click(function () {
        var applicantid = $("#applicantid").val();

        var error = '';
        if (applicantid == "") {
            error += 'Please enter name or pin \n';
            $("#applicant_pin").focus();
        }
        if (error == "") {
            $.ajax({
                type: "POST",
                url: "ajax/queries/search_applicant_summary.php",
                data: {applicantid: applicantid},
                beforeSend: function () {
                    $.blockUI({
                        message: '<img src="../assets/img/wait.gif" />'
                    });
                },
                success: function (text) {
                    $('#search_area').html(text);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + " " + thrownError);
                },
                complete: function () {
                    $.unblockUI();
                },
            });
        }
        else {
            $.notify(error, {position: "top center"});
        }
        return false;
    });




</script>

<script src="<?= $reg_root?>/assets/js/global/notify.js"></script>
<script src="<?= $reg_root?>/assets/js/global/jquery.blockui.min.js"></script>
<script src="<?= $reg_root?>/assets/js/global/jquery.blockUI.js"></script>

</body>
</html>
