<?php
include("config.php");
$id=$_POST['id'];
$now= date('U');
$where="id_p = $id";
$array = array(
  "p_enddate"=>$now,
);
$db->update('products', $array, $where);
?>
