<?php   
 session_start(); 
 if(!isset($_SESSION["email"]))  
 {
 	header("Location:login.php");
 	
 }else{
 	
 }
 
 $email=$_SESSION["email"]
 
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Account details</title>
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
</head><!--/head-->

<body>
		<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +1 134-567-8901</a></li>
							<li><a href="contact-us.php"><i class="fa fa-envelope"></i> eshoppermarketplace@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						
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
							<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
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

	<section id="form"><!--form-->
		<div class="container">
			<div class="row" style="margin-left:400px;">
				<div class="col-sm-8 col-off">
					<div class="signup-form"><!--sign up form-->
						<h2>Account details</h2>

            <?php
              include 'php/dbconnect.php';
              //$Username=$_SESSION['myssession'];
              $sql = "SELECT * FROM userdetails WHERE email = '".$email."'";

              $result = $conn->query($sql);
              if ($result->num_rows <= 0) {
              	$sql1 = "insert into userdetails(name,email) values('".$_SESSION['name']."', '".$_SESSION['email']."')";
              	
              	$result1 = $conn->query($sql1);
              	$result = $conn->query($sql);
              }
              
              
              if ($result->num_rows > 0) {
                if($row = $result->fetch_assoc())
                {
             ?>
 
 <form action="update.php" method="post">
							<input type="text" name="name" value="<?php echo $row ['name']; ?> " required/>
							<input type="email" name="email" value="<?php echo $row ['email']; ?> " readonly/>
							<?php if(isset($row['password']) && $row['password']!=""){
								?><input type="password" name="password" value="<?php echo $row ['password']; ?>"required/>
								<?php
							}?>
							<?php if(isset($row['card']) && $row['card']!=""){
							
								?><input type="text" name="card" value="<?php echo $row ['card']; ?>" required/>
								<?php
							}else{?>
								<input type="text" name="card" placeholder="Enter Card Details" required/>
								<?php
							}?>
							
								<?php if(isset($row['address']) && $row['address']!=""){
								?><input type="text" placeholder="Address" name="address" value="<?php echo $row ['address'];?>"required/>
								<?php
							}else{?>
							<input type="text" placeholder="Address" name="address" placeholder="Enter Address" required/>
								<?php
							}?>
							<button type="submit" class="btn btn-default">Update details</button>
						</form>
 
 
            <?php
          }}
          $conn->close();
            ?>
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
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
