<?php
require_once '../database.php';
if (isset($_POST['cookie_fav'])) {
	$favt_cookie          = $_POST['cookie_fav'];
	$pieces               = explode(" ", $favt_cookie);
	$cookie_retrieve1     = "SELECT STVSBGI_DESC FROM V_WX_SCHOOL_LIST where STVSBGI_CODE='" . $pieces[0] . "'";
	$cookie_statement_id2 = oci_parse($conn, $cookie_retrieve1);
	oci_execute($cookie_statement_id2);
	$cookie_code_sbgi      = oci_fetch_array($cookie_statement_id2, OCI_BOTH);
	$cookie_code_desc      = $cookie_code_sbgi['STVSBGI_DESC'];
	$landing_retrieve3     = "SELECT * FROM V_WX_EQUIVALENCY_LIST where SBGI_CODE='" . $pieces[0] . "' and SUBJ_CODE_FROM_SCHOOL='" . $pieces[1] . "' and CRSE_NUMB_FROM_SCHOOL='" . $pieces[2] . "' and CONNECTOR_COL_ODU='NULL'";
	$landing_statement_id3 = oci_parse($conn, $landing_retrieve3);
	oci_execute($landing_statement_id3);
	while ($landing_result_name = oci_fetch_array($landing_statement_id3, OCI_BOTH + OCI_RETURN_NULLS)) {
?>
		<tr>
			<td><?php
				echo rtrim($cookie_code_desc);
				?>
			</td>                     
			<td id="<?php
				echo $landing_result_name['SBGI_CODE'];
				echo " ";
				echo $landing_result_name['SUBJ_CODE_FROM_SCHOOL'];
				echo " ";
				echo $landing_result_name['CRSE_NUMB_FROM_SCHOOL'];
				echo " ";
				echo $landing_result_name['CRSE_TITLE_FROM_SCHOOL'];
				?>">
				<?php
					echo $landing_result_name['SUBJ_CODE_FROM_SCHOOL'];
				?>
				<span class="pl-1">
				<?php
								echo $landing_result_name['CRSE_NUMB_FROM_SCHOOL'];
?></span></td>
                    <td><?php
								echo $landing_result_name['CRSE_TITLE_FROM_SCHOOL'];
?></td>
                    <td><?php
								echo $landing_result_name['SHBTATC_CREDITS_FROM_SCHOOL'];
?></td>
                    <?php
								$conditionsubj                  = $landing_result_name['SUBJ_CODE_FROM_SCHOOL'];
								$conditionnumber                = $landing_result_name['CRSE_NUMB_FROM_SCHOOL'];
								$landingcondition_retrieve3     = "SELECT * FROM V_WX_EQUIVALENCY_LIST where SBGI_CODE='" . $cookie_code_desc . "' and SUBJ_CODE_FROM_SCHOOL='" . $conditionsubj . "' and CRSE_NUMB_FROM_SCHOOL='" . $conditionnumber . "' and not CONNECTOR_COL_ODU='NULL'";
								$landingcondition_statement_id3 = oci_parse($conn, $landingcondition_retrieve3);
								oci_execute($landingcondition_statement_id3);
								$landingcondition_result_name = oci_fetch_array($landingcondition_statement_id3, OCI_BOTH + OCI_RETURN_NULLS);
								if ($landingcondition_result_name['CONNECTOR_COL_ODU'] == "AND" || $landingcondition_result_name['CONNECTOR_COL_ODU'] == "OR") {
?>        
                       
                    <td><?php
												echo $landing_result_name['SUBJ_CODE_INST_ODU'];
?><span class="pl-1"><?php
												echo $landing_result_name['CRSE_NUMB_INST_ODU'];
?></span><br>
                    <?php
												echo $landingcondition_result_name['CONNECTOR_COL_ODU'];
?><br>
                    <?php
												echo $landingcondition_result_name['SUBJ_CODE_INST_ODU'];
?><span class="pl-1"><?php
												echo $landingcondition_result_name['CRSE_NUMB_INST_ODU'];
?></span>    
                    </td>
                    <td><?php
												echo $landing_result_name['INST_TITLE_ODU'];
?><br>
                    <?php
												echo $landingcondition_result_name['CONNECTOR_COL_ODU'];
?><br>
                    <?php
												echo $landingcondition_result_name['INST_TITLE_ODU'];
?>    
                    </td>
                    <td><?php
												echo $landing_result_name['SHBTATC_CREDITS_FROM_SCHOOL'];
?></td> 
                    
                    
                            
                    <?php
								} else {
?>
                    <td><?php
												echo $landing_result_name['SUBJ_CODE_INST_ODU'];
?><span class="pl-1"><?php
												echo $landing_result_name['CRSE_NUMB_INST_ODU'];
?></span></td>
                    <td><?php
												echo $landing_result_name['INST_TITLE_ODU'];
?></td>
                    <td><?php
												echo $landing_result_name['INST_CREDITS_ODU'];
?></td>
            </tr>
     

          
            <?php
								}
				}
}
if (isset($_POST['state_state'])) {
				$state_descp            = ($_POST['state_state']);
				$landing_retrieve10     = "SELECT STVSBGI_DESC FROM V_WX_SCHOOL_LIST WHERE STVSTAT_DESC='" . $state_descp . "' ORDER BY STVSBGI_DESC ASC";
				$landing_statement_id10 = oci_parse($conn, $landing_retrieve10);
				oci_execute($landing_statement_id10);
				while ($landing_result_name10 = oci_fetch_array($landing_statement_id10, OCI_BOTH + OCI_RETURN_NULLS)) {
?>             
                                             <div class="form-check mb-1">
                                            <label class="form-check-label" for="check1">
                                                <input type="checkbox" class="form-check-input" id="" name="option1" value="<?php
								echo $landing_result_name10['STVSBGI_DESC'];
?>"><?php
								echo $landing_result_name10['STVSBGI_DESC'];
?>
                                            </label>
                             </div>
                        
                        <?php
				}
}
if (isset($_POST['school_state'])) {
?>

 <table id="example" class="table table-borderless row-border table-hover datatable" style="border-bottom: 1px solid #DBDBDB; ">
        <thead style="background-color: #00223d; color:white; font-size: 12.5px; font-weight: 700;">
            
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
         <tbody id="maintable11">


<?php
    

                                                $school_desc = ($_POST['school_state']);
                                                if(isset($_POST['subject_number_name']) and isset($_POST['course_number_name'])) {
                                                    
                                                   $subj_desc = $_POST['subject_number_name']; 
                                                    $usersStr =  implode("','", $subj_desc);
                                                    
                                                    $course_desc = $_POST['course_number_name']; 
                                                    $usersStr1 = implode("','", $course_desc);
                                                    
                                                }
                                             
                                                elseif(isset($_POST['course_number_name'])) {
                                                    
                                                   $course_desc = $_POST['course_number_name']; 
                                                    $usersStr1 = implode("','", $course_desc);
                                                    $usersStr = "";
                                                    
                                                }
                                             
                                                elseif(isset($_POST['subject_number_name'])) {
                                                    
                                                   $subj_desc = $_POST['subject_number_name']; 
                                                    $usersStr = implode("','", $subj_desc);
                                                    $usersStr1 = "";
                                                    
                                                }
                                                
                                                else {
                                                    
                                                }
                                             
                                            
                                            $landing_retrieve1="SELECT STVSBGI_CODE FROM V_WX_SCHOOL_LIST where STVSBGI_DESC='".$school_desc."'";
                                            $landing_statement_id2 = oci_parse($conn,$landing_retrieve1);
                                            oci_execute($landing_statement_id2);
                                            $landing_code_sbgi = oci_fetch_array($landing_statement_id2, OCI_BOTH);
                                            $landing_code_sbgiop = $landing_code_sbgi['STVSBGI_CODE'];
                                            
                                                    if( !empty($subj_desc) && !empty($course_desc) )
                                            {
                                                $landing_retrieve3="SELECT * FROM V_WX_EQUIVALENCY_LIST where SBGI_CODE='".$landing_code_sbgiop."' and CONNECTOR_COL_ODU='NULL' and (SUBJ_CODE_FROM_SCHOOL IN ('".$usersStr."') AND CRSE_NUMB_FROM_SCHOOL IN ('".$usersStr1."')) ORDER BY SUBJ_CODE_FROM_SCHOOL ASC";
                                                        
                                                        
                                                                             $landing_statement_id3 = oci_parse($conn,$landing_retrieve3);
                                            
                                            oci_execute($landing_statement_id3);                                                                            
                                            while($landing_result_name = oci_fetch_array($landing_statement_id3, OCI_BOTH+OCI_RETURN_NULLS))
                                                
                                            {
                                                
                                               
                                               

                    ?>
                                                
                                                
                <tr>
                    <td data-toggle="tooltip" data-placement="bottom" title="Add To Favorites"></td>                      
                    <td id="<?php echo $landing_result_name['SBGI_CODE']; echo" "; echo $landing_result_name['SUBJ_CODE_FROM_SCHOOL']; echo " "; echo $landing_result_name['CRSE_NUMB_FROM_SCHOOL']; echo " "; echo $landing_result_name['CRSE_TITLE_FROM_SCHOOL'];?>"><?php echo $landing_result_name['SUBJ_CODE_FROM_SCHOOL']; ?><span class="pl-1"><?php echo $landing_result_name['CRSE_NUMB_FROM_SCHOOL']; ?></span></td>
                    <td><?php echo $landing_result_name['CRSE_TITLE_FROM_SCHOOL']; ?></td>
                    <td><?php echo $landing_result_name['SHBTATC_CREDITS_FROM_SCHOOL']; ?></td>
                    <?php
                    
                            $conditionsubj = $landing_result_name['SUBJ_CODE_FROM_SCHOOL'];
                            $conditionnumber = $landing_result_name['CRSE_NUMB_FROM_SCHOOL'];
                            $landingcondition_retrieve3="SELECT * FROM V_WX_EQUIVALENCY_LIST where SBGI_CODE='".$landing_code_sbgiop."' and SUBJ_CODE_FROM_SCHOOL='".$conditionsubj."' and CRSE_NUMB_FROM_SCHOOL='".$conditionnumber."' and not CONNECTOR_COL_ODU='NULL'";
                            $landingcondition_statement_id3 = oci_parse($conn,$landingcondition_retrieve3);
                            oci_execute($landingcondition_statement_id3);
                            $landingcondition_result_name = oci_fetch_array($landingcondition_statement_id3, OCI_BOTH+OCI_RETURN_NULLS);
                                                    
                                                
                        if($landingcondition_result_name['CONNECTOR_COL_ODU']=="AND" || $landingcondition_result_name['CONNECTOR_COL_ODU']=="OR")
                            
                        {   
                            
                            
                            
                    ?>        
                       
                    <td><?php echo $landing_result_name['SUBJ_CODE_INST_ODU']; ?><span class="pl-1"><?php echo $landing_result_name['CRSE_NUMB_INST_ODU']; ?></span><br>
                    <?php echo $landingcondition_result_name['CONNECTOR_COL_ODU']; ?><br>
                    <?php echo $landingcondition_result_name['SUBJ_CODE_INST_ODU']; ?><span class="pl-1"><?php echo $landingcondition_result_name['CRSE_NUMB_INST_ODU']; ?></span>    
                    </td>
                    <td><?php echo $landing_result_name['INST_TITLE_ODU']; ?><br>
                    <?php echo $landingcondition_result_name['CONNECTOR_COL_ODU']; ?><br>
                    <?php echo $landingcondition_result_name['INST_TITLE_ODU']; ?>    
                    </td>
                    <td><?php echo $landing_result_name['SHBTATC_CREDITS_FROM_SCHOOL']; ?></td> 
                    
                    
                            
                    <?php 
                            
                            
                            
                        }
                    
                                                else {
                                                
                                                
                    ?>
                    <td><?php echo $landing_result_name['SUBJ_CODE_INST_ODU']; ?><span class="pl-1"><?php echo $landing_result_name['CRSE_NUMB_INST_ODU']; ?></span></td>
                    <td><?php echo $landing_result_name['INST_TITLE_ODU']; ?></td>
                    <td><?php echo $landing_result_name['INST_CREDITS_ODU']; ?></td>
            </tr>
          
            <?php
                                                }
                                                    
                                               
                                                
                                                 
                                                
                                                
                                            }
                                                        
                                                        
                                            }
                                            
                                                    elseif ( !empty($subj_desc) )
                                            
                                                    {
                                                
                                                 $landing_retrieve3="SELECT * FROM V_WX_EQUIVALENCY_LIST where SBGI_CODE='".$landing_code_sbgiop."' and CONNECTOR_COL_ODU='NULL' and SUBJ_CODE_FROM_SCHOOL IN ('".$usersStr."') ORDER BY SUBJ_CODE_FROM_SCHOOL ASC";
                                                        
                                                $landing_statement_id3 = oci_parse($conn,$landing_retrieve3);
                                            
                                            oci_execute($landing_statement_id3);                                                                            
                                            while($landing_result_name = oci_fetch_array($landing_statement_id3, OCI_BOTH+OCI_RETURN_NULLS))
                                                
                                            {
                                                
                                               
                                               

                    ?>
                                                
                                                
                <tr>
                    <td data-toggle="tooltip" data-placement="bottom" title="Add To Favorites"></td>                      
                    <td id="<?php echo $landing_result_name['SBGI_CODE']; echo" "; echo $landing_result_name['SUBJ_CODE_FROM_SCHOOL']; echo " "; echo $landing_result_name['CRSE_NUMB_FROM_SCHOOL']; echo " "; echo $landing_result_name['CRSE_TITLE_FROM_SCHOOL'];?>"><?php echo $landing_result_name['SUBJ_CODE_FROM_SCHOOL']; ?><span class="pl-1"><?php echo $landing_result_name['CRSE_NUMB_FROM_SCHOOL']; ?></span></td>
                    <td><?php echo $landing_result_name['CRSE_TITLE_FROM_SCHOOL']; ?></td>
                    <td><?php echo $landing_result_name['SHBTATC_CREDITS_FROM_SCHOOL']; ?></td>
                    <?php
                    
                            $conditionsubj = $landing_result_name['SUBJ_CODE_FROM_SCHOOL'];
                            $conditionnumber = $landing_result_name['CRSE_NUMB_FROM_SCHOOL'];
                            $landingcondition_retrieve3="SELECT * FROM V_WX_EQUIVALENCY_LIST where SBGI_CODE='".$landing_code_sbgiop."' and SUBJ_CODE_FROM_SCHOOL='".$conditionsubj."' and CRSE_NUMB_FROM_SCHOOL='".$conditionnumber."' and not CONNECTOR_COL_ODU='NULL'";
                            $landingcondition_statement_id3 = oci_parse($conn,$landingcondition_retrieve3);
                            oci_execute($landingcondition_statement_id3);
                            $landingcondition_result_name = oci_fetch_array($landingcondition_statement_id3, OCI_BOTH+OCI_RETURN_NULLS);
                                                    
                                                
                        if($landingcondition_result_name['CONNECTOR_COL_ODU']=="AND" || $landingcondition_result_name['CONNECTOR_COL_ODU']=="OR")
                            
                        {   
                            
                            
                            
                    ?>        
                       
                    <td><?php echo $landing_result_name['SUBJ_CODE_INST_ODU']; ?><span class="pl-1"><?php echo $landing_result_name['CRSE_NUMB_INST_ODU']; ?></span><br>
                    <?php echo $landingcondition_result_name['CONNECTOR_COL_ODU']; ?><br>
                    <?php echo $landingcondition_result_name['SUBJ_CODE_INST_ODU']; ?><span class="pl-1"><?php echo $landingcondition_result_name['CRSE_NUMB_INST_ODU']; ?></span>    
                    </td>
                    <td><?php echo $landing_result_name['INST_TITLE_ODU']; ?><br>
                    <?php echo $landingcondition_result_name['CONNECTOR_COL_ODU']; ?><br>
                    <?php echo $landingcondition_result_name['INST_TITLE_ODU']; ?>    
                    </td>
                    <td><?php echo $landing_result_name['SHBTATC_CREDITS_FROM_SCHOOL']; ?></td> 
                    
                    
                            
                    <?php 
                            
                            
                            
                        }
                    
                                                else {
                                                
                                                
                    ?>
                    <td><?php echo $landing_result_name['SUBJ_CODE_INST_ODU']; ?><span class="pl-1"><?php echo $landing_result_name['CRSE_NUMB_INST_ODU']; ?></span></td>
                    <td><?php echo $landing_result_name['INST_TITLE_ODU']; ?></td>
                    <td><?php echo $landing_result_name['INST_CREDITS_ODU']; ?></td>
            </tr>
          
            <?php
                                                }
                                                    
                                               
                                                
                                                 
                                                
                                                
                                            }
                                                        
                                            }
                                            
                                                    elseif ( !empty($course_desc) )
                                                        
                                            {
                                                    
                                                $landing_retrieve3="SELECT * FROM V_WX_EQUIVALENCY_LIST where SBGI_CODE='".$landing_code_sbgiop."' and CONNECTOR_COL_ODU='NULL' and CRSE_NUMB_FROM_SCHOOL IN ('".$usersStr1."') ORDER BY SUBJ_CODE_FROM_SCHOOL ASC";
                                                        
                                                                             $landing_statement_id3 = oci_parse($conn,$landing_retrieve3);
                                            
                                            oci_execute($landing_statement_id3);                                                                            
                                            while($landing_result_name = oci_fetch_array($landing_statement_id3, OCI_BOTH+OCI_RETURN_NULLS))
                                                
                                            {
                                                
                                               
                                               

                    ?>
                                                
                                                
                <tr>
                    <td data-toggle="tooltip" data-placement="bottom" title="Add To Favorites"></td>                      
                    <td id="<?php echo $landing_result_name['SBGI_CODE']; echo" "; echo $landing_result_name['SUBJ_CODE_FROM_SCHOOL']; echo " "; echo $landing_result_name['CRSE_NUMB_FROM_SCHOOL']; echo " "; echo $landing_result_name['CRSE_TITLE_FROM_SCHOOL'];?>"><?php echo $landing_result_name['SUBJ_CODE_FROM_SCHOOL']; ?><span class="pl-1"><?php echo $landing_result_name['CRSE_NUMB_FROM_SCHOOL']; ?></span></td>
                    <td><?php echo $landing_result_name['CRSE_TITLE_FROM_SCHOOL']; ?></td>
                    <td><?php echo $landing_result_name['SHBTATC_CREDITS_FROM_SCHOOL']; ?></td>
                    <?php
                    
                            $conditionsubj = $landing_result_name['SUBJ_CODE_FROM_SCHOOL'];
                            $conditionnumber = $landing_result_name['CRSE_NUMB_FROM_SCHOOL'];
                            $landingcondition_retrieve3="SELECT * FROM V_WX_EQUIVALENCY_LIST where SBGI_CODE='".$landing_code_sbgiop."' and SUBJ_CODE_FROM_SCHOOL='".$conditionsubj."' and CRSE_NUMB_FROM_SCHOOL='".$conditionnumber."' and not CONNECTOR_COL_ODU='NULL'";
                            $landingcondition_statement_id3 = oci_parse($conn,$landingcondition_retrieve3);
                            oci_execute($landingcondition_statement_id3);
                            $landingcondition_result_name = oci_fetch_array($landingcondition_statement_id3, OCI_BOTH+OCI_RETURN_NULLS);
                                                    
                                                
                        if($landingcondition_result_name['CONNECTOR_COL_ODU']=="AND" || $landingcondition_result_name['CONNECTOR_COL_ODU']=="OR")
                            
                        {   
                            
                            
                            
                    ?>        
                       
                    <td><?php echo $landing_result_name['SUBJ_CODE_INST_ODU']; ?><span class="pl-1"><?php echo $landing_result_name['CRSE_NUMB_INST_ODU']; ?></span><br>
                    <?php echo $landingcondition_result_name['CONNECTOR_COL_ODU']; ?><br>
                    <?php echo $landingcondition_result_name['SUBJ_CODE_INST_ODU']; ?><span class="pl-1"><?php echo $landingcondition_result_name['CRSE_NUMB_INST_ODU']; ?></span>    
                    </td>
                    <td><?php echo $landing_result_name['INST_TITLE_ODU']; ?><br>
                    <?php echo $landingcondition_result_name['CONNECTOR_COL_ODU']; ?><br>
                    <?php echo $landingcondition_result_name['INST_TITLE_ODU']; ?>    
                    </td>
                    <td><?php echo $landing_result_name['SHBTATC_CREDITS_FROM_SCHOOL']; ?></td> 
                    
                    
                            
                    <?php 
                            
                            
                            
                        }
                    
                                                else {
                                                
                                                
                    ?>
                    <td><?php echo $landing_result_name['SUBJ_CODE_INST_ODU']; ?><span class="pl-1"><?php echo $landing_result_name['CRSE_NUMB_INST_ODU']; ?></span></td>
                    <td><?php echo $landing_result_name['INST_TITLE_ODU']; ?></td>
                    <td><?php echo $landing_result_name['INST_CREDITS_ODU']; ?></td>
            </tr>
          
            <?php
                                                }
                                                    
                                               
                                                
                                                 
                                                
                                                
                                            }
                                                        
                                            }
                                                
                                  
                                                
                                          
                                             
                                            else { 
                                            
                                                $file = '../sbgitables/'.$landing_code_sbgiop.'.html';
                                                $data = file_get_contents($file);
                                                echo $data;
                                            }
                                     
    ?>
         
         
     </tbody>
</table>
       
            
       <?php
}
if (isset($_POST['school_state1'])) {
?>

                

<?php
				require_once '../database.php';
				$school_subject_filter = ($_POST['school_state1']);
				$usersStr              = implode("','", $school_subject_filter);
				$sbgi_array            = array();
				if (isset($_POST['subject_number_name'])) {
								$subject_filter = ($_POST['subject_number_name']);
								$usersStrs      = implode("','", $subject_filter);
				}
				$filter_subject_retrieve1     = "SELECT STVSBGI_CODE from V_WX_SCHOOL_LIST where STVSBGI_DESC IN ('" . $usersStr . "')";
				$filter_subject_statement_id2 = oci_parse($conn, $filter_subject_retrieve1);
				oci_execute($filter_subject_statement_id2);
				while ($filter_subject_code_sbgi = oci_fetch_array($filter_subject_statement_id2, OCI_BOTH + OCI_RETURN_NULLS)) {
								array_push($sbgi_array, $filter_subject_code_sbgi['STVSBGI_CODE']);
				}
				$usersStrs1                   = implode("','", $sbgi_array);
				$filter_subject_retrieve3     = "SELECT DISTINCT SUBJ_CODE_FROM_SCHOOL FROM V_WX_EQUIVALENCY_LIST where SBGI_CODE IN ('" . $usersStrs1 . "') ORDER BY SUBJ_CODE_FROM_SCHOOL ASC";
				$filter_subject_statement_id3 = oci_parse($conn, $filter_subject_retrieve3);
				oci_execute($filter_subject_statement_id3);
				while ($filter_subject_result_name = oci_fetch_array($filter_subject_statement_id3, OCI_BOTH + OCI_RETURN_NULLS)) {
								if (!empty($subject_filter)) {
												if (in_array($filter_subject_result_name['SUBJ_CODE_FROM_SCHOOL'], $subject_filter)) {
																foreach ($subject_filter as $string) {
																				if ($filter_subject_result_name['SUBJ_CODE_FROM_SCHOOL'] == $string) {
?>        
                                             <div class="form-check mb-1">
                                                <label class="form-check-label" for="check1">
                                                    <input type="checkbox" class="form-check-input" id="" name="subject_option" value="<?php
																								echo $filter_subject_result_name['SUBJ_CODE_FROM_SCHOOL'];
?>" checked><?php
																								echo $filter_subject_result_name['SUBJ_CODE_FROM_SCHOOL'];
?>
                                                </label>
                                            </div>    
                                                    
                        <?php
																				}
																}
												} else {
?>                               
                                        <div class="form-check mb-1">
                                            <label class="form-check-label" for="check1">
                                                <input type="checkbox" class="form-check-input" id="" name="subject_option" value="<?php
																echo $filter_subject_result_name['SUBJ_CODE_FROM_SCHOOL'];
?>"><?php
																echo $filter_subject_result_name['SUBJ_CODE_FROM_SCHOOL'];
?>
                                            </label>
                                        </div>
                            
                         <?php
												}
								} else {
?>
                            
                            <div class="form-check mb-1">
                                            <label class="form-check-label" for="check1">
                                                <input type="checkbox" class="form-check-input" id="" name="subject_option" value="<?php
												echo $filter_subject_result_name['SUBJ_CODE_FROM_SCHOOL'];
?>"><?php
												echo $filter_subject_result_name['SUBJ_CODE_FROM_SCHOOL'];
?>
                                            </label>
                                        </div>
                            
                            
                            <?php
								}
				}
?>
                            
                            
                             
                        
                            
                            <?php
}
if (isset($_POST['school_state2'])) {
				require_once '../database.php';
				$school_subject_filter = ($_POST['school_state2']);
				$usersStr              = implode("','", $school_subject_filter);
				$sbgi_array            = array();
				if (isset($_POST['course_number_name'])) {
								$subject_filter = ($_POST['course_number_name']);
								$usersStrs      = implode("','", $subject_filter);
				}
				$filter_subject_retrieve1     = "SELECT STVSBGI_CODE from V_WX_SCHOOL_LIST where STVSBGI_DESC IN ('" . $usersStr . "')";
				$filter_subject_statement_id2 = oci_parse($conn, $filter_subject_retrieve1);
				oci_execute($filter_subject_statement_id2);
				while ($filter_subject_code_sbgi = oci_fetch_array($filter_subject_statement_id2, OCI_BOTH + OCI_RETURN_NULLS)) {
								array_push($sbgi_array, $filter_subject_code_sbgi['STVSBGI_CODE']);
				}
				$usersStrs1                   = implode("','", $sbgi_array);
				$filter_subject_retrieve3     = "SELECT DISTINCT CRSE_NUMB_FROM_SCHOOL FROM V_WX_EQUIVALENCY_LIST where SBGI_CODE IN ('" . $usersStrs1 . "') ORDER BY CRSE_NUMB_FROM_SCHOOL ASC";
				$filter_subject_statement_id3 = oci_parse($conn, $filter_subject_retrieve3);
				oci_execute($filter_subject_statement_id3);
				while ($filter_subject_result_name = oci_fetch_array($filter_subject_statement_id3, OCI_BOTH + OCI_RETURN_NULLS)) {
								if (!empty($subject_filter)) {
												if (in_array($filter_subject_result_name['CRSE_NUMB_FROM_SCHOOL'], $subject_filter)) {
																foreach ($subject_filter as $string) {
																				if ($filter_subject_result_name['CRSE_NUMB_FROM_SCHOOL'] == $string) {
?>        
                                             <div class="form-check mb-1">
                                                <label class="form-check-label" for="check1">
                                                    <input type="checkbox" class="form-check-input" id="" name="option2" value="<?php
																								echo $filter_subject_result_name['CRSE_NUMB_FROM_SCHOOL'];
?>" checked><?php
																								echo $filter_subject_result_name['CRSE_NUMB_FROM_SCHOOL'];
?>
                                                </label>
                                            </div>    
                                                    
                        <?php
																				}
																}
												} else {
?>                               
                                        <div class="form-check mb-1">
                                            <label class="form-check-label" for="check1">
                                                <input type="checkbox" class="form-check-input" id="" name="option2" value="<?php
																echo $filter_subject_result_name['CRSE_NUMB_FROM_SCHOOL'];
?>"><?php
																echo $filter_subject_result_name['CRSE_NUMB_FROM_SCHOOL'];
?>
                                            </label>
                                        </div>
                            
                         <?php
												}
								} else {
?>
                            
                            <div class="form-check mb-1">
                                            <label class="form-check-label" for="check1">
                                                <input type="checkbox" class="form-check-input" id="" name="option2" value="<?php
												echo $filter_subject_result_name['CRSE_NUMB_FROM_SCHOOL'];
?>"><?php
												echo $filter_subject_result_name['CRSE_NUMB_FROM_SCHOOL'];
?>
                                            </label>
                                        </div>
                            
                            
                            <?php
								}
				}
}
?>                        
            