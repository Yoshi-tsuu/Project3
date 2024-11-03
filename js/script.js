$(document).ready(function() {
  //LoadPage
  $("#modlist").on("click","div>img",function e(){
    window.open("details.php?id=" + $(this).parent().attr('data'));
    e.stopPropagation();
  })
  $("#verifyScroll").on("click","div",function(e){
    e.stopPropagation();
    window.open("details.php?id=" + $(this).attr('data'));
  })
  
  //HoverEffect
  $("#modlist").on("mouseenter","div",function(){
    $(this).css("background-color","green");
  }).on("mouseleave","div",function(){
    $(this).css("background-color","");
  })

  $("#verifyScroll").on("mouseenter","div",function(){
    $(this).css("background-color","green");
  }).on("mouseleave","div",function(){
    $(this).css("background-color","");
  })
  $("#like").on("click",function(){
    let userID = $(this).attr("data");
    let modID = $("#sendComment").attr("data");
    if($(this).attr("src")=="img/site/likeEmpty.png"){
      $.post("fun/addLike.php",{modID:modID,userID:userID},function(data){
        console.log(data);
      })
      $(this).attr("src","img/site/likeFilled.png")
    } else {
      $.post("fun/removeLike.php",{modID:modID,userID:userID},function(data){
        console.log(data);
      })
      $(this).attr("src","img/site/likeEmpty.png")
    }
  })

  $("#sendComment").on("click",function(){
    let tresc = $("#commentField").val();
    let modID = $(this).attr("data");
    // console.log(tresc + modID);
    $.post("fun/insertComment.php",{tresc:tresc,modID:modID},function(data){
      if($("#comment0").length>0){
        $("#comment0").before(data);
        $("#commentField").val("");
      } else {
        $("#modComments").html($("#modComments").html()+data);
        $(".commentBox").attr("id","comment0");
        $("#commentField").val("");
      }
    })
  })

  $("#verifyButton").on("click",function(){
    let modID = $("#sendComment").attr("data");
    $.post("fun/verifyMod.php",{modID:modID},function(data){
      $("#verifyButton").remove();
       console.log(data);
    })
  })

  $("#deleteButton").on("click",function(){
    let modID = $("#sendComment").attr("data");
    let obrazek = $("#deleteButton").attr("data");
    console.log("click");
    $.post("fun/deleteMod.php",{modID:modID, obrazek:obrazek},function(data){
     console.log(data); 
     window.location.href = "mody.php";
    })
  })
  $("#editButton").on("click",function(){
    let modID = $("#sendComment").attr("data");
    window.location.href = "modifyMod.php?id="+modID;
  })
  $(".deleteUser").on("click",function(){
    let id = $(this).attr("data");
    $(this).parent().parent().remove();
    $.post("fun/deleteUser.php",{id:id},function(data){})
  })
});
