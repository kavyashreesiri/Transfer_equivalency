<?php

if (isset($_POST['cook_fav'])) {
   
    $first =  test_input($_POST['firstname']);
    $last = test_input($_POST['lastname']);
    $fullname = $first. " ".$last;
    $email = test_input($_POST['emailid']);
    
    
    
    
    $favt_cookie = $_POST['cook_fav'];
    $pieces = explode(" ", $favt_cookie);
    $coursenum = $pieces[1]. " " .$pieces[2]; 
    $output = array_slice($pieces, 3);
    $concat = "";
       
    $arrlength = count($output);
    
     $db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = scooby.pprd.odu.edu)(PORT = 2336)))(CONNECT_DATA=(SID=PPRD)))";
    $conn = oci_new_connect("ODUAPIUSER","oduapiuserforCourseSearch2018",$db);

for($x = 0; $x < $arrlength; $x++) {

    $concat = $concat . $output[$x] . " ";

}
   $crsetitle = rtrim($concat);
    
   
    
    
            
    if($conn)
{
       if(empty($first) || empty($last) || empty($email))
    {
        
       }
        
        else
        {
  
        
   $sql = 'BEGIN  BANINST1.SWREQUIV.p_create( :p_name, :p_email, :p_frm_school_code, :p_crse_no_frm_school, :p_crse_title_frm_school);END;';


     //   $stmt_id = oci_parse($conn, "exec SWREQUIV.p_create( :p_name, :p_email, p_frm_school_code, :p_crse_no_frm_school, :p_crse_title_frm_school);end;");
        $stmt_id = oci_parse($conn, $sql);

        oci_bind_by_name($stmt_id, ':p_name', $fullname);
        oci_bind_by_name($stmt_id, ':p_email', $email);
        oci_bind_by_name($stmt_id, ':p_frm_school_code', $pieces[0]);
        oci_bind_by_name($stmt_id, ':p_crse_no_frm_school', $coursenum);
        oci_bind_by_name($stmt_id, ':p_crse_title_frm_school', $crsetitle);
        oci_execute($stmt_id);
        
         
        }
    
}

    

        
    
        else {
       
      
        
    }
        
    
        

    
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

oci_free_statement($stmt_id);
oci_close($conn);


?>