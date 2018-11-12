<?php

require_once 'database.php';
set_time_limit(0);

$retreive1="SELECT STVSBGI_CODE FROM V_WX_SCHOOL_LIST";
                                                    $statement_id1 = oci_parse($conn,$retreive1);
                                                    
                                                    
                                            //echo $statement_id;
                                                    oci_execute($statement_id1);
        
while($row_school =oci_fetch_array($statement_id1, OCI_ASSOC))
                                       {
    
    $sbgicodes = $row_school['STVSBGI_CODE'];
ob_start();
$landing_retrieve3="SELECT * FROM V_WX_EQUIVALENCY_LIST where SBGI_CODE='".$sbgicodes."' and CONNECTOR_COL_ODU='NULL'";
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
                            $landingcondition_retrieve3="SELECT * FROM V_WX_EQUIVALENCY_LIST where SBGI_CODE='00VCCS' and SUBJ_CODE_FROM_SCHOOL='".$conditionsubj."' and CRSE_NUMB_FROM_SCHOOL='".$conditionnumber."' and not CONNECTOR_COL_ODU='NULL'";
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
            
            $file = 'sbgitables/'.$sbgicodes.'.html';
            $my_var = ob_get_clean();
            file_put_contents($file, $my_var);
            oci_free_statement($landing_statement_id3);
    
}

oci_free_statement($statement_id1);
?>

