<?php
/**
 * File aeonblog.
 *
 * @package   AeonBlog
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2019, AeonWP
 * @link      https://aeonwp.com/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! function_exists( 'aeonblog_about_user' ) ) {
    /**
     * Displays the About section.
     */
    function aeonblog_about_user() {
        global $aeonblog_theme_options;
        $enable_about = absint( $aeonblog_theme_options['aeonblog-enable-about'] );
        if ( $enable_about === 1 ) {
            $about_users = absint( $aeonblog_theme_options['aeonblog_about_user'] );
            $aeonblog_featured_user = get_user_by( 'ID', $about_users );
            if ( ! empty( $aeonblog_featured_user ) && is_front_page() && ! is_paged() ) {
                echo '<section class="widget about-me">';
                echo '<h2 class="widget-title">';
                esc_html_e( 'About ', 'aeonblog' );
                if ( count_user_posts( $aeonblog_featured_user->ID ) ) {
                    echo '<a href="' . esc_url( get_author_posts_url( $aeonblog_featured_user->ID ) ) . '">' .
                        esc_html( $aeonblog_featured_user->display_name ) . '</a>';
                } else {
                    echo esc_html( $aeonblog_featured_user->display_name );
                }
                echo '</h2>';
                echo '<div class="about-me-description textwidget">';
                echo '<a href="' . esc_url( get_author_posts_url( $aeonblog_featured_user->ID ) ) . '">' .
                    get_avatar( $aeonblog_featured_user->user_email, 300 ) . '</a>';
                
                echo '<p>' . esc_html( get_user_meta( $aeonblog_featured_user->ID, 'description', true ) )
                    . '</p></div>';
            }
            echo '</section>';
        }
    }
}

if ( ! function_exists( 'aeonblog_header_image' ) ) {
	/**
	 * Displays the custom header image below the navigation menu.
	 */
	function aeonblog_header_image() {
		$has_header_image = has_header_image();
		if ( ! empty( $has_header_image ) ) {
			?>
			<div id="headimg" class="header-image">
				<img src="<?php header_image(); ?>"
					srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id, 'full' ) ); ?>"
					width="<?php echo esc_attr( get_custom_header()->width ); ?>"
					height="<?php echo esc_attr( get_custom_header()->height ); ?>"
					alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'aeonblog_breadcrumb' ) ) {
	/**
	 * AeonBlog Breadcrumb
	 *
	 * @since AeonBlog 1.0.0
	 *
	 * @param null
	 * @return void
	 */
	function aeonblog_breadcrumb() {
		global $aeonblog_theme_options;
		$breadcrumb = absint( $aeonblog_theme_options['aeonblog-breadcrumb-option'] );
		if ( $breadcrumb == 1 ) {
			aeonblog_breadcrumb_trail();
		}
	}
}
add_action( 'aeonblog_breadcrumb_hook', 'aeonblog_breadcrumb', 10 );

/**
 * AeonBlog Excerpt Length
 *
 * @since AeonBlog 1.0.0
 *
 * @param null
 * @return void
 */
function aeonblog_excerpt_length( $length ) {
	if ( ! is_admin() ) {
		global $aeonblog_theme_options;
		$excerpt_length = absint( $aeonblog_theme_options['aeonblog-blog-excerpt'] );
		return $excerpt_length;
	}
}
add_filter( 'excerpt_length', 'aeonblog_excerpt_length', 999 );

if ( ! function_exists( 'aeonblog_excerpt_more' ) ) {
	/**
	 * AeonBlog Excerpt More
	 * @since AeonBlog 1.0.0
	 *
	 * @param null
	 * @return void
	 */
	function aeonblog_excerpt_more( $more ) {
		if ( ! is_admin() ) {
			return '';
		}
	}
}
add_filter( 'excerpt_more', 'aeonblog_excerpt_more' );

/**
 * AeonBlog Add Body Class
 *
 * @since AeonBlog 1.0.0
 *
 * @param null
 * @return void
 */
function aeonblog_custom_class( $classes ) {
	$classes[] = 'pt-sticky-sidebar';
	global $aeonblog_theme_options;
	$sidebar = esc_attr( $aeonblog_theme_options['aeonblog-sidebar-options'] );
	if ( $sidebar == 'no-sidebar' ) {
		$classes[] = 'no-sidebar';
	} elseif ( $sidebar == 'left-sidebar' ) {
		$classes[] = 'left-sidebar';
	} elseif ( $sidebar == 'middle-column' ) {
		$classes[] = 'middle-column';
	} else {
		$classes[] = 'right-sidebar';
	}
	return $classes;
}
add_filter( 'body_class', 'aeonblog_custom_class' );

