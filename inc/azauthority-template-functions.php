<?php

if ( ! function_exists( 'azauthority_skip_links' ) ) {
	/**
	 * Skip link
	 */
	function azauthority_skip_links() {
		?>
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'azauthority' ); ?></a>
		<?php
	}
} 

if ( ! function_exists( 'azauthority_menu_toggle' ) ) {
	/**
	 * Toggle Menu
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function azauthority_menu_toggle() {
		if ( has_nav_menu( 'primary' ) ) {
			?>
				<div class="header-left">
					<div class="menu-toggle"><i class="fa fa-bars"></i></div>
				</div>
			<?php
		}
	}
	
}

if ( ! function_exists( 'azauthority_site_branding' ) ) {
	/**
	 * Site branding wrapper and display
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function azauthority_site_branding() {
		?>
		<div class="site-branding">
			<div class="site-branding-text">
			<?php azauthority_site_title_or_logo(); ?>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'azauthority_site_title_or_logo' ) ) {
	/**
	 * Display the site title or logo
	 *
	 * @since 2.1.0
	 * @param bool $echo Echo the string or return it.
	 * @return string
	 */
	function azauthority_site_title_or_logo( $echo = true ) {

		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			$logo = get_custom_logo();
			$html = is_front_page() ? '<h1 class="logo">' . $logo . '</h1>' : '<h2 class="logo">' . $logo . '</h2>';
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
			$tag = is_front_page() ? 'h1' : 'h2';

			$html = '<' . esc_attr( $tag ) . ' class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html( get_bloginfo( 'name' ) ) . '</a></' . esc_attr( $tag ) .'>';

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
if ( ! function_exists( 'azauthority_toggle_search_icon' ) ) {

	/**
	 * Search icon
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function azauthority_toggle_search_icon() {
		?>
			<div class="header-right">
				<div class="search-toggle-open"><i class="fa fa-search"></i></div>
			</div>
		<?php
	}
}

if ( ! function_exists( 'azauthority_primary_nav' ) ) {

	/**
	 * Primary Navigation
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function azauthority_primary_nav() {

		if ( has_nav_menu( 'primary' ) ) :	
		
			?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<div class="header-left">
					<div class="menu-toggle-close"><i class="fa fa-close"></i></div>
				</div>
				<?php
					wp_nav_menu( array( 
						'theme_location' 	=> 'primary',
						'menu_id' 			=> 'primary-nav',
						'menu_class' 		=> 'primary-nav clearfix',
						'container'			=> '',
						'walker'			=> new Az_Authority_Menu_Walker()
					) );
				?>
			</nav><!-- #site-navigation -->
			
			<?php
		endif;
	}
}

if ( ! function_exists( 'azauthority_get_sidebar' ) ) {
	/**
	 * Display sidebar
	 *
	 * @uses get_sidebar()
	 * @since 1.0.0
	 */
	function azauthority_get_sidebar() {

		$layout = azauthority_get_theme_option( 'azauthority_sidebar_layout', 'none' );

		if ( 'none' != $layout ) {  get_sidebar(); }

	}

}


if ( ! function_exists( 'azauthority_search_form' ) ) {
	/**
	 * Search form
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function azauthority_search_form() {
		?>
		<div class="site-search">
			<div class="col-full">
				<div class="search-inner">
					<?php echo get_search_form(); ?>
				</div>
			</div>
		</div>
		<div id="s-lightbox"></div>

		<?php
	}
}

if ( ! function_exists( 'azauthority_back_to_top' ) ) {
	/**
	 * Button back to top.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function azauthority_back_to_top() {
		echo '<span class="back-to-top"><i class="fa fa-chevron-up"></i></span>';		
	}

}

if ( ! function_exists( 'azauthority_footer_widgets' ) ) {
	/**
	 * Display the footer widget regions.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function azauthority_footer_widgets() {
		$rows    = intval( apply_filters( 'azauthority_footer_widget_rows', 1 ) );
		$regions = intval( apply_filters( 'azauthority_footer_widget_columns', 4 ) );

		for ( $row = 1; $row <= $rows; $row++ ) :

			// Defines the number of active columns in this footer row.
			for ( $region = $regions; 0 < $region; $region-- ) {
				if ( is_active_sidebar( 'footer-' . strval( $region + $regions * ( $row - 1 ) ) ) ) {
					$columns = $region;
					break;
				}
			}

			if ( isset( $columns ) ) : ?>
				<div class=<?php echo '"footer-widgets row-' . esc_attr( $row ) . ' col-' . esc_attr( $columns ) . ' fix"' ; ?>><?php

					for ( $column = 1; $column <= $columns; $column++ ) :
						$footer_n = $column + $regions * ( $row - 1 );

						if ( is_active_sidebar( 'footer-' . esc_attr( $footer_n ) ) ) : ?>

							<div class="block footer-widget-<?php echo esc_attr( $column ); ?>">
								<?php dynamic_sidebar( 'footer-' . esc_attr( $footer_n ) ); ?>
							</div><?php

						endif;
					endfor; ?>

				</div><!-- .footer-widgets.row-<?php echo esc_attr( $row ); ?> --><?php

				unset( $columns );

			endif;
		endfor;
	}
}

if ( ! function_exists( 'azauthority_credit' ) ) {
	/**
	 * Display the theme credit
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function azauthority_credit() {
		?>
		<div class="site-info clearfix">

			<div class="copyright">
				<?php echo esc_html( apply_filters( 'azauthority_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . date( 'Y' ) ) ); ?>

				<?php if ( apply_filters( 'azauthority_credit_link', true ) ) { ?>

					<?php 
					/* translators: %s: Theme URL */
					printf(__( '&bull; <a href="%s" rel="author" title="AZ Authority - The best free WordPress authority theme for WordPress"> AZ Authority</a> powered by <a href="http://wordpress.org/">WordPress</a>', 'azauthority' ), esc_url('https://theaztheme.com/themes/azauthority/' ) ); ?>

				
				<?php } ?>

			</div>

			<?php
			if ( has_nav_menu( 'footer' ) ) :
					wp_nav_menu( array( 
						'theme_location' => 'footer',
						'menu_id' 		 => '',
						'menu_class' 	 => '',
						'container'      => 'div',
						'container_class' => 'menu-footer'
					 ) );
			endif;
			?>

		</div><!-- .site-info -->
		<?php
	}
}


