jQuery(document).ready(
	function(){
		jQuery(".antonine_search_box")
			.on("focus", function(event){
					jQuery(event.target).attr("value","");
				}
			);
	}
);