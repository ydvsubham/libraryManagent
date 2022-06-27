<?php
	include('includes/connection.php');
	if(isset($_GET['book'])){
		$books=$_GET['book'];
		$select=mysqli_query($conection,"DELETE FROM books WHERE id='$books';");
		echo "<script>alert('Book Deleted SucessFully!!');</script>";
		echo "<script>window.location.href='manage_books.php?delete=sucess';</script>";
      exit();
	}
?>