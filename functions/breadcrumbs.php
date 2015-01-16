<?php
/*
 * deserve Breadcrumbs
*/
function deserve_custom_breadcrumbs() {

  $deserve_showonhome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $deserve_delimiter = '/'; // deserve_delimiter between crumbs
  $deserve_home = __('Home','deserve'); // text for the 'Home' link
  $deserve_showcurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $deserve_before = ' '; // tag before the current crumb
  $deserve_after = ' '; // tag after the current crumb

  global $post;
  $deserve_homelink = esc_url(home_url());

  if (is_home() || is_front_page()) {

    if ($deserve_showonhome == 1) echo '<li><a href="' . $deserve_homelink . '">' . $deserve_home . '</a></li>';

  } else {

    echo '<li><a href="' . $deserve_homelink . '">' . $deserve_home . '</a> ' . $deserve_delimiter . ' ';

    if ( is_category() ) {
      $deserve_thisCat = get_category(get_query_var('cat'), false);
      if ($deserve_thisCat->parent != 0) echo get_category_parents($deserve_thisCat->parent, TRUE, ' ' . $deserve_delimiter . ' ');
      echo $deserve_before . _e('Archive by category','deserve') .'"'. single_cat_title('', false) . '"' . $deserve_after;

    } elseif ( is_search() ) {
      echo $deserve_before . _e('Search results for','deserve').' "' . get_search_query() . '"' . $deserve_after;
	

    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $deserve_delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $deserve_delimiter . ' ';
      echo $deserve_before . get_the_time('d') . $deserve_after;

    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $deserve_delimiter . ' ';
      echo $deserve_before . get_the_time('F') . $deserve_after;

    } elseif ( is_year() ) {
      echo $deserve_before . get_the_time('Y') . $deserve_after;

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $deserve_post_type = get_post_type_object(get_post_type());
        $deserve_slug = $deserve_post_type->rewrite;
        echo '<a href="' . $deserve_homelink . '/' . $deserve_slug['slug'] . '/">' . $deserve_post_type->labels->singular_name . '</a>';
        if ($deserve_showcurrent == 1) echo ' ' . $deserve_delimiter . ' ' . $deserve_before . get_the_title() . $deserve_after;
      } else {
        $deserve_cat = get_the_category(); $deserve_cat = $deserve_cat[0];
        $deserve_cats = get_category_parents($deserve_cat, TRUE, ' ' . $deserve_delimiter . ' ');
        if ($deserve_showcurrent == 0) $deserve_cats = preg_replace("#^(.+)\s$deserve_delimiter\s$#", "$1", $deserve_cats);
        echo $deserve_cats;
        if ($deserve_showcurrent == 1) echo $deserve_before . get_the_title() . $deserve_after;
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $deserve_post_type = get_post_type_object(get_post_type());
      echo $deserve_before . $deserve_post_type->labels->singular_name . $deserve_after;

    } elseif ( is_attachment() ) {
      $deserve_parent = get_post($post->post_parent);
      $deserve_cat = get_the_category($deserve_parent->ID); $deserve_cat = $deserve_cat[0];
      echo get_category_parents($deserve_cat, TRUE, ' ' . $deserve_delimiter . ' ');
      echo '<a href="' . get_permalink($deserve_parent) . '">' . $deserve_parent->post_title . '</a>';
      if ($deserve_showcurrent == 1) echo ' ' . $deserve_delimiter . ' ' . $deserve_before . get_the_title() . $deserve_after;

    } elseif ( is_page() && !$post->post_parent ) {
      if ($deserve_showcurrent == 1) echo $deserve_before . get_the_title() . $deserve_after;

    } elseif ( is_page() && $post->post_parent ) {
      $deserve_parent_id  = $post->post_parent;
      $deserve_breadcrumbs = array();
      while ($deserve_parent_id) {
        $deserve_page = get_page($deserve_parent_id);
        $deserve_breadcrumbs[] = '<a href="' . get_permalink($deserve_page->ID) . '">' . get_the_title($deserve_page->ID) . '</a>';
        $deserve_parent_id  = $deserve_page->post_parent;
      }
      $deserve_breadcrumbs = array_reverse($deserve_breadcrumbs);
      for ($deserve_i = 0; $deserve_i < count($deserve_breadcrumbs); $deserve_i++) {
        echo $deserve_breadcrumbs[$deserve_i];
        if ($deserve_i != count($deserve_breadcrumbs)-1) echo ' ' . $deserve_delimiter . ' ';
      }
      if ($deserve_showcurrent == 1) echo ' ' . $deserve_delimiter . ' ' . $deserve_before . get_the_title() . $deserve_after;

    } elseif ( is_tag() ) {
     echo $deserve_before . _e('Posts tagged','deserve') .' "' . single_tag_title('', false) . '"' . $deserve_after;


    } elseif ( is_author() ) {
       global $author;
      $deserve_userdata = get_userdata($author);
      echo $deserve_before . _e('Articles posted by','deserve') . $deserve_userdata->display_name . $deserve_after;


    } elseif ( is_404() ) {
      echo $deserve_before . _e('Error 404','deserve') . $deserve_after;

    }

    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page','deserve') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }

    echo '</li>';

  }
} // end deserve_custom_breadcrumbs()
