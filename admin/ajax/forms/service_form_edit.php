<?php

include ('../../config.php');

$i_index = $_POST['i_index'];
$getdetails = $mysqli->query("select * from service where id = '$i_index'");
$resdetails = $getdetails->fetch_assoc();

//$user_id = $_SESSION['user_id'];
?>

<div class="card">
    <h5 class="card-header">Edit Service and Maintenance<br/>
        <small style="color: red">Field Marked * are required</small>
    </h5>

    <div class="card-body">
        <form id="">
            <div class="form-group">
                <label for="servicetenant">Tenant *</label>
                <select id="servicetenant">
                    <option value="">Select Tenant</option>
                    <?php
                    $tenantid = $resdetails['servicetenant'];
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
                <label for="servicetype">Service & Maintenance Type *</label>
                <select id="servicetype">
                    <option value="">Select service Type</option>
                    <option <?php if (@$resdetails['servicetype'] == "Cleaning") echo "selected" ?>>Cleaning</option>
                    <option <?php if (@$resdetails['servicetype'] == "Air Conditioning") echo "selected" ?>>Air Conditioning</option>
                    <option <?php if (@$resdetails['servicetype'] == "Generators") echo "selected" ?>>Generators</option>
                    <option <?php if (@$resdetails['servicetype'] == "Electricals") echo "selected" ?>>Electricals</option>
                    <option <?php if (@$resdetails['servicetype'] == "Swimming Pool") echo "selected" ?>>Swimming Pool</option>
                    <option <?php if (@$resdetails['servicetype'] == "Other") echo "selected" ?>>Other</option>
                </select>
                <label for="servicetypeother">If Other, Specify </label>
                <input type="text" id="servicetypeother"
                       class="form-control"  value="<?php echo $resdetails['servicetypeother'] ?>"
                       placeholder="Enter Other Type">
            </div>
            <hr class="dashed">
            <div class="form-group">
                <label for="servicecost">Cost *</label>
                <input type="text" id="servicecost" value="<?php echo $resdetails['servicecost'] ?>"
                       class="form-control" onkeypress="return isNumber(event)" autocomplete="off"
                       placeholder="Enter cost">
            </div>
            <div class="form-group">
                <label for="servicedate">Date *</label>
                <input type="text" id="servicedate"
                       class="form-control"  value="<?php echo $resdetails['servicedate'] ?>"
                       placeholder="Select Date">
            </div>
            <div class="form-group">
                <label for="servicedescription">Description</label>
                <textarea class="form-control"
                          id="servicedescription"
                          placeholder="Enter description"><?php echo $resdetails['servicedescription'] ?></textarea>
            </div>

            <button type="button" id="editservicebtn"
                    class="btn btn-warning">Edit Service and Maintenance
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


    $("#editservicebtn").click(function () {

        var servicetenant = $("#servicetenant").val();
        var servicetype = $("#servicetype").val();
        var servicetypeother = $("#servicetypeother").val();
        var servicecost = $("#servicecost").val();
        var servicedate = $("#servicedate").val();
        var servicedescription = $("#servicedescription").val();
        var i_index = '<?php echo $i_index ?>';

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
                url: "ajax/queries/editservice.php",
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
                    servicedescription: servicedescription,
                    i_index:i_index
                },
                success: function (text) {
                    $.alert('Service and Maintenance is edited!');
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