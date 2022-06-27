<?php

	include_once('includes/connection.php');
	if(isset($_GET['u_id'])){
		$username=mysqli_real_escape_string($conection,$_GET['u_id']);
		$isbn=mysqli_real_escape_string($conection,$_GET['isbn']);
		$dashboard_id=mysqli_real_escape_string($conection,$_GET['d_id']);

		if(empty($username)|| empty($isbn) || empty($dashboard_id) ){
			echo "<script>alert('Empty Input!!');</script>";
			echo "<script>window.location.href='return_book.php?ret_book=empty';</script>";
			exit();
		}else{

			$sql_return_dashboard="UPDATE dashboard SET return_date = now(),return_status=1 WHERE id='$dashboard_id';";
			$result_check=mysqli_query($conection, $sql_return_dashboard);
			$sql_return_book_map="UPDATE book_map SET STATUS=1 WHERE isbn=$isbn;";
			$result_check=mysqli_query($conection, $sql_return_book_map);
			echo "<script>alert('Book Returned SucessFully!!');</script>";
			echo "<script>window.location.href='return_print.php?u_id=".$username."&isbn=".$isbn."&status=1';</script>";
			exit();
		}		
	}

	

?>