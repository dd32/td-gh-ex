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



if( ! function_exists( 'bcshop_footer_layout' ) ) :
	/**
	* Navigtion And Header Title
	*
	*/
	function bcshop_footer_layout() {
	?>
   
   	<footer class="footer-main ">
    	<?php if ( is_active_sidebar( 'footer' ) ) { ?>
		<div class="container">
			<div class="row">
				<?php dynamic_sidebar( 'footer' ); ?>
			</div>
		</div>
        <?php }?>
        
		<div class="footer-bottom">
			<div class="container">
              <div class="row">
                   
                  <div class="col-md-7 col-sm-7"> 
                    
                    <div class="pull-left">
                    	<?php  echo esc_html ( bc_business_consulting_get_option('copyright_text') ); ?>
                        <a href="<?php /* translators:straing */ echo esc_url( esc_html__( 'https://wordpress.org/', 'bc-shop' ) ); ?>"><?php /* translators:straing */  printf( esc_html__( 'Proudly powered by %s .', 'bc-shop' ), 'WordPress' ); ?></a>
                        
                        <?php
                        printf( /* translators:straing */  esc_html__( 'Theme: %1$s by %2$s.', 'bc-shop' ), 'BC SHOP', '<a href="' . esc_url( __( 'https://athemeart.com', 'bc-shop' ) ) . '" target="_blank">' . esc_html__( 'aThemeArt', 'bc-shop' ) . '</a>' ); ?>
                    </div>
				  </div>
                  
                   <div class="col-md-5 col-sm-5"> 
					<?php
                    wp_nav_menu( array(
                        'theme_location'    => 'top_menu',
                        'depth'             => 1,
						'fallback_cb'    => 'bc_business_consulting_default_menu',
						'container' 	 => '',
                        )
                    );
					
                    ?>
                   </div> 
                    
			   </div>
			</div>
		</div>
	</footer><!-- Footer Main /- -->
   
     <?php
	}
	add_action( 'bc_business_consulting_footer_layout', 'bcshop_footer_layout',10 );
endif;



 if ( ! function_exists( 'bcshop_posts_formats_thumbnail' ) ) :

	/**
	 * Post formats thumbnail.
	 *
	 * @since 1.0.0
	 */
	function bcshop_posts_formats_thumbnail() {
	?>
		<?php if ( has_post_thumbnail() ) :
			$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
			$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
			$formats = get_post_format(get_the_ID());
		?>
           <div class="entry-cover <?php echo esc_attr( $formats );?>">
           		<?php if ( is_singular() ) :?>
               		 <a href="<?php echo esc_url( $post_thumbnail_url );?>" class="image-popup">
                <?php else: ?>
                	<a href="<?php echo esc_url( get_permalink() );?>" class="image-link">
                <?php endif;?>
                	<i class="fa fa-plus"></i>
                </a>
                <?php the_post_thumbnail('full');?>
            </div>
         <?php else:?>
        	<div class="entry-cover <?php echo esc_attr( $formats );?>">
                <a href="<?php echo esc_url( get_permalink() );?>" class="image-link">
                <i class="fa fa-plus"></i>
                </a>
                <img src="<?php echo esc_url( get_stylesheet_directory_uri().'/assets/default.png' );?>" alt="<?php echo esc_attr( get_the_title() );?>" title="<?php echo esc_attr( get_the_title() );?>" />
            </div>
        <?php endif;?>  
	<?php
	}

endif;
add_action( 'bc_business_consulting_posts_formats_thumbnail', 'bcshop_posts_formats_thumbnail' );

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
			printf( /* translators:straing */ esc_html__( 'Search Results for: %s', 'bc-shop' ),  get_search_query() );
			echo '</h1>';
		} elseif ( is_404() ) {
			echo '<h1 class="display-1">';
			esc_html_e( '404 Error', 'bc-shop' );
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
						'title_reply'          => have_comments() ? /* translators:straing */ __( 'Add a review', 'bc-shop' ) : sprintf( __( 'Be the first to review &ldquo;%s&rdquo;', 'bc-shop' ), get_the_title() ),
						'title_reply_to'       => /* translators:straing */ __( 'Leave a Reply to %s', 'bc-shop' ),
						'title_reply_before'   => '<div class="section-header comment_reply_header"><h3>',
						'title_reply_after'    => '</h3></div>',
						'comment_notes_after'  => '',
						'fields'               => array(
							
							'author' =>'<div class="row"><div class="form-group col-md-6 col-sm-6">' . '<input id="author" placeholder="' . esc_attr__( 'Your Name', 'bc-shop'  ) . '" name="author"  type="text" value="' .
				esc_attr( $commenter['comment_author'] ) . '" size="30" class="form-control" /><span class="required">*</span>
				</div>',
							'email'  => '<div class="form-group col-md-6 col-sm-6">' . '<input id="email" placeholder="' . esc_attr__( 'Your Email', 'bc-shop'  ) . '" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				'" size="30" class="form-control"   /><span class="required">*</span></div></div>' 
				
							
						),
						'label_submit'  => __( 'Submit Review ', 'bc-shop' ),
						'logged_in_as'  => '',
						'comment_field' => '',
						'class_submit'      => 'submit-review',
						'submit_button' => '<div class="row"><div class="form-group col-md-12">
						<input name="%1$s" id="%2$snn" class="%3$s" value="%4$s" type="submit">
						</div></div>'
					);

					if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
						$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( /* translators:straing */ __( 'You must be <a href="%s">logged in</a> to post a review.', 'bc-shop' ), esc_url( $account_page_url ) ) . '</p>';
					}

					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'bc-shop' ) . '</label><select name="rating" id="rating" aria-required="true" required>
							<option value="">' . esc_html__( 'Rate&hellip;', 'bc-shop' ) . '</option>
							<option value="5">' . esc_html__( 'Perfect', 'bc-shop' ) . '</option>
							<option value="4">' . esc_html__( 'Good', 'bc-shop' ) . '</option>
							<option value="3">' . esc_html__( 'Average', 'bc-shop' ) . '</option>
							<option value="2">' . esc_html__( 'Not that bad', 'bc-shop' ) . '</option>
							<option value="1">' . esc_html__( 'Very poor', 'bc-shop' ) . '</option>
						</select></div>';
					}

					
					 $comment_form['comment_field'] .='<div class="row"><div class="form-group col-md-12 col-sm-12"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"  placeholder="' . esc_attr__( 'Your review', 'bc-shop' ) . '" class="form-control">' .
    '</textarea></div></div>';
	
		return $comment_form;

	}

endif;

