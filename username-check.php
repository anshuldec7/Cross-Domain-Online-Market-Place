<?php
  
  $host="raspberry.ci2gh79a5gmr.us-west-2.rds.amazonaws.com";
  $user="pi";
  $pass="raspberry";
  $dbname="272Project";
  
  $dbcon = new PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);
  
  if($_POST) 
  {
      $name = strip_tags($_POST['email']);
      
      
	  $stmt=$dbcon->prepare("SELECT email FROM userdetails WHERE email=:name");
	  $stmt->execute(array(':name'=>$name));
	  $count=$stmt->rowCount();
	  	  
	  if($count>0)
	  {    
          echo "no";
		  //echo "<span style='color:brown;'><h4>Sorry username already taken !!!</h4></span>";
	  }
	  else
	  {   echo "yes";
		  //echo "<span style='color:green; '><h4>Username Available</h4></span>";
	  }
  }
?>