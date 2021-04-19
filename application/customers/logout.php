<?php
require_once '../../controller/Authentication.php';
require_once 'session.php';
$user_logout = new Authentication($DB_con);

if(isset($_GET['logout']) && $_GET['logout']=="true")
{
    $user_logout->logout();
    $user_logout->redirect('../index.php');
}
