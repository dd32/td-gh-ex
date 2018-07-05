<?php
/**
 * AzonBooster template functions.
 *
 * @package AzonBooster
 */

if ( ! function_exists( 'azonbooster_skip_links' ) ) {
	/**
	 * Skip links
	 *
	 * @since  1.4.1
	 * @return void
	 */
	function azonbooster_skip_links() {
		?>
		<a class="skip-link screen-reader-text" href="#site-navigation"><?php esc_attr_e( 'Skip to navigation', 'azonbooster' ); ?></a>
		<a class="skip-link screen-reader-text" href="#content"><?php esc_attr_e( 'Skip to content', 'azonbooster' ); ?></a>
		<?php
	}
}

if ( ! function_exists( 'azonbooster_header_wrapper' ) ) {
	function azonbooster_header_wrapper() {
		?>
		<div class="header-left">
		<?php
	}
}
if ( ! function_exists( 'azonbooster_header_wrapper_close' ) ) {
	function azonbooster_header_wrapper_close() {
		?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'azonbooster_handburger_btn' ) ) {

	function azonbooster_handburger_btn() {
		?>
		
			<div class="menu-toggle">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<div class="menu-close-btn">
					<i class="fa fa-close"></i>
				</div>
				<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
			<?php if ( ( ( is_home() && is_front_page() ) ) && has_custom_header() ) : ?>
				<a href="#content" class="menu-scroll-down"><span class="screen-reader-text"><?php _e( 'Scroll down to content', 'azonbooster' ); ?></span></a>
			<?php endif; ?>
		
		<?php
	}
}

if ( ! function_exists( 'azonbooster_header_search' ) ) {
	function azonbooster_header_search() {

		?>
			<div class="header-right">
				<div class="search-toggle"><i class="fa fa-search"></i></div>
			</div>
		<?php
	}
}

