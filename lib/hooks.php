<?php
/**
 * Filter and actions for Raindrops theme
 *
 *
 * @package Raindrops
 * @since Raindrops 0.948
 */
add_action( 'after_setup_theme', 'raindrops_theme_setup' );
if ( !function_exists( 'raindrops_theme_setup' ) ) {

    function raindrops_theme_setup() {
        global $raindrops_wp_version;
        add_filter( 'use_default_gallery_style', '__return_false' );
        /**
         *
         *
         *
         *
         *
         */
        add_action( 'load-themes.php', 'raindrops_install_navigation' );
        /**
         *
         *
         *
         *
         *
         */
		if( is_admin() && isset($_GET['post']) && !empty($_GET['post'])){
			$raindrops_post_id = absint( $_GET['post'] );
			add_editor_style( array('editor-style.css', add_query_arg( array('action'=>'raindrops_editor_styles','id'=> $raindrops_post_id ), admin_url( 'admin-ajax.php' ) ) ) );
		} else {
			add_editor_style( array('editor-style.css', add_query_arg( 'action','raindrops_editor_styles', admin_url( 'admin-ajax.php' ) ) ) );
		}
        /**
         *
         *
         *
         *
         * thanks ison
         */
        add_filter( 'wp_page_menu_args', 'raindrops_page_menu_args' );
        /**
         *
         *
         *
         *
         *
         */
        /* 		if (  $raindrops_wp_version < '3.4'  ) {
          add_filter( "wp_head", "raindrops_embed_meta", '90' );
          } */
        /**
         *
         *
         *
         *
         *
         */
        add_filter( 'comment_form_default_fields', 'raindrops_comment_form' );
        /**
         *
         *
         *
         *
         *
         */
        add_filter( 'the_meta_key', 'raindrops_filter_explode_meta_keys', 10, 2 );
        /**
         *
         *
         *
         *
         *
         */
        add_filter( 'body_class', 'raindrops_add_body_class' );
        /**
         *
         *
         *
         *
         *
         */
        add_filter( 'comment_form_field_comment', 'raindrops_custom_remove_aria_required' );
        /**
         *
         *
         *
         *
         *
         */
        add_filter( 'the_meta_key', 'raindrops_filter_explode_meta_keys', 10, 2 );
        /**
         *
         *
         *
         *
         *
         */
        add_filter( 'the_title', 'raindrops_fallback_title', 10, 2 );
        /**
         *
         *
         *
         *
         *
         */
        add_filter( 'the_content', 'raindrops_ie_height_expand_issue' );
        /**
         *
         *
         *
         * 	@since 1.100
         */
        add_filter( 'widget_text', 'raindrops_ie_height_expand_issue' );
        /**
         *
         *
         *
         *
         *
         */
        //    if (  !is_admin(  )  ) {
        // add_action( 'wp_print_styles', 'add_raindrops_stylesheet' );
        //    }

        /**
         *
         *
         *
         *
         *
         */
        add_action( 'admin_init', 'raindrops_options_init' );
        /**
         *
         *
         *
         *
         *
         */
        add_filter( 'wp_title', 'raindrops_filter_title', 10, 3 );
        /**
         *
         *
         *
         *
         * @since 0.956
         */
        add_action( 'wp_enqueue_scripts', 'raindrops_enqueue_comment_reply' );
        /**
         *
         *
         *
         *
         * @since 0.956
         */
        add_action( 'customize_controls_print_styles', 'raindrops_customize_controls_print_styles' );
        /**
         *
         *
         *
         *
         * @since 0.964 ?
         */
        add_filter( 'widget_text', 'do_shortcode' );
        /**
         *
         *
         *
         * @since 0.992
         */
        add_action( 'wp_head', 'raindrops_mobile_meta' );
        /**
         * Switch elements from div to figure when doctype html5
         *
         *
         * @since 1.003
         */
        add_filter( 'img_caption_shortcode', 'raindrops_img_caption_shortcode_filter', 10, 3 );
        /**
         * Archive link title add string 'Archives ' for for screen reader
         *
         *
         * @since 1.008
         */
        add_filter( 'get_archives_link', 'raindrops_accessible_titled' );
        /**
         *
         *
         *
         * @since 1.008
         */
        add_filter( 'the_category', 'raindrops_remove_category_rel' );
        /**
         *
         *
         *
         * @since 1.136
         */
        add_filter( 'theme_mod_header_textcolor', 'raindrops_filter_header_text_color' );
        /**
         *
         *
         *
         * @since 1.211
         */
        add_action( 'wp_footer', 'raindrops_status_bar' );
        /*
         *
         *
         *
         * @since 1.217
         */
        add_filter( 'query_vars', 'raindrops_extend_query' );
        /**
         *
         *
         *
         *
         * @since 1.220
         */
        add_filter( 'raindrops_base_font_size', 'raindrops_base_font_size' );
        /**
         *
         *
         *
         *
         * @since 1.229
         */
        add_filter( 'widget_tag_cloud_args', 'raindrops_widget_tag_cloud_args' );
        /**
         *
         *
         *
         *
         * @since 1.233
         */

        add_filter( 'sidebars_widgets', 'raindrops_widget_ids' );
        add_filter( 'the_content', 'raindrops_remove_wrong_p_before', 9 );
        add_filter( 'the_content', 'raindrops_remove_wrong_p', 11 );
        /**
         *
         *
         *
         *
         * @since 1.234
         */
        if ( is_admin() ) {

            add_action( 'load-post.php', 'raindrops_call_custom_css' );
            add_action( 'load-post-new.php', 'raindrops_call_custom_css' );
        }
        /**
         *
         *
         *
         *
         * @since 1.238
         */
         add_action( 'widgets_init', 'raindrops_register_recent_post_group_by_category' );
         add_action( 'widgets_init', 'raindrops_register_pinup_entry_Widget' );
        /**
         *
         *
         *
         *
         * @since 1.246
         */
		add_filter( 'embed_oembed_html', 'raindrops_oembed_filter', 99, 4 );
		add_action( 'save_post', 'raindrops_transient_update' );
		add_action( 'edit_term', 'raindrops_transient_update' );
		add_action( 'wp_enqueue_scripts', 'raindrops_load_small_device_helper' );
		 /**
         *
         * @since 1.261
         */
		 add_filter( 'wp_headers', 'raindrops_wp_headers', 10, 2 );
				
    }

}
?>