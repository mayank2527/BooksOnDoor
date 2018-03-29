<!DOCTYPE html>
<html>

 <head>
 <link rel="stylesheet" type="text/css" href="">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-

awesome/4.5.0/css/font-awesome.min.css"/>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
    	.box
{
 
  margin:0px 20px;
 // width:1200px;
  border-width:15px;
  border-color:#FF4500;
  border-style:groove;
  border-radius:20px;
}
.font1
{
  color:black;
    font-family:'Sofia';
  font-size:40px;
}

.bck1{
  background-color:#20B2AA;
   
}
.bck2
{
  background-color:#FFA500;
 }
table
{
    border:3px solid black;
  table-layout:fixed;
 // table-width:100px;
}
tr,td,th
{
  text-align:center;
 border:2px solid black;
}
.prop1
{
  border-right:2px solid black;
  text-align:center;
  vertical-align:center;
}
/*table.fixed

{
table-layout:fixed;
  overflow:hidden;
//  table-width:100px;
}
table.fixed td,table.fixed tr ,table.fixed th 
{ 
  overflow: hidden;
}
*/    </style>

         <script type="text/javascript">
      
      <?php
      session_start();
      if (isset($_SESSION['res'])&&$_SESSION['res']=="failed") {
        echo "alert('Incorrect username or password')";

      }

       ?>

    </script>

<script type="text/javascript">

	function add(ID)
{

  var y=ID;
var x= document.getElementById("quantityDiv"+y+"").innerText;
  x++;
  document.getElementById("quantityDiv"+y+"").innerText=x;
}//end of add()
function minus(ID)
{
  var y=ID;
//  alert("quantityDiv"+y+"");
  var x=document.getElementById("quantityDiv"+y+"").innerText;
  if(parseInt(x)>1)
    {
  x--;
  document.getElementById("quantityDiv"+y+"").innerText=x;
    }
}//end of minus() 
var abc=[];
var ar=[];
var bookar=[];
  function findBooks()
	{
			ar=[];
		  $("#divContent").html("");
		  $("#myDiv").html(" ");
		  var row1=$("<table style='background-color:white'></table>");
		  row1.append("<tr>");
		  row1.append("<th style='display:none;text-align:center'>ID</th>");
		  row1.append("<th style='text-align:center'>Title</th>");
		  row1.append(" <th style='text-align:center'>Authors</th>");
		  row1.append("<th style='text-align:center'>Category</th>");
		  row1.append("<th style='text-align:center'>Price</th>");
		  row1.append("<th style='text-align:center'>Image</th>");
		  row1.append("<th style='text-align:center'>Quantity</th>");
		  row1.append("<th style='text-align:center'>Add to Bag</th>");
		  row1.append("</tr>");
		  row1.append("<br>");
		//   $("#myTable").append(row1);
		  //$("#myTable").append("<br>");
		  
		  $("#myTable").html("");
		  var x=document.getElementById('input1').value;
		var y = x.replace(/ /g, '+');
		  
		  var url1="https://www.googleapis.com/books/v1/volumes?q="+y+"&maxResults=40&key= AIzaSyBbf8ccex1SCMsXin4Af7C2NTn_D38xhfw";
		 $.ajax({
	        url:url1,
	        dataType: 'jsonp',
	        success: function(data){
	          /*starting row append*/
	         for(var i=0;i<40;i++)
	           {
	             
	       try{
	         console.log(typeof(data.items[i].saleInfo.listPrice.amount));
	         if(typeof(data.items[i].saleInfo.listPrice.amount)==='number'&&data.items[i].saleInfo.listPrice.amount!==0){
	           var row=$("<tr></tr>");
	          
	            // var row=$("<tr></tr>");
	            // row.append("<tr>");
	             row.append("<td class='id' style='display:none;height:100px'>"+data.items[i].id+"</td>");
	      		ar.push(data.items[i].id);
	             row.append("<td class='title' style='height:100px'>"+data.items[i].volumeInfo.title+"</td>");
	            try{ row.append("<td class='aut' style='height:100px'>"+data.items[i].volumeInfo.authors+"</td>");
	               }
	             catch(err5)
	               {
	                 row.append("<td style='height:100px'>Not Available</td>");
	               }
	             try
	               {
	                 row.append("<td style='height:100px'>"+data.items[i].volumeInfo.categories+"</td>");
	               }
	    catch(err1)
	      {
	        row.append("<td style='height:100px'>Not Available</td>");
	      }
	             try
	               {
	                 row.append("<td style='height:100px'>"+data.items[i].saleInfo.listPrice.amount+"</td>");
	               }
	             catch(err2)
	               {    
	                                         
	               }
	             
	                    try{
	 row.append("<td style='height:100px'><img src="+data.items[i].volumeInfo.imageLinks.smallThumbnail+"alt='not available'></td>");     
	          }
	          catch(err4)
	            {
	          row.append("<td style='height:100px'>Image Not Available</td>");
	            }
	             console.log(i);
	            // row.append()
	             row.append("<button class='btn btn-danger' id='"+i+"' onclick='minus(this.id)' style='margin-top:20px;margin-bottom:10px'>-</button><br><div class='quant' id='quantityDiv"+i+"'>1</div><br><button id='"+i+"' class='btn btn-success' onclick='add(this.id)'>+</button>");
	       
					  //   $.ajax({
   				//     	url:"checkbook.php",
   				//     	data:{bookid:data.items[i].id},
   				//     	type:"POST",
   				//     	dataType:'text',
   				//     	success:function(data){
   				//     		if (data=='success') {
							// row.append('<td>added</td>');
   				//     		}
   				//     		else
							// row.append('<td><button class="btn btn-primary adbtn">Add</button></td>');  				    	}
   				//     });

				row.append('<td><button class="btn btn-primary addbt">Add</button></td>');

	             
	       

	             //row.append("</tr>");
	             row.append("<br>");
	               // row.append("<br>");
	             row1.append(row);
	            $("#divContent").append(row1);
	                     
	         }//end of if

	       } //end of try

	             catch(err1)
	               {
	                 console.log('not found');
	               }
	           }///end of for
            
		<?php
		if (isset($_SESSION['uname'])) {
				
			?>

			$.ajax({
				url:'checkbook.php',
				dataType:'text',
				type:'POST',
				success:function(data){
					if (data=='failed') {
						bookar=null;
					}
					else{
					bookar=data.split(',');
					bookar.pop();
					console.log(bookar);
					abc=ar.filter(function(n) {
					    return bookar.indexOf(n) !== -1;
					});
					console.log(abc);
					$('.addbt').each(function(){
						var ab=$(this).parent().parent().find("td.id")
		       			var ob=$(this);
						abc.forEach(function(item,index){
							console.log(ab[0].innerText);     
		    	   			console.log(item);     

							if (ab[0].innerText==item) {
								ob.replaceWith('<p>Added</p>'); 
							}
						});

					});


					}
				}


			});

			<?php

			}	

		?>

	

			 		$(".addbt").click(function(){
	       				var ab=$(this).parent().parent().find("td.id");
	       				var q=$(this).parent().parent().find("div.quant");
	       				var t=$(this).parent().parent().find("td.title");
	       				var a=$(this).parent().parent().find("td.aut");

		       			console.log(ab[0].innerText);     
		       			console.log(q[0].innerText);
		       			
		       			console.log(t[0].innerText);     
		       			console.log(a[0].innerText);



	       			<?php
	       				if (isset($_SESSION['uname'])) {


	       				?>
		       			$(this).replaceWith('<p>Added</p>'); 

					    $.ajax({
   				    	url:"add.php",
   				    	data:{bookid:ab[0].innerText,quantity:q[0].innerText},
   				    	type:"POST",
   				    	dataType:'text',
   				    	success:function(data){
   				    		if (data=='success') {
								console.log("item added");

   				    		}
   				    		else
   				    			alert(data);
   				    	}
   				    });


	       				<?php

	       				}
	       				else{

	       				?>
	       					alert('Please Login First');
	       				
	       				<?php
	       				}
	       				?>
	       			

	       			

	       				


	 					});     
  			        
          
                  console.log(data.items[0].id); console.log(data.items[3].volumeInfo.authors);
     console.log(data.items[0].saleInfo.saleability);     try{
    var price=data.items[2].saleInfo.listPrice.amount;
        console.log(price);
     }
          catch(err1)
            {
              console.log('amount not defined');
            }
 //var priceStr=price.toString();
  
         
         console.log(data.items[3].volumeInfo.imageLinks.smallThumbnail);   
      /*    $("#myDiv").html(" ");
          try{
 $("#myDiv").append("<img src="+data.items[0].volumeInfo.imageLinks.smallThumbnail+"alt='not available'>");     
          }
          catch(err)
            {
              console.log('image not found');
            }*/
          console.log(data.items[0].saleInfo.country);
          console.log(data.items[2].volumeInfo.title);

   
        
        
        
        
        },//end of success
    error: function(xhr){
            console.log("An error occured: " + xhr.status + " " + xhr.statusText);
    }
  });//end of $.ajax()
        
       	
       	


}//end of function
    



 

