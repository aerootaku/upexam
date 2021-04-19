<?php
include '../../controller/Customer.php';

if(isset($_POST['delete'])){
    $delete = db_delete('tbl_resident', $where = array("id"=>$_POST['id']));
    if($delete){
        $_SESSION['msg'] = "Record Deleted Successfully";
        redirect('manage-residents.php');
        exit();
    }
    else {
        $error = "There was an error deleting record";
    }
}

if(isset($_POST['create'])){
    $store = $customer->createCustomer($_POST);

    return $store;
}

if(isset($_POST['update'])){
    $data = array(
        "fname"=>$_POST['fname'],
        "mname"=>$_POST['mname'],
        "lname"=>$_POST['lname'],
        "address"=>$_POST['address'],
        "email"=>$_POST['email'],
        "contact"=>$_POST['contact']
    );
    $insert = db_update('tbl_resident', $data, $where = array("id"=>$_POST['id']));
    if($insert){

        $_SESSION['msg'] = "Record Updated!";
        redirect('manage-residents.php');
        exit();
    }
    else{
        $error = "There was an error changing status";
    }
}

if (isset($_GET['analytics'])){

    $totalCustomers = $customer->getCustomersTotal();

    echo json_encode(
        ['customers' => $totalCustomers]
    );
}

if (isset($_GET['getCustomers'])){

    $customers = $customer->getAllCustomers();

    echo json_encode($customers);
}

?>