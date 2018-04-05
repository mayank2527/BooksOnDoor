<!DOCTYPE html>
<html>
<head>
	<title>demo jquery</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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


		var i=1;
		$(function () {

		
		$('#add').on('click',function(){

			$('#form').append("<div id='divi"+i+"'><br><br><div class='form-group'><label for='pid'>Book name</label><input type='text' required class='form-control' name='bname[]'></div><div class='form-group'><label for='pname'> &nbspAuthor&nbsp</label><input type='text' required class='form-control' name='author[]'></div> <div class='form-group'><label for='cost'>Year of publishtion&nbsp</label><select class='form-control' name='yop[]'><option class='active'>2018</option><option>2017</option><option>2016</option><option>2015</option><option>2014</option><option>2013</option><option>2012</option><ption>2011</option><option>2010</option><option>2009</option><option>2008</option><option>2007</option><option>2006</option><option>2005</option><option>2004</option><option>2003</option><ption>2002</option><option>2001</option><option>2000</option></select></div><div class='form-group'><label for='quantity'>Quantity&nbsp</label><input class='form-control' required='true' type='number' style='width: 35%;' name='quantity[]'></div></div></div>");
			i++;
			});
			
			$('#rem').on('click',function(){
				
				i=i-1;
				x="#divi"+i;
				$(x).remove();
		
		});
		})
	

		

	</script>

	<style type="text/css">
		body{
			background-color: lightblue;
		}
		.con{
			background-color: darkorange;
			box-shadow: 0 0 2px 2px #aaa;
			padding: 20px;
			padding-left: 40px;
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

	</style>
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
		<center><h1 style="color: blue;">Add Books For Sell</h1></center><br>
		<div class="row">
		<div class="con col-md-12 ">
		<form class="form-inline" action="insert.php" method="GET">	
			<div id="form">
				<div id="divi">
			 <div class="form-group">
				<label for="pid">Book Name</label>
				<input required="true" type="text" class="form-control" name="bname[]">
			</div>
 			<div class="form-group">
				<label for="pname">Author</label>
				<input required="true" type="text" class="form-control" name="author[]">
			</div>
		 	 <div class="form-group">
				<label for="cost">Year of publishtion</label>
				<select class="form-control" name="yop[]">
					<option class="active">2018</option>
					<option>2017</option>
					<option>2016</option>
					<option>2015</option>
					<option>2014</option>
					<option>2013</option>
					<option>2012</option>
					<option>2011</option>
					<option>2010</option>
					<option>2009</option>
					<option>2008</option>
					<option>2007</option>
					<option>2006</option>
					<option>2005</option>
					<option>2004</option>
					<option>2003</option>
					<option>2002</option>
					<option>2001</option>
					<option>2000</option>
				</select>
			</div>
 			<div class="form-group">
				<label>Quantity</label>
				<input style="width: 35%;" class="form-control" required="true" type="number"  name="quantity[]">
			</div>

		</div>
		</div>
			<br>
		 	<br>
		 	<div class="col-md-offset-4">
			<button type="submit" class="btn btn-success btn-lg">Submit</button>
			<button type="reset" class="btn btn-default">Reset</button>
 		 	</div>
			</form>
			 	<button class="btn btn-primary" id="add">ADD</button>		
					<button class='btn btn-danger rem' id="rem">X</button>
		</div>
	</div>
</div>
</body>
</html>