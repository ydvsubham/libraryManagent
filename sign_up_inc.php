						<?php
	
							include_once('includes/connection.php');

							if(isset($_POST['submit'])){
								$name=mysqli_real_escape_string($conection,$_POST['name']);
								$user_id=mysqli_real_escape_string($conection,$_POST['id']);
								$email=mysqli_real_escape_string($conection,$_POST['email']);
								$password=mysqli_real_escape_string($conection,$_POST['password']);
								$status=1;

								if(empty($name)|| empty($user_id)  || empty($email) || empty($password)){
									
									print_r($_POST);
									 //echo "<script>alert('Empty Input!!');</script>";
									//echo "<script>window.location.href='index.php?singUp=empty';</script>";
									exit();
								}else{
									
										if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
											echo "<script>alert('Invalid Email!!');</script>";
											echo "<script>window.location.href='index.php?singUp=empty';</script>";
											exit();
										}else{
											$hased_password=password_hash($password, PASSWORD_DEFAULT);

											$sql="INSERT INTO sign_up(name,user_id,email,pwd,status)
												VALUES (?,?,?,?,?);";
											$stmt=mysqli_prepare($conection,$sql);

											if($stmt){
												mysqli_stmt_bind_param($stmt,'ssssi',$name,$user_id,$email,$hased_password,$status);
												mysqli_stmt_execute($stmt);
												mysqli_stmt_close($stmt);

												echo "<script>alert('Sign Up Sucessfull!!');</script>";
												echo "<script>window.location.href='index.php?singUp=sucess';</script>";
												exit();
											}else{
												echo "<script>alert('Sign Up Falied!!');</script>";
												echo "<script>window.location.href='index.php?singUp=Error';</script>";
												exit();
											}
										}										
									
								}

							}
						?>
