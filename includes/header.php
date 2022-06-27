<div class="main_cont">
	<div class="nav1">
		<div class="logo">
			<img src="./img/logo.png">
			<h1>LIBRARIA</h1>
			<p>Explore Your World Through Books</p>
		</div>
		<div class="reg_button">
			<?php

				if(isset($_SESSION['u_id'])){
					echo "<img src='./img/profile.png'>
					<a href='profile.php' class='reg'>Profile</a>
					<a href='#' class='logout'> <form action='logout_inc.php' method='post'>
						<input type='submit' name='submit_logout' value='logout'>
						</form></a>";
				}else{
					echo "<img src='./img/reg.png'>
					<a href='#sign_up' class='reg' onclick='reg();'>Register</a>
					<a>|<a>
					<a href='#sign_up' class='log' onclick='log();'>Login</a>";
				}
			?>
		</div>

		<div class="mobile_btn"><a href="#" class="fa fa-bars" onclick='menu_open();'></a></div>
	</div>


		
	<div class="nav2">
		<div class="mobile_1200 close_btn"><a href="#" onclick='menu_close();'>&times;</a></div>
		<a href="index.php" onclick='menu_close();'>Home</a>
		<a href="books.php" onclick='menu_close();'>Books</a>
		<a href="#sign_up" onclick='menu_close();'>Services</a>
		<a href="#about" onclick='menu_close();'>About</a>
		<a href="#contact_us" onclick='menu_close();'>Contact</a>
		<div class="mobile_1200 mobile_reg">
			<?php

				if(isset($_SESSION['u_id'])){
					echo "<div class='mob_reg' onclick='menu_close();'><div class='mob_reg1'> <a href='profile.php' class='reg'>Profile</a></div></div>
					<div class='mob_log'><div class='mob_log1' onclick='menu_close();'> <form action='logout.php' method='post'><input type='submit' name='submit_logout' value='logout'></form></div></div>";
				}else{
					echo " <div class='mob_reg' onclick='menu_close();'><div class='mob_reg1'><a href='#sign_up'  onclick='reg();' class='reg'>Register</a></div></div>
					<div class='mob_log'><div class='mob_log1' onclick='menu_close();'><a href='#sign_up' onclick='log();' class='log'>Login</a></div></div>";
				}
			?>
		</div>
	</div>
</div>