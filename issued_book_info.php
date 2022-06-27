<?php
	session_start();
	include_once('includes/connection.php');
	if(isset($_SESSION['u_id'])){
		$user=$_SESSION['u_id'];
		$return_bk="SELECT dashboard.id as d_id ,dashboard.isbn as book_isbn,dashboard.reg_date as b_date,dashboard.return_status as status, books.name as book_name,books.author as aurthor_name FROM dashboard INNER JOIN book_map ON dashboard.isbn=book_map.isbn INNER JOIN books ON book_map.book_type=books.id WHERE u_id='$user';";
		$arr=mysqli_query($conection,$return_bk);
		$count=0;

	}else {
			echo "<script>window.location.href='location:index.php?sign_in=invalid';</script>";
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
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/dashboard/style.css">
	<link rel="stylesheet" type="text/css" href="css/hover.css">
	<style type="text/css">
		@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,600);

			
			.mys-tbl {
			  background: #111111;
			  border-radius: 0.25em;
			  border-collapse: collapse;
			  
			}
			.mys-tbl th {
			  border-bottom: 1px solid #364043;
			  color: #E2B842;
			  font-size: 1.15em;
			  font-weight: 600;
			  padding: 0.5em 1em;
			  text-align: left;
			}
			.mys-tbl td {
			  color: #fff;
			  font-weight: 400;
			  padding: 0.65em 1em;
			}
			.disabled td {
			  color: #4F5F64;
			}
			.mys-tbl tbody tr {
			  transition: background 0.25s ease;
			}
			.mys-tbl tbody tr:hover {
			  background: #014055;
			}
			
			@media screen and (max-width: 750px){
				.cont_main3{
				overflow-x: scroll;
			}
			}

	</style>

</head>
<body>
	<div class="welcome_cont">
		<?php include_once('includes/header2.php'); ?>

		 <div class="desboard_cont">
	      <div class="DashBoard_head">
	        	<h3>Admin Dashboard</h3>
	      </div>
	      <div class="cont_main3">
	        <table class="mys-tbl">
			   <thead>
			    	<tr>
			        	<th>#</th><th>Book ISBN</th><th>Book Name</th><th>Author Name</th><th>Borrow date</th><th>Issue Status</th><th>Returned Status</th>
			    	</tr>
			   </thead>
			   <tbody>
			   	<?php 
              
		            while($row=mysqli_fetch_array($arr))
		            {
		              $id=$row['d_id'];
		              //$u_id=$row['user_id'];
		              $isbn=$row['book_isbn'];
		              $Bname=$row['book_name'];
		              $reg_date=$row['b_date'];
		              $aurthor_name=$row['aurthor_name'];
		              $status=$row['status'];
		              $count++;
		              
		        ?>
				    <tr>
				        <td><?php echo $count; ?></td>
				        <td><?php echo $isbn; ?></td>
				        <td><?php echo $Bname; ?></td>
				        <td><?php echo $aurthor_name; ?></td>
				        <td><?php echo $reg_date; ?></td>
				        <td><?php
				        	if($status==1){
				        		echo "Approved";
				        	} else{
				        		echo "Not Approved";
				        	}
				    	?></td>
				    </tr>
				    <<?php } ?>
			   </tbody>
			</table>
	    </div>
	  </div>
	<?php include_once('includes/footer2.php'); ?>
  </div>

	<script src="./js/java2.js"></script>
</body>
</html>