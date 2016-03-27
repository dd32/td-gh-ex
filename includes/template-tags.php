<?php // Custom template tags used within the theme



// Generate meta title
if ( ! function_exists( 'bnt_meta_title' ) ) {
	
	function bnt_meta_title() {
		$sep = '/';
		if ( satori_option( 'bnt_meta_title_separator' ) != '' ) {
			$sep = satori_option( 'bnt_meta_title_separator' );
		}
		?>
		<title>
			<?php wp_title( $sep, true, 'right' ); ?>
		</title>
		<?php
	}
	
}


// Generate meta description
if ( ! function_exists( 'bnt_meta_tags' ) ) {
	
	function bnt_meta_description() {
		global $post;
		
		// Front page
		if ( is_front_page() && satori_option( 'bnt_front_meta_description' ) != '' ) {
			$meta_desc = satori_option( 'bnt_front_meta_description' );
		
		// Posts and pages
		} else if ( is_singular($post) ) {
			$raw_desc = mb_substr(rtrim(strip_tags(get_post($post->ID)->post_content)), 0, 160);
			$meta_desc = str_replace( array("\r", "\n", "\t"), ' ', $raw_desc );
			while (strpos($meta_desc, "  ") !== false) {
				$meta_desc = str_replace("  ", " ", $meta_desc);
			}
			$meta_desc .= '..';
			if ( get_post_meta($post->ID, 'bnt_meta_description', true) != '' ) {
				$meta_desc = get_post_meta($post->ID, 'bnt_meta_description', true);
			}
			
		// Taxonomy archives
		} else if ( ( is_category() || is_tag() || is_tax() ) && term_description() != '' ) {
			$meta_desc = term_description();
			
		// Author archives
		} else if ( is_author() && get_userdata($post->post_author)->description != '' ) {
			$meta_desc = get_userdata($post->post_author)->description;
			
		// All other instances	
		} else {
			if ( satori_option( 'bnt_front_meta_description' ) != '' ) {
				$meta_desc = satori_option( 'bnt_front_meta_description' );
			} else {
				$meta_desc = get_bloginfo('description');
			}
		}
		echo '<meta name="description" content="'.$meta_desc.'" />';
		
	}
	
}


// Include Google Fonts
if ( ! function_exists( 'bnt_google_font' ) ) {
	
	function bnt_google_font() {
		$fonts = '';
		$body_font = $headings_font = 'Open Sans';
		if ( satori_option( 'bnt_font_body' ) != '' ) {
			$body_font = satori_option( 'bnt_font_body' );
		}
		$body_font = str_replace( ' ', '+', $body_font );
		$fonts .= '<link href="https://fonts.googleapis.com/css?family='.$body_font.':400,400italic,700" rel="stylesheet" type="text/css">';
		if ( satori_option( 'bnt_font_headings' ) != '' && satori_option( 'bnt_font_headings' ) != 'Open Sans' ) {
			$headings_font = satori_option( 'bnt_font_headings' );
			$headings_font = str_replace( ' ', '+', $headings_font );
			$fonts .= '<link href="https://fonts.googleapis.com/css?family='.$headings_font.':400,700" rel="stylesheet" type="text/css">';
		}
		$menu_font = 'Montserrat';
		if ( satori_option( 'bnt_font_menu' ) != '' ) {
			$menu_font = satori_option( 'bnt_font_menu' );
		}
		$menu_font = str_replace( ' ', '+', $menu_font );
		$fonts .= '<link href="https://fonts.googleapis.com/css?family='.$menu_font.':400" rel="stylesheet" type="text/css">';
		echo $fonts;
        
	}
	
}


// Display the logo
if ( ! function_exists( 'bnt_logo' ) ) {
	
	function bnt_logo() {
		if ( satori_option('bnt_logo') != '' ) {
			echo '
			<div class="logo clear">
				<a href="'.site_url().'">
					<img src="'.satori_option('bnt_logo').'" alt="'.wp_title('', false).'" />
				</a>
			</div>
			';
		} 
	}
    
}


