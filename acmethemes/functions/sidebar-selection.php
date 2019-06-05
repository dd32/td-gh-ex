<?php
/**
 * Select sidebar according to the options saved
 *
 * @since AcmePhoto 1.0.0
 *
 * @param null
 * @return string
 *
 */
if ( !function_exists('acmephoto_sidebar_selection') ) :
	function acmephoto_sidebar_selection( ) {
		wp_reset_postdata();
		$acmephoto_customizer_all_values = acmephoto_get_theme_options();
		global $post;
		if(
			isset( $acmephoto_customizer_all_values['acmephoto-single-sidebar-layout'] ) &&
			(
				'left-sidebar' == $acmephoto_customizer_all_values['acmephoto-single-sidebar-layout'] ||
				'both-sidebar' == $acmephoto_customizer_all_values['acmephoto-single-sidebar-layout'] ||
				'middle-col' == $acmephoto_customizer_all_values['acmephoto-single-sidebar-layout'] ||
				'no-sidebar' == $acmephoto_customizer_all_values['acmephoto-single-sidebar-layout']
			)
		){
			$acmephoto_body_global_class = $acmephoto_customizer_all_values['acmephoto-single-sidebar-layout'];
		}
		else{
			$acmephoto_body_global_class= 'right-sidebar';
		}

		if ( acmephoto_is_woocommerce_active() && ( is_product() || is_shop() || is_product_taxonomy() )) {
			if( is_product() ){
				$post_class = get_post_meta( $post->ID, 'acmephoto_sidebar_layout', true );
				$acmephoto_wc_single_product_sidebar_layout = $acmephoto_customizer_all_values['acmephoto-wc-single-product-sidebar-layout'];

				if ( 'default-sidebar' != $post_class ){
					if ( $post_class ) {
						$acmephoto_body_classes = $post_class;
					} else {
						$acmephoto_body_classes = $acmephoto_wc_single_product_sidebar_layout;
					}
				}
				else{
					$acmephoto_body_classes = $acmephoto_wc_single_product_sidebar_layout;

				}
			}
			else{
				if( isset( $acmephoto_customizer_all_values['acmephoto-wc-shop-archive-sidebar-layout'] ) ){
					$acmephoto_archive_sidebar_layout = $acmephoto_customizer_all_values['acmephoto-wc-shop-archive-sidebar-layout'];
					if(
						'right-sidebar' == $acmephoto_archive_sidebar_layout ||
						'left-sidebar' == $acmephoto_archive_sidebar_layout ||
						'both-sidebar' == $acmephoto_archive_sidebar_layout ||
						'middle-col' == $acmephoto_archive_sidebar_layout ||
						'no-sidebar' == $acmephoto_archive_sidebar_layout
					){
						$acmephoto_body_classes = $acmephoto_archive_sidebar_layout;
					}
					else{
						$acmephoto_body_classes = $acmephoto_body_global_class;
					}
				}
				else{
					$acmephoto_body_classes= $acmephoto_body_global_class;
				}
			}
		}
		elseif( is_front_page() ){
			if( isset( $acmephoto_customizer_all_values['acmephoto-front-page-sidebar-layout'] ) ){
				if(
					'right-sidebar' == $acmephoto_customizer_all_values['acmephoto-front-page-sidebar-layout'] ||
					'left-sidebar' == $acmephoto_customizer_all_values['acmephoto-front-page-sidebar-layout'] ||
					'both-sidebar' == $acmephoto_customizer_all_values['acmephoto-front-page-sidebar-layout'] ||
					'middle-col' == $acmephoto_customizer_all_values['acmephoto-front-page-sidebar-layout'] ||
					'no-sidebar' == $acmephoto_customizer_all_values['acmephoto-front-page-sidebar-layout']
				){
					$acmephoto_body_classes = $acmephoto_customizer_all_values['acmephoto-front-page-sidebar-layout'];
				}
				else{
					$acmephoto_body_classes = $acmephoto_body_global_class;
				}
			}
			else{
				$acmephoto_body_classes= $acmephoto_body_global_class;
			}
		}

		elseif ( is_singular() && isset( $post->ID ) ) {
			$post_class = get_post_meta( $post->ID, 'acmephoto_sidebar_layout', true );
			if ( 'default-sidebar' != $post_class ){
				if ( $post_class ) {
					$acmephoto_body_classes = $post_class;
				} else {
					$acmephoto_body_classes = $acmephoto_body_global_class;
				}
			}
			else{
				$acmephoto_body_classes = $acmephoto_body_global_class;
			}

		}
		elseif ( is_archive() ) {
			if( isset( $acmephoto_customizer_all_values['acmephoto-archive-sidebar-layout'] ) ){
				$acmephoto_archive_sidebar_layout = $acmephoto_customizer_all_values['acmephoto-archive-sidebar-layout'];
				if(
					'right-sidebar' == $acmephoto_archive_sidebar_layout ||
					'left-sidebar' == $acmephoto_archive_sidebar_layout ||
					'both-sidebar' == $acmephoto_archive_sidebar_layout ||
					'middle-col' == $acmephoto_archive_sidebar_layout ||
					'no-sidebar' == $acmephoto_archive_sidebar_layout
				){
					$acmephoto_body_classes = $acmephoto_archive_sidebar_layout;
				}
				else{
					$acmephoto_body_classes = $acmephoto_body_global_class;
				}
			}
			else{
				$acmephoto_body_classes= $acmephoto_body_global_class;
			}
		}
		else {
			$acmephoto_body_classes = $acmephoto_body_global_class;
		}
		return $acmephoto_body_classes;
	}
endif;