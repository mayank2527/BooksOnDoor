<?php

extract($_GET);
$c=count($_GET['bname']);

session_start();
$con=mysqli_connect('localhost','root','','booksondoor');

$qr="insert into request(bname,author,uname,type) values('$bname[0]','$author[0]','".$_SESSION['uname']."','$type')";

$a="type";
	
for ($i=1; $i<$c ; $i++) { 	
	$a.="$i";
	$t=$$a;
	$st=",('$bname[$i]','$author[$i]','".$_SESSION['uname']."','$t')";
	$qr=$qr.$st;
	}


$res=mysqli_query($con,$qr);

if ($res==1) {
	header("location:http://localhost/booksondoor/request.php");
} else {
	echo 'Failed'.mysqli_error($con);
}

mysqli_close($con);

?>