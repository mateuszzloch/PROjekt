<?php
include ('config.php');
$id_p = $_GET['id'];

$array = array(
  "id_p" => $id_p,
);
$sql="SELECT * FROM products WHERE id_p = :id_p";
$p=$db->select($sql,$array);
$product=$p[0];
$id=$product['id_p'];
$title = $product['p_title'];
$describe = $product['p_desc'];
$mprice = $product['p_price'];
$hpricee = $product['p_hp'];
$hprice = $product['p_hp']." zł";
$end = $product['p_enddate'];
$fots = $product['p_fot'];
$fots = explode(",", $fots);
$path=$product['n_user'];
$owner=$product['id_user'];


$arrayy = array(
  "id_user" => $owner,
);

$sqll="SELECT * FROM users WHERE id_user = :id_user";
$pp=$db->select($sqll,$arrayy);

foreach ($pp as $key => $users) {
$user=$users['username'];
}

?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $title ?></title>
<link rel="stylesheet" href="css/jquery.countdown.css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery.min.js"></script>
<link href="css/lightbox.css" rel="stylesheet"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="New Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<script src="js/main.js"></script>
<script src="js/lightbox.js"></script>
<script src="js/jquery.plugin.js"></script>
<script src="js/jquery.countdown.js"></script>
<script src="js/jquery.countdown-pl.js"></script>
<style type="text/css">
#odliczanie { width: 240px; height: 45px; }
</style>
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

function disableAuction(){
  document.getElementById('licytuj').disabled = "disabled";
}
</script>
<?php
if ($_SESSION['uid']==$owner){
print <<<KOD
<script>
function endAuction(){
  $.ajax({
    type: "POST",
		url: "db/apocalipse.php",
  	data: 'id='+$id,
    async: false,
    success: function(data){
      location.reload();
    }
  });
}
</script>
KOD;
}
?>
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
		<div class="product">
			<div class="container">
				<div class="col-md-3 product-price">

				<div class=" rsidebar span_1_of_left">
					<div class="of-left">
						<h3 class="cate">Kategorie</h3>
					</div>
          <ul class="menu">
     		<li class="item1"><a href="#" onclick="funcat(0)">Elektronika</a>
     		</li>
     		<li class="item2"><a href="#" onclick="funcat(1)">Moda</a>
     		</li>
     		<li class="item3"><a href="#" onclick="funcat(2)">Dom</a>
     		</li>
     		<li class="item4"><a href="#" onclick="funcat(3)">Dziecko</a>
     		</li>
     		<li class="item4"><a href="#" onclick="funcat(4)">Kultura</a>
     		</li>
     	</li>
     		<li class="item4"><a href="#" onclick="funcat(5)">Sport</a>
     		</li>
     	</li>
     		<li class="item4"><a href="#" onclick="funcat(6)">Motoryzacja</a>
     		</li>
     	</li>
     		<li class="item4"><a href="#" onclick="funcat(7)">Kolekcje</a>
     		</li>
     	</ul>
					</div>
				<!--initiate accordion-->
		<script type="text/javascript">
			$(function() {
			    var menu_ul = $('.menu > li > ul'),
			           menu_a  = $('.menu > li > a');
			    menu_ul.hide();
			    menu_a.click(function(e) {
			        e.preventDefault();
			        if(!$(this).hasClass('active')) {
			            menu_a.removeClass('active');
			            menu_ul.filter(':visible').slideUp('normal');
			            $(this).addClass('active').next().stop(true,true).slideDown('normal');
			        } else {
			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');
			        }
			    });

			});
		</script>
<!---->
<?php
print <<<KOD

					<div class="fit-top">
<div class="clearfix"> </div>

				</div>
				</div>
				<div class="col-md-9 product-price1">
				<div class="col-md-5 single-top">
			<div class="flexslider">
  <ul class="slides">
