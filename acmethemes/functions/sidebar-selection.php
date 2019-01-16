<?php
/**
 * Select sidebar according to the options saved
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return string
 *
 */
if ( !function_exists('acmeblog_sidebar_selection') ) :
	function acmeblog_sidebar_selection( ) {
		wp_reset_postdata();
		$acmeblog_customizer_all_values = acmeblog_get_theme_options();
		global $post;
		if(
			isset( $acmeblog_customizer_all_values['acmeblog-sidebar-layout'] ) &&
			(
				'left-sidebar' == $acmeblog_customizer_all_values['acmeblog-sidebar-layout'] ||
				'both-sidebar' == $acmeblog_customizer_all_values['acmeblog-sidebar-layout'] ||
				'middle-col' == $acmeblog_customizer_all_values['acmeblog-sidebar-layout'] ||
				'no-sidebar' == $acmeblog_customizer_all_values['acmeblog-sidebar-layout']
			)
		){
			$acmeblog_body_global_class = $acmeblog_customizer_all_values['acmeblog-sidebar-layout'];
		}
		else{
			$acmeblog_body_global_class= 'right-sidebar';
		}

		if ( acmeblog_is_woocommerce_active() && ( is_product() || is_shop() || is_product_taxonomy() )) {
			if( is_product() ){
				$post_class = get_post_meta( $post->ID, 'acmeblog_sidebar_layout', true );
				$acmeblog_wc_single_product_sidebar_layout = $acmeblog_customizer_all_values['acmeblog-wc-single-product-sidebar-layout'];

				if ( 'default-sidebar' != $post_class ){
					if ( $post_class ) {
						$acmeblog_body_classes = $post_class;
					} else {
						$acmeblog_body_classes = $acmeblog_wc_single_product_sidebar_layout;
					}
				}
				else{
					$acmeblog_body_classes = $acmeblog_wc_single_product_sidebar_layout;

				}
			}
			else{
				if( isset( $acmeblog_customizer_all_values['acmeblog-wc-shop-archive-sidebar-layout'] ) ){
					$acmeblog_archive_sidebar_layout = $acmeblog_customizer_all_values['acmeblog-wc-shop-archive-sidebar-layout'];
					if(
						'right-sidebar' == $acmeblog_archive_sidebar_layout ||
						'left-sidebar' == $acmeblog_archive_sidebar_layout ||
						'both-sidebar' == $acmeblog_archive_sidebar_layout ||
						'middle-col' == $acmeblog_archive_sidebar_layout ||
						'no-sidebar' == $acmeblog_archive_sidebar_layout
					){
						$acmeblog_body_classes = $acmeblog_archive_sidebar_layout;
					}
					else{
						$acmeblog_body_classes = $acmeblog_body_global_class;
					}
				}
				else{
					$acmeblog_body_classes= $acmeblog_body_global_class;
				}
			}
		}
		elseif( is_front_page() ){
			if( isset( $acmeblog_customizer_all_values['acmeblog-front-page-sidebar-layout'] ) ){
				if(
					'right-sidebar' == $acmeblog_customizer_all_values['acmeblog-front-page-sidebar-layout'] ||
					'left-sidebar' == $acmeblog_customizer_all_values['acmeblog-front-page-sidebar-layout'] ||
					'both-sidebar' == $acmeblog_customizer_all_values['acmeblog-front-page-sidebar-layout'] ||
					'middle-col' == $acmeblog_customizer_all_values['acmeblog-front-page-sidebar-layout'] ||
					'no-sidebar' == $acmeblog_customizer_all_values['acmeblog-front-page-sidebar-layout']
				){
					$acmeblog_body_classes = $acmeblog_customizer_all_values['acmeblog-front-page-sidebar-layout'];
				}
				else{
					$acmeblog_body_classes = $acmeblog_body_global_class;
				}
			}
			else{
				$acmeblog_body_classes= $acmeblog_body_global_class;
			}
		}

		elseif ( is_singular() && isset( $post->ID ) ) {
			$post_class = get_post_meta( $post->ID, 'acmeblog_sidebar_layout', true );
			if ( 'default-sidebar' != $post_class ){
				if ( $post_class ) {
					$acmeblog_body_classes = $post_class;
				} else {
					$acmeblog_body_classes = $acmeblog_body_global_class;
				}
			}
			else{
				$acmeblog_body_classes = $acmeblog_body_global_class;
			}

		}
		elseif ( is_archive() ) {
			if( isset( $acmeblog_customizer_all_values['acmeblog-archive-sidebar-layout'] ) ){
				$acmeblog_archive_sidebar_layout = $acmeblog_customizer_all_values['acmeblog-archive-sidebar-layout'];
				if(
					'right-sidebar' == $acmeblog_archive_sidebar_layout ||
					'left-sidebar' == $acmeblog_archive_sidebar_layout ||
					'both-sidebar' == $acmeblog_archive_sidebar_layout ||
					'middle-col' == $acmeblog_archive_sidebar_layout ||
					'no-sidebar' == $acmeblog_archive_sidebar_layout
				){
					$acmeblog_body_classes = $acmeblog_archive_sidebar_layout;
				}
				else{
					$acmeblog_body_classes = $acmeblog_body_global_class;
				}
			}
			else{
				$acmeblog_body_classes= $acmeblog_body_global_class;
			}
		}
		else {
			$acmeblog_body_classes = $acmeblog_body_global_class;
		}
		return $acmeblog_body_classes;
	}
endif;