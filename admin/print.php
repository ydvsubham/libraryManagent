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
  if(isset($_GET['u_id'])){
    $username=mysqli_real_escape_string($conection,$_GET['u_id']);
    $isbn=mysqli_real_escape_string($conection,$_GET['isbn']);
    $status=mysqli_real_escape_string($conection,$_GET['status']);
    $sql2 = "SELECT * FROM sign_up WHERE user_id ='$username';";
    $arr2=mysqli_query($conection,$sql2);
    $row2=mysqli_fetch_array($arr2);
    $Sname=$row2['name'];
    $sql3 = "SELECT * FROM books WHERE isbn ='$isbn';";
    $arr3=mysqli_query($conection,$sql3);
    $row3=mysqli_fetch_array($arr3);
    $Bname=$row3['name'];

  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dev liberary</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <style>
  .print-c{
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  table{
     display: flex;
     justify-content: center;
     margin-top: 40px;
  }
  tbody{
    border: 1px solid black;
    border-collapse: collapse;

  }
  tr,td{
    padding:10px;
  }
  button{
    display: block;
    position: absolute;
    left: 50%; 
    transform: translate(-50%,0);
  }
</style>

</head>
<body>
  <div class="print-c">
    <div><button  onClick="window.print();">Print</button></div>
    <table id="print">
      <tbody>
        <tr>
          <td>Student ID : </td>
          <td><?php echo $username; ?></td>
        </tr>
        <tr>
          <td>Student Name : </td>
          <td><?php echo $Sname; ?></td>
        </tr>
        <tr>
          <td>Book Name : </td>
          <td><?php echo $Bname; ?></td>
        </tr>
        <tr>
          <td>Book ISBN : </td>
          <td><?php echo $isbn; ?></td>
        </tr>
        <tr>
          <td>Book issue status : </td>
          <td>approved</td>
        </tr>
        <tr>
          <td>Book issue Date : </td>
          <td><?php echo date("Y-m-d"); ?></td>
        </tr>
      </tbody>
      
    </table>
        
        
  </div>


</body>
</html>



