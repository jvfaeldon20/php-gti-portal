<div id="modal_icd_code" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header modal-title-icd">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-title">
					<strong><h4>INTERNATIONAL CLASSIFICATION OF DISEASES - 10</h4></strong>
				</div>
			</div>
			<div class="modal-body">
				<div class="col-lg-12">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
							<input type="text" name="input_icd_code" id="search_icd" placeholder="- Search by Description -" class="form-control">
						</div>
					</div><br/>
					<h4 align="center">Search Result</h4>
			 			<div class="table-responsive box-model">
							<table class="table table-bordered table-hover">
								<tr>
									<th class="col-lg-1 header-users">ICD Code 10</th>
									<th class="header-users">Description</th>
								</tr>
								<tbody id="result_icd"></tbody>
							</table>
						</div>
				</div>
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>
<script>
$('#search_icd').keyup(function(){
	var txt = $(this).val();
	$('#result_icd').html('loading');
	if(txt != '')
	{
		$.ajax({
			url:"table/_tbl_icd.php",
			method:"GET",
			data:{search:txt},
			dataType:"text",
			success:function(data)
			{
				$('#result_icd').html(data);
			}
		});
	}
	else
	{
		$('#result_icd').html('');
	}
});

</script>