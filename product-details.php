<?php  
 include 'php/dbconnect.php';
 session_start();  

 
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"],
                    'item_website'          =>     $_POST["website_id"]
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="cart.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"],
                'item_website'          =>     $_POST["website_id"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="cart.php"</script>';  
                }  
           }  
      }  
 }  
 ?>  
<!DOCTYPE html>
<html lang="en">
<head>
   <style>
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

.stars-container {
  position: relative;
  display: inline-block;
  color: transparent;
}

.stars-container:before {
  position: absolute;
  top: 0;
  left: 0;
  content: '★★★★★';
  color: lightgray;
}

.stars-container:after {
  position: absolute;
  top: 0;
  left: 0;
  content: '★★★★★';
  color: gold;
  overflow: hidden;
}

.stars-0:after { width: 0%; }
.stars-10:after { width: 10%; }
.stars-20:after { width: 20%; }
.stars-30:after { width: 30%; }
.stars-40:after { width: 40%; }
.stars-50:after { width: 50%; }
.stars-60:after { width: 60%; }
.stars-70:after { width: 70%; }
.stars-80:after { width: 80%; }
.stars-90:after { width: 90%; }
.stars-100:after { width: 100; }
       
/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)}
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)}
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
.modal span:nth-of-type(1) {   position: absolute;
    right: 100px; }

div.stars {
  width: 270px;
  display: inline-block;
}
input.star { display: none; }
label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}
input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}
input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}
input.star-1:checked ~ label.star:before { color: #F62; }
label.star:hover { transform: rotate(-15deg) scale(1.3); }
label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}
       
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Product Details | Market-Place</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/price-range.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<meta property="og:url"           content="http://localhost/272/product-details.php" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Market PLace" />
	<meta property="og:description"   content="I am Buying a Product from Market Place" />
	<meta property="og:image"         content="images/product-details/<?php echo $_GET['image'];?>" />

	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<!--Google Map Api-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmjLulL2RJWCbb3ewYnwC9VfHNZRpRK-o&sensor=false"></script>
	<!--Google Map Api-->
	<link rel="shortcut icon" href="images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>

	<script src="angular/ModuleControls.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.8/angular-ui-router.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/sha256.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.min.js"></script>

<!-- Scripts For Social Plugins-->
<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
}(document, "script", "twitter-wjs"));</script>


<script src="https://apis.google.com/js/platform.js" async defer></script>

<!-- End of Scripts For Social Plugins-->

 <!--  Code added for Facebook Login  -->
    
    
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8&appId=200928480354080";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
   
    } else {
        
        
        //window.location.href = 'logout.php';
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '{200928480354080}',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.8' // use graph api version 2.8
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me?fields=id,name,email', function(response) {
      console.log('Successful login for: ' + response.name);
      //window.location = "index.php?name="+response.name+"&email="+response.email; 
     document.getElementById('status').innerHTML =
       'Thanks for logging in, ' + response.name+ response.email+'!';
    });
  }
</script>
<!-- End of Facebook Login  -->

</head><!--/head-->

<body ng-app="mainModule" ng-controller="loggingController">

   	 <?php

                                extract($_POST);
                                $reviewProdId=$_GET['id'];
                            
                                $sql2="SELECT avg(rating_star) as avgr FROM 272Project.review WHERE product_id ='".$reviewProdId."'";
                                $average_rating = '0';

                                $result2 = mysqli_query($conn, $sql2);
                                
                                if (!$result2 || mysqli_num_rows($result2) > 0) {
                                while($row2 = mysqli_fetch_array($result2))
                                {
                                    
                                    $average_rating = $row2["avgr"];
                                    
                                    break;
                                }
                                }
                                else{
                                $average_rating='0';
                                }
    ?>
   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <script>
      
     
    $(function() {
  function addScore(score, $domElement) {
    $("<span class='stars-container'>")
      .addClass("stars-" + score.toString())
      .text("★★★★★")
      .appendTo($domElement);
  }
        <?php if(!isset($average_rating)) 
{?>
    var x = 0;
<?php
}
else{?>
        
var x =  <?php echo $average_rating; ?>;
<?php
        
}        ?>
var test= (Math.round(x*2)/2).toFixed(1);
var rating = parseInt(test*2*10);
        
        
       
         console.log(rating,test);
         console.log("Rating"+rating);
  addScore(rating, $("#fixture"));
});
    </script>
   
    
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
extract($_POST);

