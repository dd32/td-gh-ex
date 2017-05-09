<?php 
/**
 * BasePress template functions.
 *
 * @author  ThemeCountry
 * @since 	1.0.0
 * @package basepress
 */

if ( ! function_exists( 'basepress_skip_links' ) ) {
	/**
	 * Skip links
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function basepress_skip_links() {
		?>
		<a class="skip-link screen-reader-text" href="#site-navigation"><?php esc_attr_e( 'Skip to navigation', 'basepress' ); ?></a>
		<a class="skip-link screen-reader-text" href="#content"><?php esc_attr_e( 'Skip to content', 'basepress' ); ?></a>
		<?php
	}
}

if ( ! function_exists( 'basepress_site_branding' ) ) {
	/**
	 * Site branding wrapper and display
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function basepress_site_branding() {
		?>
		<div id="logo" class="site-branding clearfix">
			<?php basepress_site_title_or_logo(); ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'basepress_site_title_or_logo' ) ) {
	/**
	 * Display the site title or logo
	 *
	 * @since 1.0.0
	 * @param bool $echo Echo the string or return it.
	 * @return string
	 */
	function basepress_site_title_or_logo( $echo = true ) {
		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			$logo = get_custom_logo();
			$html = is_home() ? '<h1 class="logo">' . $logo . '</h1>' : $logo;
		} elseif ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) {
			// Copied from jetpack_the_site_logo() function.
			$logo    = site_logo()->logo;
			$logo_id = get_theme_mod( 'custom_logo' ); // Check for WP 4.5 Site Logo
			$logo_id = $logo_id ? $logo_id : $logo['id']; // Use WP Core logo if present, otherwise use Jetpack's.
			$size    = site_logo()->theme_size();
			$html    = sprintf( '<a href="%1$s" class="site-logo-link" rel="home" itemprop="url">%2$s</a>',
				esc_url( home_url( '/' ) ),
				wp_get_attachment_image(
					$logo_id,
					$size,
					false,
					array(
						'class'     => 'site-logo attachment-' . $size,
						'data-size' => $size,
						'itemprop'  => 'logo'
					)
				)
			);

			$html = apply_filters( 'jetpack_the_site_logo', $html, $logo, $size );
		} else {
			$tag = is_home() ? 'h1' : 'div';

			$html = '<' . esc_attr( $tag ) . ' class="beta site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html( get_bloginfo( 'name' ) ) . '</a></' . esc_attr( $tag ) .'>';

			if ( '' !== get_bloginfo( 'description' ) ) {
				$html .= '<p class="site-description">' . esc_html( get_bloginfo( 'description', 'display' ) ) . '</p>';
			}
		}

		if ( ! $echo ) {
			return $html;
		}

		echo $html;
	}
}

if ( ! function_exists('basepress_primary_navigation') ) {

	function basepress_primary_navigation() {

		?>
		<nav id="site-navigation" class="main-navigation" role="navigation">

			<?php
				// Display Primary Navigation.
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_id' 		 => 'primary-navigation',
					'container' 	 => '',
					'menu_class' 	 => 'main-navigation-menu',
					'echo' 			 => true,
					'fallback_cb' 	 => 'basepress_default_menu',
					)
				);
			
			?>
						
		</nav><!-- #site-navigation -->
		
		<?php 
	}
}


if ( ! function_exists( 'basepress_header_image' ) ) {
	/**
	 * Displays the custom header image below the navigation menu
	 */
	function basepress_header_image() {
		
		// Get theme options from database
		$theme_options = basepress_theme_options();	
		
		// Display featured image as header image on static pages
		if( is_page() && has_post_thumbnail() ) : ?>
			
			<div id="headimg" class="header-image featured-image-header 66">
				<?php the_post_thumbnail( 'basepress-header-image' ); ?>
			</div>
		
		<?php // Display Header Image on Single Posts
		elseif( is_single() && has_post_thumbnail() && 'header' == $theme_options['post_layout_single'] ) : ?>
			
			<div id="headimg" class="header-image featured-image-header">
				<?php the_post_thumbnail( 'basepress-header-image' ); ?>
			</div>
		
		<?php 
		elseif( ( is_single() || is_page() ) && 'none' == $theme_options['post_layout_single'] ) :
			return;

		?>
		<?php // Display default header image set on Appearance > Header
		elseif( get_header_image() ) : 

			// Hide header image on front page
			if ( true == $theme_options['custom_header_hide'] and ( is_front_page() || is_archive() || is_search() ) ) {
				return;
			}
			?>
			
			<div id="headimg" class="header-image">
				
				<?php // Check if custom header image is linked
				if( $theme_options['custom_header_link'] <> '' ) : ?>
				
					<a href="<?php echo esc_url( $theme_options['custom_header_link'] ); ?>">
						<img src="<?php echo get_header_image(); ?>" />
					</a>
					
				<?php else : ?>
				
					<img src="<?php echo get_header_image(); ?>" />
					
				<?php endif; ?>
				
			</div>
		
		<?php 
		endif;
	}
}

