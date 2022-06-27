<?php
	session_start();
	if(isset($_SESSION['u_id'])){
		$u_id=$_SESSION['u_id'];
		$u_name=$_SESSION['u_name'];
		$u_email=$_SESSION['u_email'];
		$u_password=$_SESSION['u_password'];
	}else {
			echo "<script>window.location.href='index.php?sign_in=invalid';</script>";
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
	<link rel="stylesheet" type="text/css" href="css/account/style.css">
	<link rel="stylesheet" type="text/css" href="css/hover.css">

</head>
<body>
	<div class="welcome_cont">
		<?php include_once('includes/header2.php'); ?>

		<div class="Profile_cont">
			<div class="Profile1">
				<form action="update_inc.php" method="post"> 
					<div><h3>Profile Info</h3></div>
					<div>
						<i class="fa fa-user icon1 fa-lg"></i>
						<input type="text" name="U_id" value="<?php echo htmlentities($u_id);?>" required readonly>
					</div>
				    <div>
				    	<i class="fa fa-user icon2 fa-lg"></i>
				    	<input type="text" name="U_name" value="<?php echo htmlentities($u_name);?>"required>
				    </div>
				    <div>
				    	<i class="fa fa-envelope icon3 fa-lg"></i>
				    	<input type="email" name="U_email" value="<?php echo htmlentities($u_email);?>" required>
				    </div>
				    <input type="submit" name="U_submit" value="UPDATE">
				</form>
			</div>
			<div class="Profile2">
				<form action="update2_inc.php" method="post"> 
					<div><h3>Password</h3></div>
					<div>
						<i class="fa fa-key icon4 fa-lg"></i>
						<input type="password" name="UO_password" value="" placeholder="Old Password" required>
					</div> 
					<div>
						<i class="fa fa-key icon4 fa-lg"></i>
				    	<input type="password" name="UN_password" placeholder="New Password" required>
				    </div>
				    <div>
				    	<i class="fa fa-key icon4 fa-lg"></i>
				   		<input type="password" name="UC_password" placeholder="Confirm Password" required>
				   	</div>
				    <input type="submit" name="U_submit" value="UPDATE">
				</form>
			</div>
		</div>
	<?php include_once('includes/footer2.php'); ?>
  </div>



	<script src="./js/java2.js"></script>	
</body>
</html>