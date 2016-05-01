<?php
function acool_better_comments($comment, $args, $depth)
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
if ( ! function_exists( 'acool_favicon' ) ){
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
}
add_action( 'wp_head', 'acool_favicon' );



/*
add widgets to wp-admin
*/
function acool_widgets_init() {
	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="ct_widget %2$s">',
		'after_widget' => '</div> <!-- end .ct_widget -->',
		'before_title' => '<h4 class="ct_widget_title"><span>',
		'after_title' => '</span></h4>',
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


	register_sidebar( array(
		'name' => 'Content Header',
		'id' => 'content-header',
		'before_widget' => '<div id="content-header" class="content-header-ad"><div id="%1$s" class="%2$s">',
		'after_widget' => '</div></div> <!-- end .content-header -->',
		'before_title' => '<span class="title">',
		'after_title' => '</span>',
	) );	
	
	
	
}
add_action( 'widgets_init', 'acool_widgets_init' );




/**
 * Acool admin sidebar
 */

function acool_options_panel_sidebar()
{
?>
	<div id="optionsframework-sidebar">
		<div class="metabox-holder">
	    	<div class="postbox">
	    		<h3><?php _e( 'Quick Links', 'Acool' ); ?></h3>
      			<div class="inside"> 
		          <ul>
                  <li><a href="<?php echo esc_url( 'https://www.coothemes.com/themes/acool.php' ); ?>" target="_blank">Upgrade to Pro</a></li>
                  <li><a href="<?php echo esc_url( 'https://www.coothemes.com/doc/acool-manual.php' ); ?>" target="_blank">Tutorials</a></li>
                  </ul>
      			</div>
	    	</div>
	  	</div>
	</div>
    <div class="clear"></div>
<?php
}

add_action( 'optionsframework_sidebar','acool_options_panel_sidebar' );

/**
 * Custom scripts and styles on customize.php for clean_box.
 *
 * @since acool 1.1
 */
function acool_customize_scripts() {
	wp_enqueue_script( 'acool_customizer_custom', get_template_directory_uri() . '/js/customizer-custom-scripts.min.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), '20150630', true );

	$clean_box_misc_links = array(
							'upgrade_link' 				=> esc_url( 'https://www.coothemes.com/themes/acool.php' ),
							'upgrade_text'	 			=> __( 'Upgrade To Pro &raquo;', 'Acool' ),
							'WP_version'				=> get_bloginfo( 'version' ),
							'old_version_message'		=> __( 'Some settings might be missing or disorganized in this version of WordPress. So we suggest you to upgrade to version 4.0 or better.', 'Acool' )
		);
	if ( !(defined( 'CT_THEME_PRO_USED' ) && CT_THEME_PRO_USED ))
	{
		wp_localize_script( 'acool_customizer_custom', 'clean_box_misc_links', $clean_box_misc_links );
	}
	

	wp_enqueue_style( 'acool_customizer_custom_css', get_template_directory_uri() . '/css/customizer.css');
}
add_action( 'customize_controls_enqueue_scripts', 'acool_customize_scripts');


if ( ! function_exists( 'acool_previous_next' ) ){
function acool_previous_next($str)
{
	if($str == 'cat'){
		$categories = get_the_category();
		$categoryIDS = array();
		foreach ($categories as $category)
		{
			array_push($categoryIDS, $category->term_id);
		}
		$categoryIDS = implode(",", $categoryIDS);
		
		
	
		if (get_previous_post($categoryIDS)) { previous_post_link('<< %link','%title',true);}	
		echo '&nbsp;&nbsp;&nbsp;';
		if (get_next_post($categoryIDS)) { next_post_link('%link >>','%title',true);}
	}

	if($str == 'normal'){		
		previous_post_link('<< %link');
		echo '&nbsp;&nbsp;&nbsp;';
 		next_post_link('%link >>');
	}
	
}
}


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
	function ct_get_option( $ct_row,$option_name,$default )
	{				
		$arr =  get_option($ct_row);
		@$option_value     = sanitize_text_field($arr[$option_name]);
		if($option_value !=''){
			return $option_value;
		}else{			
			return  $default;	
		}
	}
}

/**
 * WordPress breadcrumbs
 * //since 1.0.2  acool_breadcrumbs()
 */
