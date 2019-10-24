<?php

include ('../../config.php');

$i_index = $_POST['i_index'];
$getdetails = $mysqli->query("select * from billing where id = '$i_index'");
$resdetails = $getdetails->fetch_assoc();

//$user_id = $_SESSION['user_id'];
?>


<div class="card">
    <h5 class="card-header">Edit Billing <br/>
        <small style="color: red">Field Marked * are required</small>
    </h5>

    <div class="card-body">
        <form id="">
            <div class="form-group">
                <label for="billingtype">Billing Type *</label>
                <select id="billingtype">
                    <option value="">Select Billing Type</option>
                    <option <?php if (@$resdetails['billingtype'] == "Rent") echo "selected" ?>>Rent</option>
                    <option <?php if (@$resdetails['billingtype'] == "CAM Fees") echo "selected" ?>>CAM Fees</option>
                    <option <?php if (@$resdetails['billingtype'] == "Reimburse Bills") echo "selected" ?>>Reimburse Bills</option>
                    <option <?php if (@$resdetails['billingtype'] == "Other") echo "selected" ?>>Other</option>
                </select>
                <label for="billingtypeother">If Other, Specify </label>
                <input type="text" id="billingtypeother"
                       class="form-control" value="<?php echo $resdetails['billingtypeother'] ?>"
                       placeholder="Enter Other Type">
            </div>
            <hr class="dashed">
            <div class="form-group">
                <label for="billingtenant">Tenant *</label>
                <select id="billingtenant">
                    <option value="">Select Tenant</option>
                    <?php
                    $tenantid = $resdetails['billingtenant'];
                    $getname = $mysqli->query("select * from tenants where id = '$tenantid'");
                    $resname = $getname->fetch_assoc();
                    $tenantname = $resname['tenantname'];

                    $query = $mysqli->query("select * from tenants ORDER BY tenantname");
                    while ($result = $query->fetch_assoc()) { ?>
                        <option <?php if (@$tenantname == @$result['tenantname']) echo "Selected" ?>>
                            <?php echo $result['tenantname'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="billingfor">Bill For *</label>
                <input type="text" id="billingfor"
                       class="form-control" value="<?php echo $resdetails['billingfor'] ?>"
                       placeholder="Select Month and Year">
            </div>
            <div class="form-group">
                <label for="billingamount">Amount Per Month *</label>
                <input type="text" id="billingamount"
                       class="form-control" value="<?php echo $resdetails['billingamount'] ?>"
                       placeholder="Enter Amount">
            </div>
            <div class="form-group">
                <label for="billingmonthnumber">Number of Month *</label>
                <input type="text" id="billingmonthnumber"
                       class="form-control" value="<?php echo $resdetails['billingmonthnumber'] ?>"
                       placeholder="Enter Number">
            </div>
            <div class="form-group">
                <label for="billingdate">Date *</label>
                <input type="text" id="billingdate"
                       class="form-control" value="<?php echo $resdetails['billingdate'] ?>"
                       placeholder="Select Date">
            </div>

            <div class="form-group" id="billdelivered">
                <label for="exampleInputPassword1">Bill Delivered * </label>
                <br/>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1"
                           name="billdelivered" value="Yes"
                           class="custom-control-input" <?php if (@$resdetails['billdelivered'] == "Yes") echo "checked" ?>>
                    <label class="custom-control-label" for="customRadioInline1">Yes</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2"
                           name="billdelivered" value="No"
                           class="custom-control-input" <?php if (@$resdetails['billdelivered'] == "No") echo "checked" ?>>
                    <label class="custom-control-label" for="customRadioInline2">No</label>
                </div>
            </div>

            <div class="form-group">
                <label for="billingdescription">Description</label>
                <textarea class="form-control"
                          id="billingdescription"
                          placeholder="Enter description"><?php echo $resdetails['billingdescription'] ?></textarea>
            </div>

            <button type="button" id="editbillingbtn"
                    class="btn btn-warning">Edit billing
            </button>
        </form>
    </div>
</div>



<script>

    $("#billingtype").selectize();

    $("#billingtenant").selectize();

    $('#billingdate').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        orientation: "bottom",
        templates: {
            leftArrow: '<i class="icon dripicons-chevron-left"></i>',
            rightArrow: '<i class="icon dripicons-chevron-right"></i>'
        }
    });

    $('#billingfor').datepicker({
        format: "mm-yyyy",
        viewMode: "months",
        minViewMode: "months",
        autoclose: true,
        orientation: "bottom",
        templates: {
            leftArrow: '<i class="icon dripicons-chevron-left"></i>',
            rightArrow: '<i class="icon dripicons-chevron-right"></i>'
        }
    });


    $("#editbillingbtn").click(function () {

        var billingtype = $("#billingtype").val();
        var billingtypeother = $("#billingtypeother").val();
        var billingtenant = $("#billingtenant").val();
        var billingfor = $("#billingfor").val();
        var billingamount = $("#billingamount").val();
        var billingmonthnumber = $("#billingmonthnumber").val();
        var billingdate = $("#billingdate").val();
        var billingdescription = $("#billingdescription").val();
        var billdelivered = $('input[name=billdelivered]:checked').val();
        var i_index = '<?php echo $i_index ?>';
        var error = '';


        if (billingtype == "") {
            error += 'Please select billing type \n';
        }
        if (billingtype == "Other" && billingtypeother == "") {
            error += 'Please specify other billing type \n';
            $("#billingtypeother").focus();
        }
        if (billingtype != "Other" && billingtypeother != "") {
            error += 'Other type should be null  \n';
            $("#billingtypeother").focus();
        }
        if (billingtenant == "") {
            error += 'Please select Tenant \n';
            $("#billingtenant").focus();
        }
        if (billingamount == "") {
            error += 'Please enter amount \n';
            $("#billingamount").focus();
        }
        if (billingamount != "" && !billingamount.match(/^[-+]?[0-9]+\.[0-9]+$/)) {
            error += 'Please enter valid amount \n';
            $("#billingamount").focus();
        }
        if (billingmonthnumber == "") {
            error += 'Please enter number of months \n';
            $("#billingmonthnumber").focus();
        }
        if (billingmonthnumber != "" && !billingmonthnumber.match(/^[0-9]+$/)) {
            error += 'Please enter valid number of months \n';
            $("#billingmonthnumber").focus();
        }
        if (billingfor == "") {
            error += 'Please select month and year of bill \n';
        }
        if (billingdate == "") {
            error += 'Please select date \n';
        }
        if (billdelivered == undefined) {
            error += 'Please select whether bill has been delivered  \n';
        }

        if (error == "") {

            $.ajax({
                type: "POST",
                url: "ajax/queries/editbilling.php",
                beforeSend: function () {
                    $.blockUI({
                        message: '<img src="assets/img/wait.gif" style="border:0 !important"/>'
                    });
                },
                data: {
                    billingtype:billingtype,
                    billingtypeother: billingtypeother,
                    billingtenant: billingtenant,
                    billingfor: billingfor,
                    billingamount: billingamount,
                    billingmonthnumber: billingmonthnumber,
                    billingdate: billingdate,
                    billdelivered: billdelivered,
                    billingdescription: billingdescription,
                    i_index:i_index
                },
                success: function (text) {
                    $.ajax({
                        url: "ajax/forms/billing_form.php",
                        success: function (text) {
                            $('#billing_form_div').html(text);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + " " + thrownError);
                        },
                    });

                    $.ajax({
                        url: "ajax/tables/billing_table.php",
                        success: function (text) {
                            $('#billing_table_div').html(text);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + " " + thrownError);
                        },
                    });

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