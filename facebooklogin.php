<?
session_start();
session_unset();
session_destroy();
session_start();

                  $_SESSION['email'] = $_GET['email'];
                  $_SESSION['name'] = $_GET['name'];
                     $_SESSION['facebook'] = $_GET['name'];

header("location:index.php");
exit();
?>
