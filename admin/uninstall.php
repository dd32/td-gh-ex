<?php 

	// Header options
	delete_option('graphene_light_header');	
	delete_option('graphene_link_header_img');	
	delete_option('graphene_featured_img_header');
        delete_option('graphene_use_random_header_img');
        delete_option('graphene_hide_top_bar');
        delete_option('graphene_hide_feed_icon');
        delete_option('graphene_search_box_location');
        
        // Sidebar position
        delete_option('graphene_content_sidebar_position');
        delete_option('graphene_hide_sidebar');
        
	// Posts Display options
        delete_option('graphene_posts_show_excerpt');
	delete_option('graphene_hide_post_author');
	delete_option('graphene_hide_post_date');
	delete_option('graphene_show_post_year');
        delete_option('graphene_hide_post_commentcount');
	delete_option('graphene_hide_post_cat');
	delete_option('graphene_hide_post_tags');
	delete_option('graphene_show_post_avatar');
	delete_option('graphene_show_post_author');
	delete_option('graphene_show_excerpt_more');
        
	// Text style options
	delete_option('graphene_header_title_font_type');
	delete_option('graphene_header_title_font_size');
	delete_option('graphene_header_title_font_lineheight');
	delete_option('graphene_header_title_font_weight');
	delete_option('graphene_header_title_font_style');
	
	delete_option('graphene_header_desc_font_type');
	delete_option('graphene_header_desc_font_size');
	delete_option('graphene_header_desc_font_lineheight');
	delete_option('graphene_header_desc_font_weight');
	delete_option('graphene_header_desc_font_style');
	
	delete_option('graphene_content_font_type');
	delete_option('graphene_content_font_size');
	delete_option('graphene_content_font_lineheight');
	delete_option('graphene_content_font_colour');
        
        delete_option('graphene_link_colour_normal');
	delete_option('graphene_link_colour_visited');
	delete_option('graphene_link_colour_hover');
	delete_option('graphene_link_decoration_normal');
	delete_option('graphene_link_decoration_hover');
	
	// Bottom widget display options
	delete_option('graphene_footerwidget_column');
	delete_option('graphene_alt_footerwidget_column');
	
	// Nav menu display options
	delete_option('graphene_navmenu_child_width');
	
	// Comments display options
	delete_option('graphene_hide_allowedtags');
	
	// Miscellaneous options
	delete_option('graphene_swap_title');
        
        // Custom CSS
        delete_option('graphene_custom_css');
	
	// Slider options
	delete_option('graphene_slider_cat');
	delete_option('graphene_slider_postcount');
	delete_option('graphene_slider_img');
	delete_option('graphene_slider_imgurl');
	delete_option('graphene_slider_height');
	delete_option('graphene_slider_speed');
	delete_option('graphene_slider_position');
	delete_option('graphene_slider_disable');
        
        // Front page options
        delete_option('graphene_frontpage_posts_cats');

        // Feed options
        delete_option('graphene_custom_feed_url');
        delete_option('graphene_hide_feed_icon');
	
	// AdSense options
	delete_option('graphene_show_adsense');
	delete_option('graphene_adsense_code');
	delete_option('graphene_adsense_show_frontpage');
	
	// AddThis options
	delete_option('graphene_show_addthis');
	delete_option('graphene_show_addthis_page');
	delete_option('graphene_addthis_code');
	
	// Google Analytics options
	delete_option('graphene_show_ga');
	delete_option('graphene_ga_code');
	
	// Widget area options
	delete_option('graphene_alt_home_sidebar');
	delete_option('graphene_alt_home_footerwidget');
	
	// Footer options
	delete_option('graphene_show_cc');
	delete_option('graphene_copy_text');
	delete_option('graphene_hide_copyright');
	
	delete_option('graphene');
	switch_theme('default', 'default');
	wp_cache_flush();
	
	wp_redirect('themes.php?activated=true');
	exit();
?>