<?php
/**
 * Custom template tags.
 *
 * @package aesblo
 * @since 1.0.0
 */

/**
 * Display the site title and the description.
 *
 * @since 1.0.0
 *
 * @return void.
 */
function aesblo_site_branding() {
	$site_title = get_bloginfo( 'name' );
	$site_description = get_bloginfo( 'description' );
	if ( empty( $site_title ) && empty( $site_description ) ) {
		return;
	}
	
	print( '<div class="site-branding">' );
	
	if ( $site_title ) {
		$site_link = sprintf( '<a href="%1$s" rel="home">%2$s</a>',
			esc_url( home_url( '/' ) ),
			$site_title
		);
		
		if ( is_front_page() ) {
			printf( '<h1 class="site-title">%s</h1>', $site_link );
		}
		
		else {
			printf( '<h2 class="site-title">%s</h2>', $site_link );
		}
	}
	
	if ( $site_description ) {
		printf( '<h3 class="site-description">%s</h3>', $site_description );
	}
	
	print( '</div>' );
} 
 
 
/**
 * Site quick links at the header.
 *
 * @since 1.0.0
 *
 * @return void.
 */
function aesblo_quicklinks() {
	$show_home_link = ! ( is_front_page() && ! is_paged() );
	$show_primary_sidebar_link = has_nav_menu( 'primary' ) || is_active_sidebar( 'primary-sidebar' );
	$show_secondary_sidebar_link  = is_active_sidebar( 'secondary-sidebar' );
	$show_seach_link = true;
	$show_quick_links = $show_home_link || $show_primary_sidebar_link || $show_secondary_sidebar_link || $show_seach_link;
	if ( $show_quick_links ) :
?>
		<nav class="site-quicklinks clearfix">
			<ul>
				<?php if ( $show_home_link ) : ?>
					<li class="sq-home"><a href="<?php echo home_url( '/' ); ?>" rel="home"><span class="fa fa-home fa-2x"></span></a></li>
				<?php endif; ?>
				
				<?php if ( $show_primary_sidebar_link ) : ?>
					<li class="sq-primary-sidebar"><span class="fa fa-bars fa-2x q-bars"></span></li>
				<?php endif; ?>
				
				<?php if ( $show_secondary_sidebar_link ) : ?>
					<li class="sq-secondary-sidebar"><span class="fa fa-ellipsis-h fa-2x q-ellipsis"></span></li>
				<?php endif; ?>
				
				<?php if ( $show_seach_link ) : ?>
					<li class="sq-search"><span class="fa fa-search fa-2x q-search"></span></li>
				<?php endif; ?>
			</ul>
		</nav>
<?php
	endif;
}


/**
 * Display the entry header.
 *
 * @since 1.0.0
 *
 * @return void
 */
function aesblo_entry_header() { 
	// Header meta
	aesblo_entry_header_meta();
	
	// post featured image
	if ( ! is_attachment() ) {
		aesblo_post_thumbnail();
	}
	
	// Post title
	aesblo_entry_title();
	
	// Time meta
	if ( ! is_page() ) {
		printf( '<time class="entry-date text-divider" datetime="%1$s"><a class="entry-date-link" href="%2$s">%3$s</a></time>',
			esc_attr( get_the_date( 'c' ) ),
			esc_url( get_permalink() ),
			get_the_time( get_option( 'date_format' ) )
		);
	}
}


/**
 * Display the entry header meta.
 *
 * @since 1.0.0
 *
 * @return void
 */
function aesblo_entry_header_meta() {
	$is_sticky = ( is_sticky() && is_home() && ! is_paged() );
	$format = get_post_format();
	$is_format = current_theme_supports( 'post-formats', $format );
	if ( $is_sticky || $is_format ) :
?>
		<div class="entry-header-meta">
			<?php if ( $is_sticky ) : ?>
				<span class="sticky-post"><?php _e( 'FEATURED', 'aesblo' ); ?></span>
			<?php endif; ?>
			
			<?php if ( $is_format ) : ?>
				<a href="<?php echo esc_url( get_post_format_link( $format ) ); ?>" class="entry-format">
					<?php printf( '<span class="fa fa-%s"></span>', esc_attr( aesblo_get_format_icon( $format ) ) ); ?>
				</a>
			<?php endif; ?>
		</div>
<?php
	endif;	
}
 

