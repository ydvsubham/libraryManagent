<?php

	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dev liberary</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" style=""  href="img/head_icon.png" sizes="16x16"/>
	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/font.css">
	<link rel="stylesheet" type="text/css" href="css/padding.css">
	<link rel="stylesheet" type="text/css" href="css/hover.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">
	iframe{
		position: absolute;
		bottom: 50px;
		right: 50px;
	}
</style>
</head>
<body>
	<div class="welcome_cont" id="up_btn">
		<div class="transparent">
			<?php include_once('includes/header.php'); ?>

				<div class="welcome_screen3">
					<div class="w_button mobile_780">
						<a href="#"><i class="fa fa-angle-left"></i></a>
					</div>
					<div class="welcome_screen_cont3">
              <h3>Online Learning Anytime, Anywhere!</h3>
              <h2>Discover Your Roots</h2>
              <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humor, or randomized words.</p>
              <div class="slide_btn">    
                  <a href="#about" id="r_btn">Read More</a>
                  <a href="#about" id="p_btn">Purchase</a>
              </div>
					</div>
					<div class="w_button mobile_780">
						<a href="#"><i class="fa fa-angle-right "></i></a>
					</div>
				</div>
				
			</div>
		</div>


	<div class="info_cont" id="about">
		<div class="info_cont_main">
			<div class="about">
				<h3>WELCOME TO THE LIBRARIA</h3>
				<p align="justify">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humor, or randomized words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable The generated Lorem Ipsum is therefore always free from repetition, injected humor, or non-characteristic words etc.</p>
			</div>
			<div class="total_content">
				<div id="books">
					<div class="info_book">
						<img src="https://image.flaticon.com/icons/svg/171/171322.svg">
						<div><span>Books</span></div>
						<div><strong>4657</strong></div>
					</div>
				</div>
				<div id="ebooks">
					<div class="info_book">
						<img src="https://image.flaticon.com/icons/svg/2232/2232427.svg">
						<div><span>eBooks</span></div>
						<div><strong>4657</strong></div>
					</div>
				</div>
				<div id="eAudio">
					<div class="info_book">
						<img src="https://www.flaticon.com/premium-icon/icons/svg/1130/1130593.svg">
						<div><span>AudioBooks</span></div>
						<div><strong>4657</strong></div>
					</div>
				</div>
				<div id="Magazine">
					<div class="info_book">
						<img src="https://image.flaticon.com/icons/svg/858/858892.svg">
						<div><span>Magazine</span></div>
						<div><strong>4657</strong></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section class="sign_up" id="sign_up">
		
		<div class="signUp_cont ">

			<div class="s_heading" >
				<div class="sb_btn1" id="reg">
					<a href="#sign_up" onclick="reg();">
						<h3 class ="under">Registration </h3>
					</a>
				</div>
				
				<div class="sb_btn2" id="log">
					<a href="#sign_up" onclick="log();">
						<h3 class ="blur"> Log In</h3>
					</a>
				</div>
			</div>
			<div  class="display1">
			<form action="sign_up_inc.php" method="post" >
				<div>
					<i class="fa fa-user icon1 fa-lg"></i>
					<input type="text" name="name" placeholder="Full Name" required="">
				</div>
				<div>
					<i class="fa fa-user icon2 fa-lg"></i>
					<input type="text" name="id" placeholder="Id issued by college" required="">
				</div>
				<div>
					<i class="fa fa-envelope icon3 fa-lg"></i>
					<input type="email" name="email" placeholder="E-mail" required="">
				</div>
				<div>
					<i class="fa fa-key icon4 fa-lg"></i>
					<input type="password" name="password" placeholder="Password" id="password" required="">
				</div>
				<div>
					<i class="fa fa-key icon5 fa-lg"></i>
					<input type="password" name="c_password" placeholder="Confirm Password" id="confirm_password" required="">
				</div>
				
				<div>
					<input type="submit" name="submit" value="Sign Up">
				</div>
			</form>
			</div>
		

		
			<?php

			if(isset($_SESSION['u_id']))
				
				echo "<span><h1 style='color:red;' >Loged In<h1><span>";
			?>
			<div  class="display2">
			<form action="sign_in_inc.php" method="post" >
				<div>
					<i class="fa fa-user icon2 fa-lg"></i>
					<input type="text" name="user_id" placeholder="User id" required autofocus>
				</div>
				<div>
					<i class="fa fa-key icon3 fa-lg"></i>
					<input type="password" name="password" placeholder="password" required>
				</div>
				
				<input type="submit" name="submit" value="Sign in">
			</form>
			</div>
		</div>
	</section>

	<section class="follow_cont" id="contact_us">
		<div class="follow_cont_main">
			<div class="follow_head">
				<h2>FOLLOW US</h2>
			</div>
			<div class="follow_link">
				<ul>
					<li ><a href="#" class="fa fa-facebook" ></a></li>
					<li ><a href="#" class="fa fa-twitter"></a></li>
					<li ><a href="#" class="fa fa-instagram"></a></li>
					<li ><a href="#" class="fa fa-linkedin"></a></li>
					<li ><a href="#" class="fa fa-rss"></a></li>
					<li ><a href="#" class="fa fa-youtube"></a></li>

				</ul>
			</div>
		</div>
	</section>
<?php include_once('includes/footer.php'); ?>
			

	
	<!-- <script>
  window.watsonAssistantChatOptions = {
      integrationID: "1966e74e-263e-4dad-8a82-12fbb4b3df17", // The ID of this integration.
      region: "us-south", // The region your integration is hosted in.
      serviceInstanceID: "67b316f7-5635-40bd-87c6-f21ecf422e8a", // The ID of your service instance.
      onLoad: function(instance) { instance.render(); }
    };
  setTimeout(function(){
    const t=document.createElement('script');
    t.src="https://web-chat.global.assistant.watson.appdomain.cloud/loadWatsonAssistantChat.js";
    document.head.appendChild(t);
  });

</script> -->
<!-- <script src="https://widget.flowxo.com/embed.js" data-fxo-widget="eyJ0aGVtZSI6IiM2N2MxOGUiLCJ3ZWIiOnsiYm90SWQiOiI2MTEzZGU4MzYzOTk5NDAwNGQzYjQ2OGIiLCJ0aGVtZSI6IiM2N2MxOGUiLCJsYWJlbCI6Ik1OSVQifSwid2VsY29tZVRleHQiOiJoZWxwZXIifQ==" async defer></script> 

<iframe class="mys-chatbot" 
    allow="microphone;"
    width="350"
    height="430"
    src="https://console.dialogflow.com/api-client/demo/embedded/037db6a5-c592-45f8-9574-3bb19a506ed3">
</iframe> -->

</body>
<script src="js/java.js"></script>
</html>