if ( ! function_exists( 'basepress_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function basepress_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$theme_options = basepress_theme_options();

	$nav_style =  $theme_options['paging'];

	if  ( $nav_style == 'paging-numberal') :
		// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( '<i class="fa fa-angle-left"></i>', 'basepress' ),
				'next_text'          => __( '<i class="fa fa-angle-right"></i>', 'basepress' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'basepress' ) . ' </span>',
			) );

	elseif ( $nav_style == 'paging-loading' ) :

		basepress_infinite_loading();

	elseif ( $nav_style == 'paging-infinite' ) : 

		basepress_infinite_loading('infinite');

	else :

		$args = array(
	            'prev_text'          =>  __( '<i class="fa fa-angle-left"></i> Older Posts', 'basepress' ),
	            'next_text'          => __( 'Newer Posts <i class="fa fa-angle-right"></i>', 'basepress' )
        	);

		the_posts_navigation($args);

	endif;
}
endif;

if ( ! function_exists( 'basepress_post_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function basepress_post_header() {

		if ( is_single() ) {
			
			the_title( '<h1 class="entry-title single-title">', '</h1>' );

		} else {
			
			the_title( sprintf( '<h2 class="alpha entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		}
		
	}
}

if ( ! function_exists('basepress_post_header_wrapper') ) {

	function basepress_post_header_wrapper() {

		echo '<header class="entry-header">';

	}

}

if ( ! function_exists('basepress_post_header_wrapper_close') ) {

	function basepress_post_header_wrapper_close() {

		echo '</header> <!-- .entry-header -->';

	}
}

if ( ! function_exists( 'basepress_post_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function basepress_post_content() {


		/**
		 * Functions hooked in to basepress_post_content_before action.
		 *
		 * @hooked basepress_post_thumbnail - 10
		 */
		do_action( 'basepress_post_content_before');

		the_content( sprintf(
			/* translators: %s: Name of current post. */
			wp_kses( __( 'Continue Reading %s <span class="meta-nav">&rarr;</span>', 'basepress' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );

		do_action( 'basepress_post_content_after' );


		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'basepress' ),
			'after'  => '</div>',
		) );

		
	}
}

if ( ! function_exists( 'basepress_post_single_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function basepress_post_single_content() {


		/**
		 * Functions hooked in to basepress_post_content_before action.
		 *
		 * @hooked basepress_post_thumbnail - 10
		 */
		do_action( 'basepress_post_single_content_before');

		the_content( sprintf(
			/* translators: %s: Name of current post. */
			wp_kses( __( 'Continue Reading %s <span class="meta-nav">&rarr;</span>', 'basepress' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );


		do_action( 'basepress_post_single_content_after' );


		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'basepress' ),
			'after'  => '</div>',
		) );

		
	}
}

if ( ! function_exists( 'basepress_post_header_meta' ) ) {

	function basepress_post_header_meta() {
		if ( 'post' === get_post_type() ) { ?>
			<footer class="entry-meta">
				<?php

					basepress_posted_on(); 
					basepress_entry_footer(); 
				?>
			</footer><!-- .entry-footer -->
		<?php
		}
	}
}

if ( ! function_exists( 'basepress_post_content_wrapper' ) ) {

	function basepress_post_content_wrapper() {
		echo '<div class="entry-content">';
	}
}

if ( ! function_exists( 'basepress_post_content_wrapper_close' ) ) {

	function basepress_post_content_wrapper_close() {
		echo '</div><!-- .entry-content -->';
	}
}

if ( ! function_exists( 'basepress_post_tags' ) ) :
	/**
	 * Displays the post tags on single post view
	 */
	function basepress_post_tags() {

		// Get theme options from database.
		$theme_options = basepress_theme_options();

		$meta_items = array_flip($theme_options['post_meta_info']);

		// Get tags.
		$tag_list = get_the_tag_list( '', '' );

		// Display tags.
		if ( $tag_list && isset( $meta_items['meta-tag'] ) ) : ?>

		<footer class="entry-footer">

			<div class="entry-tags clearfix">
				<span class="meta-tags">
					<?php echo $tag_list; ?>
				</span>
			</div><!-- .entry-tags -->

		</footer>

		<?php
		endif;
	}
endif;

if ( ! function_exists( 'basepress_post_nav' ) ) {
	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function basepress_post_nav() {
		$args = array(
			'next_text' => '%title',
			'prev_text' => '%title',
			);
		the_post_navigation( $args );
	}
}

if ( ! function_exists( 'basepress_display_comments' ) ) {
	/**
	 * base display comments
	 *
	 * @since  1.0.0
	 */
	function basepress_display_comments() {
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
		endif;
	}
}

if ( ! function_exists( 'basepress_post_thumbnail' ) ) {
	/**
	 * Display post thumbnail
	 *
	 * @var $size thumbnail size. thumbnail|medium|large|full|$custom
	 * @uses has_post_thumbnail()
	 * @uses the_post_thumbnail
	 * @param string $size the post thumbnail size.
	 * @since 1.0.0
	 */
	function basepress_post_thumbnail( $size = 'thumbnail' ) {

		if ( has_post_thumbnail() ) {

			?>
			<div class="thumbnail">

				<a href="<?php the_permalink() ?>" rel="bookmark" class="featured-thumbnail">

					<?php the_post_thumbnail($size);  ?>
							
				</a>

			</div>
			<?php 
			
		}
	}
}

if ( ! function_exists('basepress_post_meta') ) {

	function basepress_post_meta() {

	}
}

if ( !function_exists( 'basepress_entry_meta_footer' )) {
	/**
	 * Displays the date, author, tag and categories on footer post
	 */
	function basepress_entry_meta_footer() {

		basepress_post_metadata();

		// Edit link
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'basepress' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
}

if ( ! function_exists( 'basepress_categorized_blog' ) ) {
	/**
	 * Returns true if a blog has more than 1 category.
	 *
	 * @return bool
	 */
	function basepress_categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'basepress_categories' ) ) ) {
			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories( array(
				'fields'     => 'ids',
				'hide_empty' => 1,
				// We only need to know if there is more than one category.
				'number'     => 2,
			) );

			// Count the number of categories that are attached to the posts.
			$all_the_cool_cats = count( $all_the_cool_cats );

			set_transient( 'basepress_categories', $all_the_cool_cats );
		}

		if ( $all_the_cool_cats > 1 ) {
			// This blog has more than 1 category so basepress_categorized_blog should return true.
			return true;
		} else {
			// This blog has only 1 category so basepress_categorized_blog should return false.
			return false;
		}
	}
}

