<?php

/* Create a new post type called Projects */

function create_post_type_projects() 
{
	$labels = array(
		'name' => __( 'My Projects'),
		'singular_name' => __( 'Projects' ),
		'rewrite' => array('slug' => __( 'project' )),
		'add_new_item' => __('Add New Project'),
		'edit_item' => __('Edit Project'),
		'new_item' => __('New Project'),
		'view_item' => __('View Project'),
		'search_items' => __('Search Project'),
		'not_found' =>  __('No Project items found'),
		'not_found_in_trash' => __('No Project items found in Trash'), 
		'parent_item_colon' => ''
	  );
	  
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'has_archive' => true,
		'supports' => array('title','editor','excerpt','thumbnail')
	  ); 
	  
	  register_post_type(__( 'projects' ),$args);
}

add_action( 'init', 'create_post_type_projects' );

add_action( 'init', 'register_work_taxonomies', 0 );


function register_work_taxonomies() {

	register_taxonomy(
		'skilltypes',
		array( 'projects' ),
		array(
			'public' => true,
			'hierarchical' => true,
			'labels' => array(
				'name' => __( 'Manage Skill Types' ),
				'singular_name' => __( 'Which Skill Type' ),
				'all_items' => __( 'Choose Skill Type' ),
				'add_new_item' => __( 'Add New Skill Type' ),
				'new_item_name' => __( 'Add New Skill Type' ),
				'edit_item' => __( 'Edit Skill Types' ),
				'update_item' => __( 'Update Skill Types' ),
			),
		)
	);
}


/* New category walker for portfolio filter */

class Walker_Category_Filter extends Walker_Category {
   function start_el(&$output, $category, $depth, $args) {

      extract($args);
      $cat_name = esc_attr( $category->name);
      $cat_name = apply_filters( 'list_cats', $cat_name, $category );
      $link = '<a href="#" data-value="'.strtolower(preg_replace('/\s+/', '-', $cat_name)).'" ';
      if ( $use_desc_for_title == 0 || empty($category->description) )
         $link .= 'title="' . sprintf(__( 'View all posts filed under %s' ), $cat_name) . '"';
      else
         $link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
      $link .= '>';
      // $link .= $cat_name . '</a>';
      $link .= $cat_name;
      if(!empty($category->description)) {
         $link .= ' <span>'.$category->description.'</span>';
      }
      $link .= '</a> <span>/</span> ';
      if ( (! empty($feed_image)) || (! empty($feed)) ) {
         $link .= ' ';
         if ( empty($feed_image) )
            $link .= '(';
         $link .= '<a href="' . get_category_feed_link($category->term_id, $feed_type) . '"';
         if ( empty($feed) )
            $alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s' ), $cat_name ) . '"';
         else {
            $title = ' title="' . $feed . '"';
            $alt = ' alt="' . $feed . '"';
            $name = $feed;
            $link .= $title;
         }
         $link .= '>';
         if ( empty($feed_image) )
            $link .= $name;
         else
            $link .= "<img src='$feed_image'$alt$title" . ' />';
         $link .= '</a> <span>/</span> ';
         if ( empty($feed_image) )
            $link .= ')';
      }
      if ( isset($show_count) && $show_count )
         $link .= ' (' . intval($category->count) . ')';
      if ( isset($show_date) && $show_date ) {
         $link .= ' ' . gmdate('Y-m-d', $category->last_update_timestamp);
      }
      if ( isset($current_category) && $current_category )
         $_current_category = get_category( $current_category );
      if ( 'list' == $args['style'] ) {
          $output .= '<li class="segment"';
          $class = 'cat-item cat-item-'.$category->term_id;
          if ( isset($current_category) && $current_category && ($category->term_id == $current_category) )
             $class .=  ' current-cat';
          elseif ( isset($_current_category) && $_current_category && ($category->term_id == $_current_category->parent) )
             $class .=  ' current-cat-parent';
          $output .=  '';
          $output .= ">$link\n";
       } else {
          $output .= "\t$link<br />\n";
       }
   }
}

/* Get related posts by taxonomy */

function get_posts_related_by_taxonomy($post_id, $taxonomy, $args=array()) {
  $query = new WP_Query();
  $terms = wp_get_object_terms($post_id, $taxonomy);
  if (count($terms)) {
    // Assumes only one term for per post in this taxonomy
    $post_ids = get_objects_in_term($terms[0]->term_id,$taxonomy);
    $post = get_post($post_id);
    $args = wp_parse_args($args,array(
      'post_type' => $post->post_type, // The assumes the post types match
      'post__in' => $post_ids,
      'taxonomy' => $taxonomy,
      'term' => $terms[0]->slug,
	  'posts_per_page' => 16,
    ));
    $query = new WP_Query($args);
  }
  return $query;
}	


/*  Begin Random call to action custom post type */
function calltoaction_register() {
 
	$labels = array(
		'name' => _x('Call to Action', 'post type general name'),
		'singular_name' => _x('Call To Action Item', 'post type singular name'),
		'add_new' => _x('Add New', 'Call To Action item'),
		'add_new_item' => __('Add New Call To Action Item'),
		'edit_item' => __('Edit Call To Action Item'),
		'new_item' => __('New Call To Action Item'),
		'view_item' => __('View Call To Action Item'),
		'search_items' => __('Search Call To Action'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'exclude_from_search' => true,
		'supports' => array('title','editor')
	  ); 
 
	register_post_type( 'calltoaction' , $args );
}
add_action('init', 'calltoaction_register');
/* End Call To Action custom post type */

?>