<?php
session_start();
$con=mysqli_connect('localhost','root','','booksondoor');

$qr="select * from sellbooks where status='success'";
	

$res=mysqli_query($con,$qr);
$var="";
if(mysqli_num_rows($res)>0) {

	while($row=mysqli_fetch_array($res)){
		$var.="<tr>";
		$var.="<td style='display:none;'>".$row['Sno']."</td>";
		$var.="<td>".$row['bname']."</td>";
		$var.="<td>".$row['author']."</td>";
		$var.="<td>".$row['yop']."</td>";
		$var.="<td>".$row['mrp']."</td>";
		$var.="<td>".intval($row['mrp'])*0.4."</td>";
		$var.="<td><button class='add can btn btn-primary'>+</button>&nbsp<button class='btn btn-default'>1</button>&nbsp<button class='sub btn btn-danger'>-</button></td>";
		$var.="<td><button class='addbook btn btn-primary'>ADD</button></td>";
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