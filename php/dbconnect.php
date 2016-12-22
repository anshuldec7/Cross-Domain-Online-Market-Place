<?php


 define('DBHOST', 'raspberry.ci2gh79a5gmr.us-west-2.rds.amazonaws.com');
 define('DBUSER', 'pi');
 define('DBPASS', 'raspberry');
 define('DBNAME', '272Project');

 $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

 if ( !$conn ) {
  die("Connection failed : " . mysql_error());
 }
 ?>


