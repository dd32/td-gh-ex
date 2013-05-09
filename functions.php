<?php 
if( ! isset( $content_width ) )
    $content_width = 625;
function content_setup() {
    load_theme_textdomain( 'content', get_template_directory() . '/langs' );

    add_editor_style();

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 
        'post-formats', 
        array( 
            'aside', 
            'image', 
            'link', 
            'quote', 
            'status'
        )
    );

    register_nav_menu( 'menu', __( 'Main Menu', 'content' ) );

    add_theme_support( 'post-thumbnails' );

    set_post_thumbnail_size( 625, 9999 );
}
add_action( 'after_setup_theme', 'content_setup' );

function content_scripts_styles() {
    global $wp_styles;
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );
    wp_enqueue_script( 'Content-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );
    if ( 'off' !== _x( 'on', 'PT Sans  font: on or off', 'content' ) ) {
        $subsets = 'latin,latin-ext';
        $subset = _x( 'no-subset', 'PT Sans  font: add new subset (greek, cyrillic, vietnamese)', 'content' );
        if ( 'cyrillic' == $subset )
            $subsets .= ',cyrillic,cyrillic-ext';
        elseif ( 'greek' == $subset )
            $subsets .= ',greek,greek-ext';
        elseif ( 'vietnamese' == $subset )
            $subsets .= ',vietnamese';
        $protocol = is_ssl() ? 'https' : 'http';
        $query_args = array(
            'family' => 'PT+Sans:400italic,700italic,400,700',
            'subset' => $subsets,
        );
        wp_enqueue_style( 'Content-fonts', add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" ), array(), null );
    }
    wp_enqueue_style( 'Content-style', get_stylesheet_uri() );
    wp_enqueue_style( 'Content-ie', get_template_directory_uri() . '/css/ie.css', array( 'Content-style' ), '20130430' );
    $wp_styles->add_data( 'Content-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'content_scripts_styles' );

function content_wp_title( $title, $sep ) {
    global $paged, $page;
    if( is_feed() )
        return $title;
    $title .= get_bloginfo( 'name' );
    $site_description = get_bloginfo( 'description', 'display' );
    if( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";
    if( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'content' ), max( $paged, $page ) );
    return $title;
}
add_filter( 'wp_title', 'content_wp_title', 10, 2 );

function content_page_menu_args( $args ) {
    if( ! isset( $args['show_home'] ) )
        $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'content_page_menu_args' );

function content_widgets_init() {
    register_sidebar(
        array(
            'name' => __( 'Meta widget', 'content' ),
            'id' => 'sidebar-1',
            'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'content' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );
    register_sidebar(
        array(
            'name' => __( 'Tag Cloud widget', 'content' ),
            'id' => 'sidebar-2',
            'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'content' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );
    register_sidebar(
        array(
            'name' => __( 'Various widgets', 'content' ),
            'id' => 'sidebar-3',
            'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'content' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );
    register_sidebar(
        array(
            'name' => __( 'Search Form Widget Area', 'content' ),
            'id' => 'sidebar-4',
            'description' => __( 'Search Form Widget Area', 'content' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );
    register_sidebar(
        array(
            'name' => __( 'First Widget area in the footer', 'content' ),
            'id' => 'sidebar-5',
            'description' => __( 'First Widget area in the footer', 'content' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );
    register_sidebar(
        array(
            'name' => __( 'Second Widget area in the footer', 'content' ),
            'id' => 'sidebar-6',
            'description' => __( 'Second Widget area in the footer', 'content' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );
    register_sidebar(
        array(
            'name' => __( 'Third Widget area in the footer', 'content' ),
            'id' => 'sidebar-7',
            'description' => __( 'Third Widget area in the footer', 'content' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );
}
add_action( 'widgets_init', 'content_widgets_init' );

if( ! function_exists( 'content_content_nav' ) ) : 
function content_content_nav($nav_id) {
    global $wp_query;
    $html_id = esc_attr($nav_id);
    if( $wp_query->max_num_pages > 1 ) : ?>
        <nav id="<?php echo $nav_id; ?>" class="navigation">
            <h3 class="accessibility"><?php _e( 'Post navigation', 'content' ); ?></h3>
            <ul>
                <li class="prev-link alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'content' )); ?></li>
                <li class="next-link alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'content' )); ?></li>
            </ul>
        </nav>
    <?php endif;
}
endif;

if( ! function_exists( 'content_comment' ) ) : 
function content_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ($comment->comment_type) :
        case 'pingback' :
        case 'trackback' : ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <p><?php _e( 'Pingback:', 'content' ); comment_author_link(); edit_comment_link( __( 'Edit', 'content' ), '<span class="edit-link">', '</span>' ); ?></p>
    <?php break;
        default :
        global $post; ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <article id="comment-<?php comment_ID(); ?>" class="comment">
            <header class="comment-meta comment-author vcard">
                <?php echo get_avatar( $comment, 44 );
                    printf( '<cite class="fn">%1$s %2$s</cite>',
                        get_comment_author_link(), (
                        $comment->user_id === $post->post_author) ? '<span> ' . __( 'Post author', 'content' ) . '</span>' : ''
                    );
                    printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
                        esc_url( get_comment_link( $comment->comment_ID ) ),
                        get_comment_time( 'c' ),
                        sprintf( __( '%1$s at %2$s', 'content' ), get_comment_date(), get_comment_time() )
                    ); ?>
            </header>
            <?php if( '0' == $comment->comment_approved ) : ?>
                <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'content' ); ?></p>
            <?php endif; ?>
            <section class="comment-content comment">
                <?php comment_text();
                edit_comment_link( __( 'Edit', 'content' ), '<p class="edit-link">', '</p>' ); ?>
            </section>
            <div class="reply">
                <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'content' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div>
        </article>
    <?php break;
    endswitch;
}
endif;

if( ! function_exists( 'content_entry_meta' ) ) :
function content_entry_meta() {
    $categories_list = get_the_category_list( __( ', ', 'content' ) );
    $tag_list = get_the_tag_list( '', __( ', ', 'content' ) );
    $date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="post-date" datetime="%3$s">%4$s</time></a>',
        esc_url( get_permalink() ),
        esc_attr( get_the_time() ),
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() )
    );
    $author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        esc_attr( sprintf( __( 'View all posts by %s', 'content' ), get_the_author() ) ),
        get_the_author()
    );
    if( $tag_list ) {
        $utility_text = __( '<p class="cats">Categories: %1$s</p><p class="tags">Tags: %2$s</p><p class="date">%3$s</p> <p class="by-author">Author %4$s</p>', 'content' );
    } elseif( $categories_list ) {
        $utility_text = __( '<p class="cats">Categories: %1$s</p><p class="tags">%3$s</p><p class="by-author">Author: %4$s</p>', 'content' );
    } else {
        $utility_text = __( '%3$s <p class="by-author">Author: %4$s</p>', 'content' );
    }
    printf(
        $utility_text,
        $categories_list,
        $tag_list,
        $date,
        $author
    );
}
endif;

add_filter ( 'post_class' , 'alt_post_class' );
global $current_class;
$current_class = 'current';
function alt_post_class ( $alt_classes ) { 
   global $current_class;
   $alt_classes[] = $current_class;
   $current_class = ( $current_class == 'current' ) ? 'clearing' : 'current';
   return $alt_classes;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'custom_trim_excerpt');


function content_body_class( $classes ) {
    $background_color = get_background_color();
    if( ! is_page_template( 'page-templates/full-width.php' ) ) {
        foreach( $classes as $key => $value ) {
            if( $value == 'full-width' ) unset( $classes[$key] );
        }
    }
    if( is_page_template( 'page-templates/front-page.php' ) ) {
        $classes[] = 'template-front-page';
        if( has_post_thumbnail() )
            $classes[] = 'has-post-thumbnail';
    }
    if( empty( $background_color ) )
        $classes[] = 'custom-background-empty';
    elseif( in_array( $background_color, array( 'fff', 'a73511' ) ) )
        $classes[] = 'custom-background-white';
    if( wp_style_is( 'Content-fonts', 'queue' ) )
        $classes[] = 'custom-font-enabled';
    if( ! is_multi_author() )
        $classes[] = 'single-author';
    return $classes;
}
add_filter( 'body_class', 'content_body_class' );

function content_content_width() {
    if( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
        global $content_width;
        $content_width = 960;
    }
}
add_action( 'template_redirect', 'content_content_width' );

function content_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}
add_action( 'customize_register', 'content_customize_register' );

function content_customize_preview_js() {
    wp_enqueue_script( 'Content-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20120827', TRUE );
}
add_action( 'customize_preview_init', 'content_customize_preview_js' );