<div class="modal fade" id="modal_new" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<button type="button" class="close" data-dismiss="modal"></button>
				<img src="../../img/main/header-logo/gti_add_users.png" class="gti-logo">
			</div>
			<div class="modal-body">
				<form class="form-inline" method="POST" enctype="multipart/form-data" action="pages/_create.php">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<label class="label-min-width label-users-modal">Upload Photo</label>
									<input type="file" name="fileToUpload" id="fileToUpload" class="form-control no-border-radius input-user-create"placeholder="Path" required><br>

								<label class="label-min-width label-users-modal">Username</label>
									<input type="text" name="username" class="form-control no-border-radius input-user-create" autocomplete="off" required><br>

								<label class="label-min-width label-users-modal">First Name</label>
									<input type="text" name="first_name" class="form-control no-border-radius input-user-create" autocomplete="off" required><br>

								<label class="label-min-width label-users-modal">Last Name</label>
									<input type="text" name="last_name" class="form-control no-border-radius input-user-create" autocomplete="off" required><br>
								
								<label class="label-min-width label-users-modal">Birthdate</label>
									<input type="text" name="birthdate" class="form-control no-border-radius input-user-create"autocomplete="off" required><br>
								
								<label class="label-min-width-2 label-users-modal">E-mail</label>
									<input type="email" name="email" class="form-control no-border-radius input-user-create"autocomplete="off" required><br>
								
								<label class="label-min-width-2 label-users-modal">Pass</label>
									<input type="password" name="password" class="form-control no-border-radius input-user-create" autocomplete="off" required><br>
								
								<label class="label-min-width-2 label-users-modal">Role</label>
									<select type="text" name="role" class="form-control no-border-radius input-user-create">
										<option class="form-control" value=""></option>
										<option class="form-control" value="ADMIN">ADMIN</option>
										<option class="form-control" value="DOCTOR">DOCTOR</option>
										<option class="form-control" value="HEALTHSTOP">HEALTHSTOP</option>
										<option class="form-control" value="HR">HR</option>
										<option class="form-control" value="WELLNESS">WELLNESS</option>
									</select>
									<br>
								
								<label class="label-min-width-2 label-users-modal">Status</label>
									<input type="text" name="status" class="form-control no-border-radius input-user-create" autocomplete="off" required><br>
								<br>
								<input type="submit" name="submit" class="btn no-border-radius btn-user pull-right" value="SAVE">
								<br>
							</div>
						</div>
				</form><br>
			</div>
		</div>
	</div>
</div>
<script>
		$("input[name=first_name]").keyup(function(){
			$(this).val($(this).val().toUpperCase());
		});

		$("input[name=last_name]").keyup(function(){
			$(this).val($(this).val().toUpperCase());
		});

		$("input[name=role]").keyup(function(){
			$(this).val($(this).val().toUpperCase());
		});

		$("input[name=status]").keyup(function(){
			$(this).val($(this).val().toUpperCase());
		});

</script>
