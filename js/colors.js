jQuery(document).ready(function(){
	
		
	jQuery(".color1" ).click(function(){
		jQuery("#colors" ).attr("href", "css/skin/orange.css" );
		return false;
	});
	
		
	jQuery(".color2" ).click(function(){
		jQuery("#colors" ).attr("href", "css/skin/pink.css" );
		return false;
	});
	
	jQuery(".color3" ).click(function(){
		jQuery("#colors" ).attr("href", "css/skin/purple.css" );
		return false;
	});
	
	jQuery(".color4" ).click(function(){
		jQuery("#colors" ).attr("href", "css/skin/red.css" );
		return false;
	});
		
	jQuery(".color5" ).click(function(){
		jQuery("#colors" ).attr("href", "css/skin/green.css" );
		return false;
	});
	
	jQuery(".color6" ).click(function(){
		jQuery("#colors" ).attr("href", "css/skin/blue2.css" );
		return false;
	});
	
	jQuery(".color7" ).click(function(){
		jQuery("#colors" ).attr("href", "css/skin/blue.css" );
		return false;
	});
	
	jQuery(".color8" ).click(function(){
		jQuery("#colors" ).attr("href", "css/skin/blaze.css" );
		return false;
	});
	
		

	jQuery('.icon').click (function(event){
		event.preventDefault();
		if( jQuery (this).hasClass('inOut')  ){
			jQuery('.mp-color').stop().animate({right:'-200px'},500 );
		} else{
			jQuery('.mp-color').stop().animate({right:'0px'},500 );
		} 
		jQuery(this).toggleClass('inOut');
		return false;

	}  );

	
	
	
	
} );