if ( ! function_exists( 'azonbooster_header_search_form') ) {

	function azonbooster_header_search_form() {
		?>
		<div class="site-search">
			<div class="site-search-inner">
				<div class="search-inner">
				<?php echo get_search_form(); ?>
				</div>
			</div>
			<div class="search-toggle-close"><i class="fa fa-close"></i></div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'azonbooster_site_branding' ) ) {
	/**
	 * Site branding wrapper and display
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function azonbooster_site_branding() {
		?>
		<div class="site-branding">
			<?php azonbooster_site_title_or_logo(); ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'azonbooster_site_title_or_logo' ) ) {
	/**
	 * Display the site title or logo
	 *
	 * @since 2.1.0
	 * @param bool $echo Echo the string or return it.
	 * @return string
	 */
	function azonbooster_site_title_or_logo( $echo = true ) {
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

if ( ! function_exists( 'azonbooster_get_sidebar' ) ) {
	/**
	 * Display azonbooster sidebar
	 *
	 * @uses get_sidebar()
	 * @since 1.0.0
	 */
	function azonbooster_get_sidebar() {
		get_sidebar();
	}
}

if ( ! function_exists( 'azonbooster_page_header' ) ) {
	/**
	 * Display the page header
	 *
	 * @since 1.0.0
	 */
	function azonbooster_page_header() {
		?>
		<header class="entry-header">
			<?php
			azonbooster_post_thumbnail( 'full' );
			the_title( '<h1 class="entry-title">', '</h1>' );
			?>
		</header><!-- .entry-header -->
		<?php
	}
}

if ( ! function_exists( 'azonbooster_page_content' ) ) {
	/**
	 * Display the post content
	 *
	 * @since 1.0.0
	 */
	function azonbooster_page_content() {
		?>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'azonbooster' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		<?php
	}
}

/**
 * POSTS
 */

if ( ! function_exists( 'azonbooster_post_header' ) ) {

	function azonbooster_post_header() {

		do_action( 'azonbooster_before_title' );

		?>
		<header class="entry-header">
		<?php
		if ( is_single() ) {
			
			the_title( '<h1 class="entry-title">', '</h1>' );

			do_action( 'azonbooster_post_meta' );

		} else {
			

			the_title( sprintf( '<h2 class="alpha entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

			do_action( 'azonbooster_post_meta' );
		}
		?>
		</header><!-- .entry-header -->
		<?php

		do_action( 'azonbooster_after_title' );

	}
}

if ( ! function_exists( 'azonbooster_post_thumbnail' ) ) {
	/**
	 * Display post thumbnail
	 *
	 * @var $size thumbnail size. thumbnail|medium|large|full|$custom
	 * @uses has_post_thumbnail()
	 * @uses the_post_thumbnail	 
	 * @since 1.0.0
	 */

	function azonbooster_post_thumbnail( ) {

		$thumbnail = apply_filters('azonbooster_thumbnail_size', 'azonbooster-post-feature-large');
		$show_thumbnail = apply_filters('azonbooster_show_post_thumbnail', true);

		if ( has_post_thumbnail() && $show_thumbnail ) {

			?>
			<div class="post-thumnbnail">
			<?php

			$link = esc_url(apply_filters('azonbooster_thumbnail_link', get_permalink( get_the_ID() )) );
			$enable_link = apply_filters('azonbooster_thumbnail_enable_link', true);

			if ( $enable_link && (! is_single() || ! is_page() ) ) {

				?>
				<a href="<?php echo $link ?>"> 
				<?php
					the_post_thumbnail( $thumbnail );
				?></a>

				<?php

			} else {

				the_post_thumbnail( $thumbnail );
			}
			?>
			
			</div>

			<?php
			
		}
	}

}

if ( ! function_exists( 'azonbooster_post_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function azonbooster_post_content() {
		?>
		<div class="entry-content">
		<?php

		/**
		 * Functions hooked in to azonbooster_post_content_before action.
		 *
		 * @hooked azonbooster_post_thumbnail - 10
		 */
		do_action( 'azonbooster_post_content_before' );

		$show_excerpt = apply_filters('azonbooster_show_excerpt', true);

		if ( $show_excerpt && ! is_single() ) {

			the_excerpt();

			$show_readmore = apply_filters('azonbooster_show_readmore', true);

			if ( $show_readmore ) {

				azonbooster_readmore_link();
			}

		} else {

			the_content(
				sprintf(
					__( 'Continue reading %s', 'azonbooster' ),
					'<span class="screen-reader-text">' . get_the_title() . '</span>'
				)
			);

		}

		do_action( 'azonbooster_post_content_after' );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'azonbooster' ),
			'after'  => '</div>',
		) );
		?>
		</div><!-- .entry-content -->
		<?php
	}
}

if ( ! function_exists( 'azonbooster_readmore_link' ) ) {

	function azonbooster_readmore_link() {

		$link = esc_url( apply_filters('azonbooster_readmore_link', get_permalink( get_the_ID() )) );
		$label = apply_filters('azonbooster_readmore_link_label', __( 'View Detail', 'azonbooster' ) );
		$position = esc_attr( apply_filters('azonbooster_readmore_link_pos', '') );

		printf( '<a class="read-more %1$s" href="%2$s">%3$s</a>', $position, $link , $label);
	}
}

if ( ! function_exists( 'azonbooster_post_nav' ) ) {
	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function azonbooster_post_nav() {

		$show_post_nav = apply_filters('azonbooster_show_post_nav', true);

		if ( $show_post_nav ) {
			
			$args = array(
				'next_text' => '%title',
				'prev_text' => '%title',
				);
			the_post_navigation( $args );

		} 
	}
}

if ( ! function_exists( 'azonbooster_paging_nav' ) ) {
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function azonbooster_paging_nav() {
		
		global $wp_query;

		$args = array(
			'type' 	    => 'list',
			'next_text' => _x( 'Next', 'Next post', 'azonbooster' ),
			'prev_text' => _x( 'Previous', 'Previous post', 'azonbooster' ),
			);

		the_posts_pagination( $args );
	}
}

if ( ! function_exists( 'azonbooster_footer_widgets' ) ) {
	/**
	 * Display the footer widget regions.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function azonbooster_footer_widgets() {
		$rows    = intval( apply_filters( 'azonbooster_footer_widget_rows', 2 ) );
		$regions = intval( apply_filters( 'azonbooster_footer_widget_columns', 4 ) );

		for ( $row = 1; $row <= $rows; $row++ ) :

			// Defines the number of active columns in this footer row.
			for ( $region = $regions; 0 < $region; $region-- ) {
				if ( is_active_sidebar( 'footer-' . strval( $region + $regions * ( $row - 1 ) ) ) ) {
					$columns = $region;
					break;
				}
			}

			if ( isset( $columns ) ) : ?>
				<div class=<?php echo '"footer-widgets row-' . strval( $row ) . ' col-' . strval( $columns ) . ' fix"'; ?>><?php

					for ( $column = 1; $column <= $columns; $column++ ) :
						$footer_n = $column + $regions * ( $row - 1 );

						if ( is_active_sidebar( 'footer-' . strval( $footer_n ) ) ) : ?>

							<div class="block footer-widget-<?php echo strval( $column ); ?>">
								<?php dynamic_sidebar( 'footer-' . strval( $footer_n ) ); ?>
							</div><?php

						endif;
					endfor; ?>

				</div><!-- .footer-widgets.row-<?php echo strval( $row ); ?> --><?php

				unset( $columns );
			endif;
		endfor;
	}
}

if ( ! function_exists( 'azonbooster_credit' ) ) {
	/**
	 * Display the theme credit
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function azonbooster_credit() {
		?>
		<div class="site-info">

			<?php echo esc_html( apply_filters( 'azonbooster_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . date( 'Y' ) ) ); ?>

			<?php if ( apply_filters( 'azonbooster_credit_link', true ) ) : ?>

			<br /> <?php printf( esc_attr__( '%1$s designed by %2$s.', 'azonbooster' ), 'AzonBooster', '<a href="https://boosterwp.com" title="AzonBooster Theme - The Best Free Amazon Affiliate WordPress Themes" rel="author">AzonBooster</a>' ); ?>

			<?php endif; ?>

		</div><!-- .site-info -->
		<?php
	}
}

if ( ! function_exists( 'azonbooster_display_comments' ) ) {
	/**
	 * azonbooster display comments
	 *
	 * @since  1.0.0
	 */
	function azonbooster_display_comments() {
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
		endif;
	}
}

if ( ! function_exists( 'azonbooster_post_meta' ) ) {

	function azonbooster_post_meta() {

		/**
	 * Prefix all post meta
	 * 
	 * @var array
	 */
	$prefix = apply_filters('azonbooster_prefix_post_metadata', array(

		'date'		=> '',
		'modified'	=> __('Last updated', 'azonbooster'),
		'author'	=> __('By ', 'azonbooster'),
		'category'	=> '',
		'comment'	=> '',
		'tag'		=> '',

	));

	$postmeta = '';

	/**
	 * Allow theme author enable or disable post meta data
	 * 
	 * @var [type]
	 */
	$metadata = apply_filters('azonbooster_enable_post_metadata', array(
		'date',
		'author',
		'category',
		'tag',
		'comment'
	));


	foreach ( $metadata as $md) {

		switch ( $md ) {
			case 'date':

				$postmeta .= azonbooster_meta_date( $prefix );

				break;
			case 'author':

				$postmeta .= azonbooster_meta_author( $prefix[$md] );

				break;
			case 'category':

				$postmeta .= azonbooster_meta_category( $prefix[$md] );

				break;
			case 'tag':

				$postmeta .=  azonbooster_meta_tag( $prefix[$md] );

				break;

			case 'comment':

				$postmeta .=  azonbooster_meta_comments( $prefix[$md] );
				
				break;
		}
	}
	

	if ( $postmeta ) { ?>

		<div class="entry-meta">

			<?php

				echo $postmeta;

				edit_post_link( __( 'Edit', 'azonbooster' ), '<span class="edit-link">', '</span>' );

			?>
				
		</div>

	<?php

	}
		
	}
}
if ( ! function_exists( 'azonbooster_meta_date' ) ) :
	/**
	 * Displays the post date
	 */
	function azonbooster_meta_date( $prefix = array() ) {


		$modified = apply_filters('azonbooster_enable_modified', false);

		$pre  = $modified ? $prefix['modified'] : $prefix['date'];

		$pre = $pre != '' ? '<span class="meta-prefix prefix-date">'. $pre . '</span> ' : '';

		if ( $modified ) {

			$time_string = sprintf( '<time class="entry-date published updated" datetime="%1$s">%2$s</time>',
				esc_attr( get_the_modified_date( 'c' ) ),
				esc_html( get_the_modified_date() )
			);

			

		} else {

			$time_string = sprintf( '<time class="entry-date published updated" datetime="%1$s">%2$s</time>',
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() )
			);
		}

		return '<span class="meta-date posted-on">' . $pre . $time_string  .  '</span>';
	}
