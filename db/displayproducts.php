<?php
include("config.php");
$idcat=$_POST['id'];
// echo $idcat;
$array = array(
  "id_kat" => $idcat,
);
$sql="SELECT * FROM products WHERE id_kat = :id_kat";
$p=$db->select($sql,$array);

$sql1="SELECT name FROM cat WHERE id_kat = :id_kat";
$p1=$db->select($sql1,$array);

foreach ($p1 as $key => $p2) {
$name = $p2['name'];
}

print <<<KOD
<h1>$name</h1><br>
<div class=" bottom-product">
KOD;
foreach ($p as $key => $product) {
$title = $product['p_title'];
$describe = $product['p_desc'];
$mprice = $product['p_price'];
$hprice = $product['p_hp']." zł";
$end = $product['p_enddate'];
$fot = $product['p_fot'];
$fot = explode(",", $fot);
$fot=$fot[0];
$path=$product['n_user'];
if($hprice==0){$hprice="nikt jeszcze nie licytował";}
print <<<KOD
<div class="col-md-4 bottom-cd simpleCart_shelfItem">
  <div class="product-at ">
    <a href="single.html"><img class="img-responsive" src="/images/users/$path/$fot">
    <div class="pro-grid">
          <span class="buy-in">Licytuj</span>
    </div>
  </a>
  </div>
  <p class="tun">$title</p>
<a href="#" class="item_add"><p class="number item_price">$hprice</p></a></div>
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
