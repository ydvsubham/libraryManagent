 
	var testDiv = document.querySelector("footer");
  
  if(testDiv.offsetTop<675){
    testDiv.style.bottom="0px";
  }
  //console.log( testDiv.offsetTop);
setInterval(function () {
	var h = parseInt(window.innerHeight);
      var w = parseInt(window.innerWidth);

      if(w >= 1000) {
          document.querySelector(".nav2").style = "width:100%";
      } 
              }, 100);


function menu_open(){
  document.querySelector(".nav2").style = "width:200px";
  
}
  
function menu_close(){
  document.querySelector(".nav2").style = "width:0";
  
}



function footer_pos() {
  var testDiv = document.querySelector("footer");
  console.log( "shubham yadav");
}
  
  