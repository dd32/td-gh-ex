<?php
//Theme Functions
require( get_template_directory()  . '/inc/mainfunctions.php');

// Nav walker
require( get_template_directory()  . '/inc/navwalker.php');

// Mobile walker
require( get_template_directory()  . '/inc/mobile-navwalker.php');

// Widgets
require( get_template_directory()  . '/inc/widgets.php');


if ( ! function_exists( 'avien_setup' ) ) :

	function avien_setup() {
	
	//Defined Textdomain
	define('themeofwp', wp_get_theme()->get( 'TextDomain' ));

	define('THEMEOFWPTHEMENAME', wp_get_theme()->get( 'Name' ));

	// Registering Wp Nav Menus
	register_nav_menus( array(
		'primary'   => __('Primary', 'themeofwp'),
		'footer'    => __('Footer', 'themeofwp')
	));
	
	// Add Editor Style
	function themeofwp_add_editor_styles() {
		add_editor_style( 'themeofwp-editor-style.css' );
		$font_url = '//fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,400italic,700,700italic,300';
		add_editor_style( str_replace( ',', '%2C', $font_url ) );
	}
	add_action( 'init', 'themeofwp_add_editor_styles' );


	// Post format support
	add_theme_support( 
		'post-formats', array(
		  'audio', 'gallery', 'image', 'video'
		  ) 
	);
	
	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'themeofwp', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	/*-----------------------------------------------------------------------------------*/
	/*	Add custom header support
	/*-----------------------------------------------------------------------------------*/
	$defaults = array(
		'default-image'          => '',
		'random-default'         => false,
		'width'                  => 0,
		'height'                 => 0,
		'flex-height'            => true,
		'flex-width'             => true,
		'default-text-color'     => '',
		'header-text'            => true,
		'uploads'                => true,
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);

	


global $wp_version;
if ( version_compare( $wp_version, '3.4', '>=' ) )
		add_theme_support( 'custom-header' );
		


	// Post Thumbnail Support & Sizes
	add_theme_support('post-thumbnails');
	add_image_size( 'portfolio-filter-s1', 220, 220, TRUE );
	add_image_size( 'portfolio-classic', 660, 660, TRUE );
	add_image_size( 'home-blog-thumb', 263, 301, TRUE );
	add_theme_support( 'automatic-feed-links' );
	
	}
	
endif; // vega_setup
add_action( 'after_setup_theme', 'avien_setup' );

/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'theemeofwp_flush_rewrite_rules' );

/* Flush your rewrite rules */
function theemeofwp_flush_rewrite_rules() {
     flush_rewrite_rules();
}



class themeofWP_Walker extends Walker_Page {

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);

        if ($depth == 0) {
            $output .= "\n$indent<ul class='dropdown-menu' role='menu'>\n";
        } else {
            $output .= "\n$indent<ul class='dropdown-menu' role='menu'>\n";
        }
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);

        if ($depth == 0) {
            $output .= "$indent</ul>\n";
        } else {
            $output .= "$indent</ul>\n";
        }
    }
}







/*-----------------------------------------------------------------------------------------------------------------------*/
/* Put post thumbnails into rss feed  */
/*-----------------------------------------------------------------------------------------------------------------------*/
function themeofwp_feed_post_thumbnail($content) {
	global $post;
	if(has_post_thumbnail($post->ID)) {
		$content = '' . $content;
	}
	return $content;
}
add_filter('the_excerpt_rss', 'themeofwp_feed_post_thumbnail');
add_filter('the_content_feed', 'themeofwp_feed_post_thumbnail');


/*-----------------------------------------------------------------------------------------------------------------------*/
/* Custom Bg Support  */
/*-----------------------------------------------------------------------------------------------------------------------*/
// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'themeofwp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

/*-----------------------------------------------------------------------------------------------------------------------*/
/* Custom Excerpt Lenght */
/*-----------------------------------------------------------------------------------------------------------------------*/
function themeofwp_excerpt($num) {
        $link = get_permalink();
        $limit = $num;
        if(!$limit) $limit = 55;
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


/*-----------------------------------------------------------------------------------------------------------------------*/
/* Load Jetpack compatibility */
/*-----------------------------------------------------------------------------------------------------------------------*/
function themeofwp_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'themeofwp_jetpack_setup' );





