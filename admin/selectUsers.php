<?php
include("../db/config.php");
if($_SESSION['uid']!=5){header("Location: ../index.php");}
$sqla="SELECT * FROM users";
$ausrs=$db->selecto($sqla);
$allUsers=count($ausrs);
$upages=$allUsers/9;
$upages=ceil($upages);

$page = $_POST['page'];
$limit = $page - 1;
$limit *= 15;
$sql="SELECT * FROM users LIMIT $limit, 15";
$usrs=$db->selecto($sql);

print <<<KOD
<input type="hidden" value="$upages" name="upages"/>
<table class="table">
        <thead class="thead-inverse">
          <tr>
          <th>ID</th>
          <th>Login</th>
          <th>Imię</th>
          <th>Nazwisko</th>
          <th>email</th>
          <th>Tel</th>
          <th>Aktywny</th>
          <th></th>
          </tr></thead><tbody>

KOD;


foreach ($usrs as $key => $usr) {
  $id=$usr['id_user'];
  $username=$usr['username'];
  $fname=$usr['fname'];
  $lname=$usr['lname'];
  $email=$usr['email'];
  $phone=$usr['phone'];
  $active=$usr['active'];
  if($active==1){$active="Tak";}else{$active="Nie";}
print <<<KOD
	<tr>
		<th scope="row" name="a$id" value="$id">$id</th>
		<td name="a$id" value="$username">$username</td>
		<td name="a$id" value="$fname">$fname</td>
		<td name="a$id" value="$lname">$lname</td>
    <td name="a$id" value="$email">$email</td>
    <td name="a$id" value="$phone">$phone</td>
    <td name="a$id" value="$active">$active</td>
    <td name="a$id"><input type="button" class="btn btn-info" data-toggle="modal" data-target="#moodal" value="EDYTUJ" onclick="openModal($id)"/></td>
	</tr>
KOD;

}
print <<<KOD
  </tbody>
  </table>
  <center>
		<nav class="in">
				<ul class="pagination" id="pagination"></ul>
		</nav></center>
KOD;
?>