$reviewProdId=$_GET['id'];
// echo $reviewerEmail;
// echo $reviewerName;
$website_id=$_GET['website_id'];
if(isset($_SESSION['userid'])){
$reviewerId=$_SESSION['userid'];
}
else
{
  $reviewerId=0;  
}
if(!$reviewerId){
	$reviewerId=0;
}

$rr="";
date_default_timezone_set('America/Los_Angeles');
$current_time = date('Y-m-d H:i:s');

if(isset($_SESSION['name'])){
	$reviewerName=$_SESSION['name'];
}
if(isset($_SESSION['email'])){
	$reviewerEmail=$_SESSION['email'];
}

$sql ="INSERT INTO 272Project.review (`user_review`, `product_id`, `website_id`, `rating_star`, `reviewer_id`,`email`,`username`,`review_date`) VALUES ('".$reviewText."',".$reviewProdId.", '".$website_id."',".$star.", '".$reviewerId."','".$reviewerEmail."','".$reviewerName."','".$current_time."')";
$result = $conn->query($sql);
}

?>
    
		<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +1 669-565-676</a></li>
								<li><a href="contact-us.php"><i class="fa fa-envelope"></i> eshoppermarketplace@gmail.com</a></li>
								<li><a href="https://www.facebook.com/EshopperDevelopers/"><i class="fa fa-facebook"></i></a></li>
							</ul>
						</div>
					</div>
									<?php if(isset($_SESSION['name'])){
                    ?>
						<div class="col-sm-6">
						    <div class="social-icons pull-right">
							<ul class="nav nav-pills">
								<li><a href="account.php"><i class="fa fa-user"></i> Hello! <?php echo $_SESSION['name'];?></a></li>
							</ul>
						</div>
					</div>
					
					<?php }
                    ?>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/logo.png" alt="" /></a>
						</div>
			
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="account.php"><i class="fa fa-user"></i> Account</a></li>
								
								<li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                <li><a ng-click="log('productpage','clicked on cart','null');" href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                      <?php if(isset($_SESSION['name']) ){
                                	?>
                                <li><a ng-click="log('productpage','clicked on login','null');" href="logout.php"><i class="fa fa-lock"></i>Logout</a></li>
                           <?php }else { ?>
                           <li><a ng-click="log('productpage','clicked on login','null');" href="login.php"><i class="fa fa-lock"></i>Login</a></li>
                           <?php } ?>
                            
                            </ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a ng-click="log('productpage','clicked on all products','null')"  href="shop.php">Products</a></li>
                                        <li><a ng-click="log('productpage','clicked on checkout','null')" href="checkout.php">Checkout</a></li>
                                        <li><a  ng-click="log('productpage','clicked on shopping cart','null')" href="cart.php">Cart</a></li>
                                 <?php if(isset($_SESSION['name']) ){
                                	?>
                                <li><a ng-click="log('productpage','clicked on login','null');" href="logout.php"><i class="fa fa-lock"></i>Logout</a></li>
                           <?php }else { ?>
                           <li><a ng-click="log('productpage','clicked on login','null');" href="login.php"><i class="fa fa-lock"></i>Login</a></li>
                           <?php } ?>
                                    </ul>
                                </li> 
							    	<li class="dropdown"><a href="#">View Partner Sites<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a ng-click="log('productpage','checked out buysmartdrone.com','null')" href="http://www.buysmartdrone.com">Smart Drones</a></li>
                                        <li><a ng-click="log('productpage','checked out wesalethecars.com','null')" href="http://www.wesalethecars.com">We Sale the Cars</a></li>
                                        <li><a ng-click="log('productpage','checked out fiestyfox.com','null')" href="http://www.fiestyfox.com/">Code King</a></li>
                                        <li><a ng-click="log('productpage','checked out sparkxinc.com','null')" href="http://www.sparkxinc.com/">Spark X Inc.</a></li>
                                        <li> <a ng-click="log('productpage','checked out workplaypractice.com','null')" href="http://www.workplaypractice.com/">Rent It</a></li>
                                    </ul>
                                </li>
                                <li><a  ng-click="log('productpage','checked out contact page','null')"  href="contact-us.php">Contact</a></li>
                            </ul>
                        </div>
					</div>
			
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section>
		<div class="container">
			<div class="row">
         	

				 <div id="myModal" class="modal">
                                 <span id="myspan"><a href="" style="text-decoration: none"><h2><b>X</b></h2></a></span>
                                      <img class="modal-content" id="img01">
                                      <div id="caption"> </div>
                                      
                                </div>
                       
				<div class="col-sm-12 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img id="myImg" src="images/product-details/<?php echo $_GET['image'];?>" alt="<?php echo $_GET['name'];?>" />
								<h3>Click Image to Zoom</h3>
							</div>
							
								
								  <!-- Wrapper for slides -->
			
    
								  <!-- Controls -->
							
						

						</div>
						<div class="col-sm-7">
						
							<div class="product-information"><!--/product-information-->
			
							<?php
                                if($_GET['status'] == "new"){?>
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
                                <?php
                                                            }
                                elseif ($_GET['status'] == "sale"){?>
                                    
                                    <img src="images/product-details/sale.png" class="newarrival" alt="" />
                                    
                                <?php
                                                                  }
                                ?>
                                    
								<h2><?php echo $_GET['name'];?></h2>
								<p>Provider: <a href="http://<?php echo $_GET['website_name'];?>"><?php echo $_GET['website_name'];?></a></p>
												                                                                      

								<div id="fixture"></div>
								
								<div>
								 <span>
									<span>US $<?php if (isset($_GET['price'])){echo $_GET['price'];}?></span>
									</span>  
									<p><b>Availability: </b><?php echo $_GET['quantity'];?></p>
								<p><b>Condition:</b> <?php echo $_GET['product_condition'];?></p>
								<p><b>Brand:</b> <?php echo $_GET['brand'];?></p>
									<div>
									 <div class="row">
									<div class="fb-follow" data-href="https://www.facebook.com/EshopperDevelopers/?skip_nax_wizard=true" data-layout="standard" data-size="small" data-show-faces="false"></div>
                              
                                <a class="twitter-follow-button"
  href="https://twitter.com/Anshuldec7"
  data-size="large"
  data-show-count="true"
   data-show-screen-name="false">
