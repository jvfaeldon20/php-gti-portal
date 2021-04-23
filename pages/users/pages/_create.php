<?php
include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';

//declaration
$first_name 	= $_POST['first_name'];
$last_name 		= $_POST['last_name'];
$email 			= $_POST['email'];
$password 		= $_POST['password'];
$role	 		= $_POST['role'];
$picture_path 	= $_POST['picture_path'];
$status	 		= $_POST['status'];
$birthdate	 	= $_POST['birthdate'];
$username	 	= $_POST['username'];

//img 
$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//sql statement
$stmt = "INSERT INTO users(first_name
							,last_name
							,email
							,password
							,role
							,picture_path
							,status
							,birthdate
							,username) 
				
					VALUES('$first_name'
							,'$last_name'
							,'$email'
							,PASSWORD('$password')
							,'$role'
							,'$target_file'
							,'$status'
							,'$birthdate'
							,'$username')";

//execution
$query = mysqli_query($db_conn, $stmt);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

if ($query === false)
	{
		header("Location: ../index.php?create=fail");
	}
else 
	{
		header("Location: ../index.php?create=ok");
	}


?>

