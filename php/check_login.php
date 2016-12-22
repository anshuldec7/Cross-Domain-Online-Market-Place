<?php
session_start();
include 'dbconnect.php';
//include 'filename';

#echo "$_POST[email]";
#echo "$_POST[password]";
$emailer = " ";
$passworder = " ";
if($_POST['email']!=null && $_POST['password']!=null)
  {
    $emailer = $_POST['email'];
    $passworder = $_POST['password'];
  //  echo "email from user".$emailer;
   // echo "password from user".$passworder;
    $sql = "SELECT password, userid, name from 272Project.userdetails WHERE email = '$emailer' ";
    #echo $sql;
    $retval = $conn->query($sql);
          if ($retval->num_rows > 0) {
          if($row = $retval->fetch_assoc())
          {
            $pass = $row['password'];
            if(strcmp($passworder, $pass) == 0)
              {
                  $uid = $row['userid'];
                  $customer = $row['name'];
                  //echo $customer;
                  $_SESSION['email'] = $emailer;
                  $_SESSION['name'] = $customer;
                  $_SESSION['userid'] = $uid;
                  //echo "Session userId =".$_SESSION['userid'];
                //  header("Location:http://localhost/Eshopper/index.php");
               
              }else{
              	?>
              	      		<script type="text/javascript">
              	window.location.href = '../login.php';
              	</script>
              	      	<?php
        }
        }
      }else{
      	?>
      		<script type="text/javascript">
window.location.href = '../login.php';
</script>
      	<?php
      }

    #mysql_close($conn);
    $conn->close();
  ?>
<script type="text/javascript">
window.location.href = '../index.php';
</script>
  <?php 
  }else{
  	?>
  	<script type="text/javascript">
window.location.href = '../login.php';
</script>
  	
  	<?php
  }
?>
