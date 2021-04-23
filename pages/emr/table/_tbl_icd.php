<?php
include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';

$output             = '';
$stmt               = "SELECT * FROM icd    WHERE description LIKE '%".$_GET["search"]."%' limit 50";

$result = mysqli_query($db_conn,$stmt);

if(mysqli_num_rows($result)>0)
	{
	while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td><a href='#' class='icd_code'>".$row['code']."</td>";
			echo "<td class='description'>".$row['description']."</td>";
			echo "</tr>";
		}
	}
 else{
 		echo'Data not found';
 	}
?>
<script>
	// class selector
	$('.icd_code').click(function(){
		var icd = $(this).text();
		var description = $(this).closest('td').next().text(); 
	// input id selector
		$('#icd_code').val(icd);
		$('#icd_description').val(description);
	//modal id selector
		$('#modal_icd_code').modal('hide');
	});
</script>