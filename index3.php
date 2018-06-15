<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">   <!--External style sheet -->  
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> <!-- W3 schools -->  
    <link href='https://fonts.googleapis.com/css?family=Ledger' rel='stylesheet'>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> 
   <script src="test.js" type="text/javascript"></script>
  </head>
  <body>
    
    <nav style="background-color: #003057" class="navbar navbar-expand-sm navbar-dark">
        <a class="navbar-brand sty1" href="#">
            <img src="logo/Capture.PNG" alt="Logo" style="width:120px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar on small screens -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <!-- <a class="nav-link text-white sty" href="#">Help</a>-->
                </li>
            </ul>
        </div> 
    </nav>
    <nav style="background-color: #DCDCDC; box-shadow: 0 0 30px #003057" class="navbar navbar-expand-sm justify-content-center">
        <ul class="navbar-nav">
                <li style="font-size: 3vw; color: #003057; font-family: Salsa" class="nav-item">
                    Transfer Equivalency Self-service
                </li>
         </ul>
    </nav>    
      
      
            
      <div class="parallax w3-container">
          <div class="row h-25">
          </div>      
          <div class="row">
            <div class="col-2">
            </div>
            <div id="outerbox" style="background: rgba(0, 46, 87, 0.6); box-shadow: 0 0 30px #003057" class="col-8 w3-center">
                
            <div class="innerbox">
                    <div style="background: rgba(0, 48, 87, 0.7)" class="w3-panel paneleffect">
                        <div class="container">
                <div class="py-3" style="font-family: Ledger; font-size: 1.7em; font-weight: bold; color:white;">Choose Your State</div>
                
                <div class="row mb-2">
                <div class="col-sm-3"></div>
                    <div class="col-sm-8">
                        <form action="">
                            <div class="form-group">
                                <select style="font-family: Ledger; font-weight: bold; color: black" class="form-control form-control-sm col-sm-9 selectstate selectchange" id="sel1" name="sellist1">
                                    <option>All States</option>
                                     <?php
                                        require_once 'database.php';
                                        //$keyword=mysqli_real_escape_string($connect,htmlspecialchars($_REQUEST["key"]));
                                            $state="SELECT DISTINCT STVSTAT_DESC FROM V_WX_SCHOOL_LIST ORDER BY STVSTAT_DESC ASC";
                                            $statement_id = oci_parse($conn,$state);
                                            //echo $statement_id;
                                            oci_execute($statement_id);
                                            
                                            while($row =oci_fetch_array($statement_id, OCI_ASSOC+OCI_RETURN_NULLS))
                                            {
                                                if($row["STVSTAT_DESC"]=="Virginia") {
                                                                   
                                    ?>  
                                    
                                    <option selected="selected"><?php echo $row["STVSTAT_DESC"] ?></option>
                                    
                                    <?php 
                                                }
                                    
                                    
                                            else {
                                                
                                    ?>            
                                    
                                     <option><?php echo $row["STVSTAT_DESC"] ?></option>
                                    <?php   
                                                }
                                        
                                        }
                                        
                                    ?>    
                                    
                                    
                                </select>
                        <!--    <div class="mt-4">
                                <button type="button" id="nexthide" class="btn btn-primary btn-sm col-sm-4" >Next</button>
                            </div>  -->          
                            </div>
                        </form>
                    </div>
                <div class="col-sm-2"></div>
                </div>
                               
                </div>
                        
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-3 backmrg">
                                  <!--  <div class="carousel-control-prev backbtn ">
                                        <span class="carousel-control-prev-icon"></span>
                                    </div> -->
                                </div>
                                <div class="col-sm-6">
                                    <div class="pb-3 required" style="font-family: Ledger; font-size: 1.5em; font-weight: bold; color:white;" ><label>Search Your School Name</label></div>
                                </div>
                                <div class="col-sm-3"></div>
                            </div>
                        </div>
                        <form action="second.php" method="post" autocomplete="off">
                        <div class="container">
                        
                            <div class="form-group">
                                
                                <div class="row">
                                    <div class="col-sm-3">
                                    </div>       
                                <div class="col-sm-6 input-group">
                                    <input style="background: rgba(255, 255, 255, 1); color: rgba(0, 0, 0, 1); font-family: Ledger; font-weight: bold" type="text" class="form-control form-control-sm marg" name="school_state" placeholder="School Name" autocomplete="off" required><!--<span class="rounded-circle fun marg"></span>-->
                               <!--  --> 
                                 <div class="input-group-btn">
                                    <button style="width:130%"  class="btn btn-primary btn-sm srchbtn" name="landing_submit" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                                    
                                
                                <div style="color:black; position:absolute; width: 89.9%; margin-top: 30px; max-height:85px; overflow: auto; background: rgba(255, 255, 255, 1)" class="table-responsive tablehide">    
                                <table style="background: rgba(255, 255, 255, 1); text-align: left;" class="table table-sm table-hover">
                                    <tbody style="" id="tableajax">
                                       
                                    </tbody>
                                </table>    
                                </div>               
                                </div>
                                <div class="col-sm-3"></div>    
                                </div>

                               <!-- <div class="row searchhide">
                                    <div class="col-sm-2"></div>    
                                    <div class="col-sm-8 mt-4">    
                                        <button type="button" class="btn btn-primary btn-sm col-sm-4" >Search</button>
                                    </div>
                                    <div class="col-sm-2"></div>    
                                </div> -->   
                                
                                 <div class="advs float-right pt-4">
                                    Advanced Search
                                </div>
                                    <div class="clearfix">
                                    </div> 
                                
                           </div>                                         
                        
                            </div>
                    <div class="container-fluid adddhide">
                    
                    
                    <div class="row mb-3 form-group mt-5">
                     <!--   <div class="col-sm-4">
                            <label for="keywordfield" class="col-form-label advanceopt">Keyword:</label>
                        
                        <div class="advmarg"> 
                            <input id="keywordfield" style="background: rgba(255, 255, 255, 1); color: rgba(0, 0, 0, 1); font-family: Salsa; font-weight: bold" type="text" class="form-control form-control-sm" placeholder="Program or Title"><!--<span class="rounded-circle fun marg"></span>-->
    
                     <!--   </div>
                        </div> -->
                         <div class="col-sm-1"></div>
                        <div class="col-sm-4 mb-3">
                            
                         <button type="button" class="btn btn-light  btn-sm col-sm-12 subjectclick" style="font-family: Ledger; font-weight: bold">
                        <span style="float:left">Subject</span>
                        <span style="float:right">&#8744;</span>     
                                    </button>
                        <div style="clear: both;"></div>
                            <div class="subjecthide">
                        <div style="margin-top: 1px;"> 
                            <input id="subjectfield" style="background: rgba(255, 255, 255, 1); color: rgba(0, 0, 0, 1); font-family: Salsa; font-weight: bold" type="text" class="form-control form-control-sm search_subj" placeholder="Search Name.."><!--<span class="rounded-circle fun marg"></span>-->
                            </div>
                            
                                 <div style="height:70px; overflow: auto; background-color: white; border: 1px solid #DCDCDC; font-family: Ledger; font-size: 0.8em; font-weight:bold">
                        <div class="w3-container subjnamedropdown">
                            
                              
                               
                        </div>  
                                        
                    </div> 
                            
                        </div>     
                            
                        </div>
                       
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4 ">
                        
                            
                        <button type="button" class="btn btn-light  btn-sm col-sm-12 courseclick" style="font-family: Ledger; font-weight: bold" >
                            <span style="float:left">Course</span>
                            <span style="float:right">&#8744;</span>     
                        </button>
                        <div style="clear: both;"></div>
                           <div class="coursehide">  
                        <div style="margin-top: 1px;"> 
                            <input id="coursefield" style="background: rgba(255, 255, 255, 1); color: rgba(0, 0, 0, 1); font-family: Salsa; font-weight: bold" type="text" class="form-control form-control-sm subjsearch" placeholder="Search Number.."><!--<span class="rounded-circle fun marg"></span>-->
                         </div>
                       
                                 <div class="" style="height:70px; overflow: auto; background-color: white; border: 1px solid #DCDCDC; font-family: Ledger; font-size: 0.8em; font-weight:bold">
                        <div class="w3-container subjdropdown">
                            
                              
                               
                            </div>  
                                        
                            </div> 
                                
                            </div>        
                        </div>
                         <div class="col-sm-1"></div>
                     </div>
                   
                    
                    </div>
                             </form>
                   <!-- <div class="container-fluid search2hide mb-4">
                    <div class="row ">
                                    <div class="col-sm-8"></div>    
                                <div class="col-sm-4">    
                                <button type="button" class="btn btn-primary btn-sm col-sm-12" >Search</button>
                                </div>
                                        
                    </div>   
                    </div>-->
                    
                    </div>
                </div>   
            </div>
            <div class="col-2">
            </div>    
        </div>    
      </div>      
     
      <script>
          
          $(document).ready(function(){
           
            $('.selectstate').change(function(){
                 
                $(".marg").val("");
                $(".tablehide").hide();
                 
             }); 
              
               
              
          });
       
      </script>
            
  </body>
   
</html>