Follow us</a>
<a class="twitter-share-button"
  href="https://twitter.com/intent/tweet">
Tweet</a>


                               
                               <div class="g-follow" data-annotation="none" data-height="20" data-href="https://plus.google.com/u/0/105642379038917906443" data-rel="author"></div>
                <div class="fb-share-button" 
		data-href="http://buysmartdrone.com/marketplace/product-details.php" 
		data-layout="button_count">
	</div>  </div>
                              <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
<script type="IN/Share" data-url="http://www.buysmartdrone.com/marketplace/"></script>
                               
                              
									<div align="center">
									<form method="post" action="cart.php?action=add&id=<?php echo $_GET['id']; ?>&hidden_name=<?php echo $_GET['name']; ?>&hidden_price=<?php echo $_GET['price']; ?>&quantity=<?php echo $_GET['quantity']; ?>&website_id=<?php echo $_GET['website_id']; ?>&image=<?php echo $_GET['image']; ?>">
									
									
									<input type="hidden" name="hidden_name" value="<?php echo $_GET["name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $_GET["price"]; ?>" /> 
									
									<button ng-click="log('productpage','item added to cart','<?php echo $_GET['id']; ?>')" type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
        
                                        </form>
                    
                                        </div>
									
								</div> 
								
     
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					 <?php		
                                $averageRating=0.0;	
                                $numberOfReviews=0;
                                extract($_POST);
                                $reviewProdId=$_GET['id'];
                                $rr="";
                                $sql1="SELECT username, review_date, user_review, (SELECT count(review_id) FROM 272Project.review WHERE product_id ='".$reviewProdId."') as total, (SELECT avg(rating_star) FROM 272Project.review WHERE product_id ='".$reviewProdId."') as averageRating FROM 272Project.review WHERE product_id ='".$reviewProdId."' ORDER BY review_date desc limit 5";


                                $result1 = mysqli_query($conn, $sql1);?>
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-md-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Details</a></li>
								<?php 
                                if (!$result1 || mysqli_num_rows($result1) > 0) {
                                while($row1 = mysqli_fetch_array($result1)){
                                ?>
                                <li ><a href="#reviews" data-toggle="tab">Reviews (<?php echo $row1["total"];?>)</a></li>    
                                
                               <?php 
                                break;
                                } }
                                else{
                                ?>
								<li ><a href="#reviews" data-toggle="tab">ADD FIRST REVIEW</a></li>
								<?php } 
                                ?>
							</ul>
						</div>
						<div class="tab-content">
                                               

							<div class="tab-pane fade active in" id="details" >
								<div class="col-sm-12">
                               <div class="row text-muted well well-sm no-shadow">
        <!-- accepted payments column -->
        <div class="col-xs-6 ">
        <br>
          <p class="lead ">Product Decription:</p>
        

          <p class="" style="margin-top: 10px;"><?php echo $_GET["description"]; ?>
            </p>
                                   </div>
                                
                                    </div>
                                </div>
                                
                            </div>
								<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
								<p><b>Write Your Review</b></p>														
									
									<form action="./product-details.php?price=<?php echo $_GET['price']; ?>&name=<?php echo $_GET['name']; ?>&image=<?php echo $_GET['image']; ?>&id=<?php echo $_GET['id']; ?>&description=<?php echo $_GET['description']; ?>&website_id=<?php echo $_GET['website_id']; ?>&website_name=<?php echo $_GET['website_name']; ?>&type=<?php echo $_GET['type']; ?>&status=<?php echo $_GET['status']; ?>&quantity=<?php echo $_GET['quantity']; ?>&product_condition=<?php echo $_GET['product_condition']; ?>&brand=<?php echo $_GET['brand']; ?>" method="post">
									<span>
									<?php
									if(isset($_SESSION['name'])){
									?>
											<input type="hidden" placeholder=<?php echo $_SESSION['name'];?> name="reviewerName" />
										<?php }else{?>
											<input type="text" placeholder="Enter Your Name" name="reviewerName" />
									<?php	}?>
									<?php
									if(isset($_SESSION['email'])){
									?>
											<input type="hidden" placeholder=<?php echo $_SESSION['email'];?> name="reviewerEmail"/>
										<?php }else{?>
											<input type="email" placeholder="Enter your Email ID" name="reviewerEmail"/>
									<?php	}?>
									
											
										</span>
										<textarea name="reviewText" ></textarea>
									<div class="stars col-offset-12"> 
  
    <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
    <label class="star star-1" for="star-1"></label>