// Primary menu
if ( ! function_exists( 'bnt_primary_menu' ) ) {
	
	function bnt_primary_menu() {
		$depth = '3';
		if ( satori_option( 'bnt_menu_config' ) == 2 ) {
			$depth = '1';
		}
		?>
		<div class="header-menu clear">
            <div id="nav-primary" class="nav">
                <nav>
                    <?php 
                    wp_nav_menu( 
                        array( 
                            'theme_location' => 'primary-menu',
                            'depth' => $depth,
                            'menu_class' => 'primary-menu',
                            'container_class' => 'menu-container',
                            'link_before' => '<span class="menu-item-inner">',
                            'link_after' => '</span>',
                            'fallback_cb' => 'false',
                        )
                    );
                    ?>
                </nav>
            </div>
        </div>
		<div class="ham-menu-trigger">
        	<div class="ham-menu-trigger-container">
                <div class="ham-menu-trigger-stick">
                </div>
                <div class="ham-menu-trigger-stick">
                </div>
                <div class="ham-menu-trigger-stick">
                </div>
            </div>
        </div>
		<div class="ham-menu-close-container">
			<div class="ham-menu-close">
			</div>
		</div>
        <?php
	}
	
}


// Mobile menu
if ( ! function_exists( 'bnt_mobile_menu' ) ) {
	
	function bnt_mobile_menu() {
		$menu_depth = 3;
		if ( satori_option( 'bnt_mobile_menu_submenus' ) ) {
			$menu_depth = 1;
		}
		?>
        <div class="mobile-menu-trigger">
        	<div class="mobile-menu-trigger-container">
                <div class="mobile-menu-trigger-stick">
                </div>
                <div class="mobile-menu-trigger-stick">
                </div>
                <div class="mobile-menu-trigger-stick">
                </div>
            </div>
        </div>
        <div class="mobile-menu">
            <div class="mobile-menu-shadow">
            </div>
            <div id="nav-mobile" class="nav">
            	<div class="mobile-menu-close-container">
                	<div class="mobile-menu-close">
                    </div>
                </div>
                <nav>
                    <?php 
                    wp_nav_menu( 
                        array( 
                            'theme_location' => 'primary-menu',
                            'depth' => $menu_depth,
                            'menu_class' => 'primary-mobile-menu',
                            'container_class' => 'menu-container',
                            'link_before' => '<span class="menu-item-inner">',
                            'link_after' => '</span>',
                            'fallback_cb' => 'false',
                        )
                    );
                    ?>
                </nav>
            </div>
        </div>
        <?php
	}
	
}


// Footer menu
if ( ! function_exists( 'bnt_footer_menu' ) ) {
	
	function bnt_footer_menu() {
		?>
		<div class="footer-menu">
			<div id="nav-footer" class="nav">
				<nav>
					<?php 
					wp_nav_menu( 
						array( 
							'theme_location' => 'footer-menu',
							'depth' => '1',
							'menu_class' => 'menu-footer',
							'container_class' => 'menu-container',
							'link_before' => '<span class="menu-item-inner">',
							'link_after' => '</span>',
							'fallback_cb' => 'false',
						)
					);
					?>
				</nav>
			</div>
		</div>
		<?php
	}
	
}


