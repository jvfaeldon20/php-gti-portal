<div id="modal_new_transaction" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header modal-title-service_call">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-title">
					<strong><h4>MEDICAL RECORDS</h4></strong>
					<div class="pull-right">
					<a href="index.php" class="btn btn-success btn-sm no-border-radius btn-sm" data-toggle="tooltip" title="Add New Record">
						<span class="glyphicon glyphicon-plus"></span>
					</a>
					<a href="invalid_calls/add_misrouted.php" class="btn btn-warning no-border-radius btn-sm " data-toggle="tooltip" title="Add Misrouted Call">
						<span class="glyphicon glyphicon-import"></span>
					</a>
					<a href="invalid_calls/add_transfer_wr.php" class="btn btn-primary no-border-radius btn-sm "  data-toggle="tooltip" title="Add Transfer to WR">
						<span class="glyphicon glyphicon-transfer"></span>
					</a>
					<a href="invalid_calls/add_call_hungup.php" class="btn btn-danger no-border-radius btn-sm "  data-toggle="tooltip" title="Add Hung up Call" >
						<span class="glyphicon glyphicon-earphone"></span>
					</a>
					</div>
				</div>
			</div>
			<div class="modal-body">
				<div class="col-lg-12">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
							<input type="text" id="search_transaction" placeholder="- Search a Keyword-" class="form-control">
						</div>
					</div><br/> 
					<h4 align="center">Search Result</h4>
			 			<div class="table-responsive box-model">
							<table class="table table-bordered table-hover" >
								<tr>
									<!--transaction-->
									<th class="header-users">MEMBERSHIP NO.</th>
									<th class="header-users">CALLER NO.</th>
									<!--patient info-->
									<th class="header-users">FIRST NAME</th>
									<th class="header-users">LAST NAME</th>
								</tr>
								<div class="">
									<tbody id="result_transaction"></tbody>
								</div>
							</table>
						</div>
				</div>
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>
<script>
	
$('#search_transaction').keyup(function(){
	var txt = $(this).val();
	$('#result_transaction').html('loading');
	if(txt != '')
	{
		$.ajax({
			url:"table/_tbl_transaction.php",
			method:"GET",
			data:{search:txt},
			dataType:"text",
			success:function(data)
			{
				$('#result_transaction').html(data);
			}
		});
	}
	else
	{
		$('#result_transaction').html('');
	}
});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});

</script>