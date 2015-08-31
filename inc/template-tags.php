<?php
/***
 * Template Tags
 *
 * This file contains several template functions which are used to print out specific HTML markup
 * in the theme. You can override these template functions within your child theme.
 *
 */
	

// Display Site Title
add_action( 'rubine_site_title', 'rubine_display_site_title' );

function rubine_display_site_title() { ?>

	<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
		<h1 class="site-title"><?php bloginfo('name'); ?></h1>
	</a>

<?php
}


// Display Custom Header
if ( ! function_exists( 'rubine_display_custom_header' ) ):
	
	function rubine_display_custom_header() {
		
		// Check if page is displayed and featured header image is used
		if( is_page() && has_post_thumbnail() ) :
		?>
			<div id="custom-header-image" class="container featured-header-image">
				<?php the_post_thumbnail('featured-header-image'); ?>
			</div>
<?php
		// Check if there is a custom header image
		elseif( get_header_image() ) :
		?>
			<div id="custom-header-image" class="container">
				<img src="<?php echo get_header_image(); ?>" />
			</div>
<?php 
		endif;

	}
	
endif;


// Display Subtitle
function rubine_display_subtitle() {
	
	if ( function_exists( 'the_subtitle' ) ) :
		
		the_subtitle( '<p class="subtitle">', '</p>' );
	
	endif;
	
}


// Display Postmeta Data
if ( ! function_exists( 'rubine_display_postmeta' ) ) :

	function rubine_display_postmeta() {
		
		// Get Theme Options from Database
		$theme_options = rubine_theme_options();

		// Display Date unless user has deactivated it via settings
		if ( isset($theme_options['meta_date']) and $theme_options['meta_date'] == true ) : ?>
		
			<span class="meta-date">
			<?php printf('<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date published updated" datetime="%3$s">%4$s</time></a>', 
					esc_url( get_permalink() ),
					esc_attr( get_the_time() ),
					esc_attr( get_the_date( 'c' ) ),
					esc_html( get_the_date() )
				);
			?>
			</span>
		
		<?php endif; 
		
		// Display Author unless user has deactivated it via settings
		if ( isset($theme_options['meta_author']) and $theme_options['meta_author'] == true ) : ?>		
			
			<span class="meta-author author vcard">
			<?php printf('<a class="fn" href="%1$s" title="%2$s" rel="author">%3$s</a>', 
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					esc_attr( sprintf( __( 'View all posts by %s', 'rubine-lite' ), get_the_author() ) ),
					get_the_author()
				);
			?>
			</span>
			
		<?php endif; 
		
		// Display Author unless user has deactivated it via settings
		if ( isset($theme_options['meta_category']) and $theme_options['meta_category'] == true ) : ?>
		
			<span class="meta-category">
				<?php echo get_the_category_list(', '); ?>
			</span>
		
		<?php endif;
		
		// Display Comments
		if ( comments_open() ) : ?>
			
			<span class="meta-comments">
				<?php comments_popup_link( __('Leave a comment', 'rubine-lite'),__('One comment','rubine-lite'),__('% comments','rubine-lite') ); ?>
			</span>
			
		<?php endif;

	}

endif;


// Display Post Thumbnail on single posts
function rubine_display_thumbnail_single() {
	
	// Get Theme Options from Database
	$theme_options = rubine_theme_options();
	
	// Display Post Thumbnail if activated
	if ( isset($theme_options['post_thumbnails_single']) and $theme_options['post_thumbnails_single'] == true ) :

		the_post_thumbnail('post-thumbnail', array('class' => 'alignleft'));

	endif;

}


// Display Post Tags
if ( ! function_exists( 'rubine_display_post_tags' ) ):
	
	function rubine_display_post_tags() {
		
		// Get Theme Options from Database
		$theme_options = rubine_theme_options();

		// Display Date unless user has deactivated it via settings
		if ( isset($theme_options['meta_tags']) and $theme_options['meta_tags'] == true ) :
		
			$tag_list = get_the_tag_list('<ul><li>','</li><li>','</li></ul>');
			
			if ( $tag_list ) : 

				echo $tag_list;
			
			endif; 	
			
		endif;
		
	}
	
endif;

	
// Display Content Pagination
if ( ! function_exists( 'rubine_display_pagination' ) ):
	
	function rubine_display_pagination() { 
		
		global $wp_query;

		$big = 999999999; // need an unlikely integer
		
		 $paginate_links = paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',				
				'current' => max( 1, get_query_var( 'paged' ) ),
				'total' => $wp_query->max_num_pages,
				'next_text' => '&raquo;',
				'prev_text' => '&laquo',
				'add_args' => false
			) );

		// Display the pagination if more than one page is found
		if ( $paginate_links ) : ?>
				
			<div class="post-pagination clearfix">
				<?php echo $paginate_links; ?>
			</div>
		
		<?php
		endif;
		
	}
	
endif;


// Display Footer Text
add_action( 'rubine_footer_text', 'rubine_display_footer_text' );

function rubine_display_footer_text() { ?>

	<span class="credit-link">
		<?php printf( __( 'Powered by %1$s and %2$s.', 'rubine-lite' ), 
			'<a href="http://wordpress.org" title="WordPress">WordPress</a>',
			'<a href="http://themezee.com/themes/rubine/" title="Rubine WordPress Theme">Rubine</a>'
		); ?>
	</span>

<?php
}


// Display Social Icons
function rubine_display_social_icons() {

	// Check if there is a social_icons menu
	if( has_nav_menu( 'social' ) ) :

		// Display Social Icons Menu
		wp_nav_menu( array(
			'theme_location' => 'social',
			'container' => false,
			'menu_class' => 'social-icons-menu',
			'echo' => true,
			'fallback_cb' => '',
			'before' => '',
			'after' => '',
			'link_before' => '<span class="screen-reader-text">',
			'link_after' => '</span>',
			'depth' => 1
			)
		);

	else: // Display Hint how to configure Social Icons ?>

		<p class="social-icons-hint">
			<?php _e('Please go to Appearance &#8594; Menus and create a new custom menu with custom links to all your social networks. Then click on "Manage Locations" tab and assign your created menu to the "Social Icons" location.', 'rubine-lite'); ?>
		</p>
<?php
	endif;

}


?>