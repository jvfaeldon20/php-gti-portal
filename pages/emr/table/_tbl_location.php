<?php
include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';

$output = '';
$stmt   = "SELECT * FROM location WHERE municipality LIKE '%".$_GET["search"]."%' or province like '%".$_GET["search"]."%' ";
$result = mysqli_query($db_conn,$stmt);

if(mysqli_num_rows($result)>0)
	{
	while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
				echo "<td><a href='#' class='location'>".$row['zip_code']."</a></td>";
				echo "<td>".$row['municipality']."</td>";
				echo "<td>".$row['province']."</td>";
				echo "<td>".$row['region']."</td>";
				echo "<td>".$row['country']."</td>";
			echo "</tr>";
		}
	}
 else{
 		echo'Data not found';
 	}
?>
<script>
	$('.location').click(function(){
		var zip_code     = $(this).text();
		var municipality = $(this).closest('td').next().text();
		var province     = $(this).closest('td').next().next().text();
		var region       = $(this).closest('td').next().next().next().text();
		var country      = $(this).closest('td').next().next().next().next().text();

		$('#zip_code').val(zip_code);
		$('#location').val(municipality);
		$('#province').val(province);
		$('#region').val(region);
		$('#country').val(country);
		$('#modal_municipality').modal('hide');

	});
</script>

