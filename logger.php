<?php
/**
 * Created by IntelliJ IDEA.
 * User: Vivek Agarwal
 * Date: 12/8/2016
 * Time: 3:33 PM
 */
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

session_start();  

print_r($_SESSION['email']);


$conn = mysqli_connect("raspberry.ci2gh79a5gmr.us-west-2.rds.amazonaws.com", "pi", "raspberry", "272Project");

    $sql="Insert into userlogs(page,activity,timestamp,product_id,user_id) values ('".$request->page."','".$request->activity."','".$request->timestamp."',".$request->product_id.",'".$_SESSION['email']."');";
    print_r($sql);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();

?>