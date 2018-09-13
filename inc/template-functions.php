<?php
/**
 * adbooster template functions.
 *
 * @package adbooster
 */

if ( ! function_exists( 'adbooster_skip_links' ) ) {
	/**
	 * Skip links
	 *
	 * @since  1.4.1
	 * @return void
	 */
	function adbooster_skip_links() {
		?>
		<a class="skip-link screen-reader-text" href="#site-navigation"><?php esc_attr_e( 'Skip to navigation', 'adbooster' ); ?></a>
		<a class="skip-link screen-reader-text" href="#content"><?php esc_attr_e( 'Skip to content', 'adbooster' ); ?></a>
		<?php
	}
}

if ( ! function_exists( 'adbooster_header_wrapper' ) ) {
	function adbooster_header_wrapper() {
		?>
		<div class="header-left">
		<?php
	}
}
if ( ! function_exists( 'adbooster_header_wrapper_close' ) ) {
	function adbooster_header_wrapper_close() {
		?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'adbooster_handburger_btn' ) ) {

	function adbooster_handburger_btn() {
		?>
		
			<div class="menu-toggle">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<div class="menu-close-btn">
					<i class="btn-ico-close">&times;</i>
				</div>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
			<?php if ( ( ( is_home() && is_front_page() ) ) && has_custom_header() ) : ?>
				<a href="#content" class="menu-scroll-down"><span class="screen-reader-text"><?php esc_html_e( 'Scroll down to content', 'adbooster' ); ?></span></a>
			<?php endif; ?>
		
		<?php
	}
}

if ( ! function_exists( 'adbooster_loop_before_widget' ) ) {

	function adbooster_loop_before_widget() {
		?>
		<?php if ( is_active_sidebar( 'before-loop' ) ) : ?>
			<div class="loop-banner before-loop-banner">
				<?php dynamic_sidebar( 'before-loop' ); ?>
			</div>
		<?php endif; ?>
		<?php
	}
}

if ( ! function_exists( 'adbooster_loop_after_widget' ) ) {

	function adbooster_loop_after_widget() {
		?>
		<?php if ( is_active_sidebar( 'after-loop' ) ) : ?>
			<div class="loop-banner after-loop-banner">
				<?php dynamic_sidebar( 'after-loop' ); ?>
			</div>
		<?php endif; ?>
		<?php
	}
}

if ( ! function_exists( 'adbooster_single_post_top_widget' ) ) {

	function adbooster_single_post_top_widget() {
		?>
		<?php if ( is_active_sidebar( 'before-single-post' ) ) : ?>
			<div class="single-post-banner before-single-post-banner">
				<?php dynamic_sidebar( 'before-single-post' ); ?>
			</div>
		<?php endif; ?>
		<?php
	}
}

if ( ! function_exists( 'adbooster_single_post_bottom_widget' ) ) {

	function adbooster_single_post_bottom_widget() {
		?>
		<?php if ( is_active_sidebar( 'after-single-post' ) ) : ?>
			<div class="single-post-banner after-single-post-banner">
				<?php dynamic_sidebar( 'after-single-post' ); ?>
			</div>
		<?php endif; ?>
		<?php
	}
}

if ( ! function_exists( 'adbooster_header_banner' ) ) {
	function adbooster_header_banner() {
		
		?>
			<div class="header-right">
				<?php if ( is_active_sidebar( 'header-1' ) ) : ?>
					<div class="banner-header">
						
						<?php dynamic_sidebar( 'header-1' ); ?>
	    	
	    			</div>
				<?php endif; ?>
				<!-- <div class="search-toggle"><i class="fa fa-search"></i></div> -->
			</div>
			
		<?php
	}
}

