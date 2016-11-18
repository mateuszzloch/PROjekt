<?php
include("../db/config.php");
if($_SESSION['uid']!=5){header("Location: ../index.php");}
?>
<html>
<head>
<title>Nerw.us - portal aukcyjny | Kontakt</title>
<script src="../js/jquery.min.js"></script>
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<link href="../css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="../js/memenu.js"></script>
<script src="../js/main.js"></script>
<script src="../js/jquery.twbsPagination.js"></script>
<script src="../js/jquery.plugin.js"></script>
<script src="../js/bootstrap.js"></script>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<script>
function funcat(cat){
	$.ajax({
		type: "POST",
		url: "../db/swtopro.php",
  	data: 'id='+cat,
		success: function(){
			window.location='../products.php';
		}
	});
}
function showHist(id){
	if (document.getElementById(id).style.display=="none"){
		document.getElementById(id).style.display = 'block';
	}else{
		document.getElementById(id).style.display = 'none';
	}
}

function selectUsers(page = 1){
  $.ajax({
		type: "POST",
		url: "selectUsers.php",
  	data: 'page='+page,
    async: false,
		success: function(data){
		    $('#urs').html(data);
		}
	});
}

function selectProducts(over, page = 1){
  $.ajax({
		type: "POST",
		url: "selectProducts.php",
  	data: 'page='+page+'&over='+over,
		success: function(data){
      if (over==0){
        $('#now').html(data);
      }else{
        $('#past').html(data);
      }
		}
	});
}

function delUser(){
  id = document.forms.modal.id.value;
  uname = document.forms.modal.uname.value;
  $.ajax({
		type: "POST",
		url: "delUser.php",
  	data: 'id='+id+"&uname="+uname,
		success: function(data){
		    selectUsers();
		}
	});
}

function editUser(){
id = document.forms.modal.id.value;
uname = document.forms.modal.uname.value;
fname = document.forms.modal.fname.value;
lname = document.forms.modal.lname.value;
email = document.forms.modal.email.value;
phone = document.forms.modal.phone.value;
if(document.forms.modal.active.checked == true)
{
  active=1;
}else{
  active=0;
}
  $.ajax({
		type: "POST",
		url: "editUser.php",
  	data: 'id='+id+"&username="+uname+"&fname="+fname+"&lname="+lname+"&email="+email+"&phone="+phone+'&active='+active,
    async: false,
		success: function(data){
		    selectUsers();
        document.forms.modal.id.value = "";
        document.forms.modal.uname.value = "";
        document.forms.modal.fname.value = "";
        document.forms.modal.lname.value = "";
        document.forms.modal.email.value = "";
        document.forms.modal.phone.value = "";
        document.forms.modal.active.checked = false;
		}
	});
}

function openModal(id){
  document.forms.modal.id.value = id;
  id="a"+id;
  x=document.getElementsByName(id);
  // alert(x);
  document.forms.modal.uname.value = x[1].value;
  document.forms.modal.fname.value = x[2].value;
  document.forms.modal.lname.value = x[3].value;
  document.forms.modal.email.value = x[4].value;
  document.forms.modal.phone.value = x[5].value;
  if(x[6].value=="Tak"){
    document.forms.modal.active.checked = true;
  }
}

function backintime(nr = 0){
  q = document.getElementsByName("upages")[nr].value;
	$('#pagination').twbsPagination('destroy');
	window.pagObj = $('#pagination').twbsPagination({
			totalPages: q,
			visiblePages: 5,
			first: 'Pierwsza',
			prev: 'Poprzednia',
			next: 'Następna',
			last: 'Ostatnia',
			onPageClick: function (event, page) {
				$('html, body').animate({ scrollTop: 0 }, 'fast');
        if(nr==0){selectUsers(page);;}
        if(nr==1){selectProducts(0, page);}
        if(nr==2){selectProducts(1, page);}
        // alert("x:"+x+",nr:"+nr+",page:"+page)
			}
		});
}

$(document).ready(function(){
  $(".memenu").memenu();
  selectUsers();
  selectProducts(0);
  selectProducts(1);
  backintime();

});
</script>

</head>
<body>

	<div class="header">
		<div class="header-top">
			<div class="container">
	       <div class="header-a">
	          <ul><li>
	             <p>Witaj <a href="../admin/admin.php"><b>Administratorze</b></a></p>
	            </ul></li></div>
	             <div class="header-left">
	                <ul>
                    <li><a class="lock" href="../logout.php">Wyloguj</a></li>
                  </ul>
                </div>
                <div class="clearfix"> </div>
              </div>
              <div class="clearfix"> </div>
            </div>
            <div class="container">
              <div class="head-top">
                <div class="logo">
                  <a href="../index.php"><img src="../images/logo.png" alt=""></a>
                </div>
                <div class=" h_menu4">
                  <ul class="memenu skyblue">
                    <li class="active grid"><a class="color1" href="../index.php">Strona główna</a></li>
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

			<div class="container">
				<h1>Panel administracyjny</h1><br><br>
				<div class="cd-tabs">
			<center><nav>
				<ul class="cd-tabs-navigation">
					<li><a data-content="urs" href="#0" class="selected" onclick="backintime(0);">Użytkownicy</a></li>
					<li><a data-content="now" href="#0" onclick="backintime(1);">Trwające aukcje</a></li>
					<li><a data-content="past" href="#0" onclick="backintime(2);">Zakończone Aukcje</a></li>
				</ul></center>
			</nav>


	<ul class="cd-tabs-content">

	<li data-content="urs" class="selected">
		<div class="facts1" id='urs'></div>

  </li>

  <li data-content="now" >
    <div class="facts1" id='now'></div>

  </li>

<li data-content="past">
			<div class="facts1" id='past'></div>

</li>

<div class="clearfix"></div>
	</ul>

</div>


<center>
<nav class="in">
      <ul class="pagination" id="pagination"></ul>
</nav>
</center>
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


<div id="moodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edycja użytkownika</h4>
      </div>
      <div class="modal-body">
        <form name='modal'>
          LOGIN:<input type="text" name="uname" class="form-control" value="" disabled></input><br>
          IMIĘ:<input type="text" name="fname" class="form-control" value=""></input><br>
          NAZWISKO:<input type="text" name="lname" class="form-control" value=""></input><br>
          EMAIL:<input type="text" name="email" class="form-control" value=""></input><br>
          TEL:<input type="text" name="phone" class="form-control" value=""></input><br>
          AKTYWNY:<br><input type="checkbox" name="active" class="form-control"></input><br>
          <input type="hidden" name="id" class="form-control" value="" disabled></input>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="delUser()">USUŃ UŻYTKOWNIKA</button>
        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="editUser()">ZAPISZ ZMIANY</button>
      </div>
    </div>

  </div>
</div>
</body>
</html>
