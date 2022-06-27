<?php
  session_start();
  include('includes/connection.php');
  if(isset($_SESSION['u_id'])){
    if($_SESSION['u_id']=='admin'){
        $temp=0;
        $book_list ="SELECT id,name FROM books;";
        $query = mysqli_query($conection, $book_list);
        
        
    }else{
      echo "<script>window.location.href='../index.php?sign_in=invalid';</script>";
      exit();
    } 
  }else {
    echo "<script>window.location.href='../index.php?sign_in=invalid';</script>";
      exit();
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dev liberary</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" style=""  href="img/head_icon.png" sizes="16x16"/>
  <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css\style.css">
  <link rel="stylesheet" type="text/css" href="css\hover.css">
    <link rel="stylesheet" type="text/css" href="css\add_book.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
<div class="welcome_cont">
 <?php
  include_once('includes/header.php');
 ?>
  <div class="desboard_child"> 
    <div class="member_cont">
        <h3 class="member_head">Add Books</h3>
      <div class="add_books_cont">
          <div class="add_books_head"><h3>Book Info</h3></div>
          <div class="add_books_info">
            <form action="add_book_type_inc.php" method="POST" enctype="multipart/form-data">
              <label for="b_type">Select book Name :</label>
              <select id="b_type" name="b_type" required="">
              <?php
                foreach ($query as $key ) {
                  ?>
                  <option value=<?php echo $key['id']; ?> ><?php echo $key['name']; ?></option>
                  <?php
                }
                ?>
                
                
              </select>
              <label for="b_isbn">ISBN Number:</label>
              <input type="text" name="b_isbn" id="b_isbn" required="">
              <label for="b_price">Price:</label>
              <input type="text" name="b_price" id="b_price" required="">
              <input type="submit" name="b_submit" value="ADD">
            </form>
          </div>
      </div>      
  </div>
<?php include_once('includes/footer.php'); ?>

<script src="js/java.js"></script>
</body>
</html>