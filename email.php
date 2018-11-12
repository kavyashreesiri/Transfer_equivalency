<?php
if (isset($_POST['emailid'])) {
	$firstname=test_input($_POST['firstname']);
    $tabemail =  $_POST['emailht'];
    $lastname=test_input($_POST['lastname']);
    $emailid=test_input($_POST['emailid']);
    if(empty($firstname) || empty($lastname) || empty($emailid)){
        echo "All three fields required";
    }
    else {
		$to=$emailid;
		$user_email="do-not-reply@odu.edu";
		$email_subject="Old Dominion University - Course by course equivalency";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .="From:" . $user_email. "\r\n";
		$message = $tabemail;
		if(mail($to,$email_subject,$message,$headers)){
			echo "Email sent successfully";
			return false;
		}else{
			
		}
		$mail->ClearAddresses();
		$mail->ClearAttachments();		
	}
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