// Display post header
if ( ! function_exists( 'bnt_post_header' ) ) {
	
	function bnt_post_header() {
		
		// Get post ID
		global $post;
		$postid = '';
		if ( is_object($post) ) {
			$postid = $post->ID;
		}
		
		// Only display on single posts/pages
		if ( ! is_singular() ) {
			return;
		}
		
		// Set titles
		$title = get_the_title();
		$subtitle = $cta = $video_header = '';
		if ( get_post_meta( $postid, 'bnt_subtitle', true ) != '' ) {
			$subtitle = '
				<div class="post-header-subtitle">
					'.get_post_meta( $postid, 'bnt_subtitle', true ).'
				</div>
			';
		}
		
		// Set call-to-action elements if defined
		if ( get_post_meta( $postid, 'bnt_cta_primary_text', true ) != '' ) {
			$cta_primary = $cta_secondary = '';
			if ( get_post_meta( $postid, 'bnt_cta_primary_text', true ) != '' ) {
				if ( get_post_meta( $postid, 'bnt_cta_primary_link', true ) != '' ) {
					$cta_primary = '
						<a class="post-header-cta-primary" href="'.get_post_meta( $postid, 'bnt_cta_primary_link', true ).'">
							'.get_post_meta( $postid, 'bnt_cta_primary_text', true ).'
						</a>
					';
				} else {
					$cta_primary = '
						<div class="post-header-cta-primary">
							'.get_post_meta( $postid, 'bnt_cta_primary_text', true ).'
						</div>
					';
				}
			}	
			if ( get_post_meta( $postid, 'bnt_cta_secondary_text', true ) != '' ) {
				if ( get_post_meta( $postid, 'bnt_cta_secondary_link', true ) != '' ) {	
					$cta_secondary = '
						<a class="post-header-cta-secondary" href="'.get_post_meta( $postid, 'bnt_cta_secondary_link', true ).'">
							'.get_post_meta( $postid, 'bnt_cta_secondary_text', true ).'
						</a>
					';
				} else {
					$cta_secondary = '
						<div class="post-header-cta-secondary">
							'.get_post_meta( $postid, 'bnt_cta_secondary_text', true ).'
						</div>
					';
				}
			}
			$cta = '
				<div class="post-header-cta">
					'.$cta_primary.'
					'.$cta_secondary.'
				</div>
			';
		}
		
		// Set video if defined and if EP is activated
		if ( 
			get_post_meta( $post->ID, 'bnt_header_video_source', true ) != '' && 
			get_option( 'bnt_ep_license_status' ) == 'valid' && 
			function_exists('bnt_ep_video_header') 
		) {
			$video_header = bnt_ep_video_header();
		}
		
		// Set Google Maps if defined and if EP is activated
		if ( get_post_meta( $post->ID, 'bnt_activate_headermap', true ) == 'on' && get_option( 'bnt_ep_license_status' ) == 'valid' ) {
			echo '<div id="bnt-map-canvas"></div>';
			return;
		}
		
		// Render the markup
		if ( get_post_meta( $postid, 'bnt_activate_header', true ) == 'on' && get_post_meta( $post->ID, 'bnt_activate_headermap', true ) != 'on' ) {
			echo '
				<div class="post-header">
					'.$video_header.'
					<div class="post-header-overlay">
					</div>
					<div class="bnt-container post-header-container">
						<div class="post-header-title">
							<h1>'.$title.'</h1>
							'.$subtitle.'
							'.$cta.'
						</div>
					</div>
				</div>
			';
		}
		
	}
	
}


// Display an optional post thumbnail.
if ( ! function_exists( 'bnt_post_thumbnail' ) ) {
	
	function bnt_post_thumbnail() {
		global $post;
		global $bnt_parent_page_id;
		// Check if it's one of the situations when a thumbnail is not needed, and exit if yes
		if ( 
			! has_post_thumbnail() || 
			post_password_required() || 
			is_attachment() || 
			get_post_format( $post->ID ) === 'quote' ||
			( is_singular() && get_post_meta( $post->ID, 'bnt_activate_header', true ) == 'on' && get_page_template_slug( $bnt_parent_page_id ) != 'page-grid.php' ) 
		) {
			return;
		}
		if ( is_singular() && get_page_template_slug( $bnt_parent_page_id ) != 'page-grid.php' ) {
			?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div>
			<?php 
		} else { 
			?>
			<div class="post-thumbnail">
				<a class="post-thumbnail" href="<?php the_permalink(); ?>">
					<?php
					the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );
					?>
				</a>
			</div>
		
			<?php 
		}
	}
	
}


// Display entry dates in the blog
if ( ! function_exists( 'bnt_post_date_blog' ) ) {
	
	function bnt_post_date_blog() {
		if ( is_single() ) {
			return;
		}
		if ( get_the_title() == '' ) {
			$post_date_link = '<a href="'.get_the_permalink().'">';	
			$post_date_link_close = '</a>';
		} else {
			$post_date_link = $post_date_link_close = '';	
		}
		$post_day = get_the_date('d');
		$post_month = get_the_date('M');
		$post_year = get_the_date('Y');
		echo '
			<div class="post-date-blog">
				'.$post_date_link.'
				<div class="post-day">
					'.$post_day.'
				</div>
				<div class="post-month">
					'.$post_month.'
				</div>
				<div class="post-year">
					'.$post_year.'
				</div>
				'.$post_date_link_close.'
			</div>
		';
	}
		
}


