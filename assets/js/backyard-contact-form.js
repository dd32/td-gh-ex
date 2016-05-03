(function($) {
    
    $(document).on('click','#backyard-contact-form-submit',function()
    {
       $('.info').html('');
       var name=$('#backyard-contact-form-name').val();
       var email=$('#backyard-contact-form-email').val();
       var vailed_email = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var phone=$('#backyard-contact-form-phone').val();
       var msg=$('#backyard-contact-form-mgs').val();
       if(name=='') {
	$('#backyard-contact-form-name').focus();
	$('.backyard-contact-form-name-valid').html('<span data-tooltip="Required">Please enter your name!</span>');
	return false;
}else if(email=='')
	{ 
	   $('#backyard-contact-form-email').focus();
	   $('.backyard-contact-form-email-valid').html('<span data-tooltip="Required">Please enter your email id!</span>');
	   return false;
	}else if(!vailed_email.test(email))
	 { 
	   $('#backyard-contact-form-email').focus();
	   $('.backyard-contact-form-email-valid').html('<span data-tooltip="Required">Please enter correct email id!</span>');
	   return false;
	 }else{
      $.ajax({
      type:'POST',
      dataType: 'html',
      data:{"action":"contact_form_send",name: name,email:email,phone:phone,msg:msg},
      url: ajax_object.ajax_url,
      beforeSend: function(){
        $('.sending').html('<img src="http://mailgun.github.io/validator-demo/loading.gif" alt="Loading...">');
      },
      success:function(data){
           $('#backyard-contact-form-submit-success').html(data);
           $('.sending').hide();
      }

      }); 
       
      return false;
  }
        
    });
    
})(jQuery);