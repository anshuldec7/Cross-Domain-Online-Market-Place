<?php
include 'dbconnect.php';

if($_POST['name']!=null && $_POST['email']!=null && $_POST['password']!=null)
  {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "INSERT INTO userdetails(name,email,password) VALUES('$name', '$email', '$password')";

    #$retval = mysql_query( $sql, $conn );
    $retval = $conn->query($sql);
    $conn->close();
    #if(! $retval )
    #  {
    #    die('Could not enter data: ' . $mysqli->connect_error);
    #  }
    $body="Hello ".$name." Welcome to Eshopper Market Place. Click link to visit website http://buysmartdrone.com/marketplace";
    $body=(String)$body;
    $email = $_POST['email'];
    
    mail($email, "eshoppermarketplace Welcome",$body, "From: info@buysmartdrone.com");
  // header("Location:../signupdone.html");
   ?>
   <script type="text/javascript">
    window.location.href = '../signupdone.html';
   </script>
     <?php 
   
   #mysql_close($conn);
 
 }

else{
  //echo "unable to enter data";
  #mysql_close($conn);
 // $conn->close();
}
?>
