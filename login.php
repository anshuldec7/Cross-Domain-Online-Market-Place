<?php


session_start();

//
//$plus = new  Google_Service_Plus($client);
//
//
////Actual Process
//
//if(isset($_REQUEST['logout'])){
//
//	session_unset();
//}
//
//if(isset($_GET['code']))
//{
//	$client->authenticate($_GET['code']);
//	$_SESSION['access_token'] = $client->getAccessToken();
//	$redirect='http://'.$_server['HTTP_POST'].$_SERVER['PHP_SELF'];
//	header('Location:'.filter_var($redirect,FILTER_SANITIZE_URL));
//}
//
//if(isset($_SESSION['access_token']) && $_SESSION['access_token']){
//	$client->setAccessToken($_SESSION['access_token']);
//	$me= $plus->people->get('me');
//
//	/*header('Location: http://localhost:63343/Eshopper/index.php' );
//	$id = $me['id'];
//	$name =$me['displayName'];
//	$email = $me['emails'][0]['value'];*/
//	header('Location: http://localhost:63343/Eshopper/index.php' );
//
//}
//else{
//
//	$authUrl= $client->createAuthUrl();
//}
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | Market-Place</title>
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
	
	<style>
    
.fb-login-button {
transform: scale(3.5);
-ms-transform: scale(3.5);
-webkit-transform: scale(3.5);
-o-transform: scale(3.5);
-moz-transform: scale(3.5);
transform-origin: top left;
-ms-transform-origin: top left;
-webkit-transform-origin: top left;
-moz-transform-origin: top left;
-webkit-transform-origin: top left;
}
    </style>
</head><!--/head-->

<body ng-app="mainModule" ng-controller="loggingController">
    
    
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
        var email=response.email;
        
  
        
        
      window.location = "facebooklogin.php?name="+response.name+"&email="+response.email; 
     // document.getElementById('status').innerHTML =
       //'Thanks for logging in, ' + response.name+ response.email+'!';
    });
  }
</script>
<!-- End of Facebook Login  -->


<script type="text/javascript">
$(document).ready(function()
{    
	$("#email").keyup(function()
	{		
		var name = $(this).val();	
		
		if(name.length > 1)
		{		
			$("#result").html('checking...');
			
			/*$.post("username-check.php", $("#reg-form").serialize())
				.done(function(data){
				$("#result").html(data);
			});*/
			
			$.ajax({
				dataType: "text",
				type : 'POST',
				url  : 'username-check.php',
				data : $(this).serialize(),
				success : function(data)
						  {  
                              var result = $.trim(data);
                              if(result=="no")
                                  {
                                      var msg = "<span style='color:brown;'><h4>Sorry user already exists with this Email !!!</h4></span>"
					                  $("#result").html(msg);
                                      $("button[name=register]").attr('disabled', 'disabled');
                                      
                                  }
                              else
                                  {
                                      var msg = "<span style='color:green; '><h4>User Available for this Email</h4></span>";	
                                      $("#result").html(msg);   
                                      $("button[name=register]").removeAttr("disabled");
                                  }
					      }
				});
				return false;
			
		}
		else
		{
			$("#result").html('');
		}
	});
	
});
</script>
    
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
								<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
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
                                            <li><a ng-click="log('loginpage','clicked on all products','null')"  href="shop.php">Products</a></li>
                                            <li><a ng-click="log('loginpage','clicked on checkout','null')" href="checkout.php">Checkout</a></li>
                                            <li><a  ng-click="log('loginpage','clicked on shopping cart','null')" href="cart.php">Cart</a></li>
                                            <li><a ng-click="log('loginpage','clicked on login','null')"  href="login.php">Login</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">View Partner Sites<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a ng-click="log('loginpage','checked out buysmartdrone.com','null')" href="http://www.buysmartdrone.com">Smart Drones</a></li>
                                            <li><a ng-click="log('loginpage','checked out wesalethecars.com','null')" href="http://www.wesalethecars.com">We Sale the Cars</a></li>
                                            <li><a ng-click="log('loginpage','checked out fiestyfox.com','null')" href="http://www.fiestyfox.com/">Code King</a></li>
                                            <li><a ng-click="log('loginpage','checked out sparkxinc.com','null')" href="http://www.sparkxinc.com/">Spark X Inc.</a></li>
                                            <li> <a ng-click="log('loginpage','checked out workplaypractice.com','null')" href="http://www.workplaypractice.com/">Rent It</a></li>
                                        </ul>
                                    </li>
                                    <li><a  ng-click="log('loginpage','checked out contact page','null')"  href="contact-us.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-bottom-->
	</header><!--/header-->

<!--
		<div style="padding-left: 400px;padding-top:100px;">
	<?php
	//if(isset($authUrl))
	//{
	//	echo "<a class='login' href='".$authUrl."'><img src='gplus/signin_button.png' height='50px'/>";
	//}
	//else{

	//	header('Location: http://localhost:63343/Eshopper/index.php' );
		//print "ID: {$id}";

	//}

	?>
</div>
-->

	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
				            <fb:login-button scope="public_profile,email" data-size="xlarge" autologoutlink="true" onlogin="checkLoginState();">
                            <div class="fb-login-button" data-max-rows="1" data-size="xlarge" data-show-faces="true" data-auto-logout-link="true"></div>
                            </fb:login-button>
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="php/check_login.php" method = "post">
							<input type="text" placeholder="Email" name = "email"/>
							<input type="password" placeholder="Password" name = "password"  />
							<span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
							</span>
							<button type="submit" ng-click="log('loginpage','login attempted','null')" class="btn btn-default">Login</button>

						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
            <form action="php/register.php" method="post">
							<input type="text" placeholder="Name" name="name"/>
							<input type="email" placeholder="Email Address" name="email" id="email"/>
							<span id="result"></span>
							<input type="password" placeholder="Password" name="password"/>
             							
							<button type="submit" name="register" class="btn btn-default">Signup</button>
                </form>

					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->


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
								<a ng-click="log('loginpage','redirected to smart drones','null')" href="#">
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
