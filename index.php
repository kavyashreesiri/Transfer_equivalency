<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css?ver=3">   <!--External style sheet -->  
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> <!-- W3 schools -->  
    
      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> 
   <script src="js/index.js?v=1" type="text/javascript"></script> <!-- External JS file -->
  </head>
  <body>
    
      <!-- Navabar Implementation for large screens-->
      
    <nav style="background-color: #00223d;" class="navbar navbar-expand-sm navbar-dark">
        <a class="navbar-brand sty1" href="index.php">
            <img src="logo/Capture.PNG" alt="Logo" style="width:120px;">
        </a>
    </nav>
      <!-- Navbar ends -->
       
     <!-- Implementing the code for the panel--> 
      <div class="parallax w3-container">
          <div class="row h-25">
          </div>      
          <div class="row">
            <div class="col-2">
            </div>
            <div id="outerbox" style="background: rgba(20, 20, 20, 0.7);" class="col-8 w3-center">
                
            <div class="innerbox">
                    <div style="" class="w3-panel paneleffect">
                        
                    <!-- Container for Choose your state -->    
                        
                        <div class="container">
                <div class="fontbanner pt-1 pb-3" style="color: white; font-size: 40px; font-weight: 600;">Course By Course Equivalency</div>            
                <div class="pb-3 pt-4 frontformfont" style="font-weight: bold;">Choose Your State</div>
                
                <div class="row mb-2">
                <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <form action="">
                            <div class="form-group">
                                <select style="color:black; font-weight:400" class="form-control form-control-sm col-sm-12 selectstate selectchange" id="sel1" name="sellist1">
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
                 <div class="col-sm-3"></div>
                </div>
                               
                </div>
                <!-- Choose your state ends -->  
                        
                        
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-3 backmrg">
                                  <!--  <div class="carousel-control-prev backbtn ">
                                        <span class="carousel-control-prev-icon"></span>
                                    </div> -->
                                </div>
                                <div class="col-sm-6">
                                    <div class="required frontformfont pt-1" style="font-weight: bold; margin-bottom: -4px;" ><label>Search Your School Name</label></div><span style="color:red; display:none" class="validate_search"></span>
                                </div>
                                <div class="col-sm-3"></div>
                            </div>
                        </div>
                    
                        <!-- Form for School dropdown and Advanced search -->
                        
                        <form  class="mainform" action="courses.php" method="POST" autocomplete="off">
                        <div  class="container mt-3">
                        
                            <div  class="form-group">
                                
                                <div class="row">
                                    <div class="col-sm-3">
                                    </div>  
                                    
                                <!-- Div for School Search dropdown -->    
                                <div  class="col-sm-6 input-group mb-3 breakw">
                                      
                                   
                                    <input class="hideinput" style="display:none" name="school_state" />
                                    <input class="hideinput1" style="display:none" name="state_state" />
                                    <input class="hideinput2" style="display:none" name="sbgi_value" />
                                    
                                         <button id="subbtn" type="button"  value="School Name" class="btn btn-light btn-sm col-sm-12 schoolclick marg">
                                                    <span class="buttontext" style="float:left">School  Name</span>
                                                    <span style="float:right; font-size: 0.7em; margin-right: -3px; padding-top: 2px;">&#9660;</span>     
                                         </button>
                                        
                                                    <div style="clear: both;"></div>
                                    <div class="schoolhide container" style="background-color: white; margin-top:0.6px; display:none">
                                       <div class="row p-2"> 
                                            <input id="" style="background: rgba(255, 255, 255, 1); color: rgba(0, 0, 0, 1); font-weight: bold" type="text" class="form-control form-control-sm col-sm-12 mb-2 schoolfiltersearch " placeholder="Search School.."><!--<span class="rounded-circle fun marg"></span>-->
                                            

                                                 <div class="col-sm-12" style="height:110px; overflow: auto; background-color: white; border: 1px solid #DCDCDC; font-size: 0.8em;">
                                                    

                                                        <ul class="float-left schoolnamedropdown" style="list-style-type:none; margin-left: -30px">
        <?php                            
                                                            
                                                    require_once 'database.php';
                                                    $retreive1="SELECT STVSTAT_DESC, STVSBGI_DESC FROM V_WX_SCHOOL_LIST where STVSTAT_DESC='Virginia' ORDER BY STVSBGI_DESC ASC";
                                                    $statement_id1 = oci_parse($conn,$retreive1);
                                                    
                                                    
                                            //echo $statement_id;
                                                    oci_execute($statement_id1);
                                                    
                                               
                                            while($row_school =oci_fetch_array($statement_id1, OCI_BOTH))
                                            {
                                               
                                                                               
                                                
        ?>                                            
                                               
                                          <li class="row pt-2 lihover"><?php echo $row_school['STVSBGI_DESC']; ?></li>  

        <?php
       
                                            

                                          
                                                }
                                                          
        ?>                                                </ul>  

                                                     

                                        </div> 
                                        
                                    </div>

                                     </div>     
                                                                
                                </div>
                                    
                                <!-- School dropdown ends -->    
                                    
                                 <!-- Search Button -->   
                                <div class="col-sm-3 resizesr">
                                    <div class="input-group-btn" >
                                    <button  class="btn btn-primary btn-sm srchbtn col-sm-12" name="landing_submit" type="button">Search</button>
                                </div>
                                  </div>
                                    
                                <!-- Search Button ends -->     
                                </div>
                                
                                <!-- Div for Advanced Search toggle button-->  
                                
                                 <div class="advs float-right pt-4">
                                    Advanced Search
                                 </div>
                                
                                <div class="clearfix">
                                </div> 
                                
                                <!-- Div ends -->
                                
                           </div>                                         
                        
                            </div>
                            
                    <!-- Div for Advanced search -->        
                    <div class="container-fluid adddhide">
                                    
                            <div class="row mb-3 form-group mt-5">
                             
                                 <div class="col-sm-1"></div>
                                
                            <!-- Div for Subject Select -->    
                                <div class="col-sm-4 mb-3">

                                 <button type="button" class="btn btn-light  btn-sm col-sm-12 subjectclick">
                                <span style="float:left">Subject</span>
                                <span style="float:right">&#8744;</span>     
                                            </button>
                                <div style="clear: both;"></div>
                                    <div class="subjecthide">
                                <div style="margin-top: 1px;"> 
                                    <input id="subjectfield" style="background: rgba(255, 255, 255, 1); color: rgba(0, 0, 0, 1);" type="text" class="form-control form-control-sm search_subj" placeholder="Search Name.." autocomplete="off"><!--<span class="rounded-circle fun marg"></span>-->
                                    </div>

                                         <div style="height:70px; overflow: auto; background-color: white; border: 1px solid #DCDCDC; font-size: 0.8em;">
                                             
                                            <div id="loader_adv"></div>
                                             
                                <div class="w3-container subjnamedropdown" style="display: none;">



                                </div>  

                            </div> 

                                </div>     

                                </div>
                            <!-- Div for subject select ends-->    
                                

                                <div class="col-sm-2"></div>
                                <div class="col-sm-4 ">


                                <button type="button" class="btn btn-light  btn-sm col-sm-12 courseclick" >
                                    <span style="float:left">Course</span>
                                    <span style="float:right">&#8744;</span>     
                                </button>
                                <div style="clear: both;"></div>
                                   <div class="coursehide">  
                                <div style="margin-top: 1px;"> 
                                    <input id="coursefield" style="background: rgba(255, 255, 255, 1); color: rgba(0, 0, 0, 1);" type="text" class="form-control form-control-sm subjsearch" placeholder="Search Number.." autocomplete="off"><!--<span class="rounded-circle fun marg"></span>-->
                                 </div>

                                         <div class="" style="height:70px; overflow: auto; background-color: white; border: 1px solid #DCDCDC; font-size: 0.8em;">
                                             
                                    <div id="loader_adv1"></div>
                                             
                                <div class="w3-container subjdropdown" style="display: none;">



                                    </div>  

                                    </div> 

                                    </div>        
                                </div>
                                 <div class="col-sm-1"></div>
                             </div>
                   
                    
                    </div>
                             </form>
                    </div>
                </div>   
            </div>
            <div class="col-2">
            </div>    
        </div>    
      </div>      
     
     
            
  </body>
   
</html>
