<?php

include ('../../config.php');

$i_index = $_POST['i_index'];
$getdetails = $mysqli->query("select * from tenants where id = '$i_index'");
$resdetails = $getdetails->fetch_assoc();


//$user_id = $_SESSION['user_id'];
?>

<div class="card">
    <h5 class="card-header">Edit Tenant <br/>
        <small style="color: red">Field Marked * are required</small>
    </h5>

    <div class="card-body">
        <form id="change_password_form">
            <div class="form-group">
                <label for="tenantname">Name of Tenant *</label>
                <input type="text" class="form-control"
                       id="tenantname" value="<?php echo $resdetails['tenantname'] ?>"
                       placeholder="Enter name of tenant">
            </div>
            <div class="form-group">
                <label for="tenantproperty">Property *</label>
                <select id="tenantproperty">
                    <option value="">Select Property</option>
                    <?php
                    $propertyid = $resdetails['tenantproperty'];
                    $getname = $mysqli->query("select * from properties where id = '$propertyid'");
                    $resname = $getname->fetch_assoc();
                    $propertyname = $resname['propertyname'];

                    $query = $mysqli->query("select * from properties ORDER BY propertyname");
                    while ($result = $query->fetch_assoc()) { ?>
                        <option <?php if (@$propertyname == @$result['propertyname']) echo "Selected" ?>>
                            <?php echo $result['propertyname'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tenanttelephone">Telephone *</label>
                <input type="text" class="form-control"
                       id="tenanttelephone" value="<?php echo $resdetails['tenanttelephone'] ?>"
                       placeholder="Enter telephone of tenant">
            </div>
            <div class="form-group">
                <label for="tenantemail">Email Address</label>
                <input type="text" class="form-control"
                       id="tenantemail" value="<?php echo $resdetails['tenantemail'] ?>"
                       placeholder="Enter email address of tenant">
            </div>
            <div class="form-group">
                <label for="tenantdatecommenced">Date Commenced *</label>
                <input type="text" id="tenantdatecommenced"
                       class="form-control" value="<?php echo $resdetails['tenantdatecommenced'] ?>"
                       placeholder="Select Date">
            </div>
            <div class="form-group">
                <label for="tenantdatecompleted">Date Completed *</label>
                <input type="text" id="tenantdatecompleted"
                       class="form-control" value="<?php echo $resdetails['tenantdatecompleted'] ?>"
                       placeholder="Select Date">
            </div>
            <div class="form-group">
                <label for="tenantrates">Payment Rates *</label>
                <select id="tenantrates">
                    <option value="">Select Rates</option>
                    <option <?php if (@$resdetails['tenantrates'] == "Weekly") echo "selected" ?>>Weekly</option>
                    <option <?php if (@$resdetails['tenantrates'] == "Monthly") echo "selected" ?>>Monthly</option>
                    <option <?php if (@$resdetails['tenantrates'] == "Quarterly") echo "selected" ?>>Quarterly</option>
                    <option <?php if (@$resdetails['tenantrates'] == "Half Yearly") echo "selected" ?>>Half Yearly</option>
                    <option <?php if (@$resdetails['tenantrates'] == "Yearly") echo "selected" ?>>Yearly</option>

                </select>
            </div>
            <div class="form-group">
                <label for="tenantdescription">Description</label>
                <textarea class="form-control"
                          id="tenantdescription"
                          placeholder="Enter description"><?php echo $resdetails['tenantdescription'] ?></textarea>
            </div>

            <button type="button" id="edittenantbtn"
                    class="btn btn-danger">Edit Tenant
            </button>
        </form>
    </div>
</div>



<script>

    $('#tenantdatecommenced').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        orientation: "bottom",
        templates: {
            leftArrow: '<i class="icon dripicons-chevron-left"></i>',
            rightArrow: '<i class="icon dripicons-chevron-right"></i>'
        }
    });

    $('#tenantdatecompleted').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        orientation: "bottom",
        templates: {
            leftArrow: '<i class="icon dripicons-chevron-left"></i>',
            rightArrow: '<i class="icon dripicons-chevron-right"></i>'
        }
    });

    $("#tenantrates").selectize();

    $("#tenantproperty").selectize();

    $("#edittenantbtn").click(function () {

        var tenantname = $("#tenantname").val();
        var tenantproperty = $("#tenantproperty").val();
        var tenanttelephone = $("#tenanttelephone").val();
        var tenantemail = $("#tenantemail").val();
        var tenantdatecommenced = $("#tenantdatecommenced").val();
        var tenantdatecompleted = $("#tenantdatecompleted").val();
        var tenantrates = $("#tenantrates").val();
        var tenantdescription = $("#tenantdescription").val();
        var i_index = '<?php echo $i_index ?>';
        var error = '';

        if (tenantname == "") {
            error += 'Please enter name of tenant \n';
            $("#tenantname").focus();
        }
        if (tenantproperty == "") {
            error += 'Please select property \n';
            $("#tenantproperty").focus();
        }
        if (tenanttelephone == "") {
            error += 'Please enter telephone \n';
            $("#tenanttelephone").focus();
        }
        if (tenantdatecommenced== "") {
            error += 'Please select commenced \n';
            //$("#tenantdatecommenced").focus();
        }
        if (tenantdatecompleted== "") {
            error += 'Please select completed \n';
            //$("#tenantdatecompleted").focus();
        }
        if (tenantdatecompleted < tenantdatecommenced) {
            error += 'Date interval error \n';
        }
        if (tenantrates == "") {
            error += 'Please select rate \n';
            $("#tenantrates").focus();
        }

        if (error == "") {

            $.ajax({
                type: "POST",
                url: "ajax/queries/edittenant.php",
                beforeSend: function () {
                    $.blockUI({
                        message: '<img src="assets/img/wait.gif" style="border:0 !important"/>'
                    });
                },
                data: {
                    tenantname:tenantname,
                    tenantproperty: tenantproperty,
                    tenanttelephone: tenanttelephone,
                    tenantemail: tenantemail,
                    tenantdatecommenced: tenantdatecommenced,
                    tenantdatecompleted: tenantdatecompleted,
                    tenantrates: tenantrates,
                    tenantdescription: tenantdescription,
                    i_index:i_index
                },
                success: function (text) {
                    //alert(text);
                    $.ajax({
                        url: "ajax/forms/tenant_form.php",
                        success: function (text) {
                            $('#tenant_form_div').html(text);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + " " + thrownError);
                        },
                    });

                    $.ajax({
                        url: "ajax/tables/tenant_table.php",
                        success: function (text) {
                            $('#tenant_table_div').html(text);
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