/**
 * Get the post format icon.
 *
 * @since 1.0.0
 *
 * @param string $format. The post format name.
 * @return string.
 */
function aesblo_get_format_icon( $format ) {
	if ( empty( $format ) ) {
		return;
	}
	
	switch ( $format ) {
		case 'aside' : {
			$type = 'file-text-o';
			break;
		}
		
		case 'image' : {
			$type = 'camera';
			break;
		}
		
		case 'gallery' : {
			$type = 'th-large';
			break;
		}
		
		case 'video' : {
			$type = 'video-camera';
			break;
		}
		
		case 'audio' : {
			$type = 'music';
			break;
		}
		
		case 'quote' : {
			$type = 'quote-right';
			break;
		}
		
		case 'link' : {
			$type = 'link';
			break;
		}
		
		case 'status' : {
			$type = 'commenting';
			break;
		}
		
		case 'chat' : {
			$type = 'wechat';
			break;
		}																
		
		default: $type = '';
	}
	
	return $type;
}


/**
 * Display the post thumbnail.
 *
 * @since 1.0.0
 *
 * @return void
 */
function aesblo_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}	
?>
	<figure class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</figure>
<?php
}


/**
 * Display the post title.
 *
 * @since 1.0.0
 *
 * @return void
 */
function aesblo_entry_title() {
	if ( is_single() || is_page() ) {
		the_title( '<h1 class="entry-title">', '</h1>' );
	}
	
	else {
		the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
	}
}


if ( ! function_exists( 'aesblo_entry_meta' ) ) :
/**
 * Prints meta at the entry footer with categories, tags, author, etc.
 *
 * @since 1.0.0
 */
function aesblo_entry_footer() {
?>
	<ol>
		<?php if ( is_multi_author() ) : ?>
                  <li class="byline">
                      <span class="fa fa-user"></span>
                      <?php the_author_posts_link(); ?>
                  </li>
		<?php endif; ?>
		
		<?php 
			$categories_list = get_the_category_list( ', ' );
			if ( $categories_list && aesblo_categorized_blog() ) :
		?>
				<li class="cat-links">
					<span class="fa fa-folder-open"></span>
					<?php echo $categories_list; ?>
				</li>
		<?php endif; ?>
		
		<?php 
			$tags_list = get_the_tag_list( '<span class="fa fa-tags"></span>', ', ' );
			if ( $tags_list ) :
		?>
				<li class="tag-links">
					<?php echo $tags_list; ?>
				</li>
		<?php endif; ?>
        
		<?php 
			if ( is_attachment() && wp_attachment_is_image() ) :
				// Retrieve attachment metadata.
				$metadata = wp_get_attachment_metadata();
				$parent_post_id = wp_get_post_parent_id( get_the_ID() );			
        ?>
               <?php 
			   		if ( $parent_post_id ) :
			   ?>
                       <li class="parent-post">
                            <a href="<?php echo esc_url( get_permalink( $parent_post_id ) ); ?>" title="<?php echo esc_attr( get_the_title( $parent_post_id ) ); ?>">
                            	<span class="fa fa-level-up"></span>
                                <span><?php _e( 'Published in', 'aesblo' ); ?></span>
                            </a>
                       </li>
               <?php endif; ?>
                
                <li class="image-data">
                    <span class="fa fa-search-plus"></span>
						<?php 
                            printf( '<a href="%1$s">%2$s &times; %3$s</a>', 
								esc_url( wp_get_attachment_url() ),
								$metadata['width'], 
								$metadata['height'] 
							); 
                        ?>
                </li>
        <?php endif; ?>            
		
		<li class="comments-link">
			<span class="fa fa-comment"></span>
			<?php comments_popup_link( __( 'Leave a comment', 'aesblo' ), '1', '%' ); ?>
		</li>
		
		<?php if ( get_edit_post_link() ) : ?>
                  <li class="edit-link">
                      <span class="fa fa-pencil-square-o"></span>
                      <?php edit_post_link(); ?>
                  </li>
		<?php endif; ?>			
	</ol>
<?php
}
endif;


