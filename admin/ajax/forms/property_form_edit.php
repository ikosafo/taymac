<?php

include ('../../config.php');

$i_index = $_POST['i_index'];
$getdetails = $mysqli->query("select * from properties where id = '$i_index'");
$resdetails = $getdetails->fetch_assoc();

//$user_id = $_SESSION['user_id'];
?>

<div class="card">
    <h5 class="card-header">Edit Property <br/>
        <small style="color: red">Field Marked * are required</small>
    </h5>

    <div class="card-body">
        <form id="change_password_form">
            <div class="form-group">
                <label for="propertyname">Name of Property *</label>
                <input type="text" class="form-control"
                       id="propertyname" value="<?php echo $resdetails['propertyname'] ?>"
                       placeholder="Enter name of property">
            </div>
            <div class="form-group">
                <label for="propertylocation">Location *</label>
                <input type="text" class="form-control"
                       id="propertylocation" value="<?php echo $resdetails['propertylocation'] ?>"
                       placeholder="Enter location of property">
            </div>
            <div class="form-group">
                <label for="propertytype">Type *</label>
                <select id="propertytype">
                    <option value="">Select Property Type</option>
                    <option <?php if (@$resdetails['propertytype'] == "Shop") echo "selected" ?>>Shop</option>
                    <option <?php if (@$resdetails['propertytype'] == "Apartment") echo "selected" ?>>Apartment</option>
                    <option <?php if (@$resdetails['propertytype'] == "House") echo "selected" ?>>House</option>
                    <option <?php if (@$resdetails['propertytype'] == "Office") echo "selected" ?>>Office</option>
                </select>
            </div>
            <div class="form-group">
                <label for="propertyaddress">Address</label>
                <textarea class="form-control"
                          id="propertyaddress"
                          placeholder="Enter address of property"><?php echo $resdetails['propertyaddress'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="propertydescription">Description</label>
                <textarea class="form-control"
                          id="propertydescription"
                          placeholder="Enter description"><?php echo $resdetails['propertydescription'] ?></textarea>
            </div>

            <button type="button" id="editpropertybtn"
                    class="btn btn-danger">Edit Property
            </button>
        </form>
    </div>
</div>



<script>

    $("#propertytype").selectize();

    $("#editpropertybtn").click(function () {

        var propertyname = $("#propertyname").val();
        var propertylocation = $("#propertylocation").val();
        var propertytype = $("#propertytype").val();
        var propertyaddress = $("#propertyaddress").val();
        var propertydescription = $("#propertydescription").val();
        var i_index = '<?php echo $i_index ?>';
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
                url: "ajax/queries/editproperty.php",
                beforeSend: function () {
                    $.blockUI({
                        message: '<img src="assets/img/wait.gif" style="border:0 !important"/>'
                    });
                },
                data: {
                    propertyname:propertyname,
                    propertylocation: propertylocation,
                    propertytype: propertytype,
                    propertyaddress: propertyaddress,
                    propertydescription: propertydescription,
                    i_index:i_index
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