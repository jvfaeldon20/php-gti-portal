<?php
include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';

$sales_program = $_POST['sales_program'];

$stmt  = "INSERT INTO sales_program(sales_program) values('$sales_program')";
$query = mysqli_query($db_conn,$stmt);


?>