<?php
if(isset($_POST['submit'])){
session_start();
session_unset();
session_destroy();
echo "<script>window.location.href='../index.php?sign_in=logout';</script>";
exit();

}
?>
