<?php
include ('config.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Nerw.us - portal aukcyjny | Strona główna</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery.min.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'><!--//fonts-->
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
<p>Witaj <b>$imie $nazwisko</b></p>
</ul></li></div>
<div class="header-left">
<ul><li><a class="lock" href="logout.php">Wyloguj</a></li>
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
										<li><a href="products.html">Akcesoria</a></li>
										<li><a href="products.html">Zegarki</a></li>
										<li><a href="products.html">Galanteria</a></li>
										<li><a href="products.html">Swetry</a></li>
										<li><a href="products.html">Kardigany </a></li>
										<li><a href="products.html">Jeansy</a></li>
										<li><a href="products.html">Nakrycia głowy</a></li>
										<li><a href="products.html">Kurtki i płaszcze</a></li>
										<li><a href="products.html">Kurtki skórzane</a></li>
										<li><a href="products.html">Bluzki</a></li>
										<li><a href="products.html">T-shirty</a></li>
									</ul>
								</div>
							</div>
							<div class="col1">
								<div class="h_nav">
									<ul>
										<li><a href="products.html">Koszule</a></li>
										<li><a href="products.html">Buty</a></li>
										<li><a href="products.html">Spodenki</a></li>
										<li><a href="products.html">Garnitury</a></li>
										<li><a href="products.html">Okulary</a></li>
										<li><a href="products.html">Dresy</a></li>
										<li><a href="products.html">Stroje kąpielowe</a></li>
										<li><a href="products.html">Spodnie</a></li>
										<li><a href="products.html">Legginsy</a></li>
										<li><a href="products.html">Bielizna</a></li>
										<li><a href="products.html">Skarpetki</a></li>
									</ul>
								</div>
							</div>

						  </div>
						</div>
					</li>
				<li><a class="color1" href="contact.html">Kontakt</a></li>
			  </ul>
			</div>

				<div class="clearfix"> </div>
		</div>
		</div>

	</div>
<br>
<br>
<br>
<br>
<br>
<br><br><br><br><br><br>
<center><h1>Konto zostało aktywowane</h1>
<h4><a href="login.html">Kliknij tutaj aby przejść do logowania</a></h4></center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
