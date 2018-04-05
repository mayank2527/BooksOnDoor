<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
	span.abc{
		font-size: 1.4em;
	}
	.panel{
		margin-top: 50px;
		box-shadow: 0 0 4px 4px #aaa;
	}
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
		<div class="row">
      <center><h1>Thanks for your feedback</h1>
            <h3>We got your message.And will look forward to it.</h3>
      </center>

			<div id="second" class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-body">

						<center><img src="index.jpg"></center>
						<br><br>
						<center><a href="home.php"><span style="color: black;" class="abc glyphicon glyphicon-arrow-left">BackTOHome</span></a></center>
					</div>
				</div>
			</div>

		</div>
		</div>
	</div>
</body>
</html>