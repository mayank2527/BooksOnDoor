<?php

$con=mysqli_connect("localhost",'root','','booksondoor');

$qr="select * from user where uname='".$_POST['uname']."' and password='".$_POST['password']."'";

$res=mysqli_query($con,$qr);

session_start();

if (mysqli_num_rows($res)>0) {
	$_SESSION['res']='success';
	$_SESSION['uname']=$_POST['uname'];
	header("location:http://localhost/booksondoor/home.php");
}
 else {
 	$_SESSION['res']='failed';
	header("location:http://localhost/booksondoor/home.php");
}
mysqli_close($con);

?>