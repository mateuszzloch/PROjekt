<?php
include("../db/config.php");
if($_SESSION['uid']!=5){header("Location: ../index.php");}
$id=$_POST['id'];
$uname=$_POST['username'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$active=$_POST['active'];
$where="id_user = $id";
$data = array(
  "username"=>$uname,
  "fname"=>$fname,
  "lname"=>$lname,
  "email"=>$email,
  "phone"=>$phone,
  "active"=>$active,
);
$db->update('users',$data,$where);
?>
