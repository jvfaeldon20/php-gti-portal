<?php
include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';

$output             = '';
$stmt               = "SELECT * FROM symptoms WHERE description LIKE '%".$_GET["search"]."%' limit 50";

$result = mysqli_query($db_conn,$stmt);

if(mysqli_num_rows($result)>0)
	{
	while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>".$row['sym_id']."</td>";
			echo "<td><a href='#' class='symptoms'>".$row['description']."</a></td>";
			echo "</tr>";
		}
	}
 else{
 		echo'Data not found';
 	}
?>
<script>
	$('.symptoms').click(function(){
		var sym = $(this).text();

		$('#symptoms').val(sym);
		$('.sum_chief_complaint').val(sym);
		$('#modal_symptoms').modal('hide');
	});
</script>