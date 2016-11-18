<?php
ob_start();
include ('config.php');
?>
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
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<script>
function funcat(cat){
	$.ajax({
		type: "POST",
		url: "db/swtopro.php",
  	data: 'id='+cat,
		success: function(){
			window.location='products.php';
		}
	});
}
</script>
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
<li><a class="lock" href="addproduct.php">Wystaw przedmiot</a></li>
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
										<li><a href="#" onclick="funcat(0)">Elektronika</a></li>
										<li><a  href="#" onclick="funcat(1)">Moda</a></li>
										<li><a  href="#" onclick="funcat(2)">Dom</a></li>
										<li><a  href="#" onclick="funcat(3)">Dziecko</a></li>
									</ul>
								</div>
							</div>
							<div class="col1">
								<div class="h_nav">
									<ul>
										<li><a  href="#" onclick="funcat(4)">Kultura</a></li>
										<li><a  href="#" onclick="funcat(5)">Sport</a></li>
										<li><a href="#" onclick="funcat(6)">Motoryzacja</a></li>
										<li><a href="#" onclick="funcat(7)">Kolekcje</a></li>
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

	<div class="banner">
		<div class="container">
			  <script src="js/responsiveslides.min.js"></script>
  <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
			<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider">
			    <li>

						<div class="banner-text">
							<h3>Licytuj</h3>
						<p>Dom, ogród, motoryzacja i elektronika - to tylko kilka spośród wielu kategori. Sprawdź dostępne aukcje!  </p>
						</div>

				</li>
				<li>

						<div class="banner-text">
							<h3>Wystawiaj</h3>
						<p>Każdy użytkownik portalu może wystawić dowolny przedmiot. Pozbądź się nieużywanych zabawek, ubrań lub narzędzi.</p>

						</div>

				</li>
				<li>
						<div class="banner-text">
							<h3>Łap okazje</h3>
						<p>Nawet kilka sekund przed koncem aukcji ktoś może Cię przebić. Bądź czujny!</p>

						</div>

				</li>
			</ul>
		</div>

	</div>
	</div>

<div class="content">
	<div class="container">
	<div class="content-top">
		<h1>Popularne kategorie</h1>
		<div class="grid-in">
			<div class="col-md-4 grid-top">
				<a href="single.html" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="images/pi.jpg" alt="">
							<div class="b-wrapper">
									<h3 class="b-animate b-from-left    b-delay03 ">
										<span>Dom</span>
									</h3>
								</div>
				</a>


			<p><a href="single.html">Dom</a></p>
			</div>
			<div class="col-md-4 grid-top">
				<a href="single.html" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="images/pi1.jpg" alt="">
					<div class="b-wrapper">
									<h3 class="b-animate b-from-left    b-delay03 ">
										<span>Motoryzacja</span>
									</h3>
								</div>
				</a>
			<p><a href="single.html">Motoryzacja</a></p>
			</div>
			<div class="col-md-4 grid-top">
				<a href="single.html" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="images/pi2.jpg" alt="">
					<div class="b-wrapper">
									<h3 class="b-animate b-from-left    b-delay03 ">
										<span>Elektronika</span>
									</h3>
								</div>
				</a>
			<p><a href="single.html">undoubtable</a></p>
			</div>
					<div class="clearfix"> </div>
		</div>
		<div class="grid-in">
			<div class="col-md-4 grid-top">
				<a href="single.html" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="images/pi3.jpg" alt="">
					<div class="b-wrapper">
									<h3 class="b-animate b-from-left    b-delay03 ">
										<span>Shirt</span>
									</h3>
								</div>
				</a>
			<p><a href="single.html">suffered alteration</a></p>
			</div>
			<div class="col-md-4 grid-top">
				<a href="single.html" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="images/pi4.jpg" alt="">
					<div class="b-wrapper">
									<h3 class="b-animate b-from-left    b-delay03 ">
										<span>Bag</span>
									</h3>
								</div>
				</a>
			<p><a href="single.html">Content here</a></p>
			</div>
			<div class="col-md-4 grid-top">
				<a href="single.html" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="images/pi5.jpg" alt="">
					<div class="b-wrapper">
									<h3 class="b-animate b-from-left    b-delay03 ">
										<span>Shoe</span>
									</h3>
								</div>
				</a>
			<p><a href="single.html">readable content</a></p>
			</div>
					<div class="clearfix"> </div>
		</div>
	</div>
	<!----->

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
<p > Made with ❤❤ by Nerw.us </p>
		</div>
		</div>
</body>
</html>
<?php
ob_end_flush();
?>
