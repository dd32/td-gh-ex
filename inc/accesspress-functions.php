<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package AccessPress Root
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function accesspress_root_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'accesspress_root_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function accesspress_root_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'accesspress-root' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'accesspress_root_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function accesspress_root_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'accesspress_root_render_title' );
endif;

//bxSlider Callback for do action
function accesspress_bxslidercb(){
		$accesspress_show_slider = of_get_option('show_slider') ;
		$accesspress_show_pager = (!of_get_option('show_pager') || of_get_option('show_pager') == "1") ? "true" : "false";
		$accesspress_show_controls = (!of_get_option('show_controls') || of_get_option('show_controls') == "1") ? "true" : "false";
		$accesspress_auto_transition = (!of_get_option('auto_transition') || of_get_option('auto_transition') == "1") ? "true" : "false";
		$accesspress_slider_transition = (!of_get_option('slider_transition')) ? "fade" : of_get_option('slider_transition');
		$accesspress_slider_speed = (!of_get_option('slider_speed')) ? "5000" : of_get_option('slider_speed');
		$accesspress_slider_pause = (!of_get_option('slider_pause')) ? "5000" : of_get_option('slider_pause');
		$accesspress_show_caption = of_get_option('show_caption') ;
		?>

		<?php if( $accesspress_show_slider == "1") : ?>
		<section id="main-slider">
 		<script type="text/javascript">
            jQuery(function($){
				$('#main-slider .bx-slider').bxSlider({
					adaptiveHeight: true,
					pager: <?php echo $accesspress_show_pager; ?>,
					controls: <?php echo $accesspress_show_controls; ?>,
					mode: '<?php echo $accesspress_slider_transition; ?>',
					auto : '<?php echo $accesspress_auto_transition; ?>',
					pause: '<?php echo $accesspress_slider_pause; ?>',
					speed: '<?php echo $accesspress_slider_speed; ?>'
				});				
			});
        </script>
        <?php
        $settings = get_option('accesspress-root');
		if( !empty($settings)) :
		?>
			<div class="bx-slider">

			<?php 
			for ($i=1; $i <= 5 ; $i++) { 
				$slider_image = of_get_option('slider_image'.$i);
				$slider_title = of_get_option('slider_title'.$i);
				$slider_desc = of_get_option('slider_desc'.$i);
				$slider_button_text = of_get_option('slider_button_text'.$i);
				$slider_button_link = of_get_option('slider_button_link'.$i);
				if(!empty($slider_image)) :

				?>
				<div class="slides">
				
					<img src="<?php echo $slider_image; ?>" alt="<?php echo $slider_title; ?>">
							
					<?php if($accesspress_show_caption == '1'): ?>
					<div class="slider-caption">
						<div class="ak-container">
							<?php if($slider_title): ?>
								<h1 class="caption-title"><?php echo $slider_title;?></h1>
							<?php endif; ?>

							<?php if($slider_desc): ?>
								<div class="caption-content-wrapper">
									<div class="caption-content"><?php echo $slider_desc;?></div>
									
									<?php if($slider_button_text): ?>
									<a class="caption-read-more" href="<?php echo $slider_button_link; ?>"><?php echo $slider_button_text; ?></a>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<?php endif; ?>
			
		        </div>
		    	<?php 
		    	endif; ?>
			<?php 
			} ?>
			
			</div>
			<?php  
			endif; ?>
		</section>
		<?php 
		endif; ?>
<?php
}

add_action('accesspress_bxslider','accesspress_bxslidercb', 10);

function accesspress_footer_count(){
	$count = 0;
	if(is_active_sidebar('footer-1'))
	$count++;

	if(is_active_sidebar('footer-2'))
	$count++;

	if(is_active_sidebar('footer-3'))
	$count++;

	if(is_active_sidebar('footer-4'))
	$count++;

	return $count;
}

function accesspress_social_cb() {
    $facebooklink = of_get_option('facebook');
    $twitterlink = of_get_option('twitter');
    $google_pluslink = of_get_option('google_plus');
    $youtubelink = of_get_option('youtube');
    $pinterestlink = of_get_option('pinterest');
    $linkedinlink = of_get_option('linkedin');
    $instagramlink = of_get_option('instagram');
    $stumbleuponlink = of_get_option('stumbleupon');
    $skypelink = of_get_option('skype');
    ?>
        <?php if (!empty($facebooklink)) { ?>
            <a href="<?php echo of_get_option('facebook'); ?>" class="facebook" data-title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
        <?php } ?>

        <?php if (!empty($twitterlink)) { ?>
            <a href="<?php echo of_get_option('twitter'); ?>" class="twitter" data-title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
        <?php } ?>

        <?php if (!empty($google_pluslink)) { ?>
            <a href="<?php echo of_get_option('google_plus'); ?>" class="gplus" data-title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i></a>
        <?php } ?>

        <?php if (!empty($youtubelink)) { ?>
            <a href="<?php echo of_get_option('youtube'); ?>" class="youtube" data-title="Youtube" target="_blank"><i class="fa fa-youtube"></i></a>
        <?php } ?>

        <?php if (!empty($pinterestlink)) { ?>
            <a href="<?php echo of_get_option('pinterest'); ?>" class="pinterest" data-title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>
        <?php } ?>

        <?php if (!empty($linkedinlink)) { ?>
            <a href="<?php echo of_get_option('linkedin'); ?>" class="linkedin" data-title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
        <?php } ?>

        <?php if (!empty($instagramlink)) { ?>
            <a href="<?php echo of_get_option('instagram'); ?>" class="instagram" data-title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
        <?php } ?>

        <?php if (!empty($stumbleuponlink)) { ?>
            <a href="<?php echo of_get_option('stumbleupon'); ?>" class="stumbleupon" data-title="Stumbleupon" target="_blank"><i class="fa fa-stumbleupon"></i></a>
        <?php } ?>

        <?php if (!empty($skypelink)) { ?>
            <a href="<?php echo "skype:" . of_get_option('skype') ?>" class="skype" data-title="Skype"><i class="fa fa-skype"></i></a>
        <?php } ?>
    <?php
}

