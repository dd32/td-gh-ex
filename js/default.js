jQuery(document).ready(function() {	 
	 jQuery("#media_slide").owlCarousel({		
		items : 2,
		itemsDesktop : [1199,2],
		itemsTablet : [768, 1],
		itemsDesktopSmall : [979,2],
		itemsMobile : [480,1]
	 });
	var owl = jQuery("#media_slide");
	owl.owlCarousel();
	jQuery(".next").click(function(){
		owl.trigger('owl.next'); 
	 });
	  jQuery(".prev").click(function(){
		owl.trigger('owl.prev'); 
	 });
});

jQuery(document).ready(function(){
jQuery(".comment-form-author #author").attr("placeholder","Name");jQuery(".comment-form-email #email").attr("placeholder","E-Mail");jQuery(".comment-form-url #url").attr("placeholder","Website");jQuery(".comment-form-comment #comment").attr("placeholder","Comment");jQuery(".form-submit #submit").val("Send");var e=jQuery(".masonry-container");var t=30;var n=300;e.imagesLoaded(function(){e.masonry({itemSelector:".box",gutterWidth:t,isAnimated:true,columnWidth:function(e){var r=(e-2*t)/3|0;if(r<n){r=(e-t)/2|0}if(r<n){r=e}jQuery(".box").width(r);jQuery(".article").css("margin","0px");return r}})})
	jQuery('.multi-featured-image').click(function(e) {
		jQuery('#main-featured-image').attr('src',jQuery(this).find('img').data('src'))
	});
})


