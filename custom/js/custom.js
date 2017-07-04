jQuery(document).ready(function($){

	// contact form
	jQuery("form.contact-form #submit").click(function(){
		//alert('ok');
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		
		var obj = jQuery(this).parents(".contact-form");
		var Name    = obj.find("input#name").val();
		var Email   = obj.find("input#email").val();
		var Message = obj.find("textarea#message").val();
		var sendto  = obj.find("input#sendto").val();
		Name    = Name.replace('Name','');
		Email   = Email.replace('Email','');
		Message = Message.replace('Message','');
		
		//alert('Email:'+Email);
		if( !obj.find(".noticefailed").length ){
			obj.append('<div class="noticefailed"></div>');
			}
		obj.find(".noticefailed").text("");
		
		//alert('Email:'+Email);
		if(Name ===""){
			obj.find(".noticefailed").text("Please enter your name.");
			return false;
		}	
	
		if( !(emailReg.test( Email )) || Email ==='' ) {		
			obj.find(".noticefailed").text("Please enter valid email.");
			return false;
		}
	
		if(Message === ""){
			obj.find(".noticefailed").text("Message is required.");
			return false;
		}
		
		//alert(ascreen_params.themeurl+'/custom/images/loading.gif');
	
		obj.find(".noticefailed").html("");
		obj.find(".noticefailed").append("<img alt='loading' class='loading' src='"+ascreen_params.themeurl+"/custom/images/loading.gif' />");
		
		//alert(Message);
		
		 jQuery.ajax({
					 type:"POST",
					 dataType:"json",
					 url:ascreen_params.ajaxurl,
					 data:"Name="+Name+"&Email="+Email+"&Message="+Message+"&sendto="+sendto+"&action=ascreen_contact",
					 success:function(data){ 
						 if(data.error==0){
							 obj.find(".noticefailed").addClass("noticesuccess").removeClass("noticefailed");
							 obj.find(".noticesuccess").html(data.msg);
							 }else{
								 obj.find(".noticefailed").html(data.msg);	
								 }
								 jQuery('.loading').remove();obj[0].reset();
						},
						error:function(){
							obj.find(".noticefailed").html("Error.");
							obj.find('.loading').remove();
							}
			});
	});
	// contact form end


	// video resize
	var height = jQuery(window).height();

	jQuery(".ct_video_background").css("height",height);
	
	var height_content_video = jQuery(".ct_video .section_content").height();
	var top = (height-height_content_video)/2;
	
	if(top<0)
	{
		jQuery(".ct_video .section_content").css("padding-top",0); 
	}else{
		jQuery(".ct_video .section_content").css("padding-top",top); 
	}
	
	$(window).resize(function() {
		var height = jQuery(window).height();
	
		jQuery(".ct_video_background").css("height",height);
		
		var height_content_video = jQuery(".ct_video .section_content").height();
		var top = (height-height_content_video)/2;
		
		if(top<0)
		{
			jQuery(".ct_video .section_content").css("padding-top",0); 
		}else{
			jQuery(".ct_video .section_content").css("padding-top",top); 
		}
	
	});
	
	//hide video buuton
	window.onscroll=function(){ 
		if ($(document).scrollTop() > height ) 
		{ 
			$("#video_button_wrapper .goto").css({display:"none"});
		}else{
			
			$("#video_button_wrapper .goto").css({display:"block"});
		}
	}
	// video resize end
	

	/* ------------------------------------------------------------------------ */
	/* parallax background image 										  	    */
	/* ------------------------------------------------------------------------ */
	 $('.ascreen-parallax').parallax("50%", 0.1);


	//tooltip
	$(function () { $("[data-toggle='tooltip']").tooltip(); });

	// adjust ct_post_img hight
	$('.ct_post_img a img').each(function() {
		var width = $(this).width();   
		var height = $(this).height();  
		var needheight = width* 0.66;  
		$(this).css("height", needheight);  
		$(this).css("width", width); 
	});
	// adjust ct_post_img hight end

	
});



