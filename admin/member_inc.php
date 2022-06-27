<?php
	include('includes/connection.php');
	if(isset($_GET['status'])){
		$status1=$_GET['status'];
		$select=mysqli_query($conection,"SELECT * FROM sign_up WHERE id='$status1';");
		while($row=mysqli_fetch_array($select)){
			$status_var=$row['status'];
			if($status_var==0){
				$status_state=1;
			}else{
				$status_state=0;
			}
			$update=mysqli_query($conection,"UPDATE sign_up SET status='$status_state' WHERE id='$status1' ");
			if($update){
				echo "<script>window.location.href='member.php?sucess=true';</script>";
      			exit();
			}else{

				echo mysqli_error();
			}
		}
		?>
		<?php
	}else{
		echo "<script>window.location.href='member.php?sucess=Error';</script>";
      	exit();
	}
?>