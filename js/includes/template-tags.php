<?php
/*
================================================================================================
Beyond Expectations - template-tags.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other being functions.php). This file is used to maintain the main functionality 
and features for this theme. The main file is the functions.php that contains the main functions 
and features for this theme.

@package        Beyond Expectations WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://ninjablume.com/contact/
@since          0.0.1
================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
1.0 - Metadata Posted On
2.0 - Metadata Posted In
3.0 - Custom Widget Sidebars
4.0 - Pagination Navigation
5.0 - Social Navigation
================================================================================================
*/

/*
================================================================================================
1.0 - Metadata Posted On
================================================================================================
*/
 function beyond_expectations_metadata_posted_on_setup(){
    // This function will call and output The Date and Author
    printf(('<i class="fa fa-calendar"></i>%2$s <i class="fa fa-user"></i>%3$s'), 'meta-prep meta-prep-author',
    sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
        get_permalink(),
        esc_attr( get_the_time() ),
        get_the_date('m/d/Y')),
    sprintf( '<a class="url fn n" href="%1$s" title="%2$s">%3$s</a>',
    get_author_posts_url( get_the_author_meta( 'ID' ) ),
    esc_attr( sprintf( __( 'View all posts by %s', 'beyond-expectations' ), get_the_author() ) ),
    get_the_author()
    ));

    // This function will only display when sticky post is enabled!
    if (is_sticky()){
        echo '<i class="fa fa-thumb-tack sticky"></i>' . __('Sticky Post', 'beyond-expectations');
    } 

    // This function will call and output Comments
    printf('<i class="fa fa-comments"></i>'); 
    if (comments_open()) {
        comments_popup_link('Add Comment','1 Comment','% Comments');
    }
    else {
        _e('Comments Closed', 'beyond-expectations');
    }
    
     if (is_user_logged_in()) { ?>
         <i class="fa fa-pencil"></i>
    <?php
        edit_post_link( __( 'Edit', 'beyond-expectations' ), '<span class="edit-link">', '</span>' );
     }
}

/*
================================================================================================
2.0 - Metadata Posted In
================================================================================================
*/
function beyond_expectations_metadata_posted_in_setup() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
        $posted_in = '';
	if ( $tag_list ) {
			$posted_in = '<i class = "fa fa-archive"></i>%1$s<i class="fa fa-tags"></i>%2$s';
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
			$posted_in = '<i class = "fa fa-archive"></i>%1$s';
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

/*
================================================================================================
3.0 - Custom Widget Sidebars
================================================================================================
*/
if (!function_exists('beyond_expectations_custom_widgets_init_setup')) {
    function beyond_expectations_custom_widgets_init_setup() {
        register_sidebar(array(
            'name'          => __( 'Primary Sidebar', 'beyond-expectations' ),
            'id'            => 'primary-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ));
        
        register_sidebar(array(
        'name'          => __( 'Secondary Sidebar', 'beyond-expectations' ),
        'id'            => 'secondary-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
        ));
        
        register_sidebar(array(
        'name'          => __( 'Custom Sidebar', 'beyond-expectations' ),
        'id'            => 'custom-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
        ));
    }
    add_action('widgets_init', 'beyond_expectations_custom_widgets_init_setup');
}


/*
================================================================================================
4.0 - Pagination Navigation
================================================================================================
*/
if (!function_exists('beyond_expectations_paging_navigation_setup')) {
    function beyond_expectations_paging_navigation_setup() {
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
            'prev_text' => __( 'Previous', 'beyond-expectations' ),
            'next_text' => __( 'Next', 'beyond-expectations' ),
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
}

/*
================================================================================================
5.0 - Social Navigation
================================================================================================
*/
if (!function_exists('beyond_expectations_social_navigation_setup')) {
    function beyond_expectations_social_navigation_setup() {
        if(has_nav_menu('social-navigation')){
            wp_nav_menu(array(
                'theme_location'    =>  'social-navigation',
                'container'         =>  'div',
                'container_id'      => 'menu-social',
                'container_class'     => 'menu-social',
                'menu_id'           => 'menu-social-items',
                'menu_class'        => 'menu-items',
                'depth'             => 1,
                'link_before'       => '<span class="screen-reader-text">',
                'link_after'        => '</span>',
                'fallback_cb'       => '',
            ));
        };
    }
}