KOD;
$head4=count($fots);
if ($head4>1)
{
foreach ($fots as $key => $fot) {
print <<<KOD
// UNIKALNY DATA-LIGHTBOX DLA KAZDEGO IMG
<li  style="float: left; display: block; height: 355.85x; width: 304px;" data-thumb="/images/users/$path/$fot"><a href="/images/users/$path/$fot" data-lightbox="img">
<div style="background-image: url('/images/users/$path/$fot'); background-size: contain; background-repeat: no-repeat; background-position: center center; height: 26em;">
  </div>
</a></li>
KOD;
}
}else{
  $fot=$fots[0];
  print <<<KOD
  // UNIKALNY DATA-LIGHTBOX DLA KAZDEGO IMG
  <li  style="float: left; display: block; height: 355.85x; width: 304px;" data-thumb="/images/users/$path/$fot"><a href="/images/users/$path/$fot" data-lightbox="img-1" data-title="$title">
  <div style="background-image: url('/images/users/$path/$fot'); background-size: contain; background-repeat: no-repeat; background-position: center center; height: 26em;">
    </div>
  </a></li>
KOD;
}

$hpricee=$hprice+10;
$hpriceee=$hprice;
if($hprice==0){
  $hprice="Nikt jeszcze nie licytował";
}
print <<<KOD
  </ul>
</div>
<!-- FlexSlider -->
  <script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<script>
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>
					</div>
					<div class="col-md-7 single-top-in simpleCart_shelfItem">
						<div class="single-para ">
						<h4>$title</h4>
							<div class="star-on">
							<input type="hidden" value="$end" name="end"/>
							<script>
							</script>
      <div id="odliczanie">Zakończono</div>
        <h1 style="border-bottom: 1px solid #C4C3C3;"></h1>
      <br><b>Sprzedający</b>: <a href="sellerprofile.php?id=$owner" style="color:#EF5F21;">$user<br></a>
      <a href="mess.php?id=$owner"><span class="glyphicon glyphicon-envelope"></span> Napisz wiadomosc</a>
							<div class="clearfix"> </div>
							</div>
							<h5 class="item_price">$hprice</h5>
KOD;
if ($_SESSION['uid']==$owner){
print <<<KOD
<input type="button" onclick="endAuction();" value="Zakończ aukcję"/>
KOD;
}

print <<<KOD
							<p>Kwota zostanie zaakceptowana jeżli będzie wyższa od obecnej. </p>
							<div class="available">
              <form action="db/update.php" method="post">
              <div class="col-md-10 account-top">
              <input type="hidden" name="id" value="$id"/>
							<input type="number" data-validation="number" onchange="setCustomValidity('')" oninvalid="setCustomValidity('Wartośc nie może być mniejsza niż obecna cena')" class="form-control" step="1" min="$hpriceee" name="price" style="width: 30%; " value="$hpricee"/>&nbsp&nbspZŁ &nbsp&nbsp&nbsp&nbsp<input type="submit" id="licytuj" value="Licytuj"/>
              <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
              <script>
                $.validate({
                  lang: 'pl'
                });
              </script>
              </form>
              </div>
						</div>
						</div>
					</div>
				<div class="clearfix"> </div>
			<!---->
					<div class="cd-tabs">

	<ul class="cd-tabs-content">
  <br>


  <br><br>
  <h1 style="border-bottom: 1px solid #C4C3C3;">Opis produktu</h1>
  <br><br>
<h4>$describe</h4>
<br><br><br><br>

<div class="clearfix"></div>
	</ul>
</div>
</div>
		<div class="clearfix"> </div>
		</div>
		</div>
KOD;
?>
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
print <<<KOD
<script>
$(function () {
var koniec = new Date($end*1000);
teraz = new Date();
if (teraz<koniec){
  $('#odliczanie').countdown({until: koniec, expiryText:'<div class="over">Aukcja została zakończona</div>', onExpire: disableAuction(),});
}else{
  disableAuction();
}

// var newYear = new Date();
// newYear = new Date(newYear.getFullYear() + 1, 1 - 1, 1);
// $('#odliczanie').countdown({until: newYear});
});
</script>
KOD;
?>
</body>
</html>