if ( ! function_exists( 'azauthority_post_thumbnail' ) ) {

	function azauthority_post_thumbnail( ) {

		$size = apply_filters( 'azauthority_post_thumbnail_size', 'large' );
		$show = apply_filters( 'azauthority_post_thumbnail_show', true );

		if ( $show ) {
			?>
				<div class="post-thumbnail">
					<a href="<?php the_permalink() ?>" rel="bookmark">
						<?php azauthority_the_post_thumbnail( $size, '', true ) ?>
					 </a>
				</div>
			<?php
		}
	}

}

if ( ! function_exists( 'azauthority_post_header' ) ) {

	function azauthority_post_header() {

		$posted_on = apply_filters( 'azauthority_posted_on_show', true );
		?>
			<header class="entry-header">
			
			<?php the_title( '<h2 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

			<?php if ( 'post' === get_post_type() && $posted_on ) : ?>				
				<?php azauthority_posted_on(); ?>				
			<?php endif; ?>

		</header><!-- .entry-header -->
		<?php
	}
}

if ( ! function_exists( 'azauthority_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function azauthority_posted_on() {	

	$meta_options = azauthority_get_theme_option( 'azauthority_meta_info', array('date', 'author', 'category', 'tag') );

	if(empty($meta_options))
		return;

	if(is_array($meta_options))
		$meta_options = array_flip($meta_options);
	

	echo '<div class="entry-meta">';

	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%3$s">%4$s</time>';
	}

	$categories_list = get_the_category_list( esc_html__( ', ', 'azauthority' ) );

	$tags_list = get_the_tag_list( '', esc_html__( ', ', 'azauthority' ) );

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

	$byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';
	

	if ( isset ( $meta_options['author'] ) ) {
		/* translators: %1$s: Author Link */
		printf( '<span class="byline"><i class="fa fa-user"></i> ' . esc_html__( ' %1$s ', 'azauthority' ) . ' </span>', $byline );
	}

	if ( isset ( $meta_options['date'] ) ) {
		/* translators: %1$s: Archive date link */
		printf( '<span class="posted-on"><i class="fa fa-clock-o"></i> ' . esc_html__( ' %1$s ', 'azauthority' ) . ' </span>', $posted_on );
	}	

	if ( isset ( $meta_options['category'] ) && $categories_list ) {

		/* translators: %1$s: Category links*/

		printf( '<span class="cat-links"><i class="fa fa-archive" aria-hidden="true"></i>' . esc_html__( ' %1$s ', 'azauthority' ) . ' </span>', $categories_list ); // WPCS: XSS OK.
	}

	if ( isset ($meta_options['tag'] ) && $tags_list  ) {

		/* translators: %1$s: Tag links*/
		printf( '<span class="tags-links"><i class="fa fa-tags" aria-hidden="true"></i>' . esc_html__( ' %1$s ', 'azauthority' ) . ' </span>', $tags_list ); // WPCS: XSS OK.
	}

	echo '</div><!-- .entry-meta -->';

}
endif;



if ( ! function_exists( 'azauthority_date_posted_on' ) ) {

	function azauthority_date_posted_on() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		/* translators: %1$s: Date link*/

		printf( '<div class="meta-date"><span class="post-date"><i class="fa fa-clock-o"></i>' . esc_html__( ' %1$s ', 'azauthority' ) . ' </span></div>', $time_string ); // WPCS: XSS OK.

	}

}

