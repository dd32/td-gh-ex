<?php
define('THEME_DEFAULT_ADDRESS', '24 Hillside Gardens, Northwood');
define('THEME_DEFAULT_OPEN_HOURS', '10am-6pm, 7 days a week');
define('THEME_TEXT_COLOR', '#707070');
define('THEME_BRAND_COLOR', '#ef953e');
define('THEME_SECOND_BRAND_COLOR', '#753249');
define('THEME_THIRD_BRAND_COLOR', '#ea5455');
define('THEME_FOURTH_BRAND_COLOR', '#2e3f59');

/*
 * Set up the content width value based on the theme's design.
 *
 */
if (!isset($content_width))
    $content_width = 770;

/**
 * Add support for a custom header image.
 */
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/admin/customize.php';

/*
 * Artwork only works in WordPress 3.6 or later.
 */
if (version_compare($GLOBALS['wp_version'], '3.6-alpha', '<'))
    require get_template_directory() . '/inc/back-compat.php';

/**
 * Artwork setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * Artwork supports.
 *
 * @since Artwork 1.0
 */
function theme_setup() {
    /*
     * This theme styles the visual editor to resemble the theme style,
     * specifically font, colors, icons, and column width.
     */
    add_editor_style();
    /*
     * Makes Artwork available for translation.
     *
     * Translations can be added to the /languages/ directory.
     * If you're building a theme based on Artwork, use a find and
     * replace to change 'Artwork' to the name of your theme in all
     * template files.
     */
    load_theme_textdomain('artwork-lite', get_template_directory() . '/languages');
    $locale = get_locale();
    $locale_file = get_template_directory() . "/languages/$locale.php";

    if (is_readable($locale_file)) {
        require_once( $locale_file );
    }
    /*
     *  Adds RSS feed links to <head> for posts and comments.
     */
    add_theme_support('automatic-feed-links');
    /*
     * Supporting title tag via add_theme_support (since WordPress 4.1)
     */
    add_theme_support('title-tag');
    /*
     * This theme supports a variety of post formats.
     */
    add_theme_support('post-formats', array('aside', 'gallery', 'image', 'video', 'quote', 'audio', 'link', 'status',));
    /*
     *  This theme uses wp_nav_menu() in one location.
     */

    register_nav_menus(
            array(
                'primary' => __('Primary Menu', 'artwork-lite')
    ));

    /*
     * This theme uses its own gallery styles.
     */
    add_filter('use_default_gallery_style', '__return_false');

    /*
     * Add theme support post thumbnails.
     */

    if (function_exists('add_theme_support')) {
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(770, 578, true);
    }
    add_image_size('thumb-large', 1600, 900, true);
    add_image_size('thumb-large-blog', 1170, 543, true);
    add_image_size('thumb-medium', 960, 640, true);
}

add_action('after_setup_theme', 'theme_setup');

/**
 * Artwork page menu.
 *
 * Show pages of site.
 *
 * @since Artwork 1.0
 */
function theme_wp_page_menu() {
    echo '<ul class="sf-menu">';
    wp_list_pages(array('title_li' => '', 'depth' => 1));
    echo '</ul>';
}

/**
 * Artwork page top menu.
 *
 * Show pages of site.
 *
 * @since Artwork 1.0
 */
function theme_wp_page_short_menu() {
    echo'<ul id="menu-top-menu" class="menu">';
    $pages = wp_list_pages(array('title_li' => '', 'depth' => 1, 'echo' => 0));
    $pages = explode("</li>", $pages);
    $count = 0;
    foreach ($pages as $page) {
        $count++;
        echo $page;
        if ($count == 3) {
            break;
        }
    }
    echo '</ul>';
}

/* Return the Google font stylesheet URL, if available.
 *
 * The use of Open Sans by default is localized. 
 *
 * @since  1.0.0
 * @access public
 * @return void
 */

function theme_load_google_fonts() {
    wp_register_style('Roboto', 'https://fonts.googleapis.com/css?family=Roboto:400,300,700,300italic&subset=latin,cyrillic');
    wp_enqueue_style('Roboto');
}

add_action('wp_print_styles', 'theme_load_google_fonts');

/**
 * Enqueue scripts and styles for the front end.
 */