/*-----------------------------------------------------------------------------------*/
/*	Initalising Shortcodes In Content and Widget
/*-----------------------------------------------------------------------------------*/
add_filter('widget_text', 'do_shortcode');
add_filter('the_content', 'do_shortcode');
add_filter('content', 'do_shortcode');
add_filter( 'the_excerpt', 'do_shortcode');

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function themeofwp_wp_title( $title, $sep ) {
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
	if ( $paged >= 2 || $page >= 2 ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'themeofwp' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'themeofwp_wp_title', 10, 2 );


if ( ! function_exists( 'themeofwp_option' ) ) {

/**
 * Getting theme option
 * @param  boolean $index  [first index of theme array]
 * @param  boolean $index2 [second index of first index array]
 * @return string          [return option data]
 */
    
    function themeofwp_option($index=false, $index2=false ){

        global $data, $shortname; 

        if( $index2 ){
            return ( isset($data[$index]) and isset($data[$index][$index2]) ) ?  $data[$index][$index2] : '';
        } else {
            return isset( $data[$index] ) ?  $data[$index] : '';
        }
    }
}


// Content width 
if ( ! isset( $content_width ) ) {
    $content_width = 600;   
}



/**
 * Getting post thumbnail url
 * @param  [int]                $pots_ID [Post ID]
 * @return [string]             [Return thumbail source url]
 */
function themeofwp_get_thumb_url($pots_ID){
    return wp_get_attachment_url( get_post_thumbnail_id( $pots_ID ) );
}


/**
* Add common scripts and stylesheets
*/
if( ! function_exists('themeofwp_scripts') ){

	// adding wp_enqueue scripts
    add_action('wp_enqueue_scripts', 'themeofwp_scripts');

    function themeofwp_scripts() {

		// Javascripts
        wp_enqueue_script ( 'bootstrap-js',   get_template_directory_uri() . '/inc/js/bootstrap.min.js', array('jquery'));
		wp_enqueue_script ( 'fitvids', 	get_template_directory_uri() . '/inc/js/jquery.fitvids.js', array(), '1.3', true );
		wp_enqueue_script ( 'easing', 		get_template_directory_uri() . '/inc/js/jquery.easing.min.js', array(), '1.3', true );
		wp_enqueue_script ( 'respond', 		get_template_directory_uri() . '/inc/js/respond.js', array(), '1.4.2', true );
        wp_enqueue_script ( 'framework-js',   get_template_directory_uri() . '/inc/js/framework.js', array(), '3.3', true);

		// Stylesheet
        wp_enqueue_style ( 'bootstrap',   get_template_directory_uri() . '/inc/css/bootstrap.min.css');
        wp_enqueue_style ( 'fontawesome',     get_template_directory_uri() . '/inc/css/font-awesome.min.css');
        wp_enqueue_style ( 'style',           get_template_directory_uri() . '/style.css'); 
			
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
    }
}
	
	function wp_mediaelement_scripts(){
		$library = apply_filters( 'wp_audio_shortcode_library', 'mediaelement' );
		if ( 'mediaelement' === $library && did_action( 'init' ) ) {
			wp_enqueue_style( 'wp-mediaelement' );
			wp_enqueue_script( 'wp-mediaelement' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'wp_mediaelement_scripts' );
	
	
	$library = apply_filters( 'wp_audio_shortcode_library', 'mediaelement' );
	if ( 'mediaelement' === $library && did_action( 'init' ) ) {
		wp_enqueue_style( 'wp-mediaelement' );
		wp_enqueue_script( 'wp-mediaelement' );
	}
	


if( ! function_exists('themeofwp_pagination') ){

/**
 * Display pagination
 * @return [string] [pagination]
 */
function themeofwp_pagination() {
    global $wp_query;
    if ($wp_query->max_num_pages > 1) {
            $big = 999999999; // need an unlikely integer
            $items =  paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'prev_next'    => true,
                'current' => max( 1, get_query_var('paged') ),
                'total' => $wp_query->max_num_pages,
                'type'=>'array'
                ) );

            $pagination ="<ul class='pagination'>\n\t<li>";
            $pagination .=join("</li>\n\t<li>", $items);
            $pagination ."</li>\n</ul>\n";
            
            return $pagination;
        }
        return;
    }   

}


if ( ! function_exists( 'themeofwp_post_nav' ) ) {


/**
 * Display post nav
 * @return [type] [description]
 */

function themeofwp_post_nav() {
    global $post;

    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next and ! $previous ){
        return;
    } 
    ?>
    <nav class="navigation post-navigation" role="navigation">
        <div class="pager">
            <?php if ( $previous ) { ?>
            <li class="previous">
                <?php previous_post_link( '%link', _x( '<i class="fa fa-long-arrow-left"></i> %title', 'Previous post link', 'themeofwp' ) ); ?>
            </li>
            <?php } ?>

            <?php if ( $next ) { ?>
            <li class="next"><?php next_post_link( '%link', _x( '%title <i class="fa fa-long-arrow-right"></i>', 'Next post link', 'themeofwp' ) ); ?></li>
            <?php } ?>

        </div><!-- .nav-links -->
    </nav><!-- .navigation -->
    <?php
}
}


