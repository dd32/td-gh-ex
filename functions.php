<?php
function richwp_setup() {
    // Ready for translation 
    load_theme_textdomain('richwp', get_template_directory() . '/languages');
    
    // Visual editor - editor-style.css
    add_editor_style();
    
    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support('automatic-feed-links');
    
    // Post formats.
    add_theme_support('post-formats', array(
        'aside',
        'gallery',
        'link',
        'image',
        'quote',
        'status',
        'video',
        'audio',
        'chat'
    ));
    
    // Add Menus
    register_nav_menus(array(
        'shopselect1' => __('Select Menu', 'richwp'),
        'iconmenu' => __('Icon Menu', 'richwp'),
        'flyoutmenu' => __('Fly Out Menu', 'richwp'),
        'menufooter' => __('Footer Navigation', 'richwp')
    ));
    
    
    // This theme uses a custom image size for featured images
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form'
    ));
    set_post_thumbnail_size(450, 9999); // Unlimited height, soft crop
    add_image_size('fullwidthimage', 753, 9999);
    add_image_size('related-thumb', 90, 9999);
}

add_action('after_setup_theme', 'richwp_setup');

function richwp_scripts_styles() {
    wp_enqueue_style('richwp-style', get_stylesheet_uri());
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr-2.6.2.min.js', '', '1.0', false);
    wp_enqueue_script('jquery');
    wp_enqueue_script('plugins', get_template_directory_uri() . '/js/plugins.js', array(
        'jquery'
    ), '1.0', true);
}
add_action('wp_enqueue_scripts', 'richwp_scripts_styles');


// Prevent Video Resizing
if (!isset($content_width))
    $content_width = 753;

// Page Titles
function richwp_wp_title($title, $sep) {
    global $paged, $page;
    
    if (is_feed())
        return $title;
    
    // Add the site name.
    $title .= get_bloginfo('name');
    
    // Add the site description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && (is_home() || is_front_page()))
        $title = "$title $sep $site_description";
    
    // Add a page number if necessary.
    if ($paged >= 2 || $page >= 2)
        $title = "$title $sep " . sprintf(__('Page %s', 'richwp'), max($paged, $page));
    
    return $title;
}
add_filter('wp_title', 'richwp_wp_title', 10, 2);


// Ad Link to Customizer
function richwp_add_admin() {
    add_theme_page('richwp Options', __('RichWP Options', 'richwp'), 'edit_theme_options', 'customize.php');
}

add_action('admin_menu', 'richwp_add_admin');

// Options Page

if (!function_exists('rwp')):
    function rwp($name) {
        $default_theme_options = array(
            'logo' => '',
            'color1' => '#5359ad',
            'color2' => '#3f448c',
            'copyright' => '&copy; ' . date('Y') . ' <a href="' . home_url() . '">' . get_bloginfo('name') . '</a>'
        );
        
        $options = wp_parse_args(get_option('rwp'), $default_theme_options);
        
        return $options[$name];
    }
endif;

