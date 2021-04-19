<?php
include '../controller/Authentication.php';
//include '../application/customers/session.php';
if (isset($_SESSION['id'])){
    redirect('customers');
}

if(isset($_POST['register'])){
    if($action->registerCustomer($_POST)){

        $message = "Registered successfully";
    }
    else{
        $message = "Unable to register, please try again after quite some time..";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Kio">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="assets/img/favicon.html">

    <title>Register</title>

    <!--web fonts-->
    <link href="http://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!--bootstrap styles-->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--icon font-->
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendor/dashlab-icon/dashlab-icon.css" rel="stylesheet">
    <link href="assets/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="assets/vendor/themify-icons/css/themify-icons.css" rel="stylesheet">
    <link href="assets/vendor/weather-icons/css/weather-icons.min.css" rel="stylesheet">

    <!--custom scrollbar-->
    <link href="assets/vendor/m-custom-scrollbar/jquery.mCustomScrollbar.html" rel="stylesheet">

    <!--jquery dropdown-->
    <link href="assets/vendor/jquery-dropdown-master/jquery.dropdown.html" rel="stylesheet">

    <!--jquery ui-->
    <link href="assets/vendor/jquery-ui/jquery-ui.min.css" rel="stylesheet">

    <!--iCheck-->
    <link href="assets/vendor/icheck/skins/all.css" rel="stylesheet">

    <!--custom styles-->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/vendor/html5shiv.js"></script>
    <script src="assets/vendor/respond.min.js"></script>
    <![endif]-->
</head>

<body class="signin-up-bg">

<div class="leftHalf" style="background-image: url('assets/img/login-bg.jpg')">
    <div class="login-promo-txt">
        <h2>Customer Information System</h2>
    </div>
</div>

<div class="rightHalf">
    <div class="position-relative">
        <!--login form-->
        <div class="login-form">
            <?php if(isset($message)):?>
                <div class="alert alert-warning">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <h4 class="text-uppercase- text-purple text-center mb-5">Register to Application</h4>
            <form action="" method="POST">

                <div class="form-group clearfix">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" required class="form-control" name="username" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" required class="form-control" name="password" />
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" required class="form-control" name="firstname" />
                    </div>
                    <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="middlename" />
                    </div>
                    <div class="form-group">
                        <label>last Name</label>
                        <input type="text" required class="form-control" name="lastname" />
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" required class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Birth Date</label>
                        <input type='date' required name="birthdate" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Contact</label>
                        <input type='tel' required name="contact" value="+639" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" required name="email" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" required class="form-control" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Zip Code</label>
                        <input type="number" name="zip_code" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <span>
                            Already have an account? <a href="index.php">Login now</a>
                        </span>
                    </div>
                    <button type="submit" class="btn btn-purple btn-pill btn-block" name="register">Register</button>
                </div>
            </form>
        </div>
        <!--/login form-->
    </div>
</div>

<!--basic scripts-->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/vendor/popper.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/jquery-dropdown-master/jquery.dropdown-2.html"></script>
<script src="assets/vendor/m-custom-scrollbar/jquery.mCustomScrollbar.concat.min.html"></script>
<script src="assets/vendor/icheck/skins/icheck.min.js"></script>

<!--[if lt IE 9]>
<script src="assets/vendor/modernizr.js"></script>
<![endif]-->

</body>

</html>

