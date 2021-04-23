<?php
include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';

$output = '';
$stmt   = "SELECT * FROM sales_program WHERE sales_program LIKE '%".$_GET["search"]."%'";
$result = mysqli_query($db_conn,$stmt);

if(mysqli_num_rows($result)>0)
	{
	while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
				echo "<td>".$row['sp_id']."</td>";
				echo "<td><a href='#' class='sp_row'>".$row['sales_program']."</td>";
				echo "<td>".$row['plan']."</td>";
			echo "</tr>";
		}
	}
 else{
 		echo'Data not found';
 	}
?>

<script>
	$('.sp_row').click(function(){
		var sp   = $(this).text();
		var plan = $(this).closest('td').next().text();

		$('#sales_program').val(sp);
		$('#plan').val(plan);	
		$('#modal_sales_program').modal('hide');


		if($('#sales_program').val() == "PILOT SUTHERLAND")
			{
				$("#reason_of_call").removeAttr("disabled");
				$("#is_name").removeAttr("disabled");
				$(".disease_type").removeAttr("disabled");
				$.ajax({
					url: 'table/_tbl_select.php',
					type: 'GET',
					data:{sales_program: $('#sales_program').val()},
					success: function(output){
						$('.is_name').html(output);
					}
				});
			}
		else{
				$("#reason_of_call").attr("disabled","false");
				$("#is_name").attr("disabled","false");
				$(".disease_type").attr("disabled","false");
				$(".diseases").attr("disabled","false");
				$(".is_name").val('');
				$(".disease_type").val('');
				$(".diseases").val('');
				$(".reason_of_call").val('');
				$('[name="disease_type"]').prop('checked',false);
		}
	});
</script>
			
