<?php
add_theme_support('post-thumbnails');
	$args = array();
	$header_args = array( 
	    'default-image'          => '',
		'default-repeat' => 'no-repeat',
        'default-text-color'     => '2C2C2C',
		'url'                    => '',
        'width'                  => 1920,
        'height'                 => 89,
        'flex-height'            => true
     );
	add_theme_support( 'custom-background', $args );
	add_theme_support( 'custom-header', $header_args );
	add_theme_support( 'automatic-feed-links' );//
	add_theme_support('nav_menus');//
	add_theme_support( "title-tag" );//
	add_editor_style("editor-style.css");
	if ( !isset( $content_width ) ) $content_width = 1170;	
function ascreen_custom_scripts()
{
	global $is_IE;
	$theme_info = wp_get_theme();
		
	wp_enqueue_style('ascreen-main', get_stylesheet_uri(), array(), $theme_info->get( 'Version' ) );	
	wp_enqueue_script('ascreen-jquery-js', get_template_directory_uri().'/js/j.1.1.3.js', array( 'jquery' ), '2.1.2', false );	
	//wp_enqueue_script('ascreen-main-js', get_template_directory_uri().'/js/main.js', array( 'jquery' ), '2.1.2', false );			
		
}

add_action( 'wp_enqueue_scripts', 'ascreen_custom_scripts' );


/*
add widgets to wp-admin
*/
function ascreen_widgets_init() {

	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar',
		'before_widget' => '<div class="sidebar-section"><ul class="blog-category">
',
		'after_widget' => '</ul></div> <!-- end .sidebar-section -->',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );

	
	register_sidebar( array(
		'name' => 'Footer Area #1',
		'id' => 'sidebar-1',
		'before_widget' => '<dl id="%1$s" class="%2$s">',
		'after_widget' => '</dl>',
		'before_title' => '<dt class="title">',
		'after_title' => '</dt>',
	) );

	register_sidebar( array(
		'name' => 'Footer Area #2',
		'id' => 'sidebar-2',
		'before_widget' => '<dl id="%1$s" class="%2$s">',
		'after_widget' => '</dl>',
		'before_title' => '<dt class="title">',
		'after_title' => '</dt>',
	) );

	register_sidebar( array(
		'name' => 'Footer Area #3',
		'id' => 'sidebar-3',
		'before_widget' => '<dl id="%1$s" class=" %2$s">',
		'after_widget' => '</dl>',
		'before_title' => '<dt class="title">',
		'after_title' => '</dt>',
	) );

	register_sidebar( array(
		'name' => 'Footer Area #4',
		'id' => 'sidebar-4',
		'before_widget' => '<dl id="%1$s" class=" %2$s">',
		'after_widget' => '</dl>',
		'before_title' => '<dt class="title">',
		'after_title' => '</dt>',
	) );


	
	
}
add_action( 'widgets_init', 'ascreen_widgets_init' );

function ascreen_paging_nav(){
	global $wp_query;
	$pages = $wp_query->max_num_pages; 
	if ( $pages >= 2 ): 
		$big = 999999999; 
		$paginate = paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'end_size' => 13, 
			'type' => 'array' 
			));
		echo '<div class="ct_page_nav"><ul class="pagination">';
		foreach ($paginate as $value)
		{
			echo '<li>'.$value.'</li>';
		}
		echo '</ul></div>';
	endif;
}


function ascreen_better_comments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
?>	
 
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <article id="comment-<?php comment_ID(); ?>" class="comment-body">
            <div class="comment_avatar">
                <?php echo get_avatar($comment, $size = '45', $default = get_stylesheet_directory_uri().'/images/default-avatars.png' ); ?>
            </div>

            <div class="comment_postinfo">
                <?php printf(__('<cite class="fn">%s</cite> <span class="says"> on </span>','ascreen'), get_comment_author_link()) ?>
                <span class="comment_date"><?php printf(__('%1$s at %2$s','ascreen'), get_comment_date(),  get_comment_time()) ?></span><?php edit_comment_link(__('(Edit)','ascreen'),'  ','') ?>
            </div> <!-- .comment_postinfo -->

            <div class="comment_area">				
                <div class="comment-content clearfix">
                	<?php if ($comment->comment_approved == '0') : ?>
                     	<em><?php _e('Your comment is awaiting moderation.','ascreen') ?></em>
                     	<br />
                    <?php endif; ?>
                    
                    <?php comment_text() ?>
                    
                    
                    <div class="reply-container">
                        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                    </div>
                      
                </div> <!-- end comment-content-->
            </div> <!-- end comment_area-->
        </article> <!-- .comment-body -->
        
<?php
}