<?php
session_start();

$con=mysqli_connect("localhost",'root','','booksondoor');

$qr="select * from cart where uname='".$_SESSION['uname']."'";

$res=mysqli_query($con,$qr);

$row=mysqli_fetch_array($res);

//$qr="insert into buybooks(bookid,uname,quantity) values('".$row['bookid']."','".$_SESSION['uname']."','".$row['quantity']."')";

$qr="insert into buybooks(bookid, uname,quantity,bname,author,price) values('".$row['bookid']."','".$_SESSION['uname']."',".$row['quantity'].",'".$row['bname']."','".$row['author']."',".$row['price'].")";


if(mysqli_num_rows($res)>0) {

	while($row=mysqli_fetch_array($res)){
	$qr.=",('".$row['bookid']."','".$_SESSION['uname']."',".$row['quantity'].",'".$row['bname']."','".$row['author']."',".$row['price'].")";
		}
}
 

$res=mysqli_query($con,$qr);



if ($res==1) {
	$q="delete from cart where uname='".$_SESSION['uname']."'";
	$res=mysqli_query($con,$q);

		if ($res) {
			header("location:http://localhost/booksondoor/final.php");
		}
		else{
			echo "failed,".mysqli_error($con);
		}

} else {
	echo 'Failed'.mysqli_error($con);
}

mysqli_close($con);

?>