function theme_scripts_styles() {
    /*
     * Adds JavaScript to pages with the comment form to support
     * sites with threaded comments (when in use).
     */
    if (is_singular() && comments_open() && get_option('thread_comments'))
        wp_enqueue_script('comment-reply');
    /*
     *  Scripts for template masonry blog
     */
    wp_enqueue_script('jquery.infinitescroll', get_template_directory_uri() . '/js/jquery.infinitescroll.min.js', array('jquery'), '2.1.0', true);
    wp_enqueue_script('superfish.min', get_template_directory_uri() . '/js/superfish.min.js', array('jquery'), '1.7.5', true);
    wp_enqueue_script('jquery-labelauty', get_template_directory_uri() . '/js/jquery-labelauty.min.js', array('jquery',), '1.1', true);
    wp_enqueue_script('artwork-script', get_template_directory_uri() . '/js/artwork.min.js', array('jquery', 'superfish.min', 'jquery-labelauty', 'jquery.infinitescroll'), '1.0', true);

    $translation_array = array(
        'url' => get_template_directory_uri()
    );
    wp_localize_script('artwork-script', 'template_directory_uri', $translation_array);

    /*
     * Loads Artwork Styles
     */
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array('bootstrap'), '4.3.0', 'all');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.5', 'all');
    wp_enqueue_style('main', get_template_directory_uri() . '/css/artwork-style.min.css', array('bootstrap', 'font-awesome'), '1.0', 'all');

    if (is_plugin_active('motopress-content-editor/motopress-content-editor.php') || is_plugin_active('motopress-content-editor-lite/motopress-content-editor.php')) {
        wp_enqueue_style('artwork-ames-motopress', get_template_directory_uri() . '/css/artwork-motopress.min.css', array('bootstrap', 'font-awesome', 'main'), '1.0', 'all');
    }

    if (is_plugin_active('woocommerce/woocommerce.php')) {
        wp_enqueue_style('artwork-woocommerce', get_template_directory_uri() . '/css/artwork-woocommerce.min.css', array('bootstrap', 'font-awesome', 'main'), '1.0', 'all');
    }

    if (is_plugin_active('bbpress/bbpress.php')) {
        wp_enqueue_style('artwork-bbpress', get_template_directory_uri() . '/css/artwork-bbpress.min.css', array('bootstrap', 'font-awesome', 'main'), '1.0', 'all');
    }
    if (is_rtl()) {
        wp_enqueue_style('artwork-rtl', get_template_directory_uri() . '/css/artwork-rtl.min.css', array('bootstrap', 'font-awesome', 'main'), '1.0', 'all');
    }
    /*
     *  Loads our main stylesheet.
     */
    wp_enqueue_style('artwork-style', get_stylesheet_uri(), array(), '1.0');
}

add_action('wp_enqueue_scripts', 'theme_scripts_styles');

/**
 * Add favicon 
 */
add_action('wp_head', 'theme_favicon', 4);

/**
 * Title Tag backwards compatibility for older versions
 *
 */
if (!function_exists('_wp_render_title_tag')) {

    function theme_slug_render_title() {
        ?>
        <?php wp_title('|', true, 'right'); ?>     
        <?php
    }

    add_action('wp_head', 'theme_slug_render_title');
}

/**
 * Tells WordPress to load the favicon below other head inforamtion.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function theme_favicon() {
    if (!function_exists('has_site_icon')) :
        if (get_theme_mod('theme_favicon', false) === false) :
            ?> 
            <link rel="shortcut icon" href="<?php echo (get_template_directory_uri() . '/images/headers/favicon.png'); ?>" type="image/x-icon">
        <?php else: ?>
            <?php if (get_theme_mod('theme_favicon')) : ?> 
                <link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('theme_favicon')); ?>" type="image/x-icon">
            <?php endif; ?>
        <?php
        endif;
    else:
        if (!has_site_icon()) :
            ?>
            <link rel="shortcut icon" href="<?php echo (get_template_directory_uri() . '/images/headers/favicon.png'); ?>" type="image/x-icon">
            <?php
        endif;
    endif;
}

if (!function_exists('theme_content_nav')) :

    /**
     * Display navigation to next/previous pages when applicable.
     *
     * @since Artwork 1.0
     *
     * @param string $html_id The HTML id attribute.
     */
    function theme_content_nav($html_id) {
        global $wp_query;

        if ($wp_query->max_num_pages > 1) :
            ?>
            <nav id="<?php echo esc_attr($html_id); ?>" class="<?php echo esc_attr($html_id); ?>">
                <div class="nav-previous"><?php next_posts_link(__('<span class="meta-nav">&larr;</span> Older posts', 'artwork-lite')); ?></div>
                <div class="nav-next"><?php previous_posts_link(__('Newer posts <span class="meta-nav">&rarr;</span>', 'artwork-lite')); ?></div>
                <div class="clearfix"></div>
            </nav>
            <?php
        endif;
    }

endif;

/**
 * Register widget areas.
 *
 * @since Artwork 1.0
 * @access public
 * @return void
 */