</script>

  </head>
<body class='bck1 box '>
<div class="container-fluid">
  <div class="row" >
   
    <nav class="navbar navbar-inverse">
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

      <a class="navbar-brand" href="cart.php"><span class="glyphicon glyphicon-user"><?php echo $_SESSION['uname'];?></span></a>

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
</div>
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

<br>
  <div id='div1' class='mg1 row'>
   <center> <button class="margin btn text-center">
    <h1 class="text-center font1"><strong><u><div class="bck2">Buy Books</h1></div></strong></u></button></center><br><br>
<div>
	<div class="col-md-offset-3 col-md-5">
 	<input type='text' class="form-control" id='input1' placeholder='search a book by name,author or publication'>
	
	</div>  	
 
  <button class="btn btn-default" onclick="findBooks()" ><span class='glyphicon glyphicon-search' style="font-size:15px";></span></button>
 
</div>  
  <br>
  <div id='myDiv'></div>
 <!--
<img src="http://books.google.com/books/content?id=9nFDvk9yr3kC&printsec=frontcover&img=1&zoom=5&edge=curl&source=gbs_api" alt="not avialable"> 
-->
  <table id="divContent" align="center" class='fixed'>
    <!--
  <tr>
    <th id='1' >ID</th>
    <th id='2'>Authors</th>
    <th id='3'>Average Rating</th>
    <th id='4'>Price</th>
    <th id='5'>Image</th>
  </tr>
    -->
  </table>
  
  <br>
	
</div>
</body>
</html>