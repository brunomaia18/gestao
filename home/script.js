

         /*$(document).ready(function(){
            $("#cadastro").on('click',function(e){
                e.preventDefault();
              $(function(){
                  $("#info").open("../cadastro/index.html");
              
              });
          })})
         

         $(document).ready(function(){
            $(document).on('submit','#form',function(e){
              e.preventDefault();
              console.log("to antes do ajax");
            
            
              $.ajax({
                url:'inserir.php',
                method:"POST",
                data: new FormData(this),
                processData:false,
                contentType:false,
                cache:false
              }).done(function(data){
                alert(data)
              })
            })
          })*/
        