add_action('customize_register', 'richwp_customize_register');
function richwp_customize_register($wp_customize) {
    
    /* Logo, Title & Tagline */
    $wp_customize->remove_section('title_tagline');
    
    $wp_customize->add_section('rwp_logo', array(
        'title' => __('Title & Logo', 'richwp'),
        'priority' => 10
    ));
    
    $wp_customize->add_control('blogname', array(
        'label' => __('Site Title', 'richwp'),
        'section' => 'rwp_logo',
        'settings' => 'blogname',
        'priority' => 5
    ));
    
    $wp_customize->add_control('blogdescription', array(
        'label' => __('Tagline', 'richwp'),
        'section' => 'rwp_logo',
        'settings' => 'blogdescription',
        'priority' => 10
    ));
    
    $wp_customize->add_setting('rwp[logo]', array(
        'default' => rwp('logo'),
        'sanitize_callback' => 'esc_url_raw',
        'type' => 'option',
        'capability' => 'edit_theme_options'
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo', array(
        'label' => __('Logo Image', 'richwp'),
        'section' => 'rwp_logo',
        'settings' => 'rwp[logo]',
        'priority' => 20
    )));
    
    
    $wp_customize->add_section('rwp_colors', array(
        'title' => __('Colors', 'richwp'),
        'priority' => 100
    ));
    
    $wp_customize->add_setting('rwp[color1]', array(
        'default' => rwp('color1'),
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'option',
        'capability' => 'edit_theme_options'
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color1', array(
        'label' => __('Lead Color', 'richwp'),
        'section' => 'rwp_colors',
        'settings' => 'rwp[color1]',
        'priority' => 10
    )));
    
    $wp_customize->add_setting('rwp[color2]', array(
        'default' => rwp('color2'),
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'option',
        'capability' => 'edit_theme_options'
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color2', array(
        'label' => __('2. Lead Color', 'richwp'),
        'section' => 'rwp_colors',
        'settings' => 'rwp[color2]',
        'priority' => 20
    )));
    
    $wp_customize->add_section('rwp_misc', array(
        'title' => __('Misc.', 'richwp'),
        'priority' => 120
    ));
    
    
    $wp_customize->add_setting('rwp[copyright]', array(
        'default' => rwp('copyright'),
        'sanitize_callback' => 'sanitize_text_html',
        'type' => 'option',
        'capability' => 'edit_theme_options'
    ));
    
    $wp_customize->add_control('copyright', array(
        'label' => __('Copyright Notice in Footer', 'richwp'),
        'section' => 'rwp_misc',
        'settings' => 'rwp[copyright]',
        'priority' => 20
    ));
    
    
}

