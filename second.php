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
   <!--<script src="test.js" type="text/javascript"></script> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css"><!-- jquery datatables css -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script><!-- jquery datatables js -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.css"/>
 
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>
      <style>
        td {
          
          font-family: 'Calibri';  
          font-weight: bold;
          
          }
          
          
          
          
      </style>
      
    </head>

  <body>
    
    <nav style="background-color: #003057;" class="navbar navbar-expand-sm navbar-dark">
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
       
      <div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left shadow-lg" style="width:300px; background-color: #F1F1F1; font-family: Calibri" id="mySidebar">
          <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
            <a href="#" class="w3-bar-item w3-button pt-2" style="height:50px; font-size: 1.6em; background-color: #616161; color:white; text-decoration: none" >Filters</a>
                <button class="w3-button w3-block w3-left-align mt-5" style="font-family: Calibri; font-weight:bold; font-size:1.2em; text-decoration: none" onclick="myAccFunc()">
                    Subject <i class="fa fa-caret-down"></i>
                </button>
            <div id="demoAcc" class="w3-show w3-white w3-card">
               <div class="w3-container" style="background-color: #F1F1F1;">
                    <form>
                        <div class="row form-group">
                            <input  type="text" class="form-control" placeholder="Search Subject..">
                        </div>
                    
                    <div class="pl-1 row" style="max-height:80px; overflow: auto; background-color: white; border: 1px solid #DCDCDC">
                        <div class="p-1">
                            <div class="form-check mb-1">
                                            <label class="form-check-label" for="check1">
                                                <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something">Accounting: ACCT
                                            </label>
                                        </div>
                                <div class="form-check mb-1">
                                  <label class="form-check-label" for="check2">
                                        <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something">Air Science: AIRS
                                  </label>
                                </div>
                                <div class="form-check mb-1">
                                    <label class="form-check-label" for="check2">
                                        <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something">Anthropology: ANTR
                                    </label>
                                </div>
                                <div class="form-check mb-1">
                                    <label class="form-check-label" for="check2">
                                        <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something">Art: ART
                                    </label>
                                </div>
                                <div class="form-check mb-1">
                                    <label class="form-check-label" for="check2">
                                        <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something">Asian Studies: ASIA
                                    </label>
                               </div>
                        </div>    
                    </div>          
                    </form>
                   </div>
            </div>
          
          
           <button class="w3-button w3-block w3-left-align mt-4" style="font-family: Calibri; font-weight:bold; font-size:1.2em; text-decoration: none" onclick="myAccFunc2()">
            Course Number <i class="fa fa-caret-down"></i>
            </button>
            <div id="demoAcc2" class="w3-show w3-white">
                <div class="w3-container" style="background-color: #F1F1F1;">
                    <form>
                    <div class="row form-group">
                        <input type="text" class="form-control" placeholder="Search Course Number..">
                    </div>
                    </form>      
                </div>    
                  
            </div>
          
          
              <button class="w3-button w3-block w3-left-align mt-3" style="font-family: Calibri; font-weight:bold; font-size:1.2em; text-decoration: none" onclick="myAccFunc1()">
                    School Select <i class="fa fa-caret-down"></i>
                </button>
            <div id="demoAcc1" class="w3-show w3-white w3-card">
               <div class="w3-container" style="background-color: #F1F1F1;">
                    <form>
                        <div class="row form-group">
                            <input  type="text" class="form-control" placeholder="Search Schools..">
                        </div>
                    
                    <div class="pl-1 row" style="max-height:80px; overflow: auto; background-color: white; border: 1px solid #DCDCDC">
                        <div class="p-1">
                            <div class="form-check mb-1">
                                            <label class="form-check-label" for="check1">
                                                <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something">SOUTHWST TENNESSEE CMTY COLL, TN
                                            </label>
                                        </div>
                                <div class="form-check mb-1">
                                  <label class="form-check-label" for="check2">
                                        <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something">SEWARD COUNTY CMTY COLLEGE, KS
                                  </label>
                                </div>
                                <div class="form-check mb-1">
                                    <label class="form-check-label" for="check2">
                                        <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something">NUNEZ CMTY COLLEGE, LA
                                    </label>
                                </div>
                                <div class="form-check mb-1">
                                    <label class="form-check-label" for="check2">
                                        <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something">TROY UNIVERSITY DOTHAN, AL
                                    </label>
                                </div>
                                <div class="form-check mb-1">
                                    <label class="form-check-label" for="check2">
                                        <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something">TEXAS ST TECH COLL
                                    </label>
                               </div>
                        </div>    
                    </div>          
                    </form>
                   </div>
            </div>
          
          
          
         
          
         
          
         
        </div>

        <div class="w3-main" style="margin-left:300px">
        <div style="background-color: #DCDCDC; box-shadow: 0 0 30px #003057"  class="w3-teal">
          <button class="w3-button w3-teal w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
          <div style="background-color: #DCDCDC" class="w3-container">
              <div class="row">
            <div class="col-sm-12">
                <h1 class="w3-center" style="font-size: 2.8vw; font-family: Calibri; color: #003057 ">Transfer Equivalency Self-Service</h1>            
            </div>
              
              </div>
          </div>
        </div>

        <div class="w3-container">
           
            <div class="w3-right-align pt-2">
                
                  <button style="background-color:#003057; color:white" class="w3-button w3-border w3-small" data-toggle="modal" data-target="#myModal1">Favorites<span class="badge badge-light ml-1 bagdecount">0</span></button>
                  <button style="background-color:#003057; color:white" class="w3-button w3-border w3-small" data-toggle="modal" data-target="#myModal2">Email My Favorites</button>
                
            </div>
         <!--   <div class="w3-right-align pt-1">
               <button style="background-color:#003057; color:white" class="w3-button w3-border w3-small" id="displayid" data-toggle="modal" data-target="#myModal">Email</button>
                
            
            </div> -->
            
            </div>
           
            
            
            
          <!--  <div class="modal" id="myModal" style="font-weight:bold; font-family: Calibri">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content"> -->
      
        <!-- Modal Header -->
     <!--   <div class="modal-header">
          <h4 class="modal-title">Email All Courses List</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div> -->
        
        <!-- Modal body -->
    <!--    <div class="modal-body">
          
            <div class="container">
                  <form action="">
                    <div class="form-group">
                      <label for="usr">First Name:</label>
                      <input type="text" class="form-control form-control-sm" id="usr" name="firstname">
                    </div>
                    <div class="form-group">
                      <label for="last">Last Name:</label>
                      <input type="text" class="form-control form-control-sm" id="last" name="lastname">
                    </div>
                      <div class="form-group">
                      <label for="last">Email Id:</label>
                      <input type="email" class="form-control form-control-sm" id="emailid" name="address">
                    </div>
                    <button type="" class="btn btn-sm" style="background-color: #003057; color:white">Send</button>
                  </form>
                </div>    
        </div> -->
        
        <!-- Modal footer -->
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div> -->
  
            
             <div class="modal" id="myModal2" style="font-weight:bold; font-family: Calibri">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title">Email My Favorites List</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
            <div class="container">
                  <form action="">
                    <div class="form-group">
                      <label for="usr">First Name:</label>
                      <input type="text" class="form-control form-control-sm" id="usr" name="firstname">
                    </div>
                    <div class="form-group">
                      <label for="last">Last Name:</label>
                      <input type="text" class="form-control form-control-sm" id="last" name="lastname">
                    </div>
                      <div class="form-group">
                      <label for="last">Email Id:</label>
                      <input type="email" class="form-control form-control-sm" id="emailid" name="address">
                    </div>
                    <button type="" class="btn btn-sm" style="background-color: #003057; color:white">Send</button>
                  </form>
                </div>    
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
            
            
            <div class="modal" id="myModal1" style="font-weight:bold; font-family: Calibri">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title">Favorites List</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
            <div class="container">
                   <div class="row mx-1">
                <div class="table-responsive">
                <table  id="example1" class="table table-borderless row-border table-hover" style="border-bottom: 1px solid #DBDBDB; ">
        <thead style="background-color: #003057; color:white; font-family: Calibri;  font-weight: bold; font-size: 1.2em">
            <tr>
                <th>Course #</th>
                <th>Course Name</th>
                <th>Credits</th>
                <th>Equivalent Course #</th>
                <th>Equivalent Course Name</th>
                
            </tr>
        </thead>
        <tbody >
            <tr>
                
                <td>ARTH 101</td>
                <td>INT ANTH ARCH & PHYS</td>
                <td>3</td>
                <td>HB 1REQ</td>
                <td>HUM BEHAV (LOWER-DIV REQ)</td>
                
            </tr>
            <tr>
                
                <td>ARTH 199F</td>
                <td>NORTHERN RENAISSANCE ART</td>
                <td>3</td>
                <td>ARTH 1ELE</td>
                <td>ELECTIVE</td>
                
            </tr>
           
         
            
        </tbody>
                </table>  
            </div>
            </div>
                </div>    
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
            <div style="font-weight:bold; margin-top: -2px" class="row mb-4">
                <div class="col-sm-6 w3-center"><span>From</span><br>
                    <span style="font-size: 1.6em; font-family: Calibri; ">UNIV MARYLAND UNIV COLLEGE</span> 
                </div>
                <div class="col-sm-6 w3-center"><span>To</span><br>
                    <span style="font-size: 1.6em; font-family: Calibri; ">OLD DOMINION UNIVERSITY</span> 
                </div>  
            </div>
            
           
            <div class="row mx-2">
                <div class="table-responsive">
                <table  id="example" class="table table-borderless row-border table-hover" style="border-bottom: 1px solid #DBDBDB; ">
        <thead style="background-color: #003057; color:white; font-family: Calibri;  font-weight: bold; font-size: 1.2em">
            
            <tr>    
                <th></th>
                <th>Course #</th>
                <th>Course Name</th>
                <th>Credits</th>
                <th>Equivalent Course #</th>
                <th>Equivalent Course Name</th>
                <th>Equivalent Credits</th>
                
            </tr>
        </thead>
        <tbody >
           
                <?php
                require_once 'database.php';
                
                                         if(isset($_POST['landing_submit'])) {

                                                $school_desc = ($_POST['school_state']);
                                              //  $subj_desc = $_POST['subject_number_name'];
                                              //  $course_desc = $_POST['course_number_name'];
                                             
                                            
                                            $landing_retrieve1="SELECT STVSBGI_CODE FROM V_WX_SCHOOL_LIST where STVSBGI_DESC='".$school_desc."'";
                                            $landing_statement_id2 = oci_parse($conn,$landing_retrieve1);
                                            oci_execute($landing_statement_id2);
                                            $landing_code_sbgi = oci_fetch_array($landing_statement_id2, OCI_BOTH);
                                            $landing_code_sbgiop = $landing_code_sbgi['STVSBGI_CODE'];
                                                                                      
                                            
                                            $landing_retrieve3="SELECT * FROM V_WX_EQUIVALENCY_LIST where SBGI_CODE='".$landing_code_sbgiop."' ORDER BY SUBJ_CODE_FROM_SCHOOL ASC";
                                            $landing_statement_id3 = oci_parse($conn,$landing_retrieve3);
                                            oci_execute($landing_statement_id3);
                                            
                                            
                                            
                                            while($landing_result_name = oci_fetch_array($landing_statement_id3, OCI_BOTH+OCI_RETURN_NULLS))
                                                
                                            {

                                              /*  foreach($subj_desc as $value) {

                                                    echo $value;

                                                }


                                                foreach($course_desc as $value1) {


                                                    echo $value1;

                                                }



                                        }*/
                    ?>
                                                
                                                
                <tr>
                    <td data-toggle="tooltip" data-placement="bottom" title="Add To Favorites"></td>                      
                    <td><?php echo $landing_result_name['SUBJ_CODE_FROM_SCHOOL']; ?><span class="pl-1"><?php echo $landing_result_name['CRSE_NUMB_FROM_SCHOOL']; ?></span></td>
                    <td><?php echo $landing_result_name['CRSE_TITLE_FROM_SCHOOL']; ?></td>
                    <td><?php echo $landing_result_name['SHBTATC_CREDITS_FROM_SCHOOL']; ?></td>
                    <td><?php echo $landing_result_name['SUBJ_CODE_INST_ODU']; ?><span class="pl-1"><?php echo $landing_result_name['CRSE_NUMB_INST_ODU']; ?></span></td>
                    <td><?php echo $landing_result_name['INST_TITLE_ODU']; ?></td>
                    <td><?php echo $landing_result_name['INST_CREDITS_ODU']; ?></td>
            </tr>
          
            <?php
                                                
                                            }
                                                
                                            }
            
            
            
                                             
            ?>                                 
            
            
        </tbody>
                </table>  
            </div>
            </div>
        </div>

    

        <script>
            
            $(document).ready(function() {
    
             $('[data-toggle="tooltip"]').tooltip();  
            
                
      var tabledata = $('#example').DataTable( {
        columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'multi',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],
          
          
    } 
                                              
                                            
               
    //  $('td', this).removeClass('highlight');
                 
               );
                
            
           
               
        //  $(".badgecount").html(tabledata.rows('.select').data().length);  
                
        $('#example1').DataTable(
        
               
    //  $('td', this).removeClass('highlight');
                 
               );   
                
        $(".select-checkbox").on("click", function(){
          // $(this).parent().css({"background-color": "white", "color": "black"});
            
            
       //    $(this).parent().toggleClass("active1");
         //   $(".active1").css({"background-color": "white", "color": "black"});
            
            
         //   $(this).tooltip("");
           
        });  
                
                
                
                tabledata.on( 'click', 'tr', function () {
                    
                    $(this).toggleClass("active1");
          $(".active1").css({"background-color": "white", "color": "black"});
                    $(this).hover("background-color", "#f5f5f5"); 
                });
                
                
                 tabledata.on( 'select', function ( e, dt, type, indexes ) {
                 var count = tabledata.rows( { selected: true } ).count();
                $(".bagdecount").html(count);
                $(".select-checkbox").hover(function() {
                    
                    $(this).tooltip("disable");
                }); 
                     
                //$(".selected").addClass('active1')    
                  

    // do something with the number of selected rows
} );
        
                
                 tabledata.on( 'deselect', function ( e, dt, type, indexes ) {
                 
                var decount = $(".bagdecount").html();
                var decount = decount - 1; 
                $(".bagdecount").html(decount);
                 $(".select-checkbox").hover(function() {
                    
                    $(this).tooltip("enable");
                });         
 
    // do something with the number of selected rows
} );
                
} );
            
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }
        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }
            
        function myAccFunc() {
    var x = document.getElementById("demoAcc");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += "";
    } else { 
        x.className = x.className.replace("w3-show", "w3-hide");
       
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace("", "");
    }
}    
            function myAccFunc1() {
    var x = document.getElementById("demoAcc1");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += "";
    } else { 
        x.className = x.className.replace("w3-show", "w3-hide");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace("", "");
    }
}    
            
        function myAccFunc2() {
    var x = document.getElementById("demoAcc2");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += "";
    } else { 
        x.className = x.className.replace("w3-show", "w3-hide");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace("", "");
    }
}        
            
        </script>


          

            
  </body>
   
</html>