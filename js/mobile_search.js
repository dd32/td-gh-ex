$(document).ready(function(){
	$('.search-button').click(function(){
		$('.mobile-search').slideToggle("fast");
		//$( ".mobile-search .search-field" ).focus();
	});
	$('.mobile-search-close').click(function(){
		$('.mobile-search').slideToggle("fast");
	});
});