// Display post title
if ( ! function_exists( 'bnt_post_title' ) ) {
	
	function bnt_post_title() {
		
		global $post;
		
		// Check for formats which do not imply a title
		if ( in_array( get_post_format(), array('link','aside','status','quote'), true ) ) {
			return;
		}
		
		// If project post type and has a sidebar, exit
		if ( get_post_type() == 'project' && get_post_meta( $post->ID, 'bnt_sidebar_layout', true ) != 'full-width' ) {
			return;
		}
		
		echo '<header class="entry-header">';
		// Main title
		if ( is_single() ) {
			if ( get_post_meta( $post->ID, 'bnt_hide_title', true) != 'on' && get_post_meta( $post->ID, 'bnt_activate_header', true ) != 'on' ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			}
		} else {
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		}
		// Subtitle
		if ( is_single() && get_post_meta( $post->ID, 'bnt_subtitle', true) != '' ) {
			echo '
				<div class="post-header-subtitle">
					'.get_post_meta( $post->ID, 'bnt_subtitle', true ).'
				</div>
			';
		}
		echo '</header>';
		
	}
		
}


// Display post content according to the post format
if ( ! function_exists( 'bnt_post_content' ) ) {
	
	function bnt_post_content() {
		
		global $post;
		
		// If project post type and has a sidebar, exit
		if ( get_post_type() == 'project' && get_post_meta( $post->ID, 'bnt_sidebar_layout', true ) != 'full-width' ) {
			return;
		}
		
		echo '<div class="entry-content clear">';
		
		// Check for post format and display respective content
		if ( get_post_format() === 'link' ) { 
			echo bnt_link_format_content();
		} elseif ( get_post_format() === 'quote' ) {
			echo bnt_quote_format_content();
		} else {
			the_content( __( 'Continue reading', 'satori' ).' &rarr;' );	
		}
		
		// Navigation for paged posts
		wp_link_pages( 
			array(
				'before' => '<div class="page-links">',
				'after' => '</div>',
				'link_before' => '<span class="page-link-text">',
				'link_after' => '</span>',
			) 
		);
		
		echo '</div>';
		
	}
		
}


// Display entry meta
if ( ! function_exists( 'bnt_entry_meta' ) ) {

	function bnt_entry_meta() {
		
		echo '<footer class="entry-footer">';
		
		// If single post, display tags
		if ( is_singular('post') ) {
			echo '<div class="post-tags">';
				the_tags();
			echo '</div></footer>';
			return;	
		}
		
		// If project, display navigation
		if ( get_post_type() == 'project' && is_singular('project') ) {
			if ( function_exists( 'bnt_ep_project_nav' ) ) {
				bnt_ep_project_nav();
			}
			return;
		}
		
		// Display a pin for sticky posts
		if ( is_sticky() && is_home() && ! is_paged() ) {
			echo '<span class="sticky-icon"></span>';
		}
				
		// Display post meta - author, category, and comments
		$post_author = '<i>'.__( 'Posted by', 'satori' ).'</i> <span class="uppercase">'.get_the_author().'</span>';
		$post_categories_ids = wp_get_post_categories( get_the_ID(), array('fields' => 'ids') );
		$post_categories_names = array();
		$post_categories = '';
		if ( ! empty($post_categories_ids) ) {
			$post_categories_ids = array_diff($post_categories_ids, array('1'));
			foreach ( $post_categories_ids as $c ) {
				$cat = get_category( $c );
				$post_categories_names[] = $cat->name;
			}
			$post_categories_names = implode(", ", $post_categories_names);
			$post_categories = ' <i>'.__( 'in', 'satori' ).'</i> <span class="uppercase">'.$post_categories_names.'</span>';
		}
		$post_comments = '';
		$num_comments = get_comments_number();
		if ( comments_open() ) {
			if ( $num_comments == 0 ) {
				$comments = __( '0 comments', 'satori' );
			} elseif ( $num_comments > 1 ) {
				$comments = $num_comments .' '. __( 'comments', 'satori' );
			} else {
				$comments = __( '1 comment', 'satori' );
			}
			$post_comments = ', <i>'. $comments . '</i>';
		}
		$post_date = '';
		if ( is_singular('post') ) {
			$post_date = ' <i>'.__( 'on', 'satori' ).'</i> <span class="uppercase">'.the_date('j F Y', '', '', false).'</span>';
		}
		$post_meta = $post_author . $post_date . $post_categories . $post_comments;
		if ( get_post_type() == 'post' ) {
			echo $post_meta;
		}
		
		edit_post_link( __( 'Edit this', 'satori' ), '<div class="edit-this">', '</div>' );
			
		echo '</footer>';
		
	}
	
}


