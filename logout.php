<?php 
	
	setcookie('username','', time()+0, '/gti_portal');
	header("location:login.php");
?>