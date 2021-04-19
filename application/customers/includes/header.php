<?php

if(isset($_POST['updateInfo'])){

 $update = db_update('tbl_customers', $datas = array("firstname"=>$_POST['firstname'],"lastname"=>$_POST['lastname'],"middlename"=>$_POST['middlename']), $where = array("id"=>$_SESSION['id']));

if($update){
             $_SESSION['firstname']=$_POST['firstname']; $_SESSION['lastname']=$_POST['lastname'];
            }
            else{
                $error[] = 'There was an error with the server. Please try again later';
            }
}


if(isset($_POST['updatepassword'])){
    $current = $_POST['currentPass'];
    $new = $_POST['newPass'];
    $confirm = $_POST['confirmPass'];

    //check if the current password is equal to the input
    $fetched = password_verify($current, $_SESSION['declared']);
    if($current != $fetched){
        $error[] = 'Old password does not matched with the current password';
    }
    else{
        if($new != $confirm){
            $error[] = 'Password does not matched';
        }
        else {
            $update = db_update('tbl_customers', $datas = array("password"=>password_hash($confirm, PASSWORD_DEFAULT)), $where = array("id"=>$_SESSION['id']));
            if($update){
                $_SESSION['toastr'] = array(
                    'type'=>'info',
                    'message'=>'Password Updated Successfully',
                    'title'=>'Info'
                );
                //redirect('profile.php');
                exit();
            }
            else{
                $error[] = 'There was an error with the server. Please try again later';
            }
        }
    }
}

?>
<header class="app-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="branding-wrap ">
                    <!--brand start-->
                    <div class="navbar-brand pos-fixed">
                        <a class="" href="index.php">
                            CIS
                        </a>
                    </div>
                    <!--brand end-->
                </div>

                <!--top mega menu start-->
                <nav id="tb-menu">
                    <!--start responsive nav toggle button-->
                    <div class="nav-btn">
                        <span class="bars"></span>
                    </div>
                    <!--end responsive nav toggle button-->
                    <!--start tbmenu-->
                    <ul id="menu" class="tbmenu light-sub-menu slide-effect">
                        <li class="active"><a href="index.php"> Dashboard</a>
                        </li>
                    </ul>
                            <!--end tbmenu-->
                </nav>
                        <!--top mega menu end-->

                        <!--header rightside links-->
                        <ul class="header-links hide-arrow navbar">

                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle" id="userNav" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="user-thumb">
                                        <img class="rounded-circle" src="../assets/img/avatar/avatar2.jpg" alt=""/>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userNav">
                                    <div class="dropdown-item- px-3 py-2">
                                        <img class="rounded-circle mr-2" src="../assets/img/avatar/avatar2.jpg" width="35" alt=""/>
                                        <span class="text-muted"><?= $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></span>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" class="btn btn-info btn-sm" data-target="#profiling<?= $_SESSION['id']; ?>" data-toggle="modal">Change Password</a>
                                    <a class="dropdown-item" class="btn btn-info btn-sm" data-target="#changeInfo<?= $_SESSION['id']; ?>" data-toggle="modal">My Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php?logout=true">Sign Out</a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </header>


        <?php
        $user_id = $_SESSION['id'];
        $value = custom_query("SELECT *  FROM tbl_customers WHERE id='$user_id'");
        if($value->rowCount()>0)
            {  while($row=$value->fetch(PDO::FETCH_ASSOC))
                {
                    $id = $row['id']; ?>
                    <div class="modal fade" id="profiling<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="" method="POST">
                             <input type="hidden" name="incidentid" value="<?= $row['id'];  ?>" />
                             <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Change Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" value="<?=$row['username']; ?>" readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input type="password" class="form-control" name="currentPass" />
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" class="form-control" name="newPass" />
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" name="confirmPass" />
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="updatepassword">Save Record</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
                    <div class="modal fade" id="changeInfo<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="" method="POST">
                             <input type="hidden" name="incidentid" value="<?= $row['id'];  ?>" />
                             <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Update Info</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
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
                                        <option value="Female" <?= $row['gender'] === 'Male' ? 'female' : '' ?>>Female</option>
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
                            <button type="submit" class="btn btn-primary" name="updateInfo">Save Record</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <?php } } ?>