jQuery(document).ready( function(){
	jQuery(window).resize(
		function(){
				jQuery( ".home article .home-align" )
					.each(
						function(index,value){
							width = jQuery(value).width();
							parent_width = jQuery(value).parent().width();
							
							height = jQuery(value).height();
							parent_height = jQuery(value).parent().height();
							
							leftpx = (parent_width - width)/2;
							toppx = (parent_height - height)/2;
							
							
							jQuery(value)
								.css("position", "relative")
								.css("top", toppx + "px")
								.css("left", leftpx + "px");
						}
					);
					
				jQuery( ".home article .home-align-title" )
					.each(
						function(index,value){
							width = jQuery(value).width();
							parent_width = jQuery(value).parent().width();
							height = jQuery(value).height();
							parent_height = jQuery(value).parent().height();
							
							leftpx = (parent_width - width)/2;
							toppx = (parent_height - height)/2;
							
							jQuery(value)
								.css("position", "relative")
								.css("top", toppx + "px")
								.css("left", leftpx + "px");
						}
					);
					
			}
		
		)
			
	}
);