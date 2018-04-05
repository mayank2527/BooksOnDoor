<?php
session_start();
$con=mysqli_connect('localhost','root','','booksondoor');

$qr="select * from sellbooks where uname='".$_SESSION['uname']."'";
	

$res=mysqli_query($con,$qr);
$var="";
if(mysqli_num_rows($res)>0) {

	while($row=mysqli_fetch_array($res)){
		$var.="<tr>";
		$var.="<td>".$row['bname']."</td>";
		$var.="<td>".$row['author']."</td>";
		$var.="<td>".$row['yop']."</td>";
		$var.="<td>".$row['mrp']."</td>";
		$var.="<td>".intval($row['mrp'])*0.25."</td>";
		$var.="<td>".$row['quantity']."</td>";
		$var.="<td>".(intval($row['quantity']))*(intval($row['mrp'])*0.25)."</td>";
		$var.="<td>".$row['status']."</td>";
		$var.="</tr>";
		}
echo $var;

}
 else {
 	$var='failed';
	echo $var;

}

mysqli_close($con);

?>