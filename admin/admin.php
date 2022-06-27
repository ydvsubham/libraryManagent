<?php
  session_start();
  if(isset($_SESSION['u_id'])){
    if($_SESSION['u_id']=='admin'){
        $temp=0;
    }else{
      echo "<script>window.location.href='../index.php?sign_in=invalid';</script>";
      exit();
    } 
  }else {
   echo "<script>window.location.href='../index.php?sign_in=invalid';</script>";
      exit();
  }
?>



<?php
  include_once('includes/connection.php');
  $sql_mbr="SELECT id FROM sign_up;";
  $result_mbr=mysqli_query($conection,$sql_mbr);
  $total_mbr=mysqli_num_rows($result_mbr);

  $sql_mbr="SELECT id FROM sign_up WHERE status=0;";
  $result_mbr=mysqli_query($conection,$sql_mbr);
  $total_blocked_mbr=mysqli_num_rows($result_mbr);

  $sql_bk="SELECT id FROM books;";
  $result_bk=mysqli_query($conection,$sql_bk);
  $total_bk=mysqli_num_rows($result_bk);

  $sql_bk="SELECT id FROM book_map;";
  $result_bk=mysqli_query($conection,$sql_bk);
  $total_distinct_bk=mysqli_num_rows($result_bk);

  $sql_bk="SELECT id FROM dashboard WHERE reg_date IS NOT null;";
  $result_bk=mysqli_query($conection,$sql_bk);
  $total_issued_bk=mysqli_num_rows($result_bk);

  $sql_ds="SELECT id FROM dashboard WHERE return_status=0;";
  $result_ds=mysqli_query($conection,$sql_ds);
  $total_issue_pending_bk=mysqli_num_rows($result_ds);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dev liberary</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" style=""  href="img/head_icon.png" sizes="16x16"/>
  <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css\style.css">

</head>
<body>
 <div class="welcome_cont">
  <?php
    include_once('includes/header.php');
  ?>        
  <div class="desboard_child">
    <div class="desboard_cont">
      <h3 class="desboard_head">Admin Dashboard</h3>
      <div class="cont_main3">
        <div class="des Books">
          <div class="detail">
            <div>
              <h3><?php echo htmlentities($total_bk);?></h3>
              <p>Distinct Books</p>
            </div>
            <i class="fa fa-book"></i>
          </div>
          <div class="more_info"><a href="manage_books.php">More Information</a></div>
        </div>
        <div class="des Books">
          <div class="detail">
            <div>
              <h3><?php echo htmlentities($total_distinct_bk);?></h3>
              <p>Total Books</p>
            </div>
            <i class="fa fa-book"></i>
          </div>
          <div class="more_info"><a href="manage_books.php">More Information</a></div>
        </div>
        <div class="des Member">
          <div class="detail">
            <div>
              <h3><?php echo htmlentities($total_issued_bk);?></h3>
              <p>Issued Book</p>
            </div>
            <i class="fa fa-mail-forward"></i>
          </div>
          <div class="more_info"><a href="manage_books.php">More Information</a></div>
        </div>
        <div class="des Member">
          <div class="detail">
            <div>
              <h3><?php echo htmlentities($total_issue_pending_bk);?></h3>
              <p>UnReturned Book</p>
            </div>
            <i class="fa fa-mail-forward"></i>
          </div>
          <div class="more_info"><a href="manage_books.php">More Information</a></div>
        </div>
        <div class="des Issued">
          <div class="detail">
            <div>
              <h3><?php echo htmlentities($total_mbr);?></h3>
              <p>Total Members</p>
            </div>
            <i class="fa fa-user"></i>
          </div>
          <div class="more_info"><a href="member.php">More Information</a></div>
        </div>
        <div class="des Issued">
          <div class="detail">
            <div>
              <h3><?php echo htmlentities($total_blocked_mbr);?></h3>
              <p>Blocked User</p>
            </div>
            <i class="fa fa-user"></i>
          </div>
          <div class="more_info"><a href="member.php">More Information</a></div>
        </div>
    </div>
  </div>
  </div>

  <?php include_once('includes/footer.php'); ?>
<script src="js/java.js"></script>

</body>
</html>