/**
 * Flush out the transients used in basepress_categorized_blog.
 */
function basepress_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'basepress_categories' );
}
add_action( 'edit_category', 'basepress_category_transient_flusher' );
add_action( 'save_post',     'basepress_category_transient_flusher' );

if ( ! function_exists ( 'basepress_post_metadata' ) ) :
/**
 * Render post metat data
 * 
 */
function basepress_post_metadata() {

	// Get theme options from database.
	$theme_options = basepress_theme_options();

	$meta_items = array_flip($theme_options['post_meta_info']);

	$prefix = apply_filters('basepress_prefix_post_metadata', array(

		'date'		=> '',
		'author'	=> '',
		'category'	=> '',
		'comment'	=> '',

	));

	$postmeta = '';

	// Display date unless user has deactivated it via settings.
	if ( isset( $meta_items['meta-date'] ) ) {

		$postmeta .= $prefix['date'] . basepress_meta_date();

	}

	// Display author unless user has deactivated it via settings.
	if ( isset( $meta_items['meta-au'] ) ) {

		$postmeta .= $prefix['author'] . basepress_meta_author();

	}

	// Display categories unless user has deactivated it via settings.
	if ( isset( $meta_items['meta-cat'] ) )  {

		$postmeta .= $prefix['category'] . basepress_meta_category();

	}

	if ( isset( $meta_items['meta-com'] ) ) {

		$postmeta .=  $prefix['comment'] . basepress_meta_comments();

	}

	if ( $postmeta ) { ?>

		<footer class="entry-footer">

			<?php

				echo $postmeta;

			?>
		
		</footer>

	<?php

	}
}
endif;

