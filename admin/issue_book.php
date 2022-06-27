<?php
session_start();
  if(isset($_SESSION['u_id'])){
    if($_SESSION['u_id']=='admin'){
       $temp=0;
    }else{
      echo "<script>window.location.href='../index.php?sign_in=invalid';</script>";
      exit();
    } 
  }else {
    echo "<script>window.location.href='../index.php?sign_in=invalid';</script>";
      exit();
  }
?>


<?php
  include('includes/connection.php');

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
    $sql ="SELECT * FROM cart WHERE u_id LIKE '%$search%';";
    $arr=mysqli_query($conection,$sql);
    $count=$start_point;
  }else{
        //$sql = "SELECT * FROM cart ORDER BY id_c ASC LIMIT ".$start_point.", ".$results_per_page.";";
    $sql="SELECT dashboard.id as d_id,dashboard.u_id as user_id ,dashboard.isbn as book_isbn,books.name as book_name,sign_up.name as user_name FROM dashboard INNER JOIN book_map ON dashboard.isbn=book_map.isbn INNER JOIN books ON book_map.book_type=books.id INNER JOIN sign_up ON sign_up.user_id=dashboard.u_id  WHERE dashboard.reg_date IS null;";
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css\style.css">
  <link rel="stylesheet" type="text/css" href="css\hover.css">
  <link rel="stylesheet" type="text/css" href="css\issue_book.css">


</head>
<body>
  <div class="welcome_cont">
  <?php
    include_once('includes/header.php');
  ?>        
    <div class="member_cont">
      
      <div class="member_cont_child">
        <h3>Issue Books</h3>
      
        <div class="top_btm">
          <div class="pages">
           <form action="issue_book.php" method="get" >
            <label>Record per Page </label>
             <select name="per_page" onchange="this.form.submit()" >
               <option value='10'>10</option>
               <option value='50'>50</option>
               <option value='100'>100</option>
             </select>
           </form>
         </div>
         <div class="search_feild">
           <form action="issue_book.php" method="get">
            <input type="text" name="search">
            <input type="submit" name="search_submit">
          </form>
         </div>
       </div>
        <div class="table_cont">
        <table>
          <thead bgcolor='red'><tr><th></th><th>Student ID</th><th>Student Name</th><th>Book ISBN</th><th>Book title</th><th>Issue/Reject Book</th></tr></thead><tbody>
          <?php 
              
            while($row=mysqli_fetch_array($arr))
            {
              $id=$row['d_id'];
              $u_id=$row['user_id'];
              $isbn=$row['book_isbn'];
              $Bname=$row['book_name'];
              $Sname=$row['user_name'];
              $count++;
              
            ?>
            <tr>
              <td><?php echo $count?></td>
              <td><?php echo $u_id?></td>
              <td><?php echo $Sname?></td>
              <td><?php echo $isbn?></td>
              <td><?php echo $Bname?></td>
              <td class='cent'>
                <?php 
                 echo "<a class='act_dec act' href='issue_book_inc.php?u_id=".$u_id."&d_id=".$id."&isbn=".$isbn."&status=1'>Issue<a>
                    <a class='act_dec deact' href='issue_book_inc.php?u_id=".$u_id."&d_id=".$id."&isbn=".$isbn."&status=a'>Reject<a>"
                    ?>
              </td>
               
              <?php }?>
            </tr>
            
          </tbody>

        </table>
      </div>
      <div class="top_btm1">
        <div>
          <a class="pre_btn" href="issue_book.php?page_nmbr=<?php
            $pre=$page_nmbr;
            if($pre==0){$pre=$total_pages+1;} 
            echo($pre - 1); ?>&per_page=<?php echo($results_per_page); ?>">previous</a>
        </div>
        <div id="mid">
            <?php 

              for($i=0; $i<=$total_pages; $i++){
                echo "<a href='issue_book.php?page_nmbr=".$i."&per_page=".$results_per_page."'>".($i+1)."<a>";
              }
            ?>
        </div>
        <div>
          <a class="nxt_btn" href="issue_book.php?page_nmbr=<?php 
            $next=$page_nmbr;
            if($next>=$total_pages){$next=-1;}
            echo($next + 1); ?>&per_page=<?php echo($results_per_page); ?>">next</a>
        </div>
      </div>
  </div>  
<?php include_once('includes/footer.php'); ?>

<script src="js/java.js"></script>
</body>
</html>













<?php
/*  session_start();
  if(isset($_SESSION['u_id'])){
    if($_SESSION['u_id']=='admin'){
       $temp=0;
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
          
    <div class="member_cont">
      <div class="member_head">
        <h3>Issues Books</h3>
      </div>
      <div class="add_books_cont">
          <div class="add_books_head"><h3>Book Info</h3></div>
          <div class="add_books_info">
            <form action="issue_book_inc.php" method="get" id="form_submit_page">
              <label for="username">Student Username:</label>
              <input type="text" name="username" id="username" required="">
              <label for="isbn">Book ISBN Number:</label>
              <input type="text" name="isbn" id="isbn" required="">
              <input type="submit" name="b_submit" value="Issue Book">
            </form>
          </div>
      </div>      
  <?php include_once('includes/footer.php'); ?>

<script src="js/java.js"></script>

</body>
</html>

*/