<div id="modal_sales_program" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header modal-title-sales_program">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-title">
					<strong><h4>SALES PROGRAM</h4></strong>
				</div>
			</div>
			<div class="modal-body">
				<form class="form-inline" method="POST" action="_new_sales_program.php" id="new_sales_program">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
							<input type="text" name="search_sales_program" id="input_sales_program" placeholder="- Search by Sales Program -" size="90%" autocomplete="off" class="form-control">
						</div>
					</div>
					<br>
					<h4 align="center">Search Result</h4>
					<div class="table-responsive box-model">
						<table class="table table-bordered table-sm table-hover">
							<thead>
								<tr>
									<th class="header-users">NO</th>
									<th class="header-users">SALES PROGRAM</th>
									<th class="header-users">PLAN</th>
								</tr>
							</thead>
							<tbody id="result_sales_program"></tbody>
						</table>
					</div>
				</form>	
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>
<script>
	//add sales_program
	$('#new_sp').click(function(){
		$.ajax({
			url:"table/_new_sales_program.php",
			method:"POST",
			data: $('#new_sales_program').serialize(),
			success:function(data)
			{
				alert("Success");
				$('#input_sales_program').val('');
			}
		});
	});
	
	//display sales_program
	$('#input_sales_program').keyup(function(){
	var txt = $(this).val();
	$('#input_sales_program').html('loading');
				if(txt != '')
					{
						$.ajax({
							url:"table/_tbl_sales_program.php",
							method:"GET",
							data:{search:txt},
							dataType:"text",
							success:function(data)
							{
								$('#result_sales_program').html(data);
							}
						});
					}
				else
					{
						$('#result_sales_program').html('');
					}
			});
		

</script>