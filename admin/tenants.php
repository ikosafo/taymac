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
            <section class="page-content container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div id="tenant_form_div"></div>
                    </div>
                    <div class="col-md-8">
                        <div id="tenant_table_div"></div>
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
<script>
    $.ajax({
        url: "ajax/forms/tenant_form.php",
        beforeSend: function () {
            $.blockUI({
                message: '<img src="assets/img/wait.gif" style="border:0 !important"/>'
            });
        },
        success: function (text) {
            $('#tenant_form_div').html(text);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + " " + thrownError);
        },
        complete: function () {
            $.unblockUI();
        },
    });

    $.ajax({
        url: "ajax/tables/tenant_table.php",
        beforeSend: function () {
            $.blockUI({
                message: '<img src="assets/img/wait.gif" style="border:0 !important"/>'
            });
        },
        success: function (text) {
            $('#tenant_table_div').html(text);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + " " + thrownError);
        },
        complete: function () {
            $.unblockUI();
        },
    });


</script>
</body>
</html>