endif;



if ( ! function_exists( 'azonbooster_meta_author' ) ) :
	/**
	 * Displays the post author
	 */
	function azonbooster_meta_author( $prefix = '' ) {

		$prefix = $prefix != '' ? '<span class="meta-prefix prefix-author">'. $prefix . '</span>' : '';

		$author_string = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( esc_html__( 'View all posts by %s', 'azonbooster' ), get_the_author() ) ),
			esc_html( get_the_author() )
		);

		return '<span class="meta-author byline">' . $prefix . wp_kses_post($author_string) . '</span>';
	}
endif;

if ( ! function_exists( 'azonbooster_meta_category' ) ) :
	/**
	 * Displays the category of posts
	 */
	function azonbooster_meta_category( $prefix = '' ) {

		$prefix = $prefix != '' ? '<span class="meta-prefix prefix-category">'. $prefix . '</span>' : '';

		$categories_list = get_the_category_list( ', ' );

		if ( $categories_list ) {

			return '<span class="meta-category"> ' . $prefix . wp_kses_post($categories_list) . '</span>';
		}
		
	}
endif;

if ( ! function_exists( 'azonbooster_meta_tag' ) ) :
	/**
	 * Displays the category of posts
	 */
	function azonbooster_meta_tag( $prefix = '' ) {

		$prefix = $prefix != '' ? '<span class="meta-prefix prefix-tag">'. $prefix . '</span>' : '';


		$tags_list = get_the_tag_list( '', __( ', ', 'azonbooster' ) );

		if ( $tags_list && ! is_single() ) {

			return '<span class="meta-tag"> ' . $prefix . wp_kses_post( $tags_list ) . '</span>';
		}
		

	}
