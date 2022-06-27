<?php
  session_start();
  include_once('includes/connection.php');
  if(isset($_SESSION['u_id'])){
    if($_SESSION['u_id']=='admin'){
       $u_password=$_SESSION['u_password'];
    }else{
      echo "<script>window.location.href='../index.php?sign_in=invalid';</script>";
      exit();
      
    } 
  }else {
   echo "<script>window.location.href='../index.php?sign_in=invalid';</script>";
      exit();
  }
?>


<!DOCTYPE html>
<html>
<head>
  <title>Dev liberary</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" style=""  href="img/head_icon.png" sizes="16x16"/>
  <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css\style.css">
  <link rel="stylesheet" type="text/css" href="css\hover.css">
    <link rel="stylesheet" type="text/css" href="css\add_book.css">
    <link rel="stylesheet" type="text/css" href="css\footer.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
<div class="welcome_cont">
  <?php
    include_once('includes/header.php');
  ?>        
    <div class="member_cont">
      <div class="member_head">
        <h3>Add Books</h3>
      </div>
      <div class="add_books_cont">
          <div class="add_books_head"><h3>Book Info</h3></div>
          <div class="add_books_info">
            <form action="?" method="post">
              <label for="c_Password">Current Password:</label>
              <input type="password" name="c_Password" id="c_Password" required="">
              <label for="n_Password">New Password:</label>
              <input type="password" name="n_Password" id="n_Password" required="">
              <label for="cn_Password">New Password:</label>
              <input type="password" name="cn_Password" id="cn_Password" required="">
              <input type="submit" name="submit" value="Change Password">
            </form>

            <?php 

              if(isset($_POST['submit'])){
                $c_Password=mysqli_real_escape_string($conection,$_POST['c_Password']);
                $n_Password=mysqli_real_escape_string($conection,$_POST['n_Password']);

                if(empty($_POST['c_Password'])|| empty($_POST['n_Password'])  || empty($_POST['cn_Password'])){
                  echo "<script>alert('Empty Input!!');</script>";
                  echo "<script>window.location.href='change_password.php?sign_in=Invalid_pwd';</script>";
                  exit();
                  
                }else{
                  $hased_pwd=password_verify($c_Password, $_SESSION['u_password']);
                  if($hased_pwd==true){
                    $hased_password=password_hash($n_Password, PASSWORD_DEFAULT);

                    $sql="UPDATE sign_up
                      SET pwd=? WHERE user_id=?;";

                    $stmt=mysqli_prepare($conection,$sql);

                    if($stmt){

                      mysqli_stmt_bind_param($stmt,'ss',$hased_password,$_SESSION['u_id']);
                      mysqli_stmt_execute($stmt);
                      mysqli_stmt_close($stmt);
                      echo "<script>alert('UPDATE SucessFull !!');</script>";
                  echo "<script>window.location.href='change_password.php?update=sucess';</script>";
                  exit();

                    }else{
                      echo "<script>alert('UPDATE Failed !!');</script>";
                  echo "<script>window.location.href='change_password.php?update=Error';</script>";
                  exit();
                      
                    }
                  }else{
                     echo "<script>alert('UPDATE Failed !!');</script>";
                  echo "<script>window.location.href='change_password.php?update=Error';</script>";
                   exit();
                  }
                }

                }
            ?>

          </div>
      </div>      
  <?php include_once('includes/footer.php'); ?>

<script src="js/java.js"></script>
</body>
</html>