function theme_widgets_init() {
    register_sidebar(array(
        'name' => __('Main Widget Area', 'artwork-lite'),
        'id' => 'sidebar-1',
        'description' => __('Appears on posts and pages in the sidebar.', 'artwork-lite'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'theme_widgets_init');


/*
 * Post comments
 */

function theme_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ('div' == $args['style']) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ('div' != $args['style']) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
            <div class="comment-description">
            <?php endif; ?>
            <div class="comment-author vcard">
                <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['avatar_size']); ?>            
            </div>
            <div class="comment-content">
                <?php printf('<h6 class="fn">%s</h6>', get_comment_author_link()); ?>
                <?php if ($comment->comment_approved == '0') : ?>
                    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'artwork-lite'); ?></em>
                    <br />
                <?php endif; ?>
                <div class="comment-meta brand-color date-post">
                    <?php
                    printf(__('%1$s <span>at %2$s</span>', 'artwork-lite'), get_comment_date('F j, Y'), get_comment_time());
                    ?>
                    <?php edit_comment_link(__('(Edit)', 'artwork-lite'), '  ', ''); ?>
                </div>
                <?php comment_text(); ?>

                <div class="reply">
                    <?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                </div>
                <?php if ('div' != $args['style']) : ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php
}

/*
 * Print HTML with meta information for the current post-date/time and author. *
 */

function theme_posted_on($post) {
    if (strcmp(get_post_type($post), 'post') === 0) {
        $archive_year = get_the_time('Y');
        $archive_month = get_the_time('m');
        $archive_day = get_the_time('d');
        printf('<span class="date-post"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>', esc_url(get_day_link($archive_year, $archive_month, $archive_day)), esc_attr(get_the_time()), esc_attr(get_the_date('c')), esc_html(get_the_date()));
    } else {
        printf('<span class="date-post"><time class="entry-date" datetime="%1$s">%2$s</time></span>', esc_attr(get_the_date('c')), esc_html(get_the_date()));
    }
}

/*
 * Get list term
 */

function theme_get_term_list($term_list) {
    foreach ($term_list as $term) {
        echo '<a href="' . get_term_link($term) . '">' . $term->name . '</a>';

        if ($term != end($term_list)) :
            echo ", ";
        endif;
    }
}

/*
 * Post Category
 */

function theme_post_category($post) {
    if (get_theme_mod('theme_show_categories', '1') === '1' || get_theme_mod('theme_show_categories')):
        if (strcmp(get_post_type($post), 'post') === 0) :
            ?>
            <?php $categories = get_the_category_list('<span>,</span> ', 'multiple', $post->ID); ?>
            <?php if (!empty($categories)) : ?>
                <span class="seporator">/</span>                         
                <span><?php _e('Posted in', 'artwork-lite'); ?></span> 
                <?php echo $categories; ?>
            <?php endif; ?>
            <?php
        else:
            $postTypeSlug = theme_get_post_type_slug();
            $postTypeSlugName = 'category_' . $postTypeSlug;
            $term_list = wp_get_post_terms($post->ID, $postTypeSlugName, array("fields" => "all"));
            ?>
            <?php if (!empty($term_list)) : ?>
                <span class="seporator">/</span>                         
                <span><?php _e('Posted in', 'artwork-lite'); ?></span> 
                <?php
                theme_get_term_list($term_list);
                ?>
            <?php endif; ?>
        <?php
        endif;
    endif;
}

/*
 * Post first Category
 */

function theme_post_first_category($post) {
    $category = get_the_category();
    if ($category) {
        echo '<a href="' . get_category_link($category[0]->term_id) . '" title="' . sprintf(__("View all posts in %s", 'artwork-lite'), $category[0]->name) . '" ' . ' class="category-wrapper">' . $category[0]->name . '</a> ';
    }
}

/*
 * Post Tag
 */

function theme_post_tag($post) {
    if (get_theme_mod('theme_show_tags', '1') === '1' || get_theme_mod('theme_show_tags')):

        if (strcmp(get_post_type($post), 'post') === 0) :
            the_tags('<span class="seporator">/</span> <span>' . __('Tagged with', 'artwork-lite') . '</span> ', '<span>,</span> ', '');
        else:
            $postTypeSlug = theme_get_post_type_slug();
            $postTypeSlugName = 'post_tag_' . $postTypeSlug;
            $term_list = wp_get_post_terms($post->ID, $postTypeSlugName, array("fields" => "all"));
            if (!empty($term_list)) :
                ?>
                <span class="seporator">/</span>                         
                <span><?php _e('Tagged with', 'artwork-lite'); ?></span> 
                <?php
                theme_get_term_list($term_list);
            endif;
        endif;
    endif;
}

/*
 * Post meta
 */

