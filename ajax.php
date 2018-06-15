<?php

   
    
                                            if(isset($_POST["sellist1"])) {
                                                    require_once 'database.php';
                                                    $name_state = test_input($_POST["sellist1"]);
                                                    $school_state = test_input($_POST["school_state"]);
                                                    $retreive1="SELECT STVSTAT_DESC, STVSBGI_DESC FROM V_WX_SCHOOL_LIST where STVSTAT_DESC='".$name_state."' and REGEXP_LIKE (STVSBGI_DESC , '$school_state', 'i')";
                                                    $statement_id1 = oci_parse($conn,$retreive1);
                                                    
                                                    
                                            //echo $statement_id;
                                                    oci_execute($statement_id1);
                                                    
                                               
                                            while($row_school =oci_fetch_array($statement_id1, OCI_ASSOC+OCI_RETURN_NULLS))
                                            {
                                               
                                               
       
       
                                            ?>
       
       
                                               
                                          <tr>
                                            <td style="cursor: pointer;"><?php echo $row_school['STVSBGI_DESC']; ?></td>
                                          </tr>

       
                                            <?php
       
       

                                          
                                                }
                                                

                                            }



                                        if(isset($_POST['school_info']))

                                        {
                                            
                                           require_once 'database.php'; 
                                           // $subj_infostate = test_input($_POST["subj_info"]);
                                            $subj_state = $_POST["school_info"];
                                            $retrieve2="SELECT STVSBGI_CODE FROM V_WX_SCHOOL_LIST where STVSBGI_DESC='".$subj_state."'";
                                            $statement_id2 = oci_parse($conn,$retrieve2);
                                            oci_execute($statement_id2);
                                            $code_sbgi = oci_fetch_array($statement_id2, OCI_BOTH+OCI_RETURN_NULLS);
                                            $code_sbgiop = $code_sbgi['STVSBGI_CODE'];
                                            
                                        
                                            
                                            
                                            $retrieve3="SELECT DISTINCT CRSE_NUMB_FROM_SCHOOL FROM V_WX_EQUIVALENCY_LIST where SBGI_CODE='".$code_sbgiop."' ORDER BY CRSE_NUMB_FROM_SCHOOL ASC";
                                            $statement_id3 = oci_parse($conn,$retrieve3);
                                            oci_execute($statement_id3);
                                            
                                            
                                            
                                            while($result_name = oci_fetch_array($statement_id3, OCI_BOTH+OCI_RETURN_NULLS))
                                                
                                            {
                                                
?>                                                
                                                
                                        <div class="form-check mb-1 w3-left-align col-sm-12">
                                            <label class="form-check-label" for="check1">
                                                <input type="checkbox" class="form-check-input" id="" name="course_number_name[]" value="<?php echo $result_name['CRSE_NUMB_FROM_SCHOOL']; ?>"><?php echo $result_name['CRSE_NUMB_FROM_SCHOOL']; ?>
                                            </label>
                                        </div>        

                                        

<?php
                                    }
                                       
                                            
                                            
                                        }
                                            
                                             if(isset($_POST['school_info1']))

                                        {
                                            
                                           require_once 'database.php'; 
                                           // $subj_infostate = test_input($_POST["subj_info"]);
                                            $subj_state = $_POST["school_info1"];
                                            $retrieve2="SELECT STVSBGI_CODE FROM V_WX_SCHOOL_LIST where STVSBGI_DESC='".$subj_state."'";
                                            $statement_id2 = oci_parse($conn,$retrieve2);
                                            oci_execute($statement_id2);
                                            $code_sbgi = oci_fetch_array($statement_id2, OCI_BOTH+OCI_RETURN_NULLS);
                                            $code_sbgiop = $code_sbgi['STVSBGI_CODE'];
                                            
                                        
                                            
                                            
                                            $retrieve3="SELECT DISTINCT SUBJ_CODE_FROM_SCHOOL FROM V_WX_EQUIVALENCY_LIST where SBGI_CODE='".$code_sbgiop."' ORDER BY SUBJ_CODE_FROM_SCHOOL ASC";
                                            $statement_id3 = oci_parse($conn,$retrieve3);
                                            oci_execute($statement_id3);
                                            
                                            
                                            
                                            while($result_name = oci_fetch_array($statement_id3, OCI_BOTH+OCI_RETURN_NULLS))
                                                
                                            {
                                                
?>                                                
                                                
                                        <div class="form-check mb-1 w3-left-align col-sm-12">
                                            <label class="form-check-label" for="check1">
                                                <input type="checkbox" class="form-check-input" id="" name="subject_number_name[]" value="<?php echo $result_name['SUBJ_CODE_FROM_SCHOOL']; ?>"><?php echo $result_name['SUBJ_CODE_FROM_SCHOOL']; ?>
                                            </label>
                                        </div>        

                                        

<?php
                                    }
                                       
                                            
                                        
                                        }





                                                function test_input($data) {
                                                  $data = trim($data);
                                                  $data = stripslashes($data);
                                                  $data = htmlspecialchars($data);
                                                  return $data;
                                                }

                       ?>  