if ( ! function_exists( 'aeonblog_go_to_top' ) ) {
	/**
	 * Go to Top
	 *
	 * @since AeonBlog 1.0.0
	 *
	 * @param null
	 * @return void
	 */
	function aeonblog_go_to_top() {
		global $aeonblog_theme_options;
		$aeonblog_to_top = absint( $aeonblog_theme_options['aeonblog-go-to-top'] );
		if ( $aeonblog_to_top == 1 ) {
			?>
			<a id="toTop" class="go-to-top" href="#" title="<?php esc_attr_e( 'Back to Top', 'aeonblog' ); ?>">
				<span><i class="fa fa-angle-double-up"></i></span>
			</a>
			<?php
		}
	}
	add_action( 'aeonblog_go_to_top_hook', 'aeonblog_go_to_top', 20 );
}

/**
 * Jetpack Top Posts widget Image size.
 *
 * @since AeonBlog 1.0.0
 *
 * @param null
 * @return void
 */
function aeonblog_custom_thumb_size( $get_image_options ) {
	$get_image_options['avatar_size'] = 600;
	return $get_image_options;
}
add_filter( 'jetpack_top_posts_widget_image_options', 'aeonblog_custom_thumb_size' );


if ( ! function_exists( 'aeonblog_posts_navigation' ) ) {
	/**
	 * Post Navigation Function
	 *
	 * @since AeonBlog 1.0.0
	 *
	 * @param null
	 * @return void
	 */
	function aeonblog_posts_navigation() {
		global $aeonblog_theme_options;
		$aeonblog_pagination_option = $aeonblog_theme_options['aeonblog-pagination-type'];
		if ( 'default' == $aeonblog_pagination_option ) {
			the_posts_navigation();
		} else {
			echo "<div class='aeonblog-pagination'>";
			the_posts_pagination(
				array(
				'prev_text' => __( '&laquo; Prev', 'aeonblog' ),
				'next_text' => __( 'Next &raquo;', 'aeonblog' ),
				)
			);
			echo '</div>';
		}
	}
}
add_action( 'aeonblog_action_navigation', 'aeonblog_posts_navigation', 10 );

if ( ! function_exists( 'aeonblog_related_post' ) ) {
	/**
	 * Display related posts from same category
	 *
	 * @since AeonBlog 1.0.0
	 *
	 * @param int $post_id
	 * @return void
	 */
	function aeonblog_related_post( $post_id ) {

		global $aeonblog_theme_options;
		if ( 0 == $aeonblog_theme_options['aeonblog-related-post'] ) {
			return;
		}
		$categories = get_the_category( $post_id );
		if ( $categories ) {
			$category_ids = array();
			$category     = get_category( $category_ids );
			$categories   = get_the_category( $post_id );
			foreach ( $categories as $category ) {
				$category_ids[] = $category->term_id;
			}
			$count = $category->category_count;
			if ( $count > 1 ) {
				?>
				<div class="related-pots-block">
				<h2 class="widget-title">
					<?php esc_html_e( 'Related Posts', 'aeonblog' ); ?>
				</h2>
				<ul class="related-post-entries clear">
					<?php
					$aeonblog_cat_post_args   = array(
						'category__in'        => $category_ids,
						'post__not_in'        => array( $post_id ),
						'post_type'           => 'post',
						'posts_per_page'      => 3,
						'post_status'         => 'publish',
						'ignore_sticky_posts' => true,
					);
					$aeonblog_featured_query = new WP_Query( $aeonblog_cat_post_args );

					while ( $aeonblog_featured_query->have_posts() ) : $aeonblog_featured_query->the_post();
						?>
						<li>
							<?php
							if ( has_post_thumbnail() ) {
								?>
								<figure class="widget-image">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'aeonblog-small-thumb' ); ?>
									</a>
								</figure>
								<?php
							}
							?>
							<div class="featured-desc">
								<a href="<?php the_permalink(); ?>">
									<h2 class="title">
										<?php the_title(); ?>
									</h2>
								</a>
							</div>
						</li>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
				</ul>
				</div> <!-- .related-post-block -->
				<?php
			}
		}
	}
}
add_action( 'aeonblog_related_posts', 'aeonblog_related_post', 10, 1 );

/**
 * Checkbox sanitization callback example.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function aeonblog_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

if ( ! function_exists( 'aeonblog_sanitize_number' ) ) {
	/**
	 * Adds sanitization callback function: Number.
	 *
	 *  @since AeonBlog 1.0.0
	 */
	function aeonblog_sanitize_number( $input ) {
		if ( isset( $input ) && is_numeric( $input ) ) {
			return $input;
		}
	}
}

if ( ! function_exists( 'aeonblog_sanitize_select' ) ) {
	/**
	 * Sanitize selection
	 *
	 * @since AeonBlog 1.0.0
	 */
	function aeonblog_sanitize_select( $input, $setting ) {
		// Ensure input is a slug.
		$input = sanitize_key( $input );
		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;
		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
}
