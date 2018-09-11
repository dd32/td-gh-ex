<?php
/*
 * Retreive WooCommerce items for AJAX
 */
function absolutte_load_items(){

	if( isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' == $_SERVER['REQUEST_METHOD'] && ! empty( $_POST['action'] )) {

		//Comprabar que tenga un token correcto para evitar abuso
		if( isset( $_POST['token'] ) && wp_verify_nonce( sanitize_key( $_POST['token'] ), 'quemalabs-secret' ) ){


			if ( isset( $_POST['category'] ) ) {
			    $category = sanitize_text_field( wp_unslash( $_POST['category'] ) );
			}
			if ( isset( $_POST['offset'] ) ) {
			    $offset = intval( wp_unslash( $_POST['offset'] ) );
			}
			$product_amout = get_theme_mod( 'absolutte_shop_products_amount', '12' );

			$args = array(
				'posts_per_page' => $product_amout,
				'post_type' => 'product',
				'orderby' => 'menu_order title',
				'order'   => 'ASC',
				'post_status' => 'publish'
			);
			//Use the user selected sortering
			$args = array_merge( $args, WC()->query->get_catalog_ordering_args() );

			if ( 'all' != $category ) {
				$args['tax_query'] = array(
					array(
						'taxonomy' => 'product_cat',
						'field'    => 'slug',
						'terms'    => $category,
					),
				);
			}
			
			if ( $offset ) {
				$args['offset'] = $offset;
				$args['posts_per_page'] = ( $product_amout / 2 );
			}
			// The Query
			$the_query = new WP_Query( $args );

			// The Loop
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					wc_get_template_part( 'content', 'product' );
				}
			} else {
				// no posts found
			}
			/* Restore original Post Data */
			wp_reset_postdata();
			wp_die();


		}else{

			wp_send_json_error( 'Ivalid nonce' ); //This do not render to the front-end

		}//end token

	} // end IF

}// absolutte_load_items()

add_action( 'wp_ajax_nopriv_absolutte_load_items', 'absolutte_load_items' );
add_action( 'wp_ajax_absolutte_load_items', 'absolutte_load_items' );



/*
 * Retreive Portfolio items for AJAX
 */
function absolutte_load_portfolio_items(){

	if( isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' == $_SERVER['REQUEST_METHOD'] && ! empty( $_POST['action'] )) {

		//Comprabar que tenga un token correcto para evitar abuso
		if( isset( $_POST['token'] ) && wp_verify_nonce( sanitize_key( $_POST['token'] ), 'quemalabs-secret' ) ){

			if ( isset( $_POST['category'] ) ) {
			    $category = sanitize_text_field( wp_unslash( $_POST['category'] ) );
			}
			if ( isset( $_POST['portfolio_type'] ) ) {
			    $portfolio_type = sanitize_text_field( wp_unslash( $_POST['portfolio_type'] ) );
			}
			if ( isset( $_POST['post_type'] ) ) {
			    $post_type = sanitize_text_field( wp_unslash( $_POST['post_type'] ) );
			}
			if ( isset( $_POST['offset'] ) ) {
			    $offset = intval( wp_unslash( $_POST['offset'] ) );
			}
			$product_amout = get_theme_mod( 'absolutte_portfolio_items_amount', 12 );
			$args = array(
				'posts_per_page' => $product_amout,
				'post_type' => $post_type,
				'post_status' => 'publish'
			);
			if ( 'all' != $category ) {
				$args['tax_query'] = array(
					array(
						'taxonomy' => $post_type . '_category',
						'field'    => 'slug',
						'terms'    => $category,
					),
				);
			}
			if ( $offset ) {
				$args['offset'] = $offset;
				$args['posts_per_page'] = 3;
			}
			// The Query
			$the_query = new WP_Query( $args );



			// The Loop
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					if( 'thirds' == $portfolio_type ){
						get_template_part( 'template-parts/content-portfolio', 'thirds' );
					}else{
						get_template_part( 'template-parts/content-portfolio', 'portfolio' );	
					}
				}
			} else {
				// no posts found
			}
			/* Restore original Post Data */
			wp_reset_postdata();
			wp_die();


		}else{

			wp_send_json_error( 'Ivalid nonce' ); //This do not render to the front-end

		}//end token

	} // end IF

}// absolutte_load_portfolio_items()

