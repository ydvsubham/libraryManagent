<?php

	include('includes/connection.php');
	$id=7;
	$book_p ="SELECT * FROM book_map WHERE book_type=$id AND STATUS=1 LIMIT 1;";
              $query = mysqli_query($conection, $book_p);
              $arr=array("Peter"=>"35");
              foreach ($query as $key ) {
                $arr=$key;
              }

print_r($arr);
?>
