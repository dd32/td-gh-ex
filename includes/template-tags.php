<?php
/*******************************************************************************
 1.0 - Meta Posted On and Meta Posted In
 ******************************************************************************/
function barista_metadata_posted_on_setup(){
    // This function will call and output The Date and Author
    printf( __( '<i class="fa fa-calendar"></i>&nbsp;&nbsp;%2$s &nbsp;&nbsp;&nbsp; <i class = "fa fa-user"></i>&nbsp;&nbsp;%3$s', 'barista' ), 'meta-prep meta-prep-author',
    sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
        get_permalink(),
        esc_attr( get_the_time() ),
        get_the_date('m/d/Y')),
    sprintf( '<a class="url fn n" href="%1$s" title="%2$s">%3$s</a>',
    get_author_posts_url( get_the_author_meta( 'ID' ) ),
    esc_attr( sprintf( __( 'View all posts by %s', 'barista' ), get_the_author() ) ),
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
        _e('Comments Closed', 'barista');
    }
}

function barista_metadata_posted_in_setup() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
			$posted_in = __( '<i class = "fa fa-archive"></i>&nbsp;&nbsp; %1$s &nbsp;&nbsp;&nbsp;<i class="fa fa-tags"></i>&nbsp; %2$s', 'barista' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
			$posted_in = __( '<i class = "fa fa-archive"></i> %1$s', 'barista' );
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

/*******************************************************************************
 2.0 - Sidebar Widget Configuration
 ******************************************************************************/
function barista_widget_sidebar_setup(){
    register_sidebar(array(
        'name'              =>  __('Posts Content Sidebar', 'barista'),
        'id'                =>  'post-content',
        'description'       =>  __('Appears on Default Sidebar.', 'barista'),
        'before_widget'  => '<aside id = "%1$s" class = "widget %2$s">',
        'after_widget'   => '</aside>',
        'before_title'   => '<h3 class = "widget-title">',
        'after_title'    => '</h3>',
    ));
    
    register_sidebar(array(
        'name'              =>  __('Pages Content Sidebar', 'barista'),
        'id'                =>  'page-content',
        'description'       =>  __('Appears on Pages.', 'barista'),
        'before_widget'  => '<aside id = "%1$s" class = "widget %2$s">',
        'after_widget'   => '</aside>',
        'before_title'   => '<h3 class = "widget-title">',
        'after_title'    => '</h3>',
    ));
    
    register_sidebar(array(
        'name'              =>  __('Custom Content Sidebar', 'barista'),
        'id'                =>  'custom-content',
        'description'       =>  __('Appears on Pages with "Custom Sidebar" template.', 'barista'),
        'before_widget'  => '<aside id = "%1$s" class = "widget %2$s">',
        'after_widget'   => '</aside>',
        'before_title'   => '<h3 class = "widget-title">',
        'after_title'    => '</h3>',
    ));
}
add_action('widgets_init', 'barista_widget_sidebar_setup');

function barista_paging_navigation() {
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
		'prev_text' => __( 'Previous', 'barista' ),
		'next_text' => __( 'Next', 'barista' ),
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

function barista_social_menu(){
    if(has_nav_menu('social')){
        wp_nav_menu(array(
            'theme_location'    =>  'social',
            'container'         =>  'div',
            'container_id'      => 'menu-social',
            'container_class'     => 'menu-social',
            'menu_id'           => 'menu-social-items',
            'menu_class'        => 'menu-items',
            'depth'             => 1,
            'link_before'       => '<span class = "screen-reader-text cf">',
            'link_after'        => '</span>',
            'fallback_cb'       => '',
        ));
    };
}