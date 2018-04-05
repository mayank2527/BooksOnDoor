<!DOCTYPE html>
<html>
<head>
	<title>Request</title>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
	 		body{
 			background-color: lightblue;
 		}
 		nav{
 			background-color: #a13a44;
 		}
 		a{
 			color: white;
 		}
 		a:hover{
 			color: black;
 		}
 		table{
 			background-color: white;
 		}
</style>
<script type="text/javascript">
			<?php
		session_start();
		if(!isset($_SESSION['uname'])){

			?>

			alert("Please Login Frist");
			window.location="http://localhost/booksondoor/home.php";

			<?php

		}
		?>

</script>
</head>
<body>
	<nav class="navbar">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><p style='vertical-align:top;font-size:14px;color:white'> Books_On_Door</p></a>
      
      <?php 
     
      if(isset($_SESSION['res'])&&$_SESSION['res']=="success"){ ?>
      <div class="dropdown" style="float: left;cursor: pointer;color: white;">
      <a class="navbar-brand dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"><?php echo $_SESSION['uname'];?></span></a>
      <ul class="dropdown-menu">
      <li><a href="cart.php">Your Cart</a></li>
      <li><a href="myorders.php">Your Orders</a></li>
      <li><a href="request.php">Your Request</a></li>
    </ul>
  </div>

      <?php 
       }
      
      else{

        ?>
      <a class="navbar-brand" href="login.html"><span class="glyphicon glyphicon-user">NewUser</span></a>

        <?php
        
      }
       

       ?>


    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
     
       
        
      <ul class="nav navbar-nav navbar-right">
      	<li><a href="home.php">Home</a></li>
     <?php if (isset($_SESSION['res'])&&$_SESSION['res']=="success") {

       echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-in'>LogOUT</span></a></li>";

     } 
     else{
       echo "<li><a href='' data-toggle='modal' data-target='#mod'><span class='glyphicon glyphicon-log-out'>LogIN</span></a></li>";
     }
     ?>
       

      </ul>
    </div>
  </div>
</nav>

	<div class="container">
		<center><h1>Your Buy Books</h1></center><br>
		<div class="row">
		<div class="col-md-12">

		  <table id="tab1" class="table table-bordered">
		    <thead>
		      <tr>
		        <th style="width: 20%;">Book Name</th>
		        <th style="width: 15%;">Author</th>
		        <th style="width: 15%;">Type</th>
		        <th style="width: 14%;">MRP</th>
		        <th style="width: 14%;">Discount price</th>
		        <th style="width: 16%;">Quantity</th>
		        <th style="width: 15%;">Total</th>
		        <th style="width: 15%;">Status</th>
		      </tr>
		    </thead>
		    <tbody>

		    </tbody>
		  </table>						 
			<div style="float: right;margin-right: 90px;">
			<button class="btn btn-primary">Total Price</button>	
			<button id="tp" class="btn btn-default">0</button>	
			</div>	
		</div>
			<div id="req1" class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<center><h3>You have No Request</h3></center>
				</div>
			</div>
		</div>
		<hr>
		<center><h1>Your Sell Books</h1></center><br>

		<div class="col-md-12">

		  <table id="tab2" class="table table-bordered">
		    <thead>
		      <tr>
		        <th style="width: 20%;">Book Name</th>
		        <th style="width: 15%;">Author</th>
		        <th style="width: 15%;">YOP</th>
		        <th style="width: 14%;">MRP</th>
		        <th style="width: 14%;">Our price</th>
		        <th style="width: 16%;">Quantity</th>
		        <th style="width: 15%;">Total</th>
		        <th style="width: 15%;">Status</th>
		      </tr>
		    </thead>
		    <tbody>

		    </tbody>
		  </table>						 
		</div>
			<div id="req2" class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<center><h3>You have No Sell Books record</h3></center>
				</div>
			</div>
		</div>

	</div>
	<script type="text/javascript">
	$(function(){

		$.ajax({
			url:"givebuybooks.php",
			method:"GET",
			dataType:"text",
			async:false,
			success:function(data){
				if(data!="failed"){
					$("#tab1").append(data);
					$("#req1").hide();
				}
				else{
					$('#tab1').hide();
				}
				}
		
			});

		$.ajax({
			url:"givesellbooks.php",
			method:"GET",
			dataType:"text",
			success:function(data){
				if(data!="failed"){
					$("#tab2").append(data);
					$("#req2").hide();
				}
				else{
					$('#tab2').hide();
				}
				}
		
			});

			var x=$(".price");
			sum=0;
			for (var i = 0; i < x.length; i++) {
				console.log(x[i].innerText);
				sum=sum+Number(x[i].innerText);
			}
			$('#tp')[0].innerText=sum.toFixed(2);

	})	
	</script>
</body>
</html>