<?php
include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';

$service_call = $_POST['service_id'];

$stmt  = "INSERT INTO services(description) values('$service_call')";
$query = mysqli_query($db_conn,$stmt);


?>