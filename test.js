$(document).ready(function(){
   /* $(".marg").focus(function(){
        $(".paneleffect").css("box-shadow", "0 0 10px white");
    });*/
  
      
    
    $(".advs").on("click", function(){
        
        $(".adddhide").toggle();
       
        
    });
    
   
    
    
   
    
     $(".marg").on("keyup", function() {
         
      /*  var tabledhi = $("td").text();
         if(tabledhi == "")
             {
                $(".tablehide").hide();
                 
             } */
            
         if ($(".marg").val() == "")
             
             {
                 $(".tablehide").hide();
             }
         else {
             
             var stateval = $(".selectstate").val();
             var schoolval = $(".marg").val();  
             
             $.ajax({
 
               //AJAX type is "Post".
 
               type: "POST",
 
               //Data will be sent to "ajax.php".
 
               url: "ajax.php",
                 
             
 
               //Data, that will be sent to "ajax.php".
 
               data: {
 
                   //Assigning value of "name" into "search" variable.
 
                   sellist1: stateval,
                   school_state:  schoolval
 
               },
            
                    
            success: function(data){
                
               $(".tablehide").show();
                
               
                 $("#tableajax").html(data);
                 
             
                
              $("td").on("click", function(){
        
        $(".tablehide").hide();
       
        var inval= $(this).html();
        
        $(".marg").val(inval);
       
                      
       
       
    });
                  
                 
             
                     
                
                    
            
            }
                  
                 
                 
                 
             });
             
             
            
                 
             
            
         }
});
    
         
    $(".courseclick").on("click", function(){
       
        $(".coursehide").toggle();
        
          if ($(".marg").val() == "")
             
             {
                
                 $(".subjdropdown").html();
                 
             }
                       
        else {
            
            
            var schoolvalue = $(".marg").val();
           // var subjvalue = $(".subjsearch").val();
            
            $.ajax({
 
               //AJAX type is "Post".
 
               type: "POST",
 
               //Data will be sent to "ajax.php".
 
               url: "ajax.php",
                 
             
 
               //Data, that will be sent to "ajax.php".
 
               data: {
 
                   //Assigning value of "name" into "search" variable.
 
            
                   school_info:  schoolvalue
                //   subj_info: subjvalue
 
               },
            
                success: function(data){
                   
                  
                    $(".subjdropdown").html(data);
                }
        
    
    
    }); 
    
        }
       
        
        
    });
    
    
    $(".subjectclick").on("click", function(){
       $(".subjecthide").toggle();
        
          if ($(".marg").val() == "")
             
             {
                
                 $(".subjnamedropdown").html();
                 
             }
                       
        else {
            
            
            var schoolvalue1 = $(".marg").val();
           // var subjvalue = $(".subjsearch").val();
            
            $.ajax({
 
               //AJAX type is "Post".
 
               type: "POST",
 
               //Data will be sent to "ajax.php".
 
               url: "ajax.php",
                 
             
 
               //Data, that will be sent to "ajax.php".
 
               data: {
 
                   //Assigning value of "name" into "search" variable.
 
            
                   school_info1:  schoolvalue1
                //   subj_info: subjvalue
 
               },
            
                success: function(data){
                   
                  
                    $(".subjnamedropdown").html(data);
                }
        
    
    
    }); 
    
        }
       
        
        
    });
    
    
    $(".marg").on("focus", function() {
    
        $(".coursehide").hide();
        
        $(".subjecthide").hide();
        
    });
    
   
    
    
    
            $(".subjsearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".subjdropdown div").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

    
               $(".search_subj").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".subjnamedropdown div").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
    
    
         });
   
         