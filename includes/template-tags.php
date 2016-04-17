<?php
/*
================================================================================================
White Spektrum - template-tags.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other being functions.php). This file is used to maintain the extra functionality
and features for this theme. THe main file is the functions.php that contains the main functions
and features for this theme.

@package        White Spektrum WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://ninjablume.com/contact/
================================================================================================
*/

/*
================================================================================================
Table of Contents
================================================================================================
 1.0 - Social Navigation
 2.0 - Custom Widget Sidebars
 3.0 - Pagination
 4.0 - Custom FlexSlider
 5.0 - Entry Meta
================================================================================================
*/

/*
================================================================================================
2.0 - Custom Widget Sidebars
================================================================================================
*/
function white_spektrum_custom_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__( 'Primary Sidebar', 'white-spektrum' ),
        'id'            => 'post-content',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
        register_sidebar(array(
        'name'          => esc_html__( 'Secondary Sidebar', 'white-spektrum' ),
        'id'            => 'page-content',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__( 'Custom Content Sidebar', 'white-spektrum' ),
        'id'            => 'custom-content',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'white_spektrum_custom_widgets_init');



function white_spektrum_paging_navigation_setup() {
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
		'prev_text' => __( 'Previous', 'white-spektrum' ),
		'next_text' => __( 'Next', 'white-spektrum' ),
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




/*
================================================================================================
 5.0 - Entry Meta
================================================================================================
*/
function white_spektrum_entry_date() {
    printf(('%2$s by %3$s'), 'meta-prep meta-prep-author',
    sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
        get_permalink(),
        esc_attr( get_the_time() ),
        get_the_date('F d, Y')),
    sprintf( '<a class="url fn n" href="%1$s" title="%2$s">%3$s</a>',
    get_author_posts_url( get_the_author_meta( 'ID' ) ),
    esc_attr( sprintf( __( 'View all posts by %s', 'white-spektrum' ), get_the_author() ) ),
    get_the_author()
    ));
}

if (!function_exists('white_spektrum_entry_meta')) {
    function white_spektrum_entry_meta() {   
        if ( !is_page() && !post_password_required() && (comments_open() || get_comments_number())) {
            echo '<span class="comments-link"><i class="fa fa-comments"></i> ';
                comments_popup_link( sprintf( __( ' Leave a Comment', 'white-spektrum')));
            echo '</span>';
        }
    }
}


function white_spektrum_entry_taxonomies() {
    $cat_list = get_the_category_list(__(' | ', 'white-spektrum'));
    $tag_list = get_the_tag_list('', __(' | ', 'white-spektrum'));

    if ($cat_list) {
        printf('<div class="cat-link">%1$s <span class="cat-list"l>%2$s</span></div>',
        __('<span class="screen-reader-text"><i class="fa fa-folder-open-o"></i> Posted In</span>', 'white-spektrum'),  
        $cat_list  
        );
    }

    if ($tag_list) {
        printf('<div class="tag-link">%1$s <span class="tag-list">%2$s</span></div>',
        __('<span class="screen-reader-text"><i class="fa fa-tags"></i> Tagged</span>', 'white-spektrum'),  
        $tag_list 
        );
    }
}

