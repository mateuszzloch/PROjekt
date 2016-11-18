<?php
include ('config.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Nerw.us - portal aukcyjny | Produkty</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'><!--//fonts-->
<!-- start menu -->
<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<script src="js/jquery.twbsPagination.js"></script>
<script>
var page;
function funcat(cat){
	cato = cat;
	$.ajax({
		type: "POST",
		url: "db/swtopro.php",
  	data: 'id='+cat,
		success: function(){
			window.location='products.php';
		}
	});
}



function category(cat, limit){
	cato = cat;
	$.ajax({
		type: "POST",
		url: "db/displayproducts.php",
  	data: 'id='+cat+'&limit='+limit,
		async: false,
	 success: function(data){
		 $('#list').html(data);
		 x = document.getElementsByName("pgs")[0].value;
	 }
 });

}


function backintime(){
	$('#pagination').twbsPagination('destroy');
	window.pagObj = $('#pagination').twbsPagination({
			totalPages: x,
			visiblePages: 5,
			first: 'Pierwsza',
			prev: 'Poprzednia',
			next: 'Następna',
			last: 'Ostatnia',
			onPageClick: function (event, page) {
				$('html, body').animate({ scrollTop: 0 }, 'fast');
				category(cato, page);
			}
		});
}

</script>


</head>
<body>
<!--header-->
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


<!--content-->
<!---->
		<div class="product">
			<div class="container">
				<div class="col-md-3 product-price">

				<div class=" rsidebar span_1_of_left">
					<div class="of-left">
						<h3 class="cate">Kategorie</h3>
					</div>
		 <ul class="menu">
		<li class="item1"><a href="#" onclick="category(0,1); backintime();">Elektronika</a>
		</li>
		<li class="item2"><a href="#" onclick="category(1,1); backintime();">Moda</a>
		</li>
		<li class="item3"><a href="#" onclick="category(2,1); backintime();">Dom</a>
		</li>
		<li class="item4"><a href="#" onclick="category(3,1); backintime();">Dziecko</a>
		</li>
		<li class="item4"><a href="#" onclick="category(4,1); backintime();">Kultura</a>
		</li>
	</li>
		<li class="item4"><a href="#" onclick="category(5,1); backintime();">Sport</a>
		</li>
	</li>
		<li class="item4"><a href="#" onclick="category(6,1); backintime();">Motoryzacja</a>
		</li>
	</li>
		<li class="item4"><a href="#" onclick="category(7,1); backintime();">Kolekcje</a>
		</li>
	</ul>
					</div>
							<div class="clearfix"> </div>
				</div>
				<div class="col-md-9 product1" id="list">

				</div>
		<div class="clearfix"> </div>
		<center>
		<nav class="in">
				  <ul class="pagination" id="pagination"></ul>
				</nav></center>
		</div>

		</div>

				<!---->

<!--//content-->
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
<?php
if (isset($_SESSION['catwoman'])){
$id=$_SESSION['catwoman'];
$limit=$_SESSION['limit'];
print <<<KOD
<script>
category($id, $limit);
backintime();
</script>
KOD;
// unset($_SESSION['catwoman']);
}else {
print <<<KOD
<script>
category(0, 1);
backintime();
</script>
KOD;
}
?>
</body>
</html>
