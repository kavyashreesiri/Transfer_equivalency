<?php
$dbstr = "(description=
               (address=
                 (host=)
                 (protocol=tcp)
                 (port=)
              )
             (connect_data=
                 (sid=PPRD)
                 (SERVER=DEDICATED)
               )";

$conn = oci_connect('','','(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = )(PORT = )) (CONNECT_DATA = (SERVER = DEDICATED) (SID = PPRD)))');
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
