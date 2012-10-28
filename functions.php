<?php
    /**

    * @package Artblog
    * @author  Simon Hansen
    * @since Artblog 1.0
    */

    /**
    * Set the content width based on the theme's design and stylesheet.
    *
    * Used to set the width of images and content. Should be equal to the width the theme
    * is designed for, generally via the style.css stylesheet.
    */
    if ( ! isset( $content_width ) )
        $content_width = 650;

    /** Tell WordPress to run artblog_setup() when the 'after_setup_theme' hook is run. */
    add_action( 'after_setup_theme', 'artblog_setup' );

    if ( ! function_exists( 'artblog_setup' ) ):
        /**
        * Sets up theme defaults and registers support for various WordPress features.
        *
        * Note that this function is hooked into the after_setup_theme hook, which runs
        * before the init hook. The init hook is too late for some features, such as indicating
        * support post thumbnails.
        *
        * To override artblog_setup() in a child theme, add your own artblog_setup to your child theme's
        * functions.php file.
        *
        * @uses add_theme_support() To add support for post thumbnails and automatic feed links. And custom header
        * @uses register_nav_menus() To add support for navigation menus.
        * @uses add_custom_background() To add support for a custom background.
        * @uses add_editor_style() To style the visual editor.
        * @uses load_theme_textdomain() For translation/localization support.
        * @uses register_default_headers() To register the default custom header images provided with the theme.
        * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
        *
        */



        function artblog_setup() {


            // This theme styles the visual editor with editor-style.css to match the theme style.
            add_editor_style();

            // Post Format support. You can also use the legacy "gallery" or "asides" (note the plural) categories.
            add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

            // This theme uses post thumbnails
            add_theme_support( 'post-thumbnails' );

            // Add default posts and comments RSS feed links to head
            add_theme_support( 'automatic-feed-links' );

            // Make theme available for translation
            // Translations can be filed in the /languages/ directory
            load_theme_textdomain( 'artblog', get_template_directory() . '/languages' );

            $locale = get_locale();

            $locale_file = get_template_directory() . "/languages/$locale.php";
            if ( is_readable( $locale_file ) )
                require_once( $locale_file );

            // This theme uses wp_nav_menu() in one location.
            register_nav_menus( array(
                'primary' => __( 'Primary Navigation', 'artblog' ),
            ) );

            // This theme allows users to set a custom background
            //add_custom_background();

            // Your changeable header business starts here
            if ( ! defined( 'HEADER_TEXTCOLOR' ) )
                define( 'HEADER_TEXTCOLOR', '' );

            // No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
            if ( ! defined( 'HEADER_IMAGE' ) )
                define( 'HEADER_IMAGE', '%s/images/headers/ugle.jpg' );

            // The height and width of your custom header. You can hook into the theme's own filters to change these values.
            // Add a filter to artblog_header_image_width and artblog_header_image_height to change these values.
            define( 'HEADER_IMAGE_WIDTH', apply_filters( 'artblog_header_image_width', 200 ) );
            define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'artblog_header_image_height', 200) );

            // We'll be using post thumbnails for custom header images on posts and pages.
            // We want them to be 940 pixels wide by 198 pixels tall.
            // Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
            set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

            // Don't support text inside the header image.
            if ( ! defined( 'NO_HEADER_TEXT' ) )
                define( 'NO_HEADER_TEXT', true );

            // Add a way for the custom header to be styled in the admin panel that controls
            // custom headers. See artblog_admin_header_style(), below.
        
         
            $defaults = array(
                'default-image'          => '',
                'random-default'         => false,
                'width'                  => 0,
                'height'                 => 0,
                'flex-height'            => false,
                'flex-width'             => false,
                'default-text-color'     => '',
                'header-text'            => true,
                'uploads'                => true,
                'wp-head-callback'       => '',
                'admin-head-callback'    => '',
                'admin-preview-callback' => '',
            );


                add_theme_support( 'custom-header',$defaults );





            // ... and thus ends the changeable header business.

            // Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
            register_default_headers( array(
                'berries' => array(
                    'url' => '%s/images/headers/ugle.jpg',
                    'thumbnail_url' => '%s/images/headers/ugle-thumbnail.jpg',
                    /* translators: header image description */
                    'description' => __( 'Berries', 'artblog' )
                )
            ) );
        }
        endif;

    if ( ! function_exists( 'artblog_admin_header_style' ) ) :
        /**
        *
        *
        */
        function artblog_admin_header_style() {
        ?>
        <style type="text/css">
            /* Shows the same border as on front end */
            #headimg {
                border-bottom: 1px solid #000;
                border-top: 4px solid #000;
            }
            /* If NO_HEADER_TEXT is false, you would style the text with these selectors:
            #headimg #name { }
            #headimg #desc { }
            */
        </style>
        <?php
        }
        endif;

    /**
    * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
    *
    * To override this in a child theme, remove the filter and optionally add
    * your own function tied to the wp_page_menu_args filter hook.
    *
    */
    function artblog_page_menu_args( $args ) {
        $args['show_home'] = true;
        return $args;
    }
    add_filter( 'wp_page_menu_args', 'artblog_page_menu_args' );

    /**
    * Sets the post excerpt length to 40 characters.
    *
    * To override this length in a child theme, remove the filter and add your own
    * function tied to the excerpt_length filter hook.
    *
    * @return int
    */
    function artblog_excerpt_length( $length ) {
        return 40;
    }
    add_filter( 'excerpt_length', 'artblog_excerpt_length' );

    /**
    * Returns a "Continue Reading" link for excerpts
    *
    * @return string "Continue Reading" link
    */
    function artblog_continue_reading_link() {
        return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'artblog' ) . '</a>';
    }

    /**
    * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and artblog_continue_reading_link().
    *
    * To override this in a child theme, remove the filter and add your own
    * function tied to the excerpt_more filter hook.
    *
    * @return string An ellipsis
    */
    function artblog_auto_excerpt_more( $more ) {
        return ' &hellip;' . artblog_continue_reading_link();
    }
    add_filter( 'excerpt_more', 'artblog_auto_excerpt_more' );

    /**
    * Adds a pretty "Continue Reading" link to custom post excerpts.
    *
    * To override this link in a child theme, remove the filter and add your own
    * function tied to the get_the_excerpt filter hook.
    *
    * @return string Excerpt with a pretty "Continue Reading" link
    */
    function artblog_custom_excerpt_more( $output ) {
        if ( has_excerpt() && ! is_attachment() ) {
            $output .= artblog_continue_reading_link();
        }
        return $output;
    }
    add_filter( 'get_the_excerpt', 'artblog_custom_excerpt_more' );

    /**
    * Remove inline styles printed when the gallery shortcode is used.
    *
    * Galleries are styled by the theme in Artblog's style.css. This is just
    * a simple filter call that tells WordPress to not use the default styles.
    *
    */
    add_filter( 'use_default_gallery_style', '__return_false' );

    /**
    * Deprecated way to remove inline styles printed when the gallery shortcode is used.
    *
    * This function is no longer needed or used. Use the use_default_gallery_style
    * filter instead, as seen above.
    *
    *
    * @return string The gallery style filter, with the styles themselves removed.
    */
    function artblog_remove_gallery_css( $css ) {
        return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
    }
    // Backwards compatibility with WordPress 3.0.
    if ( version_compare( $GLOBALS['wp_version'], '3.1', '<' ) )
        add_filter( 'gallery_style', 'artblog_remove_gallery_css' );

    if ( ! function_exists( 'artblog_comment' ) ) :
        /**
        * Template for comments and pingbacks.
        *
        * To override this walker in a child theme without modifying the comments template
        * simply create your own artblog_comment(), and that function will be used instead.
        *
        * Used as a callback by wp_list_comments() for displaying the comments.
        *
        */
        function artblog_comment( $comment, $args, $depth ) {
            $GLOBALS['comment'] = $comment;
            switch ( $comment->comment_type ) :
            case '' :
            ?>
            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
            <div id="comment-<?php comment_ID(); ?>">
                <div class="comment-author vcard">
                    <?php echo get_avatar( $comment, 40 ); ?>
                    <?php printf( __( '%s <span class="says">says:</span>', 'artblog' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
                </div><!-- .comment-author .vcard -->
                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'artblog' ); ?></em>
                    <br />
                    <?php endif; ?>

                <div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                        <?php
                            /* translators: 1: date, 2: time */
                        printf( __( '%1$s at %2$s', 'artblog' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'artblog' ), ' ' );
                    ?>
                </div><!-- .comment-meta .commentmetadata -->

                <div class="comment-body"><?php comment_text(); ?></div>

                <div class="reply">
                    <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div><!-- .reply -->
            </div><!-- #comment-##  -->

            <?php
                break;
            case 'pingback'  :
            case 'trackback' :
            ?>
            <li class="post pingback">
            <p><?php _e( 'Pingback:', 'artblog' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'artblog' ), ' ' ); ?></p>
            <?php
                break;
                endswitch;
        }
        endif;

    /**
    * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
    *
    * To override artblog_widgets_init() in a child theme, remove the action hook and add your own
    * function tied to the init hook.
    *
    * @uses register_sidebar
    */
    function artblog_widgets_init() {
        // Area 1, located at the top of the sidebar.
        register_sidebar( array(
            'name' => __( 'Primary Widget Area', 'artblog' ),
            'id' => 'primary-widget-area',
            'description' => __( 'The primary widget area', 'artblog' ),
            'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ) );

        // Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
        register_sidebar( array(
            'name' => __( 'Secondary Widget Area', 'artblog' ),
            'id' => 'secondary-widget-area',
            'description' => __( 'The secondary widget area', 'artblog' ),
            'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ) );

        // Area 3, located in the footer. Empty by default.
        register_sidebar( array(
            'name' => __( 'First Footer Widget Area', 'artblog' ),
            'id' => 'first-footer-widget-area',
            'description' => __( 'The first footer widget area', 'artblog' ),
            'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ) );

        // Area 4, located in the footer. Empty by default.
        register_sidebar( array(
            'name' => __( 'Second Footer Widget Area', 'artblog' ),
            'id' => 'second-footer-widget-area',
            'description' => __( 'The second footer widget area', 'artblog' ),
            'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ) );

        // Area 5, located in the footer. Empty by default.
        register_sidebar( array(
            'name' => __( 'Third Footer Widget Area', 'artblog' ),
            'id' => 'third-footer-widget-area',
            'description' => __( 'The third footer widget area', 'artblog' ),
            'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ) );

        // Area 6, located in the footer. Empty by default.
        register_sidebar( array(
            'name' => __( 'Fourth Footer Widget Area', 'artblog' ),
            'id' => 'fourth-footer-widget-area',
            'description' => __( 'The fourth footer widget area', 'artblog' ),
            'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ) );





    }
    /** Register sidebars by running artblog_widgets_init() on the widgets_init hook. */
    add_action( 'widgets_init', 'artblog_widgets_init' );

    /**
    * Removes the default styles that are packaged with the Recent Comments widget.
    *
    * To override this in a child theme, remove the filter and optionally add your own
    * function tied to the widgets_init action hook.
    *
    *
    */
    function artblog_remove_recent_comments_style() {
        add_filter( 'show_recent_comments_widget_style', '__return_false' );
    }
    add_action( 'widgets_init', 'artblog_remove_recent_comments_style' );

    if ( ! function_exists( 'artblog_posted_on' ) ) :
        /**
        * Prints HTML with meta information for the current post-date/time and author.
        *
        */
        function artblog_posted_on() {
            printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'artblog' ),
                'meta-prep meta-prep-author',
                sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
                    get_permalink(),
                    esc_attr( get_the_time() ),
                    get_the_date()
                ),
                sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
                    get_author_posts_url( get_the_author_meta( 'ID' ) ),
                    esc_attr( sprintf( __( 'View all posts by %s', 'artblog' ), get_the_author() ) ),
                    get_the_author()
                )
            );
        }
        endif;

    if ( ! function_exists( 'artblog_posted_in' ) ) :
        /**
        * Prints HTML with meta information for the current post (category, tags and permalink).
        *
        */
        function artblog_posted_in() {
            // Retrieves tag list of current post, separated by commas.
            $tag_list = get_the_tag_list( '', ', ' );
            if ( $tag_list ) {
                $posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'artblog' );
            } elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
                $posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'artblog' );
            } else {
                $posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'artblog' );
            }
            // Prints the string, replacing the placeholders.
            printf(
                $posted_in,
                get_the_category_list( ', ' ),
                $tag_list,
                get_permalink(),
                the_title_attribute( 'echo=0' )
            );
        }
        endif;
