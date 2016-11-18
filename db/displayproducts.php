<?php
include("config.php");
if (isset($_POST['id'])){
  $idcat=$_POST['id'];
  $_SESSION['catwoman']=$idcat;
}else{
  $idcat=$_SESSION['catwoman'];
}
$now=strtotime('now');
$array = array(
  "id_kat" => $idcat,
  "p_enddate" => $now,
);
$sql="SELECT * FROM products WHERE id_kat = :id_kat AND p_enddate > :p_enddate";
$p=$db->select($sql,$array);
$qaz=count($p);
$wsx=$qaz/9;
$wsx=ceil($wsx);
if ($wsx==0){$wsx=1;}
// echo $wsx."<br>";
// wsx to liczba stron

if (isset($_POST['limit'])){
  $_SESSION['limit']=$_POST['limit'];
  $limit = $_POST['limit']-1;
  $limit = $limit*9;
 // $limit++;
}else{
  $_SESSION['limit']=1;
  $limit=0;
}

$sql="SELECT * FROM products WHERE id_kat = :id_kat AND p_enddate > :p_enddate ORDER BY id_p DESC LIMIT $limit, 9";
$p=$db->select($sql,$array);


$array = array(
  "id_kat" => $idcat,
);


$sql1="SELECT name FROM cat WHERE id_kat = :id_kat";
$p1=$db->select($sql1,$array);

foreach ($p1 as $key => $p2) {
$name = $p2['name'];
}

print <<<KOD
<input type="hidden" name="pgs" value="$wsx"/>
<h1>$name</h1><br>
<div class=" bottom-product">
KOD;

foreach ($p as $key => $product) {
$id=$product['id_p'];
$title = $product['p_title'];
$describe = $product['p_desc'];
$mprice = $product['p_price'];
$hprice = $product['p_hp']." zł";
$end = $product['p_enddate'];
$fot = $product['p_fot'];
$fot = explode(",", $fot);
$fot=$fot[0];
$path=$product['n_user'];
if($hprice==0){$hprice="Brak ofert";}
print <<<KOD
<div class="col-md-4 bottom-cd simpleCart_shelfItem">
<a href="single.php?id=$id">
  <div style="background-image: url(/images/users/$path/$fot); background-size: contain; background-repeat: no-repeat; background-position: center; height: 13em;" class="product-at ">
  </div></a>
  <p class="tun">$title</p>
<a href="single.php?id=$id" class="item_add"><p class="number item_price">$hprice</p></a></div>
KOD;
$zaq=$key+1;
if ($zaq%3==0)
{
print <<<KOD
	<div class="clearfix"> </div>  </div>
  <div class="bottom-product">
KOD;
}
}

?>
