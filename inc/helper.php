<?php
/**
 * Functions hooked to post page.
 *
 * @package Bc Shop
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'bc_business_consulting_custom_static_header', 'bcshop_title_in_custom_header',20 );

if ( ! function_exists( 'bcshop_title_in_custom_header' ) ) :

	/**
	 * Add title in custom header.
	 *
	 * @since 1.0.0
	 */
	function bcshop_title_in_custom_header() {

		if ( is_home() ) {
				echo '<h1 class="display-1">';
				echo bloginfo( 'name' );
				echo '</h1>';
				echo '<div class="subtitle">';
				echo esc_html(get_bloginfo( 'description', 'display' ));
				echo '</div>';
			 
		
		} else if ( function_exists('is_shop') && is_shop() ){
			if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
				echo '<h1 class="display-1">';
				echo esc_html( woocommerce_page_title() );
				echo '</h1>';
				
			}
		}else if( function_exists('is_product_category') && is_product_category() ){
			echo '<h1 class="display-1">';
			echo esc_html( woocommerce_page_title() );
			echo '</h1>';
			echo '<div class="white_text">';
			do_action( 'woocommerce_archive_description' );
			echo '</div>';
			
		}elseif ( is_singular() ) {
			echo '<h1 class="display-1">';
			echo single_post_title( '', false );
			echo '</h1>';
			if( function_exists('is_product') && is_product() ){
				add_action( 'bc_business_consulting_custom_static_header','woocommerce_template_single_price',22 );
				add_action( 'bc_business_consulting_custom_static_header','woocommerce_template_single_rating',24 );
			}
		} elseif ( is_archive() ) {
			the_archive_title( '<h1 class="display-1">', '</h1>' );
		} elseif ( is_search() ) {
			echo '<h1 class="title">';
			printf( /* translators:straing */ esc_html__( 'Search Results for: %s', 'bc-shop-lang' ),  get_search_query() );
			echo '</h1>';
		} elseif ( is_404() ) {
			echo '<h1 class="display-1">';
			esc_html_e( '404 Error', 'bc-shop-lang' );
			echo '</h1>';
		}

	}

endif;


if ( ! function_exists( 'bcshop_product_review_comment_form_args' ) ) :
	add_filter( 'woocommerce_product_review_comment_form_args', 'bcshop_product_review_comment_form_args' );
	/**
	 * Add title in custom header.
	 *
	 * @since 1.0.0
	 */
	function bcshop_product_review_comment_form_args( $comment_form ) {

			$comment_form = array(
						'title_reply'          => have_comments() ? /* translators:straing */ __( 'Add a review', 'bc-shop-lang' ) : sprintf( __( 'Be the first to review &ldquo;%s&rdquo;', 'bc-shop-lang' ), get_the_title() ),
						'title_reply_to'       => /* translators:straing */ __( 'Leave a Reply to %s', 'bc-shop-lang' ),
						'title_reply_before'   => '<div class="section-header comment_reply_header"><h3>',
						'title_reply_after'    => '</h3></div>',
						'comment_notes_after'  => '',
						'fields'               => array(
							
							'author' =>'<div class="row"><div class="form-group col-md-6 col-sm-6">' . '<input id="author" placeholder="' . esc_attr__( 'Your Name', 'bc-shop-lang'  ) . '" name="author"  type="text" value="' .
				esc_attr( $commenter['comment_author'] ) . '" size="30" class="form-control" /><span class="required">*</span>
				</div>',
							'email'  => '<div class="form-group col-md-6 col-sm-6">' . '<input id="email" placeholder="' . esc_attr__( 'Your Email', 'bc-shop-lang'  ) . '" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				'" size="30" class="form-control"   /><span class="required">*</span></div></div>' 
				
							
						),
						'label_submit'  => __( 'Submit Review ', 'bc-shop-lang' ),
						'logged_in_as'  => '',
						'comment_field' => '',
						'class_submit'      => 'submit-review',
						'submit_button' => '<div class="row"><div class="form-group col-md-12">
						<input name="%1$s" id="%2$snn" class="%3$s" value="%4$s" type="submit">
						</div></div>'
					);

					if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
						$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( /* translators:straing */ __( 'You must be <a href="%s">logged in</a> to post a review.', 'bc-shop-lang' ), esc_url( $account_page_url ) ) . '</p>';
					}

					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'bc-shop-lang' ) . '</label><select name="rating" id="rating" aria-required="true" required>
							<option value="">' . esc_html__( 'Rate&hellip;', 'bc-shop-lang' ) . '</option>
							<option value="5">' . esc_html__( 'Perfect', 'bc-shop-lang' ) . '</option>
							<option value="4">' . esc_html__( 'Good', 'bc-shop-lang' ) . '</option>
							<option value="3">' . esc_html__( 'Average', 'bc-shop-lang' ) . '</option>
							<option value="2">' . esc_html__( 'Not that bad', 'bc-shop-lang' ) . '</option>
							<option value="1">' . esc_html__( 'Very poor', 'bc-shop-lang' ) . '</option>
						</select></div>';
					}

					
					 $comment_form['comment_field'] .='<div class="row"><div class="form-group col-md-12 col-sm-12"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"  placeholder="' . esc_attr__( 'Your review', 'bc-shop-lang' ) . '" class="form-control">' .
    '</textarea></div></div>';
	
		return $comment_form;

	}

endif;

