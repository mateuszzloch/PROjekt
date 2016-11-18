<?php
include("../db/config.php");
if($_SESSION['uid']!=5){header("Location: ../index.php");}
$over=$_POST['over'];
$now = strtotime('now');
$array=array(
  "p_enddate"=>$now,
);
if($over==0)
{
  $sqla="SELECT * FROM products WHERE p_enddate > :p_enddate";
  $ausrs=$db->select($sqla,$array);
  $allUsers=count($ausrs);
  $upages=$allUsers/9;
  $upages=ceil($upages);

  $page = $_POST['page'];
  $limit = $page - 1;
  $limit *= 15;
  $sql="SELECT * FROM products WHERE p_enddate > :p_enddate LIMIT $limit, 15";
}else{
  $sqla="SELECT * FROM products WHERE p_enddate < :p_enddate";
  $ausrs=$db->select($sqla,$array);
  $allUsers=count($ausrs);
  $upages=$allUsers/9;
  $upages=ceil($upages);

  $page = $_POST['page'];
  $limit = $page - 1;
  $limit *= 15;
  $sql="SELECT * FROM products WHERE p_enddate < :p_enddate LIMIT $limit, 15";
}
$usrs=$db->select($sql,$array);

print <<<KOD
<input type="hidden" value="$upages" name="upages"/>
<table class="table">
  <thead class="thead-inverse">
    <tr>
    <th>ID</th>
    <th>Kat</th>
    <th>Nazwa aukcji</th>
    <th>Cena minimalna</th>
    <th>Najwyższa oferta</th>
    <th>Aukcja użytkownika</th>
    <th></th>
</tr>
</thead>
<tbody>

KOD;


foreach ($usrs as $key => $usr) {
  $id=$usr['id_p'];
  $idk=$usr['id_kat'];
  $title=$usr['p_title'];
  $minp=$usr['p_price'];
  $hp=$usr['p_hp'];
  $user=$usr['n_user'];
print <<<KOD
<tr>
  <th scope="row">$id</th>
  <td>$idk</td>
  <td>$title</td>
  <td>$minp</td>
  <td>$hp</td>
  <td>$user</td>
  <td><a href="http://matiurwis.itcave.pl/single.php?id=$id">Przejdź</a>
  <br><a onclick="showHist($id);">Historia</a></td>
  <tr><td colspan=4><div id="$id" style="display: none;">
KOD;
$qwert="SELECT * FROM history WHERE id_p = :id_p";
$asdf= array("id_p"=>$id);
$tsih=$db->select($qwert, $asdf);
foreach ($tsih as $key => $value) {
    	//too
$login = $value['login'];
$hajs = $value['p_price'];
print <<<KOD
  <p>$login podniósł cenę do $hajs</p> <br>
KOD;
}

print <<<KOD
</div></td></tr>
KOD;

}
print <<<KOD
  </tbody>
  </table>

KOD;

?>
