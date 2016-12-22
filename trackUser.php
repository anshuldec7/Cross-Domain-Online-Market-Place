<?php

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$conn = mysqli_connect("raspberry.ci2gh79a5gmr.us-west-2.rds.amazonaws.com", "pi", "raspberry", "272Project");

$sql="select * from userlogs where user_id='".$request->name."';";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result1 = mysqli_query($conn, $sql);

$res=array();
if (!$result1 || mysqli_num_rows($result1) > 0)
{
    while($row1 = mysqli_fetch_array($result1)){
        array_push($res,$row1);
    }

    print_r(json_encode($res));
}

else
    print_r($result1);

$conn->close();

?>