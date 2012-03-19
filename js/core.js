jQuery(document).ready(function($) {

	//Functions for Search Form

	$('.search-text').blur(function() {
		if (this.value == '') 
			this.value = 'Search for...';
		});
		
	$('.search-text').focus(function() {
		if (this.value == 'Search for...') 
			this.value = '';
		});
		
	$('#header .searchform').submit(function() {
		if( $('.search-text',$(this)).val() == 'Search for...' || $('.search-text',$(this)).val() == '') 
			return false;
	});
  $('.sidebar .searchform').submit(function() {
		if( $('.search-text',$(this)).val() == 'Search for...' || $('.search-text',$(this)).val() == '') 
			return false;
	});

	$('.search-submit').focus(function() {
		this.blur();
	});
	
	//Functions for main menu

	$('#main-menu ul li').mouseenter(function() {
		$(this).children('ul').show();
		$(this).children('ul').children('li').mouseenter(function() { $(this).children('ul').show(); });
		$(this).children('ul').children('li').mouseleave(function() { $(this).children('ul').hide(); });
	});
	
	$('#main-menu ul li').mouseleave(function() {
		$(this).children('ul').hide();
	});
  //$('.info-bar-right').css('margin-top',(($('.info-bar').height()+9-$('.info-bar-right').height())/2)+'px');
});