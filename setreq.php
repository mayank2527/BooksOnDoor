<?php
session_start();	

$con=mysqli_connect("localhost",'root','','booksondoor');

$qr="insert into buybooks(bookid,uname,quantity,bname,author,price,type) values('".$_GET['bookid']."','".$_SESSION['uname']."',".$_GET['quantity'].",'".$_GET['bname']."','".$_GET['author']."',".$_GET['price'].",'".$_GET['type']."')";

$res=mysqli_query($con,$qr);
	
if ($res) {
		$q="delete from request where Sno='".$_GET['bookid']."'"."and uname='".$_SESSION['uname']."'";

		$re=mysqli_query($con,$q);

		if ($re) {
			echo "success";
		}
		else{
			echo "failed,".mysqli_error($con);
		}
}
else
	echo "failed ".mysqli_error($con);


mysqli_close($con);
?>

