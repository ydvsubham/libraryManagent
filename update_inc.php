<?php

	include('connection.php');
	include_once('sign_in.php');
	$GLOBALS['status']=false;
	if(isset($_POST['U_submit'])){
		$U_name=mysqli_real_escape_string($conection,$_POST['U_name']);
		$U_user_id=mysqli_real_escape_string($conection,$_POST['U_id']);
		$U_email=mysqli_real_escape_string($conection,$_POST['U_email']);

		if(empty($U_name)|| empty($U_user_id)  || empty($U_email)){
			 echo "<script>alert('Empty Input!!');</script>";
			echo "<script>window.location.href='profile.php?singUp=empty';</script>";
			exit();
		}else{
			
				if(!filter_var($U_email,FILTER_VALIDATE_EMAIL)){
					header("location: profile.php?singUp=invalid_email");
					exit();
				}else{
					$sql="UPDATE sign_up
						SET name=?,email=? WHERE user_id=?;";
					$stmt=mysqli_prepare($conection,$sql);

					if($stmt){

						mysqli_stmt_bind_param($stmt,'sss',$U_name,$U_email,$U_user_id);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_close($stmt);
						$_SESSION['u_name']=$U_name;
						$_SESSION['u_email']=$U_email;
						echo "<script>alert('UPDATE SucessFull !!');</script>";
						echo "<script>window.location.href='profile.php?singUp=sucess';</script>";
						exit();
					}else{
						echo "<script>alert('UPDATE failded !!');</script>";
						echo "<script>window.location.href='profile.php?singUp=Error';</script>";
						exit();
					}
				}										
			
		}

	}
?>
