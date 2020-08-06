
<!DOCTYPE html>

<html>

<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

<title>BloodBank & Donor Management System</title>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/modern-business.css" rel="stylesheet">
	
    <style>
    .navbar-toggler {
        z-index: 1;
    }
    
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    .carousel-item.active,
    .carousel-item-next,
    .carousel-item-prev {
        display: block;
    }
	
	.button {
  display: inline-block;
  border-radius: 50px;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 15px;
  padding: 15px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

    

</style>



</head>


<body>
<?php include('includes/header.php');?>
<?php include('includes/slider.php');?>
   
    <!-- Page Content -->
    <div class="container">
	  <h1 class="my-4" align="center">Welcome to BloodBank & Donor Management System </h1>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="request.php"><button class="button" style="background-color:red"><span><strong>Request Blood</strong></span></button></a>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="search-donor.php"><button class="button" style="background-color:black"><span><strong>Search Donars</strong></span></button></a>
&nbsp&nbsp&nbsp&nbsp&nbsp  <a href="login2.php"><button class="button" style="background-color:green"><span><strong>Login | Register</strong></span></button></a>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  <a href="bloodcamps.php"><button class="button" style="background-color:purple"><span><strong>Camps | Events</strong></span></button></a>

	
	  <br><br><br>
	   <div class="row">
	  
     &nbsp     <div class="col-lg-5 mb-15">
			
                <div class="card">
			
                    <h4 class="card-header">The need for blood</h4>
                   
                        <p class="card-text" style="padding-left:2%">The reasson to donate is simple...it save lives.In fact,every two seconds of ever day someone needs blood </p>
                </div>
            </div>
			 
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <h4 class="card-header">Blood Tips</h4>
                   
                        <p class="card-text" style="padding-left:2%">Eat and Drink wisely,hydrate yourself,get a good night sleep. </p>
                </div>
				 </div>
				
              <ul>
                
                
      </div>  

         <!-- Features Section -->
       <div class="row">
            <div class="col-lg-6">
                <h2>BLOOD GROUPS</h2>
        <p>  Blood group of any human being will mainly fall in any one of the following groups.</p>
                <ul>
                
                
<li>A positive or A negative</li>
<li>B positive or B negative</li>
<li>O positive or O negative</li>
<li>AB positive or AB negative.</li>
                </ul>
                <p>A healthy diet helps ensure a successful blood donation, and also makes you feel better! Check out the following recommended foods to eat prior to your donation.</p>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded" src="images/17.jpg" alt="">
            </div>
        </div>
        <!-- /.row -->

        <hr>


        <!-- Call to Action Section -->
        <div class="row mb-4">
            <div class="col-md-8">
            <h4>UNIVERSAL DONORS AND RECIPIENTS</h4>
                <p>
The most common blood type is O, followed by type A.

Type O individuals are often called "universal donors" since their blood can be transfused into persons with any blood type. Those with type AB blood are called "universal recipients" because they can receive blood of any type.</p>
       </div>
	    </div>
		</div>
				
       
	  
  <?php include('includes/footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
