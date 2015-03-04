<?php
function silverquantum_scripts_setup() {
    wp_enqueue_style('silverquantum-style', get_stylesheet_uri());
    wp_enqueue_style('silverquantum-ubuntu', 'http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic');
    wp_enqueue_style('silverquantum-font-awesome', get_stylesheet_directory_uri() . '/extras/font-awesome/css/font-awesome.css', '03042015', true);
    
    if (is_singular() && comments_open() && get_option('thread_comments'))
            wp_enqueue_script( 'comment-reply' );
}
add_action('wp_enqueue_scripts', 'silverquantum_scripts_setup');

if (function_exists('silverquantum_theme_setup')){
    function silverquantum_theme_setup() {
        global $content_width;
        
        if (!isset($content_width))
            $content_width = 680;
        
        // Title Tag
        add_theme_support('title-tag');
        
        // Automatic Feed Links
        add_theme_support('automatic-feed-links');
        
        // Support Search Form in HTML5 format
        add_theme_support( 'html5', array('search-form') );
        
        // Custom Background
        add_theme_support('custom-background');

        // Register Navigation Menu
        register_nav_menu('primary-navigation', __('Primary Navigation', 'silverquantum') );
        
        add_editor_style();
        
        // Enable Featured Image
        add_theme_support('post-thumbnails');
        add_image_size('azulsilver-small-thumbnail', 150, 150, true);
        add_image_size('azulsilver-medium-thumbnail', 680, 150, true);
        add_image_size('azulsilver-large-thumbnail', 960, 200, true);
        
    }
    add_action('after_setup_theme', 'silverquantum_theme_setup');
}

//Register Post Sidebar, Page Sidebar, and Custom Sidebar
function silverquantum_widget_sidebar_setup(){
    
    //Register Sidebar for Post Only
    register_sidebar(array(
       'name'           => __('Primary Sidebar', 'silverquantum'),
       'id'             => 'post-content',
       'description'    => __('Appears on Posts Only', 'silverquantum'),
       'before_widget'  => '<li id = "%1$s class = "%1$s">',
       'after_widget'   => '</li>',
       'before_title'   => '<h3 class = "widget-title">',
       'after_title'    => '</h3>',
    ));
	
    //Register Sidebar for Page Only
    register_sidebar(array(
       'name'           => __('Secondary Sidebar', 'silverquantum'),
       'id'             => 'page-content',
       'description'    => __('Appears on Pages Only', 'silverquantum'),
       'before_widget'  => '<li id = "%1$s class = "%1$s">',
       'after_widget'   => '</li>',
       'before_title'   => '<h3 class = "widget-title">',
       'after_title'    => '</h3>',
    ));
	
    //Register Sidebar for Page Only
    register_sidebar(array(
       'name'           => __('Custom Sidebar', 'silverquantum'),
       'id'             => 'custom-content',
       'description'    => __('Appear on Custom Pages Only', 'silverquantum'),
       'before_widget'  => '<li id = "%1$s class = "%1$s">',
       'after_widget'   => '</li>',
       'before_title'   => '<h3 class = "widget-title">',
       'after_title'    => '</h3>',
    ));
    
}
add_action('widgets_init', 'silverquantum_widget_sidebar_setup');

function silverquantum_metadata_posted_on_setup(){
    // This function will call and output The Date and Author
    printf( __( '<i class="fa fa-calendar"></i>&nbsp;&nbsp;%2$s &nbsp;&nbsp;&nbsp; <i class = "fa fa-user"></i>&nbsp;&nbsp;%3$s', 'silverquantum' ), 'meta-prep meta-prep-author',
    sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
        get_permalink(),
        esc_attr( get_the_time() ),
        get_the_date('m/d/Y')),
    sprintf( '<a class="url fn n" href="%1$s" title="%2$s">%3$s</a>',
    get_author_posts_url( get_the_author_meta( 'ID' ) ),
    esc_attr( sprintf( __( 'View all posts by %s', 'silverquantum' ), get_the_author() ) ),
    get_the_author()
    ));

    // This function will only display when sticky post is enabled!
    if (is_sticky()){
        echo '&nbsp;&nbsp;&nbsp; <i class="fa fa-thumb-tack sticky"></i>&nbsp;&nbsp;Sticky Post';
    } 
    
    if (has_post_thumbnail()){
        echo'&nbsp;&nbsp;&nbsp; <i class="fa fa-bookmark"></i>&nbsp;&nbsp; Featured Image';
    }

    // This function will call and output Comments
    printf('&nbsp;&nbsp;&nbsp; <i class = "fa fa-comments"></i>&nbsp;&nbsp;'); 
    if (comments_open()) {
        comments_popup_link('Add Comment','1 Comment','% Comments');
    }
    else {
        _e('Comments Closed', 'silverquantum');
    }
}

function silverquantum_metadata_posted_in_setup() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
			$posted_in = __( '<i class = "fa fa-archive"></i>&nbsp;&nbsp; %1$s &nbsp;&nbsp;&nbsp;<i class="fa fa-tags"></i>&nbsp; %2$s', 'silverquantum' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
			$posted_in = __( '<i class = "fa fa-archive"></i> %1$s', 'silverquantum' );
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

function silverquantum_paging_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 2,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( 'Previous', 'silverquantum' ),
		'next_text' => __( 'Next', 'silverquantum' ),
                'type'      => 'list',
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation" role="navigation">
			<?php echo $links; ?>
	</nav><!-- .navigation -->
	<?php
	endif;
}

?>