<?php



// The Main Menu
function bestblog_top_nav() {
	 wp_nav_menu(array(
        'container' => false,                           // Remove nav container
        'menu_class' => 'horizontal menu align-center mainmenu ',       // Adding custom nav class
        'items_wrap' => '<ul id="%1$s " class="%2$s" data-responsive-menu="accordion medium-dropdown" data-close-on-click-inside="false">%3$s</ul>',
        'theme_location' => 'primary',        			// Where it's located in the theme
        'depth' => 5,                                   // Limit the depth of the nav
                                // Fallback function (see below)
        'walker' => new Topbar_Menu_Walker()
    ));
}

// Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker
class Topbar_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = Array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"menu \">\n";
    }
}

// The Off Canvas Menu mobile
function bestblog_off_canvas_mobile() {
	 wp_nav_menu(array(
        'container' => false,                           // Remove nav container
        'menu_class' => 'vertical menu accordion-menu off-canvas-inner',       // Adding custom nav class
        'items_wrap' => '<ul id="%1$s" class="%2$s" data-accordion-menu data-close-on-click-inside="false">%3$s</ul>',
        'theme_location' => 'primary',        			// Where it's located in the theme
        'depth' => 5,                                   // Limit the depth of the nav
        'fallback_cb' => false,                         // Fallback function (see below)
        'walker' => new Off_Canvas_Menu_Walker()
    ));
}

// The Off Canvas Menu
function bestblog_off_canvas_nav() {
	 wp_nav_menu(array(
        'container' => false,                           // Remove nav container
        'menu_class' => 'vertical menu accordion-menu off-canvas-inner',       // Adding custom nav class
        'items_wrap' => '<ul id="%1$s" class="%2$s" data-accordion-menu data-close-on-click-inside="false">%3$s</ul>',
        'theme_location' => 'off-canvas',        			// Where it's located in the theme
        'depth' => 5,                                   // Limit the depth of the nav
        'fallback_cb' => false,                         // Fallback function (see below)
        'walker' => new Off_Canvas_Menu_Walker()
    ));
}

class Off_Canvas_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = Array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"vertical menu nested\">\n";
    }
}



/**
 * Adapted  from http://thewebtaylor.com/articles/wordpress-creating-breadcrumbs-without-a-plugin
 *
 * @param bool $showhome should the breadcrumb be shown when on homepage (only one deactivated entry for home).
 * @param bool $separatorclass should a separator class be added (in case :before is not an option).
 */