if( ! function_exists('themeofwp_link_pages') ){

    function themeofwp_link_pages($args = '') {
        $defaults = array(
            'before' => '' ,
            'after' => '',
            'link_before' => '', 
            'link_after' => '',
            'next_or_number' => 'number', 
            'nextpagelink' => __('Next page', 'themeofwp'),
            'previouspagelink' => __('Previous page', 'themeofwp'), 
            'pagelink' => '%',
            'echo' => 1
            );

        $r = wp_parse_args( $args, $defaults );
        $r = apply_filters( 'wp_link_pages_args', $r );
        extract( $r, EXTR_SKIP );

        global $page, $numpages, $multipage, $more, $pagenow;

        $output = '';
        if ( $multipage ) {
            if ( 'number' == $next_or_number ) {
                $output .= $before . '<ul class="pagination">';
                $laquo = $page == 1 ? 'class="disabled"' : '';
                $output .= '<li ' . $laquo .'>' . _wp_link_page($page -1) . '&laquo;</li>';
                for ( $i = 1; $i < ($numpages+1); $i = $i + 1 ) {
                    $j = str_replace('%',$i,$pagelink);

                    if ( ($i != $page) || ((!$more) && ($page==1)) ) {
                        $output .= '<li>';
                        $output .= _wp_link_page($i) ;
                    }
                    else{
                        $output .= '<li class="active">';
                        $output .= _wp_link_page($i) ;
                    }
                    $output .= $link_before . $j . $link_after ;

                    $output .= '</li>';
                }
                $raquo = $page == $numpages ? 'class="disabled"' : '';
                $output .= '<li ' . $raquo .'>' . _wp_link_page($page +1) . '&raquo;</li>';
                $output .= '</ul>' . $after;
            } else {
                if ( $more ) {
                    $output .= $before . '<ul class="pager">';
                    $i = $page - 1;
                    if ( $i && $more ) {
                        $output .= '<li class="previous">' . _wp_link_page($i);
                        $output .= $link_before. $previouspagelink . $link_after . '</li>';
                    }
                    $i = $page + 1;
                    if ( $i <= $numpages && $more ) {
                        $output .= '<li class="next">' .  _wp_link_page($i);
                        $output .= $link_before. $nextpagelink . $link_after . '</li>';
                    }
                    $output .= '</ul>' . $after;
                }
            }
        }

        if ( $echo ){
            echo $output;
        } else {
            return $output;
        } 
    }
}



if( ! function_exists('themeofwp_get_avatar_url') ){
/**
 * Get avatar url
 * @param  [string] $get_avatar [Avater image link]
 * @return [string]             [image link]
 */
function themeofwp_get_avatar_url($get_avatar){
    preg_match("/src='(.*?)'/i", $get_avatar, $matches);
    return $matches[1];
}
}