function acool_breadcrumbs() {
 
  $delimiter = '&raquo;';
  $name = 'Home'; //text for the 'Home' link
  $currentBefore = '<span>';
  $currentAfter = '</span>';
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 
    echo '<div id="crumbs">';
 
    global $post;
    $home = home_url();
	echo ' <a href="' . $home . '">'.$name. '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $currentBefore;
      single_cat_title();
      echo  $currentAfter;
 
    } elseif ( is_day() ) {
		
      echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( esc_attr__( 'Y' , 'Acool' ) ) . '">' . get_the_time('Y') . ' ' . $delimiter . '</a>';
      echo '<a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '" title="' . get_the_time( esc_attr__( 'F' , 'Acool' ) ) . '">' . get_the_time('F') . '</a>' . $delimiter . ' ';
      echo $currentBefore . get_the_time('d') . $currentAfter;
 
    } elseif ( is_month() ) {
      //echo '' . get_the_time('Y') . ' ' . $delimiter . ' ';
      echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( esc_attr__( 'Y' , 'Acool' ) ) . '">' . get_the_time('Y') . ' ' . $delimiter . '</a>';	  
      echo $currentBefore . get_the_time('F') . $currentAfter;
 
    } elseif ( is_year() ) {
      echo $currentBefore . get_the_time('Y') . $currentAfter;
 
    } elseif ( is_single() ) {
      $cat = get_the_category(); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '' . get_the_title($page->ID) . '';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_search() ) {
      echo $currentBefore . 'Search results for &#39;' . get_search_query() . '&#39;' . $currentAfter;
 
    } elseif ( is_tag() ) {
      echo $currentBefore . 'Posts tagged &#39;';
      single_tag_title();
      echo '&#39;' . $currentAfter;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;
 
    } elseif ( is_404() ) {
      echo $currentBefore . 'Error 404' . $currentAfter;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page', 'Acool') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    } 
    echo '</div>';
  }
}

function acool_paging_nav(){
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
//header add mobile_nav
function acool_add_mobile_navigation(){
	printf(
		'<div id="ct_mobile_nav_menu">
			<a href="#" class="mobile_nav closed">
				<span class="select_page">%1$s</span>
				<span class="mobile_menu_bar"></span>
			</a>
		</div>',
		esc_html__( 'Select Page', 'Acool' )
	);
}
add_action( 'ct_header_top', 'acool_add_mobile_navigation' );

 	/*	
	*	get background 
	*	---------------------------------------------------------------------
	*/
function acool_get_background($args,$opacity=1)
{
	$background = "";
 	if (is_array($args))
	{
		if (isset($args['image']) && $args['image']!="")
		{
			$background .= "background-image:url(".esc_url($args['image']). ");";
			$background .= "background-repeat: ".esc_attr($args['repeat']).";";
			$background .= "background-position: ".esc_attr($args['position']).";";
			$background .= "background-attachment: ".esc_attr($args['attachment']).";";
		}
	
		if(isset($args['color']) && $args['color'] !="")
		{
			$rgb = acool_hex2rgb($args['color']);
			$background .= "background-color:rgba(".$rgb[0].",".$rgb[1].",".$rgb[2].",".esc_attr($opacity).");";
		}

	}
	return $background;
}

/**
 * Convert Hex Code to RGB
 * @param  string $hex Color Hex Code
 * @return array       RGB values
 */
function acool_hex2rgb( $hex )
{
	if ( strpos( $hex,'rgb' ) !== FALSE )
	{
		$rgb_part = strstr( $hex, '(' );
		$rgb_part = trim($rgb_part, '(' );
		$rgb_part = rtrim($rgb_part, ')' );
		$rgb_part = explode( ',', $rgb_part );
		
		$rgb = array($rgb_part[0], $rgb_part[1], $rgb_part[2], $rgb_part[3]);
		
	}
	elseif( $hex == 'transparent' )
	{
		$rgb = array( '255', '255', '255', '0' );
	}
	else
	{
		$hex = str_replace( '#', '', $hex );	
		if( strlen( $hex ) == 3 )
		{
			$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
			$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
			$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
		}
		else
		{
			$r = hexdec( substr( $hex, 0, 2 ) );
			$g = hexdec( substr( $hex, 2, 2 ) );
			$b = hexdec( substr( $hex, 4, 2 ) );
		}
		$rgb = array( $r, $g, $b );
	}

	return $rgb; // returns an array with the rgb values
}

?>