<?php
include ('config.php');
$username=$_SESSION["login"];
$imie=$_SESSION["imie"];
$reje=$_SESSION["signup"];
$avatar=$_SESSION["avatar"];
$data=date('Y/m/d',$reje);
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
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<script src="js/main.js"></script>
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
	print <<<KOD
			<div class="container">
				<h1>Profil użytkownika $username</h1><br><br>
				<div class="cd-tabs">
			<center><nav>
				<ul class="cd-tabs-navigation">
					<li><a data-content="informacje"  href="#0"  class="selected ">Informacje</a></li>
					<li><a data-content="history" href="#0" >Historia licytowania</a></li>
					<li><a data-content="lic" href="#0">Twoje licytacje (1)</a></li>
					<li><a data-content="edycja" href="#0">Edytuj profil</a></li>
				</ul></center>
			</nav>
	<ul class="cd-tabs-content">
		<li data-content="informacje" class="selected">
		<div class="facts">
			<div class="contact-form">
			<center><img src="$avatar" style="max-width:200px;max-height:400px;" /><br>
			<b>Imię:</b> $imie<br>
			<b>Data rejestracji:</b> $data <br>
			<b>Liczba wystawionych aukcji:</b> do zrobienia<br></center>
		</div>

</li>
<li data-content="history" >
		<div class="facts1">
<br><br>
<table class="table">
  <thead class="thead-inverse">
    <tr>
      <th></th>
      <th>Nazwa aukcji</th>
			<th>Najwyższa oferta</th>
			<th>Zakończona</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>do zrobienia</td>
			<td>do zrobienia</td>
      <td>Tak/Nie</td>
      <td><a href="#">Przejdź</a></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>do zrobienia</td>
			<td>do zrobienia</td>
      <td>Tak/Nie</td>
      <td><a href="#">Przejdź</a></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>do zrobienia</td>
			<td>do zrobienia</td>
      <td>Tak/Nie</td>
      <td><a href="#">Przejdź</a></td>
    </tr>
  </tbody>
</table>

		</div>

</li>
<li data-content="lic">
			<div class="facts1">
<br><br>
<table class="table">
  <thead class="thead-inverse">
    <tr>
      <th></th>
      <th>Nazwa aukcji</th>
      <th>Akutalna cena</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>do zrobienia</td>
      <td>do zrobienia</td>
      <td><a href="#">Przejdź</a></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>do zrobienia</td>
      <td>do zrobienia</td>
      <td><a href="#">Przejdź</a></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>do zrobienia</td>
      <td>do zrobienia</td>
      <td><a href="#">Przejdź</a></td>
    </tr>
  </tbody>
</table>
		</div>
</li>
<li data-content="edycja">
				<div class=" container">
				<div class=" register">
								 <div class="col-md-10 account-top">
								 	<center><form action="" method="POST">
									<br>
									<div>
									 <span>Avatar</span>
									 <input type="file">
									</div>
									 <div>
										<span>Nażwa uzytkownika</span>
										<input type="text" name="login" data-validation="length alphanumeric" data-validation-length="min4" data-validation="required" value="$username" disabled>
									 </div>
									 <div class="register-bottom-grid">
										<span>Hasło</span>
										<input type="password" name="password" data-validation="strength" data-validation-strength="2" data-validation="required" data-validation-length="min6"><br>
									 </div>
									 <div class="register-bottom-grid">
										<span>Powtórz hasło</span>
										<input type="password" name="repeat" data-validation="confirmation" data-validation-confirm="password" data-validation="required" ><br>
									 </div>
									<span>Telefon</span>
									<input type="text" name="phone" data-validation="length custom"  data-validation-regexp="\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{3})" data-validation-length="min9"data-validation="required">
										</div>
										<input type="submit" value="Zarejestruj">
									 </div>
									  </div>
								</form>
				<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
				<script>
				  $.validate({
				    lang: 'pl',
					 modules : 'security',
				  onModulesLoaded : function() {
				    var optionalConfig = {
				      fontSize: '12pt',
				      padding: '4px',
				      bad : 'Bardzo słabe hasło',
				      weak : ' Słabe hasło',
				      good : 'Średnie hasło',
				      strong : 'Bardzo silne hasło'
				    };

				    $('input[name="password"]').displayPasswordStrength(optionalConfig);
				  }
				  });
				</script>
								</center>

								<div class="clearfix"> </div><br><br>
							</div>
				</div>
		</div>
</li>
<div class="clearfix"></div>
	</ul>
</div>
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
						<li><a href="#">Lokalizacja</a></li>
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
