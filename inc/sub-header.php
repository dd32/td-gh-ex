<?php

global $post, $data, $shortname, $forum;


if( is_singular('post') ) {
		$title = themeofwp_option(''.$shortname.'_blog_title');
		$sub_title = get_post_meta($post->ID,'themeofwp_subtitle',true); 
	
} elseif ( is_singular( 'works' )  ) {
		$title = themeofwp_option(''.$shortname.'_portfolio_title');
		$sub_title = get_post_meta($post->ID,'themeofwp_subtitle',true); 
	
} elseif ( is_singular( 'product' )  ) {
		$title = themeofwp_option(''.$shortname.'_product_title');
		$sub_title = get_post_meta($post->ID,'themeofwp_subtitle',true); 
	
} elseif ( class_exists('bbPress') && is_page_template('forums.php')  ) {
		$title = themeofwp_option(''.$shortname.'_forum_title');
		$sub_title = themeofwp_option(''.$shortname.'_forum_subtitle');

} elseif ( is_category() ) {
		$title = __("Category", "themeofwp") . " : " . single_cat_title("", false);
		$sub_title = category_description();



		


} elseif ( is_archive() ) {

	if (is_day()) {
        $title = __("Daily Archives", "themeofwp") . " : " . get_the_date();
		$sub_title = themeofwp_option(''.$shortname.'_blog_subtitle');

    } elseif (is_month()) {
        $title = __("Monthly Archives", "themeofwp") . " : " . get_the_date("F Y");
		$sub_title = themeofwp_option(''.$shortname.'_blog_subtitle');

    } elseif (is_year()) {
        $title = __("Yearly Archives", "themeofwp") . " : " . get_the_date("Y");
		$sub_title = themeofwp_option(''.$shortname.'_blog_subtitle');
		
	} elseif ( is_post_type_archive('product') ) {
		$title = themeofwp_option(''.$shortname.'_product_title');
		$sub_title = themeofwp_option(''.$shortname.'_product_subtitle');
		
	} elseif ( class_exists('bbPress') && bbp_is_forum_archive() ) {
		$title = themeofwp_option(''.$shortname.'_forum_title');
		$sub_title = themeofwp_option(''.$shortname.'_forum_subtitle');
		
	} elseif  (   is_archive  ( 'product-category' ) ) {
		$title = themeofwp_option(''.$shortname.'_product_title'); 
		$sub_title = single_cat_title( 'Product Category / ', false );
	
    } else {
        $title = __("Blog Archives", "themeofwp");
		$sub_title = themeofwp_option(''.$shortname.'_blog_subtitle');

    }
	
} 


		
		
elseif ( class_exists('bbPress') && is_singular( 'reply' ) || is_singular( 'reply' ) || is_singular( 'topic' ) || is_singular( 'forum' )    ) {

    $forum = get_queried_object();

     if ( bbp_is_single_forum() || bbp_is_single_topic() || bbp_is_single_reply() ) {
	 
        $ID = $forum->ID;
		$title = $forum->post_title;
        $sub_title = themeofwp_option(''.$shortname.'_forum_subtitle');
		
    } else {

		$ID = $page->ID;
		$title = $page->post_title;
		$sub_title = get_post_meta($ID, 'themeofwp_subtitle', true);

 }

	
} elseif ( is_tag() ) {
    $title = single_tag_title("", false);
	$sub_title = tag_description();
	
} elseif ( is_author() ) {
    $title = __("Author: ", "themeofwp");
	
} elseif ( is_search() ) {
    $title = __("Search results for", "themeofwp") . " : " . get_search_query();
	
} elseif ( is_tax( 'portfolios' ) ) {
    $title = __("Portfolio", "themeofwp");
	
} elseif ( is_home() and !is_front_page() ) {

    $page = get_queried_object();

    if( is_null( $page ) ){
        $title = themeofwp_option(''.$shortname.'_product_title');
        $sub_title = themeofwp_option(''.$shortname.'_product_subtitle');
		
    } else {

     $ID = $page->ID;
     $title = $page->post_title;
     $sub_title = get_post_meta($ID, 'themeofwp_subtitle', true);
 }
 


} elseif ( (is_page()) && (!is_front_page()) ) {
    $page = get_queried_object();

    $ID = $page->ID;

    $title = $page->post_title;
    $sub_title = get_post_meta($ID, 'themeofwp_subtitle', true);
	

} elseif( is_front_page()){

    unset($title);
}

echo (isset($title) ? '

    
		<div class="row">
			'.themeofwp_layout().'
				<div class="col-sm-6 subtitle">
					<h1>'.$title.'</h1>
					<p>'.$sub_title.'</p>
				</div>
			</div>
		</div>

    ' : '');