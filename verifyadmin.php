<?php
/**
 * Created by IntelliJ IDEA.
 * User: Vivek Agarwal
 * Date: 12/10/2016
 * Time: 10:22 AM
 */

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

if($request->username=="admin" && $request->password=="admin"){
    $success=true;
    print_r($success);
}

else{
    echo "Login failed!";
}

?>