// Display author information in posts
if ( ! function_exists( 'bnt_author_info' ) ) {

	function bnt_author_info() {
		if ( is_singular('post') && ! satori_option( 'bnt_author_meta' ) ) {
			?>
            <div class="author-info">
            	<div class="author-avatar">
                	<?php echo get_avatar( get_the_author_meta( 'user_email' ), 80 ); ?>
                </div>
                <div class="author-description">
                	<h3 class="author-name">
						<?php echo __( 'Posted by', 'satori' ).' '.get_the_author(); ?>
                    </h3>
                    <?php if ( get_the_author_meta( 'description' ) != '' ) { ?>
                    <div class="author-bio">
                    	<?php the_author_meta( 'description' ); ?>
                    </div>
                    <?php } ?>
                    <a class="author-posts" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                    	<?php printf( __( 'View all posts by %s', 'satori' ), get_the_author() ); ?>
                    </a>
                </div>
            </div>
            <?php
		}
	}
	
}


// Display comments navigation
if ( ! function_exists( 'bnt_comments_nav' ) ) {

	function bnt_comments_nav() {
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
		?>
        	<nav class="navigation comment-nav" role="navigation">
                <div class="nav-links">
                    <?php
					if ( $next_link = get_next_comments_link( '&larr; '.__( 'Newer Comments', 'satori' ) ) ) {
						printf( '<div class="nav-next">%s</div>', $next_link );
					}
					if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'satori' ).' &rarr;' ) ) {
						printf( '<div class="nav-previous">%s</div>', $prev_link );
					}
                    ?>
                </div>
            </nav>
        <?php	
		}
	}
	
}


// Custom comment template
if ( ! function_exists( 'bnt_comment' ) ) {

	function bnt_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		?>
			<div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
            	<div class="comment-nested">
                </div>
				<div class="comment-author vcard clear">
					<?php echo get_avatar( $comment, 40 ); ?>
					<div class="fn author-name">
                    	<?php comment_author(); ?>
                    </div>
                    <div class="comment-meta">
                        <a href="<?php comment_link() ?>" class="comment-date">
                            <?php comment_date(); ?>
                        </a>
						<?php edit_comment_link(__( 'Edit', 'satori' )); ?>
                        <?php
                        comment_reply_link(
                            array_merge( $args, 
                                array(
                                    'depth' => $depth, 
                                )
                            )
                        );	
                        ?>
                    </div>
				</div>
				<div class="comment-text">
					<?php comment_text(); ?>
				</div>
                <?php if ( $comment->comment_approved == '0' ) { ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'satori' ); ?></em>
				<?php } ?>
		<?php
	}
	
}


// Display a pager on the blog and archive pages
if ( ! function_exists( 'bnt_blog_pagination' ) ) {

	function bnt_blog_pagination() {
		the_posts_pagination( 
			array(
				'prev_text' => '&larr; '.__( 'Previous page', 'satori' ),
				'next_text' => __( 'Next page', 'satori' ).' &rarr;',
			) 
		);
	}
	
}


