<?php
include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';

$symptoms = $_POST['symptoms'];

$stmt  = "INSERT INTO symptoms(description) values('$symptoms')";
$query = mysqli_query($db_conn,$stmt);


?>