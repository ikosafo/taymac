<?php

include ('../../config.php');

//$user_id = $_SESSION['user_id'];
?>

<div class="card">
    <h5 class="card-header">Add New Property <br/>
        <small style="color: red">Field Marked * are required</small>
    </h5>

    <div class="card-body">
        <form id="change_password_form">
            <div class="form-group">
                <label for="propertyname">Name of Property *</label>
                <input type="text" class="form-control"
                       id="propertyname"
                       placeholder="Enter name of property">
            </div>
            <div class="form-group">
                <label for="propertylocation">Location *</label>
                <input type="text" class="form-control"
                       id="propertylocation"
                       placeholder="Enter location of property">
            </div>
            <div class="form-group">
                <label for="propertytype">Type *</label>
                <select id="propertytype">
                    <option value="">Select Property Type</option>
                    <option value="Shop">Shop</option>
                    <option value="Apartment">Apartment</option>
                    <option value="House">House</option>
                </select>
            </div>
            <div class="form-group">
                <label for="propertyaddress">Address</label>
                <textarea class="form-control"
                       id="propertyaddress"
                          placeholder="Enter address of property"></textarea>
            </div>
            <div class="form-group">
                <label for="propertydescription">Description</label>
                <textarea class="form-control"
                          id="propertydescription"
                          placeholder="Enter description"></textarea>
            </div>

            <button type="button" id="addpropertybtn"
                    class="btn btn-primary">Add Property
            </button>
        </form>
    </div>
</div>



<script>

    $("#propertytype").selectize();

    $("#addpropertybtn").click(function () {

        var propertyname = $("#propertyname").val();
        var propertylocation = $("#propertylocation").val();
        var propertytype = $("#propertytype").val();
        var propertyaddress = $("#propertyaddress").val();
        var propertydescription = $("#propertydescription").val();
        var error = '';

        if (propertyname == "") {
            error += 'Please enter name of property \n';
            $("#propertyname").focus();
        }
        if (propertylocation == "") {
            error += 'Please enter location \n';
            $("#propertylocation").focus();
        }
        if (propertytype == "") {
            error += 'Please select property type \n';
            $("#propertytype").focus();
        }

        if (error == "") {

            $.ajax({
                type: "POST",
                url: "ajax/queries/addproperty.php",
                beforeSend: function () {
                    $.blockUI({
                        message: '<img src="../../assets/img/wait.gif" style="border:0 !important"/>'
                    });
                },
                data: {
                    propertyname:propertyname,
                    propertylocation: propertylocation,
                    propertytype: propertytype,
                    propertyaddress: propertyaddress,
                    propertydescription: propertydescription
                },
                success: function (text) {
                    $.ajax({
                        url: "ajax/forms/property_form.php",
                        success: function (text) {
                            $('#property_form_div').html(text);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + " " + thrownError);
                        },
                    });

                    $.ajax({
                        url: "ajax/tables/property_table.php",
                        success: function (text) {
                            $('#property_table_div').html(text);
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