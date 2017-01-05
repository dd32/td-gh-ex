<?php

/*
* Register Raleway Regular Google font for avocation
*/
function avocation_font_url() {
   $avocation_font_url = '';
   if ('off' !== _x('on', 'Raleway-Regular font: on or off', 'avocation')) {
       $avocation_font_url = add_query_arg('family', urlencode('Raleway:400,400italic,600italic,700'), "//fonts.googleapis.com/css");
   }
   return $avocation_font_url;
}
/*
 * avocation Main Sidebar
*/
function avocation_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'avocation' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the right.', 'avocation' ),
		'before_widget' => '<div class="sidebar-widget %2$s search-width" id="%1$s" >',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	 register_sidebar(array(
       'name' => __('Footer Area One', 'avocation'),
       'id' => 'footer-1',
       'description' => __('Footer Area One that appears on the footer.', 'avocation'),
       'before_widget' => '<div class="footer-widget">',
       'after_widget' => '</div>',
       'before_title' => '<h3 class="footer-widget-title">',
       'after_title' => '</h3>',
   ));
   register_sidebar(array(
       'name' => __('Footer Area Two', 'avocation'),
       'id' => 'footer-2',
       'description' => __('Footer Area Two that appears on the footer.', 'avocation'),
        'before_widget' => '<div class="footer-widget">',
       'after_widget' => '</div>',
       'before_title' => '<h3 class="footer-widget-title">',
       'after_title' => '</h3>',
   ));
   register_sidebar(array(
       'name' => __('Footer Area Three', 'avocation'),
       'id' => 'footer-3',
       'description' => __('Footer Area Three that appears on the footer.', 'avocation'),
       'before_widget' => '<div class="footer-widget">',
       'after_widget' => '</div>',
       'before_title' => '<h3 class="footer-widget-title">',
       'after_title' => '</h3>',
   ));
   register_sidebar(array(
       'name' => __('Footer Area Four', 'avocation'),
       'id' => 'footer-4',
       'description' => __('Footer Area Four that appears on the footer.', 'avocation'),
        'before_widget' => '<div class="footer-widget">',
       'after_widget' => '</div>',
       'before_title' => '<h3 class="footer-widget-title">',
       'after_title' => '</h3>',
   ));

}
add_action( 'widgets_init', 'avocation_widgets_init' );

/*
 * avocation Set up post entry meta.
 *
 * Meta information for current post: categories, tags, permalink, author, and date.
 */
function avocation_entry_meta() {

	$avocation_category_list = get_the_category_list( ', ',' <i class="fa fa-list-all"></i> ');		
	$avocation_tag_list = get_the_tag_list('<i class="fa fa-tags"></i> ',' , ');
	$avocation_date = sprintf( '<time datetime="%1$s">%2$s</time>',
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
	$avocation_author = sprintf( '<a href="%1$s" title="%2$s" >%3$s</a>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'avocation' ), get_the_author() ) ),
		get_the_author()
	);
	if($avocation_category_list) {
		$avocation_utility_text = '<div class="blog-meta"><ul><li><a href='.esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))).' > <i class="fa fa-calendar"></i> %3$s </a></li> <li> <i class="fa fa-user"></i> %4$s </li> <li>  %2$s </li> <li> <i class="fa fa-list-alt"></i> %1$s </li> <li> <i class="fa fa-comment"></i> '.avocation_comment_number_custom().'</li></ul></div>';						
	}
	elseif($avocation_tag_list ) {
		$avocation_utility_text = '<div class="blog-meta"><ul><li><a href='.esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))).' > <i class="fa fa-calendar"></i> %3$s </a></li> <li> <i class="fa fa-user"></i> %4$s </li> </li> <li>  %2$s </li>  <li>  %1$s </li> <li> <i class="fa fa-comment"></i> '.avocation_comment_number_custom().'</li></ul></div>';
	}
	 else{
		$avocation_utility_text = '<div class="blog-meta"><ul><li><a href='.esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))).' > <i class="fa fa-calendar"></i> %3$s </a></li> <li> <i class="fa fa-user"></i> %4$s </li>  <li> <i class="fa fa-comment"></i> '.avocation_comment_number_custom().'</li></ul></div>';
	}
	printf(
		$avocation_utility_text,
		$avocation_category_list,
		$avocation_tag_list,
		$avocation_date,
		$avocation_author
	);
}
function avocation_comment_number_custom(){
$avocation_num_comments = get_comments_number(); // get_comments_number returns only a numeric value
$avocation_comments=__('No Comments','avocation');
if ( comments_open() ) {
	if ( $avocation_num_comments == 0 ) {
		$avocation_comments = __('No Comments','avocation');
	} elseif ( $avocation_num_comments > 1 ) {
		$avocation_comments = $avocation_num_comments . __(' Comments','avocation');
	} else {
		$avocation_comments = __('1 Comment','avocation');
	}
}
return $avocation_comments;
}
/*
 * Comments placeholder function
 * 
**/
add_filter( 'comment_form_default_fields', 'avocation_comment_placeholders' );
function avocation_comment_placeholders( $fields )
{
	$fields['author'] = str_replace(
		'<input',
		'<input placeholder="'
		
		. _x(
		'Name *',
		'comment form placeholder',
		'avocation'
		)
		. '" required',
		
	$fields['author']
	);
	$fields['email'] = str_replace(
		'<input',
		'<input placeholder="'
		. _x(
		'Email Id *',
		'comment form placeholder',
		'avocation'
		)
		. '" required',
	$fields['email']
	);
	$fields['url'] = str_replace(
		'<input',
		'<input placeholder="'
		. _x(
		'Website URl',
		'comment form placeholder',
		'avocation'
		)
		. '" required',
	$fields['url']
	);
	return $fields;
}
add_filter( 'comment_form_defaults', 'avocation_textarea_insert' );
	function avocation_textarea_insert( $fields )
	{
		$fields['comment_field'] = str_replace(
			'<textarea',
			'<textarea  placeholder="'
			. _x(
			'Comment',
			'comment form placeholder',
			'avocation'
			)
		. '" ',
		$fields['comment_field']
		);
	return $fields;
	}
function avocation_pagination() {
	if(is_single()){
		the_post_navigation( array(
			'prev_text' => '<div class="avocation_previous_pagination alignleft">%title</div>',
			'next_text' => '<div class="avocation_next_pagination alignright">%title</div>',
		) );
	}else{
		the_posts_pagination(array(
		  'prev_text' => '<i class="fa fa-angle-double-left"></i>',
		  'next_text' => '<i class="fa fa-angle-double-right"></i>',
		  'before_page_number' => '<span class="meta-nav screen-reader-text"></span>',
		));
	}
} ?>