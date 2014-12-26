jQuery(document).ready(function(){
	jQuery('.search-button').click(function(){
		jQuery('.mobile-search').slideToggle("fast");
		//$( ".mobile-search .search-field" ).focus();
	});
	jQuery('.mobile-search-close').click(function(){
		jQuery('.mobile-search').slideToggle("fast");
	});
});