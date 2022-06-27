<?php
  include('connection.php');

  if (isset($_GET['per_page'])) {
    $results_per_page=(int)$_GET['per_page'];
  }else{
    $results_per_page=10;
  }
  if(isset($_GET['page_nmbr'])){
    $start_point=$_GET['page_nmbr']*$results_per_page;
    $page_nmbr=$_GET['page_nmbr'];
  }else{
    $page_nmbr=0;
    $start_point=0;
  }
  $sql1="SELECT * FROM books;";
    $arr1=mysqli_query($conection,$sql1);
    $total_book=mysqli_num_rows($arr1);
    $total_pages=(int)($total_book/$results_per_page);

  if (isset($_GET['search_submit'])) {
    $search=$_GET['search'];
    $sql ="SELECT * FROM books WHERE name LIKE '%$search%';";
    $arr=mysqli_query($conection,$sql);
    $count=$start_point;
  }else{
        $sql = "SELECT * FROM books ORDER BY id ASC LIMIT ".$start_point.", ".$results_per_page.";";
    $arr=mysqli_query($conection,$sql);
    $count=$start_point;
  }
?>