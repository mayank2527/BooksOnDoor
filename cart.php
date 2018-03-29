<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
  	<!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<style type="text/css">
 		
 		.con{
 			min-height: 200px;
 			border: 1px solid black;
 		}
 		img{
 			position: relative;
 			top: -30px;
 			left: 20px;
 			margin:10px;
 		}
 	</style>
  </head>
<body>
	<div class="container">
		<div class="row">
			<center><h2>Your Cart</h2></center>
		</div>
		<br><br>	
		<div class="row" id="books">
				<div id='first'>
					<center><h2>Empty Cart</h2></center>
				</div>					
			
			 <div class="con" id='second'>
			 	
	<!-- 		 	<center><h3>Title</h3></center>
				<center>Author</center>	 	
			 	<img src="http://books.google.com/books/content?id=FTUJNA4lLdAC&printsec=frontcover&img=1&zoom=5&edge=curl&imgtk=AFLRE723loESwymvSAqGG_2kFTTic9KPStvHBLtBqYqtrP03Zo4wzpMU0AK9QsHVNPhlTRXWN-kvtOKpXranqQmvs3Nz9B8WwfqXVf6HcLylpdGrMSmv50X2CMn3y9zb3UXRnykSWRwC&source=gbs_api">
			 	<span style="margin:0px 300px;">
			 	Quantity &nbsp	
				<button class="btn btn-default">+</button>
			 	<button class="btn btn-primary">Update</button>
			 	<button class="btn btn-danger">-</button>		 		
			 	</span>
			 	<button class="btn btn-danger">Remove</button>
 -->
			</div>
			
		</div>
	</div>

	<script type="text/javascript">
		var abc;
		var bookdata=[];
		var bdata="abc";
		var bookar=[];
		var qun=[];
		$(function(){
			<?php
			session_start();
		if (isset($_SESSION['uname'])) {
				
			?>

			$.ajax({
				url:'checkbook.php',
				dataType:'text',
				async:false,				
				type:'POST',
				success:function(data){
					if (data=='failed') {
						bookar=null;
					}
					else{
					abc=data.split(",,");
					console.log(abc);
					bookar=abc[0].split(',');
					qun=abc[1].split(',');
					qun.pop();
					console.log(bookar);
					console.log(qun);
			}
		}
		});


				if (bookar===null) {

				$('#second').hide();
				}

			 else{
				$('#first').hide();

			for (var i = 0; i < bookar.length; i++) {
		

			$.ajax({
				url:"https://www.googleapis.com/books/v1/volumes/"+bookar[i]+"?key=AIzaSyBbf8ccex1SCMsXin4Af7C2NTn_D38xhfw", 
				type:'GET',
				dataType:'JSON',
				async:false,
				success:function(data){
					bookdata.push(data);
					}
				});

		}

		for(var i = 0; i < bookar.length; i++) {
			console.log(bookar[i]);
			bdata=bookdata[i];
			console.log(bdata);
	
			  $('#second').append("<div id="+bookar[i]+"><center><h3>"+bdata.volumeInfo.title+"</h3></center><center>"+bdata.volumeInfo.authors+"</center><center>Price:"+bdata.saleInfo.listPrice.amount+"</center><img src="+bdata.volumeInfo.imageLinks.smallThumbnail+"alt='not available'><span class='sp' style='margin:0px 300px;'>Quantity &nbsp<button class='add btn btn-default'>+</button>&nbsp<button class='qan btn btn-primary'>"+qun[i]+"</button>&nbsp<button class='sub btn btn-danger'>-</button></span><button class='upd btn btn-default'>Update</button>&nbsp<button class='del btn btn-danger'>Remove</button><hr></div>");

				
		}



	
		 }





		$(document).on('click','.add',function(){
			var x=$(this).siblings().find('button.qan');
			var y=x.prevObject[0].innerText;
			y++;
			x.prevObject[0].innerText=y;
		});

		$(document).on('click','.sub',function(){
			var x=$(this).siblings().find('button.qan');
//			console.log(x);
			var y=x.prevObject[1].innerText;
			if (y!="1") {
			y--;
			x.prevObject[1].innerText=y;
			}
		 });
	
		$(document).on('click','.upd',function(){
			var x=$(this).siblings().find("span.sp");
			var y=x.prevObject[4];
//			console.log(y.children);
			var y1=y.children;
			var q=y1[1].innerText;
//			console.log(y2);

			var z=$(this).parent();
			id=z[0].id;
//			console.log(z[0].id);

			$.ajax({
				url:"update.php",
				type:"POST",
				data:{qun:q,id:id},
				dataType:"text",
				success:function(data){
					if (data=="success") {
						alert("Quantity Updated");
					} else {
						alert(data);
					}
				}

			});
		});

		$(document).on('click','.del',function(){
			var z=$(this).parent();
			id=z[0].id;

			$.ajax({
				url:"delete.php",
				type:"POST",
				data:{id:id},
				success:function(data){
					if (data=="success") {
						alert("Removed");
						location.reload();
					} else {
						alert(data);
					}
				}

					
				

			});
		});


			<?php

			}	
			else
			{

				?>

				window.location="http://localhost/booksondoor/home.php";

				<?php
			}
		?>

	
		})
	
	</script>
</body>
</html>