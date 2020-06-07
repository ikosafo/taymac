<?php include ('../../../config.php');
$random = rand(1,10000).date("Ymd");

$id_index = $_POST['theindex'];
$getcontact = $mysqli->query("select * from `taymac_contact` where id = '$id_index'");
$rescontact = $getcontact->fetch_assoc();
?>
<!--begin::Form-->

<form class="" autocomplete="off">
    <div class="kt-portlet__body">

        <div class="form-group row">
            <div class="col-lg-12 col-md-12">
                <label for="contact_address">Address</label>
                <textarea class="form-control summernote" id="contact_address"
                placeholder="Enter Address"><?php echo $rescontact['address'] ?></textarea>

            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12 col-md-12">
                <label for="contact_phone">Phone</label>
                <input type="text" class="form-control" id="contact_phone"
                       placeholder="Enter Phone Number" value="<?php echo $rescontact['phone'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12 col-md-12">
                <label for="contact_mobile">Mobile</label>
                <input type="text" class="form-control" id="contact_mobile"
                       placeholder="Enter Phone Number" value="<?php echo $rescontact['mobile'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12 col-md-12">
                <label for="contact_email">Mail</label>
                <input type="text" class="form-control" id="contact_email"
                       placeholder="Enter Email Address" value="<?php echo $rescontact['email'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12 col-md-12">
                <label for="contact_website">Website</label>
                <input type="text" class="form-control" id="contact_website"
                       placeholder="Enter URL Address" value="<?php echo $rescontact['website'] ?>">
            </div>
        </div>

    </div>
    <div class="kt-portlet__foot">
        <div class="kt-form__actions">
            <button type="button" class="btn btn-primary" id="editcontact">Update</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
    </div>
</form>
<!--end::Form-->



<script>

    $(".summernote").summernote({
        placeholder: 'Enter Address here',
        tabsize: 2,
        height: 100
    });


    $("#editcontact").click(function () {
        var contact_address = $("#contact_address").val();
        var contact_phone = $("#contact_phone").val();
        var contact_mobile = $("#contact_mobile").val();
        var contact_email = $("#contact_email").val();
        var contact_website = $("#contact_website").val();
        var id_index = '<?php echo $id_index ?>';

        var error = '';
        if (contact_address == "") {
            error += 'Please enter address\n';
            $("#contact_address").focus();
        }
        if (contact_phone == "") {
            error += 'Please enter phone number\n';
            $("#contact_phone").focus();
        }
        if (contact_mobile == "") {
            error += 'Please enter mobile number\n';
            $("#contact_mobile").focus();
        }
        if (contact_email == "") {
            error += 'Please enter email address\n';
            $("#contact_email").focus();
        }
        if (contact_website == "") {
            error += 'Please enter URL address\n';
            $("#contact_website").focus();
        }

        if (error == "") {
            $.ajax({
                type: "POST",
                url: "ajax/queries/editform_contact.php",
                beforeSend: function () {
                    KTApp.blockPage({
                        overlayColor: "#000000",
                        type: "v2",
                        state: "success",
                        message: "Please wait..."
                    })
                },
                data: {
                    contact_address: contact_address,
                    contact_phone: contact_phone,
                    contact_mobile: contact_mobile,
                    contact_email: contact_email,
                    contact_website: contact_website,
                    id_index: id_index
                },
                success: function (text) {
                    //alert(text);
                    $.ajax({
                        type: "POST",
                        url: "ajax/forms/addcontact_form.php",
                        beforeSend: function () {
                            KTApp.blockPage({
                                overlayColor: "#000000",
                                type: "v2",
                                state: "success",
                                message: "Please wait..."
                            })
                        },
                        success: function (text) {
                            $('#contactform_div').html(text);
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
                        url: "ajax/tables/addcontact_table.php",
                        beforeSend: function () {
                            KTApp.blockPage({
                                overlayColor: "#000000",
                                type: "v2",
                                state: "success",
                                message: "Please wait..."
                            })
                        },
                        success: function (text) {
                            $('#contacttable_div').html(text);
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