<?php $id = $_POST['i_index'];
$user_id = $_POST['user_index'];

include ('../../../config.php');
$que = $mysqli->query("select * from mis_users where id = $id");
$res = $que->fetch_assoc();

?>
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
               placeholder="Enter Full Name" value="<?php echo $res['full_name']; ?>">
    </div>

    <?php $random = rand(1,10000).date("Y"); ?>

    <div class="form-group">
        <label for="exampleInputPassword1">Permissions</label>

        <?php $perm = $mysqli->query("select * from permission where user_id = '$user_id'");
        $result = $perm->fetch_assoc();

        ?>

        <select id="permission" multiple>
            <option value="">Select Permission</option>
            <option <?php if (@$result['permission'] == "All Permissions") echo "selected" ?>>All Permissions</option>
            <option <?php if (@$result['permission'] == "Provisional Registration") echo "selected" ?>>Provisional Registration</option>
            <option <?php if (@$result['permission'] == "Examination Registration") echo "selected" ?>>Examination Registration</option>
            <option <?php if (@$result['permission'] == "Examination Registration for Upgrade") echo "selected" ?>>Examination Registration for Upgrade</option>
            <option <?php if (@$result['permission'] == "Permanent Registration") echo "selected" ?>>Permanent Registration</option>
            <option <?php if (@$result['permission'] == "Permanent Registration (Upgrade)") echo "selected" ?>>Permanent Registration (Upgrade)</option>
            <option <?php if (@$result['permission'] == "Temporal Registration") echo "selected" ?>>Temporal Registration</option>
            <option <?php if (@$result['permission'] == "Temporal Pin Renewal") echo "selected" ?>>Temporal Pin Renewal</option>

        </select>
    </div>

    <div class="form-group" id="approval">
        <label for="exampleInputPassword1">Registration Approval </label>
        <br/>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline1"
                   name="approval" value="Cannot Approve" class="custom-control-input"  <?php if (@$res['approval'] == "Cannot Approve") echo "checked" ?>>
            <label class="custom-control-label" for="customRadioInline1">Cannot Approve</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline2"
                   name="approval" value="Can Approve" class="custom-control-input"  <?php if (@$res['approval'] == "Can Approve") echo "checked" ?>>
            <label class="custom-control-label" for="customRadioInline2">Can Approve</label>
        </div>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">User Name</label>
        <input type="text" class="form-control" id="username"
               placeholder="Enter Username" value="<?php ?>">
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
            error += 'Please select whether staff can approve \n';
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
                        message: '<img src="../../r/assets/img/wait.gif" style="border:0 !important"/>'
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
                        url: "ajax/form/user_form.php",
                        beforeSend: function () {
                            $.blockUI({
                                message: '<img src="../../r/assets/img/wait.gif" style="border:0 !important"/>'
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
                        url: "ajax/table/user_table.php",
                        beforeSend: function () {
                            $.blockUI({
                                message: '<img src="../../r/assets/img/wait.gif" style="border:0 !important"/>'
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
