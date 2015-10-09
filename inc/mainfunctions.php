<?php
/*
* Theme Option Functions
*/

//Layout Function
if (!function_exists("themeofwp_layout")) {
    function themeofwp_layout(){
            echo '<div class="col-md-12 colwrapper">'; 
	}
}


//Comments On Pages
if (!function_exists("comments_page")) {
    function comments_page(){
		global $data, $shortname; 
        if(themeofwp_option(''.$shortname.'_blog_comments') && is_page()){
            comments_template();
        }
    }
}



//Blog Sidebar Position
if(!function_exists('blog_date')){
    function blog_date(){
		global $data, $shortname;
        if(themeofwp_option(''.$shortname.'_blog_date')){
            echo themeofwp_option(''.$shortname.'_blog_date');
        //the_time('$time');
        }
    }
}


//Featured Image on Single Post
if( !function_exists('featured_image_single_post')){
    function featured_image_single_post(){
		global $data, $shortname;
        if(themeofwp_option(''.$shortname.'_single_featured_image' ) == 1){
            the_post_thumbnail();
        } 
    }
}

//Post Author Section
if( !function_exists('themeofwp_author_bio')){
    function themeofwp_author_bio(){
		global $data, $shortname;
        if( themeofwp_option(''.$shortname.'_single_post_author') ){
            echo themeofwp_option(''.$shortname.'_single_post_author');
        }
    }
}


//Comments On Blog
if (!function_exists("blog_comments")) {
    function blog_comments(){
		global $data, $shortname;
        if(themeofwp_option(''.$shortname.'_blog_comments') == 1 && is_single()){
            comments_template();
        }
    }
}



// Custom Excerpt
function theme_excerpt($num) {
        $link = get_permalink();
        $limit = $num;
        if(!$limit) $limit = 100;
        $excerpt = explode(' ', strip_tags(get_the_excerpt()), $limit);
        if (count($excerpt)>=$limit) {
                array_pop($excerpt);
                $excerpt = implode(" ",$excerpt).'...';
        } else {
                $excerpt = implode(" ",$excerpt).'...';
        }
        $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
        echo '<p>'.$excerpt.'</p>';
}

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

if(!function_exists('themeofwp_admin_logo')){
    function themeofwp_admin_logo(){
		global $data, $shortname;
        if(themeofwp_option(''.$shortname.'_logo_login')){
            ?>
            <style type="text/css">
            body.login div#login h1 a {
                background-image: url(<?php echo themeofwp_option(''.$shortname.'_logo_login');?>);
				background-size: auto;
				width: auto;
            }
            </style>

            <?php } else { ?>

            <style type="text/css">
            body.login div#login h1 a {
                background-image: url(<?php echo admin_url('/images/wordpress-logo.png');?>);
                padding-bottom: 30px;
            }
            </style>

            <?php }
        }
        add_action( 'login_enqueue_scripts', 'themeofwp_admin_logo' );
    }


if(!function_exists('themeofwp_logo_login_url')){
        function themeofwp_logo_login_url(){
            return site_url();
        }
        add_filter( 'login_headerurl', 'themeofwp_logo_login_url' );
    }



/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function avien_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'avien_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function avien_wp_title( $title, $sep ) {
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
		$title .= " $sep " . sprintf( __( 'Page %s', 'avien-light' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'avien_wp_title', 10, 2 );

/**
 * Title shim for sites older than WordPress 4.1.
 *
 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
 * @todo Remove this function when WordPress 4.3 is released.
 */
function avien_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'avien_render_title' );
endif;

add_action( 'after_setup_theme', 'theme_functions' );
function theme_functions() {

    add_theme_support( 'title-tag' );

}