if( ! function_exists("themeofwp_comments_list") ){

/**
 * Comments link
 * @param   $comment [comments]
 * @param   $args    [arguments]
 * @param   $depth   [depth]
 * @return void          
 */
function themeofwp_comments_list($comment, $args, $depth) {

    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) {
        case 'pingback' :
        case 'trackback' :
        // Display trackbacks differently than normal comments.
        ?>
        <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
            <p><?php _e( 'Pingback:', 'themeofwp' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'themeofwp' ), '<span class="edit-link">', '</span>' ); ?></p>
            <?php
            break;
            default :
            // Proceed with normal comments.
            global $post;
            ?>
            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <div id="comment-<?php comment_ID(); ?>" class="comment media">
                    <div class="pull-left comment-author vcard">
                        <?php 
                        $get_avatar = get_avatar( $comment, 48 );
                        $avatar_img = themeofwp_get_avatar_url($get_avatar);
                             //Comment author avatar 
                        ?>
                        <img class="avatar img-circle" src="<?php echo $avatar_img ?>" alt="">
                    </div>

                    <div class="media-body">

                        <div class="well">

                            <div class="comment-meta media-heading">
                                <span class="author-name">
                                    <?php _e('By', 'themeofwp'); ?> <strong><?php echo get_comment_author(); ?></strong>
                                </span>
                                -
                                <time datetime="<?php echo get_comment_date(); ?>">
                                    <?php echo get_comment_date(); ?> <?php echo get_comment_time(); ?>
                                    <?php edit_comment_link( __( 'Edit', 'themeofwp' ), '<small class="edit-link">', '</small>' ); //edit link ?>
                                </time>

                                <span class="reply pull-right">
                                    <?php comment_reply_link( array_merge( $args, array( 'reply_text' =>  sprintf( __( '%s Reply', 'themeofwp' ), '<i class="icon-repeat"></i> ' ) , 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                                </span><!-- .reply -->
                            </div>

                            <?php if ( '0' == $comment->comment_approved ) {  //Comment moderation ?>
                            <div class="alert alert-info"><?php _e( 'Your comment is awaiting moderation.', 'themeofwp' ); ?></div>
                            <?php } ?>

                            <div class="comment-content comment">
                                <?php comment_text(); //Comment text ?>
                            </div><!-- .comment-content -->

                        </div><!-- .well -->


                    </div>
                </div><!-- #comment-## -->
                <?php
                break;
} // end comment_type check

}

}

// Registering sidebars
register_sidebar(array(
  'name' => __( 'Blog', 'themeofwp' ),
  'id' => 'sidebar',
  'description' => __( 'Widgets in this area will be shown blogs on right side.', 'themeofwp' ),
  'before_title' => '<h3>',
  'after_title' => '</h3>',
  'before_widget' => '<div class="widget">',
  'after_widget' => '</div>'
  )
);

register_sidebar(array(
  'name' => __( 'Footer', 'themeofwp' ),
  'id' => 'bottom',
  'description' => __( 'Widgets in this area will be shown before footer area.' , 'themeofwp'),
  'before_title' => '<h3>',
  'after_title' => '</h3>',
  'before_widget' => '<div class="col-lg-3 footer_widgets">',
  'after_widget' => '</div>'
  )
);

register_sidebar(array(
  'name' => __( 'Header Social', 'themeofwp' ),
  'id' => 'header-social',
  'description' => __( 'Widgets in this area will be shown on hader social area.' , 'themeofwp'),
  'before_title' => '',
  'after_title' => '',
  'before_widget' => '',
  'after_widget' => ''
  )
);

register_sidebar(array(
  'name' => __( 'Header Contact', 'themeofwp' ),
  'id' => 'header-contact',
  'description' => __( 'Widgets in this area will be shown on hader contact area.' , 'themeofwp'),
  'before_title' => '',
  'after_title' => '',
  'before_widget' => '',
  'after_widget' => ''
  )
);

register_sidebar(array(
  'name' => __( 'Works', 'themeofwp' ),
  'id' => 'works',
  'description' => __( 'Widgets in this area will be shown on portfolio / works page' , 'themeofwp'),
  'before_title' => '<h3>',
  'after_title' => '</h3>',
  'before_widget' => '<div class="widget">',
  'after_widget' => '</div>'
  )
);

register_sidebar(array(
  'name' => __( 'Pages', 'themeofwp' ),
  'id' => 'page',
  'description' => __( 'Widgets in this area will be shown on pages' , 'themeofwp'),
  'before_title' => '<h3>',
  'after_title' => '</h3>',
  'before_widget' => '<div class="widget">',
  'after_widget' => '</div>'
  )
);

register_sidebar(array(
  'name' => __( 'Contact', 'themeofwp' ),
  'id' => 'contact',
  'description' => __( 'Widgets in this area will be shown on contact page' , 'themeofwp'),
  'before_title' => '<h3>',
  'after_title' => '</h3>',
  'before_widget' => '<div class="widget">',
  'after_widget' => '</div>'
  )
);

// Remove the annoying: <style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style> added in the header
function remove_recent_comment_style() {
	global $wp_widget_factory;
	remove_action( 
            'wp_head', 
            array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) 
        );
}
add_action( 'widgets_init', 'remove_recent_comment_style' );


