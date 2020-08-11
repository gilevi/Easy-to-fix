<?php
require('include/problem.php');
if(!empty($_POST)){
    $id = $_POST['problemId'];
    $nameOfAuthority = $_POST['nameOfAuthority'];
    $city=$_POST['City'];
    $address=$_POST['ExactLocation'];
    $phoneOfCitizen= $_POST['phoneOfCitizen'];
    $emailOfCitizen=$_POST['emailOfCitizen'];
    $fullNameCitizen =  $_POST['fullNameCitizen'];
    $date = $_POST['sdate'];
    $evenType = $_POST['evenType'];
    $img =  $_POST['img'];

    $supp=new problem();
    $result=$supp->add_problem($id, $nameOfAuthority, $city, $phoneOfCitizen, $emailOfCitizen, $fullNameCitizen, $date, $evenType, $img, $address);
    header( "refresh:1;url= index.php" );
}
?>