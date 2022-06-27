<?php

	include('includes/connection.php');

	if(isset($_POST['b_submit'])){
		$b_type=mysqli_real_escape_string($conection,$_POST['b_type']);
		$b_isbn=mysqli_real_escape_string($conection,$_POST['b_isbn']);
		$b_price=mysqli_real_escape_string($conection,$_POST['b_price']);

	
		if(empty($b_type)|| empty($b_isbn)  || empty($b_price)  ){
			 echo "<script>alert('Empty Input!!');</script>";
			echo "<script>window.location.href='add_book_type.php?add_book=empty';</script>";
			exit();
		}else{		

					$sql="INSERT INTO book_map(isbn,book_type,price)
						VALUES (?,?,?);";
					$stmt=mysqli_prepare($conection,$sql);

					if($stmt){
						mysqli_stmt_bind_param($stmt,'iii',$b_isbn,$b_type,$b_price);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_close($stmt);
						echo "<script>alert('ADDED succesfully!!');</script>";
						echo "<script>window.location.href='add_book_type.php?add_book=succes';</script>";
						exit();	
							
					}else{
						echo "<script>alert('Book Not UPDATED!!');</script>";
						echo "<script>window.location.href='add_book.php?add_book=Error';</script>";
						exit();	
						
					}
				}										
			
		}

	
?>
