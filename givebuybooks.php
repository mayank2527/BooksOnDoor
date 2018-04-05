<?php
session_start();
$con=mysqli_connect('localhost','root','','booksondoor');

$qr="select * from buybooks where uname='".$_SESSION['uname']."'";
	

$res=mysqli_query($con,$qr);
$var="";
if(mysqli_num_rows($res)>0) {

	while($row=mysqli_fetch_array($res)){
		$var.="<tr>";
		$var.="<td>".$row['bname']."</td>";
		$var.="<td>".$row['author']."</td>";
		$var.="<td>".$row['type']."</td>";
		$var.="<td>".$row['price']."</td>";

		if ($row['type']=="Old") {
		$var.="<td>".intval($row['price'])*0.4."</td>";
		} else {
		$var.="<td>".intval($row['price'])*0.9."</td>";
		}

		$var.="<td>".$row['quantity']."</td>";

		if ($row['type']=="Old") {
		$var.="<td class='price'>".(intval($row['quantity']))*(intval($row['price'])*0.4)."</td>";
		} else {
		$var.="<td class='price'>".(intval($row['quantity']))*(intval($row['price'])*0.9)."</td>";
		}

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