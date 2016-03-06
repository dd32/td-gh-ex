<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package avata
 */

if ( ! function_exists( 'avata_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function avata_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<div class="nav-links">
			<?php echo paginate_links(); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'avata_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function avata_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'avata' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'avata' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link',     'avata' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'avata_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
 
function avata_posted_on($echo = true) {

	$return = '';
	$display_post_meta = avata_option('display_post_meta','yes');
		
	if( $display_post_meta == 'yes' ){
		
	  $display_meta_author     = avata_option('display_meta_author','yes');
	  $display_meta_date       = avata_option('display_meta_date','yes');
	  $display_meta_categories = avata_option('display_meta_categories','yes');
	  $display_meta_comments   = avata_option('display_meta_comments','yes');
	  $display_meta_readmore   = avata_option('display_meta_readmore','yes');
	  $display_meta_tags       = avata_option('display_meta_tags','yes');
	  $date_format             = avata_option('date_format','M d, Y');
	  
	
		
	   $return .=  '<ul class="meta clearfix">';
	  if( $display_meta_date == 'yes' )
		$return .=  '<li class="entry-date"><i class="fa fa-calendar"></i> '. get_the_date( $date_format ).'</li>';
	  if( $display_meta_author == 'yes' )
		$return .=  '<li class="entry-author"><i class="fa fa-user"></i>'.get_the_author_link().'</li>';
	  if( $display_meta_categories == 'yes' )		
		$return .=  '<li class="entry-catagory"><i class="fa fa-file-o"></i>'.get_the_category_list(', ').'</li>';
	  if( $display_meta_comments == 'yes' )	
		$return .=  '<li class="entry-comments pull-right">'.avata_get_comments_popup_link('', __( '<i class="fa fa-comment"></i> 1 ', 'avata'), __( '<i class="fa fa-comment"></i> % ', 'avata'), 'read-comments', '').'</li>';
        $return .=  '</ul>';
	}
    if( $echo == true )
	echo $return;
	else
	return $return;
	

}
endif;

add_filter('widget_text', 'do_shortcode');
if ( ! function_exists( 'avata_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function avata_entry_footer() {
	if (! apply_filters( 'avata_footer_meta', false ) ){
		return;
	}
	echo '<footer class="entry-footer">';
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'avata' ) );
		if ( $categories_list && avata_categorized_blog() ) {
			printf( '<span class="cat-links">' . __( 'Posted in %1$s', 'avata' ) . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'avata' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'avata' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'avata' ), __( '1 Comment', 'avata' ), __( '% Comments', 'avata' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'avata' ), '<span class="edit-link">', '</span>' );
	echo '</footer><!-- .entry-footer -->';
}
endif;


add_action( 'widgets_init', 'avata_widgets' );
function avata_widgets(){
	global $avata_sidebars ;
	  $avata_sidebars =   array(
            ''  => __( 'No Sidebar', 'avata' ),
		    'default_sidebar'  => __( 'Default Sidebar', 'avata' ),
			'sidebar-1'  => __( 'Sidebar 1', 'avata' ),
			'sidebar-2'  => __( 'Sidebar 2', 'avata' ),
			'sidebar-3'  => __( 'Sidebar 3', 'avata' ),
			'sidebar-4'  => __( 'Sidebar 4', 'avata' ),
			'sidebar-5'  => __( 'Sidebar 5', 'avata' ),
			'sidebar-5'  => __( 'Sidebar 5', 'avata' ),
			'sidebar-6'  => __( 'Sidebar 6', 'avata' ),
			'footer_widget_1'  => __( 'Footer Widget 1', 'avata' ),
			'footer_widget_2'  => __( 'Footer Widget 2', 'avata' ),
			'footer_widget_3'  => __( 'Footer Widget 3', 'avata' ),
			'footer_widget_4'  => __( 'Footer Widget 4', 'avata' ),
			'left_sidebar_404'  => __( '404 Page Left Sidebar', 'avata' ),
			'right_sidebar_404'  => __( '404 Page Right Sidebar', 'avata' ),
          );
	  
	  foreach( $avata_sidebars as $k => $v ){
		  if( $k !='' ){
		  register_sidebar(array(
			'name' => $v,
			'id'   => $k,
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<div class="title-divider">
                        <div class="divider-arrow"></div>                                            
                    <h4 class="widget-title">', 
			'after_title' => '</h4></div>' 
			));
		  }
		  }
	    
	
		
}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function avata_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'avata_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'avata_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so avata_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so avata_categorized_blog should return false.
		return false;
	}
}

function avata_theme_comments(){
	$id = get_the_ID();
	$avatar = get_avatar();
	$coms = wp_list_comments( array( 'echo' => false ) );
	$comments = get_comments( array( 'post_id' => $id ) );
	
	$walker = new Walker_Comment;
	
	$output = $walker->paged_walk( $comments, -1, '', '' );
	$in_comment_loop = false;
	
	echo $output;
}

/**
 * Flush out the transients used in avata_categorized_blog.
 */
function avata_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'avata_categories' );
}
add_action( 'edit_category', 'avata_category_transient_flusher' );
add_action( 'save_post',     'avata_category_transient_flusher' );
