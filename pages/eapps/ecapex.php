<!DOCTYPE html>
<html>
<head>
	<title>EAPPS | Capex </title>
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery.confirm.min.js"></script>

	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class="container">
		<form class="form-inline" method="POST" action="">
			<h2>e - CAPEX</h2>
			<div class="row">
				<div class="well no-border-radius well-header">
						EMPLOYEE INFORMATION
				</div>
				<div class="col-md-6">
					<label class="label-eleave">Employee Name</label>
					<input type="text" class="form-control" name="" style="width: 70%;">
					<label class="label-eleave">Department</label>
					<input type="text" class="form-control" name="" style="width: 70%;">
					<label class="label-eleave">Vendor Name</label>
					<input type="text" class="form-control" name="" style="width: 70%;">
					<label class="label-eleave">Address</label>
					<input type="text" class="form-control" name="" style="width: 70%;">
					<label class="label-eleave">Item</label>
					<input type="text" class="form-control" name="" style="width: 70%;">
					<label class="label-eleave">Description</label>
					<input type="text" class="form-control" name="" style="width: 70%;">
				</div>
				<div class="col-md-6">
					<label class="label-eleave">IS/Manager</label>
					<input type="text" class="form-control" name="" style="width: 70%;">
					<label class="label-eleave">Date</label>
					<input type="text" class="form-control" name="" style="width: 70%;">
					<label class="label-eleave">Contact Person</label>
					<input type="text" class="form-control" name="" style="width: 70%;">
					<label class="label-eleave">Contact No</label>
					<input type="text" class="form-control" name="" style="width: 70%;">
					<label class="label-eleave">Quantity/Unit Price</label>
					<input type="text" class="form-control" name="" style="width: 34.5%;">
					<input type="text" class="form-control" name="" style="width: 34.5%;">
					<label class="label-eleave">Total Amount</label>
					<input type="text" class="form-control" name="" style="width: 70%;">
				</div>
			</div><br>
			<div class="row">
				<div class="well no-border-radius well-header">ATTACHMENT</div>
			</div><br>
			<div class="table-responsive box-model">
				<table class="table table-bordered table-lg table-hover">
					<thead>
						<tr cl>
							<th>Vendor Name</th>
							<th>Amount</th>
							<th>Attachment</th>
						</tr>
					</thead>
					<tbody>
							<tr>
								<td>BODY</td>
								<td>BODY</td>
								<td>BODY</td>
							</tr>
							<tr>
								<td>BODY</td>
								<td>BODY</td>
								<td>BODY</td>
							</tr>
							<tr>
								<td>BODY</td>
								<td>BODY</td>
								<td>BODY</td>
							</tr>
					</tbody>
				</table>
			</div>
			<div class="row">
				<div class="well no-border-radius well-header">EXISTING REQUEST</div>
				<div class="col-md-4">
					<label class="label-eleave">Status</label>
					<select class="form-control no-border-radius" style="width: 55%;">
						<option>MENU</option>
						<option>MENU</option>
						<option>MENU</option>
						<option>MENU</option>
					</select>			
				</div>
				<div class="col-md-8">
					<div class="input-group date pull-right" style="width: 30%;">
					<input data-format="yyyy-mm-dd" type="text" class="form-control"/>
						<span class="input-group-addon calendar" style="width: 10%;">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div> 
					<label class="label-eleave-er pull-right">End Date</label>

					<div class="input-group date pull-right" style="width: 30%;">
					<input data-format="yyyy-mm-dd" type="text" class="form-control"/>
						<span class="input-group-addon calendar" style="width: 10%;">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div> 
					<label class="label-eleave-er pull-right">Start Date</label>
				</div>
			</div>
			<hr>
		</form>
	</div>
<script type="text/javascript">
//on keyup to UPPER CASE for input
$("input[type=text]").keyup(function(){
  $(this).val( $(this).val().toUpperCase() );	
});


</script>
</body>	
</html>