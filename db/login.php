<?php
include("config.php");
$_SESSION['logerr']=0;
$login=$_POST['login'];
$pass=$_POST['pass'];
$array=array("username"=>$login);
$sql="SELECT * FROM users WHERE username = :username";
$usr=$db->select($sql, $array);
$x=count($usr);
if($x==1)
{
  $usr=$usr[0];
  // print_r ($usr);
  if($usr['active']==1)
  {
    $pass0=md5($pass);
    $pwd=$usr['password'];
    if ($pwd==$pass0)
    {
      $_SESSION['uid']=$usr['id_user'];
      $_SESSION['login']=$usr['username'];
      $_SESSION['imie']=$usr['fname'];
      $_SESSION['nazwisko']=$usr['lname'];
      $_SESSION['email']=$usr['email'];
      $_SESSION['avatar']=$usr['avatar'];
      $_SESSION['signup']=$usr['signup_date'];
      $_SESSION['phone']=$usr['phone'];
    }else{
      $_SESSION['logerr']=1;
    }
  }else{
    $_SESSION['logerr']=2;
  }
}else{
  $_SESSION['logerr']=3;
}


if($_SESSION['logerr']==0)
{
  header("Location: ../index.php");
}else if ($_SESSION['logerr']==1)
{
  header("Location: ../indexx.php");
}
else if ($_SESSION['logerr']==2)
{
  header("Location: ../indexx.php");
}
else if ($_SESSION['logerr']==3)
{
  header("Location: ../indexx.php");
}
#1 - brak użytkownika o takim loginie
#2 - nieaktywny
#3 - złe hasło
?>