if ( ! function_exists( 'adbooster_header_search_form') ) {

	function adbooster_header_search_form() {
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

if ( ! function_exists( 'adbooster_site_branding' ) ) {
	/**
	 * Site branding wrapper and display
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function adbooster_site_branding() {
		?>
		<div class="site-branding">
			<?php adbooster_site_title_or_logo(); ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'adbooster_site_title_or_logo' ) ) {
	/**
	 * Display the site title or logo
	 *
	 * @since 2.1.0
	 * @param bool $echo Echo the string or return it.
	 * @return string
	 */
	function adbooster_site_title_or_logo( $echo = true ) {
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

if ( ! function_exists( 'adbooster_get_sidebar' ) ) {
	/**
	 * Display adbooster sidebar
	 *
	 * @uses get_sidebar()
	 * @since 1.0.0
	 */
	function adbooster_get_sidebar() {
		get_sidebar();
	}
}

if ( ! function_exists( 'adbooster_page_header' ) ) {
	/**
	 * Display the page header
	 *
	 * @since 1.0.0
	 */
	function adbooster_page_header() {
		?>
		<header class="entry-header">
			<?php
			adbooster_post_thumbnail( 'full' );
			the_title( '<h1 class="entry-title">', '</h1>' );
			?>
		</header><!-- .entry-header -->
		<?php
	}
}

if ( ! function_exists( 'adbooster_page_content' ) ) {
	/**
	 * Display the post content
	 *
	 * @since 1.0.0
	 */
	function adbooster_page_content() {
		?>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'adbooster' ),
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

if ( ! function_exists( 'adbooster_post_header' ) ) {

	function adbooster_post_header() {

		do_action( 'adbooster_before_title' );

		?>
		<header class="entry-header">
		<?php
		if ( is_single() ) {
			
			the_title( '<h1 class="entry-title">', '</h1>' );

			do_action( 'adbooster_post_meta' );

		} else {
			

			the_title( sprintf( '<h2 class="alpha entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

			do_action( 'adbooster_post_meta' );
		}
		?>
		</header><!-- .entry-header -->
		<?php

		do_action( 'adbooster_after_title' );

	}
}

if ( ! function_exists( 'adbooster_post_thumbnail' ) ) {
	/**
	 * Display post thumbnail
	 *
	 * @var $size thumbnail size. thumbnail|medium|large|full|$custom
	 * @uses has_post_thumbnail()
	 * @uses the_post_thumbnail	 
	 * @since 1.0.0
	 */

	function adbooster_post_thumbnail( ) {
		// @hook - Ad_Booster_Customizer_Output::thumbnail_size() - 10
		$thumbnail = apply_filters('adbooster_thumbnail_size', 'large');

		/**
		* @hook Ad_Booster_Customizer_Output::show_post_thumbnail() - 10
		* @hook Ad_Booster_Customizer_Output::show_single_post_thumbnail() - 999
		*/
		$show_thumbnail = apply_filters('adbooster_show_post_thumbnail', true);

		if ( has_post_thumbnail() && $show_thumbnail ) {

			?>
			<div class="post-thumnbnail">
			<?php

			$link = esc_url(apply_filters('adbooster_thumbnail_link', get_permalink( get_the_ID() )) );
			$enable_link = apply_filters('adbooster_thumbnail_enable_link', true);

			if ( $enable_link && (! is_single() || ! is_page() ) ) {

				?>
				<a href="<?php echo esc_url( $link ) ?>"> 
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

if ( ! function_exists( 'adbooster_post_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function adbooster_post_content() {
		?>
		<div class="entry-content dddd">
		<?php

		/**
		 * Functions hooked in to adbooster_post_content_before action.
		 *
		 * @hooked adbooster_post_thumbnail - 10
		 */
		do_action( 'adbooster_post_content_before' );

		$show_excerpt = apply_filters('adbooster_show_excerpt', true);

		if ( $show_excerpt && ! is_single() ) {

			the_excerpt();

			$show_readmore = apply_filters('adbooster_show_readmore', true);

			if ( $show_readmore ) {

				adbooster_readmore_link();
			}

		} else {

			the_content(
				
				sprintf(
					// translators: %s: the post title.
					__( 'Continue reading %s', 'adbooster' ),
					'<span class="screen-reader-text">' . get_the_title() . '</span>'
				)
			);

		}

		do_action( 'adbooster_post_content_after' );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'adbooster' ),
			'after'  => '</div>',
		) );
		?>
		</div><!-- .entry-content -->
		<?php
	}
}

if ( ! function_exists( 'adbooster_readmore_link' ) ) {

	function adbooster_readmore_link() {

		$link = apply_filters( 'adbooster_readmore_link', get_permalink() );
		$label = apply_filters( 'adbooster_readmore_link_label', esc_html__( 'Continue reading &rarr;', 'adbooster' ) );
		$position =  apply_filters( 'adbooster_readmore_link_pos', 'readmore-right' );

		// translators: %1$s: Element position, %2$s: Post link, %3$s: read more label.
		printf( '<div class="%1$s"><a class="readmore" href="%2$s">%3$s</a></div>', esc_attr( $position ), esc_url( $link ) , esc_html( $label) );
	}
}

if ( ! function_exists( 'adbooster_post_nav' ) ) {
	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function adbooster_post_nav() {

		$show_post_nav = apply_filters('adbooster_show_post_nav', true);

		if ( $show_post_nav ) {
			
			$args = array(
				'next_text' => '%title',
				'prev_text' => '%title',
				);
			the_post_navigation( $args );

		} 
	}
}

if ( ! function_exists( 'adbooster_paging_nav' ) ) {
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function adbooster_paging_nav() {
		
		global $wp_query;

		$args = array(
			'type' 	    => 'list',
			'next_text' => _x( 'Next', 'Next post', 'adbooster' ),
			'prev_text' => _x( 'Previous', 'Previous post', 'adbooster' ),
			);

		the_posts_pagination( $args );
	}
}

if ( ! function_exists( 'adbooster_footer_widgets' ) ) {
	/**
	 * Display the footer widget regions.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function adbooster_footer_widgets() {
		$rows    = intval( apply_filters( 'adbooster_footer_widget_rows', 2 ) );
		$regions = intval( apply_filters( 'adbooster_footer_widget_columns', 4 ) );

		for ( $row = 1; $row <= $rows; $row++ ) :

			// Defines the number of active columns in this footer row.
			for ( $region = $regions; 0 < $region; $region-- ) {
				if ( is_active_sidebar( 'footer-' . strval( $region + $regions * ( $row - 1 ) ) ) ) {
					$columns = $region;
					break;
				}
			}

			if ( isset( $columns ) ) : ?>
				<div class=<?php echo esc_attr( '"footer-widgets row-' . strval( $row ) . ' col-' . strval( $columns ) . ' fix"' ); ?>><?php

					for ( $column = 1; $column <= $columns; $column++ ) :
						$footer_n = $column + $regions * ( $row - 1 );

						if ( is_active_sidebar( 'footer-' . esc_html( $footer_n ) ) ) : ?>

							<div class="block footer-widget-<?php echo esc_attr( $column ); ?>">
								<?php dynamic_sidebar( 'footer-' . esc_html( $footer_n ) ); ?>
							</div><?php

						endif;
					endfor; ?>

				</div><?php

				unset( $columns );
			endif;
		endfor;
	}
}

if ( ! function_exists( 'adbooster_site_info_wrapper' ) ) {
	/**
	 * Open site info wrapper
	 *
	 * @since 1.2.1
	 * @return void
	 */
	function adbooster_site_info_wrapper() {
		?>
		<div class="site-info">
		<?php
	}
}

if ( ! function_exists( 'adbooster_site_info_wrapper_close' ) ) {
	/**
	 * Close site info wrapper
	 *
	 * @since 1.2.1
	 * @return void
	 */
	function adbooster_site_info_wrapper_close() {
		?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'adbooster_header_menu' ) ) {
	/**
	 * Header menu
	 *
	 * @since 1.2.1
	 * @return void
	 */
	function adbooster_header_menu() {
		if ( has_nav_menu( 'secondary' ) ) {
			wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'header-menu', 'menu_class' => 'header-menu', 'container_class' => 'header-menu-container' ) );
		}
	}
}

if ( ! function_exists( 'adbooster_footer_menu' ) ) {
	/**
	 * Footer menu
	 *
	 * @since 1.2.1
	 * @return void
	 */
	function adbooster_footer_menu() {
		wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu', 'menu_class' => 'footer-menu', 'container_class' => 'footer-menu-container' ) );
	}
}

if ( ! function_exists( 'adbooster_credit' ) ) {
	/**
	 * Display the theme credit
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function adbooster_credit() {

		$credit_url = apply_filters('adbooster_credit_link', adbooster_credit_link() );
			
		?>

		<div class="theme-credit">

			<?php echo esc_html( apply_filters( 'adbooster_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . date( 'Y' ) ) ); ?>

			<?php if ( apply_filters( 'adbooster_enable_credit_link', true ) ) : ?>

			<?php 
			// translators: %1$s: String with developer website.
			printf( esc_html__( '&bull; AdBooster Designed by  %1$s.', 'adbooster' ),  $credit_url ); ?>

			<?php endif; ?>

		</div><!-- .site-info -->
		<?php
	}
}

if ( ! function_exists( 'adbooster_display_comments' ) ) {
	/**
	 * adbooster display comments
	 *
	 * @since  1.0.0
	 */
	function adbooster_display_comments() {
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
		endif;
	}
}

if ( ! function_exists( 'adbooster_post_meta' ) ) {


	/**
	 * Renders post's meta
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function adbooster_post_meta() {

		/**
	 * Prefix all post meta
	 * 
	 * @var array
	 */
	$prefix = apply_filters('adbooster_prefix_post_metadata', array(

		'date'		=> '',
		'modified'	=> __('Last updated', 'adbooster'),
		'author'	=> __('By ', 'adbooster'),
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
	$metadata = apply_filters('adbooster_enable_post_metadata', array(
		'date',
		'author',
		'category',
		'tag',
		'comment'
	));


	foreach ( $metadata as $md) {

		switch ( $md ) {
			case 'date':

				$postmeta .= adbooster_meta_date( $prefix );

				break;
			case 'author':

				$postmeta .= adbooster_meta_author( $prefix[$md] );

				break;
			case 'category':

				$postmeta .= adbooster_meta_category( $prefix[$md] );

				break;
			case 'tag':

				$postmeta .=  adbooster_meta_tag( $prefix[$md] );

				break;

			case 'comment':

				$postmeta .=  adbooster_meta_comments( $prefix[$md] );
				
				break;
		}
	}
	

	if ( $postmeta ) { ?>

		<div class="entry-meta">

			<?php

				echo $postmeta;

				edit_post_link( __( 'Edit', 'adbooster' ), '<span class="edit-link">', '</span>' );

			?>
				
		</div>

	<?php

	}
		
	}
}
if ( ! function_exists( 'adbooster_meta_date' ) ) :
	/**
	 * Displays the post date
	 *
	 * @since 1.0.0
	 * @return 1.0.0
	 */
	function adbooster_meta_date( $prefix = array() ) {


		$modified = apply_filters('adbooster_enable_modified', false);

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



if ( ! function_exists( 'adbooster_meta_author' ) ) :
	/**
	 * Displays the post author
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function adbooster_meta_author( $prefix = '' ) {

		$prefix = $prefix != '' ? '<span class="meta-prefix prefix-author">'. $prefix . '</span>' : '';

		// translators: %1$s: author link, %2$s: link title, %3$s: Author name, %s: author name.
		$author_string = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( esc_html__( 'View all posts by %s', 'adbooster' ), get_the_author() ) ),
			esc_html( get_the_author() )
		);

		return '<span class="meta-author byline">' . $prefix . wp_kses_post($author_string) . '</span>';
	}
endif;

if ( ! function_exists( 'adbooster_meta_category' ) ) :
	/**
	 * Displays the category of posts
	 * @since 1.0.0
	 * @return void
	 */
	function adbooster_meta_category( $prefix = '' ) {

		$prefix = $prefix != '' ? '<span class="meta-prefix prefix-category">'. $prefix . '</span>' : '';

		$categories_list = get_the_category_list( ', ' );

		if ( $categories_list ) {

			return '<span class="meta-category"> ' . $prefix . wp_kses_post($categories_list) . '</span>';
		}
		
	}
endif;

if ( ! function_exists( 'adbooster_meta_tag' ) ) :
	/**
	 * Displays the category of posts
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function adbooster_meta_tag( $prefix = '' ) {

		$prefix = $prefix != '' ? '<span class="meta-prefix prefix-tag">'. $prefix . '</span>' : '';


		$tags_list = get_the_tag_list( '', __( ', ', 'adbooster' ) );

		if ( $tags_list && ! is_single() ) {

			return '<span class="meta-tag"> ' . $prefix . wp_kses_post( $tags_list ) . '</span>';
		}
		

	}
endif;

if ( ! function_exists( 'adbooster_meta_comments' ) ) :
	/**
	 * Displays the comment of posts
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function adbooster_meta_comments( $prefix = '' ) {

		$prefix = $prefix != '' ? '<span class="meta-prefix prefix-comment">'. $prefix . '</span>' : '';


		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {


			$txt_comment = '<a href="'. esc_url ( get_comments_link() ) .'">'.get_comments_number_text( __('Leave a Comment', 'adbooster'), __('One Comment', 'adbooster'), __('% Comments', 'adbooster')) . '</a>';

				return '<span class="comments-link">' . $prefix . $txt_comment . '</span>';				

		}

	}
endif;

if ( ! function_exists( 'adbooster_meta_edit_link' ) ) :
	/**
	 * Displays the category of posts
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function adbooster_meta_edit_link() {

		return '<span class="meta-category"> ' . get_the_category_list( ', ' ) . '</span>';

	}
endif;

if ( ! function_exists( 'adbooster_homepage_content' ) ) {
	/**
	 * Display homepage content
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @return  void
	 */
	function adbooster_homepage_content() {

		$content_page_show = apply_filters( 'adbooster_homepage_content_show', true );

		if ( ! $content_page_show ) 
			return;

		while ( have_posts() ) {
			the_post();
			?>
			<div class="homepage-content">
			<?php
				azauthority_homepage_content_thumbnail();
				azauthority_homepage_content_header();
				azauthority_homepage_page_content();
			?>
			</div>
			<?php
			

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
		edit_post_link( __( 'Edit this section', 'adbooster' ), '', '', '', 'button azauthority-hero__button-edit' );
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
					'before' => '<div class="page-links">' . __( 'Pages:', 'adbooster' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		<?php
	}
}