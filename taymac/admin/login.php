<?php include('config.php');
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('includes/styles.php'); ?>
</head>

<body>
<div class="container">

    <hr/>

    <div class="row">
        <div class="col-md-4 col-sm-12"></div>
        <div class="col-md-4 col-sm-12"></div>
        <div class="col-md-4 col-sm-12">
            <a href="https://taymac.net" onclick="window.open('', '_self', ''); window.close();">
                <button class="btn btn-success btn-floating"
                        style="float: right;margin-left:2%"><i class="icon-globe" style="color: #fff"></i> Go back to Site
                </button>
            </a>
        </div>
    </div>


    <form class="sign-in-form" autocomplete="off">
        <div id="error_loc"></div>
        <div class="card">
            <div class="card-body">
                <a href="#." class="brand text-center d-block m-b-20">
                    <img src="../assets/img/logo.jpeg" alt="Taymac Logo" style="width: 50%"/>
                </a>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Username</label>
                    <input type="text" id="username" class="form-control" placeholder="Username" required="">
                </div>

                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="password" class="form-control" placeholder="Password" required="">
                </div>
                <div class="checkbox m-b-10 m-t-20">
                    <div class="custom-control custom-checkbox checkbox-primary form-check">
                    </div>
                    <a href="#." class="float-right">Forgot Password?</a>
                </div>

                <div style="text-align:center;">
                    <button id="login_btn"
                            class="btn btn-primary btn-rounded btn-floating" type="button">Sign In
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- ================== GLOBAL VENDOR SCRIPTS ==================-->
<?php require('includes/scripts.php') ?>

<script>
    $('#login_btn').click(function () {
        //alert('hi');
        var username = $('#username').val();
        var password = $('#password').val();
        var error = '';
        if (username == "") {
            error += 'Please enter username \n';
            $("#username").focus();
        }
        if (password == "") {
            error += 'Please enter password \n';
            $("#password").focus();
        }
        if (error == "") {
            $.ajax({
                type: "POST",
                url: "ajax/loginscripts/loginaction.php",
                data: {
                    username: username,
                    password: password
                },
                success: function (text) {
                    //alert(text)
                    if (text == 1) {
                        window.location.href = "index";
                    }
                    else {
                        $('#error_loc').notify("Username or password does not exist", "error");
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + " " + thrownError);
                },
            });
        }
        else {
            $('#error_loc').notify(error);
        }
        return false;
    });

</script>
</body>

</html>
