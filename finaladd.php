<?php
session_start();
$con=mysqli_connect('localhost','root','','booksondoor');

$qr="update user set mobile=".$_POST['mobile'].", address='".$_POST['address']."' where uname='".$_SESSION['uname']."'";
	

$res=mysqli_query($con,$qr);

if ($res) {
	echo "success";
} else {
	echo 'Failed'.mysqli_error($con);
}

mysqli_close($con);

?>