<div id="modal_survey" class="modal fade" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header modal-title-survey">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-title">
					<strong><h5><i class="glyphicon glyphicon-stats"></i>&nbsp&nbsp&nbspSATISFACTION SURVEY</h5></strong>
				</div>
			</div>
			<div class="modal-body">
				<form class="form-inline" method="POST" action="transaction_survey.php">
					<div class="table-responsive box-model">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="label-style header-survey">CALLER NO.</th>
								</tr>
							</thead>
							<tbody id="result_survey"></tbody>
						</table>
					</div>
				</form>	
			</div>
			
		</div>
	</div>
</div>

<script>
	$('#input_symptoms').ready(function(){
	
	var svy = $(this).val();
	{
		$.ajax({
			url:"table/_tbl_survey.php",
			method:"GET",
			data:{search:svy},
			dataType:"text",
			success:function(data)
			{
				$('#result_survey').html(data);
			}
		});
	}
});



</script>