// Display a pager for grid pages
if ( ! function_exists( 'bnt_grid_pagination' ) ) {

	function bnt_grid_pagination() {
		global $bnt_query;
		?>
		<nav class="navigation pagination grid-pagination" role="navigation">
			<h2 class="screen-reader-text">
            	<?php _e( 'Posts navigation', 'satori' ); ?>
            </h2>
			<div class="nav-links">
				<?php
				echo paginate_links( 
					array(
						'current' => max( 1, get_query_var('paged') ),
						'total' => $bnt_query->max_num_pages,
					) 
				);
				?>
			</div>
		</nav>
		<?php
	}
	
}


// Display content for the "link" post type
if ( ! function_exists( 'bnt_link_format_content' ) ) {

	function bnt_link_format_content() {
		$url = get_the_content();
		$anchor = get_the_title();
		if ( ! filter_var( $url, FILTER_VALIDATE_URL ) === false ) { 
			return '<a href="'.$url.'" title="'.$anchor.'" target="_blank">'.$anchor.'</a>';
		} else {
			return $url;	
		}
	}
	
}


// Display content for the "quote" post type
if ( ! function_exists( 'bnt_quote_format_content' ) ) {

	function bnt_quote_format_content() {
		$quote = get_the_content();
		$author = get_the_title();
		$output = '<div class="format-quote-text">'.$quote.'</div>';
		if ( $author != '' ) {
			$output .= '<div class="format-quote-author">'.$author.'</div>';
		}
		return $output;
	}
	
}


// Display the copyright in the footer
if ( ! function_exists( 'bnt_copyright' ) ) {

	function bnt_copyright() {
		$author = 'Satori Studio';
		if ( is_front_page() ) {
			$author = '<a href="http://satoristudio.net/" target="blank" title="Satori Studio">Satori Studio</a>';
		}
		$copyright = '<div class="footer-copyright">';
		if ( get_option( 'bnt_ep_license_status' ) == 'valid' && satori_option( 'bnt_footer_copyright' ) != '' ) {
			$copyright .= satori_option( 'bnt_footer_copyright' );
		} else {
			$copyright .= '&#169; '.date('Y').'. Bento '.__( 'theme by', 'satori' ).' '.$author;
		}
		$copyright .= '</div>';
		echo $copyright;
	}
	
}


// Display the button for the ajax loader
if ( ! function_exists( 'bnt_ajax_load_more' ) ) {

	function bnt_ajax_load_more() {
	if ( is_home() || is_archive() || is_search() ) {
		$class = '';	
	} else {
		$class = 'grid-ajax-load-more';
	}
	?>
		<a class="ajax-load-more <?php echo $class; ?>">
			<?php _e( 'Load more', 'satori' ); ?>
        </a>
        <div class="spinner-ajax">
        	<div class="spinner-circle">
            </div>
        </div>
    <?php 
	}

}


// Display advanced excerpt
if ( ! function_exists( 'bnt_excerpt' ) ) {
	
	function bnt_excerpt( $length = 300 ) {
		$excerpt = '';
		$content = get_extended( apply_filters( 'the_content', strip_shortcodes( get_the_content() ) ) );
		$content = str_replace( ']]>', ']]&gt;', $content );
		// First check if the post has an excerpt
		if ( has_excerpt() ) {
			$excerpt = get_the_excerpt(); 
		} else {
			$content_main = $content['main'];
			if ( strlen($content_main) > $length ) {
				$pos = strpos( $content_main, ' ', $length );
				if ( $pos === false ) {
					$excerpt = $content_main;
				} else {
					$excerpt = substr( $content_main, 0, $pos );
					$excerpt .= '.. <a href="'.get_post_permalink().'">&rarr;</a>';
				}
			} else {
				$excerpt = $content_main;
			}			 
		} 
		if ( get_post_format() === 'link' ) { 
			$excerpt = bnt_link_format_content();
		} elseif ( get_post_format() === 'quote' ) {
			$excerpt = bnt_quote_format_content();
		}
		echo '<div class="entry-content grid-item-content">'.$excerpt.'</div>';
	}
		
}


