// header stick to top

window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
//Mobile Menu
$(document).ready(function(e){
  $("#hamburger").click(function(){
    $("#cross").fadeIn();
    $("#hamburger").hide();
    $("#navigatie").slideDown("slow");
    event.preventDefault(e);
  });
  $("#cross").click(function(e){
    $("#cross").hide();
    $("#hamburger").fadeIn();
    $("#navigatie").slideUp("slow");
    event.preventDefault(e);
  });
  if (window.matchMedia('(max-width: 950px)').matches) {
  $(".menu").click(function(){
    $("#cross").hide();
    $("#hamburger").fadeIn();
    $("#navigatie").slideUp("slow");
  });
  }
});

// Set gallery height

$(document).ready(function(){
  var NSheight = $("#NS").height();
  $(".ajustHeight").height(NSheight);
});