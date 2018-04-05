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
      session_start();
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
		<center><h1>Your Request</h1></center><br>

		<div class="row">
			<div class="col-md-9 col-md-offset-2">
		  <table id="t1" class="table table-bordered">
		    <thead>
		      <tr>
		        <th style="width: 30%;">Book Name</th>
		        <th style="width: 25%;">Author</th>
		        <th style="width: 15%;">Type</th>
		        <th style="width: 14%;">Status</th>
		      </tr>
		    </thead>
		    <tbody>

		    </tbody>
		  </table>						 
				
			</div>
			<div id="req1" class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<center><h3>You have No Request</h3></center>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-9 col-md-offset-2">
		  <table id="t2" class="table table-bordered">
		    <thead>
		      <tr>
		        <th style="width: 30%;">Book Name</th>
		        <th style="width: 25%;">Author</th>
		        <th style="width: 15%;">Type</th>
		        <th style="width: 14%;">Status</th>
		      </tr>
		    </thead>
		    <tbody>

		    </tbody>
		  </table>						 
				
			</div>
			<div id="req2" class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<center><h3>You have No Request</h3></center>
				</div>
			</div>
		</div>

	</div>

	<script type="text/javascript">
	$(function(){

		$.ajax({
			url:"givebbook.php",
			method:"GET",
			dataType:"text",
			async:false,
			success:function(data){
				if(data!="failed"){
					$("tbody").append(data);
					$("#req").hide();
				}
				else{
					$('table').hide();
				}
				}
		
			});

		$.ajax({
			url:"givesbook.php",
			method:"GET",
			dataType:"text",
			async:false,
			success:function(data){
				if(data!="failed"){
					$("tbody").append(data);
					$("#req").hide();
				}
				else{
					$('table').hide();
				}
				}
		
			});

	})	
	</script>
</body>
</html>