<?php
function minimum_minimal_setup() {
    // Ready for translation 
    load_theme_textdomain('minimum-minimal', get_template_directory() . '/languages');
    
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
        'shopselect1' => __('Select Menu', 'minimum-minimal'),
        'iconmenu' => __('Icon Menu', 'minimum-minimal'),
        'flyoutmenu' => __('Fly Out Menu', 'minimum-minimal'),
        'menufooter' => __('Footer Navigation', 'minimum-minimal')
    ));
    
    
    // This theme uses a custom image size for featured images
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form'
    ));
    set_post_thumbnail_size(450, 9999); // Unlimited height, soft crop
    add_image_size('minimum-minimal-fullwidthimage', 753, 9999);
}

if ( ! function_exists( 'minimum_minimal_fonts_url' ) ) :
function minimum_minimal_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'minimum-minimal' ) ) {
		$fonts[] = 'Roboto:300,500';
	}

	/* translators: If there are characters in your language that are not supported by Roboto Slap, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto Slap font: on or off', 'minimum-minimal' ) ) {
		$fonts[] = 'Roboto Slab:300';
	}


	/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'minimum-minimal' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

add_action('after_setup_theme', 'minimum_minimal_setup');

function minimum_minimal_scripts_styles() {
	wp_enqueue_style( 'minimum-minimal-fonts', minimum_minimal_fonts_url(), array(), null );
    wp_enqueue_style('minimum-minimal-style', get_stylesheet_uri());
    wp_enqueue_script('minimum-minimal-modernizr', get_template_directory_uri() . '/js/modernizr-2.6.2.min.js', '', '1.0', false);
    wp_enqueue_script('minimum-minimal-plugins', get_template_directory_uri() . '/js/plugins.js', array(
        'jquery'
    ), '1.0', true);
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_scripts', 'minimum_minimal_scripts_styles');





// Prevent Video Resizing
if (!isset($content_width))
    $content_width = 753;

// Page Titles
function minimum_minimal_wp_title($title, $sep) {
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
        $title = "$title $sep " . sprintf(__('Page %s', 'minimum-minimal'), max($paged, $page));
    
    return $title;
}
add_filter('wp_title', 'minimum_minimal_wp_title', 10, 2);


// Ad Link to Customizer
function minimum_minimal_add_admin() {
    add_theme_page('Minimum Minimal Options', __('Minimum Minimal Options', 'minimum-minimal'), 'edit_theme_options', 'customize.php');
}

add_action('admin_menu', 'minimum_minimal_add_admin');

// Options Page

if (!function_exists('minimumminimaloptions')):
    function minimumminimaloptions($name) {
        $default_theme_options = array(
            'logo' => '',
            'color1' => '#5359ad',
            'color2' => '#3f448c',
            'copyright' => '&copy; ' . date('Y') . ' <a href="' . home_url() . '">' . get_bloginfo('name') . '</a>'
        );
        
        $options = wp_parse_args(get_option('minimumminimaloptions'), $default_theme_options);
        
        return $options[$name];
    }
endif;

add_action('customize_register', 'minimum_minimal_customize_register');
function minimum_minimal_customize_register($wp_customize) {
    
    /* Logo, Title & Tagline */
    $wp_customize->remove_section('title_tagline');
    
    $wp_customize->add_section('minimumminimaloptions_logo', array(
        'title' => __('Title & Logo', 'minimum-minimal'),
        'priority' => 10
    ));
    
    $wp_customize->add_control('blogname', array(
        'label' => __('Site Title', 'minimum-minimal'),
        'section' => 'minimumminimaloptions_logo',
        'settings' => 'blogname',
        'priority' => 5
    ));
    
    $wp_customize->add_control('blogdescription', array(
        'label' => __('Tagline', 'minimum-minimal'),
        'section' => 'minimumminimaloptions_logo',
        'settings' => 'blogdescription',
        'priority' => 10
    ));
    
    $wp_customize->add_setting('minimumminimaloptions[logo]', array(
        'default' => minimumminimaloptions('logo'),
        'sanitize_callback' => 'esc_url_raw',
        'type' => 'option',
        'capability' => 'edit_theme_options'
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo', array(
        'label' => __('Logo Image', 'minimum-minimal'),
        'section' => 'minimumminimaloptions_logo',
        'settings' => 'minimumminimaloptions[logo]',
        'priority' => 20
    )));
    
    
    $wp_customize->add_section('minimumminimaloptions_colors', array(
        'title' => __('Colors', 'minimum-minimal'),
        'priority' => 100
    ));
    
    $wp_customize->add_setting('minimumminimaloptions[color1]', array(
        'default' => minimumminimaloptions('color1'),
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'option',
        'capability' => 'edit_theme_options'
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color1', array(
        'label' => __('Lead Color', 'minimum-minimal'),
        'section' => 'minimumminimaloptions_colors',
        'settings' => 'minimumminimaloptions[color1]',
        'priority' => 10
    )));
    
    $wp_customize->add_setting('minimumminimaloptions[color2]', array(
        'default' => minimumminimaloptions('color2'),
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'option',
        'capability' => 'edit_theme_options'
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color2', array(
        'label' => __('2. Lead Color', 'minimum-minimal'),
        'section' => 'minimumminimaloptions_colors',
        'settings' => 'minimumminimaloptions[color2]',
        'priority' => 20
    )));
    
    $wp_customize->add_section('minimumminimaloptions_misc', array(
        'title' => __('Misc.', 'minimum-minimal'),
        'priority' => 120
    ));
    
    
    $wp_customize->add_setting('minimumminimaloptions[copyright]', array(
        'default' => minimumminimaloptions('copyright'),
        'sanitize_callback' => 'sanitize_text_html',
        'type' => 'option',
        'capability' => 'edit_theme_options'
    ));
    
    $wp_customize->add_control('copyright', array(
        'label' => __('Copyright Notice in Footer', 'minimum-minimal'),
        'section' => 'minimumminimaloptions_misc',
        'settings' => 'minimumminimaloptions[copyright]',
        'priority' => 20
    ));
    
    
}

