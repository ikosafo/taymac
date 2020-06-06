<?php include ('../../../config.php');
$random = rand(1,10000).date("Ymd");
?>
<!--begin::Form-->
<small style="color: red">Field Marked * are required</small>

<form class="" autocomplete="off">
    <div class="kt-portlet__body">

        <div class="form-group row">
            <div class="col-lg-12 col-md-12">
                <label for="billing_type">Billing Type *</label>

                <select id="billing_type" style="width: 100%">
                    <option value="">Select Billing Type</option>
                    <option value="Rent">Rent</option>
                    <option value="CAM Fees">CAM Fees</option>
                    <option value="Reimburse Bills">Reimburse Bills</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-12 col-md-12">
                <label for="billing_type_other">If Other, Specify</label>
                <input type="text" class="form-control" id="billing_type_other"
                       placeholder="If Other, Specify">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12 col-md-12">
                <label for="billing_property">Select Property *</label>
                <select id="billing_property" style="width: 100%">
                    <option value="">Select billing Type</option>
                    <?php $getproperty = $mysqli->query("select * from admin_taymac_property");
                    while ($resproperty = $getproperty->fetch_assoc()) { ?>
                        <option value="<?php echo $resproperty['id'] ?>"><?php echo $resproperty['property_name'] ?></option>
                    <?php  } ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12 col-md-12">
                <label for="date_started">Date of Commencement *</label>
                <input type="text" class="form-control" id="date_started"
                       placeholder="Select Date Commenced">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12 col-md-12">
                <label for="date_completed">Date of Completion *</label>
                <input type="text" class="form-control" id="date_completed"
                       placeholder="Select Date Completed">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12 col-md-12">
                <label for="payment_rate">Select Payment Rate *</label>

                <select id="payment_rate" style="width: 100%">
                    <option value="">Select Rate</option>
                    <option value="Weekly">Weekly</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Quarterly">Quarterly</option>
                    <option value="Half Yearly">Half Yearly</option>
                    <option value="Yearly">Yearly</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12 col-md-12">
                <label for="billing_telephone">Telephone</label>
                <input type="text" class="form-control" id="billing_telephone"
                       placeholder="Enter Telephone">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12 col-md-12">
                <label for="billing_email">Email Address </label>
                <input type="text" class="form-control" id="billing_email"
                       placeholder="Enter billing Name">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12 col-md-12">
                <label for="billing_description">Description</label>
                <textarea class="form-control" id="billing_description"
                          placeholder="Enter Description"></textarea>
            </div>
        </div>


    </div>
    <div class="kt-portlet__foot">
        <div class="kt-form__actions">
            <button type="button" class="btn btn-primary" id="savebilling">Submit</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
    </div>
</form>
<!--end::Form-->



<script>

    $("#billing_property").select2({placeholder: "Select Property"});
    $("#payment_rate").select2({placeholder: "Select Rate"});

    $('#date_started').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        orientation: "bottom"
    });

    $('#date_completed').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        orientation: "bottom"
    });

    $("#savebilling").click(function () {
        var billing_name = $("#billing_name").val();
        var billing_property = $("#billing_property").val();
        var date_started = $("#date_started").val();
        var date_completed = $("#date_completed").val();
        var billing_telephone = $("#billing_telephone").val();
        var billing_email = $("#billing_email").val();
        var billing_description = $("#billing_description").val();
        var payment_rate = $("#payment_rate").val();

        var error = '';
        if (billing_name == "") {
            error += 'Please name of billing\n';
            $("#billing_name").focus();
        }
        if (billing_property == "") {
            error += 'Please select property\n';
            $("#billing_property").focus();
        }
        if (date_started == "") {
            error += 'Please select date started\n';
            $("#date_started").focus();
        }
        if (date_completed == "") {
            error += 'Please select date completed\n';
            $("#date_completed").focus();
        }
        if (date_started > date_completed) {
            error += 'Please select correct date range \n';
            $("#date_completed").focus();
        }
        if (payment_rate == "") {
            error += 'Please select payment rate\n';
            $("#payment_rate").focus();
        }

        if (error == "") {
            $.ajax({
                type: "POST",
                url: "ajax/queries/saveform_adminbilling.php",
                beforeSend: function () {
                    KTApp.blockPage({
                        overlayColor: "#000000",
                        type: "v2",
                        state: "success",
                        message: "Please wait..."
                    })
                },
                data: {
                    billing_name: billing_name,
                    billing_property: billing_property,
                    date_started: date_started,
                    date_completed:date_completed,
                    billing_telephone:billing_telephone,
                    billing_email:billing_email,
                    billing_description:billing_description,
                    payment_rate:payment_rate
                },
                success: function (text) {
                    //alert(text);
                    $.ajax({
                        type: "POST",
                        url: "ajax/forms/adminbilling_form.php",
                        beforeSend: function () {
                            KTApp.blockPage({
                                overlayColor: "#000000",
                                type: "v2",
                                state: "success",
                                message: "Please wait..."
                            })
                        },
                        success: function (text) {
                            $('#billingform_div').html(text);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + " " + thrownError);
                        },
                        complete: function () {
                            KTApp.unblockPage();
                        },
                    });


                    $.ajax({
                        type: "POST",
                        url: "ajax/tables/adminbilling_table.php",
                        beforeSend: function () {
                            KTApp.blockPage({
                                overlayColor: "#000000",
                                type: "v2",
                                state: "success",
                                message: "Please wait..."
                            })
                        },
                        success: function (text) {
                            $('#billingtable_div').html(text);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + " " + thrownError);
                        },
                        complete: function () {
                            KTApp.unblockPage();
                        },
                    });
                },

                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + " " + thrownError);
                },
                complete: function () {
                    KTApp.unblockPage();
                },
            });
        }
        else {
            $.notify(error, {position: "top center"});
        }
        return false;

    });

</script>