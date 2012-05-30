<?php
if ( ! isset( $content_width ) )
	$content_width = 584;
function batik_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a> <span class="by-author"> <span class="sep"> by </span> <span class="author vcard"> <a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'batik' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'batik' ), get_the_author() ),
		esc_html( get_the_author() )
	);
}

        $options = get_option('batik_theme_options');	
	define('HEADER_TEXTCOLOR', '');
        define('HEADER_IMAGE', '%s/images/default-logo.png'); // %s is the template dir uri
        define('HEADER_IMAGE_WIDTH', 300); // use width and height appropriate for your theme
        define('HEADER_IMAGE_HEIGHT', 100);

        define('NO_HEADER_TEXT', true);
        function batik_admin_header_style() {
            ?><style type="text/css">
                #headimg {
                    border: none !important;
                    width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
                    height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
                }
            </style><?php
        }
function batik_takberjudul($title) {if ($title == '') {return 'Untitled';} else {return $title;}}
function batik_widgets_init() {
register_sidebar(array(
'name' => __('sidebar-right','batik'),
'description' => __('sidebar right area', 'batik'),
'before_widget' => '<div class="clear"></div><div class="space-2">',
'after_widget' => '</div>',
'before_title' => '<h3>',
'after_title' => '</h3>'
));
register_sidebar(array(
'name' => __('coloumn-one','batik'),
'description' => __('sidebar right column1', 'batik'),
'before_widget' => '<div class="space">',
'after_widget' => '</div>',
'before_title' => '<h3>',
'after_title' => '</h3>'
));
register_sidebar(array(
'name' => __('coloumn-two','batik'),
'description' => __('sidebar right column2', 'batik'),
'before_widget' => '<div class="space-2">',
'after_widget' => '</div>',
'before_title' => '<h3>',
'after_title' => '</h3>'
));
register_sidebar(array(
'name' => __('footer left','batik'),
'description' => __('footer left area', 'batik'),
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3>'
));
register_sidebar(array(
'name' => __('footer midlle','batik'),
'description' => __('footer midle area', 'batik'),
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3>'
));
register_sidebar(array(
'name' => __('footer right','batik'),
'description' => __('fotter right area', 'batik'),
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3>'
));		
}
function batik_breadcrumb() {
    $amdhas = '<span>&#8250;</span>';
    $name = 'Home'; //'Home' link
    $currentBefore = '<span class="current">';
    $currentAfter = '</span>';
    echo '<div class="breadcrumb">';
    global $post;
    $home = home_url();
    echo '<a href="' . $home . '">' . $name . '</a> ';
    if (!is_home())
        echo $amdhas . ' ';
    if (is_category()) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0)
            echo(get_category_parents($parentCat, TRUE, ' ' . $amdhas . ' '));
        echo $currentBefore . 'Archive by category &#39;';
        single_cat_title();
        echo '&#39;' . $currentAfter;
    } elseif (is_day()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $amdhas . ' ';
        echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $amdhas . ' ';
        echo $currentBefore . get_the_time('d') . $currentAfter;
    } elseif (is_month()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $amdhas . ' ';
        echo $currentBefore . get_the_time('F') . $currentAfter;
    } elseif (is_year()) {
        echo $currentBefore . get_the_time('Y') . $currentAfter;
    } elseif (is_single()) {
        $cat = get_the_category();
        $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $amdhas . ' ');
        echo $currentBefore;
        the_title();
        echo $currentAfter;
    } elseif (is_page() && !$post->post_parent) {
        echo $currentBefore;
        the_title();
        echo $currentAfter;
    } elseif (is_page() && $post->post_parent) {
        $parent_id = $post->post_parent;
        $breadcrumb_lists = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumb_lists[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
            $parent_id = $page->post_parent;
        }
        $breadcrumb_lists = array_reverse($breadcrumb_lists);
        foreach ($breadcrumb_lists as $crumb)
            echo $crumb . ' ' . $amdhas . ' ';
        echo $currentBefore;
        the_title();
        echo $currentAfter;
    } elseif (is_search()) {
        echo $currentBefore . 'Search results for &#39;' . get_search_query() . '&#39;' . $currentAfter;
    } elseif (is_tag()) {
        echo $currentBefore . 'Posts tagged &#39;';
        single_tag_title();
        echo '&#39;' . $currentAfter;
    } elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;
    } elseif (is_404()) {
        echo $currentBefore . 'Error 404' . $currentAfter;
    }

    if (get_query_var('paged')) {
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ' (';
        echo __('Page','batik') . ' ' . get_query_var('paged');
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ')';
    }

    echo '</div>';
}

function batik_excerpt_length( $length ) {
	return 100;
}
function batik_continue_reading_link() {
	return '<span class="read-more"><a href="'. esc_url(get_permalink()) . '">' . __( 'Read more &raquo;', 'batik' ) . '</a></span>';
}
function batik_excerpt_more( $more ) {
	return ' &hellip;' . batik_continue_reading_link();
}
function batik_enqueue_scripts_styles( ) {
        wp_enqueue_style( 'default', get_template_directory_uri() . '/style.css', array(), '0.0.3');
}
function batik_content_nav() {
	global $wp_query;
	$paged			=	( get_query_var( 'paged' ) ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link	=	get_pagenum_link();
	$url_parts		=	parse_url( $pagenum_link );
	$format			=	( get_option('permalink_structure') ) ? user_trailingslashit('page/%#%', 'paged') : '?paged=%#%';
	
	if ( isset($url_parts['query']) ) {
		$pagenum_link	=	"{$url_parts['scheme']}://{$url_parts['host']}{$url_parts['path']}%_%?{$url_parts['query']}";
	} else {
		$pagenum_link	.=	'%_%';
	}
	
	$links	=	paginate_links( array(
		'base'		=>	$pagenum_link,
		'format'	=>	$format,
		'total'		=>	$wp_query->max_num_pages,
		'current'	=>	$paged,
		'mid_size'	=>	2,
		'type'		=>	'list'
	) );
	
	if ( $links ) {
		echo "<nav class=\"navi\">{$links}</nav>";
	}
}
function batik_enqueue_comment_reply() {
    if ( is_singular() && comments_open() && get_option('thread_comments')) { 
            wp_enqueue_script('comment-reply'); 
        }
    }