<?php
include('config.php');
$act_ive=$_GET['key'];
$array= array("active" => $act_ive);
$sql = "SELECT id_user FROM users WHERE act_ive = :active";
$usr=$db->select($sql,$array);
$x=count($usr);
if($x==1)
{
  $id=$usr[0]['id_user'];
  $where = "id_user=$id";
  $data = array('active' => "1");
  $db->update("users", $data, $where);
  header("Location: loginconf.php");
}else{echo "błąd";}
 ?>