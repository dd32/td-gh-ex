jQuery.noConflict()(function($){
	
	$('.on-off').live("change",function() {
		
		if ($(this).val() == "on" ) { 
			$('.hidden-element').css({'display':'none'});
			alert("ca");
		} 
		else { 
			$('.hidden-element').slideDown("slow");
		} 
	
	}); 

	var url = $(".template_directory").val();
	
	$('.select-background').each(function() {
		
		var sel = $(this).val();
		$(this).next(".preview").css({'background-image': 'url(" ' + url + sel +'")'});
		
	}); 
	
	$('.select-background').live("click",function() { 
		
		var sel = $(this).val();
		$(this).next(".preview").css({'background-image': 'url(" ' + url + sel +'")'});
		
	}); 

	$('.wip_mainbox').css({'display':'none'});
	$('.inactive').next('.wip_mainbox').css({'display':'block'});

	$('.wip_container h5.element').each(function(){
	
		if($(this).next('.wip_mainbox').css('display')=='none') {	
			$(this).next('input[name="element-opened"]').remove();	
		}
						
		else {	
			$(this).next().append('<input type="hidden" name="element-opened" value="'+$(this).attr('id')+'" />');
				
		}
						
	});

	$('.wip_container h5.element').live("click", function(){
	
		if($(this).next('.wip_mainbox').css('display')=='none') {	
		
			$(this).addClass('inactive');
			$(this).children('img').addClass('inactive');
			$('input[name="element-opened"]').remove();	
			$(this).next().append('<input type="hidden" name="element-opened" value="'+$(this).attr('id')+'" />');
		}
						
		else {	
		
			$(this).removeClass('inactive');
			$(this).children('img').removeClass('inactive');
			$(this).next('input[name="element-opened"]').remove();	
				
		}
						
		$(this).next('.wip_mainbox').stop(true,false).slideToggle('slow');
	
	});

	$( "#tabs.metaboxes" ).tabs();

});