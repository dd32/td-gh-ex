<?php
/*
 * avocation Breadcrumbs
*/
function avocation_custom_breadcrumbs() {

  $avocation_showonhome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $avocation_delimiter = '/'; // avocation_delimiter between crumbs
  $avocation_home = __('Home','avocation'); // text for the 'Home' link
  $avocation_showcurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $avocation_before = ' '; // tag before the current crumb
  $avocation_after = ' '; // tag after the current crumb

  global $post;
  $avocation_homelink = home_url('/');

  if (is_home() || is_front_page()) {

    if ($avocation_showonhome == 1) echo '<li><a href="' . $avocation_homelink . '">' . $avocation_home . '</a></li>';
    
  }  else {

    echo '<li><a href="' . $avocation_homelink . '">' . $avocation_home . '</a> ' . $avocation_delimiter . '';
    
   if ( is_category() ) {
      $avocation_thisCat = get_category(get_query_var('cat'), false);
      if ($avocation_thisCat->parent != 0) echo get_category_parents($avocation_thisCat->parent, TRUE, ' ' . $avocation_delimiter . ' ');      
		echo $avocation_before; _e('category','avocation'); echo ' "'.single_cat_title('', false) . '"' . $avocation_after;
    } 
    elseif ( is_search() ) {
      echo $avocation_before; _e('Search Results For','avocation'); echo ' "'. get_search_query() . '"' . $avocation_after;

    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $avocation_delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $avocation_delimiter . ' ';
      echo $avocation_before . get_the_time('d') . $avocation_after;

    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $avocation_delimiter . ' ';
      echo $avocation_before . get_the_time('F') . $avocation_after;

    } elseif ( is_year() ) {
      echo $avocation_before . get_the_time('Y') . $avocation_after;

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $avocation_post_type = get_post_type_object(get_post_type());
        $avocation_slug = $avocation_post_type->rewrite;
        echo '<a href="' . $avocation_homelink . '/' . $avocation_slug['slug'] . '/">' . $avocation_post_type->labels->singular_name . '</a>';
        if ($avocation_showcurrent == 1) echo ' ' . $avocation_delimiter . ' ' . $avocation_before . get_the_title() . $avocation_after;
      } else {
        $avocation_cat = get_the_category(); $avocation_cat = $avocation_cat[0];
        $avocation_cats = get_category_parents($avocation_cat, TRUE, ' ' . $avocation_delimiter . ' ');
        if ($avocation_showcurrent == 0) $avocation_cats = preg_replace("#^(.+)\s$avocation_delimiter\s$#", "$1", $avocation_cats);
        echo $avocation_cats;
        if ($avocation_showcurrent == 1) echo $avocation_before . get_the_title() . $avocation_after;
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $avocation_post_type = get_post_type_object(get_post_type());
      echo $avocation_before . $avocation_post_type->labels->singular_name . $avocation_after;

    } elseif ( is_attachment() ) {
      $avocation_parent = get_post($post->post_parent);
      $avocation_cat = get_the_category($avocation_parent->ID); $avocation_cat = $avocation_cat[0];
      echo get_category_parents($avocation_cat, TRUE, ' ' . $avocation_delimiter . ' ');
      echo '<a href="' . get_permalink($avocation_parent) . '">' . $avocation_parent->post_title . '</a>';
      if ($avocation_showcurrent == 1) echo ' ' . $avocation_delimiter . ' ' . $avocation_before . get_the_title() . $avocation_after;

    } elseif ( is_page() && !$post->post_parent ) {
      if ($avocation_showcurrent == 1) echo $avocation_before . get_the_title() . $avocation_after;

    } elseif ( is_page() && $post->post_parent ) {
      $avocation_parent_id  = $post->post_parent;
      $avocation_breadcrumbs = array();
      while ($avocation_parent_id) {
        $avocation_page = get_page($avocation_parent_id);
        $avocation_breadcrumbs[] = '<a href="' . get_permalink($avocation_page->ID) . '">' . get_the_title($avocation_page->ID) . '</a>';
        $avocation_parent_id  = $avocation_page->post_parent;
      }
      $avocation_breadcrumbs = array_reverse($avocation_breadcrumbs);
      for ($avocation_i = 0; $avocation_i < count($avocation_breadcrumbs); $avocation_i++) {
        echo $avocation_breadcrumbs[$avocation_i];
        if ($avocation_i != count($avocation_breadcrumbs)-1) echo ' ' . $avocation_delimiter . ' ';
      }
      if ($avocation_showcurrent == 1) echo ' ' . $avocation_delimiter . ' ' . $avocation_before . get_the_title() . $avocation_after;

    } elseif ( is_tag() ) {
      echo $avocation_before; _e('Posts tagged','avocation'); echo ' "'.  single_tag_title('', false) . '"' . $avocation_after;

    } elseif ( is_author() ) {
       global $author;
      $avocation_userdata = get_userdata($author);
      echo $avocation_before; _e('Articles posted by ','avocation'); echo $avocation_userdata->display_name . $avocation_after;

    } elseif ( is_404() ) {
      echo $avocation_before; _e('Error 404','avocation'); echo $avocation_after;
    }
    
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page','avocation') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
    echo '</li>';

  }
} 
