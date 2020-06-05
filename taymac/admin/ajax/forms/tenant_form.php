<?php

include ('../../config.php');

//$user_id = $_SESSION['user_id'];
?>

<div class="card">
    <h5 class="card-header">Add New Tenant <br/>
        <small style="color: red">Field Marked * are required</small>
    </h5>

    <div class="card-body">
        <form id="change_password_form">
            <div class="form-group">
                <label for="tenantname">Name of Tenant *</label>
                <input type="text" class="form-control"
                       id="tenantname"
                       placeholder="Enter name of tenant">
            </div>
            <div class="form-group">
                <label for="tenantproperty">Property *</label>
                <select id="tenantproperty">
                    <option value="">Select Property</option>
                    <?php
                    $query = $mysqli->query("select * from properties ORDER BY propertyname");
                    while ($result = $query->fetch_assoc()) { ?>
                        <option value="<?php echo $result['id'] ?>">
                            <?php echo $result['propertyname'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tenanttelephone">Telephone *</label>
                <input type="text" class="form-control"
                       id="tenanttelephone" onkeypress="return isNumber(event)"
                       placeholder="Enter telephone of tenant">
            </div>
            <div class="form-group">
                <label for="tenantemail">Email Address</label>
                <input type="text" class="form-control"
                       id="tenantemail"
                       placeholder="Enter email address of tenant">
            </div>
            <div class="form-group">
                <label for="tenantdatecommenced">Date Commenced *</label>
                <input type="text" id="tenantdatecommenced"
                       class="form-control"
                       placeholder="Select Date">
            </div>
            <div class="form-group">
                <label for="tenantdatecompleted">Date Completed *</label>
                <input type="text" id="tenantdatecompleted"
                       class="form-control"
                       placeholder="Select Date">
            </div>
            <div class="form-group">
                <label for="tenantrates">Payment Rates *</label>
                <select id="tenantrates">
                    <option value="">Select Rates</option>
                    <option value="Weekly">Weekly</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Quarterly">Quarterly</option>
                    <option value="Half Yearly">Half Yearly</option>
                    <option value="Yearly">Yearly</option>

                </select>
            </div>
            <div class="form-group">
                <label for="tenantdescription">Description</label>
                <textarea class="form-control"
                          id="tenantdescription"
                          placeholder="Enter description"></textarea>
            </div>

            <button type="button" id="addtenantbtn"
                    class="btn btn-primary">Add Tenant
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

    $("#addtenantbtn").click(function () {

        var tenantname = $("#tenantname").val();
        var tenantproperty = $("#tenantproperty").val();
        var tenanttelephone = $("#tenanttelephone").val();
        var tenantemail = $("#tenantemail").val();
        var tenantdatecommenced = $("#tenantdatecommenced").val();
        var tenantdatecompleted = $("#tenantdatecompleted").val();
        var tenantrates = $("#tenantrates").val();
        var tenantdescription = $("#tenantdescription").val();
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
                url: "ajax/queries/addtenant.php",
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
                    tenantdescription: tenantdescription
                },
                success: function (text) {
                    $.alert('Tenant is added!');
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