if ( ! function_exists( 'basepress_meta_date' ) ) :
	/**
	 * Displays the post date
	 */
	function basepress_meta_date() {

		$time_string = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date published updated" datetime="%3$s">%4$s</time></a>',
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		return '<span class="meta-date posted-on">' . $time_string . '</span>';
	}
endif;



if ( ! function_exists( 'basepress_meta_author' ) ) :
	/**
	 * Displays the post author
	 */
	function basepress_meta_author() {

		$author_string = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( esc_html__( 'View all posts by %s', 'basepress' ), get_the_author() ) ),
			esc_html( get_the_author() )
		);

		return '<span class="meta-author byline">' . $author_string . '</span>';
	}
endif;

if ( ! function_exists( 'basepress_meta_category' ) ) :
	/**
	 * Displays the category of posts
	 */
	function basepress_meta_category() {

		return '<span class="meta-category"> ' . get_the_category_list( ', ' ) . '</span>';

	}
endif;

if ( ! function_exists( 'basepress_get_sidebar' ) ) {
	/**
	 * Display base sidebar
	 *
	 * @uses get_sidebar()
	 * @since 1.0.0
	 */
	function basepress_get_sidebar() {
		get_sidebar();
	}
}

if ( ! function_exists( 'basepress_header_widget_region' ) ) {
	/**
	 * Display header widget region
	 *
	 * @since  1.0.0
	 */
	function basepress_header_widget_region() {
		if ( is_active_sidebar( 'header-1' ) ) {
		?>
		<div class="header-widget-region" role="complementary">
			<div class="col-full">
				<?php dynamic_sidebar( 'header-1' ); ?>
			</div>
		</div>
		<?php
		}
	}
}


if ( ! function_exists( 'basepress_footer_widgets' ) ) {
	/**
	 * Display the footer widget regions
	 *
	 * @since  1.0.0
	 * @return  void
	 */
	function basepress_footer_widgets() {

		if ( is_active_sidebar( 'footer-4' ) ) {
			$widget_columns = apply_filters( 'basepress_footer_widget_regions', 4 );
		} elseif ( is_active_sidebar( 'footer-3' ) ) {
			$widget_columns = apply_filters( 'basepress_footer_widget_regions', 3 );
		} elseif ( is_active_sidebar( 'footer-2' ) ) {
			$widget_columns = apply_filters( 'basepress_footer_widget_regions', 2 );
		} elseif ( is_active_sidebar( 'footer-1' ) ) {
			$widget_columns = apply_filters( 'basepress_footer_widget_regions', 1 );
		} else {
			$widget_columns = apply_filters( 'basepress_footer_widget_regions', 0 );
		}

		if ( $widget_columns > 0 ) : ?>
				<div class="container">
					<div class="footer-widgets col-<?php echo intval( $widget_columns ); ?>"">
						<?php
						$i = 0;
						$clas_last = '';
						while ( $i < $widget_columns ) : $i++;
							if ( is_active_sidebar( 'footer-' . $i ) ) :

								?>
								
								<div class="block footer-widget-<?php echo intval( $i ); ?>">
									<?php dynamic_sidebar( 'footer-' . intval( $i ) ); ?>
								</div>

							<?php endif;
						endwhile; ?>
					</div>
				</div> <!-- /.container -->
			

		<?php endif;
	}
}

if ( ! function_exists( 'basepress_credit_wrapper' )) {
	/**
	 * Credit wrapper
	 */
	function basepress_credit_wrapper() {
		echo '<div class="copyrights"><div class="container">';
	}
}

if ( ! function_exists( 'basepress_credit_wrapper_close' )) {
	/**
	 * Credit close wrapper 
	 */
	function basepress_credit_wrapper_close() {
		echo '</div></div>';
	}
}

