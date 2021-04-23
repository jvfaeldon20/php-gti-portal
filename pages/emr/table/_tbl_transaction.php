<?php
include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';

$output = '';
$stmt   = "SELECT * FROM record WHERE member_no like '%".$_GET['search']."%' or first_name like '%".$_GET['search']."%' or last_name like '%".$_GET['search']."%' or caller_no like '%".$_GET['search']."%' ORDER BY record_id DESC limit 1  ";
$result = mysqli_query($db_conn,$stmt);

if(mysqli_num_rows($result)>0)
	{
	while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
				echo "<td><a class='callername' href='transaction.php?tran_id=".$row['record_id']."&member_id=".$row['member_no']."'>".$row['member_no']."</a></td>";
				echo "<td>".$row['caller_no']."</td>";
				echo "<td class='firstname'>".$row['first_name']."</td>";
				echo "<td class='lastname'>".$row['last_name']."</td>";
			echo "</tr>";
		}
	}
 else{
 		echo'Data not found';
 	}
?>
<script>
	var name;
	$('.callername').click(function(){
		var callername = $(this).text();
		var firstname  = $(this).closest('td').next().next().text();
		var lastname   = $(this).closest('td').next().next().next().text();
	    name = firstname + ' ' + lastname;

		    $.ajax({
			url: 'table/_tl_select.php',
			type: 'GET',
			data:{sales_program: $('#sales_program').val()},
			success: function(output){
				$('.is_name').html(output);
			}
			});
	});
	
</script>