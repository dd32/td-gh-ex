<?php
/***
 * Template Tags
 *
 * This file contains several template functions which are used to print out specific HTML markup
 * in the theme. You can override these template functions within your child theme.
 *
 */
	

// Display Site Title
add_action( 'courage_site_title', 'courage_display_site_title' );

function courage_display_site_title() { ?>

	<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
		<h1 class="site-title"><?php bloginfo('name'); ?></h1>
	</a>

<?php
}


// Display Custom Header
if ( ! function_exists( 'courage_display_custom_header' ) ):
	
	function courage_display_custom_header() {
		
		// Don't display header image on template-magazine.php
		if( is_page_template('template-magazine.php') )
			return;
			
		// Check if page is displayed and featured header image is used
		if( is_page() && has_post_thumbnail() ) :
		?>
			<div id="custom-header" class="featured-image-header">
				<?php the_post_thumbnail('courage-header-image'); ?>
			</div>
<?php
		// Check if there is a custom header image
		elseif( get_header_image() ) :
		?>
			<div id="custom-header">
				<img src="<?php echo get_header_image(); ?>" />
			</div>
<?php 
		endif;

	}
	
endif;


// Display Postmeta Data
if ( ! function_exists( 'courage_display_postmeta' ) ):
	
	function courage_display_postmeta() { 
	
		// Get Theme Options from Database
		$theme_options = courage_theme_options();

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
					esc_attr( sprintf( __( 'View all posts by %s', 'courage' ), get_the_author() ) ),
					get_the_author()
				);
			?>
			</span>
		
		<?php endif; 
		
		if ( comments_open() ) : ?>
			
			<span class="meta-comments">
				<?php comments_popup_link( __('Leave a comment', 'courage'),__('One comment','courage'),__('% comments','courage') ); ?>
			</span>
			
<?php endif;

		edit_post_link(__( 'Edit Post', 'courage' ));
	}
	
endif;


// Display Post Thumbnail on Archive Pages
function courage_display_thumbnail_index() {
	
	// Get Theme Options from Database
	$theme_options = courage_theme_options();
	
	// Display Post Thumbnail if activated
	if ( isset($theme_options['post_thumbnails_index']) and $theme_options['post_thumbnails_index'] == true ) : ?>

		<a href="<?php esc_url(the_permalink()) ?>" rel="bookmark">
			<?php the_post_thumbnail('post-thumbnail'); ?>
		</a>

<?php
	endif;

}


// Display Post Thumbnail on single posts
function courage_display_thumbnail_single() {
	
	// Get Theme Options from Database
	$theme_options = courage_theme_options();
	
	// Display Post Thumbnail if activated
	if ( isset($theme_options['post_thumbnails_single']) and $theme_options['post_thumbnails_single'] == true ) :

		the_post_thumbnail('post-thumbnail');

	endif;

}


// Display Postinfo Data
if ( ! function_exists( 'courage_display_postinfo' ) ):
	
	function courage_display_postinfo() { 
	
		// Get Theme Options from Database
		$theme_options = courage_theme_options();
		
		if ( $theme_options['meta_category'] == true or $theme_options['meta_tags'] == true ) : ?>
		
			<div class="postinfo clearfix">
			
			<?php // Display Categories unless user has deactivated it via settings
			if ( $theme_options['meta_category'] == true ) : ?>
			
				<span class="meta-category">
					<?php printf('%1$s', get_the_category_list(', ')); ?>
				</span>
		
			<?php endif;
			
			// Display Tags unless user has deactivated it via settings
			if ( $theme_options['meta_tags'] == true ) :
			
				$tag_list = get_the_tag_list('', ', ');
				if ( $tag_list ) : ?>
				
					<span class="meta-tags">
						<?php echo $tag_list; ?>
					</span>
				
				<?php endif; 
			
			endif; ?>
			
			</div>
			
		<?php endif;
	
	}
	
endif;


	
// Display Content Pagination
if ( ! function_exists( 'courage_display_pagination' ) ):
	
	function courage_display_pagination() { 
		
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
add_action( 'courage_footer_text', 'courage_display_footer_text' );

function courage_display_footer_text() { ?>

	<span class="credit-link">
		<?php printf( __( 'Powered by %1$s and %2$s.', 'courage' ),  
			'<a href="http://wordpress.org" title="WordPress">WordPress</a>',
			'<a href="http://themezee.com/themes/courage/" title="Courage WordPress Theme">Courage</a>'
		); ?>
	</span>

<?php
}


// Display Social Icons
function courage_display_social_icons() {

	// Check if there is a social_icons menu
	if( has_nav_menu( 'social' ) ) :

		// Display Social Icons Menu
		wp_nav_menu( array(
			'theme_location' => 'social',
			'container' => false,
			'menu_id' => 'social-icons-menu',
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
			<?php _e('Please go to Appearance &#8594; Menus and create a new custom menu with custom links to all your social networks. Then click on "Manage Locations" tab and assign your created menu to the "Social Icons" location.', 'courage'); ?>
		</p>
<?php
	endif;

}


// Custom Template for comments and pingbacks.
if ( ! function_exists( 'courage_list_comments' ) ):
function courage_list_comments($comment, $args, $depth) {

	$GLOBALS['comment'] = $comment;

	if( $comment->comment_type == 'pingback' or $comment->comment_type == 'trackback' ) : ?>

		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<p><?php _e( 'Pingback:', 'courage' ); ?> <?php comment_author_link(); ?>
			<?php edit_comment_link( __( '(Edit)', 'courage' ), '<span class="edit-link">', '</span>' ); ?>
			</p>

	<?php else : ?>

		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

			<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">

				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 56 ); ?>
					<?php printf( '<span class="fn">%s</span>', get_comment_author_link() ); ?>
				</div>

		<?php if ($comment->comment_approved == '0') : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'courage' ); ?></p>
		<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php printf(__('%1$s at %2$s', 'courage'), get_comment_date(),  get_comment_time()) ?></a>
					<?php edit_comment_link(__('(Edit)', 'courage'),'  ','') ?>
				</div>

				<div class="comment-content"><?php comment_text(); ?></div>

				<div class="reply">
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>

			</div>
<?php
	endif;

}
endif;