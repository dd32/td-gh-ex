<?php 

/**
 * theme custom functions
 *
 * @package auckland
 */


/**
 * author excerpt
 */
function auckland_author_excerpt() {
  $text_limit = 100; //Words to show in author bio excerpt
  $read_more  = ""; //Read more text
  $end_of_txt = "...";
  $url_of_author  = get_author_posts_url(get_the_author_meta('ID'));
  $short_desc_author = wp_trim_words(strip_tags(
  get_the_author_meta('description')), $text_limit, 
  $end_of_txt);

  return $short_desc_author;
  }

/**
 * return an image inside a post
 */
function auckland_catch_that_image() {
  global $post;
  $pattern = '|<img.*?class="([^"]+)".*?/>|';
  $transformed_content = apply_filters('the_content',$post->post_content);
  preg_match($pattern,$transformed_content,$matches);
  if (!empty($matches[1])) {
    $classes = explode(' ',$matches[1]);
    $id = preg_grep('|^wp-image-.*|',$classes);

      $id = str_replace('wp-image-','',$id);
      if (!empty($id)) {
        $id = reset($id);
        $transformed_content = wp_get_attachment_url($id);  
        return $transformed_content;
      }
    
  }
  
}

/**
 * return an image inside a post (thumb)
 */
function auckland_catch_that_image_thumb() {
  global $post;
  $pattern = '|<img.*?class="([^"]+)".*?/>|';
  $transformed_content = apply_filters('the_content',$post->post_content);
  preg_match($pattern,$transformed_content,$matches);
  if (!empty($matches[1])) {
    $classes = explode(' ',$matches[1]);
    $id = preg_grep('|^wp-image-.*|',$classes);
    if (!empty($id)) {
      $id = str_replace('wp-image-','',$id);
      if (!empty($id)) {
        $id = reset($id);
        $transformed_content = wp_get_attachment_url($id);  
         return $transformed_content;
      }
    }
  }
 
}

/**
 * return a gallery image inside a post
 */
function auckland_catch_gallery_image_full()  { 
    global $post;
    $gallery = get_post_gallery( $post, false );
    if ( !empty($gallery['ids']) ) {
      $ids = explode( ",", $gallery['ids'] );
      $total_images = 0;
      foreach( $ids as $id ) {
        $link = wp_get_attachment_url( $id );
        $total_images++;
        
        if ($total_images == 1) {
          $first_img = $link;
          return $first_img;
        }
      }
    } 
}

/**
 * return a gallery image inside a post (thumb)
 */
function auckland_catch_gallery_image_thumb()  { 
    global $post;
    $gallery = get_post_gallery( $post, false );
    if ( !empty($gallery['ids']) ) {
      $ids = explode( ",", $gallery['ids'] );
      $total_images = 0;
      foreach( $ids as $id ) {
        
        $image  = wp_get_attachment_image( $id, 'thumbnail');
        $total_images++;
        
        if ($total_images == 1) {
          $first_img = $image;
          return $first_img;
        }
      }
    } 
}


/**
 * Show pagination
 */
function auckland_show_posts_nav() {
  global $wp_query;
  return ($wp_query->max_num_pages > 1);
}

function auckland_pagination( $query=null ) {
 
    global $wp_query;
    $query = $query ? $query : $wp_query;
    $big = 999999999;

    $paginate = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'type' => 'array',
        'total' => $query->max_num_pages,
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'prev_text' => __('&laquo;','auckland'),
        'next_text' => __('&raquo;','auckland'),
        )
    );

    if ($query->max_num_pages > 1) :
        ?>
        <div class="post-pagination">
          <ul class="pagination">
          <?php
              foreach ( $paginate as $page ) {
              echo '<li>' . $page . '</li>';
              }
          ?>
          </ul>
        </div>
    <?php
    endif;
}


/**
 * reoder comment form fields
 */
function auckland_move_comment_field_to_bottom( $fields ) {
  $comment_field = $fields['comment'];
  unset( $fields['comment'] );
  $fields['comment'] = $comment_field;
  return $fields;
}

add_filter( 'comment_form_fields', 'auckland_move_comment_field_to_bottom' );