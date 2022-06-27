<?php

	include('includes/connection.php');

	if(isset($_GET['book_isbn'])){
		$book_type=mysqli_real_escape_string($conection,$_GET['book_isbn']);
		$user_id=mysqli_real_escape_string($conection,$_GET['u_id']);

		if(empty($book_type)|| empty($user_id) ){
			 echo "<script>alert('Empty Input!!');</script>";
			echo "<script>window.location.href='sign_up_index.php?singUp=empty';</script>";
			exit();
		}else{
				$book_p ="SELECT isbn FROM book_map WHERE book_type=$book_type AND STATUS=1 LIMIT 1;";
				$query = mysqli_query($conection, $book_p);
				$arr=(array)null;
				//print_r($query);
				foreach ($query as $key ) {
					$arr=$key;
					//echo "yess";
				}

				//print_r(count($arr));
				if(count($arr)==0){
					echo "no book";
					echo "<script>alert('No Book Available!!');</script>";
					echo "<script>window.location.href='books.php?singUp=sucess';</script>";
					exit();
				}else{
					$isbn=$arr['isbn'];
					$sql="INSERT INTO dashboard(u_id,isbn)
						VALUES (?,?);";
					$stmt=mysqli_prepare($conection,$sql);

					if($stmt){
						mysqli_stmt_bind_param($stmt,'si',$user_id,$arr['isbn']);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_close($stmt);
						$book_p ="UPDATE book_map SET STATUS=0 WHERE isbn=$isbn;";
						$query = mysqli_query($conection, $book_p);
						//print_r($arr);
						
						echo "<script>alert('Book is requested to borrow');</script>";
						echo "<script>window.location.href='books.php?singUp=sucess';</script>";
						
						exit();
					}else{
						//echo "error";
						
						echo "<script>alert('Book  requested to borrow is failed!!');</script>";
						echo "<script>window.location.href='books.php?singUp=sucess';</script>";
						
						exit();
					}
				}
				
		}

	}else{
		echo "not submitted";
	}
?>