/*-----------------------------------------------------------------------------------------------------------------------*/
/* Wp Mu Image Support*/
/*-----------------------------------------------------------------------------------------------------------------------*/
function get_image_url() {
    $theImageSrc = wp_get_attachment_url(get_post_thumbnail_id($post_id));
    global $blog_id;
    if (isset($blog_id) && $blog_id > 0) {
        $imageParts = explode('/files/', $theImageSrc);
        if (isset($imageParts[1])) {
            $theImageSrc = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
        }
    }
    echo $theImageSrc;
}

/*-----------------------------------------------------------------------------------------------------------------------*/
/* Wp Mu Custom Meta Image Support*/
/*-----------------------------------------------------------------------------------------------------------------------*/
function get_image_path($cutommeta_image) {
$theImageSrc1 = $cutommeta_image;
global $blog_id;
if (isset($blog_id) && $blog_id > 0) {
    $imageParts = explode('/files/', $theImageSrc1);
    if (isset($imageParts[1])) {
        $theImageSrc1 = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
    }
}
return $theImageSrc1;
}



//Comment form
if( ! function_exists('themeofwp_comment_form') ){

function themeofwp_comment_form($args = array(), $post_id = null ){


    if ( null === $post_id )
        $post_id = get_the_ID();
    else
        $id = $post_id;

    $commenter = wp_get_current_commenter();
    $user = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';

    if ( ! isset( $args['format'] ) )
        $args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';


    $req      = get_option( 'require_name_email' );

    $aria_req = ( $req ? " aria-required='true'" : '' );

    $html5    = 'html5' === $args['format'];

    $fields   =  array(
        'author' => '
        <div class="form-group">
        <div class="col-sm-6 comment-form-author">
        <input   class="form-control"  id="author" 
        placeholder="' . __( 'Name', 'themeofwp' ) . '" name="author" type="text" 
        value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />
        </div>',


        'email'  => '<div class="col-sm-6 comment-form-email">
        <input id="email" class="form-control" name="email" 
        placeholder="' . __( 'Email', 'themeofwp' ) . '" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' 
        value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' />
        </div>
        </div>',
        

        'url'    => '<div class="form-group">
        <div class=" col-sm-12 comment-form-url">' .
        '<input  class="form-control" placeholder="'. __( 'Website', 'themeofwp' ) .'"  id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '"  />
        </div></div>',

        );

$required_text = sprintf( ' ' . __('Required fields are marked %s', 'themeofwp'), '<span class="required">*</span>' );

$defaults = array(
    'fields'               => apply_filters( 'comment_form_default_fields', $fields ),

    'comment_field'        => '
    <div class="form-group comment-form-comment">
    <div class="col-sm-12">
    <textarea class="form-control" id="comment" name="comment" placeholder="' . _x( 'Comment', 'noun', 'themeofwp' ) . '" rows="8" aria-required="true"></textarea>
    </div>
    </div>
    ',

    'must_log_in'          => '


    <div class="alert alert-danger must-log-in">' 
    . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) 
    . '</div>',

    'logged_in_as'         => '<div class="alert alert-info logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', themeofwp ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</div>',

    'comment_notes_before' => '<div class="alert alert-info comment-notes">' . __( 'Your email address will not be published.', 'themeofwp' ) . ( $req ? $required_text : '' ) . '</div>',

    'comment_notes_after'  => '<div class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'themeofwp' ), ' <code>' . allowed_tags() . '</code>' ) . '</div>',

    'id_form'              => 'commentform',

    'id_submit'            => 'submit',

    'title_reply'          => __( '<i class="fa fa-comments-o"></i> Leave a Reply', 'themeofwp' ),

    'title_reply_to'       => __( '<i class="fa fa-comments-o"></i> Leave a Reply to %s', 'themeofwp' ),

    'cancel_reply_link'    => __( 'Cancel reply', 'themeofwp' ),

    'label_submit'         => __( 'Post Comment', 'themeofwp' ),

    'format'               => 'xhtml',
    );


$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

if ( comments_open( $post_id ) ) { ?>

<?php do_action( 'comment_form_before' ); ?>

<div id="respond" class="comment-respond">

    <h3 id="reply-title" class="comment-reply-title">
        <?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?> 
        <small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small>
    </h3>

    <?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) { ?>

    <?php echo $args['must_log_in']; ?>

    <?php do_action( 'comment_form_must_log_in_after' ); ?>

    <?php } else { ?>

    <form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>" 
        class="form-horizontal comment-form"<?php echo $html5 ? ' novalidate' : ''; ?> role="form">
        <?php do_action( 'comment_form_top' ); ?>

        <?php if ( is_user_logged_in() ) { ?>

        <?php echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>

        <?php do_action( 'comment_form_logged_in_after', $commenter, $user_identity ); ?>

        <?php } else { ?>

        <?php echo $args['comment_notes_before']; ?>

        <?php

        do_action( 'comment_form_before_fields' );

        foreach ( (array) $args['fields'] as $name => $field ) {
            echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
        }

        do_action( 'comment_form_after_fields' );

    } 

    echo apply_filters( 'comment_form_field_comment', $args['comment_field'] ); 

    echo $args['comment_notes_after']; ?>

    <div class="form-submit">
        <input class="btn btn-default btn-lg" name="submit" type="submit" id="<?php echo esc_attr( $args['id_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" />
        <?php comment_id_fields( $post_id ); ?>
    </div>

    <?php do_action( 'comment_form', $post_id ); ?>

</form>

<?php } ?>

</div><!-- #respond -->
<?php do_action( 'comment_form_after' ); ?>
<?php } else { ?>
<?php do_action( 'comment_form_comments_closed' ); ?>
<?php } ?>
<?php


}

}


