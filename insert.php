<?php

extract($_GET);
$c=count($_GET['bname']);

session_start();
$con=mysqli_connect('localhost','root','','booksondoor');

$qr="insert into sellbooks(bname,uname,author,yop,quantity) values('$bname[0]','".$_SESSION['uname']."','$author[0]',$yop[0],$quantity[0])";
	
for ($i=1; $i<$c ; $i++) { 	

	$st=",('$bname[$i]','".$_SESSION['uname']."','$author[$i]',$yop[$i],$quantity[$i])";
	$qr=$qr.$st;
	}


$res=mysqli_query($con,$qr);

if ($res==1) {
	header("location:http://localhost/booksondoor/final.php");
} else {
	echo 'Failed'.mysqli_error($con);
}

mysqli_close($con);

?>