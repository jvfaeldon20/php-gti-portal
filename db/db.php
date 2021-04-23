<?php
$db_conn = mysqli_connect("localhost", "root", "", "portal_db");
if (!$db_conn) {
	echo "Connection Failed: ".$db_conn -> connect_error();
}
else
// mysqli_connect("ip_address","root","root","km_emr");

?>