if( ! function_exists('themeofwp_post_password_form') ){

/**
 * post password form
 */

function themeofwp_post_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );

    $o = '
    <div class="row">
    <form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    <div class="col-lg-6">
    ' . __( "To view this protected post, enter the password below:", 'themeofwp' ) . '
    <div class="input-group">
    <input class="form-control" name="post_password" placeholder="' . __( "Password:", 'themeofwp' ) . '" id="' . $label . '" type="password" /><span class="input-group-btn"><button class="btn btn-info" type="submit" name="Submit">' . esc_attr__( "Submit", 'themeofwp' ) . '</button></span>
    </div><!-- /input-group -->
    </div><!-- /.col-lg-12 -->
    </form>
    </div>';
    return $o;
}

add_filter( 'the_password_form', 'themeofwp_post_password_form' );
}



if ( ! function_exists( 'themeofwp_the_attached_image' ) ) {
/**
 * Prints the attached image with a link to the next attached image.
 *
 *
 * @return void
 */
function themeofwp_the_attached_image() {
    $post                = get_post();
    $attachment_size     = array( 724, 724 );
    $next_attachment_url = wp_get_attachment_url();

    /**
     * Grab the IDs of all the image attachments in a gallery so we can get the URL
     * of the next adjacent image in a gallery, or the first image (if we're
     * looking at the last image in a gallery), or, in a gallery of one, just the
     * link to that image file.
     */
    $attachment_ids = get_posts( array(
        'post_parent'    => $post->post_parent,
        'fields'         => 'ids',
        'numberposts'    => -1,
        'post_status'    => 'inherit',
        'post_type'      => 'attachment',
        'post_mime_type' => 'image',
        'order'          => 'ASC',
        'orderby'        => 'menu_order ID'
        ) );

    // If there is more than 1 attachment in a gallery...
    if ( count( $attachment_ids ) > 1 ) {
        foreach ( $attachment_ids as $attachment_id ) {
            if ( $attachment_id == $post->ID ) {
                $next_id = current( $attachment_ids );
                break;
            }
        }

        // get the URL of the next image attachment...
        if ( $next_id )
            $next_attachment_url = get_attachment_link( $next_id );

        // or get the URL of the first image attachment.
        else
            $next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
    }

    printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
        esc_url( $next_attachment_url ),
        the_title_attribute( array( 'echo' => false ) ),
        wp_get_attachment_image( $post->ID, $attachment_size )
        );
}
}
