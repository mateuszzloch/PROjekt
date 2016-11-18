<?php
include ('config.php');
$username=$_SESSION["login"];
$uid=$_SESSION['uid'];
?>
<html>
<head>
<title>Nerw.us - portal aukcyjny | Dodawanie aukcji</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery.min.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
</head>
<body>
<div class="header">
	<div class="header-top">
		<div class="container">


			<?php if(isset($_SESSION['login'])){
			$imie=$_SESSION["imie"];
			$nazwisko=$_SESSION["nazwisko"];

print <<<KOD
<div class="header-a">
<ul><li>
<p>Witaj <a href="profil.php"><b>$imie $nazwisko</b></a></p>
</ul></li></div>
<div class="header-left">
<ul>
<li><a class="lock" href="logout.php">Wyloguj</a></li>
</ul></div>
KOD;
}else{
print <<<KOD
<div class="header-left">
<ul>
<li ><a class="lock"  href="login.html"  >Logowanie</a></li>
<li><a class="lock" href="register.html"  >Rejestracja</a></li>
<li>
</li>
</ul>
</div>
KOD;
}
?>

					<div class="clearfix"> </div>
			</div>
				<div class="clearfix"> </div>
		</div>

		<div class="container">
			<div class="head-top">
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" alt=""></a>
				</div>
<div class=" h_menu4">
					<ul class="memenu skyblue">
					  <li class="active grid"><a class="color1" href="index.php">Strona główna</a></li>
				      <li><a class="color1" href="#">Kategorie</a>
				      	<div class="mepanel">
						<div class="row">
							<div class="col1">
								<div class="h_nav">
									<ul>
										<li><a href="products.html">Elektronika</a></li>
										<li><a href="products.html">Moda</a></li>
										<li><a href="products.html">Dom</a></li>
										<li><a href="products.html">Dziecko</a></li>
									</ul>
								</div>
							</div>
							<div class="col1">
								<div class="h_nav">
									<ul>
										<li><a href="products.html">Kultura</a></li>
										<li><a href="products.html">Sport</a></li>
										<li><a href="products.html">Motoryzacja</a></li>
										<li><a href="products.html">Kolekcje</a></li>
									</ul>
								</div>
							</div>

						  </div>
						</div>
					</li>
				<li><a class="color1" href="contact.php">Kontakt</a></li>
			  </ul>
			</div>

				<div class="clearfix"> </div>
		</div>
		</div>

	</div>



			<div class="container">
				<br>
			<div class="form-group">
		<center><h1>Dodawanie aukcji</h1></center>
		<br><br>
	<div style="font-size: 1em;" class="col-md-10 account-top">
<form action="addp.php" method="post" enctype="multipart/form-data">
<span>Nazwa:</span>
<input class="form-control" width="300px" name="nazwa" type="text"/><br><br>
<span>Kategoria:</span> <select class="form-control" style="width: 40%;" name='kat'><br>
<?php
$sql="SELECT * FROM cat";
$cats=$db->selecto($sql);
foreach ($cats as $key => $value)
{
	$idc=$value['id_kat'];
	$namec=$value['name'];
print <<<KOD
<option value="$idc"> $namec </option>
KOD;
}
?>
</select>
<br><br>
<span>Cena minimalna:</span> <input class="form-control" type="text" name="cena" />
<br><br>
<span>Długość aukcji:</span> <select class="form-control" style="width: 40%;" name="dlugosc">
  <option value="7">7 dni</option>
  <option value="14">14 dni</option>
  <option value="21">21 dni</option>
  <option value="31">31 dni</option>
 </select>
<br><br>
<span>Opis produktu:<span><br>
<textarea class="form-control" rows="25" cols="75" name="opis"></textarea><br>
<span>Dodaj zdjęcia:</span>


<br><input type="file" name="obr1" id="obr1" />

<br><input type="file" name="obr2" id="obr2"/>

<br><input type="file" name="obr3" id="obr3"/>

<br><input type="file" name="obr4" id="obr4"/>

<br><input type="file" name="obr5" id="obr5"/>

<br><input type="file" name="obr6" id="obr6"/>
<input type="submit" value="Dodaj aukcję"/>
</form>
</div>
</div>
</div>
<div class="footer">
				<div class="container">
			<center><div class="footer-top-at">

				<div class="col-md-44 amet-sed">
				<h4>Więcej informacji</h4>
				<ul class="nav-bottom">
						<li><a href="#">Jak zamówić</a></li>
						<li><a href="#">FAQ</a></li>
						<li><a href="contact.html">Lokalizacja</a></li>
						<li><a href="#">Dostawa</a></li>
						<li><a href="#">Uczestnictwo</a></li>
					</ul>
				</div>
				<div class="col-md-44 amet-sed ">
				<h4>Kontakt</h4>

					<p>Biuro:  +12 34 995 0792</p>
					<ul class="social">
						<li><a href="#"><i> </i></a></li>
						<li><a href="#"><i class="twitter"> </i></a></li>
						<li><a href="#"><i class="rss"> </i></a></li>
						<li><a href="#"><i class="gmail"> </i></a></li>

					</ul>
				</div>

				<div class="clearfix"> </div>
			</div></center>
		</div>
		<div class="footer-class">
		<p >© 2016 Nerwus store All Rights Reserved </p>
		</div>
		</div>
</body>
</html>
