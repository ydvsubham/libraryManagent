 
	var testDiv = document.querySelector("footer");
  
  if(testDiv.offsetTop<675){
    testDiv.style.bottom="0px";
  }

console.log( testDiv.offsetTop);
var background=document.querySelector(".welcome_cont");
var flag=1;
function changeBackground(){
	if (flag==1){
		background.style="background: url(./img/wel_background3.jpg); background-position: center; background-size: cover;";
		flag=2;
	}else{
		background.style="background: url(./img/wel_background.jpg); background-position: center; background-size: cover;";
		flag=1;
	}
}


setInterval(changeBackground,2000);

function reg() {

	var reg=document.querySelector(".display1");
	var log=document.querySelector(".display2");
	var sb_btn2=document.querySelector(".sb_btn2");
	var sb_btn1=document.querySelector(".sb_btn1");
	var child_h13=sb_btn1.querySelector("h3");
	var child_h23=sb_btn2.querySelector("h3");
	child_h13.style="color: #ff7236 !important;";
	child_h23.style="color: #ddd !important;";
	reg.style="display:block;";
	log.style="display:none;";
	sb_btn2.style="box-shadow:  12px -12px 24px 0 rgba(255, 255, 255, 0.5) inset;border-bottom-left-radius: 30px;";
	sb_btn1.style="box-shadow:none; border-bottom-left-radius:none;";
}


function log() {

	var log=document.querySelector(".display2");
	var reg=document.querySelector(".display1");
	var sb_btn2=document.querySelector(".sb_btn2");
	var sb_btn1=document.querySelector(".sb_btn1");
	var child_h13=sb_btn1.querySelector("h3");
	var child_h23=sb_btn2.querySelector("h3");
	child_h13.style="color: #ddd;";
	child_h23.style="color: #ff7236;";
	reg.style="display:none;";
	log.style="display:block;";
	sb_btn1.style="box-shadow:  -12px -12px 24px 0 rgba(255, 255, 255, 0.5) inset;border-bottom-right-radius: 30px;";
	sb_btn2.style="box-shadow:none; border-bottom-left-radius:none;";
}

	var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;


	setInterval(function () {
		var h = parseInt(window.innerHeight);
        var w = parseInt(window.innerWidth);

        if(w >= 1000) {
            document.querySelector(".nav2").style = "height:auto";
            document.querySelector("body").style = "overflow:scroll";

        } 
                }, 100);

function menu_open(){

	document.querySelector(".nav2").style = "height:100%";
	document.querySelector("body").style = "overflow:hidden";
	
}
function menu_close(){
	var screen_size=window.matchMedia("(max-width: 1000px)");
	if (screen_size.matches){
		document.querySelector(".nav2").style = "height:0";
		document.querySelector("body").style = "overflow:scroll";
	}
}