function theme_post_meta($post) {
    if (get_theme_mod('theme_show_meta', '1') === '1' || get_theme_mod('theme_show_meta') || get_theme_mod('theme_show_tags', '1') === '1' || get_theme_mod('theme_show_tags') || get_theme_mod('theme_show_categories', '1') === '1' || get_theme_mod('theme_show_categories')):
        ?>
        <footer class="entry-footer">
            <?php if (get_theme_mod('theme_show_meta', '1') === '1' || get_theme_mod('theme_show_meta')): ?>
                <div class="entry-meta">
                    <span class="author"><?php _e('Posted by', 'artwork-lite'); ?> </span><?php the_author_posts_link(); ?> 
                    <span class="seporator">/</span>
                    <?php theme_posted_on($post); ?>
                    <?php if (comments_open()) : ?>
                        <span class="seporator">/</span>
                        <a class="blog-icon underline" href="#comments" ><span><?php comments_number('0', '1', '%'); ?> <?php _e('Comments', 'artwork-lite'); ?></span></a>
                        <?php
                    endif;
                    theme_post_tag($post);
                    theme_post_category($post);
                    edit_post_link(__('Edit', 'artwork-lite'), '<span class="seporator">/</span> ', '');
                    ?>
                </div>   
            <?php endif; ?>
        </footer> 
        <?php
    endif;
}
/*
 *  Post related posts
 */
require get_template_directory() . '/inc/theme/post-related.php';
/*
 * Post gallery 
 */
require get_template_directory() . '/inc/theme/post-gallery.php';

/*
 * Post thumbnail 
 */

require get_template_directory() . '/inc/theme/post-thumbnail.php';
/*
 * The experts length 
 */

function theme_excerpt_length($length) {
    return 13;
}

add_filter('excerpt_length', 'theme_excerpt_length', 999);


include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
/*
 * Declare WooCommerce support
 */
add_action('after_setup_theme', 'theme_woocommerce_support');

function theme_woocommerce_support() {
    add_theme_support('woocommerce');
}

/*
 * Init woocommerce
 */

if (is_plugin_active('woocommerce/woocommerce.php')) {
    require get_template_directory() . '/inc/woocommerce/woo-init.php';
}

/*
 * Init motopress
 */
if (is_plugin_active('motopress-content-editor/motopress-content-editor.php') || is_plugin_active('motopress-content-editor-lite/motopress-content-editor.php')) {
    require get_template_directory() . '/inc/motopress/motopress-init.php';
}


function theme_get_first_embed_media($post_id) {
    $post = get_post($post_id);
    $content = do_shortcode(apply_filters('the_content', $post->post_content));
    $embeds = get_media_embedded_in_content($content);
    if (!empty($embeds)) {
        return '<div class="entry-media">' . $embeds[0] . '</div>';
    } else {
        return false;
    }
}

function theme_get_content_theme($contentLength) {
    ?>
    <?php
    $content = apply_filters('the_content', strip_shortcodes(get_the_content()));
    $content = wp_strip_all_tags($content);
    $content = wp_kses($content, array());
    $content = preg_replace('/<(script|style)(.*?)>(.*?)<\/(script|style)>/is', '', $content);
    if (strlen($content) > $contentLength) {
        $content = extension_loaded('mbstring') ? mb_substr($content, 0, $contentLength) . '...' : substr($content, 0, $contentLength) . '...';
    }
    echo $content;
    ?>
    <?php
}

function theme_get_post_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    if (!empty($matches[1])) {
        $first_img = $matches[1][0];
        if (empty($first_img)) {
            $first_img = "";
        }
    }
    return $first_img;
}

add_filter('wp_audio_shortcode', 'theme_audio_short_fix', 10, 5);

function theme_audio_short_fix($html, $atts, $audio, $post_id, $library) {
    $html = str_replace('visibility: hidden;', '', $html);
    return $html;
}

require get_template_directory() . '/inc/theme/tgm-init.php';

/*
 * Activate theme 
 */
require get_template_directory() . '/classes/theme/class-theme-install.php';

/*
 * Theme Wizared
 */
add_action('after_switch_theme', 'theme_artwork_activation');

function theme_artwork_activation() {
    $isThemeActivation = apply_filters('theme_activation', true);
    if ($isThemeActivation) {
        wp_redirect(esc_url(home_url('/wp-admin/admin.php?page=theme-setup')));
    }
}



function theme_posttype_name_sanitize_text($txt) {
    $txt = strip_tags($txt, '');
    $txt = preg_replace("/[^a-zA-Z0-9-]+/", "", $txt);
    $txt = substr(strtolower($txt), 0, 19);
    return wp_kses_post(force_balance_tags($txt));
}

/*
 * Get post type slug
 * 
 * @return string 
 */

function theme_get_post_type_slug() {
    $theme_post_type_slug = theme_posttype_name_sanitize_text(get_option('theme_post_type_slug'));
    if (empty($theme_post_type_slug)) {
        $theme_post_type_slug = "works";
    }
    return $theme_post_type_slug;
}

function theme_get_first_link() {
    if (!preg_match('/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', get_the_content(), $matches)) {
        return false;
    }
    return esc_url_raw($matches[1]);
}
