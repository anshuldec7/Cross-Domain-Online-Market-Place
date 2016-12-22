<?php   
 session_start();  

  if(isset($_GET["id"]))  
 { 
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],
                    'item_image'        =>     $_GET["image"],
                     'item_name'               =>     $_GET["hidden_name"],  
                     'item_price'          =>     $_GET["hidden_price"],  
                     'item_quantity'          =>     $_GET["quantity"],
                    'item_website'          =>     $_GET["website_id"]
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                
                echo '<script>window.location="cart.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],
               'item_image'        =>     $_GET["image"],
                'item_name'               =>     $_GET["hidden_name"],  
                'item_price'          =>     $_GET["hidden_price"],  
                'item_quantity'          =>     $_GET["quantity"],
                'item_website'          =>     $_GET["website_id"]  
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Checkout | E-Shopper</title>
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

<body>
		<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +1 669-565-676</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@buysmart.com</a></li>
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
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
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
                                        <li><a href="shop.php">Products</a></li> 
										<li><a href="checkout.php">Checkout</a></li> 
										<li><a href="cart.php">Cart</a></li> 
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
                                        <li><a href="http://www.buysmartdrone.com">Smart Drones</a></li> 
										<li><a href="http://www.wesalethecars.com">We Sale the Cars</a></li> 
										<li><a href="http://www.fiestyfox.com/">Code King</a></li> 
										<li><a href="http://www.sparkxinc.com/">Spark X Inc.</a></li> 
                                      <li><a href="http://www.workplaypractice.com/">Rent It</a></li> 
                                   
                                    </ul>
                                </li> 
								<li><a href="contact-us.php">Contact</a></li>
							</ul>
						</div>
					</div>
			
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->
<!--
			<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>-->
			<!--<div class="checkout-options">
				<h3>New User</h3>
				<p>Checkout options</p>
				<ul class="nav">
					<li>
						<label><input type="checkbox"> Register Account</label>
					</li>
					<li>
						<label><input type="checkbox"> Guest Checkout</label>
					</li>
					<li>
						<a href=""><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul>
			</div><!--/checkout-options-->

			
			
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
			<?php 
			 if(!empty($_SESSION["shopping_cart"]))
			 {
                               	?>
			
			
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					          <?php
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="images/product-details/<?php echo $values["item_image"]; ?>" width="150" height="150" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $values["item_name"]; ?></a></h4>
								<p>Website ID: <?php echo $values["item_website"]; ?></p>
							</td>
							<td class="cart_price">
								<p>$<?php echo $values["item_price"]; ?></p>
							</td>
							
							<td class="cart_total">
								<p class="cart_total_price">$<?php echo number_format($values["item_price"], 2); ?></p>
							</td>
							<td class="cart_delete">
								<a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
							</tbody>
				</table>
			</div>
			<div class="payment-options">
					<span>
						<button class="btn btn-primary airbnb-color" style="width:90px;margin-bottom:10px;" data-toggle="modal" data-target="#myModal" ng-disabled="paymentButton[$index]" ng-click="pay(trip.tripId,trip.totalPrice)">Pay</button>
					</span>

				</div>
				  <?php 
				 
				  $total = $total +  $values["item_price"];
				
				  
				  
				  }
                               }   
                else {
                    ?>
                    <h2 align="center">Your Cart is Empty</h2>
                    <?php
                }
                          ?>
				
			
		</div>
	</section> <!--/#cart_items-->

	

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
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
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


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color:#E6E6E6;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Please fill the card details</h4>
			</div>
			<div class="modal-body">
				<div class="editProfile" >
					<img class="editProfile" style="margin-left:15px;height:30px;width:30px;"src="./images/visa.jpg">
					<img class="editProfile" style="margin-left:15px;height:30px;width:30px;"src="./images/mastercard.jpg">
					<img class="editProfile" style="margin-left:15px;height:30px;width:30px;"src="./images/amex.png">
					<img class="editProfile" style="margin-left:15px;height:30px;width:30px;"src="./images/discover.png">
				</div>
				<br>
				<div>
					<form class="form-horizontal" role="form" action="payment.php" method = "GET">
						<div class="form-group">
							<label class="col-lg-3 control-label editProfile">Card Number</label>
							<div class="col-lg-9">
								<input class="form-control" type="text" name="cardNumber" maxlength="16" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label editProfile">Expiry</label>
							<div class="col-lg-2">
								<select class="form-control" name="expiryMonth" required>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
								</select>
							</div>
							<div class="col-lg-3">
								<select class="form-control" name="expiryYear" required>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									<option value="2021">2021</option>
									<option value="2022">2022</option>
									<option value="2023">2023</option>
									<option value="2024">2024</option>
									<option value="2025">2025</option>
									<option value="2026">2026</option>
									<option value="2027">2027</option>
									<option value="2028">2028</option>
									<option value="2029">2029</option>
									<option value="2030">2030</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label editProfile">Security Code</label>
							<div class="col-lg-2">
								<input class="form-control" type="password" name="cvv" maxlength="3" required>
							</div>
							<label class="col-lg-3 control-label editProfile">Country</label>
							<div class="col-lg-4">
								<input class="form-control" type="text" name="billingCountry">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label editProfile">First Name</label>
							<div class="col-lg-3">
								<input class="form-control" type="text" name="billingFirstName" required>
							</div>
							<label class="col-lg-3 control-label editProfile">Last Name</label>
							<div class="col-lg-3">
								<input class="form-control" type="text" name="billingLastName" required>
							</div>
							<label class="col-lg-3 control-label" style="margin-top:5px;">Delivery Address</label>
							<div class="col-lg-9">
								<input class="form-control" type="text" name="deliveryaddress"style="margin-top:10px;" required>
							</div>
							
						</div>
						<input type="submit" class="btn btn-primary" value="Make Payment">
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<div class="pull-left" style="color:darkred;font-size:20px; font-weight: 500;font-family: "Circular", "Helvetica Neue", Arial, sans-serif">
				Total: $<?php echo round($total*1.075,2) ?>
			</div>
			<button type="button" class="btn btn-danger" style="margin-top:15px;" data-dismiss="modal">Cancel</button>


		</div>
	</div>
</div>
</div>




</html>