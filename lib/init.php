<?php
function backyard_setup() {
// Register wp_nav_menu() menus (http://codex.wordpress.org/Function_Reference/register_nav_menus)
  register_nav_menus(array(
    'primary_navigation'    => __('Primary Navigation', 'backyard'),
  ));
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size( 'backyard-widget-thumb', 80, 50, true );
  add_image_size('backyard-related-post', 230, 166, true);
  add_image_size('backyard-featured-categories', 263, 190, true );
  add_image_size('backyard-popular-thumb', 256, 151, true );
  add_image_size('backyard-post-thumb', 750, 387, true );
  add_image_size('backyard-full-grid', 550, 350, true );
  add_theme_support( 'automatic-feed-links' );
  add_editor_style(array('editor-style.css', backyard_google_web_fonts_url()));

  add_theme_support( 'html5', array(
		'gallery', 'caption'
	) );

$args = array(
        'default-text-color' => 'e1a232',
        'default-image' => '',
        'height' => 250,
        'width' => 1060,
        'max-width' => 2000,
        'flex-height' => true,
        'flex-width' => true,
        'random-default' => false,
        'wp-head-callback' =>'backyard_header_style',
       
    );
add_theme_support('custom-logo', array(
'height' => 100,
'width' => 300,
'flex-width' => true,
'flex-height' => true,
));
add_theme_support('custom-header', apply_filters('backyard_custom_header_args',$args));
add_theme_support( 'custom-background', $args);
}
add_action('after_setup_theme', 'backyard_setup');

//* Add custom body class to the head
add_filter('body_class', 'backyard_sp_body_class');
function backyard_sp_body_class( $classes ) {
	if (!is_front_page() || is_home())
		$classes[] = 'inner-page';
		return $classes;
}
/*Start Content Limit Function*/
/*End Content Limit Function*/
/*Start Search Form Hook*/
function backyard_search_form($form) {
$form = '<form role="search" method="get" id="search-widget" class="search-widget" action="'.esc_url(home_url('/')).'" >
<input class="form-control" type="text" value="'.get_search_query().'" name="s" id="s" placeholder="'.esc_attr__('Search','backyard').'"/>
<button type="submit"> <i class="fa fa-search"></i></button>
</form>';
return $form;
}
add_filter( 'get_search_form', 'backyard_search_form');
/*End Search Form Hook*/

if(!function_exists('backyard_comment_nav')) :
function backyard_comment_nav() {
    // Are there comments to navigate through?
    if ( get_comment_pages_count() > 1 && get_option('page_comments') ) :
    ?>
    <nav class="navigation comment-navigation" role="navigation">
        <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'backyard' ); ?></h2>
        <div class="nav-links">
            <?php
                if ( $prev_link = get_previous_comments_link( esc_html_e( 'Older Comments', 'backyard' ) ) ) :
                    printf( '<div class="nav-previous">%s</div>', esc_html($prev_link) );
                endif;
 
                if ( $next_link = get_next_comments_link( esc_html_e( 'Newer Comments', 'backyard' ) ) ) :
                    printf( '<div class="nav-next">%s</div>', esc_html($next_link) );
                endif;
            ?>
        </div><!-- .nav-links -->
    </nav><!-- .comment-navigation -->
    <?php
    endif;
}
endif;

//Content Width
function backyard_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'backyard_content_width', 770);
}
add_action('after_setup_theme', 'backyard_content_width', 0);

if ( ! function_exists( 'backyard_header_style' ) ) :
function backyard_header_style() {
    $text_color = esc_html(get_header_textcolor());
	$get_background_color=esc_html(get_background_color());
	$get_header_image=get_header_image();
	$get_background_image=get_background_image();
    ?>
    <style type="text/css">
    <?php if (!display_header_text() ) : ?>
        #logo a{font-family: 'Playfair Display', serif;font-size: 44px;text-transform: uppercase;color: #e1a232;letter-spacing: 4px;line-height: 45px;-webkit-transition: all 0.2s ease;-moz-transition: all 0.2s ease;-o-transition: all 0.2s ease;-ms-transition: all 0.2s ease;}
    <?php else : ?>
        #logo a{font-family: 'Playfair Display', serif;font-size: 44px;text-transform: uppercase;color: #<?php echo esc_html($text_color); ?>;letter-spacing: 4px;line-height: 45px;-webkit-transition: all 0.2s ease;-moz-transition: all 0.2s ease;-o-transition: all 0.2s ease;-ms-transition: all 0.2s ease;}
    <?php endif; ?>
	<?php
	if($get_background_color!=='')
{?>
	body.custom-background{background-color:<?php echo '#'.esc_html($get_background_color);?>;}
<?php }
if($get_header_image!=='')
{?>
	.header-main{ background-image:url(<?php echo esc_url($get_header_image);?>); background-size:cover; background-position:50% 50%; background-repeat:no-repeat;}
<?php }
if($get_background_image!=='')
{?>
	body.custom-background{ background-image:url(<?php echo esc_url($get_background_image);?>); background-repeat:<?php echo esc_html(get_theme_mod('background_repeat'));?>; background-attachment:<?php echo esc_html(get_theme_mod('background_attachment'));?>; background-position-x:<?php echo esc_html(get_theme_mod('background_position_x'));?>; background-size:cover;}
<?php }
	?>
	
    </style>
<?php }

 endif; ?>