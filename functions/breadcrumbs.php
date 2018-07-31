<?php
/*
 * avocation Breadcrumbs
*/
function avocation_custom_breadcrumbs() {
  $avocation_showonhome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show  
  $avocation_showcurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show

  global $post;
  if (is_home() || is_front_page()) {
    if ($avocation_showonhome == 1) echo '<li><a href="' . esc_url ( home_url('/') ). '">' . esc_html__('Home','avocation') . '</a></li>';
    
  }  else {

    echo '<li><a href="' . esc_url ( home_url('/') ) . '">' . esc_html__('Home','avocation') . '</a> ';
    
   if ( is_category() ) {
      $avocation_thisCat = get_category(get_query_var('cat'), false);
      if ($avocation_thisCat->parent != 0) echo get_category_parents($avocation_thisCat->parent, TRUE, ' ');      
		  esc_html_e('category','avocation'); echo ' "'.single_cat_title('', false) . '"' ;
    } 
    elseif ( is_search() ) {
       esc_html_e('Search Results For','avocation'); echo ' "'. get_search_query() . '"';

    } elseif ( is_day() ) {
      echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a> ';
      echo '<a href="' . esc_url(get_month_link(get_the_time('Y'),get_the_time('m'))) . '">' . esc_html(get_the_time('F')) . '</a>  ';
      echo  esc_html(get_the_time('d')) ;

    } elseif ( is_month() ) {
      echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a> ';
      echo  esc_html(get_the_time('F')) ;

    } elseif ( is_year() ) {
      echo  esc_html(get_the_time('Y')) ;

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $avocation_post_type = get_post_type_object(get_post_type());
        $avocation_slug = $avocation_post_type->rewrite;
        echo '<a href="' . esc_url ( home_url('/'. $avocation_slug['slug']) ) . '/' . $avocation_slug['slug'] . '/">' . esc_html($avocation_post_type->labels->singular_name) . '</a>';
        if ($avocation_showcurrent == 1) echo  esc_attr(get_the_title()) ;
      } else {
        $avocation_cat = get_the_category(); $avocation_cat = $avocation_cat[0];
        $avocation_cats = get_category_parents($avocation_cat, TRUE, ' ');
        if ($avocation_showcurrent == 0) $avocation_cats = preg_replace("#^(.+)\s \s$#", "$1", $avocation_cats);
        echo $avocation_cats;
        if ($avocation_showcurrent == 1) echo  esc_attr(get_the_title()) ;
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $avocation_post_type = get_post_type_object(get_post_type());
      echo  esc_html($avocation_post_type->labels->singular_name) ;

    } elseif ( is_attachment() ) {
      $avocation_parent = get_post($post->post_parent);
      $avocation_cat = get_the_category($avocation_parent->ID); $avocation_cat = $avocation_cat[0];
      echo get_category_parents($avocation_cat, TRUE, '  ');
      echo '<a href="' . esc_url(get_permalink($avocation_parent)) . '">' . $avocation_parent->post_title . '</a>';
      if ($avocation_showcurrent == 1) echo  esc_attr(get_the_title()) ;

    } elseif ( is_page() && !$post->post_parent ) {
      if ($avocation_showcurrent == 1) echo  esc_attr(get_the_title()) ;

    } elseif ( is_page() && $post->post_parent ) {
      $avocation_parent_id  = $post->post_parent;
      $avocation_breadcrumbs = array();
      while ($avocation_parent_id) {
        $avocation_page = get_page($avocation_parent_id);
        $avocation_breadcrumbs[] = '<a href="' . get_permalink($avocation_page->ID) . '">' . esc_attr(get_the_title($avocation_page->ID)) . '</a>';
        $avocation_parent_id  = $avocation_page->post_parent;
      }
      $avocation_breadcrumbs = array_reverse($avocation_breadcrumbs);
      for ($avocation_i = 0; $avocation_i < count($avocation_breadcrumbs); $avocation_i++) {
        echo $avocation_breadcrumbs[$avocation_i];
        if ($avocation_i != count($avocation_breadcrumbs)-1) echo ' ';
      }
      if ($avocation_showcurrent == 1) echo esc_attr(get_the_title()) ;

    } elseif ( is_tag() ) {
       esc_html_e('Posts tagged','avocation'); echo ' "'.  single_tag_title('', false) . '"' ;

    } elseif ( is_author() ) {
       global $author;
      $avocation_userdata = get_userdata($author);
       esc_html_e('Articles posted by ','avocation'); echo esc_html($avocation_userdata->display_name) ;

    } elseif ( is_404() ) {
       esc_html_e('Error 404','avocation'); 
    }
    
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo esc_html__('Page','avocation') . ' ' . esc_html(get_query_var('paged'));
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
    echo '</li>';
  }
} ?>