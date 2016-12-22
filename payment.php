<?php

include 'php/dbconnect.php';
session_start();

if($_GET['cardNumber']!=null && $_GET['expiryMonth']!=null && $_GET['expiryYear']!=null && $_GET['cvv']!=null && $_GET['billingFirstName']!=null)
{


    $cardNumber = $_GET["cardNumber"];
   
    $expiryMonth = $_GET['expiryMonth'];
   
    $expiryYear = $_GET['expiryYear'];
   
    $cvv = $_GET['cvv'];
   
    $billingFirstName = $_GET['billingFirstName'];
   
    $email=$_SESSION['email'];
    


    $sql = "INSERT INTO orderhistory (email,cardNumber,expiryMonth,expiryYear,cvv,billingFirstName) VALUES('$email','$cardNumber', '$expiryMonth', '$expiryYear', '$cvv','$billingFirstName')";

    #$retval = mysql_query( $sql, $conn );
    $retval = $conn->query($sql);
    #if(! $retval )
    #  {
    #    die('Could not enter data: ' . $mysqli->connect_error);
    #  }
   
    #mysql_close($conn);
    $conn->close();
     unset($_SESSION['shopping_cart']);
     ?>
     <script>
     window.location.href='paymentsuccess.php';
     </script>
     <?php
}

else{
    echo "unable to place order";
    #mysql_close($conn);
    $conn->close();
}

?>




