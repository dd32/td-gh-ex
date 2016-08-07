<?php
function acool_better_comments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
?>	
 
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <article id="comment-<?php comment_ID(); ?>" class="comment-body">
            <div class="comment_avatar">
                <?php echo get_avatar($comment, '',''); ?>
            </div>

            <div class="comment_postinfo">
                <?php printf(__('<cite class="fn">%s</cite> <span class="says"> on </span>','acool'), get_comment_author_link()) ?>
                <span class="comment_date"><?php printf(__('%1$s at %2$s','acool'), get_comment_date(),  get_comment_time()) ?></span><?php edit_comment_link(__('(Edit)','acool'),'  ','') ?>
            </div> <!-- .comment_postinfo -->

            <div class="comment_area">				
                <div class="comment-content clearfix">
                	<?php if ($comment->comment_approved == '0') : ?>
                     	<em><?php _e('Your comment is awaiting moderation.','acool') ?></em>
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
 * Custom scripts and styles on customize.php for upgrade acool-pro.
 *
 * @since acool 1.1
 */
function acool_customize_scripts() {
	wp_enqueue_script( 'acool_customizer_custom', get_template_directory_uri() . '/js/customizer-custom-scripts.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), '20150630', true );

	$clean_box_misc_links = array(
							'upgrade_link' 				=> esc_url( 'https://www.coothemes.com/themes/acool.php' ),
							'upgrade_text'	 			=> __( 'Upgrade To Pro &raquo;', 'acool' ),
							'WP_version'				=> get_bloginfo( 'version' ),
							'old_version_message'		=> __( 'Some settings might be missing or disorganized in this version of WordPress. So we suggest you to upgrade to version 4.0 or better.', 'acool' )
		);

		wp_localize_script( 'acool_customizer_custom', 'clean_box_misc_links', $clean_box_misc_links );

	

	wp_enqueue_style( 'acool_customizer_custom_css', get_template_directory_uri() . '/css/customizer.css');
}
add_action( 'customize_controls_enqueue_scripts', 'acool_customize_scripts');


/**
 * Gets option value from the single theme option, stored as an array in the database
 * if all options stored in one row.
 * Stores the serialized array with theme options into the global variable on the first function run on the page.
 *
 * If options are stored as separate rows in database, it simply uses get_option() function.
 *
 * @param string $option_name Theme option name.
 * @param string $default Default value that should be set if the theme option isn't set.
 */
if ( ! function_exists( 'acool_get_option' ) ){
	function acool_get_option( $ct_row,$option_name,$default )
	{			
		$arr =  get_option($ct_row);		
		if(is_array($arr))
		{
			@$option_value     = $arr[$option_name];
			if($option_value !='')
			{
				return $option_value;
			}
			else
			{
				if(array_key_exists($option_name,$arr) ){
					return  false;
				}	
				else
				{		
					return  $default;	
				}
			}
		}
		else
		{		
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
  $name = __( 'Home', 'acool' ); //text for the 'Home' link
  $currentBefore = '<span>';
  $currentAfter = '</span>';
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 
    echo '<div id="crumbs">';
 
    global $post;
    $home = esc_url(home_url('/'));
	echo ' <a href="' . $home . '">'.$name. '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $currentBefore;
      esc_html( single_cat_title());
      echo  $currentAfter;
 
    } elseif ( is_day() ) {
		
      echo '<a href="' . esc_url(get_year_link( get_the_time( 'Y' ) ) ). '" ">' . get_the_time('Y') . ' ' . $delimiter . '</a>';
      echo '<a href="' . esc_url(get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) )) . ' ">' . esc_html(get_the_time('F')) . '</a>' . $delimiter . ' ';
      echo $currentBefore . esc_html(get_the_time('d') ). $currentAfter;
 
    } elseif ( is_month() ) {
      echo '<a href="' . esc_url(get_year_link( get_the_time( 'Y' ) )) . '">' . esc_html(get_the_time('Y') ). ' ' . $delimiter . '</a>';	  
      echo $currentBefore . esc_html(get_the_time('F')) . $currentAfter;
 
    } elseif ( is_year() ) {
      echo $currentBefore . esc_html(get_the_time('Y')) . $currentAfter;
 
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
      echo $currentBefore . __('Search results for &#39;','acool') . get_search_query() . '&#39;' . $currentAfter;
 
    } elseif ( is_tag() ) {
      echo $currentBefore . __('Posts tagged &#39;','acool') ;
      single_tag_title();
      echo '&#39;' . $currentAfter;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $currentBefore . __('Articles posted by ','acool') . esc_html($userdata->display_name) . $currentAfter;
 
    } elseif ( is_404() ) {
      echo $currentBefore . __('Error 404','acool') . $currentAfter;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page', 'acool') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    } 
    echo '</div>';
  }
}

//add page number
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
		esc_html__( 'Select Page', 'acool' )
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
 * Convert Hex Code to RGB   #FFFFFF -> 255 255 255
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



/* this function gets thumbnail from Post Thumbnail or Custom field or First post image */
if ( ! function_exists( 'acool_get_thumbnail' ) ) {
	function acool_get_thumbnail($post_id)
	{
		//if ( $post == '' ) global $post;
		if(has_post_thumbnail())
		{
			$ct_post_thumbnail_fullpath=wp_get_attachment_image_src( esc_url(get_post_thumbnail_id( $post_id )), "Full");
			$thumb_array['fullpath'] = esc_url($ct_post_thumbnail_fullpath[0]);
		
		}else{
			$post_content = get_post($post_id)->post_content;
			$thumb_array['fullpath'] = acool_catch_that_image($post_content);
		}
		if($post = 'front-page' && $thumb_array['fullpath']=="" )
		{			
			$thumb_array['fullpath'] = esc_url(of_get_option('default-featured-image'));
		}		
		
		if($post = 'front-page' && $thumb_array['fullpath']=="" )
		{			
			$thumb_array['fullpath'] = esc_url(get_template_directory_uri()."/images/default-thumbnail.jpg");
		}		

		return $thumb_array;		
	}
}



function acool_catch_that_image($post_content)
{
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post_content, $matches);
  if($output!='')  $first_img = $matches[1][0];

  return $first_img;
}

function acool_get_title($str,$limit) {
    if(strlen($str) > $limit) {
        $str = substr($str, 0, $limit);
    }
    echo $str;
}


//post_meta
function acool_show_post_meta()
{
?>
    <div class="ct_entry_meta">
        <span><i class="fa fa-clock-o"></i><a href="<?php echo esc_url(get_month_link(get_the_time('Y'), get_the_time('m')));?>"><?php echo esc_html(get_the_date("M d, Y"));?></a></span>
        <span><i class="fa fa-user"></i><?php echo get_the_author_link(); ?></span> 
        <span><i class="fa fa-file-o"></i><?php the_category(', '); ?></span>
        <?php edit_post_link( __('Edit','acool'), '<span><i class="fa fa-pencil"></i>', '</span>', get_the_ID() ); ?>         
    </div>
 <?php
}