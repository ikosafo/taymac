<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Taymac">
    <meta name="description" content="Taymac">
    <meta name="keywords" content="taymac, consulting, farm,properties,real estate,services,farm">

    <title>Taymac</title>
    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <!-- Bootstrap core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Icons -->
    <link href="assets/vendor/icons/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
    <!-- Select2 CSS -->
    <link href="assets/vendor/select2/css/select2-bootstrap.css" rel="stylesheet" />
    <link href="assets/vendor/select2/css/select2.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="assets/css/samar.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <style>
        /* Paste this css to your style sheet file or under head tag */
        /* This only works with JavaScript,
        if it's not present, don't show loader */
        .no-js #loader { display: none;  }
        .js #loader { display: block; position: absolute; left: 100px; top: 0; }
        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('assets/img/load.gif') center no-repeat #fff;
        }
    </style>


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/modernizr.js"></script>
    <script>
        //paste this code under the head tag or in a separate js file.
        // Wait for window load
        $(window).load(function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>


</head>
<body>
<div class="se-pre-con"></div>

<!-- Navbar -->
<header>
    <div class="container position-relative">
        <nav class="navbar navbar-expand-lg navbar-light bg-danger pr-3 pl-3" id="myHeader">
            <img src="assets/img/logo.jpeg" style="width: 10%;background-color: #50346b !important;
    border-radius: 51px;
    margin-left: -1% !important;
    position: absolute;"/>
            <button class="navbar-toggler navbar-toggler-right" type="button"
                    data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 margin-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="index" aria-expanded="false">
                            HOME
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="assets/#." data-toggle="dropdown" 
                           aria-haspopup="true" aria-expanded="false">
                            About Us
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="about">About Us</a>
                            <a class="dropdown-item" href="services">Services</a>
                            <a class="dropdown-item" href="contact">Contact</a>
                            <a class="dropdown-item" href="team">Team</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="properties">
                            Property Management
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="services">
                            Health & Safety
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="farms">
                            Taymac Farms
                        </a>
                    </li>
                </ul>
                <div class="my-2 my-lg-0">
                    <ul class="list-inline main-nav-right">
                        <li class="list-inline-item">
                            <a class="btn btn btn-outline-success btn-sm"
                               href="admin/" target="_blank"> Taymac Online</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- End Navbar -->