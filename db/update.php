<?php
include ('config.php');
$price=$_POST['price'];
$id=$_POST['id'];

$arrayy = array(
  "id_p" => $id,
);
$sql="SELECT * FROM products WHERE id_p = :id_p";
$p=$db->select($sql,$arrayy);

foreach ($p as $key => $product) {
$hprice = $product['p_hp'];
}

if ($hprice>$price)
{
    header("Location: ../index.php");
}else{
$array = array(
  "p_hp" => $price,
  "id_p" => $id,
);
$where="id_p = $id";
$db->update('products', $array, $where);
header("Location: ../single.php?id=$id");
}
?>
