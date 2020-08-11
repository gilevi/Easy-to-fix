<?php
require('include/supplier.php');
if(!empty($_POST)){
    $fullname = $_POST['fullname'];
    $city = $_POST['city'];
    $phone=$_POST['phone'];
    $specialization=$_POST['specialization'];
    $email =  $_POST['email'];
    $date = $_POST['Sdate'];
    $comments = $_POST['comments'];

    $supp=new supplier();
    $result=$supp->add_supplier($fullname, $city, $phone, $specialization, $email, $date, $comments);
    header( "refresh:1;url= index.php" );
}
?>