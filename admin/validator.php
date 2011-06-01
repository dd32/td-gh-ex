<?php
/**
 * Settings Validator
 * 
 * This file defines the function that validates the theme's options
 * upon submission.
*/
function graphene_settings_validator($input){
	
	if (!isset($_POST['graphene_uninstall'])) {
		global $graphene_defaults, $graphene_settings;                               
		
		if (isset($_POST['graphene_general'])) {
			$input['slider_position'] = (isset($input['slider_position'])) ? true : false;
			$input['slider_disable'] = (isset($input['slider_disable'])) ? true : false;
            $input['hide_child_pages'] = (isset($input['hide_child_pages'])) ? true : false;
			$input['enable_header_widget'] = (isset($input['enable_header_widget'])) ? true : false;
			$input['hide_feed_icon'] = (isset($input['hide_feed_icon'])) ? true : false;
			$input['show_adsense'] = (isset($input['show_adsense'])) ? true : false;
			$input['adsense_show_frontpage'] = (isset($input['adsense_show_frontpage'])) ? true : false;
			$input['show_addthis'] = (isset($input['show_addthis'])) ? true : false;
			$input['show_addthis_page'] = (isset($input['show_addthis_page'])) ? true : false;
			$input['show_ga'] = (isset($input['show_ga'])) ? true : false;
			$input['alt_home_sidebar'] = (isset($input['alt_home_sidebar'])) ? true : false;
			$input['alt_home_footerwidget'] = (isset($input['alt_home_footerwidget'])) ? true : false;
			$input['show_cc'] = (isset($input['show_cc'])) ? true : false;
			$input['hide_copyright'] = (isset($input['hide_copyright'])) ? true : false;
            $input['print_css'] = (isset($input['print_css'])) ? true : false;
            $input['print_button'] = (isset($input['print_button'])) ? true : false;
			
			/* Social media */
			$social_media_new = (!empty($input['social_media_new'])) ? $input['social_media_new'] : array();
			if (!empty($social_media_new)){
				$i = 0;
				foreach ($social_media_new as $social_medium){
					if (!empty($social_medium['name'])){
						$slug = sanitize_title($social_medium['name'], $i);
						$input['social_media'][$slug]['name'] = $social_medium['name'];
						$input['social_media'][$slug]['icon'] = $social_medium['icon'];
						$input['social_media'][$slug]['url'] = $social_medium['url'];
						$i++;
					}
				}
			}
			
			/* Homepage panes */
			$input['disable_homepage_panes'] = (isset($input['disable_homepage_panes'])) ? true : false;
			// Remove space
			$input['homepage_panes_posts'] = str_replace(' ', '', $input['homepage_panes_posts']);
		}
		
		if (isset($_POST['graphene_display'])) {
			$input['light_header'] = (isset($input['light_header'])) ? true : false;
			$input['link_header_img'] = (isset($input['link_header_img'])) ? true : false;
			$input['featured_img_header'] = (isset($input['featured_img_header'])) ? true : false;
			$input['use_random_header_img'] = (isset($input['use_random_header_img'])) ? true : false;
			$input['hide_top_bar'] = (isset($input['hide_top_bar'])) ? true : false;
			$input['posts_show_excerpt'] = (isset($input['posts_show_excerpt'])) ? true : false;
			$input['archive_full_content'] = (isset($input['archive_full_content'])) ? true : false;
			$input['hide_post_author'] = (isset($input['hide_post_author'])) ? true : false;
			$input['hide_post_commentcount'] = (isset($input['hide_post_commentcount'])) ? true : false;
			$input['hide_post_cat'] = (isset($input['hide_post_cat'])) ? true : false;
			$input['hide_post_tags'] = (isset($input['hide_post_tags'])) ? true : false;
			$input['show_post_avatar'] = (isset($input['show_post_avatar'])) ? true : false;
			$input['show_post_author'] = (isset($input['show_post_author'])) ? true : false;
			$input['show_excerpt_more'] = (isset($input['show_excerpt_more'])) ? true : false;
			$input['hide_allowedtags'] = (isset($input['hide_allowedtags'])) ? true : false;	
		}
		

		// Merge the settings
		$input = array_merge($graphene_settings, $input);	
	}
	
	return $input;
}
?>