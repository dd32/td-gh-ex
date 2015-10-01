<?php
/*Template for function code for theme.
*
*@package -> Wordpress
*@sub-package -> afia
*@since -> V 1.0.0
*/  
?>

<?php 
/*echos the short form of description of the site.
*
*@params N/A
*@since 1.0.0
*/
if (!(function_exists('afia_short_description'))):
 function afia_short_description ()
 {
	 $d = get_bloginfo( 'description' );
		if((strlen($d)) >50)
		$s = substr($d,0,44).'....';
		else
		$s = $d;
		echo $s;
 }
endif;

require('lib/some.php');
/*returns the short form of provided text.
*
*@params required $text text to be worked on.
*@since 1.0.0
*/
if (!(function_exists('afia_short_return'))):
 function afia_short_return ($text)
 {
	 $d = $text;
		if((strlen($d)) >30)
		$s = substr($d,0,26).'....';
		else
		$s = $d;
		return $s;
 }
endif;


if ( ! function_exists( 'afia_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ...
 * and a Continue reading link.
 *
 * @since afia 1.0.0
 *
 * @param string $more Default Read More excerpt link.
 * @return string Filtered Read More excerpt link.
 */
function afia_excerpt_more( $more ) {
	$link = sprintf( '<a href="%1$s" class="more-link linkb">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
			/* translators: %s: Name of current post */
			sprintf( __( 'Continue reading %s ', 'Afia' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'afia_excerpt_more' );
endif;

/*
*Function to return the given text in lowercase.
*
*@since afia 1.0.0
*
*@param string text required the text to be converted.
*@param boolean optional to determine if the text should be echoed or returned by default returns 'false'.
*
*/
if(! function_exists('afia_lowercase')):
function afia_lowercase($text,$bol = false)
{
	$txt = strtolower($text);
	if($bol):
	echo $txt;
	else:
	return $txt;
	endif;
}
endif;
//End of function afia_lowercase.

/*
*Function to write the top bar content.
*/
if(! function_exists('afia_top_bar')):
function afia_top_bar()
{
	if(!is_home()):
	  $home = '<span class = "idle"><a href = "'.esc_url( home_url( '/' ) ).'" title = "'.__('HOME','Afia').'">'.__('HOME','Afia').'</a></span>  | ';
	  $single = '<span class = "active">'. afia_title() .'</span>';
	  $fin = $home.''.$single;
	 echo $fin;
	 else:
	 $fin = '';
	endif;
	
}
//End of afia top bar.
endif;

/*
*Function to return the title of a page.
*/
if(! function_exists('afia_title')):
function afia_title()
{
	if (is_archive()) {
    $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
    if ($term) {
      return apply_filters('single_term_title', $term->name);
    } elseif (is_post_type_archive()) {
      return apply_filters('the_title', get_queried_object()->labels->name);
    } elseif (is_day()) {
      return sprintf(__('Daily Archives: %s', 'Afia'), get_the_date());
    } elseif (is_month()) {
      return sprintf(__('Monthly Archives: %s', 'Afia'), get_the_date('F Y'));
    } elseif (is_year()) {
      return sprintf(__('Yearly Archives: %s', 'Afia'), get_the_date('Y'));
    } elseif (is_author()) {
      $author = get_queried_object();
      return sprintf(__('Author Archives: %s', 'Afia'), $author->display_name);
    } else {      return single_cat_title('', false);

    }
  } elseif (is_search()) {
    return sprintf(__('Search Results for %s', 'Afia'), get_search_query());
  } elseif (is_404()) {
    return __('Not Found', 'Afia');
  } else {
	  $c = get_the_category();
	  $cat_name = $c[0]->name;
	  $cat_id = get_cat_ID($cat_name);
	  $cat_link = get_category_link($cat_id);
	  $lk = '<span class="idle"><a href = "'.$cat_link.'" title = "'.__('Category ','Afia').'->'.$cat_name.'">'.$cat_name.'</a></span>  |  '.get_the_title();
	return $lk;
  }
}
endif;

/*
*Function to write recent comments.
*
*
*@since v1.0.0
*@params optional $bol to det if to echo or not. default (true) writes.
*/
if(! function_exists('afia_comments_aside')):
function afia_comments_aside($bol = true)
{
	$defaults = array(
	'author_email' => '',
	'author__in' => '',
	'author__not_in' => '',
	'include_unapproved' => '',
	'fields' => '',
	'ID' => '',
	'comment__in' => '',
	'comment__not_in' => '',
	'karma' => '',
	'number' => 5,
	'offset' => '',
	'orderby' => '',
	'order' => 'DESC',
	'parent' => '',
	'post_author__in' => '',
	'post_author__not_in' => '',
	'post_ID' => '', // ignored (use post_id instead)
	'post_id' => 0,
	'post__in' => '',
	'post__not_in' => '',
	'post_author' => '',
	'post_name' => '',
	'post_parent' => '',
	'post_status' => '',
	'post_type' => '',
	'status' => 'approve',
	'type' => '',
        'type__in' => '',
        'type__not_in' => '',
	'user_id' => '',
	'search' => '',
	'count' => false,
	'meta_key' => '',
	'meta_value' => '',
	'meta_query' => '',
	'date_query' => null, // See WP_Date_Query
);
	$array = get_comments($defaults);
	$det;
	foreach ($array as $ar => $obj)
	{
		$name = $obj -> comment_author;
		$date = $obj ->comment_date;
		$post_id = $obj ->comment_post_ID;
		$text = get_the_title($post_id);
		$comment_ID = $obj ->comment_ID;
		$author_link = get_comment_author_link( $comment_ID );
		$post_link = get_permalink($post_id,false);
		$len = strlen($name) + strlen ($text) + 15;
		if($len>56)
			$title =  afia_short_return ($text);
		else
			$title = $text;
		$det .= '<span class = "commentAuthor">'.$name.'</span>'. __(' Commented on: ','Afia');
		$det .='<span class = "commentpost"><a class = "recent-single-a" href = "'.$post_link.'"><span class = "recent-single">'.$title.'</span></a></span><hr />';
	}
	if($bol)
	echo $det;
	else
	return $det;
}
endif;

/*
*Function to display the number of posts to be displayed.
*
*@since 1.0.0
*/
if(! function_exists('afia_limit_posts_per_archive_page') && !is_admin()):
function afia_limit_posts_per_archive_page() {
		//$limit = get_option('posts_per_page');
		$limit = 5;
	set_query_var('posts_per_archive_page', $limit);
}
add_filter('pre_get_posts', 'afia_limit_posts_per_archive_page');
endif;

function afia_my_post_queries( $query ) {
  // do not alter the query on wp-admin pages and only alter it if it's the main query
  if (!is_admin() && $query->is_main_query()){

    // alter the query for the home and category pages 

    if(is_home()){
      $query->set('posts_per_page', 5);
    }
  }
}
add_action( 'pre_get_posts', 'afia_my_post_queries' );






/*
*function to edit details of user or login button if not logged in.
*
*@sub-package afia
*@since 1.0.0
*/
if(! function_exists('afia_logged_details')):
function afia_logged_details()
{
	if(is_user_logged_in())
	{
	    $current_user = wp_get_current_user();
		$name = $current_user -> user_login;
		$fin = '<span class = "lucida">'.__('Logged in as: ','Afia').'</span><span class = "logname"><i>'.$name.'</i><span>';
		$fin .= '<span class = "log"> <a href = "'. wp_logout_url().'">'.__('Logout','Afia').'</a></span>';
	}
	else if(! is_user_logged_in())
	{
		$fin = '<span class = "log"><a href = "'. wp_login_url().'">'.__('Login','Afia').'</a></span>';
	}
	echo '<span class = "right">'.$fin.'</span>';
}
endif;
/*
*function to echo the footer text.
*/
if(!function_exists('afia_echo_year')):
function afia_echo_year()
{
$txt = '&copy; 2015 ';
$date = date('Y');
if($date > 2015):
$txt .= '- '.$date;
endif;
$t = afia_footer_text(). $txt;
return $t;
}
endif;



function afia_set_up()
{
	$background_args = array(
	'default-color'  => '#f2f2f2',
      'default-repeat' => 'fixed',
      'default-image'  => get_template_directory_uri() . '/assets/img/pat.jpg',
  );
  add_theme_support( 'custom-background', $background_args );
  
  $defaults = array(
	'default-image'          => '',
	'width'                  => 850,
	'height'                 => 371,
	'flex-height'            => false,
	'flex-width'             => false,
	'uploads'                => true,
	'random-default'         => false,
	'header-text'            => true,
	'default-text-color'     => '',
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );
// editor style
  add_editor_style('/assets/css/editor-style.css');

  // Content width
  global $content_width;
  if (!isset($content_width)) { $content_width = 657; }
}
add_action('after_setup_theme', 'afia_set_up');

function afia_setup_cus($wp_customize ) 
{
   


$wp_customize->add_section( 'background_image', array(
            'title'          => __( 'Background Image','Afia' ),
            'theme_supports' => 'custom-background',
            'priority'       => 80,
        ) );

        $wp_customize->add_setting( 'background_image', array(
            'default'        => get_theme_support( 'custom-background', 'default-image' ),
            'theme_supports' => 'custom-background',
			'sanitize_callback' => 'esc_url_raw',
    
        ) );

        $wp_customize->add_setting( new WP_Customize_Background_Image_Setting( $wp_customize, 'background_image_thumb', array(
            'theme_supports' => 'custom-background',
			'sanitize_callback' => 'esc_url_raw',
        ) ) );

        $wp_customize->add_control( new WP_Customize_Background_Image_Control( $wp_customize ) );

        $wp_customize->add_setting( 'background_repeat', array(
            'default'        => 'repeat',
            'theme_supports' => 'custom-background',
			'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( 'background_repeat', array(
            'label'      => __( 'Background Repeat','Afia' ),
            'section'    => 'background_image',
            'type'       => 'radio',
            'choices'    => array(
                'no-repeat'  => __('No Repeat','Afia'),
                'repeat'     => __('Tile','Afia'),
                'repeat-x'   => __('Tile Horizontally','Afia'),
                'repeat-y'   => __('Tile Vertically','Afia'),
            ),
        ) );

        $wp_customize->add_setting( 'background_position_x', array(
            'default'        => 'left',
            'theme_supports' => 'custom-background',
			'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( 'background_position_x', array(
            'label'      => __( 'Background Position','Afia' ),
            'section'    => 'background_image',
            'type'       => 'radio',
            'choices'    => array(
                'left'       => __('Left','Afia'),
                'center'     => __('Center','Afia'),
                'right'      => __('Right','Afia'),
            ),
        ) );

        $wp_customize->add_setting( 'background_attachment', array(
            'default'        => 'fixed',
            'theme_supports' => 'custom-background',
			'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( 'background_attachment', array(
            'label'      => __( 'Background Attachment','Afia'),
            'section'    => 'background_image',
            'type'       => 'radio',
            'choices'    => array(
                'fixed'      => __('Fixed','Afia'),
                'scroll'     => __('Scroll','Afia'),
            ),
        ) );

}
add_action( 'customize_register', 'afia_setup_cus' );

//generating css.
function afia_customize_css()
{
    
     $txt =    '<style type="text/css">';
     $txt .=        'body { background-color: '. get_theme_mod('afia_body_background', '#00ff00') .';';
	 $txt .=   'background-image:url("'.get_theme_mod( 'background_image', get_stylesheet_directory_uri().'/assets/img/pat.jpg' ).'"); background-repeat:'.get_theme_mod( 'background_repeat', 'default' ).'; background-attachment:'.get_theme_mod( 'background_attachment', 'default' ).'; background-position:'.get_theme_mod( 'background_position_x', 'default' ).';}';
     $txt .=    '</style>';
	 echo $txt;
    
}
add_action( 'wp_head', 'afia_customize_css');
add_theme_support( 'post-thumbnails' ); 
function afia_password_form() {
    global $post;
    $label = 'password-'.( empty( $post->ID ) ? rand() : $post->ID );
    $password_form = '<form class="protected-post-form" action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post">
    '.__('This post is password protected. To view it please enter your password below: ', 'Afia').'
    <div class="protected-form input-group has-info col-md-6">
        <input class="form-control" value="' . get_search_query() . '" name="post_password" id="' . $label . '" type="password">
        <span class="input-group-btn"><button type="submit" class="btn btn-default" name="submit" id="searchsubmit" value="Submit"><span class="fa fa-lock"></span></button>
        </span>
    </div>
  </form>';
    return $password_form;
}
apply_filters( 'the_password_form', 'afia_password_form' );

?>