</div>
									
										
										<input type="submit" ng-click="log('productpage','added a review for a product','<?php echo $_GET['id']; ?>')" name="Login" value="Submit" ng-click="log('productpage','submitted a review','<?php echo $_GET['id']; ?>')" align="center" class="btn btn-default pull-right"/>
									</form>
									<?php
                                    
                                    $sql="SELECT review_id,username, review_date, user_review, rating_star,(SELECT count(review_id) FROM 272Project.review WHERE product_id ='".$reviewProdId."') as total, (SELECT avg(rating_star) FROM 272Project.review WHERE product_id ='".$reviewProdId."') as averageRating FROM 272Project.review WHERE product_id ='".$reviewProdId."' ORDER BY review_date desc limit 5";

                                $result = mysqli_query($conn, $sql);
                                    
if (!$result || mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_array($result)) {
        $userrating=$row["rating_star"];
// 	echo $row["username"];
// 	echo $row["review_date"];
// 	echo $row["user_review"];
// 	echo $row["total"];
// 	echo $row["averageRating"];?>
<script> 
    $(function() {
  function addScore(score, $domElement) {
    $("<span class='stars-container'>")
      .addClass("stars-" + score.toString())
      .text("★★★★★")
      .appendTo($domElement);
  }
        <?php if(!isset($userrating)) 
{?>
    var x = 0;
<?php
}
else{?>
        
var x =  <?php echo $userrating; ?>;
<?php
        
}        ?>
var test= (Math.round(x*2)/2).toFixed(1);
var rating = parseInt(test*2*10);
  addScore(rating, $("#userrating<?php echo $row["review_id"];?>"));
});
</script>
   

<!-- 										<ul> -->
<!-- 										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li> -->
<!-- 										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li> -->
<!-- 										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li> -->
<!-- 										</ul> -->
<!-- 									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p> -->
										
										<ul>
                                            <li><a href=""><i class="fa fa-user"></i><?php echo $row["username"];?></a></li>
                                           
										<li><a href=""><i class="fa fa-clock-o"></i><?php echo substr($row["review_date"],11);?></a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i><?php echo substr($row["review_date"],0,10); ?></a></li>
										</ul>
										 <div id="userrating<?php echo $row["review_id"];?>"></div>
									<p><?php echo $row["user_review"]; ?></p>
									
									
									<?php 
									}
									}
									?>
								</div>
							</div>
							
                        </div>
						
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
			
						
			
						
						
						
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
								
					
                       
                		<?php  
                                    $websiteID = $_GET['website_id'];
                                    
                $query = "Select * from 272Project.product_details where website_id='$websiteID' order by product_id desc limit 3";  
                $result = mysqli_query($conn, $query);  
                if(!$result || mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?> 
								
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/product-details/<?php echo $row["image"]; ?>" alt="" />
													<h2>$<?php echo $row["price"]; ?></h2>
													<p><?php echo $row["name"]; ?></p>
													<a href="./product-details.php?price=<?php echo urlencode($row['price']); ?>&name=<?php echo urlencode($row['name']); ?>&image=<?php echo urlencode($row['image']); ?>&id=<?php echo urlencode($row['product_id']); ?>&description=<?php echo urlencode($row['description']); ?>&website_id=<?php echo urlencode($row['website_id']); ?>&website_name=<?php echo urlencode($row['website_name']); ?>&type=<?php echo urlencode($row['type']); ?>&status=<?php echo urlencode($row['status']); ?>&quantity=<?php echo urlencode($row['quantity']); ?>&product_condition=<?php echo urlencode($row['product_condition']); ?>&brand=<?php echo urlencode($row['brand']); ?>" ng-click="log('home','checkout products from the Top 5 Prodcuts in the sparkxinc.com','null')" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Product Details</a>
												</div>
											</div>
										</div>
									</div>
									
									
						 <?php  
                     }  
                } 
                        
                ?>  
							
								</div>
								<div class="item">	
								
								
                       
                		<?php  
                                    $websiteID = $_GET['website_id'];
                                    
                $query = "Select * from 272Project.product_details where website_id='$websiteID' order by product_id asc limit 3";  
                $result = mysqli_query($conn, $query);  
                if(!$result || mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?> 
								
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/product-details/<?php echo $row["image"]; ?>" alt="" />
													<h2>$<?php echo $row["price"]; ?></h2>
													<p><?php echo $row["name"]; ?></p>
													<a href="./product-details.php?price=<?php echo urlencode($row['price']); ?>&name=<?php echo urlencode($row['name']); ?>&image=<?php echo urlencode($row['image']); ?>&id=<?php echo urlencode($row['product_id']); ?>&description=<?php echo urlencode($row['description']); ?>&website_id=<?php echo urlencode($row['website_id']); ?>&website_name=<?php echo urlencode($row['website_name']); ?>&type=<?php echo urlencode($row['type']); ?>&status=<?php echo urlencode($row['status']); ?>&quantity=<?php echo urlencode($row['quantity']); ?>&product_condition=<?php echo urlencode($row['product_condition']); ?>&brand=<?php echo urlencode($row['brand']); ?>" ng-click="log('home','checkout products from the Top 5 Prodcuts in the sparkxinc.com','null')" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Product Details</a>
												</div>
											</div>
										</div>
									</div>
									
									
						 <?php  
                     }  
                } 
                        
                ?>  
									
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
            </div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>Our</span>-Partners</h2>
							<p>We have 5 Strong Standing Partners in the Market</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/logo/smartdrone_logo.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Smart Drone</p>
								
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/logo/carstore_logo.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>We Sale the Cars</p>
					
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/logo/code_king_logo.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Code Kings</p>
							
							</div>
						</div>
							<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/logo/sparkx_logo.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Spark X Inc.</p>
						
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/logo/rentit_logo.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Rent It</p>
							
							</div>
						</div>
				
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>San Jose State University, One Washington Square, San Jose , CA 95110</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2016 Market Place Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.buysmartdrone.com">Team Spartan Warriors</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

           <script type="text/javascript">
                            // Get the modal
                            var modal = document.getElementById('myModal');

                            // Get the image and insert it inside the modal - use its "alt" text as a caption
                            var img = document.getElementById('myImg');
                            var modalImg = document.getElementById("img01");
                            var captionText = document.getElementById("caption");
                            img.onclick = function(){
                                modal.style.display = "block";
                                modalImg.src = this.src;
                                captionText.innerHTML = this.alt;
                            }

                            // Get the <span> element that closes the modal
                            var span = document.getElementById("myspan");

                            // When the user clicks on <span> (x), close the modal
                            span.onclick = function() {
                                modal.style.display = "none";
                            }
                            </script>
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/584b186f651e34097ab32320/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    
</body>
</html>