if ( ! function_exists( 'azauthority_post_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function azauthority_post_content() {

		$excerpt = apply_filters( 'azauthority_post_content_excerpt', true );

		?>
		<div class="entry-content">
		<?php

		/**
		 * Functions hooked in to azauthority_post_content_before action.
		 *
		 * @hooked azauthority_post_thumbnail - 10
		 */
		do_action( 'azauthority_post_content_before' );

		if ( $excerpt ) {

			the_excerpt();

			azauthority_read_more();

		} else {

			the_content(
				sprintf(
					/* translators: %1$s: Post Title */
					__( 'Continue reading %s', 'azauthority' ),
					'<span class="screen-reader-text">' . get_the_title() . '</span>'
				)
			);
		}

		do_action( 'azauthority_post_content_after' );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'azauthority' ),
			'after'  => '</div>',
		) );
		?>
		</div><!-- .entry-content -->
		<?php
	}
}

if ( ! function_exists( 'azauthority_read_more' ) ) :
/**
 * Display Read More Link
 */
function azauthority_read_more() {

	/* translators: %1$s: Post link*/
	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading <i class="fa fa-chevron-right"></i><span class="screen-reader-text"> "%s"</span>', 'azauthority' ), get_the_title( get_the_ID() ) )
	);
	$button = print_r( $link );
	return ' &hellip; ' . $button;

}
endif;

if ( ! function_exists( 'azauthority_single_post_header' ) ) {

	function azauthority_single_post_header() {

		$layout = azauthority_get_theme_option( 'azauthority_sidebar_layout', 'none' );

		if ( 'none' === $layout ) :

		?>
			<header class="entry-header">

				<div class="col-full">

					<div class="entry-header-inner">

						<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>

						<?php
						if ( 'post' === get_post_type() ) : ?>					
							<?php azauthority_posted_on(); ?>					
						<?php
						endif; ?>
					</div>

				</div> <!-- .col-full -->
			
			</header><!-- .entry-header -->
		<?php

		endif;

	}
}

if ( ! function_exists( 'azauthority_inner_wrapper' ) ) {
	/**
	 * The inner wrapper
	 */
	function azauthority_inner_wrapper() {
		echo '<div class="col-full">';
	}
}

if ( ! function_exists( 'azauthority_inner_wrapper_close' ) ) {
	/**
	 * The inner wrapper
	 */
	function azauthority_inner_wrapper_close() {
		echo '</div><!-- .col-full -->';
	}
}


