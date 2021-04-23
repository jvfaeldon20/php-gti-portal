<div id="modal_municipality" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header modal-title-icd">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-title">
					<strong><h4>LOCATION</h4></strong>
				</div>
			</div>
			<div class="modal-body">
				<div class="col-lg-12">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
							<input type="text" name="search_municipality" id="search_municipality" placeholder="- Search by Municipality or Province -" autocomplete="off" class="form-control">
						</div>
					</div><br/>
					<h4 align="center">Search Result</h4>
			 			<div class="table-responsive box-model">
							<table class="table table-bordered table-hover" >
								<tr>
									<th class="col-lg-1 header-users">Zip Code</th>
									<th class="header-users">Municipality/City</th>
									<th class="header-users">Province State</th>
									<th class="header-users">Region/State</th>
									<th class="header-users">Country</th>
								</tr>
								<div class="">
									<tbody id="result_municipality"></tbody>
								</div>
							</table>
						</div>
				</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>
<script>
$('#search_municipality').keyup(function(){
	var txt = $(this).val();
	$('#result_municipality').html('loading');
	if(txt != '')
	{
		$.ajax({
			url:"table/_tbl_location.php",
			method:"GET",
			data:{search:txt},
			dataType:"text",
			success:function(data)
			{
				$('#result_municipality').html(data);
			}
		});
	}
	else
	{
		$('#result_municipality').html('');
	}
});
</script>