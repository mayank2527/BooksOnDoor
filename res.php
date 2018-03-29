<?php
$con=mysqli_connect("localhost",'root','','booksondoor');
//echo "connection done";
$qr="insert into user values('".$_POST['fname']."','".$_POST['lname']."','".$_POST['uname']."','".$_POST['email']."','".$_POST['pwd']."')";
//echo $qr;

$res=mysqli_query($con,$qr);

if ($res) {
	session_start();
	$_SESSION['res']='success';
	$_SESSION['uname']=$_POST['uname'];
	header("location:http://localhost/booksondoor/home.php");
}
else
echo mysqli_error($con);

mysqli_close($con);
?>