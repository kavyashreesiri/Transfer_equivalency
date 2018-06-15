<?php
$dbstr = "(description=
               (address=
                 (host=scooby.pprd.odu.edu)
                 (protocol=tcp)
                 (port=2336)
              )
             (connect_data=
                 (sid=PPRD)
                 (SERVER=DEDICATED)
               )";

$conn = oci_connect('ODUAPIUSER','oduapiuserforCourseSearch2018','(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = scooby.pprd.odu.edu)(PORT = 2336)) (CONNECT_DATA = (SERVER = DEDICATED) (SID = PPRD)))');
ini_set('memory_limit', '512M');

if (!$conn) {
    $e = oci_error();
    print_r($e);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
else{
   // echo "Successful Connection";

}
?>
