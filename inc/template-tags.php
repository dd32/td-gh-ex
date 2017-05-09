<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package  basepress
 */





/**
 * Displays credit link on footer line
 */
function display_footer_text() {

	$theme_options = basepress_theme_options();
	$footer_text = trim( $theme_options['footer_text'] );	

		// Display Footer Text.
		if ( ! empty( $footer_text ) ) :

			echo html_entity_decode( $footer_text , ENT_QUOTES );

		else :
		?>

		<span class="credit-link">
			<?php printf( esc_html__( 'Powered by %1$s and %2$s.', 'basepress' ),
				'<a href="http://wordpress.org" title="WordPress">WordPress</a>',
				'<a href="%s" title="base WordPress Theme">Base</a>'
			); ?>
		</span>

	<?php

	endif;
}
add_action( 'basepress_footer_text', 'display_footer_text' );

function display_category_menu() { 

	// Check if there is a footer menu.


	$theme_options = basepress_theme_options(); ?>

		<div <?php if ( $theme_options['sticky_header'] == 1 )   {?> id="sticky"<?php } ?> id="secondary-menu" class="secondary-menu">
			<div class="container clearfix">
				
				<?php if ( has_nav_menu( 'primary' ) ) : ?>

					<span class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Main Navigation', 'basepress' ); ?></span>
				
				<?php endif; ?>

				<?php
					if ( has_nav_menu( 'category' ) ) : ?>

						<nav id="nav-category" class="nav-category" role="navigation">
							<?php
							wp_nav_menu( array(
								'theme_location' 	=> 'category',
								'menu_id' 			=> 'category-navigation',						
								'menu_class' 		=> 'category-navigation',
								'container' 		=> '',
								)
							); ?>
						</nav>
						<?php
					endif;
					?>
			</div>
		</div> <!-- .secondary-menu -->

		<div id="catcher"></div>

	<?php 

}
add_action( 'basepress_category_menu', 'display_category_menu' );











if ( ! function_exists( 'basepress_meta_comments' ) ) :
	/**
	 * Displays the category of posts
	 */
	function basepress_meta_comments() {

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {


    		$txt_comment = '<a href="'. esc_url ( get_comments_link() ) .'">'.get_comments_number_text( __('Leave a Comment', 'basepress'), __('One Comment', 'basepress'), __('% Comments', 'basepress')) . '</a>';

				return '<span class="comments-link">' . $txt_comment . '</span>';				

		}

	}
endif;

if ( ! function_exists( 'basepress_meta_edit_link' ) ) :
	/**
	 * Displays the category of posts
	 */
	function basepress_meta_edit_link() {

		return '<span class="meta-category"> ' . get_the_category_list( ', ' ) . '</span>';

	}
endif;


if ( ! function_exists( 'basepress_more_link' ) ) :
	/**
	 * Displays the more link on posts
	 */
	function basepress_more_link() {
		
		?>

		<a href="<?php echo esc_url( get_permalink() ) ?>"  title="<?php the_title() ?>" class="more-link"><?php esc_html_e( '[Continue Reading ...]', 'basepress' ); ?></a>

		<?php
	}
endif;



function basepress_change_prefix_post_metadata( $prefix ) {

	$prefix ['author'] = __('By ', 'basepress');
	$prefix ['category'] = __('', 'basepress');
	$prefix['date'] = '';
	

	return $prefix; 

}
add_filter( 'basepress_prefix_post_metadata', 'basepress_change_prefix_post_metadata' );


if (!function_exists('basepress_social_icons')) :
/**
 * Social icons 
 */
function basepress_social_icons($position) {
	
	$theme_options = basepress_theme_options();

	if ($theme_options['social_sharing_button'] == 1 ) :

		$social_items = array_flip($theme_options['enable_social_sharing_button']);

		global $post;
		?>

		<div class="tc-social-sharing clearfix <?php echo "$position"; ?>">
			<ul class="tc-social-icons clearfix">		
			<?php if ( isset( $social_items['facebook'] ) ) : ?>	
				<li class="facebook">
					<a href="#" class="facebook" data-social='{"type":"facebook", "url":"<?php echo urlencode(the_permalink()); ?>", "text": "<?php the_title(); ?>"}' title="<?php the_title(); ?>" rel="nofollow"><i class="fa fa-facebook"></i><span class="text">facebook</span></a>
				</li>
			<?php endif; ?>

			<?php if ( isset( $social_items['twitter'] ) ) : ?>	
				<li class="twitter">					
					<a href="#" class="twitter" data-social='{"type":"twitter", "url":"<?php echo urlencode(the_permalink()); ?>&via=<?php echo $theme_options['twitter_username']; ?>", "text": "<?php the_title(); ?>"}' title="<?php the_title(); ?>" rel="nofollow"><i class="fa fa-twitter"></i><span class="text">tweet</span></a>
				</li> 
			<?php endif; ?>
			

			<?php if ( isset( $social_items['googleplus'] ) ) : ?>	
				<li class="googleplus">
					<a href="#" class="plusone" data-social='{"type":"plusone", "url":"<?php echo urlencode(the_permalink()); ?>", "text": "<?php the_title(); ?>"}' title="<?php the_title(); ?>" rel="nofollow"><i class="fa fa-google-plus"></i><span class="text">google+</span></a>
				</li>
			<?php endif; ?>

			<?php if ( isset( $social_items['pinterest'] ) ) : ?>	
				<li class="pinterest">
					<a href="#" class="pinterest" data-social='{"type":"pinterest", "url":"<?php echo urlencode(the_permalink()); ?>", "text": "<?php the_title(); ?>", "image": "<?php if ( has_post_thumbnail() ) { echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); } ?>"}' title="<?php the_title(); ?>" rel="nofollow"><i class="fa fa-pinterest"></i><span class="text">pinterest</span>
					</a>
				</li>
			<?php endif; ?>

			<?php if ( isset( $social_items['linkedin'] ) ) : ?>	
				<li class="linkedin">
					<a href="#" class="linkedin" data-social='{"type":"linkedin", "url":"<?php echo urlencode(the_permalink()); ?>", "text": "<?php the_title(); ?>", "summary": "<?php echo get_the_excerpt(); ?>"}' title="<?php the_title(); ?>" rel="nofollow"><i class="fa fa-linkedin"></i><span class="text">linkedin</span></a>
				</li>
			<?php endif; ?>
		</ul>
	</div>


	<?php		
	endif;
}

endif;
