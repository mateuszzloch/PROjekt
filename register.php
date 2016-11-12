<?php
include('config.php');
$username=$_POST['login'];
$password=$_POST['password'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$avatar="brak";
$signup_date=strtotime("now");
$phone=$_POST['phone'];

$array=array("username"=>$username);
$sql="SELECT * FROM users WHERE username = :username";
$usr=$db->select($sql, $array);
$x=count($usr);
$array=array("email"=>$email);
$sql="SELECT * FROM users WHERE email = :email";
$usr=$db->select($sql, $array);
$y=count($usr);
if($x==0 && $y==0){

$array = array(
  "username" => $username,
  "password" => md5($password),
  "fname" => $fname,
  "lname" => $lname,
  "email" => $email,
  "avatar" => $avatar,
  "signup_date" => $signup_date,
  "phone" => $phone,
  "act_ive" => md5($signup_date)
);
$db->insert('users', $array);
mkdir("images/users/".$username, 0777);
$link="Dziękujemy za rejestrację w serwisie Nerw.us. Aby aktywować swoje konto kliknij w poniższy link:<br><br> http://matiurwis.itcave.pl/confirm.php?key=".md5($signup_date);
$link .="<br><br>Twój login to: <b>$username</b><br>Twoje hasło to: <b>$password</b><br><br>Dziękujemy za rejestracje.";
$fullMessage = "<html><body>".$link;
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=utf-8\r\n";
	$headers .= "From: Nerw.us <nerwus@matiurwis.itcave.pl>\r\n";
	$mess = $fullMessage."<br></body></html>";
mail($email, 'Link aktywacyjny - Nerw.us', $link, $headers);
header("Location: ../login.html");

}else{
header("Location: ../regerror.php");
}

?>
