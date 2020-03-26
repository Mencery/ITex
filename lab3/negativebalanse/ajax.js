$('document').ready(function(){
    
    $.ajax({
        url: "get.php",
        method: "GET",
         success: function(data) {
           
           var result = JSON.parse(data);

          var html="<table border='1'>";
          for(var i = 0; i<result.length;i++){
            html+="<tr>";
            html+="<td>"+result[i]["login"]+"</td>";
            html+="<td>"+result[i]["name"]+"</td>";
            html+="<td>"+result[i]["balance"]+"</td>";
            html+="</tr>";
          }
           html+="</table>";
            $('#statistics').html(html);
        },
        error: function(){alert("Not found");}
        
      });

});