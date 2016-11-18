<?php
include ('config.php');
$id_user = $_GET['id'];

$array = array(
  "id_user" => $id_user,
);

$sql="SELECT * FROM users WHERE id_user = :id_user";
$p=$db->select($sql,$array);

foreach ($p as $key => $users) {
$email=$users['email'];
$username=$users['username'];
}


?>
<html>
<head>
<title>Nerw.us - portal aukcyjny | Kontakt</title>
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

<div class="contact">
	<?php
	if(isset($_SESSION['login'])){
	$od=$_SESSION["imie"];
	$email=$_SESSION['email'];
	print <<<KOD
		<div class="container">
				<h1>Wiadomośc do użytkownika $username</h1>

			<div class="account">
				<div style="width: 50%;" class="contact-grid">
					<form>
					<span>Do: </span>
						<input type="text"  value="$username" name="do" disabled>
						<span>Twój mail: </span>
						<input type="text" value="$email" name="od" disabled>
						<span>Temat: </span>
						<input type="text" placeholder="Temat" name="topic" data-validation="length" data-validation-length="max50" data-validation="required">
						<span>Wiadomość: </span>
						<textarea cols="77" rows="6" placeholder="Wiadomość" name="wiad" data-validation="length" data-validation-length="max500" data-validation="required"></textarea>
						<div class="send">
						<br>
							<input type="submit" value="Wyślij">
              <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
              <script>
                $.validate({
                  lang: 'pl'
                });
              </script>
						</div>
					</form>
				</div>
KOD;
}else{
	print <<<KOD
	<div class="container">
			<h1>Wiadomośc do użytkownika $username</h1>

		<div class="account">
			<div style="width: 50%;" class="contact-grid">
				<form>
				<span>Do: </span>
					<input type="text"  value="$username" name="do" disabled>
					<span>Twój mail: </span>
					<input type="text" placeholder="Email" name="od" >
					<span>Temat: </span>
					<input type="text" placeholder="Temat" name="topic" required>
					<span>Wiadomość: </span>
					<textarea cols="77" rows="6" placeholder="Wiadomość" name="wiad" required></textarea>
					<div class="send">
					<br>
						<input type="submit" value="Wyślij">
					</div>
				</form>
			</div>
KOD;
}
?>

				<div class="clearfix"> </div>
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
<p > Made with ❤❤ by Nerw.us </p>
		</div>
		</div>
</body>
</html>