add_action('accesspress_social', 'accesspress_social_cb', 10);

function accesspress_remove_page_menu_div( $menu ){
    return preg_replace( array( '#^<div[^>]*>#', '#</div>$#' ), '', $menu );
}
add_filter( 'wp_page_menu', 'accesspress_remove_page_menu_div' );

function accesspress_customize_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'accesspress_customize_excerpt_more');

function accesspress_word_count($string, $limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $limit));
}

function accesspress_letter_count($content, $limit) {
	$striped_content = strip_tags($content);
	$striped_content = strip_shortcodes($striped_content);
	$limit_content = mb_substr($striped_content, 0 , $limit );

	if($limit_content < $content){
		$limit_content .= "..."; 
	}
	return $limit_content;
}
add_filter('widget_text', 'do_shortcode');

function accesspress_bodyclass($classes){
    $classes[]= of_get_option('web_layout');
    return $classes;
}
   
add_filter( 'body_class', 'accesspress_bodyclass' );

function accesspress_postclass( $classes ) {
    if(is_archive() || is_home()):
    global $wp_query;
    $classes[] = of_get_option('blog_post_layout');
    $classes[] = ($wp_query->current_post%2 == 0) ? 'odd-post' : 'even-post' ;
    endif;
    return $classes;
}
add_filter( 'post_class', 'accesspress_postclass' );

/* BreadCrumb */

function accesspress_breadcrumbs() {
    global $post;
    $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show

    $delimiter = '&sol;';
    
    $home = __('Home', 'accesspress-root'); // text for the 'Home' link

    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb

    $homeLink = home_url();

    if (is_home() || is_front_page()) {

        if ($showOnHome == 1)
            echo '<div id="accesspress-breadcrumb"><a href="' . $homeLink . '">' . $home . '</a></div></div>';
    } else {

        echo '<div id="accesspress-breadcrumb"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0)
                echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
            echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
        } elseif (is_search()) {
            echo $before . 'Search results for "' . get_search_query() . '"' . $after;
        } elseif (is_day()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                if ($showCurrent == 1)
                    echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                if ($showCurrent == 0)
                    $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                echo $cats;
                if ($showCurrent == 1)
                    echo $before . get_the_title() . $after;
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
            if ($showCurrent == 1)
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
        } elseif (is_page() && !$post->post_parent) {
            if ($showCurrent == 1)
                echo $before . get_the_title() . $after;
        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs) - 1)
                    echo ' ' . $delimiter . ' ';
            }
            if ($showCurrent == 1)
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
        } elseif (is_tag()) {
            echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . 'Articles posted by ' . $userdata->display_name . $after;
        } elseif (is_404()) {
            echo $before . 'Error 404' . $after;
        }

        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo ' (';
            echo __('Page', 'accesspress_pro') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo ')';
        }

        echo '</div>';
    }
}

function kriesi_pagination($pages = '', $range = 1) {
    $showitems = ($range * 2) + 1;

    global $paged;
    if (empty($paged))
        $paged = 1;

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo "<div class='accesspress_pagination'>";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            echo "<a href='" . get_pagenum_link(1) . "'>&laquo;</a>";
        if ($paged > 1 && $showitems < $pages)
            echo "<a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo;</a>";

        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                echo ($paged == $i) ? "<span class='current'>" . $i . "</span>" : "<a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a>";
            }
        }

        if ($paged < $pages && $showitems < $pages)
            echo "<a href='" . get_pagenum_link($paged + 1) . "'>&rsaquo;</a>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            echo "<a href='" . get_pagenum_link($pages) . "'>&raquo;</a>";
        echo "</div>\n";
    }
}

function exclude_category_from_blogpost($query) {
$exclude_cat_array = of_get_option('exclude_from_blog');
if(is_array($exclude_cat_array)):
    $cats = array();
    foreach($exclude_cat_array as $key => $value){
        if($value == 1){
            $cats[] = -$key; 
        }
    }
    $category = join( "," , $cats);
    if ( $query->is_home() ) {
    $query->set('cat', $category);
    }
    return $query;
endif;
}
add_filter('pre_get_posts', 'exclude_category_from_blogpost');

function accesspress_header_scripts(){
    $fav_icon = of_get_option('fav_icon');
    $page_background_option = of_get_option('page_background_option');
    if(!empty($fav_icon)):
    ?>
    <link rel="icon" type="image/png" href="<?php echo $fav_icon; ?>"> 
    <?php    
    endif;
    echo "<style>";
    echo "html body{";
    if($page_background_option == 'image'): 
    $background = of_get_option('page_background_image');
        echo 'background:url('.$background["image"].') '.$background["repeat"].' '.$background["position"].' '.$background["attachment"].' '.$background["color"];
    elseif($page_background_option == 'color'): 
        echo 'background:'.of_get_option('page_background_color');
    elseif($page_background_option == 'pattern'):
        echo 'background:url('.get_template_directory_uri().'/inc/panel/images/patterns/'.of_get_option("page_background_pattern").'.png)';
    endif;
    echo "}";
    echo "</style>";


}

add_action('wp_head', 'accesspress_header_scripts');


