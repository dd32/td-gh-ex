/**
 * Theme Customizer custom scripts
 * Control of show/hide events on feature slider type selection
 */
( function( $ ) {
	//Message if WordPress version is less tham 4.0
	if( parseInt( catchbase_misc_links.WP_version ) < 4){
		$('.preview-notice').prepend('<span style="font-weight:bold;">'+ catchbase_misc_links.old_version_message +'</span>');
	jQuery('#customize-info .btn-upgrade, .misc_links').click(function(event){
		event.stopPropagation();
	});
	}
	
	

	//Add Upgrade Button,Theme instruction, Support Forum, Changelog, Donate link, Review, Facebook, Twitter, Google+, Pinterest links 
	$('.preview-notice').prepend('<span id="catchbase_upgrade"><a target="_blank" class="button btn-upgrade" href="'+ catchbase_misc_links.upgrade_link +'">'+ catchbase_misc_links.upgrade_text +'</a></span>');
	jQuery('#customize-info .btn-upgrade, .misc_links').click(function(event){
		event.stopPropagation();
	});

	var misc_links;

	misc_links = '<li class="control-section accordion-section bottom" id="accordion-section-catchbase_misc_links">';
	misc_links +='<h3 tabindex="0" class="accordion-section-title">'+ catchbase_misc_links.heading +'</h3>';
	misc_links +='<ul class="accordion-section-content bottom">';
	misc_links +='<li id="catchbase_theme_instructions_link"><a class="misc_links" target="_blank" href="'+ catchbase_misc_links.theme_instructions_link +'">'+ catchbase_misc_links.theme_instructions_text +'</a></li>';
	misc_links +='<li id="catchbase_support_forum_link"><a class="misc_links" target="_blank" href="'+ catchbase_misc_links.support_forum_link +'">'+ catchbase_misc_links.support_forum_text +'</a></li>';
	misc_links +='<li id="catchbase_changelog_link"><a class="misc_links" target="_blank" href="'+ catchbase_misc_links.changelog_link +'">'+ catchbase_misc_links.changelog_text +'</a></li>';
	misc_links +='<li id="catchbase_donate_link"><a class="misc_links" target="_blank" href="'+ catchbase_misc_links.donate_link +'">'+ catchbase_misc_links.donate_link_text +'</a></li>';
	misc_links +='<li id="catchbase_review_link"><a class="misc_links" target="_blank" href="'+ catchbase_misc_links.review_link +'">'+ catchbase_misc_links.review_text +'</a></li>';
	misc_links +='<li id="catchbase_facebook_link"><a class="misc_links" target="_blank" href="'+ catchbase_misc_links.facebook_link +'">'+ catchbase_misc_links.facebook_text +'</a></li>';
	misc_links +='<li id="catchbase_twitter_link"><a class="misc_links" target="_blank" href="'+ catchbase_misc_links.twitter_link +'">'+ catchbase_misc_links.twitter_text +'</a></li>';
	misc_links +='<li id="catchbase_gplus_link"><a class="misc_links" target="_blank" href="'+ catchbase_misc_links.gplus_link +'">'+ catchbase_misc_links.gplus_text +'</a></li>';
	misc_links +='<li id="catchbase_pinterest_link"><a class="misc_links" target="_blank" href="'+ catchbase_misc_links.pinterest_link +'">'+ catchbase_misc_links.pinterest_text +'</a></li>';
	misc_links +='</ul>';
	misc_links +='</li>';

	$( misc_links ).insertAfter('#accordion-section-catchbase_reset_all_settings');

	/*
	 * For Featured Content on featured_content_type change event
	 */
	$("#customize-control-catchbase_theme_options-featured_content_type label select").change(function() {
		var value = $(this).val();

		if( value == 'demo-featured-content' ) {
			$('#customize-control-catchbase_theme_options-featured_content_number').hide();
		}
		else {
			$('#customize-control-catchbase_theme_options-featured_content_number').show();
		}

		if( value == 'featured-post-content' ) {
			$('[id*=customize-control-catchbase_featured_content_post]').show();
		}
		else {
			$('[id*=customize-control-catchbase_featured_content_post]').hide();
		}
		
		if( value == 'featured-page-content' ) {
			$('[id*=customize-control-catchbase_featured_content_page]').show();
		}
		else {
			$('[id*=customize-control-catchbase_featured_content_page]').hide();
		}
		
		if( value == 'featured-category-content' ) {
			$('#customize-control-catchbase_featured_content_select_category').show();
		}
		else {
			$('#customize-control-catchbase_featured_content_select_category').hide();
		}

		if( value == 'featured-image-content' ) {
			$('[id*=customize-control-featured_content_note]').show();
			$('[id*=customize-control-featured_content_image]').show();
			$('[id*=customize-control-catchbase_theme_options-featured_content_link]').show();
			$('[id*=customize-control-catchbase_theme_options-featured_content_target]').show();
			$('[id*=customize-control-catchbase_theme_options-featured_content_title]').show();
			$('[id*=customize-control-catchbase_theme_options-featured_content_content]').show();
		}
		else {
			$('[id*=customize-control-featured_content_note]').hide();
			$('[id*=customize-control-featured_content_image]').hide();
			$('[id*=customize-control-catchbase_theme_options-featured_content_link]').hide();
			$('[id*=customize-control-catchbase_theme_options-featured_content_target]').hide();
			$('[id*=customize-control-catchbase_theme_options-featured_content_title]').hide();
			$('[id*=customize-control-catchbase_theme_options-featured_content_content]').hide();
		}
	});

	/**
	 * Control of show/hide events on feature content type selection on panel click if prevously value has been saved
	 */
	$('#accordion-panel-catchbase_featured_content .accordion-section-title').click(function(){
		var value	=	$("#customize-control-catchbase_theme_options-featured_content_type label select").val();
		if( value == 'demo-featured-content' ) {
			$('#customize-control-catchbase_theme_options-featured_content_number').hide();
		}
		else {
			$('#customize-control-catchbase_theme_options-featured_content_number').show();
		}

		if( value == 'featured-post-content' ) {
			$('[id*=customize-control-catchbase_featured_content_post]').show();
		}
		else {
			$('[id*=customize-control-catchbase_featured_content_post]').hide();
		}
		
		if( value == 'featured-page-content' ) {
			$('[id*=customize-control-catchbase_featured_content_page]').show();
			}
		else {
			$('[id*=customize-control-catchbase_featured_content_page]').hide();
		}
		
		if( value == 'featured-category-content' ) {
			$('#customize-control-catchbase_featured_content_select_category').show();
		}
		else {
			$('#customize-control-catchbase_featured_content_select_category').hide();
		}

		if( value == 'featured-image-content' ) {
			$('[id*=customize-control-featured_content_note]').show();
			$('[id*=customize-control-featured_content_image]').show();
			$('[id*=customize-control-catchbase_theme_options-featured_content_link]').show();
			$('[id*=customize-control-catchbase_theme_options-featured_content_target]').show();
			$('[id*=customize-control-catchbase_theme_options-featured_content_title]').show();
			$('[id*=customize-control-catchbase_theme_options-featured_content_content]').show();
		}
		else {
			$('[id*=customize-control-featured_content_note]').hide();
			$('[id*=customize-control-featured_content_image]').hide();
			$('[id*=customize-control-catchbase_theme_options-featured_content_link]').hide();
			$('[id*=customize-control-catchbase_theme_options-featured_content_target]').hide();
			$('[id*=customize-control-catchbase_theme_options-featured_content_title]').hide();
			$('[id*=customize-control-catchbase_theme_options-featured_content_content]').hide();
		}
	});

	/**
	 * Control of show/hide events on feature content type selection on page load if prevously value has been saved
	 * For WordPress versions less than 4.0
	 */
	var catchbase_featured_content_layout_value	=	$("#customize-control-catchbase_theme_options-featured_content_type label select").val();

	if( catchbase_featured_content_layout_value == 'demo-content' ) {
		$('#customize-control-catchbase_theme_options-featured_content_number').hide();
	}
	else {
		$('#customize-control-catchbase_theme_options-featured_content_number').show();
	}

	if( catchbase_featured_content_layout_value == 'featured-post-content' ) {
		$('[id*=customize-control-catchbase_featured_content_post]').show();
	}
	else {
		$('[id*=customize-control-catchbase_featured_content_post]').hide();
	}
	
	if( catchbase_featured_content_layout_value == 'featured-page-content' ) {
		$('[id*=customize-control-catchbase_featured_content_page]').show();
	}
	else {
		$('[id*=customize-control-catchbase_featured_content_page]').hide();
	}
	
	if( catchbase_featured_content_layout_value == 'featured-category-content' ) {
		$('#customize-control-catchbase_featured_content_select_category').show();
	}
	else {
		$('#customize-control-catchbase_featured_content_select_category').hide();
	}

	if( catchbase_featured_content_layout_value == 'featured-image-content' ) {
		$('[id*=customize-control-featured_content_note]').show();
		$('[id*=customize-control-featured_content_image]').show();
		$('[id*=customize-control-catchbase_theme_options-featured_content_link]').show();
		$('[id*=customize-control-catchbase_theme_options-featured_content_target]').show();
		$('[id*=customize-control-catchbase_theme_options-featured_content_title]').show();
		$('[id*=customize-control-catchbase_theme_options-featured_content_content]').show();			
	}
	else {
		$('[id*=customize-control-featured_content_note]').hide();
		$('[id*=customize-control-featured_content_image]').hide();
		$('[id*=customize-control-catchbase_theme_options-featured_content_link]').hide();
		$('[id*=customize-control-catchbase_theme_options-featured_content_target]').hide();
		$('[id*=customize-control-catchbase_theme_options-featured_content_title]').hide();
		$('[id*=customize-control-catchbase_theme_options-featured_content_content]').hide();
	}
	
	/*
	 * For Feature Slider on featured_slider_type change event
	 */
	
	$('#accordion-panel-catchbase_featured_slider .accordion-section-title').click(function(){
		var value	=	$("#customize-control-catchbase_featured_slider_type label select").val();

		if( value == 'demo-featured-slider' ) {
			$('#customize-control-catchbase_featured_slide_number').hide();
		}
		else {
			$('#customize-control-catchbase_featured_slide_number').show();
		}

		if( value == 'featured-post-slider' ) {
			$('[id*=customize-control-catchbase_featured_slider_post]').show();
			$('[id*=customize-control-catchbase_theme_options-exclude_slider_post]').show();
		}
		else {
			$('[id*=customize-control-catchbase_featured_slider_post]').hide();
			$('[id*=customize-control-catchbase_theme_options-exclude_slider_post]').hide();
		}

		if( value == 'featured-page-slider' ) {
			$('[id*=customize-control-catchbase_featured_slider_page]').show();
		}
		else {
			$('[id*=customize-control-catchbase_featured_slider_page]').hide();
		}

		if( value == 'featured-category-slider' ) {
			$('#customize-control-catchbase_featured_slider_select_category').show();
			
			$('#customize-control-catchbase_featured_slider_number').show();
		}
		else {
			$('#customize-control-catchbase_featured_slider_select_category').hide();
		}

		if( value == 'featured-image-slider' ) {
			$('[id*=customize-control-featured_slider_image]').show();
			$('[id*=customize-control-catchbase_theme_options-featured_link]').show();
			$('[id*=customize-control-featured_slider_image]').show();
			$('[id*=customize-control-catchbase_theme_options-featured_link]').show();
			$('[id*=customize-control-featured_slider_note]').show();
			$('[id*=customize-control-catchbase_theme_options-featured_target]').show();
			$('[id*=customize-control-catchbase_theme_options-featured_title]').show();
			$('[id*=customize-control-catchbase_theme_options-featured_content]').show();
		}
		else {
			$('[id*=customize-control-featured_slider_image]').hide();
			$('[id*=customize-control-catchbase_theme_options-featured_link]').hide();
			$('[id*=customize-control-featured_slider_note]').hide();
			$('[id*=customize-control-catchbase_theme_options-featured_target]').hide();
			$('[id*=customize-control-catchbase_theme_options-featured_title]').hide();
			$('[id*=customize-control-catchbase_theme_options-featured_content]').hide();
		}

		if( value == 'featured-video-slider' ) {
			$('[id*=customize-control-catchbase_theme_options-youtube_autostart]').show();
			$('[id*=customize-control-catchbase_theme_options-youtube_autostop]').show();
			$('[id*=customize-control-catchbase_theme_options-youtube_allow_fullscreen]').show();
			$('[id*=customize-control-catchbase_theme_options-featured_video_link]').show();
		}
		else {
			$('[id*=customize-control-catchbase_theme_options-youtube_autostart]').hide();
			$('[id*=customize-control-catchbase_theme_options-youtube_autostop]').hide();
			$('[id*=customize-control-catchbase_theme_options-youtube_allow_fullscreen]').hide();
			$('[id*=customize-control-catchbase_theme_options-featured_video_link]').hide();
		}
	});

	$("#customize-control-catchbase_featured_slider_type label select").change(function() {
		var value = $(this).val();
		
		if( value == 'demo-featured-slider' ) {
			$('#customize-control-catchbase_featured_slide_number').hide();
		}
		else {
			$('#customize-control-catchbase_featured_slide_number').show();
		}

		if( value == 'featured-post-slider' ) {
			$('[id*=customize-control-catchbase_featured_slider_post]').show();
			$('[id*=customize-control-catchbase_theme_options-exclude_slider_post]').show();
		}
		else {
			$('[id*=customize-control-catchbase_featured_slider_post]').hide();
			$('[id*=customize-control-catchbase_theme_options-exclude_slider_post]').hide();
		}
		
		if( value == 'featured-page-slider' ) {
			$('[id*=customize-control-catchbase_featured_slider_page]').show();
		}
		else {
			$('[id*=customize-control-catchbase_featured_slider_page]').hide();
		}
		
		if( value == 'featured-category-slider' ) {
			$('#customize-control-catchbase_featured_slider_select_category').show();
		}
		else {
			$('#customize-control-catchbase_featured_slider_select_category').hide();
		}

		if( value == 'featured-image-slider' ) {
			$('[id*=customize-control-featured_slider_image]').show();
			$('[id*=customize-control-catchbase_theme_options-featured_link]').show();
			$('[id*=customize-control-featured_slider_note]').show();
			$('[id*=customize-control-catchbase_theme_options-featured_target]').show();
			$('[id*=customize-control-catchbase_theme_options-featured_title]').show();
			$('[id*=customize-control-catchbase_theme_options-featured_content]').show();
		}
		else {
			$('[id*=customize-control-featured_slider_image]').hide();
			$('[id*=customize-control-catchbase_theme_options-featured_link]').hide();
			$('[id*=customize-control-featured_slider_note]').hide();
			$('[id*=customize-control-catchbase_theme_options-featured_target]').hide();
			$('[id*=customize-control-catchbase_theme_options-featured_title]').hide();
			$('[id*=customize-control-catchbase_theme_options-featured_content]').hide();
		}

		if( value == 'featured-video-slider' ) {
			$('[id*=customize-control-catchbase_theme_options-youtube_autostart]').show();
			$('[id*=customize-control-catchbase_theme_options-youtube_autostop]').show();
			$('[id*=customize-control-catchbase_theme_options-youtube_allow_fullscreen]').show();
			$('[id*=customize-control-catchbase_theme_options-featured_video_link]').show();
		}
		else {
			$('[id*=customize-control-catchbase_theme_options-youtube_autostart]').hide();
			$('[id*=customize-control-catchbase_theme_options-youtube_autostop]').hide();
			$('[id*=customize-control-catchbase_theme_options-youtube_allow_fullscreen]').hide();
			$('[id*=customize-control-catchbase_theme_options-featured_video_link]').hide();
		}
	});

	/**
	 * Control of show/hide events on feature slider type selection on page load if prevously value has been saved
	 * For WordPress versions less than 4.0
	 */
	var catchbase_featured_slider_layout_value	=	$("#customize-control-catchbase_featured_slider_type label select").val();

	if( catchbase_featured_slider_layout_value == 'demo-featured-slider' ) {
		$('#customize-control-catchbase_featured_slide_number').hide();
	}
	else {
		$('#customize-control-catchbase_featured_slide_number').show();
	}

	if( catchbase_featured_slider_layout_value == 'featured-post-slider' ) {
		$('[id*=customize-control-catchbase_featured_slider_post]').show();
		$('[id*=customize-control-catchbase_theme_options-exclude_slider_post]').show();
	}
	else {
		$('[id*=customize-control-catchbase_featured_slider_post]').hide();
		$('[id*=customize-control-catchbase_theme_options-exclude_slider_post]').hide();
	}

	if( catchbase_featured_slider_layout_value == 'featured-page-slider' ) {
		$('[id*=customize-control-catchbase_featured_slider_page]').show();
	}
	else {
		$('[id*=customize-control-catchbase_featured_slider_page]').hide();
	}

	if( catchbase_featured_slider_layout_value == 'featured-category-slider' ) {
		$('#customize-control-catchbase_featured_slider_select_category').show();
		
		$('#customize-control-catchbase_featured_slider_number').show();
	}
	else {
		$('#customize-control-catchbase_featured_slider_select_category').hide();
	}

	if( catchbase_featured_slider_layout_value == 'featured-image-slider' ) {
		$('[id*=customize-control-featured_slider_image]').show();
		$('[id*=customize-control-catchbase_theme_options-featured_link]').show();
		$('[id*=customize-control-featured_slider_image]').show();
		$('[id*=customize-control-catchbase_theme_options-featured_link]').show();
		$('[id*=customize-control-featured_slider_note]').show();
		$('[id*=customize-control-catchbase_theme_options-featured_target]').show();
		$('[id*=customize-control-catchbase_theme_options-featured_title]').show();
		$('[id*=customize-control-catchbase_theme_options-featured_content]').show();
	}
	else {
		$('[id*=customize-control-featured_slider_image]').hide();
		$('[id*=customize-control-catchbase_theme_options-featured_link]').hide();
		$('[id*=customize-control-featured_slider_note]').hide();
		$('[id*=customize-control-catchbase_theme_options-featured_target]').hide();
		$('[id*=customize-control-catchbase_theme_options-featured_title]').hide();
		$('[id*=customize-control-catchbase_theme_options-featured_content]').hide();
	}
	
	if( catchbase_featured_slider_layout_value == 'featured-video-slider' ) {
		$('[id*=customize-control-catchbase_theme_options-youtube_autostart]').show();
		$('[id*=customize-control-catchbase_theme_options-youtube_autostop]').show();
		$('[id*=customize-control-catchbase_theme_options-youtube_allow_fullscreen]').show();
		$('[id*=customize-control-catchbase_theme_options-featured_video_link]').show();
	}
	else {
		$('[id*=customize-control-catchbase_theme_options-youtube_autostart]').hide();
		$('[id*=customize-control-catchbase_theme_options-youtube_autostop]').hide();
		$('[id*=customize-control-catchbase_theme_options-youtube_allow_fullscreen]').hide();
		$('[id*=customize-control-catchbase_theme_options-featured_video_link]').hide();
	}

} )( jQuery );