function sanitize_text_html( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function minimum_minimal_widgets_init() {
    
    // Area 1
    register_sidebar(array(
        'name' => 'Top Widget Area',
        'id' => 'top-widget-area',
        'description' => __('The Top widget area is perfect for sign up forms or banner ads. It will be displayed at the Top of all Postlists and Post detail pages.', 'minimum-minimal'),
        'before_widget' => '<li id="%1$s" class="footerboxes widget-container-bottom %2$s">',
        'after_widget' => "</li>",
        'before_title' => '<h3 class="widget-title-bottom">',
        'after_title' => '</h3>'
    ));
    
    
    // Area 2
    register_sidebar(array(
        'name' => 'Footer Widget Area',
        'id' => 'footer-widget-area',
        'description' => __('The Footer widget area is perfect for additional copyright information or listing your network or partner logos. It will be displayed on the bottom of the page below the footer navigation.', 'minimum-minimal'),
        'before_widget' => '<li id="%1$s" class="footerboxes widget-container-bottom %2$s">',
        'after_widget' => "</li>",
        'before_title' => '<h3 class="widget-title-bottom">',
        'after_title' => '</h3>'
    ));
    
    
    
    
}
add_action('widgets_init', 'minimum_minimal_widgets_init');

/* Add CSS */
function minimum_minimal_add_styles() {
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
    echo minimumminimaloptions('color1');
?>;}  a.afflinkbutton, a:hover.styledbutton, a:hover.more-link, input[type="submit"]:hover#submit, input[type="submit"]:hover, .nav-below a:hover, .nav-previous a:hover, .nav-next a:hover{background:<?php
    echo minimumminimaloptions('color1');
?>;}  a:hover {color:<?php
    echo minimumminimaloptions('color2');
?>;} a.styledbutton, a.more-link, input[type="submit"]#submit, input[type="submit"], a:hover.afflinkbutton, .nav-below a, .nav-previous a, .nav-next a {background:<?php
    echo minimumminimaloptions('color2');
?>;} .archiveheader{border: 5px solid <?php
    echo minimumminimaloptions('color1');
?>;}</style>
<?php
}
add_action ('wp_head', 'minimum_minimal_add_styles', null );

/* Excerpts */
function minimum_minimal_excerpt_length($length) {
    return 40;
}
add_filter('excerpt_length', 'minimum_minimal_excerpt_length');

/* Ellipse */

function minimum_minimal_continue_reading_link() {
    return ' ... <a class="styledbutton" href="' . get_permalink() . '">' . __('Read More', 'minimum-minimal') . '</a>';
}
function minimum_minimal_auto_excerpt_more($more) {
    return ' ... <a class="styledbutton" href="' . get_permalink() . '">' . __('Read More', 'minimum-minimal') . '</a>';
}

add_filter('excerpt_more', 'minimum_minimal_auto_excerpt_more');
function minimum_minimal_custom_excerpt_more($output) {
    if (has_excerpt() && !is_attachment()) {
        $output .= minimum_minimal_continue_reading_link();
    }
    return $output;
}
add_filter('get_the_excerpt', 'minimum_minimal_custom_excerpt_more');


add_filter('the_content_more_link', 'minimum_minimal_more_link', 10, 2);
function minimum_minimal_more_link($more_link, $more_link_text) {
    return str_replace($more_link_text, __('Read More ...', 'minimum-minimal'), $more_link);
}

/*  Comment Nav */
if ( ! function_exists( 'minimum-minimal_comment_nav' ) ) :

function minimum_minimal_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'minimum-minimal' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'minimum-minimal' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'minimum-minimal' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}
endif;

?>