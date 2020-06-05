<style>
    .notifyjs-bootstrap-base {
        font-weight: lighter;
        font-size: small;
    }
</style>

<form autocomplete="off">
    <div class="form-group">
        <label for="exampleInputEmail1">Full Name</label>
        <input type="text" class="form-control" id="full_name"
               placeholder="Enter Full Name">
    </div>

<?php $random = rand(1,10000).date("Y"); ?>

    <div class="form-group">
        <label for="exampleInputPassword1">Permissions</label>

        <select id="permission" multiple>
            <option value="">Select Permission</option>
            <option value="All Permissions">All Permissions</option>
            <option value="Configuration">Configuration</option>
            <option value="Add User">Add User</option>
            <option value="Provisional Registration">Provisional Registration</option>
            <option value="Examination Registration">Examination Registration</option>
            <option value="Examination Registration for Upgrade">Examination Registration for Upgrade</option>
            <option value="Permanent Registration">Permanent Registration</option>
            <option value="Permanent Renewal (CPD)">Permanent Renewal (CPD)</option>
            <option value="Permanent Registration (Upgrade)">Permanent Registration (Upgrade)</option>
            <option value="Temporal Pin Renewal">Temporal Registration</option>
            <option value="Temporal Pin Renewal">Temporal Pin Renewal</option>

        </select>
    </div>

    <div class="form-group" id="approval">
        <label for="exampleInputPassword1">User Type </label>
        <br/>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline1"
                   name="approval" value="Regular" class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline1">Regular</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline2"
                   name="approval" value="MIS Admin" class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline2">MIS Admin</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline3"
                   name="approval" value="Super Admin" class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline3">Super Admin</label>
        </div>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">User Name</label>
        <input type="text" class="form-control" id="username"
               placeholder="Enter Username">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="password"
               placeholder="Enter Password">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Confirm Password</label>
        <input type="password" class="form-control" id="confirm_password"
               placeholder="Confirm Password">
    </div>

    <div class="card-footer bg-light">
        <button type="button" class="btn btn-primary" id="saveuser">Submit
        </button>
        <button type="button" class="btn btn-secondary clear-form"
                style="float: right">Clear</button>
    </div>
</form>

<script>
    $("#permission").selectize();



    $("#saveuser").click(function () {


        var full_name = $("#full_name").val();
        var user_id = '<?php echo $random; ?>';
        var approval = $('input[name=approval]:checked').val();
        var permission = $("#permission").val();
        var username = $("#username").val();
        var password = $("#password").val();
        var confirm_password = $("#confirm_password").val();


        var error = '';


        if (full_name == "") {
            error += 'Please enter full name\n';
            $("#full_name").focus();
        }

        if (approval == undefined) {
            error += 'Please select user type \n';
        }

        if (permission == "") {
            error += 'Please select permission\n';
            $("#permission").focus();
        }

         if (username == "") {
            error += 'Please enter username\n';
            $("#username").focus();
        }

          if (password == "") {
            error += 'Please enter password \n';
            $("#password").focus();
        }

        if (password != "" && password.length < 6) {
            error += 'Minimum characters should be six \n';
            $("#password").focus();
        }

        if (confirm_password == "") {
            error += 'Please confirm password \n';
            $("#confirm_password").focus();
        }

        if (confirm_password != "" && password != confirm_password){
            error += 'Passwords are not the same \n';
            $("#confirm_password").focus();
        }



        if (error == "") {


            $.ajax({
                type: "POST",
                url: "ajax/queries/saveform_user.php",
                beforeSend: function () {
                    $.blockUI({
                        message: '<img src="../assets/img/wait.gif" style="border:0 !important"/>'
                    });
                },
                data: {

                    full_name: full_name,
                    permission: permission,
                    username: username,
                    password: password,
                    user_id:user_id,
                    approval:approval

                },
                success: function (text) {

                    $.ajax({
                        type: "POST",
                        url: "ajax/forms/user_form.php",
                        beforeSend: function () {
                            $.blockUI({
                                message: '<img src="../assets/img/wait.gif" style="border:0 !important"/>'
                            });
                        },
                        success: function (text) {

                            $('#user_form_div').html(text);

                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + " " + thrownError);
                        },
                        complete: function () {
                            $.unblockUI();
                        },

                    });




                    $.ajax({
                        type: "POST",
                        url: "ajax/tables/user_table.php",
                        beforeSend: function () {
                            $.blockUI({
                                message: '<img src="../assets/img/wait.gif" style="border:0 !important"/>'
                            });
                        },
                        success: function (text) {

                            $('#user_table_div').html(text);

                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + " " + thrownError);
                        },
                        complete: function () {
                            $.unblockUI();
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
