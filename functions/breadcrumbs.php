<?php
/*
 * multishop Breadcrumbs
*/
function multishop_custom_breadcrumbs() {
  $multishop_showonhome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show  
 
  $multishop_showcurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  
  $multishop_after = ' '; // tag after the current crumb

  global $post;


  if (is_home() || is_front_page()) {

    if ($multishop_showonhome == 1) echo '<div id="crumbs" class="conter-text multishop-breadcrumb"><a href="'.esc_url(home_url()).'">'.esc_html__('Home','multishop').'</a></div>';
    
  } else {

   echo '<div id="crumbs" class="conter-text multishop-breadcrumb"><a href="'.esc_url(home_url()).'">'.esc_html__('Home','multishop').'</a>';
    if ( is_category() ) {
      $multishop_thisCat = get_category(get_query_var('cat'), false);
      if ($multishop_thisCat->parent != 0 ) echo get_category_parents($multishop_thisCat->parent, TRUE, ' ');      
      esc_html_e(' Archive by category ','multishop');
    } elseif ( is_search() ) {
      
    printf(/* translators: %s is search query.*/esc_html__('Search results for "%s" ','multishop'),get_search_query());     
      
    } elseif ( is_day() ) {      
      printf(/* translators: 1 is year link. 2 is post year.*/esc_html__('%1$s %2$s ','multishop'),esc_url(get_year_link(get_the_time('Y'))),esc_html(get_the_time('Y')));
      printf(/* translators: 1 is month link. 2 is post Month.*/esc_html__('%1$s %2$s ','multishop'),esc_url(get_month_link(get_the_time('Y'),get_the_time('m'))),esc_html(get_the_time('F')));
      printf(/* translators: 1 is date.*/esc_html__(' %1$s ','multishop'), esc_html(get_the_time('d')));
    } elseif ( is_month() ) {
	
	echo '<a href="'.esc_url(get_year_link(get_the_time('Y'))).'">'.esc_html(get_the_time('Y')).'</a>';
	printf(/* translators: 1 is date.*/esc_html__(' %1$s ','multishop'), esc_html(get_the_time('F')));

    } elseif ( is_year() ) {      
      printf(/* translators: %s is year.*/esc_html__(' %s ','multishop'),esc_html(get_the_time('Y')));

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $multishop_post_type = get_post_type_object(get_post_type());
        $multishop_slug = $multishop_post_type->rewrite;        
	    echo '<a href="'.esc_url(home_url('/'.$multishop_slug['slug'].'')).'">'.esc_html($multishop_post_type->labels->singular_name).'</a>';
        if ($multishop_showcurrent == 1) echo  esc_html(get_the_title()) ;
      } else {
        $multishop_cat = get_the_category(); $multishop_cat = $multishop_cat[0];
        $multishop_cats = get_category_parents($multishop_cat, TRUE, ' ');
        if ($multishop_showcurrent == 0) $multishop_cats = preg_replace("#^(.+)\s \s$#", "$1", $multishop_cats);
        echo $multishop_cats;
        if ($multishop_showcurrent == 1) echo esc_html(get_the_title());
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
	if ( function_exists('is_post_type_archive') && is_post_type_archive() && get_post_type()) {
	    $multishop_post_type = get_post_type_object(get_post_type());
	    printf(/* translators: %s is post singl name.*/esc_html__(' %1$s ','multishop'), esc_html($multishop_post_type->labels->singular_name));
	}

    } elseif ( is_attachment() ) {
      $multishop_parent = get_post($post->post_parent);
      $multishop_cat = get_the_category($multishop_parent->ID); $multishop_cat = $multishop_cat[0];      
      printf(/* translators: %s is category name.*/esc_html__(' %s ','multishop'),get_category_parents($multishop_cat, TRUE, ' '));      
      echo '<a href="'.esc_url(get_permalink($multishop_parent)).'">'.esc_html($multishop_parent->post_title).'</a>';
      
      if ($multishop_showcurrent == 1) echo  esc_html(get_the_title()) ;

    } elseif ( is_page() && !$post->post_parent ) {
      if ($multishop_showcurrent == 1) echo  esc_html(get_the_title()) ;

    } elseif ( is_page() && $post->post_parent ) {
      $multishop_parent_id  = $post->post_parent;
      $multishop_breadcrumbs = array();
      while ($multishop_parent_id) {
        $multishop_page = get_page($multishop_parent_id);
        $multishop_breadcrumbs[] = '<a href="' . esc_url(get_permalink($multishop_page->ID)) . '">' . esc_html(get_the_title($multishop_page->ID)) . '</a>';
        $multishop_parent_id  = $multishop_page->post_parent;
      }
      $multishop_breadcrumbs = array_reverse($multishop_breadcrumbs);
      for ($multishop_i = 0; $multishop_i < count($multishop_breadcrumbs); $multishop_i++) {
        echo $multishop_breadcrumbs[$multishop_i];
        if ($multishop_i != count($multishop_breadcrumbs)-1) {}
      }
      if ($multishop_showcurrent == 1) echo  esc_html(get_the_title()) ;

    } elseif ( is_tag() ) {      
      printf(/* translators: %s is single tag title.*/esc_html__('Posts tagged "%1$s"','multishop'),single_tag_title('', false));
    } elseif ( is_author() ) {
       global $author;
      $multishop_userdata = get_userdata($author);
      printf(/* translators: %s is user name.*/esc_html__('Articles posted by %1$s','multishop'),esc_html($multishop_userdata->display_name));

    } elseif ( is_404() ) {      
      esc_html_e(' Error 404 ','multishop');
    }
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo esc_html__('Page','multishop') . ' ' . esc_html(get_query_var('paged'));
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
    echo '</div>';
  }
} // end multishop_custom_breadcrumbs() ?>