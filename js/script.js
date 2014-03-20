var $ = jQuery;
		
$(document).ready(function($) {
	
	


	$( window ).resize(function() {
		switchMobile();		
		resizeGame();
		resizePostPrev();
	});
	$(".header-menu .menu-item-home a").html('<div class="dashicons-admin-home"></div>');

	var top = $('.menu-bar').offset().top;
	
	$(window).scroll(function() {
	
		 if(top < $(document).scrollTop() ){
		 	$('.menu-bar').addClass('scrolling-menu');
		 	$('header').css('margin-top', $('.menu-bar').height());
		 }
		 else
		 {
			 $('.menu-bar').removeClass('scrolling-menu');
			 $('header').css('margin-top', 0);
		 }
	
	});			
	
							
});

$(window).load(function() {
    // page is fully loaded, including all frames, objects and images
	$('.post-prev').height('auto');
	switchMobile();
    resizeGame();
	resizePostPrev();
});
			
		
		
function resizePostPrev() {
	
	$('.img-placeholder').height($('.img-placeholder').width() / 1.6); //set image placeholder size			
	$('.img-placeholder .icon').css("margin-top", $('.img-placeholder').height() / 2 - $('.img-placeholder .icon').height() / 2);//set icon margin
	
	
	$('post-prev2').height('auto');
	$('post-prev').height('auto');
	
	
	//SET height of post prev for correct flow
	
	var counter = 0;
	var prevheight = 0;
	var prev;
	
	
	if($('.center').css('margin-top') == '0px')
		{
			$('.post-prev').height('auto');
			return 0;
		}
		
	
	$('.post-prev').each(function(){
		
		
		
		counter ++;
		
		$(this).height('auto')
		
		if(counter % 2 == 0) {
			
			var height = Math.max($(this).height(), prev.height());
			$(this).height(height);
			prev.height(height);
			
		} 
		else {
		
			prev = $(this);
		}
		
		
		
	});
	
				
}
			
function resizeGame() {
	var ratio = $('iframe, object').height() /  $('iframe, object').width();
			
	$('iframe, object').attr('width',$("#single-game").width());
	$('iframe, object').attr('height',($('iframe, object').attr('width') * (ratio)));
			
			
	if($('iframe, object').height() > $( window ).height()  *  0.75) {
		ratio = $('iframe, object').width() / $('iframe, object').height() ;
		$('iframe, object').attr('height', $( window ).height() * 0.75);
		$('iframe, object').attr('width',($('iframe, object').attr('height') * (ratio)));
	}
}

var switched = false;

function switchMobile(){
	
	$('post-prev2').height('auto');
	$('post-prev').height('auto');
	
	
	if($('.center').css('margin-top') == '0px') {
		
		
		
		$('.post-prev2').each(function(){
		
			switched = true;
			
			$(this).removeClass('post-prev2');
			$(this).addClass('post-prev');
			
			var imgsrc = $(this).find('img').attr( "src" );
			if(imgsrc) {
				imgsrc = imgsrc.replace('200x125' , '480x320');
				$(this).find('img').replaceWith('<img src="' + imgsrc + '"/>');
			}
			
			var title = $(this).find(".prev-title");
			
			$(this).find(".prev-title").remove();
			
			$(this).find("p").before(title);
			
		});
		
		resizePostPrev();

	}
	else if(switched)
	{
		switched = false;
		$('.post-prev').addClass('post-prev2');
		$('.post-prev').removeClass('post-prev');
		$('post-prev2').height('auto');
		$('post-prev').height('auto');
		
		$('.post-prev2').each(function(){
			var imgsrc = $(this).find('img').attr( "src" );
			if(imgsrc) {
				imgsrc = imgsrc.replace('480x320', '200x125');
				$(this).find('img').replaceWith('<img src="' + imgsrc + '"/>');
			}
			
			var title = $(this).find(".prev-title");
			
			$(this).find(".prev-title").remove();
			
			$(this).prepend(title);
		});
		
		
	}
}

			