function sanitize_text_html( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function richwp_widgets_init() {
    
    // Area 1
    register_sidebar(array(
        'name' => 'Top Widget Area',
        'id' => 'top-widget-area',
        'description' => __('The Top widget area is perfect for sign up forms or banner ads. It will be displayed at the Top of all Postlists and Post detail pages.', 'richwp'),
        'before_widget' => '<li id="%1$s" class="footerboxes widget-container-bottom %2$s">',
        'after_widget' => "</li>",
        'before_title' => '<h3 class="widget-title-bottom">',
        'after_title' => '</h3>'
    ));
    
    
    // Area 2
    register_sidebar(array(
        'name' => 'Footer Widget Area',
        'id' => 'footer-widget-area',
        'description' => __('The Footer widget area is perfect for additional copyright information or listing your network or partner logos. It will be displayed on the bottom of the page below the footer navigation.', 'richwp'),
        'before_widget' => '<li id="%1$s" class="footerboxes widget-container-bottom %2$s">',
        'after_widget' => "</li>",
        'before_title' => '<h3 class="widget-title-bottom">',
        'after_title' => '</h3>'
    ));
    
    
    
    
}
add_action('widgets_init', 'richwp_widgets_init');

/* Add CSS */
function add_styles() {
    if (!function_exists('get_richicon_font')) {
        $richicon_font = array(
            'base' => get_template_directory_uri() . "/font/richicons",
            'version' => '53407999'
        );
    } else {
        $richicon_font = get_richicon_font();
    }
?>
<style type="text/css">
@font-face {
  font-family: 'richicons';
  src: url('<?php
    echo $richicon_font['base'] . ".eot?" . $richicon_font['version'];
?>');
  src: url('<?php
    echo $richicon_font['base'] . ".eot?" . $richicon_font['version'] . "#iefix";
?>') format('embedded-opentype'),
    url('<?php
    echo $richicon_font['base'] . ".woff?" . $richicon_font['version'];
?>') format('woff'),
    url('<?php
    echo $richicon_font['base'] . ".ttf?" . $richicon_font['version'];
?>') format('truetype'),
    url('<?php
    echo $richicon_font['base'] . ".svg?" . $richicon_font['version'] . "#richicons";
?>') format('svg');
    font-weight: normal;
    font-style: normal;
  }
a, a:hover, h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, h1.entry-title a:hover, .meta-nav a, .meta-nav a:hover, #respond .required, .widget-area a:hover, .footer-widget-area a:hover, #colophon a:hover, .nav-previous a span, .nav-next a span, .postformatlabel a span, .paginate a:hover, .paginate a:active, .paginate .current, #cancel-comment-reply-link{color:<?php
    echo rwp('color1');
?>;}  a.afflinkbutton, a:hover.styledbutton, a:hover.more-link, input[type="submit"]:hover#submit, input[type="submit"]:hover, .nav-below a:hover, .nav-previous a:hover, .nav-next a:hover{background:<?php
    echo rwp('color1');
?>;}  a:hover {color:<?php
    echo rwp('color2');
?>;} a.styledbutton, a.more-link, input[type="submit"]#submit, input[type="submit"], a:hover.afflinkbutton, .nav-below a, .nav-previous a, .nav-next a {background:<?php
    echo rwp('color2');
?>;} .archiveheader{border: 5px solid <?php
    echo rwp('color1');
?>;}</style>
<?php
}
add_action('wp_head', 'add_styles');

/* Excerpts */
function richwp_excerpt_length($length) {
    return 40;
}
add_filter('excerpt_length', 'richwp_excerpt_length');

/* Ellipse */

function richwp_continue_reading_link() {
    return ' ... <a class="styledbutton" href="' . get_permalink() . '">' . __('Read More', 'richwp') . '</a>';
}
function richwp_auto_excerpt_more($more) {
    return ' ... <a class="styledbutton" href="' . get_permalink() . '">' . __('Read More', 'richwp') . '</a>';
}

add_filter('excerpt_more', 'richwp_auto_excerpt_more');
function richwp_custom_excerpt_more($output) {
    if (has_excerpt() && !is_attachment()) {
        $output .= richwp_continue_reading_link();
    }
    return $output;
}
add_filter('get_the_excerpt', 'richwp_custom_excerpt_more');


add_filter('the_content_more_link', 'richwp_more_link', 10, 2);
function richwp_more_link($more_link, $more_link_text) {
    return str_replace($more_link_text, __('Read More ...', 'richwp'), $more_link);
}
?>
<?php
/* Comments */
if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
}
if (!function_exists('richwp_comment')):
    function richwp_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
?>
<?php
        if ('' == $comment->comment_type):
?>
<li <?php
            comment_class();
?> id="li-comment-<?php
            comment_ID();
?>">
<div id="comment-<?php
            comment_ID();
?>">
<div class="comment-author vcard">
<?php
            echo get_avatar($comment, 40);
?>
<?php
            printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>', 'richwp'), get_comment_author_link());
?></div>
<?php
            if ($comment->comment_approved == '0'):
?>
	<em><?php
                _e('Your comment is awaiting moderation.', 'richwp');
?></em><br />
<?php
            endif;
?>
<div class="comment-meta commentmetadata"><a href="<?php
            echo esc_url(get_comment_link($comment->comment_ID));
?>"><?php
            printf(__('%1$s at %2$s', 'richwp'), get_comment_date(), get_comment_time());
?></a><?php
            edit_comment_link(__('(Edit)', 'richwp'), '  ', '');
?></div>
<div class="comment-body"><?php
            comment_text();
?></div>
<div class="reply">
<?php
            comment_reply_link(array_merge($args, array(
                'depth' => $depth,
                'max_depth' => $args['max_depth']
            )));
?></div>
</div>
<?php
        else:
?>
<li class="post pingback">
<p><?php
            _e('Pingback: ', 'richwp');
?><?php
            comment_author_link();
?><?php
            edit_comment_link(__('edit', 'richwp'), '&nbsp;&nbsp;', '');
?></p>
<?php
        endif;
    }
endif;
?>