endif;

if ( ! function_exists( 'azonbooster_meta_comments' ) ) :
	/**
	 * Displays the comment of posts
	 */
	function azonbooster_meta_comments( $prefix = '' ) {

		$prefix = $prefix != '' ? '<span class="meta-prefix prefix-comment">'. $prefix . '</span>' : '';


		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {


			$txt_comment = '<a href="'. esc_url ( get_comments_link() ) .'">'.get_comments_number_text( __('Leave a Comment', 'azonbooster'), __('One Comment', 'azonbooster'), __('% Comments', 'azonbooster')) . '</a>';

				return '<span class="comments-link">' . $prefix . $txt_comment . '</span>';				

		}

	}
endif;

if ( ! function_exists( 'azonbooster_meta_edit_link' ) ) :
	/**
	 * Displays the category of posts
	 */
	function azonbooster_meta_edit_link() {

		return '<span class="meta-category"> ' . get_the_category_list( ', ' ) . '</span>';

	}
endif;

if ( ! function_exists( 'azonbooster_homepage_content' ) ) {
	/**
	 * Display homepage content
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @return  void
	 */
	function azonbooster_homepage_content() {

		$content_page_show = apply_filters( 'azonbooster_homepage_content_show', true );

		if ( ! $content_page_show ) 
			return;

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content', 'homepage' );

		} // end of the loop.
	}
}

if ( ! function_exists ( 'azauthority_homepage_content_thumbnail' ) ) {

	/**
	 * @since 1.2.0
	 * @return void
	 */
	function azauthority_homepage_content_thumbnail() {
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'large' );
		}
	}
}

if ( ! function_exists ( 'azauthority_homepage_content_header') ) {
	/**
	 * @since 1.2.0
	 * @return void
	 */
	function azauthority_homepage_content_header() {
		?>
		<header class="entry-header">
			<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
			?>
		</header><!-- .entry-header -->
		<?php
		edit_post_link( __( 'Edit this section', 'azonbooster' ), '', '', '', 'button azauthority-hero__button-edit' );
	}
}

if ( ! function_exists ( 'azauthority_homepage_page_content' ) ) {

	/**
	 * @since 1.2.0
	 * @return void
	 */
	function azauthority_homepage_page_content() {
		?>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'azonbooster' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		<?php
	}
}

if ( ! function_exists( 'azonbooster_init_structured_data' ) ) {
	/**
	 * Generates structured data.
	 *
	 * Hooked into the following action hooks:
	 *
	 * - `azonbooster_loop_post`
	 * - `azonbooster_single_post`
	 * - `azonbooster_page`
	 *
	 * Applies `azonbooster_structured_data` filter hook for structured data customization :)
	 */
	function azonbooster_init_structured_data() {

		// Post's structured data.
		if ( is_home() || is_category() || is_date() || is_search() || is_single() ) {
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'normal' );
			$logo  = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );

			$json = array();
			
			$json['@type'] = 'BlogPosting';

			$json['mainEntityOfPage'] = array(
				'@type' => 'webpage',
				'@id'   => get_the_permalink(),
			);

			$json['publisher'] = array(
				'@type' => 'organization',
				'name'  => get_bloginfo( 'name' ),
			);

			if ( $logo ) {
				$json['publisher']['logo'] = array(
					'@type'  => 'ImageObject',
					'url'    => $logo[0],
					'width'  => $logo[1],
					'height' => $logo[2],
				);
			}

			$json['author'] = array(
				'@type' => 'person',
				'name'  => get_the_author(),
			);

			if ( $image ) {
				$json['image'] = array(
					'@type'  => 'ImageObject',
					'url'    => $image[0],
					'width'  => $image[1],
					'height' => $image[2],
				);
			}
			
			$json['datePublished'] = get_post_time( 'c' );
			$json['dateModified']  = get_the_modified_date( 'c' );
			$json['name']          = get_the_title();
			$json['headline']      = $json['name'];
			$json['description']   = get_the_excerpt();

		// Page's structured data.
		} elseif ( is_page() ) {
			$json['@type']       = 'WebPage';
			$json['url']         = get_the_permalink();
			$json['name']        = get_the_title();
			$json['description'] = get_the_excerpt();
		}

		if ( isset( $json ) ) {
			AzonBooster::set_structured_data( apply_filters( 'azonbooster_structured_data', $json ) );
		}
	}
}
