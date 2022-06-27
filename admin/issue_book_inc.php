<?php
/*
	include_once('includes/connection.php');
	if(isset($_GET['u_id'])){
		$dashboard_id=mysqli_real_escape_string($conection,$_GET['id']);
		$isbn=mysqli_real_escape_string($conection,$_GET['isbn']);
		$status=mysqli_real_escape_string($conection,$_GET['status']);
		if(empty($dashboard_id)|| empty($isbn) || empty($status)){
			echo "<script>alert('Empty Input 000!!');</script>";
			echo "<script>window.location.href='issue_book.php?issue_book=empty';</script>";
			exit();
			
		}else{
			if($status==0){
				$sql_reject="DELETE FROM dashboard WHERE id='$dashboard_id';";
				mysqli_query($conection, $sql_reject);
				$sql_update_book_map_status="UPDATE book_map SET STATUS=1 WHERE isbn=$isbn;";
				mysqli_query($conection, $sql_reject);
				echo "<script>alert('Book request is rejected!!');</script>";
				echo "<script>window.location.href='issue_book.php?issue_book=rejected';</script>";
				exit();
			}else{

			}
			$sql_update_curr_date="UPDATE dashboard SET reg_date=1 WHERE isbn=$isbn;";
			mysqli_query($conection, $sql_delete);
			$sql_check="SELECT * FROM sign_up WHERE user_id='$dashboard_id';";
			$result_check=mysqli_query($conection, $sql_check);
			if(mysqli_num_rows($result_check)>0){
				$sql_book="SELECT * FROM books WHERE isbn='$isbn';";
				$result_book=mysqli_query($conection, $sql_book);
				$row_book1=mysqli_fetch_array($result_book);
				if(mysqli_num_rows($result_book)>0){

					if($row_book1['status']==1){
						$sql_book1="UPDATE books
						SET status=1
						WHERE isbn='$isbn';";
						mysqli_query($conection, $sql_book1);
						$name=$row_book1['name'];
						$status=1;

						$sql_issue="INSERT INTO dashboard(u_id,reg_date,book_name,return_status,isbn)
							VALUES(?,now(),?,?,?);";
						$stmt=mysqli_prepare($conection,$sql_issue);

						if($stmt){
							mysqli_stmt_bind_param($stmt,'ssii',$username,$name,$status,$isbn);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_close($stmt);
							echo "<script>alert('Book Issued!!');</script>";
							echo "<script>window.location.href='print.php?u_id=".$username."&isbn=".$isbn."&status=1';</script>";
							
						}else{
							echo "<script>alert('Book Not Issued!!');</script>";
							echo "<script>window.location.href='issue_book.php?issue_book=Error';</script>";
							exit();
							
						}
					}else{
						echo "<script>alert('Book Not Available!!');</script>";
							echo "<script>window.location.href='issue_book.php?issue_book=Book_not_avialable';</script>";
							exit();
							
					}

					
				}else{
					echo "<script>alert('Book Not Found!!');</script>";
							echo "<script>window.location.href='issue_book.php?issue_book=Book_not_found';</script>";
							exit();
						
				}
				
			}else{
				echo "<script>alert('Invalid UserName!!');</script>";
							echo "<script>window.location.href='issue_book.php?issue_book=invalid_Username';</script>";
							exit();
					
			}
		}		
	}
*/

	include_once('includes/connection.php');
	if(isset($_GET['u_id'])){
		$username=mysqli_real_escape_string($conection,$_GET['u_id']);
		$dashboard_id=mysqli_real_escape_string($conection,$_GET['d_id']);
		$isbn=mysqli_real_escape_string($conection,$_GET['isbn']);
		$status=mysqli_real_escape_string($conection,$_GET['status']);
		if(empty($dashboard_id)|| empty($isbn) || empty($status) || empty($username)){
			echo "<script>alert('Empty Input 000!!');</script>";
			echo "<script>window.location.href='issue_book.php?issue_book=empty';</script>";
			exit();
			
		}else{
			if($status==0){
				$sql_reject="DELETE FROM dashboard WHERE id='$dashboard_id';";
				mysqli_query($conection, $sql_reject);
				$sql_update_book_map_status="UPDATE book_map SET STATUS=1 WHERE isbn=$isbn;";
				mysqli_query($conection, $sql_update_book_map_status);
				echo "<script>alert('Book request is rejected!!');</script>";
				echo "<script>window.location.href='issue_book.php?issue_book=rejected';</script>";
				exit();
			}else{
				$sql_issue="UPDATE dashboard SET reg_date = now() WHERE id='$dashboard_id';";
				mysqli_query($conection, $sql_issue);
				echo "<script>alert('Book Issued!!');</script>";
				echo "<script>window.location.href='print.php?u_id=".$username."&isbn=".$isbn."&status=1';</script>";
				/*
			}else{
				echo "<script>alert('Invalid UserName!!');</script>";
							echo "<script>window.location.href='issue_book.php?issue_book=invalid_Username';</script>";
							exit();
					
			}
			*/
		}		
	}
}else{
	echo "1s one";
}
?>

