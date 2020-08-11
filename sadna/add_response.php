<?php
require('include/response.php');
if(!empty($_POST)){
    $fullname = $_POST['fullname'];
    $timetoget = $_POST['timetoget'];
    $price=$_POST['price'];
    

    $res=new response();
    $result=$res->add_response($fullname, $timetoget, $price);
    // header( "refresh:1;url= index.php" );
}
?>