if ( ! function_exists( 'basepress_footer_nav' ) ) {
	/**
	 * Display footer menu
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function basepress_footer_nav() {

		// Check if there is a footer menu.
		if ( has_nav_menu( 'footer' ) ) {

			echo '<nav id="footer-links" class="footer-navigation navigation" role="navigation">';

			wp_nav_menu( array(
				'theme_location' => 'footer',
				'container' => false,
				'menu_class' => 'footer-menu',
				'echo' => true,
				'fallback_cb' => '',
				'depth' => 1,
				)
			);

			echo '</nav><!-- #footer-links -->';

		}

	}
}

if ( ! function_exists( 'basepress_credit' ) ) {
	/**
	 * Display the theme credit
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function basepress_credit() {
		?>
		<div class="site-info">
			<?php echo esc_html( apply_filters( 'basepress_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . date( 'Y' ) ) ); ?>

			<?php if ( apply_filters( 'basepress_credit_link', true ) ) { ?>

			<br> <?php printf( esc_attr__( '%1$s designed by %2$s.', 'basepress' ), 'BasePress', '<a href="https://themecountry.com" title="Base - The best free blog theme for WordPress" rel="author">ThemeCountry</a>' ); ?>
			<?php } ?>
		</div><!-- .site-info -->
		<?php
	}
}

if ( ! function_exists( 'basepress_footer_back_top' ) ) {

	function basepress_footer_back_top() {
		?>
		<span class="back-to-top"><i class="fa fa-angle-up" aria-hidden="true"></i></span>
		<?php 
	}
}

if ( ! function_exists( 'basepress_init_structured_data' ) ) {
	/**
	 * Generates structured data.
	 *
	 * Hooked into the following action hooks:
	 *
	 * - `basepress_loop_post`
	 * - `basepress_single_post`
	 * - `basepress_page`
	 *
	 * Applies `basepress_structured_data` filter hook for structured data customization :)
	 */
	function basepress_init_structured_data() {

		// Post's structured data.
		if ( is_home() || is_category() || is_date() || is_search() || is_single() ) {

			$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'normal' );
			$logo  = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );

			$json['@type']            = 'BlogPosting';

			$json['mainEntityOfPage'] = array(
				'@type'                 => 'webpage',
				'@id'                   => get_the_permalink(),
			);

			$json['publisher']        = array(
				'@type'                 => 'organization',
				'name'                  => get_bloginfo( 'name' ),
				'logo'                  => array(
					'@type'               => 'ImageObject',
					'url'                 => $logo[0],
					'width'               => $logo[1],
					'height'              => $logo[2],
				),
			);

			$json['author']           = array(
				'@type'                 => 'person',
				'name'                  => get_the_author(),
			);

			if ( $image ) {
				$json['image']            = array(
					'@type'                 => 'ImageObject',
					'url'                   => $image[0],
					'width'                 => $image[1],
					'height'                => $image[2],
				);
			}

			$json['datePublished']    = get_post_time( 'c' );
			$json['dateModified']     = get_the_modified_date( 'c' );
			$json['name']             = get_the_title();
			$json['headline']         = $json['name'];
			$json['description']      = get_the_excerpt();

		// Page's structured data.
		} elseif ( is_page() ) {
			$json['@type']            = 'WebPage';
			$json['url']              = get_the_permalink();
			$json['name']             = get_the_title();
			$json['description']      = get_the_excerpt();
		}

		if ( isset( $json ) ) {
			BasePress::set_structured_data( apply_filters( 'basepress_structured_data', $json ) );
		}
	}
}


if ( ! function_exists( 'basepress_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function basepress_posted_on() {

	$theme_options = basepress_theme_options();

	$meta_items = array_flip($theme_options['post_meta_info']);

	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%4$s">%4$s</time>';
		//$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);


	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'basepress' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
	

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'basepress' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	if ( isset( $meta_items['meta-date'] ) )  {

		echo '<span class="posted-on">' . $posted_on . '</span>';

	}
	if ( isset( $meta_items['meta-au'] ) )  {

		echo '<span class="byline">' . $byline . '</span>';
		
	}

}
endif;

if ( ! function_exists( 'basepress_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function basepress_entry_footer() {

	$theme_options = basepress_theme_options();

	$meta_items = array_flip($theme_options['post_meta_info']);

	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {

		if ( isset( $meta_items['meta-cat'] ) ) {

			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'basepress' ) );
			if ( $categories_list && basepress_categorized_blog() ) {
				printf( '<span class="cat-links">' . esc_html__( '%1$s', 'basepress' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

		}

	}

	if ( isset( $meta_items['meta-com'] ) ) {

			if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="comments-link">';
				/* translators: %s: post title */
				comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'basepress' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
				echo '</span>';
			}

	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'basepress' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;