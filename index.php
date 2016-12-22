<!-- Added by Anshul-->
<?php   
 session_start(); 

 include 'php/dbconnect.php';
 

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
                echo '<script>window.location="index.php"</script>';  
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
                     echo '<script>window.location="index.php"</script>';  
                }  
           }  
      }  
 }  
 ?>  
<!-- Added by Anshul End-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Market-Place</title>
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
								<li><a href="account.php"><i class="fa fa-user"></i> Welcome! <?php echo $_SESSION['name'];?></a></li>	
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
                                        <li><a ng-click="log('homepage','clicked on all products','null')"  href="shop.php">Products</a></li>
										<li><a ng-click="log('homepage','clicked on checkout','null')" href="checkout.php">Checkout</a></li>
										<li><a  ng-click="log('homepage','clicked on shopping cart','null')" href="cart.php">Cart</a></li>
										<?php if(isset($_SESSION['name']) ){
                                	?>
                                <li><a ng-click="log('homepage','clicked on logout','null');" href="logout.php"><i class="fa fa-lock"></i>Logout</a></li>
                           <?php }else { ?>
                           <li><a ng-click="log('homepage','clicked on login','null');" href="login.php"><i class="fa fa-lock"></i>Login</a></li>
                           <?php } ?>
                                    </ul>
                                </li> 
							    	<li class="dropdown"><a href="#">View Partner Sites<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a ng-click="log('homepage','checked out buysmartdrone.com','null')" href="http://www.buysmartdrone.com">Smart Drones</a></li>
										<li><a ng-click="log('homepage','checked out wesalethecars.com','null')" href="http://www.wesalethecars.com">We Sale the Cars</a></li>
										<li><a ng-click="log('homepage','checked out fiestyfox.com','null')" href="http://www.fiestyfox.com/">Code King</a></li>
										<li><a ng-click="log('homepage','checked out sparkxinc.com','null')" href="http://www.sparkxinc.com/">Spark X Inc.</a></li>
                                        <li> <a ng-click="log('homepage','checked out workplaypractice.com','null')" href="http://www.workplaypractice.com/">Rent It</a></li>
                                    </ul>
                                </li> 
								<li><a  ng-click="log('homepage','checked out contact page','null')"  href="contact-us.php">Contact</a></li>
							</ul>
						</div>
					</div>
			
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>Buy</span>-SMART</h1>
									<h2>One Place Shop for Everything</h2>
									<p>You can buy stuffs from Drones to Complex Architectural Designs, We have partnered with Smart Drones, We Sale the Cars, Code Kings, Spark X Inc. & Rent it </p>
									<button type="button" ng-click="log('homepage','viewed all products','null')" onclick="window.location.href='shop.php'" class="btn btn-default get">View All Products</button>
								</div>
								<div class="col-sm-6">
									<img src="images/DJI4.png" class="girl img-responsive" alt="" />
											<a href="#products"><img src="images/tag.png"  class="pricing" alt="" /></a>
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Buy</span>-SMART</h1>
									<h2>One Place Shop for Everything</h2>
									<p>You can buy stuffs from Drones to Complex Architectural Designs, We have partnered with Smart Drones, We Sale the Cars, Code Kings, Spark X Inc. & Rent it </p>
									<button type="button" ng-click="log('homepage','viewed all products','null')" onclick="window.location.href='shop.php'" class="btn btn-default get">View All Products</button>
								</div>
								<div class="col-sm-6">
									<img src="images/Car_home.png" class="girl img-responsive" alt="" />
						
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Buy</span>-SMART</h1>
									<h2>One Place Shop for Everything</h2>
									<p>You can buy stuffs from Drones to Complex Architectural Designs, We have partnered with Smart Drones, We Sale the Cars, Code Kings, Spark X Inc. & Rent it </p>
			<button type="button" ng-click="log('homepage','viewed all products','null')" onclick="window.location.href='shop.php'" class="btn btn-default get">View All Products</button>
								</div>
								<div class="col-sm-6">
									<img src="images/parrot.png" class="girl img-responsive" alt="" />
								<!--<img src="images/home/price.png"  class="pricing" alt="" />-->
								</div>
							</div>

							<div class="item">
								<div class="col-sm-6">
									<h1><span>Buy</span>-SMART</h1>
									<h2>One Place Shop for Everything</h2>
									<p>You can buy stuffs from Drones to Complex Architectural Designs, We have partnered with Smart Drones, We Sale the Cars, Code Kings, Spark X Inc. & Rent it </p>
									<button type="button" ng-click="log('homepage','viewed all products','null')" onclick="window.location.href='shop.php'" class="btn btn-default get">View All Products</button>
								</div>
								<div class="col-sm-6">
									<img src="images/parrot.png" class="girl img-responsive" alt="" />
									<!--<img src="images/home/price.png"  class="pricing" alt="" />-->
								</div>
							</div>

						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
					        
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#drones">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Drones
										</a>
									</h4>
								</div>
								<div id="drones" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="shop.php#smartdroneproducts" ng-click="log('homepage','viewed products from buysmartdrone.com','null')" class="scroll-link">Smart Drones</a></li>
										
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#cars">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Cars
										</a>
									</h4>
								</div>
								<div id="cars" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="shop.php#carsproducts" ng-click="log('homepage','viewed products from wesalethecars.com','null')" class="scroll-link">We Sale the Cars</a></li>
										</ul>
									</div>
								</div>
							</div>
									<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#automation">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Automation
										</a>
									</h4>
								</div>
								<div id="automation" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="shop.php#codekingproducts" ng-click="log('homepage','viewed products from fiestyfox.com','null')" class="scroll-link">Code King</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#Construction">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Real Estate
										</a>
									</h4>
								</div>
								<div id="Construction" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="shop.php#sparkxproducts" ng-click="log('homepage','viewed products from sparkxinc.com','null')" class="scroll-link">Spark X</a></li>
										
										</ul>
									</div>
								</div>
							</div>
					        	<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#rental">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											House Rental
										</a>
									</h4>
								</div>
								<div id="rental" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="shop.php#rentitproducts" ng-click="log('homepage','viewed products from workplaypractice.com','null')" class="scroll-link">Rent it</a></li>
										
										</ul>
									</div>
								</div>
							</div>
							
						</div><!--/category-products-->
					
						
						
						
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/keep-calm.png" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				<div class="col-sm-9 padding-right">
									<div class="features_items"><!--Top 5 Products_items-->
						<h2 class="title text-center">TOP FIVE PRODUCTS</h2>
						
						<?php  
                $query = "select p.*,(SELECT avg(rating_star) FROM 272Project.review r where r.product_id=p.product_id) as review_star from 272Project.product_details p order by review_star desc limit 5";  
                $result = mysqli_query($conn, $query);  
                if(!$result || mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?> 
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div id="products" class="productinfo text-center">
											<img src="images/product-details/<?php echo $row["image"]; ?>" alt="" />
											<h2>$<?php echo $row["price"]; ?></h2>
											<p><?php echo $row["name"]; ?></p>
											<form method="POST">
											<a href="./product-details.php?price=<?php echo urlencode($row['price']); ?>&name=<?php echo urlencode($row['name']); ?>&image=<?php echo urlencode($row['image']); ?>&id=<?php echo urlencode($row['product_id']); ?>&description=<?php echo urlencode($row['description']); ?>&website_id=<?php echo urlencode($row['website_Id']); ?>&website_name=<?php echo urlencode($row['website_name']); ?>&type=<?php echo urlencode($row['type']); ?>&status=<?php echo urlencode($row['status']); ?>&quantity=<?php echo urlencode($row['quantity']); ?>&product_condition=<?php echo urlencode($row['product_condition']); ?>&brand=<?php echo urlencode($row['brand']); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Product Details</a>
											</form>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>$<?php echo $row["price"]; ?></h2>
												<p><?php echo $row["name"]; ?></p>
												<a ng-click="log('homepage','checkout products from the Top 5 Prodcuts in the buysmartdrone.com','null');"  href="./product-details.php?price=<?php echo urlencode($row['price']); ?>&name=<?php echo urlencode($row['name']); ?>&image=<?php echo urlencode($row['image']); ?>&id=<?php echo urlencode($row['product_id']); ?>&description=<?php echo urlencode($row['description']); ?>&website_id=<?php echo urlencode($row['website_Id']); ?>&website_name=<?php echo urlencode($row['website_name']); ?>&type=<?php echo urlencode($row['type']); ?>&status=<?php echo urlencode($row['status']); ?>&quantity=<?php echo urlencode($row['quantity']); ?>&product_condition=<?php echo urlencode($row['product_condition']); ?>&brand=<?php echo urlencode($row['brand']); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Product Details</a>
												
											</div>
										</div>
										<?php if($row["status"] == "new") {?>
												<img src="images/home/new_arrival.png" class="new" alt="" />
												<?php }
                                                else if($row["status"] == "sale") {?>
                                                <img src="images/home/sale.png" class="new" alt="" />
                                                <?php 
                                                }
                                                ?>
								</div>
							
							</div>
						</div>
						
						 <?php  
                     }  
                } 
                        
                ?>  
						
					</div><!--END OF Top 5 Product_items-->
					
					
				
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
						
						<h2 class="title text-center"> INDIVIDUAL TOP FIVE</h2>
               
               <!--Start INDIVIDUAL TOP Smart Drone Products_items-->
                <ul class="nav nav-tabs">
					<h4 style="color:gray" class="text-center"> SMART DRONES TOP 5</h4>
					 </ul>
                        <div class="features_items">
						
						
						<?php  
                $query = "Select p.*,(SELECT avg(rating_star) FROM 272Project.review r where r.product_id=p.product_id ) as review_star from 272Project.product_details p where p.website_Id='2' order by review_star desc limit 5";  
                $result = mysqli_query($conn, $query);  
                if(!$result || mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?> 
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div id="products" class="productinfo text-center">
											<img src="images/product-details/<?php echo $row["image"]; ?>" alt="" />
											<h2>$<?php echo $row["price"]; ?></h2>
											<p><?php echo $row["name"]; ?></p>
											<form method="POST">
												<a href="./product-details.php?price=<?php echo urlencode($row['price']); ?>&name=<?php echo urlencode($row['name']); ?>&image=<?php echo urlencode($row['image']); ?>&id=<?php echo urlencode($row['product_id']); ?>&description=<?php echo urlencode($row['description']); ?>&website_id=<?php echo urlencode($row['website_Id']); ?>&website_name=<?php echo urlencode($row['website_name']); ?>&type=<?php echo urlencode($row['type']); ?>&status=<?php echo urlencode($row['status']); ?>&quantity=<?php echo urlencode($row['quantity']); ?>&product_condition=<?php echo urlencode($row['product_condition']); ?>&brand=<?php echo urlencode($row['brand']); ?>" ng-click="log('homepage','checkout products from the Top 5 Prodcuts in the buysmartdrone.com','null')" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Product Details</a>
											</form>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>$<?php echo $row["price"]; ?></h2>
												<p><?php echo $row["name"]; ?></p>
												<a ng-click="log('homepage','checkout products from the Top 5 Prodcuts in the buysmartdrone.com','null');"  href="./product-details.php?price=<?php echo urlencode($row['price']); ?>&name=<?php echo urlencode($row['name']); ?>&image=<?php echo urlencode($row['image']); ?>&id=<?php echo urlencode($row['product_id']); ?>&description=<?php echo urlencode($row['description']); ?>&website_id=<?php echo urlencode($row['website_Id']); ?>&website_name=<?php echo urlencode($row['website_name']); ?>&type=<?php echo urlencode($row['type']); ?>&status=<?php echo urlencode($row['status']); ?>&quantity=<?php echo urlencode($row['quantity']); ?>&product_condition=<?php echo urlencode($row['product_condition']); ?>&brand=<?php echo urlencode($row['brand']); ?>" ng-click="log('homepage','checkout products from the Top 5 Prodcuts in the buysmartdrone.com','null')" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Product Details</a>
												
											</div>
										</div>
										<?php if($row["status"] == "new") {?>
												<img src="images/home/new_arrival.png" class="new" alt="" />
												<?php }
                                                else if($row["status"] == "sale") {?>
                                                <img src="images/home/sale.png" class="new" alt="" />
                                                <?php 
                                                }
                                                ?>
								</div>
							
							</div>
						</div>
						
						 <?php  
                     }  
                } 
                        
                ?>  
						
					</div>  
                          
                <!--END INDIVIDUAL TOP Smart Drone Products_items-->  
                           
						
							<!--Start INDIVIDUAL TOP Car Products_items-->
                <ul class="nav nav-tabs">
					<h4 style="color:gray" class="text-center"> WE SALE THE CARS TOP 5</h4>
					 </ul>
                        <div class="features_items">
						
						
						<?php  
                $query = "Select p.*,(SELECT avg(rating_star) FROM 272Project.review r where r.product_id=p.product_id ) as review_star from 272Project.product_details p where p.website_Id='1' order by review_star desc limit 5";  
                $result = mysqli_query($conn, $query);  
                if(!$result || mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?> 
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div id="products" class="productinfo text-center">
											<img src="images/product-details/<?php echo $row["image"]; ?>" alt="" />
											<h2>$<?php echo $row["price"]; ?></h2>
											<p><?php echo $row["name"]; ?></p>
											<form method="POST">
												<a href="./product-details.php?price=<?php echo urlencode($row['price']); ?>&name=<?php echo urlencode($row['name']); ?>&image=<?php echo urlencode($row['image']); ?>&id=<?php echo urlencode($row['product_id']); ?>&description=<?php echo urlencode($row['description']); ?>&website_id=<?php echo urlencode($row['website_Id']); ?>&website_name=<?php echo urlencode($row['website_name']); ?>&type=<?php echo urlencode($row['type']); ?>&status=<?php echo urlencode($row['status']); ?>&quantity=<?php echo urlencode($row['quantity']); ?>&product_condition=<?php echo urlencode($row['product_condition']); ?>&brand=<?php echo urlencode($row['brand']); ?>" ng-click="log('homepage','checkout products from the Top 5 Prodcuts in the buysmartdrone.com','null')" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Product Details</a>
											</form>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>$<?php echo $row["price"]; ?></h2>
												<p><?php echo $row["name"]; ?></p>
												<a href="./product-details.php?price=<?php echo urlencode($row['price']); ?>&name=<?php echo urlencode($row['name']); ?>&image=<?php echo urlencode($row['image']); ?>&id=<?php echo urlencode($row['product_id']); ?>&description=<?php echo urlencode($row['description']); ?>&website_id=<?php echo urlencode($row['website_Id']); ?>&website_name=<?php echo urlencode($row['website_name']); ?>&type=<?php echo urlencode($row['type']); ?>&status=<?php echo urlencode($row['status']); ?>&quantity=<?php echo urlencode($row['quantity']); ?>&product_condition=<?php echo urlencode($row['product_condition']); ?>&brand=<?php echo urlencode($row['brand']); ?>" ng-click="log('homepage','checkout products from the Top 5 Prodcuts in the wesalethecars.com','null')" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Product Details</a>
												
											</div>
										</div>
										<?php if($row["status"] == "new") {?>
												<img src="images/home/new_arrival.png" class="new" alt="" />
												<?php }
                                                else if($row["status"] == "sale") {?>
                                                <img src="images/home/sale.png" class="new" alt="" />
                                                <?php 
                                                }
                                                ?>
								</div>
							
							</div>
						</div>
						
						 <?php  
                     }  
                } 
                        
                ?>  
						
					</div>  
                          
                <!--END INDIVIDUAL TOP Car Products_items-->  
                
                
                	<!--Start INDIVIDUAL TOP Code King Products_items-->
                <ul class="nav nav-tabs">
					<h4 style="color:gray" class="text-center">CODE KING TOP 5</h4>
					 </ul>
                        <div class="features_items">
						
						
						<?php  
                $query = "Select p.*,(SELECT avg(rating_star) FROM 272Project.review r where r.product_id=p.product_id ) as review_star from 272Project.product_details p where p.website_Id='4' order by review_star desc limit 5";  
                $result = mysqli_query($conn, $query);  
                if(!$result || mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?> 
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div id="products" class="productinfo text-center">
											<img src="images/product-details/<?php echo $row["image"]; ?>" alt="" />
											<h2>$<?php echo $row["price"]; ?></h2>
											<p><?php echo $row["name"]; ?></p>
											<form method="POST">
													<a href="./product-details.php?price=<?php echo urlencode($row['price']); ?>&name=<?php echo urlencode($row['name']); ?>&image=<?php echo urlencode($row['image']); ?>&id=<?php echo urlencode($row['product_id']); ?>&description=<?php echo urlencode($row['description']); ?>&website_id=<?php echo urlencode($row['website_Id']); ?>&website_name=<?php echo urlencode($row['website_name']); ?>&type=<?php echo urlencode($row['type']); ?>&status=<?php echo urlencode($row['status']); ?>&quantity=<?php echo urlencode($row['quantity']); ?>&product_condition=<?php echo urlencode($row['product_condition']); ?>&brand=<?php echo urlencode($row['brand']); ?>" ng-click="log('homepage','checkout products from the Top 5 Prodcuts in the buysmartdrone.com','null')" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Product Details</a>
											</form>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>$<?php echo $row["price"]; ?></h2>
												<p><?php echo $row["name"]; ?></p>
												<a ng-click="log('homepage','checkout products from the Top 5 Prodcuts in the codekings.com','null');"  href="./product-details.php?price=<?php echo urlencode($row['price']); ?>&name=<?php echo urlencode($row['name']); ?>&image=<?php echo urlencode($row['image']); ?>&id=<?php echo urlencode($row['product_id']); ?>&description=<?php echo urlencode($row['description']); ?>&website_id=<?php echo urlencode($row['website_Id']); ?>&website_name=<?php echo urlencode($row['website_name']); ?>&type=<?php echo urlencode($row['type']); ?>&status=<?php echo urlencode($row['status']); ?>&quantity=<?php echo urlencode($row['quantity']); ?>&product_condition=<?php echo urlencode($row['product_condition']); ?>&brand=<?php echo urlencode($row['brand']); ?>" ng-click="log('homepage','checkout products from the Top 5 Prodcuts in the fiestyfox.com','null')" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Product Details</a>
												
											</div>
										</div>
										<?php if($row["status"] == "new") {?>
												<img src="images/home/new_arrival.png" class="new" alt="" />
												<?php }
                                                else if($row["status"] == "sale") {?>
                                                <img src="images/home/sale.png" class="new" alt="" />
                                                <?php 
                                                }
                                                ?>
								</div>
							
							</div>
						</div>
						
						 <?php  
                     }  
                } 
                        
                ?>  
						
					</div>  
                          
                <!--END INDIVIDUAL TOP Code King Products_items-->
						
									<!--Start INDIVIDUAL TOP Spark X Products_items-->
                <ul class="nav nav-tabs">
					<h4 style="color:gray" class="text-center">SPARK X TOP 5</h4>
					 </ul>
                        <div class="features_items">
						
						
						<?php  
                $query = "Select p.*,(SELECT avg(rating_star) FROM 272Project.review r where r.product_id=p.product_id ) as review_star from 272Project.product_details p where p.website_Id='3' order by review_star desc limit 5";  
                $result = mysqli_query($conn, $query);  
                if(!$result || mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?> 
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div id="products" class="productinfo text-center">
											<img src="images/product-details/<?php echo $row["image"]; ?>" alt="" />
											<h2>$<?php echo $row["price"]; ?></h2>
											<p><?php echo $row["name"]; ?></p>
											<form method="POST">
												<a href="./product-details.php?price=<?php echo urlencode($row['price']); ?>&name=<?php echo urlencode($row['name']); ?>&image=<?php echo urlencode($row['image']); ?>&id=<?php echo urlencode($row['product_id']); ?>&description=<?php echo urlencode($row['description']); ?>&website_id=<?php echo urlencode($row['website_Id']); ?>&website_name=<?php echo urlencode($row['website_name']); ?>&type=<?php echo urlencode($row['type']); ?>&status=<?php echo urlencode($row['status']); ?>&quantity=<?php echo urlencode($row['quantity']); ?>&product_condition=<?php echo urlencode($row['product_condition']); ?>&brand=<?php echo urlencode($row['brand']); ?>" ng-click="log('homepage','checkout products from the Top 5 Prodcuts in the buysmartdrone.com','null')" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Product Details</a>
											</form>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>$<?php echo $row["price"]; ?></h2>
												<p><?php echo $row["name"]; ?></p>
												<a ng-click="log('homepage','checkout products from the Top 5 Prodcuts in the sparksx.com','null');"  href="./product-details.php?price=<?php echo urlencode($row['price']); ?>&name=<?php echo urlencode($row['name']); ?>&image=<?php echo urlencode($row['image']); ?>&id=<?php echo urlencode($row['product_id']); ?>&description=<?php echo urlencode($row['description']); ?>&website_id=<?php echo urlencode($row['website_Id']); ?>&website_name=<?php echo urlencode($row['website_name']); ?>&type=<?php echo urlencode($row['type']); ?>&status=<?php echo urlencode($row['status']); ?>&quantity=<?php echo urlencode($row['quantity']); ?>&product_condition=<?php echo urlencode($row['product_condition']); ?>&brand=<?php echo urlencode($row['brand']); ?>" ng-click="log('homepage','checkout products from the Top 5 Prodcuts in the sparkxinc.com','null')" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Product Details</a>
												
											</div>
										</div>
										<?php if($row["status"] == "new") {?>
												<img src="images/home/new_arrival.png" class="new" alt="" />
												<?php }
                                                else if($row["status"] == "sale") {?>
                                                <img src="images/home/sale.png" class="new" alt="" />
                                                <?php 
                                                }
                                                ?>
								</div>
							
							</div>
						</div>
						
						 <?php  
                     }  
                } 
                        
                ?>  
						
					</div>  
                          
                <!--END INDIVIDUAL TOP Spark X Products_items-->
                
                
                <!--Start INDIVIDUAL TOP Rent it Products_items-->
                <ul class="nav nav-tabs">
					<h4 style="color:gray" class="text-center">RENT IT TOP 5</h4>
					 </ul>
                        <div class="features_items">
						
						
						<?php  
                $query = "Select p.*,(SELECT avg(rating_star) FROM 272Project.review r where r.product_id=p.product_id ) as review_star from 272Project.product_details p where p.website_Id='5' order by review_star desc limit 5";  
                $result = mysqli_query($conn, $query);  
                if(!$result || mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?> 
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div id="products" class="productinfo text-center">
											<img src="images/product-details/<?php echo $row["image"]; ?>" alt="" />
											<h2>$<?php echo $row["price"]; ?></h2>
											<p><?php echo $row["name"]; ?></p>
											<form method="POST">
												<a href="./product-details.php?price=<?php echo urlencode($row['price']); ?>&name=<?php echo urlencode($row['name']); ?>&image=<?php echo urlencode($row['image']); ?>&id=<?php echo urlencode($row['product_id']); ?>&description=<?php echo urlencode($row['description']); ?>&website_id=<?php echo urlencode($row['website_Id']); ?>&website_name=<?php echo urlencode($row['website_name']); ?>&type=<?php echo urlencode($row['type']); ?>&status=<?php echo urlencode($row['status']); ?>&quantity=<?php echo urlencode($row['quantity']); ?>&product_condition=<?php echo urlencode($row['product_condition']); ?>&brand=<?php echo urlencode($row['brand']); ?>" ng-click="log('homepage','checkout products from the Top 5 Prodcuts in the buysmartdrone.com','null')" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Product Details</a>
											</form>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>$<?php echo $row["price"]; ?></h2>
												<p><?php echo $row["name"]; ?></p>
												<a ng-click="log('homepage','checkout products from the Top 5 Prodcuts in the rentit.com','null');"  href="./product-details.php?price=<?php echo urlencode($row['price']); ?>&name=<?php echo urlencode($row['name']); ?>&image=<?php echo urlencode($row['image']); ?>&id=<?php echo urlencode($row['product_id']); ?>&description=<?php echo urlencode($row['description']); ?>&website_id=<?php echo urlencode($row['website_Id']); ?>&website_name=<?php echo urlencode($row['website_name']); ?>&type=<?php echo urlencode($row['type']); ?>&status=<?php echo urlencode($row['status']); ?>&quantity=<?php echo urlencode($row['quantity']); ?>&product_condition=<?php echo urlencode($row['product_condition']); ?>&brand=<?php echo urlencode($row['brand']); ?>" ng-click="log('homepage','checkout products from the Top 5 Prodcuts in the workplaypractice.com','null')" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Product Details</a>
												
											</div>
										</div>
										<?php if($row["status"] == "new") {?>
												<img src="images/home/new_arrival.png" class="new" alt="" />
												<?php }
                                                else if($row["status"] == "sale") {?>
                                                <img src="images/home/sale.png" class="new" alt="" />
                                                <?php 
                                                }
                                                ?>
								</div>
							
							</div>
						</div>
						
						 <?php  
                     }  
                } 
                        
                ?>  
						
					</div>  
                          
                <!--END INDIVIDUAL TOP Rent it Products_items-->
															
						</div>
						
					</div><!--/category-tab-->
				  
					
					
					
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

   function initialize() {
    var map = new google.maps.Map(document.getElementById('map-canvas'), {
      zoom: 7,
      center: new google.maps.LatLng(36.7783, -119.4179),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;


      marker = new google.maps.Marker({
        position: new google.maps.LatLng(36.7783, -119.4179),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent("Buy Samrt");
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
    
  </script>
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
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