// Render masonry tile content
if ( ! function_exists( 'bnt_masonry_item_content' ) ) {
	
	function bnt_masonry_item_content() {
		
		global $post;
		global $bnt_parent_page_id;
		$tile_content = $tile_title = $tile_content_opacity = $tile_text_style = $tile_project_types = $tile_text_color = $tile_background = $tile_image = $tile_overlay = $tile_color = $tile_opacity = '';
		
		// Content
		if ( get_post_format( $post->ID ) === 'quote' ) {
			$tile_title = '"'.get_the_content().'"<br><br><em>'.get_the_title().'</em>';
		} else {
			$tile_title = get_the_title();
		}
		if ( get_post_meta( $bnt_parent_page_id, 'bnt_hide_tile_overlays', true) == 'on' ) {
			$tile_content_opacity = 'style="opacity: 0.0"';
		}
		if ( implode( get_post_meta( $bnt_parent_page_id, 'bnt_page_content_types', true ) ) == 'project' ) {
			$types_objects = get_the_terms( $post->ID, 'project_type' );
			$tile_project_types_list = array();
			if ( $types_objects != false ) {
				foreach ( $types_objects as $types_object ) {
					$tile_project_types_list[] = $types_object->name;
				}
				$tile_project_types_list = implode(', ', $tile_project_types_list);
			}
			$tile_project_types = '<div class="project-tile-types">'.$tile_project_types_list.'</div>';
		}
		$tile_text_color = 'color:'.get_post_meta( $post->ID, 'bnt_tile_text_color', true ).';';
		$tile_text_size = 'font-size:'.get_post_meta( $post->ID, 'bnt_tile_text_size', true ).'px;';
		$tile_text_style .= 'style="'.$tile_text_color.$tile_text_size.'"';
		$tile_content .= '
			<div class="masonry-item-content" '.$tile_content_opacity.'>
				<header class="entry-header grid-item-header masonry-item-header">
					<h2 class="entry-title" '.$tile_text_style.'>'.$tile_title.'</h2>
				</header>
				'.$tile_project_types.'
			</div>
		';
		
		// Background
		if ( has_post_thumbnail() ) {
			$tile_background .= 'style=background-image:url("'.wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' )[0].'")';
		}
		if ( get_post_meta( $post->ID, 'bnt_tile_overlay_opacity', true) != '' ) {
			if ( get_post_meta( $bnt_parent_page_id, 'bnt_hide_tile_overlays', true) != 'on' ) {
				$tile_opacity = 'opacity:'.get_post_meta( $post->ID, 'bnt_tile_overlay_opacity', true).';';
			} else {
				$tile_opacity = 'opacity: 0.0';
			}
		}
		if ( get_post_meta( $post->ID, 'bnt_tile_overlay_color', true ) != '' ) {
			$tile_color = 'background-color:'.get_post_meta( $post->ID, 'bnt_tile_overlay_color', true ).';';
		}
		$tile_overlay .= 'style="'.$tile_color.$tile_opacity.'"';
		$tile_content .= '
			<div class="masonry-item-overlay" '.$tile_overlay.'>
			</div>
			<div class="masonry-item-image" '.$tile_background.'>
			</div>
		';
		
		echo $tile_content;
		
	}
	
}


// Display info header for new users
if ( ! function_exists( 'bnt_novice_header' ) ) {
	
	function bnt_novice_header() {
		$status = get_option( 'novice_header' );
		if ( $status != 'dismissed' ) {
			?>
			<div class="novice-header">
				<div class="novice-header-inner">
					<div class="novice-header-title">
						<?php _e( 'Welcome to', 'satori' ); ?> <span class="novice-header-title-red">Bento</span><br>
						<?php _e( 'The Ultimate Free WordPress Theme', 'satori' ); ?>
					</div>
					<div class="novice-header-options">
						<a class="novice-header-button nhb-manual" href="http://satoristudio.net/bento-manual" target="_blank">
							<?php _e( 'Open theme manual', 'satori' ); ?>
						</a>
						<a class="novice-header-button nhb-demo" href="http://satoristudio.net/bento" target="_blank">
							<?php _e( 'View full demo', 'satori' ); ?>
						</a>
						<a class="novice-header-button nhb-dismiss" target="_blank">
							<?php _e( 'Dismiss this heading', 'satori' ); ?>
						</a>
					</div>
				</div>
			</div>
			<?php
		}
	}
	
}


?>