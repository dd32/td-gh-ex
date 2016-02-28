// nivo normal


// nivo Static

jQuery(window).load(function() { 
		// nivoslider init
		jQuery('#nivo').css('visibility','visible').hide().fadeIn("slow") .nivoSlider({
				effect: 'fade',
				animSpeed:700,
				pauseTime:6000,
				startSlide:0,
				slices:15,
				directionNav:true,
				directionNavHide:true,
				controlNav:true,
				controlNavThumbs:false,
				keyboardNav:true,
				pauseOnHover:true,
				captionOpacity:0.8,
				afterLoad: function(){
						if (jQuery(window).width() < 480) {
					jQuery('.nivo-caption').fadeOut(500);
					jQuery('.nivo-caption').fadeIn(500);
					
					
						}else{
					jQuery('.nivo-caption').fadeOut(500);
					jQuery('.nivo-caption').fadeIn(500);
					
					jQuery(".nivo-caption ").has('.sld_layout3').addClass('sld3wrap');
							}
				},
				beforeChange: function(){
					jQuery('.nivo-caption').fadeOut(500);
    
}, 

afterChange: function(){
	jQuery('.nivo-caption').fadeIn(500);
}, 
			});
	});
	
