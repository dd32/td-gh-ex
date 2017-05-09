<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package  basepress
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function basepress_body_classes( $classes ) {

	// Get Theme Options from Database	
	$theme_options = basepress_theme_options();
		
	// Switch Sidebar Layout to left
	if ( 'left-sidebar' == $theme_options['layout'] ) {
		$classes[] = 'left-sidebar';
	}

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'basepress_body_classes' );

/**
 * Hide Elements with CSS.
 *
 * @return void
 */
function basepress_hide_elements() {

	// Get theme options from database.
	$theme_options = basepress_theme_options();

	$elements = array();

	// Hide Site Title?
	if ( false === $theme_options['site_title'] ) {
		$elements[] = '.site-title';
	}

	// Hide Site Description?
	if ( false === $theme_options['site_description'] ) {
		$elements[] = '.site-description';
	}

	// Return early if no elements are hidden.
	if ( empty( $elements ) ) {
		return;
	}

	// Create CSS.
	$classes = implode( ', ', $elements );
	$custom_css = $classes . ' {
	position: absolute;
	clip: rect(1px, 1px, 1px, 1px);
}';

	// Add Custom CSS.
	wp_add_inline_style( 'basepress-style', $custom_css );
}
add_filter( 'wp_enqueue_scripts', 'basepress_hide_elements', 11 );



/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function basepress_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'basepress_pingback_header' );


if ( ! function_exists( 'basepress_default_menu' ) ) :
	/**
	 * Display default page as navigation if no custom
	 */
	function basepress_default_menu() {

		echo '<ul id="menu-main-navigation" class="main-navigation-menu menu">' . wp_list_pages( 'title_li=&echo=0' ) . '</ul>';

	}
	
endif;


if (! function_exists('basepress_infinitepaginate') ):

	/*
	|------------------------------------------------------------------------------
	| Ajax Infinite Scroll
	|------------------------------------------------------------------------------
	| 
	| @return void
	|
	*/
	function basepress_infinitepaginate() {

		$theme_options = basepress_theme_options();

		check_ajax_referer( 'basepress-load-more-nonce', 'nonce' );

		$args = isset( $_POST['query'] ) ? array_map( 'esc_attr', $_POST['query'] ) : array();
		$args['post_type'] = isset( $args['post_type'] ) ? esc_attr( $args['post_type'] ) : 'post';
		$args['paged'] = esc_attr( $_POST['page'] );
		$args['post_status'] = 'publish';

		$loop = new WP_Query( $args );

		
		if( $loop->have_posts() ): 
			while( $loop->have_posts() ): 
				
				$loop->the_post();
				get_template_part( 'template-parts/content', esc_attr( $theme_options['post_layout'] ) );
			
			endwhile; 
		endif; 

		wp_reset_postdata();

	    exit;


	}

	add_action('wp_ajax_infinite_scroll', 'basepress_infinitepaginate');        // for logged in user
	add_action('wp_ajax_nopriv_infinite_scroll', 'basepress_infinitepaginate');

endif;

/*
|------------------------------------------------------------------------------
| Infinite loading and more button
|------------------------------------------------------------------------------
| 
| @return void
|
*/

function basepress_infinite_loading($load_style = 'loadding') {
	global $wp_query;
	$totalPages = $wp_query->max_num_pages;

	if ($totalPages > 1) :

		if ($load_style != 'infinite'):
		?>
			<div id="load-more-wrap">
				<a id="load-more-post" href="#" data-loading="<?php _e('Loading...', 'basepress') ?>" data-more="Load More..."><?php _e('<i class="fa fa-refresh"></i>  Load More ', 'basepress') ?></a>
			</div>
			
		<?php

		endif;
		?>

		<script type="text/javascript">
			var totalPages = <?php echo $totalPages; ?>;
			var loadStyle = '<?php echo $load_style; ?>';
		</script>

		<?php

	endif;
}


/**
|------------------------------------------------------------------------------
| Excerpt
|------------------------------------------------------------------------------
|
*/
function basepress_excerpt_length( $length ) {

	$theme_options = basepress_theme_options();

	$number = intval ($theme_options['excerpt_length']) > 0 ?  intval ($theme_options['excerpt_length']) : $length;
	return $number;
}

add_filter( 'excerpt_length', 'basepress_excerpt_length', 999 );

function basepress_excerpt_more( $more ) {

	$theme_options = basepress_theme_options();

	return esc_html($theme_options['excerpt_more']);
}

add_filter('excerpt_more', 'basepress_excerpt_more');

