<?php
session_start();	

$con=mysqli_connect("localhost",'root','','booksondoor');

$qr="insert into orders(bookid, uname, quantity) values('".$_POST['bookid']."','".$_SESSION['uname']."',".$_POST['quantity'].")";

$res=mysqli_query($con,$qr);
	
if ($res) {
	echo "success";
}
else
	echo "failed ".mysqli_error($con);


mysqli_close($con);
?>