if ( ! function_exists( 'azauthority_post_single_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function azauthority_post_single_content() {

		?>

		<div class="entry-content">
		<?php

		/**
		 * Functions hooked in to azauthority_post_content_before action.
		 *
		 * @hooked azauthority_post_thumbnail - 10
		 */
		do_action( 'azauthority_post_single_content_before' );

		the_content(
			sprintf(
				/* translators: %1$s: Post Title */
				__( 'Continue reading %s', 'azauthority' ),
				'<span class="screen-reader-text">' . get_the_title() . '</span>'
			)
		);		

		do_action( 'azauthority_post_single_content_after' );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'azauthority' ),
			'after'  => '</div>',
		) );
		?>
		</div><!-- .entry-content -->
		
		<?php
	}

}

if ( ! function_exists( 'azauthority_display_comments' ) ) {
	/**
	 * base display comments
	 *
	 * @since  1.0.0
	 */
	function azauthority_display_comments() {
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
		endif;
	}
}


if ( ! function_exists( 'azauthority_post_nav' ) ) {

		/**
		 * Display navigation to next/previous post when applicable.
		 */
		function azauthority_post_nav() {

			$args = array(
				'next_text' => '%title',
				'prev_text' => '%title',
				);

			$enable_postnav = apply_filters('azauthority_enable_postnav', true);

			if ( $enable_postnav ) {

				the_post_navigation( $args );

			}
		}

}

if ( ! function_exists( 'azauthority_inner_wrapper_close' ) ) {
	/**
	 * The inner wrapper
	 */
	function azauthority_inner_wrapper_close() {
		echo '</div>';
	}
}

if ( ! function_exists( 'azauthority_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function azauthority_paging_nav() {

	the_posts_pagination( array(
		'prev_text'      	=> __( '<i class="fa fa-angle-left"></i>', 'azauthority' ),
		'next_text'		  => __( '<i class="fa fa-angle-right"></i>', 'azauthority' ),
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'azauthority' ) . ' </span>',
	) );
	
}
endif;



