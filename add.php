<?php
session_start();	

$con=mysqli_connect("localhost",'root','','booksondoor');

$qr="insert into cart(bookid, uname, quantity,bname,author,price) values('".$_POST['bookid']."','".$_SESSION['uname']."',".$_POST['quantity'].",'".$_POST['bname']."','".$_POST['author']."',".$_POST['price'].")";

//echo $qr;
$res=mysqli_query($con,$qr);
	
if ($res) {
	echo "success";
}
else
	echo "failed ".mysqli_error($con);


mysqli_close($con);
?>

