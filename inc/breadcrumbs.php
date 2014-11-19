<?php 
/*
 * A1  Breadcrumbs
*/
global $a1_options;
if(empty($a1_options['remove-breadcrumbs'])) {

	function a1_custom_breadcrumbs() {

	  $a1_showonhome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	  $a1_delimiter = '/'; // a1_delimiter between crumbs
	  $a1_home = 'Home'; // text for the 'Home' link
	  $a1_showcurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	  $a1_before = ' '; // tag before the current crumb
	  $a1_after = ' '; // tag after the current crumb

	  global $post;
	  $a1_homelink = esc_url(home_url());

	  if (is_home() || is_front_page()) {

	    if ($a1_showonhome == 1) echo '<ol class="breadcrumb"><li class="active"><a href="' . $a1_homelink . '">' . $a1_home . '</a></li></ol>';
	  } else {

	    echo '<ol class="breadcrumb"><li class="active"><a href="' . $a1_homelink . '">' . $a1_home . '</a> ' . $a1_delimiter . ' ';
	    if ( is_category() ) {
	      $a1_thisCat = get_category(get_query_var('cat'), false);
	      if ($a1_thisCat->parent != 0) echo get_category_parents($a1_thisCat->parent, TRUE, ' ' . $a1_delimiter . ' ');
	      echo $a1_before . 'Archive by category "' . single_cat_title('', false) . '"' . $a1_after;

	    } elseif ( is_search() ) {
	      echo $a1_before . 'Search results for "' . get_search_query() . '"' . $a1_after;

	    } elseif ( is_day() ) {
	      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $a1_delimiter . ' ';
	      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $a1_delimiter . ' ';
	      echo $a1_before . get_the_time('d') . $a1_after;

	    } elseif ( is_month() ) {
	      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $a1_delimiter . ' ';
	      echo $a1_before . get_the_time('F') . $a1_after;

	    } elseif ( is_year() ) {
	      echo $a1_before . get_the_time('Y') . $a1_after;

	    } elseif ( is_single() && !is_attachment() ) {
	      if ( get_post_type() != 'post' ) {
		$a1_post_type = get_post_type_object(get_post_type());
		$a1_slug = $a1_post_type->rewrite;
		echo '<a href="' . $a1_homelink . '/' . $a1_slug['slug'] . '/">' . $a1_post_type->labels->singular_name . '</a>';
		if ($a1_showcurrent == 1) echo ' ' . $a1_delimiter . ' ' . $a1_before . get_the_title() . $a1_after;
	      } else {
		$a1_cat = get_the_category(); $a1_cat = $a1_cat[0];
		$a1_cats = get_category_parents($a1_cat, TRUE, ' ' . $a1_delimiter . ' ');
		if ($a1_showcurrent == 0) $a1_cats = 
		preg_replace("#^(.+)\s$a1_delimiter\s$#", "$1",$a1_cats);
		echo $a1_cats;
		if ($a1_showcurrent == 1) echo $a1_before . get_the_title() . $a1_after;
	      }

	    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
	      $a1_post_type = get_post_type_object(get_post_type());
	      echo $a1_before . $a1_post_type->labels->singular_name . $a1_after;

	    } elseif ( is_attachment() ) {
	      $a1_parent = get_post($post->post_parent);
	      $a1_cat = get_the_category($a1_parent->ID); $a1_cat = $a1_cat[0];
	      echo get_category_parents($a1_cat, TRUE, ' ' . $a1_delimiter . ' ');
	      echo '<a href="' . get_permalink($a1_parent) . '">' . $a1_parent->post_title . '</a>';
	      if ($a1_showcurrent == 1) echo ' ' . $a1_delimiter . ' ' . $a1_before . get_the_title() . $a1_after;

	    } elseif ( is_page() && !$post->post_parent ) {
	      if ($a1_showcurrent == 1) echo $a1_before . get_the_title() . $a1_after;

	    } elseif ( is_page() && $post->post_parent ) {
	      $a1_parent_id  = $post->post_parent;
	      $a1_breadcrumbs = array();
	      while ($a1_parent_id) {
		$a1_page = get_page($a1_parent_id);
		$a1_breadcrumbs[] = '<a href="' . get_permalink($a1_page->ID) . '">' . get_the_title($a1_page->ID) . '</a>';
		$a1_parent_id  = $a1_page->post_parent;
	      }
	      $a1_breadcrumbs = array_reverse($a1_breadcrumbs);
	      for ($a1_i = 0; $a1_i < count($a1_breadcrumbs); $a1_i++) {
		echo $a1_breadcrumbs[$a1_i];
		if ($a1_i != count($a1_breadcrumbs)-1) echo ' ' . $a1_delimiter . ' ';
	      }
	      if ($a1_showcurrent == 1) echo ' ' . $a1_delimiter . ' ' . $a1_before . get_the_title() . $a1_after;

	    } elseif ( is_tag() ) {
	      echo $a1_before . 'Posts tagged "' . single_tag_title('', false) . '"' . $a1_after;

	    } elseif ( is_author() ) {
	       global $author;
	      $a1_userdata = get_userdata($author);
	      echo $a1_before . 'Articles posted by ' . $a1_userdata->display_name . $a1_after;

	    } elseif ( is_404() ) {
	      echo $a1_before . 'Error 404' . $a1_after;
	    }

	    if ( get_query_var('paged') ) {
	      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
	      echo __('Page','a1') . ' ' . get_query_var('paged');
	      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
	    }

	    echo '</li></ol>';

	  }
	} // end a1_custom_breadcrumbs()

}
?>
