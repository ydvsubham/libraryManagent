<?php
	session_start();
	include_once('includes/connection.php');
	if(isset($_SESSION['u_id'])){
		$sql="SELECT * FROM books";
		$arr=mysqli_query($conection,$sql);
		$total_book=mysqli_num_rows($arr);
		$total_pages=$total_book/2;
	}else {
    echo "<script>alert('Login first!!');</script>";
    echo "<script>window.location.href='index.php?sign_in=invalid';</script>";
	}
?>

<?php
  $results_per_page=12;
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

  if (isset($_GET['search'])) {
    $search=$_GET['keyword'];
    $sql ="SELECT * FROM books WHERE name LIKE '%$search%';";
    $arr=mysqli_query($conection,$sql);
    $count=$start_point;
  }else{
    $sql = "SELECT * FROM books ORDER BY id ASC LIMIT ".$start_point.", ".$results_per_page.";";
    $arr=mysqli_query($conection,$sql);
    $count=$start_point;
  }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Dev liberary</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
	<link rel="shortcut icon" style=""  href="img/head_icon.png" sizes="16x16"/>
	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/books/style.css">
	<link rel="stylesheet" type="text/css" href="css/books/font.css">
	<link rel="stylesheet" type="text/css" href="css/books/padding.css">
	<link rel="stylesheet" type="text/css" href="css/hover.css">

</head>
<body>
<div class="welcome_cont">
	<?php include_once('includes/header2.php'); ?>
	
	<div class="books_container">
		<div class="books_form">
            <form action="#" method="get">
                <input placeholder="Search by Name" id="keywords" name="keyword" type="text">
                <input type="submit" name="search">
            </form>
        </div>

        <div class="books_tank">
        	<?php 
              
            while($row=mysqli_fetch_array($arr))
            {
            	$isbn=$row['id'];
              	$name=$row['name'];
              	$type=$row['type'];
              	$aurthor=$row['author'];
              	//$status=$row['status'];
              	$count++;
            ?>
            <div class="figure">
          		<div class="figcaption"><?php echo $type;?></div>
          		<img src=<?php echo "img/book/".$isbn.".jpg";?> >
              <a class='btn_cap' href=<?php echo "book_issue_inc.php?u_id=".$_SESSION['u_id']."&book_isbn=".$isbn."";?> ><?php echo $name; ?></a>
            </div>
	        <?php } ?>
		</div>
    <div class="page_detail">
        <div>
          <a class="pre_btn" href="books.php?page_nmbr=<?php
            $pre=$page_nmbr;
            if($pre==0){$pre=$total_pages+1;} 
            echo($pre - 1); ?>&per_page=<?php echo($results_per_page); ?>">previous</a>
        </div>
        <div id="mid">
            <?php 

              for($i=0; $i<=$total_pages; $i++){
                echo "<a href='books.php?page_nmbr=".$i."&per_page=".$results_per_page."'>".($i+1)."<a>";
              }
            ?>
        </div>
        <div>
          <a class="nxt_btn" href="books.php?page_nmbr=<?php 
            $next=$page_nmbr;
            if($next>=$total_pages){$next=-1;}
            echo($next + 1); ?>&per_page=<?php echo($results_per_page); ?>">next</a>
        </div>
      </div>					
	</div>
  <?php include_once('includes/footer2.php'); ?>
  </div>

		<script src="./js/java2.js"></script>
</body>
</html>