if ( ! function_exists( 'bestblog_breadcrumb' ) ) {
	function bestblog_breadcrumb( $showhome = true, $separatorclass = false ) {

		// Settings
		$separator  = '&gt;';
		$id         = 'breadcrumbs';
		$class      = 'breadcrumbs';
		$home_title = esc_attr__('Homepage','best-blog'); 

		// Get the query & post information
		global $post,$wp_query;
		$category = get_the_category();

		// Build the breadcrums
		echo '<ul id="' . $id . '" class="' . $class . '">';

		// Do not display on the homepage
		if ( ! is_front_page() ) {

			// Home page
			echo '<li class="item-home"><a class="bread-link bread-home" href="' .esc_url( get_home_url() ). '" title="' . $home_title . '">' . $home_title . '</a></li>';
			if ( $separatorclass ) {
				echo '<li class="separator separator-home"> ' . $separator . ' </li>';
			}

			if ( is_single() && ! is_attachment() ) {

				// Single post (Only display the first category)
				echo '<li class="item-cat item-cat-' . $category[0]->term_id . ' item-cat-' . $category[0]->category_nicename . '"><a class="bread-cat bread-cat-' . $category[0]->term_id . ' bread-cat-' . $category[0]->category_nicename . '" href="' .esc_url( get_category_link($category[0]->term_id) ). '" title="' . $category[0]->cat_name . '">' . $category[0]->cat_name . '</a></li>';
				if ( $separatorclass ) {
					echo '<li class="separator separator-' . $category[0]->term_id . '"> ' . $separator . ' </li>';
				}
				echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

			} elseif ( is_category() ) {

				// Category page
				// Get the current category
				$current_category = $wp_query->queried_object;
				echo '<li class="item-current item-cat-' . $current_category->term_id . ' item-cat-' . $current_category->category_nicename . '"><strong class="bread-current bread-cat-' . $current_category->term_id . ' bread-cat-' . $current_category->category_nicename . '">' . $current_category->cat_name . '</strong></li>';

			} elseif ( is_tax() ) {

				// Tax archive page
				$queried_object = get_queried_object();
				$name = $queried_object->name;
				$slug = $queried_object->slug;
				$tax = $queried_object->taxonomy;
				$term_id = $queried_object->term_id;
				$parent = $queried_object->parent;

				if( $parent ) {

					// Loop through all term ancestors
					while ( $parent ) {
						$parent_term = get_term($parent, $tax);
						// The output will be reversed, so separator goes first
						if ( $separatorclass ) {
							$parents[] = '<li class="separator separator-' . $parent . '"> ' . $separator . ' </li>';
						}
						$parents[] = '<li class="item-parent item-parent-' . $parent . '"><a class="bread-parent bread-parent-' . $parent . '" href="' .esc_url( get_term_link($parent) ). '" title="' . $parent_term->name . '">' . $parent_term->name . '</a></li>';

						$parent = $parent_term->parent;
					}

					echo implode( array_reverse( $parents ) );
				}

				echo '<li class="item-current item-tax-' . $term_id . ' item-tax-' . $slug . '">' . $name . '</li>';

		} elseif ( is_page() ) {

				// Standard page
				if ( $post->post_parent ) {

					// If child page, get parents
					$anc = get_post_ancestors( $post->ID );

					// Get parents in the right order
					$anc = array_reverse( $anc );

					// Parent page loop
					$parents = '';
					foreach ( $anc as $ancestor ) {
						$parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' .esc_url( get_permalink($ancestor) ). '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
						if ( $separatorclass ) {
							$parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
						}
					}

					// Display parent pages
					echo $parents;

					// Current page
					echo '<li class="current item-' . $post->ID . '">' . get_the_title() . '</li>';

				} else {

					// Just display current page if not parents
					echo '<li class="current item-' . $post->ID . '"> ' . get_the_title() . '</li>';

				}
			} elseif ( is_tag() ) {

				// Tag page
				// Get tag information
				$term_id = get_query_var('tag_id');
				$taxonomy = 'post_tag';
				$args = 'include=' . $term_id;
				$terms = get_terms($taxonomy, $args);

				// Display the tag name
				echo '<li class="current item-tag-' . $terms[0]->term_id . ' item-tag-' . $terms[0]->slug . '">' . $terms[0]->name . '</li>';

			} elseif ( is_day() ) {

				// Day archive
				// Year link
				echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' .esc_url( get_year_link(get_the_time('Y'))) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
				if ( $separatorclass ) {
					echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
				}

				// Month link
				echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
				if ( $separatorclass ) {
					echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
				}

				// Day display
				echo '<li class="current item-' . get_the_time('j') . '">' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</li>';

			} elseif ( is_month() ) {

				// Month Archive
				// Year link
				echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . esc_url(get_year_link(get_the_time('Y')) ). '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
				if ( $separatorclass ) {
					echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
				}

				// Month display
				echo '<li class="item-month item-month-' . get_the_time('m') . '">' . get_the_time('M') . ' Archives</li>';

			} elseif ( is_year() ) {

				// Display year archive
				echo '<li class="current item-current-' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</li>';

			} elseif ( is_author() ) {

				// Auhor archive
				// Get the author information
				global $author;
				$userdata = get_userdata($author);

				// Display author name
				echo '<li class="current item-current-' . $userdata->user_nicename . '">Author: ' . $userdata->display_name . '</li>';

			} elseif ( get_query_var('paged') ) {

				// Paginated archives
				echo '<li class="current item-current-' . get_query_var('paged') . '">' . __('Page', 'best-blog' ) . ' ' . get_query_var('paged') . '</li>';

			} elseif ( is_search() ) {

				// Search results page
				echo '<li class="current item-current-search">Search results for: ' . get_search_query() . '</li>';

			} elseif ( is_post_type_archive() ) {

				// Custom Post Type Archive Page
				echo '<li class="current">' . post_type_archive_title( '', false ) . '</li>';

			} elseif ( is_404() ) {

				// 404 page
				echo '<li>Error 404</li>';
			} // End if().
		} else {
			if ( $showhome ) {
				echo '<li class="item-home current">' . $home_title . '</li>';
			}
		} // End if().
		echo '</ul>';
	}
} // End if().
