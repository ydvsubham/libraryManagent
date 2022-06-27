<?php
	session_start();
	include_once('includes/connection.php');
	if(isset($_SESSION['u_id'])){
		$user=$_SESSION['u_id'];
		$total_bk="SELECT id FROM Dashboard WHERE u_id='$user' ";
		$result_total_bk=mysqli_query($conection,$total_bk);
		$fieldcount_total_bk=mysqli_num_rows($result_total_bk);
		$return_bk="SELECT id FROM Dashboard WHERE u_id='$user' AND return_status=0";
		$result_return_bk=mysqli_query($conection,$return_bk);
		$fieldcount_return_bk=mysqli_num_rows($result_return_bk);

	}else {
			echo "<script>window.location.href='location:index.php?sign_in=invalid';</script>";
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
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/dashboard/style.css">
	<link rel="stylesheet" type="text/css" href="css/hover.css">
	<style type="text/css">
		html{
			 margin:0;
  padding:0;
  overflow-x:hidden;
		}
	</style>
</head>
<body>
	<div class="welcome_cont">
		<?php include_once('includes/header2.php'); ?>

		 <div class="desboard_cont">
	      <div class="DashBoard_head">
	        	<h3>User Dashboard</h3>
	      </div>
	      <div class="cont_main3">
	        <div class="des Books">
	          <div class="detail">
	            <div>
	              <h3><?php echo htmlentities($fieldcount_total_bk);?></h3>
	              <p>Total Issued Books</p>
	            </div>
	            <i class="fa fa-book"></i>
	          </div>
	          <div class="more_info"><a href="issued_book_info.php">More Information</a></div>
	        </div>
	        <div class="des Member">
	          <div class="detail">
	            <div>
	              <h3><?php echo htmlentities($fieldcount_return_bk);?></h3>
	              <p>Total Pending Books</p>
	            </div>
	            <i class="fa fa-mail-forward"></i>
	          </div>
	          <div class="more_info"><a href="issued_book_info.php">More Information</a></div>
	        </div>
	    </div>
	  </div>
	<?php include_once('includes/footer2.php'); ?>
  </div>

	<script src="./js/java2.js"></script>
</body>
</html>