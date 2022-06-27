<?php
	include('connection.php');
	if (isset($_GET['search'])) {
    $search=$_GET['keyword'];
    $sql ="SELECT * FROM books WHERE name LIKE '%$search%';";
    $arr=mysqli_query($conection,$sql);
  }else{
        $sql = "SELECT * FROM sign_up ORDER BY id ASC LIMIT ".$start_point.", ".$results_per_page.";";
    $arr=mysqli_query($conection,$sql);
    $count=$start_point;
  }
?>