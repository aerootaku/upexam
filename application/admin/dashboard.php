<?php
include '../../controller/Customer.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="kio">

    <link rel="icon" type="image/png" href="../assets/img/favicon.html">

    <title>CMS</title>

    <link href="http://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--icon font-->
    <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/vendor/dashlab-icon/dashlab-icon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="../assets/vendor/themify-icons/css/themify-icons.css" rel="stylesheet">
    <link href="../assets/vendor/weather-icons/css/weather-icons.min.css" rel="stylesheet">

    <!--top nav start-->
    <link href="../assets/vendor/custom-nav/css/core-menu.css" rel="stylesheet">
    <link href="../assets/vendor/custom-nav/css/responsive.css" rel="stylesheet">

    <!--jquery ui-->
    <link href="../assets/vendor/jquery-ui/jquery-ui.min.css" rel="stylesheet">

    <!--iCheck-->
    <link href="../assets/vendor/icheck/skins/all.css" rel="stylesheet">

    <!--vector maps -->
    <link href="../assets/vendor/vector-map/jquery-jvectormap-1.1.1.css" rel="stylesheet" >

    <!--custom styles-->
    <link href="../assets/css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../assets/vendor/html5shiv.js"></script>
    <script src="../assets/vendor/respond.min.js"></script>
    <![endif]-->

    <!--[if (gt IE 9) |!(IE)]><!-->
    <!--<link rel="stylesheet" href="../assets/vendor/custom-nav/css/effects/fade-menu.css"/>-->
    <link rel="stylesheet" href="../assets/vendor/custom-nav/css/effects/slide-menu.css"/>
    <!--<![endif]-->

</head>


<body class="fixed-nav top-nav header-fixed">
<!--header start-->
<?php include 'includes/header.php'?>
<!--header end-->

<div class="app-body">
    <!--main content wrapper-->
    <div class="content-wrapper">
        <div class="container">
            <!--sales statistical overview-->
            <div class="row">

            </div>
            <!--/sales statistical overview-->

            <!--issue fixing & profile info-->
            <div class="row">
                <div class="col-xl-12 col-md-5">
                    <div class="card text-light mb-4 bg-gradient- blog-wrap blog-gradient-overlay" style="background-image: url('../assets/img/spot-login.jpg')">
                        <!--<div class=""></div>-->
                        <div class="card-header border-0">
                            <div class="position-relative">
                                <div class=" widget-action-link">
                                </div>
                            </div>
                        </div>
                        <div class="card-body d-flex align-items-end" style="min-height: 378px">
                            <div class="widget-post">
                                <div class="cat">
                                    <a href="#">Customer Maintenance System</a>
                                </div>
                                <h2><a href="#">Welcome to CMS </a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--footer-->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>Copyright &copy; CMS 2021</small>
                </div>
            </div>
        </footer>
        <!--/footer-->
    </div>
    <!--/main content wrapper-->
</div>
<!--basic scripts-->
<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="../assets/vendor/popper.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/jquery.dcjqaccordion.2.7.js"></script>
<script src="../assets/vendor/icheck/skins/icheck.min.js"></script>

<!--top nav-->
<script src="../assets/vendor/custom-nav/js/tb-menu.js"></script>

<!--[if lt IE 9]>
<script src="../assets/vendor/modernizr.js"></script>
<![endif]-->

<!--basic scripts initialization-->
<script src="../assets/js/scripts.js"></script>

<script>
    tbmenu.init({
        selector: ".tbmenu"
    });
</script>
</body>

</html>
