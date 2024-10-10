$(document).ready(function() {
  //LoadPage
  $("#modlist").on("click","div",function(e){
    e.stopPropagation();
    window.open("details.php?id=" + $(this).attr('data'));
  })
  //HoverEffect
  $("#modlist").on("mouseenter","div",function(){
    $(this).css("background-color","green");
  }).on("mouseleave","div",function(){
    $(this).css("background-color","");
  })

  
});