if ( ! function_exists( 'azauthority_homepage_style' ) ) :

	/**
	 * Display Homepage Style.
	 *
	 * @since 1.0.1
	 */

	function azauthority_homepage_style() {

		$homepage_style = azauthority_get_theme_option( 'custom_homepage_control', array() );



		if ( ! empty( $homepage_style ) && is_array( $homepage_style ) ) :

				foreach ( $homepage_style as $homepage_style_id => $homepage_style_label ) :	

					$posts_per_page = 3;

					$cat_id = intval( $homepage_style_label['category_post'] );

					$title_section = $homepage_style_label['link_text'];

					if ( $homepage_style_label['box_post'] == 'five_box' ) {

						$posts_per_page = 5;
					}

					// Get latest posts from database
					$query_arguments = array(
						'posts_per_page' => $posts_per_page,
						'ignore_sticky_posts' => true,
					);

					if ( $cat_id > 0 ) {
						$query_arguments['cat'] = $cat_id;
					}

					$posts_query = new WP_Query( $query_arguments );

					?>

					<section class="row-box">
						
						<?php azauthority_homepage_section_title( $title_section, $cat_id ) ?>

					<?php

					if ( $homepage_style_label['box_post'] === 'five_box' ) :									

								$i = 0;

								// Check if there are posts
								if( $posts_query->have_posts() ) :

								// Display Posts
								while( $posts_query->have_posts() ) :

									$posts_query->the_post();

									if( isset($i) and $i <= 1 ) : ?>

										<?php if ($i == 0 ) { echo '<div class="largePost-inner clearfix">'; } ?>				

											<article id="post-<?php the_ID(); ?>" <?php post_class( 'large-post' ); ?>>

												<div class="content-wrapper">

													<div class="post-thumbnail">
														<a href="<?php the_permalink() ?>" rel="bookmark">

															<?php if ( has_post_thumbnail() ) : ?>

																<?php the_post_thumbnail( 'azauthority-feature-thumbnail' ); ?>

															<?php else : ?>

													 			<img class="wp-post-image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/azauthority-feature-thumbnail.jpg" />

													 		<?php endif; ?>

														</a>
													</div>

													<header>								
														<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
													</header>

													<?php azauthority_date_posted_on(); ?>

												</div><!-- .content-wrapper -->

											</article>

										<?php if ( $i == 1 ) : ?>

										</div>

										<div class="smallPost-inner clearfix">

										<?php endif; ?>

									<?php else :  ?>

										<article id="post-<?php the_ID(); ?>" <?php post_class( 'small-post' ); ?>>

											<div class="content-wrapper">

												<div class="post-thumbnail">
													<a href="<?php the_permalink() ?>" rel="bookmark">
														
														<?php if ( has_post_thumbnail() ) : ?>

															<?php the_post_thumbnail( 'azauthority-feature-thumbnail' ); ?>

														<?php else : ?>

															<img class="wp-post-image" src="<?php echo  esc_url( get_template_directory_uri() ); ?>/assets/images/azauthority-feature-thumbnail.jpg" />

														<?php endif; ?>

													</a>
												</div>

												<header>								
													<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
												</header>

												<?php azauthority_date_posted_on(); ?>

											</div><!-- .content-wrapper -->

										</article>

									<?php

									endif; $i++;

								endwhile; 

								?>

								</div><!-- end .smallPost-inner -->

							<?php endif; ?>

					<?php

					// End $homepage_style_label['box_post'] === 'five_box'
					
					else :
						// Start $homepage_style_label['box_post'] === 'three_box'

						$i = 0;

						// Check if there are posts
						if( $posts_query->have_posts() ) :

								// Display Posts
								while( $posts_query->have_posts() ) :

									$posts_query->the_post();

									if( isset($i) and $i <= 2 ) : ?>

									<?php if ($i == 0 ) { echo '<div class="smallPost-inner clearfix">'; } ?>

										<article id="post-<?php the_ID(); ?>" <?php post_class( 'small-post' ); ?>>

											<div class="content-wrapper">

												<div class="post-thumbnail">
													<a href="<?php the_permalink() ?>" rel="bookmark">
														
														<?php if ( has_post_thumbnail() ) : ?>

															<?php the_post_thumbnail( 'azauthority-feature-thumbnail' ); ?>

														<?php else : ?>

															<img class="wp-post-image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/azauthority-feature-thumbnail.jpg" />

														<?php endif; ?>

													</a>
												</div>

												<header>								
													<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
												</header>

												<?php azauthority_date_posted_on(); ?>

											</div><!-- content-wrapper -->

										</article>

									<?php

										if ( $i == 2 ) {
											echo '</div>';
										}

									endif; $i++;


								endwhile;
						endif;									


					endif;

					?>

				</section><!-- end .row-box -->

					<?php	


				endforeach;		


		endif;

	}

endif;

if ( ! function_exists( 'azauthority_homepage_section_title' ) ) : 

	function azauthority_homepage_section_title( $title_section, $cat_id ) {

		$category_link = get_category_link( $cat_id );

		?>
		<div class="section-title-wrapper">
			<h3 class="section-title">
				<?php if ( $category_link ) : ?>
					<a href="<?php echo esc_url( $category_link ); ?>"><?php echo esc_html( $title_section ); ?></a>
				<?php else : ?>
						<?php echo esc_html( $title_section ); ?>
				<?php endif; ?>
			</h3>
		</div>
		<?php
	}

endif;

