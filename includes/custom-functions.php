<?php
function better_comments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
?>	
 
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <article id="comment-<?php comment_ID(); ?>" class="comment-body">
            <div class="comment_avatar">
                <?php echo get_avatar($comment, $size = '45', $default = get_stylesheet_directory_uri().'/images/default-avatars.png' ); ?>
            </div>

            <div class="comment_postinfo">
                <?php printf(__('<cite class="fn">%s</cite> <span class="says"> on </span>','Acool'), get_comment_author_link()) ?>
                <span class="comment_date"><?php printf(__('%1$s at %2$s','Acool'), get_comment_date(),  get_comment_time()) ?></span><?php edit_comment_link(__('(Edit)','Acool'),'  ','') ?>
            </div> <!-- .comment_postinfo -->

            <div class="comment_area">				
                <div class="comment-content clearfix">
                	<?php if ($comment->comment_approved == '0') : ?>
                     	<em><?php _e('Your comment is awaiting moderation.','Acool') ?></em>
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

   /**
 * acool favicon
 */

function acool_favicon()
{
	$url =  of_get_option('favicon');
	
	$icon_link = "";
	if($url)
	{
		$type = "image/x-icon";
		if(strpos($url,'.png' )) $type = "image/png";
		if(strpos($url,'.gif' )) $type = "image/gif";
	
		$icon_link = '<link rel="icon" href="'.esc_url($url).'" type="'.$type.'">';
	}
	
	echo $icon_link;
}

add_action( 'wp_head', 'acool_favicon' );

/**
 * Gets option value from the single theme option, stored as an array in the database
 * if all options stored in one row.
 * Stores the serialized array with theme options into the global variable on the first function run on the page.
 *
 * If options are stored as separate rows in database, it simply uses get_option() function.
 *
 * @param string $option_name Theme option name.
 * @param string $default_value Default value that should be set if the theme option isn't set.
 * @param string $used_for_object "Object" name that should be translated into corresponding "object" if WPML is activated.
 * @return mixed Theme option value or false if not found.
 */
if ( ! function_exists( 'ct_get_option' ) ){
	function ct_get_option( $ct_row,$option_name )
	{				
		$arr =  get_option($ct_row);
		$option_value     = sanitize_text_field($arr[$option_name]);

		return $option_value;
	}
}


/*
add widgets to wp-admin
*/
function ct_widgets_init() {
	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="ct_widget %2$s">',
		'after_widget' => '</div> <!-- end .ct_widget -->',
		'before_title' => '<h4 class="ct_widget_title">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => 'Footer Area #1',
		'id' => 'sidebar-2',
		'before_widget' => '<div id="footerwidgets" class="col-xs-12 col-sm-6 col-lg-3"><div id="%1$s" class="ioftsc-lt %2$s">',
		'after_widget' => '</div></div> <!-- end .fwidget -->',
		'before_title' => '<span class="title">',
		'after_title' => '</span>',
	) );

	register_sidebar( array(
		'name' => 'Footer Area #2',
		'id' => 'sidebar-3',
		'before_widget' => '<div id="footerwidgets" class="col-xs-12 col-sm-6 col-lg-3"><div id="%1$s" class="ioftsc-lt %2$s">',
		'after_widget' => '</div></div> <!-- end .fwidget -->',
		'before_title' => '<span>',
		'after_title' => '</span>',
	) );

	register_sidebar( array(
		'name' => 'Footer Area #3',
		'id' => 'sidebar-4',
		'before_widget' => '<div id="footerwidgets" class="col-xs-12 col-sm-6 col-lg-3"><div id="%1$s" class="ioftsc-lt %2$s">',
		'after_widget' => '</div></div> <!-- end .fwidget -->',
		'before_title' => '<span class="title">',
		'after_title' => '</span>',
	) );

	register_sidebar( array(
		'name' => 'Footer Area #4',
		'id' => 'sidebar-5',
		'before_widget' => '<div id="footerwidgets" class="col-xs-12 col-sm-6 col-lg-3"><div id="%1$s" class="ioftsc-lt %2$s">',
		'after_widget' => '</div></div> <!-- end .fwidget -->',
		'before_title' => '<span class="title">',
		'after_title' => '</span>',
	) );

	$ct_pb_widgets = get_theme_mod( 'ct_pb_widgets' );

	if ( $ct_pb_widgets['areas'] ) {
		foreach ( $ct_pb_widgets['areas'] as $id => $name ) {
			register_sidebar( array(
				'name' => sanitize_text_field( $name ),
				'id' => sanitize_text_field( $id ),
				'before_widget' => '<div id="%1$s" class="ct_pb_widget %2$s">',
				'after_widget' => '</div> <!-- end .ct_pb_widget -->',
				'before_title' => '<span class="widgettitle">',
				'after_title' => '</span>',
			) );
		}
	}
}
add_action( 'widgets_init', 'ct_widgets_init' );
?>