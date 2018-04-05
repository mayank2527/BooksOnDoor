<?php
session_start();

$con=mysqli_connect("localhost",'root','','booksondoor');

$qr="delete from request where Sno='".$_GET['Sno']."'"."and uname='".$_SESSION['uname']."'";

$res=mysqli_query($con,$qr);

if ($res) {
	echo "success";
}
else{
	echo "failed,".mysqli_error($con);
}

mysqli_close($con);

?>