add_action( 'wp_ajax_nopriv_absolutte_load_portfolio_items', 'absolutte_load_portfolio_items' );
add_action( 'wp_ajax_absolutte_load_portfolio_items', 'absolutte_load_portfolio_items' );





/*
 * Retreive WooCommerce content for Product View
 */
function absolutte_product_view_desc(){

	if( isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' == $_SERVER['REQUEST_METHOD'] && ! empty( $_POST['action'] )) {

		//Comprabar que tenga un token correcto para evitar abuso
		if( isset( $_POST['token'] ) && wp_verify_nonce( sanitize_key( $_POST['token'] ), 'quemalabs-secret' ) ){


			if ( isset( $_POST['product_id'] ) ) {
			    $product_id = sanitize_text_field( wp_unslash( $_POST['product_id'] ) );
			}

			//If using WPML
			global $sitepress;
			if ( isset( $_POST['lang'] ) ) {
			    $lang = sanitize_text_field( wp_unslash( $_POST['lang'] ) );
			}
			if ( $sitepress ) {
				$sitepress->switch_lang( $lang );
			}
			

			$args = array(
				'posts_per_page' => 1,
				'post_type' => 'product',
				'orderby' => 'menu_order title',
				'order'   => 'ASC',
				'post_status' => 'publish',
				'p' => $product_id
			);
			// The Query
			$the_query = new WP_Query( $args );

			// The Loop
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post();

					echo '<div class="summary entry-summary">';
						echo '<a href="' . esc_url( get_permalink( $product_id ) ) . '" class="absolutte-product-link"><i class="absolutte-icon-launch"></i></a>';

							//do_action( 'woocommerce_single_product_summary' );

							global $product;

							/**
							* This is a secuence onf functions similar to the action 'woocommerce_single_product_summary',
							* but with change to work in the product view of the theme.
							*/
							absolutte_single_product_wrap_start_summary();
							woocommerce_template_single_title();
							woocommerce_template_single_price(); 
							woocommerce_template_single_excerpt(); 

							//We only add quantity input if is a Simple product.
							// Varaible products are more complex so is better to handle those in the single page
							if ( 'simple' == $product->get_type() ) {
								
								/**
								* @since 3.0.0.
								*/
								do_action( 'woocommerce_before_add_to_cart_quantity' );

								woocommerce_quantity_input( array(
								'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
								'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
								'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : $product->get_min_purchase_quantity(),
								) );

								/**
								* @since 3.0.0.
								*/
								do_action( 'woocommerce_after_add_to_cart_quantity' );

							}

							woocommerce_template_loop_add_to_cart(); 
							woocommerce_template_single_sharing(); 
							absolutte_single_product_wrap_end_summary();
							//WC_Structured_Data::generate_product_data(); 


							//woocommerce_template_loop_add_to_cart();

					echo '</div><!-- .summary -->';
				}
			} else {
				// no posts found
			}
			/* Restore original Post Data */
			wp_reset_postdata();
			wp_die();


		}else{

			wp_send_json_error( 'Ivalid nonce' ); //This do not render to the front-end

		}//end token

	} // end IF

}// absolutte_product_view_desc()

add_action( 'wp_ajax_nopriv_absolutte_product_view_desc', 'absolutte_product_view_desc' );
add_action( 'wp_ajax_absolutte_product_view_desc', 'absolutte_product_view_desc' );




/**
 * Adds product class for ajax
 */
function absolutte_add_product_class( $classes ) {

	if( 'product' == get_post_type() ){
		$classes[] = 'product';
	}
	return $classes;
}
add_filter( 'post_class', 'absolutte_add_product_class' );
