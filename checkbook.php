<?php
session_start();

$con=mysqli_connect("localhost",'root','','booksondoor');

$qr="select bookid,quantity from cart where uname='".$_SESSION['uname']."'";

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
echo $var.",".$qun;

}
 else {
 	$var='failed';
	echo $var;

}

mysqli_close($con);

?>