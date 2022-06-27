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


<?php include_once('includes/search.php'); ?>

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
  <link rel="stylesheet" type="text/css" href="css\manage_books_style.css">


</head>
<body>
  <div class="welcome_cont">
  <?php
    include_once('includes/header.php');
  ?>        
    <div class="member_cont">
      
      <div class="member_cont_child">
        <h3>Manage Books</h3>
      
        <div class="top_btm">
          <div class="pages">
           <form action="manage_books.php" method="get" >
            <label>Record per Page </label>
             <select name="per_page" onchange="this.form.submit()" >
               <option value='10'>10</option>
               <option value='50'>50</option>
               <option value='100'>100</option>
             </select>
           </form>
         </div>
         <div class="search_feild">
           <form action="manage_books.php" method="get">
            <input type="text" name="search">
            <input type="submit" name="search_submit">
          </form>
         </div>
       </div>
        <div class="table_cont">
        <table>
          <thead bgcolor='red'><tr><th></th><th>Name</th><th>Aurthor Name</th><th>Available Book</th><th>Action</th></tr></thead><tbody>
          <?php 
              
            while($row=mysqli_fetch_array($arr))
            {
              $id=$row['id'];
              $name=$row['name'];
              $aurthor=$row['author'];
              //$status=$row['status'];
              $book_p ="SELECT COUNT(id) FROM book_map WHERE book_type=$id ;";
              $query = mysqli_query($conection, $book_p);
              $bk_tcount=0;
              foreach ($query as $key ) {
                $bk_tcount=$key['COUNT(id)'];
              }
              $book_p ="SELECT COUNT(id) FROM book_map WHERE book_type=$id and STATUS=1;";
              $query = mysqli_query($conection, $book_p);
              $bk_Acount=0;
              foreach ($query as $key ) {
                $bk_Acount=$key['COUNT(id)'];
              }
              $count++;


            ?>
            <tr>
              <td><?php echo $count?></td>
              <td><?php echo $name?></td>
              <td ><?php echo $aurthor?></td>
              <td class='cent' style="text-align: center;" >
                <?php echo "$bk_Acount/$bk_tcount"; ?>
              </td>
                

              
              <td>
                <div class="delete" style="text-align: center;">
                  <a href="manage_books_inc.php?book=<?php echo $id;?>" 
                    onclick="return confirm('Are you sure you want to block <?php echo $name?>');">
                    <i class="fa fa-trash"></i>Delete</a>
                </div>
              </td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
      <div class="top_btm1">
        <div>
          <a class="pre_btn" href="manage_books.php?page_nmbr=<?php
            $pre=$page_nmbr;
            if($pre==0){$pre=$total_pages+1;} 
            echo($pre - 1); ?>&per_page=<?php echo($results_per_page); ?>">previous</a>
        </div>
        <div id="mid">
            <?php 

              for($i=0; $i<=$total_pages; $i++){
                echo "<a href='manage_books.php?page_nmbr=".$i."&per_page=".$results_per_page."'>".($i+1)."<a>";
              }
            ?>
        </div>
        <div>
          <a class="nxt_btn" href="manage_books.php?page_nmbr=<?php 
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