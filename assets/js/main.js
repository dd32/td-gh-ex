jQuery(document).ready(function(){
	
	jQuery(window).load(function() {
		
		// menu drop-down
		jQuery('.menu-top li').hover(function(){
			jQuery(this).children('a').addClass('hover');
			jQuery(this).children('.sub-menu').stop().slideDown(200);
		}, function(){
			jQuery(this).children('a').removeClass('hover');
			jQuery(this).children('.sub-menu').stop().slideUp(200);
		});
		
		jQuery('.menu-top li').hover(function(){
			jQuery(this).children('a').addClass('hover');
			jQuery(this).children('.children').stop().slideDown(200);
		}, function(){
			jQuery(this).children('a').removeClass('hover');
			jQuery(this).children('.children').stop().slideUp(200);
		});
		
		jQuery('.menu-top-mob-container .icon-menu').click(function(e) {
			e.preventDefault();
		}).toggle(function(){
			jQuery(this).parent('.menu-top-mob-container').children('.menu-top-mob').stop().slideDown(200);
		}, function(){
			jQuery(this).parent('.menu-top-mob-container').children('.menu-top-mob').stop().slideUp(200);
		});			
		
		// owl-carousel
		jQuery(".main-carousel").owlCarousel({
			// Most important owl features
			itemsTabletSmall: true,
			singleItem : true,
			itemsScaleUp : true,
			//Basic Speeds
			paginationSpeed : 800,
			rewindSpeed : 1000,
			//Autoplay
			stopOnHover : true,
			// Navigation
			navigation : true,
			navigationText : ["",""],
			rewindNav : true,
			scrollPerPage : false,
			//Pagination
			pagination : true,
			paginationNumbers: false,
			// Responsive
			responsive: true,
			responsiveRefreshRate : 100,
			responsiveBaseWidth: window,
			// CSS Styles
			baseClass : "owl-carousel",
			theme : "owl-theme",
			//Lazy load
			lazyLoad : false,
			lazyFollow : true,
			lazyEffect : "fade",
			//Auto height
			autoHeight : true,
			//JSON
			jsonPath : false,
			jsonSuccess : false,
			//Mouse Events
			dragBeforeAnimFinish : true,
			mouseDrag : true,
			touchDrag : true,
			//Transitions
			transitionStyle : "fade", // "fade", "backSlide", "goDown", "fadeUp"
			// Other
			addClassActive : true
		});
		
		// article-image hover
		jQuery('.article-image').hover(function(){
			jQuery(this).children('.article-text').stop().fadeOut(200);
			jQuery(this).children('.fa').stop().fadeIn(200);
		}, function(){
			jQuery(this).children('.article-text').stop().fadeIn(200);
			jQuery(this).children('.fa').stop().fadeOut(200);
		});
		
		
		// some css fixe
		jQuery('.top-bar-contact li:first-child, .social li:first-child, .quotes p:first-child, .accordion h3:first-child, .accordion .ui-accordion-header:first-child, .menu-top-mob > li:first-child').addClass('first-child');
		jQuery('.top-bar-contact li:last-child, .social li:last-child, .quotes p:last-child, .section-clients .article-news:last-child, .meta a:last-child, .article-blog p:last-child, .single-post p:last-child, .sidebar-container .widget:last-child, .article-attorneys .attorneys-group:last-child, .clients-container .column-6-12:last-child, .menu-sidebar li:last-child, .sidebar-container ul li:last-child').addClass('last-child');
	}); // Final load
	
}); // Final ready