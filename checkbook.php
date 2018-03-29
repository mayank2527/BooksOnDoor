<?php
session_start();

$con=mysqli_connect("localhost",'root','','booksondoor');

$qr="select bookid,quantity from orders where uname='".$_SESSION['uname']."'";

$res=mysqli_query($con,$qr);

$var="";
$qun="";
if(mysqli_num_rows($res)>0) {

	while($row=mysqli_fetch_array($res)){
		$var.=$row['bookid'];
		$var.=",";
		$qun.=$row['quantity'];
		$qun.=",";
		
		}
}
 else {
 	$var='failed';
}

echo $var.",".$qun;
mysqli_close($con);

?>