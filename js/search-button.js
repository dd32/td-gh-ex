jQuery('.control').click( function(){
	jQuery('body').addClass('search-active');
	jQuery('.input-search').focus();
});

jQuery('.icon-close').click( function(){
	jQuery('body').removeClass('search-active');
});