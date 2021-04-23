<div id="modal_service_call" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header modal-title-service_call">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-title">
					<strong><h4>SERVICE CALL</h4></strong>
				</div>
			</div>
			<div class="modal-body">
				<form class="form-inline" method="POST" action="modal/_new_service_call.php" id="new_service_call">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
						<input type="text" name="service_id" id="search_service_call" placeholder="- Search by Service -" autocomplete="off" class="form-control" size="60%">
					</div>
					<a href="#" id="new_svc_call" class="btn btn-emr no-border-radius btn-sm"><i class="glyphicon glyphicon-plus"></i></a><br>
					<h4 align="center">Search Result</h4>
			 			<div class="table-responsive box-model">
							<table class="table table-bordered table-hover">
								<tr>
									<th class="col-lg-1 header-users">Code</th>
									<th class="header-users">Services</th>
								</tr>
								<tbody id="result_service_call"></tbody>
							</table>
						</div>
				</form>
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>
<script>
//add service call
$('#new_svc_call').click(function(){
	$.ajax({
		url:"modal/_new_service_call.php",
		method:"POST",
		data:$('#new_service_call').serialize(),
		success: function(data)
			{
				alert("Success");
				$('#search_service_call').val('');
			}
	});
});


//display service call
$('#search_service_call').keyup(function(){
	var txt = $(this).val();
	$('#result_service_call').html('loading');
	if(txt != '')
	{
		$.ajax({
			url:"table/_tbl_service_call.php",
			method:"GET",
			data:{search:txt},
			dataType:"text",
			success:function(data)
			{
				$('#result_service_call').html(data);
			}
		});
	}
	else
	{
		$('#result_service_call').html('');
	}
});
</script>