/**
 * Determine whether blog/site has more than one category.
 *
 * @since 1.0.0
 *
 * @return bool True of there is more than one category, false otherwise.
 */
function aesblo_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'aesblo_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'aesblo_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so aesblo_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so aesblo_categorized_blog should return false.
		return false;
	}
}


/**
 * Flush out the transients used in {@see aesblo_categorized_blog()}.
 *
 * @since 1.0.0
 */
function aesblo_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'aesblo_categories' );
}
add_action( 'edit_category', 'aesblo_category_transient_flusher' );
add_action( 'save_post',     'aesblo_category_transient_flusher' );


/**
 * Display the posts pagination.
 *
 * @since 1.0.0
 */
function aesblo_posts_pagination() {
	the_posts_pagination( array(
		'mid_size'					=> 2,
		'prev_text'          		=> __( '&laquo; Prev', 'aesblo' ),
		'next_text'          		=> __( 'Next &raquo;', 'aesblo' ),
		'before_page_number' 		=> '<span class="screen-reader-text">' . __( 'Page', 'aesblo' ) . ' </span>',
	) );
}


/**
 * Display the title and description at the archive pages.
 *
 * @since 1.0.0
 */
function aesblo_archive_header() {	
	if ( is_category() ) {
		$icon = 'folder-open-o';
	} elseif ( is_tag() ) {
		$icon = 'tag';
	} elseif ( is_author() ) {
		$icon = 'user';
	} elseif ( $format = get_post_format() ) {
		if ( current_theme_supports( 'post-formats', $format ) ) {
			$icon = aesblo_get_format_icon( $format );
		}
	} elseif ( is_date() ) {
		$icon = 'calendar';
	} elseif ( is_search() ) {
		$icon = 'search';
	}
	
	$icon = isset( $icon ) && $icon ? $icon : 'list-ul';
?>
	<header class="page-header">
		<?php printf( '<span class="archive-icon fa fa-%s"></span>', $icon ); ?>
		<div class="archive-summary">
			<?php
				if ( is_search() ) {
					printf( '<h1 class="page-title">%s</h1>', __( 'Search Results for: ', 'aesblo' ) . get_search_query() );
				} else {
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				}
			?>
		</div>
	</header><!-- .page-header -->
<?php	
}


/**
 * Display the post pagination.
 *
 * @since 1.0.0
 */
function aesblo_post_navigation() {
	if ( is_attachment() ) {
		return;
	}
	
	the_post_navigation( array(
		'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'PREVIOUS', 'aesblo' ) . '</span> ' .
			'<span class="screen-reader-text">' . __( 'Previous post:', 'aesblo' ) . '</span> ' .
			'<span class="post-title">%title</span>',						
		'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'NEXT', 'aesblo' ) . '</span> ' .
			'<span class="screen-reader-text">' . __( 'Next post:', 'aesblo' ) . '</span> ' .
			'<span class="post-title">%title</span>'
	) );
}


/**
 * Display the pagination in the single page.
 *
 * @since 1.0.0
 */
function aesblo_link_pages() {
	wp_link_pages( array(
		'before'      => '<div class="page-links pagination"><span class="page-links-title">' . __( 'Pages:', 'aesblo' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',					
	) );
}


/**
 * Display the comments pagination.
 *
 * @since 1.0.0
 *
 * @return void
 */
function aesblo_comments_paging() {
?>
	<nav class="comments-navigation navigation pagination" role="navigation">
		<?php	
			paginate_comments_links();
		?>
	</nav>
<?php
}