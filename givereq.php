<?php
session_start();
$con=mysqli_connect('localhost','root','','booksondoor');

$qr="select * from request where uname='".$_SESSION['uname']."'";
	

$res=mysqli_query($con,$qr);
$var="";
if(mysqli_num_rows($res)>0) {

	while($row=mysqli_fetch_array($res)){
		$var.="<tr>";
		$var.="<td class='sno' style='display:none;'>".$row['Sno']."</td>";
		$var.="<td class='bname'>".$row['bname']."</td>";
		$var.="<td class='author'>".$row['author']."</td>";
		$var.="<td class='type'>".$row['type']."</td>";
		if ($row['price']!=NULL) {
		$var.="<td class='mrp'>".$row['price']."</td>";
		if ($row['type']=="Old") {
		$var.="<td class='price'>".intval($row['price'])*0.4."</td>";
		} else {
		$var.="<td class='price'>".intval($row['price'])*0.9."</td>";
		}
		
		
		} else {
		$var.="<td class='mrp'>-</td>";
		$var.="<td class='price'>-</td>";
		}
		
		$var.="<td><button class='add btn btn-primary'>+</button>&nbsp<button class='btn btn-default'>1</button>&nbsp<button class='sub btn btn-danger'>-</button></td>";
		$var.="<td class='status'>".$row['status']."</td>";
		$var.="<td><button class='can btn btn-danger'>Cancel</button></td>";
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