jQuery(document).ready(function($){
		
		    //Menu
    $('#menu > ul').superfish({ 
        delay:       1000,                           
        animation:   {opacity:'show', height:'show'}, 
        speed:       'fast',                          
        autoArrows:  true

    });
	
	$('.widget-box ul li').each(function(){
			if($(this).find('ul').length){
				$(this).addClass('item-has-children');
				}					 
     });
	
 });