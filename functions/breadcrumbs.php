<?php
/*
 * generator Breadcrumbs
*/
function generator_custom_breadcrumbs() {

  $generator_showonhome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $generator_delimiter = '/'; // generator_delimiter between crumbs
  $generator_home = 'Home'; // text for the 'Home' link
  $generator_showcurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = ' '; // tag before the current crumb
  $after = ' '; // tag after the current crumb

  global $post;
  $generator_homelink = esc_url(home_url());

  if (is_home() || is_front_page()) {

    if ($generator_showonhome == 1) echo '<div id="crumbs" class="font-14 color-fff conter-text generator-breadcrumb"><a href="' . $generator_homelink . '">' . $generator_home . '</a></div>';

  } else {

    echo '<div id="crumbs" class="font-14 color-fff conter-text generator-breadcrumb"><a href="' . $generator_homelink . '">' . $generator_home . '</a> ' . $generator_delimiter . ' ';

    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $generator_delimiter . ' ');
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;

    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;

    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $generator_delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $generator_delimiter . ' ';
      echo $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $generator_delimiter . ' ';
      echo $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $generator_homelink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($generator_showcurrent == 1) echo ' ' . $generator_delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $generator_delimiter . ' ');
        if ($generator_showcurrent == 0) $cats = preg_replace("#^(.+)\s$generator_delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($generator_showcurrent == 1) echo $before . get_the_title() . $after;
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;

    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $generator_delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($generator_showcurrent == 1) echo ' ' . $generator_delimiter . ' ' . $before . get_the_title() . $after;

    } elseif ( is_page() && !$post->post_parent ) {
      if ($generator_showcurrent == 1) echo $before . get_the_title() . $after;

    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $generator_delimiter . ' ';
      }
      if ($generator_showcurrent == 1) echo ' ' . $generator_delimiter . ' ' . $before . get_the_title() . $after;

    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;

    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }

    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page','generator') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }

    echo '</div>';

  }
} // end generator_custom_breadcrumbs()
