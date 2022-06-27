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
  include_once('includes/connection.php');

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
  $sql1="SELECT * FROM sign_up;";
    $arr1=mysqli_query($conection,$sql1);
    $total_book=mysqli_num_rows($arr1);
    $total_pages=(int)($total_book/$results_per_page);

  if (isset($_GET['search_submit'])) {
    $search=$_GET['search'];
    $sql ="SELECT * FROM sign_up WHERE name LIKE '%$search%';";
    $arr=mysqli_query($conection,$sql);
    $count=$start_point;
  }else{
        $sql = "SELECT * FROM sign_up ORDER BY id ASC LIMIT ".$start_point.", ".$results_per_page.";";
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
  <link rel="stylesheet" type="text/css" href="css\style.css">
  <link rel="stylesheet" type="text/css" href="css\hover.css">
  <link rel="stylesheet" type="text/css" href="css\member_style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
  <div class="welcome_cont">
  <?php
    include_once('includes/header.php');
  ?>  
<div class="desboard_child">       
<div class="member_cont">
  <div class="member_cont_child">
    <h3>Manage Members</h3>
    <div class="top_btm">
      <div class="pages">
        <form action="member.php" method="get" >
          <label>Record per Page </label>
          <select name="per_page" onchange="this.form.submit()" >
            <option value='10'>10</option>
            <option value='50'>50</option>
            <option value='100'>50</option>
           </select>
        </form>
      </div>
      <div class="search_feild">
         <form action="member.php" method="get">
          <input type="text" name="search">
          <input type="submit" name="search_submit">
        </form>
       </div>
    </div>
    <div class="table_cont">
      <table>
        <thead bgcolor='red'><tr><th></th><th>Name</th><th>Username</th><th>Email</th><th>Action</th></tr></thead><tbody>
        <?php 
            
          while($row=mysqli_fetch_array($arr))
          {
            $name=$row['name'];
            $user_id=$row['user_id'];
            $email=$row['email'];
            $status=$row['status'];

            $count++;

          ?>
          <tr>
            <td><?php echo $count?></td>
            <td><?php echo $name?></td>
            <td><?php echo $user_id?></td>
            <td><?php echo $email?></td>
            <td class='cent'>
              <?php
                if(($status)==0)
                {
                  ?><div class="act_dec act">
                  <a href="member_inc.php?status=<?php echo $row['id'];?>" 
                    onclick="return confirm('Are you sure you want to unblock <?php echo $name?>');">Inactive</a></div>
                  <?php
                }
                if(($status)==1)
                {
                  ?><div class="act_dec deact">
                  <a href="member_inc.php?status=<?php echo $row['id'];?>" 
                    onclick="return confirm('Are you sure you want to block <?php echo $name?>');"> Active</a></div>
            </td></tr>

              <?php
              }
              ?>
          <?php }?>
        </tbody>
      </table>
    </div>
    <div class=" top_btm1">
      <div>
        <a class="pre_btn" href="member.php?page_nmbr=<?php
          $pre=$page_nmbr;
          if($pre==0){$pre=$total_pages+1;} 
          echo($pre - 1); ?>&per_page=<?php echo($results_per_page); ?>">previous</a>
      </div>
      <div id="mid">
          <?php 

            for($i=0; $i<=$total_pages; $i++){
              echo "<a href='member.php?page_nmbr=".$i."&per_page=".$results_per_page."'>".($i+1)."<a>";
            }
          ?>
      </div>
      <div>
        <a class="nxt_btn" href="member.php?page_nmbr=<?php 
          $next=$page_nmbr;
          if($next>=$total_pages){$next=-1;}
          echo($next + 1); ?>&per_page=<?php echo($results_per_page); ?>">next</a>
      </div>
    </div>
  </div>   
</div>
<?php include_once('includes/footer.php'); ?>

<script src="js/java.js"></script>
</body>
</html>

