jQuery(document).ready( function(){
	
		jQuery("#shareForm")
			.css("position", "fixed")
			.css("top", (jQuery("#shareShow").offset().top + 5))
			.css("left", "-" + jQuery("#shareForm").width());
			
		jQuery("#shareShow")
			.on("click", function(){
					jQuery("#shareForm")
						.css("display","block");
					jQuery("#shareForm")
						.animate(
							{
								"left": (jQuery("#shareShow").width() + 10) + "px",
							},
							200);
				}
			);
		
		jQuery("#shareClose")
			.on("click", function(){
					jQuery("#shareForm")
						.animate(
							{
								"left": ("-" + (jQuery("#shareForm").width() + 100)),
							},
							200);
				}
			);
	}
);