if ( ! function_exists( 'azauthority_feature_homepage' ) ) :

	/**
	 * Display Feature Homepage.
	 *
	 * @since 1.0.1
	 */

	function azauthority_feature_homepage() {


		$enable_featured = azauthority_get_theme_option( 'azauthority_enable_featured', true);

		// Back when disable
		if ( $enable_featured != true )
			return;

		$featured_cat = azauthority_get_theme_option( 'azauthority_select_list', 0 );

		// Get latest posts from database
		$args = array(
			'posts_per_page' => 3,
			'ignore_sticky_posts' => true
		);

		if ( $featured_cat > 0 ) {
			$args['cat'] = $featured_cat;
		}

		$posts_query = new WP_Query( $args );	

		// Check if there are posts
		if( $posts_query->have_posts() ) :

			?>

			<section class="feature-box">

					<?php

					// Display Posts
					while( $posts_query->have_posts() ) :

						$posts_query->the_post();

						?>		

							<div class="featurePost">

								<div class="content-wrapper">

									<div class="post-thumbnail">
										<a href="<?php the_permalink() ?>" rel="bookmark">
											
											<?php if ( has_post_thumbnail() ) : ?>

												<?php the_post_thumbnail( 'azauthority-feature-thumbnail' ); ?>

											<?php else : ?>

												<img class="wp-post-image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/azauthority-feature-thumbnail.jpg" />

											<?php endif; ?>

										</a>
									</div>

									<header>								
										<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
									</header>									

								</div> <!-- .content-wrapper -->

							</div>

						<?php

					endwhile;
					
					wp_reset_query();

					?>	


			</section>

			<?php

		endif;

		
	}

endif;




if ( ! function_exists( 'azauthority_page_header' ) ) :

	/**
	 * Display Page Header.
	 */

	function azauthority_page_header() {
		?>
		<header class="entry-header">
			<?php
				the_title( '<h1 class="entry-title">', '</h1>' );
			?>
		</header><!-- .entry-header -->
		<?php
	}

endif;

if ( ! function_exists( 'azauthority_page_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function azauthority_page_content() {
		?>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'azauthority' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		<?php
	}
}

/**
*------------------------------------------------------------------------------
* Display Ads After Featured : 970x90
*------------------------------------------------------------------------------
*/

function azauthority_ads_after_featured() { 

	$banner = html_entity_decode ( azauthority_get_theme_option('ads_code_under_featured'), ENT_QUOTES);
	if ($banner) {
		?>
		<div class="ads-under-featured">
			<div class="ads-970x90">
				<?php echo $banner; ?>
			</div>
		</div>
		<?php
	}
}

/**
*------------------------------------------------------------------------------
* Display Single Post Title
*------------------------------------------------------------------------------
*/

if ( ! function_exists( 'azauthority_single_post_title' ) ) {
	/**
	 * Display the post single title
	 *
	 * @since 1.0.0
	 */
	function azauthority_single_post_title() {

		$layout = azauthority_get_theme_option( 'azauthority_sidebar_layout', 'none' );

		if ( 'none' != $layout && is_single() ) :
		
			?>

			<div class="single-header-wrap single-content">

				<header class="entry-header">

					<div class="col-full">

						<div class="entry-header-inner">

							<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>

							<?php
							if ( 'post' === get_post_type() ) : ?>					
								<?php azauthority_posted_on(); ?>					
							<?php
							endif; ?>
						</div>

					</div> <!-- .col-full -->
				
				</header><!-- .entry-header -->

			</div>

			<?php

		endif;

	}
}

/**
*------------------------------------------------------------------------------
* Display Col Full Wrapper
*------------------------------------------------------------------------------
*/

if ( ! function_exists( 'azauthority_col_full_wrapper' ) ) {
	/**
	 * Display the post col fll wrapper
	 *
	 * @since 1.0.0
	 */
	function azauthority_col_full_wrapper() {

		$layout = azauthority_get_theme_option( 'azauthority_sidebar_layout', 'none' );

		if ( 'none' != $layout ) :

			?>

			<div class="col-full">

			<?php

		endif;

	}
}

/**
*------------------------------------------------------------------------------
* Display Col Full Close
*------------------------------------------------------------------------------
*/

if ( ! function_exists( 'azauthority_col_full_close' ) ) {
	/**
	 * Display the post col fll close
	 *
	 * @since 1.0.0
	 */
	function azauthority_col_full_close() {

		$layout = azauthority_get_theme_option( 'azauthority_sidebar_layout', 'none' );

		if ( 'none' != $layout ) :

			?>

			</div> <!-- .col-full -->

			<?php

		endif;

	}
}

