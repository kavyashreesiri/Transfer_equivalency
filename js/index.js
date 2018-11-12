$(document).ready(function(){
   /* $(".marg").focus(function(){
        $(".paneleffect").css("box-shadow", "0 0 10px white");
    });*/
  
    
                         
    
   $(document).on('click','li',function(){
       
        var droptext = $(this).html();
        var droptext = droptext.replace('&amp;','&');
        $(".schoolclick").val(droptext);
        $(".buttontext").text(droptext);
        $(".schoolhide").hide();
       // $(".buttontext").replace('&amp;','&');
        
    });  
    
    $(".schoolclick").on("click", function(){
       
        $(".schoolhide").toggle();
        
    });
    
    $(".advs").on("click", function(){
        
        $(".adddhide").toggle();
       
       
    });
    
    $(document).on('change','.selectstate',function(){
           
            $(".schoolclick").val("School Name");
            $(".buttontext").text("School Name");
        
        var stateval = $(".selectstate").val();
          //   var schoolval = $(".marg").val();  
             
             $.ajax({
 
               //AJAX type is "Post".
 
               type: "POST",
 
               //Data will be sent to "ajax.php".
 
               url: "ajax/index.ajax.php",
                 
             
 
               //Data, that will be sent to "ajax.php".
 
               data: {
 
                   //Assigning value of "name" into "search" variable.
 
                   sellist1: stateval,
              //     school_state:  schoolval
 
               },
            
                    
            success: function(data){
                
                
               
                
          //     $(".tablehide").show();
                
               
                 $(".schoolnamedropdown").html(data);
             
                    
            
            }
                  
                 
                 
                 
             });
             
        
        
        
          });
   
    $(".srchbtn").on("click", function(){
        
       var schoolvalidate = $(".marg").val(); 
       
        
         
             $.ajax({
 
               //AJAX type is "Post".
 
               type: "POST",
 
               //Data will be sent to "ajax.php".
 
               url: "ajax/index.ajax.php",
                 
             
 
               //Data, that will be sent to "ajax.php".
 
               data: {
 
                   //Assigning value of "name" into "search" variable.
 
                   school_validate:  schoolvalidate
                   
               },
            
                    
            success: function(data){
                
                var str = data;
                var res = str.split(" ")[0];
                var sbgires = str.split(" ")[1];
                                
                if ($.trim(res) == "Success"){
                    
                    
                 $(".hideinput").val($(".schoolclick").val());
                 $(".hideinput1").val($(".selectstate").val());  
                 $(".hideinput2").val(sbgires);  
               //   alert(sbgires);
                    
                   $(".mainform").submit();
                    
                }
                
                else {
                var res = str.slice(0, 33);    
                $(".validate_search").show();
                $(".validate_search").text(res);
                
                }
                
                
            }
                
            
                 
             });
    });
    
  
    
    $(".courseclick").on("click", function(){
       
        $(".coursehide").toggle();
        $("#loader_adv1").show();
        $(".subjdropdown").html("");
        
          if ($.trim($(".marg").val()) == "School Name")
             
             {
                 
                 $("#loader_adv1").hide();
                 $(".subjdropdown").show();
                 $(".subjdropdown").html("Please Select School");
                 
             }
                       
        else {
            
            
            var schoolvalue = $(".marg").val();
           // var subjvalue = $(".subjsearch").val();
            
            $.ajax({
 
               //AJAX type is "Post".
 
               type: "POST",
 
               //Data will be sent to "ajax.php".
 
               url: "ajax/index.ajax.php",
                 
             
 
               //Data, that will be sent to "ajax.php".
 
               data: {
 
                   //Assigning value of "name" into "search" variable.
 
            
                   school_info:  schoolvalue
                //   subj_info: subjvalue
 
               },
            
                success: function(data){
                   
                    $("#loader_adv1").hide();
                    $(".subjdropdown").show();
                    $(".subjdropdown").html(data);
                }
        
    
    
    }); 
    
        }
       
        
        
    });
    
    
    $(".subjectclick").on("click", function(){
       $(".subjecthide").toggle();
        $("#loader_adv").show();
        $(".subjnamedropdown").html("");
          if ($.trim($(".marg").val()) == "School Name")
             
             {
                 $("#loader_adv").hide();
                 $(".subjnamedropdown").show();
                 $(".subjnamedropdown").html("Please Select School");
                 
             }
                       
        else {
            
            
            var schoolvalue1 = $(".marg").val();
           // var subjvalue = $(".subjsearch").val();
            
            $.ajax({
 
               //AJAX type is "Post".
 
               type: "POST",
 
               //Data will be sent to "ajax.php".
 
               url: "ajax/index.ajax.php",
                 
             
 
               //Data, that will be sent to "ajax.php".
 
               data: {
 
                   //Assigning value of "name" into "search" variable.
 
            
                   school_info1:  schoolvalue1
                //   subj_info: subjvalue
 
               },
            
                success: function(data){
                   
                    $("#loader_adv").hide();
                    $(".subjnamedropdown").show();
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

            $(".schoolfiltersearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".schoolnamedropdown li").filter(function() {
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
   
         