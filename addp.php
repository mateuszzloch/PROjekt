<?php
include("config.php");
$uname=$_SESSION['login'];
$nazwa=$_POST['nazwa'];
$kategoria=$_POST['kat'];
$cena=$_POST['cena'];
$len=$_POST['dlugosc'];
$desc=$_POST['opis'];
$obr[1]=$_FILES['obr1'];
if(isset($_FILES['obr2']['tmp_name']) && $_FILES['obr2']['tmp_name']!="")
{
  $obr[2]=$_FILES['obr2'];
}
if(isset($_FILES['obr3']['tmp_name']) && $_FILES['obr3']['tmp_name']!="")
{
  $obr[3]=$_FILES['obr3'];
}
if(isset($_FILES['obr4']['tmp_name']) && $_FILES['obr4']['tmp_name']!="")
{
  $obr[4]=$_FILES['obr4'];
}
if(isset($_FILES['obr5']['tmp_name']) && $_FILES['obr5']['tmp_name']!="")
{
  $obr[5]=$_FILES['obr5'];
}
if(isset($_FILES['obr6']['tmp_name']) && $_FILES['obr6']['tmp_name']!="")
{
  $obr[6]=$_FILES['obr6'];
}


$startdate=strtotime("now");
$enddate=strtotime("+".$len."days");


$path="images/users/".$uname;
foreach($obr as $key => $img)
{
$fn=$startdate.'-'.$key;
$allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
$detectedType = exif_imagetype($img['tmp_name']);
$error = !in_array($detectedType, $allowedTypes);
$tp=$img['type'];
if ($tp=="image/png"){$fn=$fn.'.png';}
if ($tp=="image/jpg"){$fn=$fn.'.jpg';}
if ($tp=="image/jpeg"){$fn=$fn.'.jpg';}
if ($tp=="image/PNG"){$fn=$fn.'.png';}
if ($tp=="image/JPEG"){$fn=$fn.'.jpeg';}
if ($tp=="image/JPG"){$fn=$fn.'.jpg';}
if ($error==false)
{
  $tmpFile = $img['tmp_name'];
  $fileName = $fn;
  move_uploaded_file($tmpFile, $path."/".$fileName);
  $data[$key] = $fn;
}
else {
  $_SESSION['img-err']=1;
}
}

foreach($data as $key => $path)
{
  if ($key==1){$imgs=$path;}
  else{$imgs=$imgs.",".$path;}
}

$array = array(
  "id_kat" => $kategoria,
  "p_title" => $nazwa,
  "p_desc" => $desc,
  "p_price" => $cena,
  "p_enddate" => $enddate,
  "id_user" => $_SESSION['uid'],
  "p_fot" => $imgs,
  "n_user" => $uname,
);
$db->insert('products', $array);
?>
