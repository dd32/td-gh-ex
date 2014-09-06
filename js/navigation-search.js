jQuery(document).ready(function($) {
	
	$('.main-navigation .menu').append('<li class="search-item"><a href="#"><i class="fa fa-search"></i></a></li>');
	
    $(".search-item a").click(function(){
        if ($('.navigation-search').is(":visible")) {
            $(this).parent().removeClass('current-menu-item');
            $(this).parent().removeClass('sfHover');
			$(this).css('opacity','1');
			$('.navigation-search').show().fadeOut(200);
			$('.search-item i').replaceWith('<i class="fa fa-search"></i>');
			return false;
        } else {
            $(this).parent().addClass('current-menu-item');
			$(this).parent().removeClass('sfHover');
			$(this).css('opacity','0.9');
			$('.navigation-search').hide().fadeIn(200);
			$('.navigation-search input').focus();
			$('.search-item i').replaceWith('<i class="fa fa-times"></i>');
			return false;
        }
    });
	
	$(document).click(function(event) { 
		if($(event.target).closest('.navigation-search').length || $(event.target).closest('.search-item a').length) {
			// do nothing
		} else {
			if($('.navigation-search').is(":visible")) {
				$('.search-item a').parent().removeClass('current-menu-item');
				$('.navigation-search').show().fadeOut(200);
				$('.search-item a').css('opacity','1');
				$('.search-item i').replaceWith('<i class="fa fa-search"></i>');
			}
		}
	});
	
});