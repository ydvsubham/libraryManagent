<?php

	include('includes/connection.php');

	if(isset($_POST['b_submit'])){
		$b_name=mysqli_real_escape_string($conection,$_POST['b_name']);
		$b_arthor=mysqli_real_escape_string($conection,$_POST['b_arthor']);
		$b_type=mysqli_real_escape_string($conection,$_POST['b_type']);
/*
		$b_isbn=mysqli_real_escape_string($conection,$_POST['b_isbn']);
		$b_price=mysqli_real_escape_string($conection,$_POST['b_price']);
*/
		$status=1;
		$file=$_FILES['file'];
		$file_name=$_FILES['file']['name'];
		$file_tmp_name=$_FILES['file']['tmp_name'];
		$file_size=$_FILES['file']['size'];
		$file_error=$_FILES['file']['error'];
		$file_type=$_FILES['file']['type'];

		$file_ext=explode('.', $file_name);
		$file_actual_ext=strtolower(end($file_ext));
		$allowed_type=array('jpg','jpeg','png');
	
		if(empty($b_name)|| empty($b_arthor)  || empty($b_type)  ){
			 echo "<script>alert('Empty Input!!');</script>";
			echo "<script>window.location.href='add_book.php?add_book=empty';</script>";
			exit();
		}else{		


					$book_p ="SELECT MAX(id) FROM books;";
					$query = mysqli_query($conection, $book_p);
					$b_id=0;
					foreach ($query as $key ) {
						$b_id=$key['MAX(id)']+1;
					}
					$sql="INSERT INTO books(id,name,author,type)
						VALUES (?,?,?,?);";
					$stmt=mysqli_prepare($conection,$sql);

					if($stmt){
						mysqli_stmt_bind_param($stmt,'isss',$b_id,$b_name,$b_arthor,$b_type);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_close($stmt);
						if(in_array($file_actual_ext, $allowed_type)){
							if ($file_error === 0) {
								if ($file_size < 500000) {
									$file_dest='../img/book/'.$b_id.'.'.$file_actual_ext;
									move_uploaded_file($file_tmp_name,$file_dest);
									echo "<script>alert('Book Added Sucessfully!!');</script>";
									echo "<script>window.location.href='add_book.php?add_book=sucess';</script>";
									
									exit();
								}else{
									echo "<script>alert('Book cover page size exceed the limit!!');</script>";
									echo "<script>window.location.href='add_book.php?add_book=img_size_exceed';</script>";
									exit();	
								}

							}else{
								echo "<script>alert('Book Not Added!!');</script>";
									echo "<script>window.location.href='add_book.php?add_book=img_error';</script>";
									exit();	
							}
						}else{
							echo "<script>alert('Book Image extension is not detemined!!');</script>";
							echo "<script>window.location.href='add_book.php?add_book=img_error';</script>";
							exit();	
						}
							
					}else{
						echo "<script>alert('Book Not UPDATED!!');</script>";
							echo "<script>window.location.href='add_book.php?add_book=Error';</script>";
							exit();	
						
					}
				}										
			
		}

	
?>