/**
|------------------------------------------------------------------------------
| Related Posts
|------------------------------------------------------------------------------
|
| You can show related posts by Categories or Tags. 
| It has two options to show related posts
|
| 1. Thumbnail related posts (default)
| 2. List of related posts
| 
| @return void
|
*/
if (! function_exists('basepress_related_posts') ) :

	function basepress_related_posts() {
		
		global $post;

		$theme_options = basepress_theme_options();
		$taxonomy = $theme_options['related_post_taxonomy'];
		$numberRelated = $theme_options['number_related_post'];
		$args =  array();

		if ($taxonomy == 'tag') {

			$tags = wp_get_post_tags($post->ID);
			$arr_tags = array();
			foreach($tags as $tag) {
				array_push($arr_tags, $tag->term_id);
			}
			
			if (!empty($arr_tags)) { 
			    $args = array(  
				    'tag__in' => $arr_tags,  
				    'post__not_in' => array($post->ID),  
				    'posts_per_page'=> $numberRelated,
			    ); 
			}

		} else {

			 $args = array( 
			 	'category__in' => wp_get_post_categories($post->ID), 
			 	'posts_per_page' => $numberRelated, 
			 	'post__not_in' => array($post->ID) 
			 );

		}

		if (! empty($args) ) {
			$posts = get_posts($args);

			if ($posts) {
				?>
			<div class="related-posts">
				<h3 class="title-related"><?php _e('Related Post', 'basepress') ?></h3>

				<?php 

				$related_style = $theme_options['related_post_display_style'];

				if ($related_style == 'grid' ) :

				?>

					<ul class="related clearfix">
					<?php
					foreach ($posts as $p) {
						?>
						<li>
							<div class="related-entry">							
									<div class="thumbnail">
										<?php if (has_post_thumbnail($p->ID)) : ?>							
											<a href="<?php echo esc_url(get_the_permalink($p->ID)) ?>">
												<?php echo get_the_post_thumbnail($p->ID, 'basepress-thumbnail-small') ?>
											</a>
										<?php else : ?>
											<a href="<?php echo esc_url(get_the_permalink($p->ID)) ?>">
												<img src="<?php echo get_template_directory_uri(); ?>/images/base-related-thumbnails.jpg" />
											</a>
										<?php endif; ?>
									</div>							
								<a href="<?php echo esc_url(get_the_permalink($p->ID)) ?>"><?php echo get_the_title($p->ID) ?></a>
									
							</div>
						</li>
						<?php
					}
					?>
					</ul>
					<?php

					else : 

					?>

					<ul class="related-list clearfix">
						<?php
						foreach ($posts as $p) {
							?>
							<li>
								<a href="<?php echo esc_url (  get_the_permalink($p->ID) ) ?>"><?php echo esc_html( get_the_title($p->ID) ) ?></a>
							</li>
							<?php
						}
						
						?>

					</ul>



					<?php
					endif;
					?>
			</div>
				<?php
			
			}
		}
	}
endif;


if (! function_exists('basepress_header_code')) :
	
	/*
	|------------------------------------------------------------------------------
	| Header Code Customize
	|------------------------------------------------------------------------------
	| 
	| @return void
	|
	*/
	function basepress_header_code() {
		$theme_options = basepress_theme_options();
		$header_code = html_entity_decode($theme_options['header_code'], ENT_QUOTES);
		echo $header_code;		
	}
	add_action('wp_head','basepress_header_code');

endif;

if (! function_exists('basepress_tracking_code')):

	/*
	|------------------------------------------------------------------------------
	| Tracking Code Customize
	|------------------------------------------------------------------------------
	| 
	| @return void
	|
	*/

	function basepress_tracking_code() {
		$theme_options = basepress_theme_options();
		$footer_code = html_entity_decode($theme_options['footer_code'], ENT_QUOTES);
		echo $footer_code;
	}

	add_action('wp_footer','basepress_tracking_code');

endif;

/**
|------------------------------------------------------------------------------
| Default Theme Breadcrumb TODO: Remove
|------------------------------------------------------------------------------
| 
| @return void
|
*/

function basepress_breadcrumb() {
	$showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$delimiter = '/ '; // delimiter between crumbs
	$home = 'Home'; // text for the 'Home' link
	$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	$before = '<span class="current">'; // tag before the current crumb
	$after = '</span>'; // tag after the current crumb
 
  global $post;
  $homeLink = home_url();
 
  if (is_home() || is_front_page()) {
 
    if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
 
  } else {
 
    echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page', 'basepress') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
	} 
}
