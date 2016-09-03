jQuery(document).ready( function(){
		antonine_preview_link();
		antonine_search_align();
		items = Array();
		jQuery("article")
			.each(
				function(index,value){
					items.push(value);
				}
			);
		antonine_search_menu_slide(items);
	}
);