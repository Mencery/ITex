$("#getStatistics").on("click", function(){
    var login =$("#login").val();
if(login != ""){
    $.ajax({
        url: "get.php",
        method: "GET",
        data: "login="+login,
         success: function(data) {
            $('#statistics').html(data);
        },
        error: function(){alert("Not found");}
        
      });
}
});