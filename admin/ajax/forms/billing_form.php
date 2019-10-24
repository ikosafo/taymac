<?php

include ('../../config.php');

//$user_id = $_SESSION['user_id'];
?>

<div class="card">
    <h5 class="card-header">Add New Billing <br/>
        <small style="color: red">Field Marked * are required</small>
    </h5>

    <div class="card-body">
        <form id="">
            <div class="form-group">
                <label for="billingtype">Billing Type *</label>
                <select id="billingtype">
                    <option value="">Select Billing Type</option>
                    <option value="Rent">Rent</option>
                    <option value="CAM Fees">CAM Fees</option>
                    <option value="Reimburse Bills">Reimburse Bills</option>
                    <option value="Other">Other</option>
                </select>
                <label for="billingtypeother">If Other, Specify </label>
                <input type="text" id="billingtypeother"
                       class="form-control"
                       placeholder="Enter Other Type">
            </div>
            <hr class="dashed">
            <div class="form-group">
                <label for="billingtenant">Tenant *</label>
                <select id="billingtenant">
                    <option value="">Select Tenant</option>
                    <?php
                    $query = $mysqli->query("select * from tenants ORDER BY tenantname");
                    while ($result = $query->fetch_assoc()) { ?>
                        <option value="<?php echo $result['id'] ?>">
                            <?php echo $result['tenantname'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="billingfor">Bill For *</label>
                <input type="text" id="billingfor"
                       class="form-control"
                       placeholder="Select Month and Year">
            </div>
            <div class="form-group">
                <label for="billingamount">Amount Per Month *</label>
                <input type="text" id="billingamount"
                       class="form-control"
                       placeholder="Enter Amount">
            </div>
            <div class="form-group">
                <label for="billingmonthnumber">Number of Month *</label>
                <input type="text" id="billingmonthnumber"
                       class="form-control"
                       placeholder="Enter Number">
            </div>
            <div class="form-group">
                <label for="billingdate">Date *</label>
                <input type="text" id="billingdate"
                       class="form-control"
                       placeholder="Select Date">
            </div>

            <div class="form-group" id="billdelivered">
                <label for="exampleInputPassword1">Bill Delivered * </label>
                <br/>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1"
                           name="billdelivered" value="Yes"
                           class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline1">Yes</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2"
                           name="billdelivered" value="No"
                           class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline2">No</label>
                </div>
            </div>

            <div class="form-group">
                <label for="billingdescription">Description</label>
                <textarea class="form-control"
                          id="billingdescription"
                          placeholder="Enter description"></textarea>
            </div>

            <button type="button" id="addbillingbtn"
                    class="btn btn-primary">Add billing
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


    $("#addbillingbtn").click(function () {

        var billingtype = $("#billingtype").val();
        var billingtypeother = $("#billingtypeother").val();
        var billingtenant = $("#billingtenant").val();
        var billingfor = $("#billingfor").val();
        var billingamount = $("#billingamount").val();
        var billingmonthnumber = $("#billingmonthnumber").val();
        var billingdate = $("#billingdate").val();
        var billingdescription = $("#billingdescription").val();
        var billdelivered = $('input[name=billdelivered]:checked').val();
        var error = '';


        if (billingtype == "") {
            error += 'Please select billing type \n';
        }
        if (billingtype == "Other" && billingtypeother == "") {
            error += 'Please specify other billing type \n';
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
                url: "ajax/queries/addbilling.php",
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
                    billingdescription: billingdescription
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