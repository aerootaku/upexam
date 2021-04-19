<?php

include '../../controller/Customer.php';

if(isset($_POST['delete'])){

    $delete = $customer->deleteCustomer($_POST['id']);

    if($delete){
        $_SESSION['msg'] = "Record Deleted Successfully";
        redirect('manage-customer.php');
        exit();
    }
    else {
        $error = "There was an error deleting record";
    }
}

if(isset($_POST['create'])){

    $insert = $customer->createCustomer($_POST);
    if($insert){
        $_SESSION['msg'] = "Record Created Successfully";
        redirect('manage-customer.php');
        exit();
    }
    else{
        $error = "There was an error creating new record";
    }
}

if(isset($_POST['update'])){

    $update = $customer->updateCustomer($_POST, $_POST['id']);

    if($update){

        $_SESSION['msg'] = "Record Updated Successfully";
        redirect('manage-customer.php');
        exit();
    }
    else{
        $error = "There was an error changing record information";
    }
}
if(isset($_POST['changePassword'])){

    $update = $customer->updatePassword($_POST, $_POST['id']);

    if($update){

        $_SESSION['msg'] = "Password Updated Successfully";
        redirect('manage-customer.php');
        exit();
    }
    else{
        $error = "There was an error changing record information";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="../assets/img/favicon.html">

    <title>CMS</title>

    <!--web fonts-->
    <link href="http://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!--bootstrap styles-->
    <!--bootstrap styles-->
    <!--bootstrap styles-->
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
    <!--data table-->
    <link href="../assets/vendor/data-tables/dataTables.bootstrap4.min.css" rel="stylesheet">


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
            <div class="row">
                <div class="col-xl-12">
                    <div class="card card-shadow mb-4">
                        <div class="card-header border-0">
                            <?php if(isset($_SESSION['msg'])): ?>
                                <div class="alert alert-warning">
                                    <?= $_SESSION['msg']; ?>
                                </div>
                            <?php endif; unset($_SESSION['msg']); ?>
                            <div class="custom-title-wrap bar-primary">
                                <div class="custom-title">Customers</div>
                            </div>
                            <button class="btn btn-info btn-sm pull-right mt-2" data-target="#create" data-toggle="modal"><i class="fa fa-plus"></i> Create Record</button>

                        </div>
                        <div class="card-body- pt-3 pb-4">
                            <div class="table-responsive">
                                <table id="data_table" class="table table-bordered table-striped" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Gender</th>
                                        <th>Birthday</th>
                                        <th>Address</th>
                                        <th>Contact Number</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Gender</th>
                                        <th>Birthday</th>
                                        <th>Address</th>
                                        <th>Contact Number</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $xid = $_SESSION['id'];
                                    $value = custom_query("SELECT * FROM tbl_customers");
                                    if($value->rowCount()>0)
                                    {
                                        while($row=$value->fetch(PDO::FETCH_ASSOC))
                                        {
                                            $id = $row['id'];
                                            ?>
                                            <tr>
                                                <td><?= $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname']; ?></td>
                                                <td><?= $row['gender']; ?></td>
                                                <td><?= $row['birthdate']; ?></td>
                                                <td><?= $row['address'] . " " . $row['zip_code']; ?></td>
                                                <td><?= $row['contact']; ?></td>
                                                <td><?= $row['email']; ?></td>
                                                <td>
                                                    <button class="btn btn-info btn-sm" data-target="#edit<?= $id; ?>" data-toggle="modal"><i class="fa fa-edit"></i> </button>
                                                    <button class="btn btn-info btn-sm" data-target="#password<?= $id; ?>" data-toggle="modal"><i class="fa fa-lock"></i> </button>
                                                    <button class="btn btn-danger btn-sm" data-target="#delete<?= $id; ?>" data-toggle="modal"><i class="fa fa-trash"></i> </button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="edit<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form action="" method="POST">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel1">Edit Record</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id" value="<?= $id; ?>" />
                                                                <div class="form-group">
                                                                    <label>First Name</label>
                                                                    <input type="text" required class="form-control" value="<?= $row['firstname'] ?>" name="firstname" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Middle Name</label>
                                                                    <input type="text" class="form-control" value="<?= $row['middlename'] ?>" name="middlename" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>last Name</label>
                                                                    <input type="text" required class="form-control" value="<?= $row['lastname'] ?>" name="lastname" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Gender</label>
                                                                    <select name="gender" required class="form-control">
                                                                        <option value="Male" <?= $row['gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
                                                                        <option value="Female" <?= $row['gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Birth Date</label>
                                                                    <input type='date' required name="birthdate" value="<?= $row['birthdate'] ?>" class="form-control" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Contact</label>
                                                                    <input type='tel' required name="contact" value="<?= $row['contact'] ?>" class="form-control" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input type="email" name="email" required class="form-control" value="<?= $row['email'] ?>" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Address</label>
                                                                    <textarea name="address" class="form-control" rows="5"><?= $row['address']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Zip Code</label>
                                                                    <input type="number" name="zip_code" value="<?= $row['zip_code'] ?>" required class="form-control" />
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary" name="update">Save changes</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="password<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form action="" method="POST">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel1">Change Password</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id" value="<?= $id; ?>" />
                                                                <div class="form-group">
                                                                    <label>Please enter customer new password</label>
                                                                    <input type="password" required class="form-control" name="password" />
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary" name="changePassword">Save changes</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="delete<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form action="" method="POST">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel1">Delete this record?</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id" value="<?= $id; ?>"
                                                                <p>Are you sure you want to delete this record?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                        </div>
                                        <?php }} ?>
                                    </tbody>
                                </table>
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
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Create Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="create">Save Record</button>
                </div>
            </form>

        </div>
    </div>
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
<!--datatables-->
<script src="../assets/vendor/data-tables/jquery.dataTables.min.js"></script>
<script src="../assets/vendor/data-tables/dataTables.bootstrap4.min.js"></script>


<!--[if lt IE 9]>
<script src="../assets/vendor/modernizr.js"></script>
<![endif]-->
<!--init datatable-->
<script src="../assets/vendor/js-init/init-datatable.js"></script>
<!--basic scripts initialization-->
<script src="../assets/js/scripts.js"></script>

<script>
    tbmenu.init({
        selector: ".tbmenu"
    });
</script>
</body>
</html>