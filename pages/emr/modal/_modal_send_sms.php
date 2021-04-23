<div id="modal_send_sms" class="modal fade" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header modal-title-service_call">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-title">
					<strong><h4>SEND SMS</h4></strong>
				</div>
			</div>
			<div class="modal-body">
				<form class="form-inline" method="POST" action="sms.php" target="_blank">
					<!--Receipient-->
					<input type="submit" class="btn btn-primary pull-right no-border-radius send_sms" value="SEND">		
					<br><br>
					<label class ="label-width label-emr ">Receipient</label><br>
						<input class="form-control" type="text" name="sms_caller_no" placeholder="caller_no" required="">
						<br>

					<label class ="label-width label-emr">Message</label><br>
						<textarea type="text" name="sms_message" placeholder="Write your message" class="form-control no-border-radius notes" required></textarea>
						<textarea type="text" name="sms_message_2" id="sms_message_2" class="form-control no-border-radius sms_message_2"></textarea>
					<input type="checkbox" name="disclaimer" class="disclaimer" value="[DISCLAIMER: This is not a replacement of an official prescription. Please do not reply to this message.Thank you.]">
					<label class="disclaimer">Add Disclaimer</label>
				</form>
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('.close').click(function(){
		$('.modal .form-control').val("");
	});	


	//on key up mirror sms message
	$('[name="sms_message"]').keyup(function(event){
		var sms_message_2   = $(this).val();
		var sms_disclaimer  = $('.disclaimer').val();

		$('[name="sms_message_2"]').val(sms_message_2.toUpperCase() + ' - ' + sms_disclaimer);
	});

	//if disclaimer is enabled
	$('.disclaimer').change(function()
		{
		var sms_message       = $('[name="sms_message"]').val();
		var disclaimer        = $('[name="disclaimer"]').val();
		
		if($(this).is(':checked'))
			{	
				$('[name="sms_message_2"]').val(sms_message_2.toUpperCase() + ' - ' + disclaimer);
				alert("Disclaimer successfully added to message!");
			}
		else
			{
				$('[name="sms_message_2"]').val($('[name="sms_message"]').val());
				alert("Disclaimer successfully remove to message!");
			}
	});

</script>
