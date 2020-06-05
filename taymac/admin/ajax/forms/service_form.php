<?php

include ('../../config.php');

//$user_id = $_SESSION['user_id'];
?>

<div class="card">
    <h5 class="card-header">Add New service and Maintenance<br/>
        <small style="color: red">Field Marked * are required</small>
    </h5>

    <div class="card-body">
        <form id="">
            <div class="form-group">
                <label for="servicetenant">Tenant *</label>
                <select id="servicetenant">
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
                <label for="servicetype">Service & Maintenance Type *</label>
                <select id="servicetype">
                    <option value="">Select service Type</option>
                    <option value="Cleaning">Cleaning</option>
                    <option value="Air Conditioning">Air Conditioning</option>
                    <option value="Generators">Generators</option>
                    <option value="Electricals">Electricals</option>
                    <option value="Swimming Pool">Swimming Pool</option>
                    <option value="Other">Other</option>
                </select>
                <label for="servicetypeother">If Other, Specify </label>
                <input type="text" id="servicetypeother"
                       class="form-control"
                       placeholder="Enter Other Type">
            </div>
            <hr class="dashed">
            <div class="form-group">
                <label for="servicecost">Cost *</label>
                <input type="text" id="servicecost"
                       class="form-control" onkeypress="return isNumber(event)" autocomplete="off"
                       placeholder="Enter cost">
            </div>
            <div class="form-group">
                <label for="servicedate">Date *</label>
                <input type="text" id="servicedate"
                       class="form-control"
                       placeholder="Select Date">
            </div>
            <div class="form-group">
                <label for="servicedescription">Description</label>
                <textarea class="form-control"
                          id="servicedescription"
                          placeholder="Enter description"></textarea>
            </div>

            <button type="button" id="addservicebtn"
                    class="btn btn-primary">Add Service and Maintenance
            </button>
        </form>
    </div>
</div>



<script>

    $("#servicetype").selectize();

    $("#servicetenant").selectize();

    $('#servicedate').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        orientation: "bottom",
        templates: {
            leftArrow: '<i class="icon dripicons-chevron-left"></i>',
            rightArrow: '<i class="icon dripicons-chevron-right"></i>'
        }
    });


    $("#addservicebtn").click(function () {

        var servicetenant = $("#servicetenant").val();
        var servicetype = $("#servicetype").val();
        var servicetypeother = $("#servicetypeother").val();
        var servicecost = $("#servicecost").val();
        var servicedate = $("#servicedate").val();
        var servicedescription = $("#servicedescription").val();

        var error = '';


        if (servicetenant == "") {
            error += 'Please select Tenant \n';
        }
        if (servicetype == "") {
            error += 'Please select service type \n';
        }
        if (servicetype == "Other" && servicetypeother == "") {
            error += 'Please specify other service type \n';
            $("#servicetypeother").focus();
        }
        if (servicetype != "Other" && servicetypeother != "") {
            error += 'Other type should be null  \n';
            $("#servicetypeother").focus();
        }
        if (servicecost == "") {
            error += 'Please enter cost \n';
            $("#servicecost").focus();
        }
        if (servicedate == "") {
            error += 'Please select date \n';
        }


        if (error == "") {

            $.ajax({
                type: "POST",
                url: "ajax/queries/addservice.php",
                beforeSend: function () {
                    $.blockUI({
                        message: '<img src="assets/img/wait.gif" style="border:0 !important"/>'
                    });
                },
                data: {
                    servicetenant:servicetenant,
                    servicetype:servicetype,
                    servicetypeother: servicetypeother,
                    servicecost: servicecost,
                    servicedate: servicedate,
                    servicedescription: servicedescription
                },
                success: function (text) {
                    $.alert('Service and Maintenance is added!');
                    $.ajax({
                        url: "ajax/forms/service_form.php",
                        success: function (text) {
                            $('#service_form_div').html(text);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + " " + thrownError);
                        },
                    });

                    $.ajax({
                        url: "ajax/tables/service_table.php",
                        success: function (text) {
                            $('#service_table_div').html(text);
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