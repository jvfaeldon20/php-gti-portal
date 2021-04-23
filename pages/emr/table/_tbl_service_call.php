<?php
include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';

$output = '';
$stmt   = "SELECT * FROM services WHERE description LIKE '%".$_GET["search"]."%'";
$result = mysqli_query($db_conn,$stmt);

if(mysqli_num_rows($result)>0)
	{
	while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
				echo "<td>".$row['service_id']."</td>";
				echo "<td><a href='#' class='service_call'>".$row['description']."</a></td>";
			echo "</tr>";
		}
	}
 else{
 		echo'Data not found';
 	}
?>
<script>
	$('.service_call').click(function(){
		var sym = $(this).text();
		$('#service_call').val(sym);
		$('#modal_service_call').modal('hide');
	});
</script>