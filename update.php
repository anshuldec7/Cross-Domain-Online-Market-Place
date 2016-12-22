<?php
include 'php/dbconnect.php';
$pass = $_POST['password'];
$add = $_POST['address'];
$mail = $_POST['email'];
$card = $_POST['card'];
$sql = "UPDATE 272Project.userdetails SET address='$add', password='$pass', card='$card' WHERE email='$mail'";
$retval = $conn->query($sql);
//echo $retval;
//echo "Details successfully updated";
$conn->close();
// header("Location:account.php");
 ?>
  	<script type="text/javascript">
  	
window.location.href = 'account.php';
</script>