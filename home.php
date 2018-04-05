<!DOCTYPE html>
<html>

  <head>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
    <link href='https://fonts.googleapis.com/css?family=Caesar Dressing' rel='stylesheet'>
     <link href='https://fonts.googleapis.com/css?family=Chelsea Market' rel='stylesheet'>
      <link href='https://fonts.googleapis.com/css?family=Carter One' rel='stylesheet'>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="home.css">  
  <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script type="text/javascript" src="home.js"></script>
      <script type="text/javascript">
      
      <?php
      session_start();
      if (isset($_SESSION['res'])&&$_SESSION['res']=="failed") {
        echo "alert('Incorrect username or password')";

      }

       ?>

    </script>

    </head>
<body>

<div class='container-fluid'>
  <div class="row" >
   
    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><p style='vertical-align:top;font-size:14px;color:white'> Books_On_Door</p></a>
      
      <?php 
      if(isset($_SESSION['res'])&&$_SESSION['res']=="success"){ ?>
      <div class="dropdown" style="float: left;cursor: pointer;">
      <a class="navbar-brand dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"><?php echo $_SESSION['uname'];?></span></a>
      <ul class="dropdown-menu">
      <li><a href="cart.php">Your Cart</a></li>
      <li><a href="myorders">Your Orders</a></li>
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
        <li><a href="#div4"><span class="glyphicon glyphicon-info-sign"></span> About</a></li>
      <li><a href="#div3"><span class="glyphicon glyphicon-asterisk">Our-Services</span></a></li>
     <?php if (isset($_SESSION['res'])&&$_SESSION['res']=="success") {

       echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-in'>LogOUT</span></a></li>";

     } 
     else{
       echo "<li><a href='' data-toggle='modal' data-target='#mod'><span class='glyphicon glyphicon-log-out'>LogIN</span></a></li>";
     }
     ?>
       

          <li><a href="#div5"><span class="glyphicon glyphicon-question-sign">WhyUs?</span></a></li>
        <li><a href="#div6"><span class="glyphicon glyphicon-earphone">Contact-Us</span></a></li>
      </ul>
    </div>
  </div>
</nav>
</div>
    <div id='div1' class="row img1">
      
      <h1 class='text-center font1' id="my1" style='margin-top:80px'>Books_On_Door</h1>
     
      <br><br><br>
        <div>
          <div style="margin-bottom: 10px;" class='col-md-3 col-md-offset-3'> 
<!--             <a style="text-decoration: none;" href="buybooks.php"><button class='btn-default btn btn-success btn-block btn-lg' id='btn1'>Buy books</button></a>

 -->         <div class="dropdown">
          <button class="btn btn-default btn btn-success btn-block btn-lg dropdown-toggle" type="button" id='btn1' data-toggle="dropdown">Buy books
          <span class="caret"></span></button>
          <ul class="dropdown-menu" style="margin-left: 50px;">
            <li><a href="buybooks.php">Buy New Books</a></li>
            <li><a href="bookreq.php">Buy Old Books</a></li>
          </ul>
        </div> 
          </div>

           <div class='col-md-3'>
            <a style="text-decoration: none;" href="sellbooks.php">
            <button id='btn2' class='btn btn-lg btn-default btn-success btn-block'>Sell your old books</button>
          </a>
            <br>
           </div>
        
      </div><!--end of row div-->
      <br>
  </div>
  <!--startibng slideshow-->
  
        <div class="col-md-6">
        <div class="modal fade in" id="mod">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button class="close" data-dismiss="modal">&times</button>    
                <div class="modal-title">Login</div>
                </div>
                <form method="post" action="check.php">
              <div class="modal-body">
                  <div class="form-group">
                    <input type="text" name="uname" placeholder="username" class="form-control">
                    <br>
                    <input type="password" name="password" placeholder="password" class="form-control">
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary">Submit</button>
                <button class="btn btn-default" data-dismiss="modal">cancel</button>
              </div>
                </form>
            </div>
          </div>
        </div>
        
      </div>
  
  <!--
  <div id="div2" >
    <h3 class='text-center'>Welcome to the world of books</h3>
    <p>A book is our best friend. In our society we have friends and foes. Even the so-called friends can cheat us in times. However, books are our never-failing friends. Just like a good friend, it gives us company during idle time. A good book guides us in our lives.</p>
</div>
--> 
  <div class="row ">
    <div id='div4' class='img2'>
      <br><br><br>
      <h3 class='text-center font2' >About Us</h3>
    <p class="text-center text-justify" style="padding: 20px;">Books_On_Door is an initiative by 4 enginnering students of indore who wish to help students like them and other citizens who are book fans by bringing themm books of their choice right at their doorstep.
      We wish at saving the precious time that people waste strolling in markets in looking for the books of their choice.
      
      We also provide students the facility to sell their old books which would have been considered worthless..</p>
    <br>
    <center><p style='padding:20px'>We wish to do so at the most nominal prices for the benefit of the society</p></center><br>
  </div>
    
</div>
<div class="row">
  <div id='div3' class='img3'>
    <br><br><br>
    <h3 class='text-center font2 f1' style="padding:20px">What is Books-On-Door??</h3>
    <br>
    <p style='padding:20px;' class="text-center" >Biggest book bazaar!!!Now,it is not so far...For buying and selling books,getting out of your homes is no more required.
    We present to you, <u>Books-On-Door</u>...
    </p>
    <h3 class='text-center f1'><u>Buy New books</u></h3><br>
    <p class="text-center" style="padding:20px">Tell us which books you want and we will deliver them to you...right at your doorstep</p>
   <center><a href="buybooks.php"><button class='btn btn-success'>Start Buying Here</button></a></center>
    <br>
    <h3  class='text-center f1'><u>Sell your books</u></h3><br>
    <p class="text-center" style='padding:20px'>Wanna increase your pocket money???Just sell us your old books ..We will come to you to take them..you stay where you are</p>
    <center><a href="bookreq.php"><button class='btn btn-success'>Start Selling Here</button></a></center><br>
     </div>
  </div>
   
   <div class="row"  id='div5' class='img5'>
      <br>
    <h3 class='text-center font2' style="padding-top:20px">This is why you choose us:</h3>
     
   
     <p class="text-center" style="padding:20px">Apart from the regular shopping at Khajuri Market,
      we give you many exciting offers which save your money. </p>
   
    <div class='col-xs-10 col-xs-offset-1 col-md-4 img4 col-md-offset-1'>
      <center><h3><span class='glyphicon glyphicon-shopping-cart'></span></h3></center>
      <p class="text-justify" style="padding:20px">New books are available to you at 85% of their MRP.</p>
    </div>
    
    <div class='col-xs-10 col-xs-offset-1 col-md-4 img4 col-md-offset-2'>
      <center><h3><span class='glyphicon glyphicon-home'></span></h3></center>
      <p class="text-justify" style="padding:20px">We accept your old books.
      We give to you upto 40% of MRP.You will be given your money instantly when our sales boy collects the books from you.    
      </p>
    </div>
        
    <div class='col-xs-10 col-xs-offset-1 col-md-4 img4 col-md-offset-1'>
      <center><h3><span class='glyphicon glyphicon-ok'></span></h3></center>
      <p class='text-center'>We promise Quality</p>
      <br><p class="text-justify" style="padding:20px">At books on door,we promise you to provide books in the best possible condition.</p>
    </div>
    
    <div class='col-xs-10 col-xs-offset-1 col-md-4 img4 col-md-offset-2'>
      <center><h3><span class='glyphicon glyphicon-time'></span></h3></center>
      <p class='text-center'>We value your time</p>
      
      <p style="padding:10px">Time is money.. and yes we consider that..We at Books_On_Door,aim to provide you your books and come to pick them up in the time specified.</p>
      
      
    </div>
    <br>  
    
</div><!--end of div5-->
 
  <div class="row" id='div6' class='img6'>
        <h3 class='text-center font2' style="padding-top:20px">
          Feel free to contact us for any queries</h3>
    <br>

  <section class="contact" id="contact">
        <div class="container">
            <div class="row">
                <div class="contact_heading text-center">
                    <p>We are here for you. Feel free to contact with us.</p>
                </div>

                <div class="contact_form col-md-6 col-md-offset-3">
                    <form action="contact_me.php" method="post">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Name" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" name="sub" placeholder="Subject" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea placeholder="Message" name="message" cols="30" rows="7" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                        <form>
                </div>
            </div>
        </div>
    </section>
    <br>
     
  <center>
    
       <a href="https://www.facebook.com/mranali.verma" target="_blank"><button class='btn btn-lg btn-default'><i class="fab fa-facebook-f"></i></button></a>
      &nbsp
    
         <a href="https://twitter.com/mranaliv/media" target="_blank"><button class='btn btn-lg btn-default'><i class="fab fa-twitter"></i></button></a>
         &nbsp
    
         <a href="https://www.linkedin.com/in/mayur-nagdev-186884159/" target="_blank"> <button class='btn btn-lg btn-default'><i class="fab fa-linkedin-in"></i></button></a>
    
  </center>
    <br><br>
     <div class="footer_end">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-md-offset-4">
                        <div class="footer_links">
                            <p> <span style="font-size: 1.3em";>&copy</span> 2018 BooksOnDoor, All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
  </div>

    
  
    
</div><!--container div-->
</body>
</html>