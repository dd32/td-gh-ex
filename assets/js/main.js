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
  
  
  $('.hero_content').css({'height':$('.hero_content').parents('section').height()});
  $('.bottom-image').css({'height':$('.bottom-image').parents('section').height()});
	
 });