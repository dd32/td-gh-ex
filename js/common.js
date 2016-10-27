jQuery(document).ready(function($){

	// contact form
	jQuery(".acool_contact_form form.contact-form #submit").click(function(){
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
		
	
		obj.find(".noticefailed").html("");
		obj.find(".noticefailed").append("<img alt='loading' class='loading' src='"+acool_params.themeurl+"/images/loading.gif' />");
		
		//alert(Message);
		
		 jQuery.ajax({
					 type:"POST",
					 dataType:"json",
					 url:acool_params.ajaxurl,
					 data:"Name="+Name+"&Email="+Email+"&Message="+Message+"&sendto="+sendto+"&action=acool_contact",
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








	
	//tooltip
	$(function () { $("[data-toggle='tooltip']").tooltip(); });

	// responsive nav
	jQuery(".site-nav-toggle").click(function(){
		jQuery(".site-nav").toggle();
	});
	
	//search
	var $ct_top_menu = $( 'ul.nav' ),
		$ct_search_icon = $( '#ct_search_icon' );
	$(document).bind("click",function(e){        
		if($(e.target).closest(".ct-search-form").length == 0 && $(e.target).closest("#ct_search_icon").length == 0){

		$(".ct-search-form").hide();
		$(".ct-search-form").addClass( 'ct-hidden' );


		}

	})
	$ct_search_icon.click( function() {
		var $this_el = $(this),$form = $this_el.siblings( '.ct-search-form' );

		if ( $form.hasClass( 'ct-hidden' ) )
		{
			$form.css( { 'display' : 'block', 'opacity' : 0 } ).animate( { opacity : 1 }, 500 );
		}
		else
		{
			$form.animate( { opacity : 0 }, 500 );
		}

		$form.toggleClass( 'ct-hidden' );
	});
	
	//mobile menu
	ct_duplicate_menu( $('#ct-top-navigation ul.nav'), $('#ct-top-navigation .mobile_nav'), 'mobile_menu', 'ct_mobile_menu' );

	function ct_duplicate_menu( menu, append_to, menu_id, menu_class )
	{
		var $cloned_nav;

		menu.clone().attr('id',menu_id).removeClass().attr('class',menu_class).appendTo( append_to );
		$cloned_nav = append_to.find('> ul');


	   $(function(){
			$(document).on("click",function(e){            
				if($(e.target).closest("#mobile_menu").length == 0 && $(e.target).closest(".mobile_menu_bar").length == 0){

				$(".mobile_nav").removeClass( 'opened' ).addClass( 'closed' );
				$cloned_nav.slideUp( 500 );					
					
				}
			})
		})
		
		append_to.on( 'click', function(){
			
			if ( $(this).hasClass('closed') )
			{
				$(this).removeClass( 'closed' ).addClass( 'opened' );
				$cloned_nav.slideDown( 500 );
			} else {
				$(this).removeClass( 'opened' ).addClass( 'closed' );
				$cloned_nav.slideUp( 500 );
			}
			return false;
		});

		append_to.on( 'click', 'a', function(event){
			event.stopPropagation();
		});
	}


  //fact
	var decimal_places = 0;
	var k_n = 0;
	var decimal_factor = decimal_places === 0 ? 1 : decimal_places * 10;
	
	$('.fact').waypoint(function(down)
		{
			if(k_n == 0)
			{
				$('.fact').each(function () {
					var $this = $(this);
					$({ Counter: 0 }).animate({ Counter: parseInt($(this).data('fact')) },{
						duration: 2000,
						 easing: 'swing',
						step: function ()
						{
							$this.text(Math.ceil(this.Counter));
						}
					});//$({ Counter: 0 }).animate({ Counter: parseInt($(this).data('fact')) },{
				});//$('.fact').each(function () {
				k_n =1;
			}			
			$('.fact').animateNumber({color: 'green'},3000);
		},	
		{
			offset: '70%',
			triggerOnce: true
		}
	);//$('.fact').animateNumber(
			

	// progress bar
	$('.progress-bar').waypoint(function()
		{			
			$(".progress-bar").each(function(){
				var percent = $(this).data("percent");	
				var progressBarWidth = percent * $(".col-md-9").width() / 100;
				$(this).animate({ width: progressBarWidth }, 50);
			});
		},	
		{
		  offset: '90%',
		  triggerOnce: true
		}
	);	

	// adjust hight
	//alert('---222---');
	$('.ct_post_img a img').each(function() {
		var width = $(this).width();   
		var height = $(this).height();  
		var needheight = width* 0.66;  
		$(this).css("height", needheight);  
		$(this).css("width", width); 
	});
	
	
	

	
	
	
	
	
	
	

});	

//return top
	window.onscroll=function(){ 
		if ($(document).scrollTop() > 200) 
		{ 
			$(".gotopdiv").css({display:"block"});
		}else{ 
			$(".gotopdiv").css({display:"none"});	
		} 
	}

	function goTop(){
		$('html,body').animate({'scrollTop':0},600);
	}
	//return top end	


