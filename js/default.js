// JavaScript Document

jQuery(document).ready(function($) {
    
	jQuery(window).scroll(function(){
	var e=jQuery(window).width();
	if(jQuery(this).scrollTop()>200)
	{	
		jQuery('.container-sony .container .margin-top-bottom-2').css({'margin':'10px 0px'});
	}
	if(jQuery(this).scrollTop()<200)
	{
		jQuery('.container-sony .container .margin-top-bottom-2').css({'margin':'20px 0px'});
	}
	});
	
	jQuery('#appointment_insert').click(function(e) {
		
		var appointment_name = $('#appointment_name').val();
		var appointment_email = $('#appointment_email').val();
		var appointment_phone = $('#appointment_phone').val();
		var datetime = $('#datetime').val();
		var appointement_comment = $('#appointement_comment').val();
		
		if(appointment_name == "") {
			$('#appointment_name').css('border','1px solid red');
		} else {
			$('#appointment_name').css('border','none');
		}
		if(appointment_email == "") {
			$('#appointment_email').css('border','1px solid red');
		} else {
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;					
				if (!filter.test(appointment_email)) {
					  $('#appointment_email').css('border','1px solid red');
					  return false;
				} else {
					$('#appointment_email').css('border','none');
				}
		}
		if(appointment_phone == "") {
			$('#appointment_phone').css('border','1px solid red');
		} else {
			$('#appointment_phone').css('border','none');
		}
		if(datetime == "") {
			$('#datetime').css('border','1px solid red');
		} else {
			$('#datetime').css('border','none');
		}
		if(appointement_comment == "") {
			$('#appointement_comment').css('border','1px solid red');
		} else {
			$('#appointement_comment').css('border','none');
		}
		if(appointment_name != "" && appointment_email != "" && appointment_phone != "" && datetime != "" && appointement_comment != "") {

			jQuery.ajax({
							url: booster_ajax.ajax_url,
							type:'POST',
							dataType:"json",
							data: {
								action: 'my_appointment',
								name:appointment_name,
								email:appointment_email,
								phone:appointment_phone,
								datetime:datetime,
								comment:appointement_comment,
							},
							success: function(response){
								$('#displaymessage').html('Your appointment has been booked successfully.');
								$('#appointment_name').val('');
								$('#appointment_email').val('');
								$('#appointment_phone').val('');
								$('#datetime').val('');
								$('#appointement_comment').val('');
							}
							
						});
		}
		return false;
    });
	
});