<?php 

/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Bakes And Cakes
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function bakes_and_cakes_body_classes( $classes ) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'group-blog';
    }

    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }
    if( is_404() ) {
      $classes[] = 'error';
    }
    global $post;
    if( !( is_active_sidebar( 'right-sidebar' ) ) ) {
        $classes[] = 'full-width'; 
    }elseif(is_singular()){
        $bakes_and_cakes_post_class = get_post_meta( $post->ID, 'bakes_and_cakes_sidebar_layout', true );
        if( $bakes_and_cakes_post_class == 'no-sidebar' )
        $classes[] = 'full-width';
    }else{
       $classes[] = '';
    }

    return $classes;
}
add_filter( 'body_class', 'bakes_and_cakes_body_classes' );

/**
 * bakes_and_cakes_excerpt can truncate a string up to a number of characters while preserving whole words and HTML tags
 *
 * @param string $text String to truncate.
 * @param integer $length Length of returned string, including ellipsis.
 * @param string $ending Ending to be appended to the trimmed string.
 * @param boolean $exact If false, $text will not be cut mid-word
 * @param boolean $considerHtml If true, HTML tags would be handled correctly
 *
 * @return string Trimmed string.
 * 
 * @link http://alanwhipple.com/2011/05/25/php-truncate-string-preserving-html-tags-words/
 */
function bakes_and_cakes_excerpt($text, $length = 100, $ending = '...', $exact = false, $considerHtml = true) {
    if ($considerHtml) {
        // if the plain text is shorter than the maximum length, return the whole text
        if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
            return $text;
        }
        // splits all html-tags to scanable lines
        preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
        $total_length = strlen($ending);
        $open_tags = array();
        $truncate = '';
        foreach ($lines as $line_matchings) {
            // if there is any html-tag in this line, handle it and add it (uncounted) to the output
            if (!empty($line_matchings[1])) {
                // if it's an "empty element" with or without xhtml-conform closing slash
                if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
                    // do nothing
                // if tag is a closing tag
                } else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
                    // delete tag from $open_tags list
                    $pos = array_search($tag_matchings[1], $open_tags);
                    if ($pos !== false) {
                    unset($open_tags[$pos]);
                    }
                // if tag is an opening tag
                } else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
                    // add tag to the beginning of $open_tags list
                    array_unshift($open_tags, strtolower($tag_matchings[1]));
                }
                // add html-tag to $truncate'd text
                $truncate .= $line_matchings[1];
            }
            // calculate the length of the plain text part of the line; handle entities as one character
            $content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
            if ($total_length+$content_length> $length) {
                // the number of characters which are left
                $left = $length - $total_length;
                $entities_length = 0;
                // search for html entities
                if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
                    // calculate the real length of all entities in the legal range
                    foreach ($entities[0] as $entity) {
                        if ($entity[1]+1-$entities_length <= $left) {
                            $left--;
                            $entities_length += strlen($entity[0]);
                        } else {
                            // no more characters left
                            break;
                        }
                    }
                }
                $truncate .= substr($line_matchings[2], 0, $left+$entities_length);
                // maximum lenght is reached, so get off the loop
                break;
            } else {
                $truncate .= $line_matchings[2];
                $total_length += $content_length;
            }
            // if the maximum length is reached, get off the loop
            if($total_length>= $length) {
                break;
            }
        }
    } else {
        if (strlen($text) <= $length) {
            return $text;
        } else {
            $truncate = substr($text, 0, $length - strlen($ending));
        }
    }
    // if the words shouldn't be cut in the middle...
    if (!$exact) {
        // ...search the last occurance of a space...
        $spacepos = strrpos($truncate, ' ');
        if (isset($spacepos)) {
            // ...and cut the text in this position
            $truncate = substr($truncate, 0, $spacepos);
        }
    }
    // add the defined ending to the text
    $truncate .= $ending;
    if($considerHtml) {
        // close all unclosed html-tags
        foreach ($open_tags as $tag) {
            $truncate .= '</' . $tag . '>';
        }
    }
    return $truncate;
}

/**
 * Custom Bread Crumb
 *
 * @link http://www.qualitytuts.com/wordpress-custom-breadcrumbs-without-plugin/
 */
 
function bakes_and_cakes_breadcrumbs_cb() {
 
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = esc_html( get_theme_mod( 'bakes_and_cakes_breadcrumb_separator', __( '>', 'bakes-and-cakes' ) ) ); // delimiter between crumbs
  $home = esc_html( get_theme_mod( 'bakes_and_cakes_breadcrumb_home_text', __( 'Home', 'bakes-and-cakes' ) ) ); // text for the 'Home' link
  $showCurrent = get_theme_mod( 'bakes_and_cakes_ed_current', '1' ); // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  global $post;
  $homeLink = esc_url( home_url( ) );
 
  if (is_home() || is_front_page()) {
 
    if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
 
  } else {
 
    echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . single_cat_title('', false) . $after;
 
    } elseif ( is_search() ) {
      echo $before . esc_html__( 'Search Result', 'bakes-and-cakes' ) . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . esc_url( get_year_link( get_the_time('Y') ) ) . '">' . esc_html( get_the_time('Y') ) . '</a> ' . $delimiter . ' ';
      echo '<a href="' . esc_url( get_month_link( get_the_time('Y'), get_the_time('m') ) ) . '">' . esc_html( get_the_time('F') ) . '</a> ' . $delimiter . ' ';
      echo $before . esc_html( get_the_time('d') ) . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . esc_url( get_year_link( get_the_time('Y') ) ) . '">' . esc_html( get_the_time('Y') ) . '</a> ' . $delimiter . ' ';
      echo $before . esc_html( get_the_time('F') ) . $after;
 
    } elseif ( is_year() ) {
      echo $before . esc_html( get_the_time('Y') ) . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . esc_html( $post_type->labels->singular_name ) . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . esc_html( get_the_title() ) . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . esc_html( get_the_title() ) . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . esc_html( $post_type->labels->singular_name ) . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . esc_url( get_permalink($parent) ) . '">' . esc_html( $parent->post_title ) . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . esc_html( get_the_title() ) . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . esc_html( get_the_title() ) . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . esc_url( get_permalink($page->ID) ) . '">' . esc_html( get_the_title( $page->ID ) ) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . esc_html( get_the_title() ) . $after;
 
    } elseif ( is_tag() ) {
      echo $before . esc_html( single_tag_title('', false) ) . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . esc_html( $userdata->display_name ) . $after;
 
    } 
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __( 'Page', 'bakes-and-cakes' ) . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
} // end bakes_and_cakes_breadcrumbs()

add_action( 'bakes_and_cakes_breadcrumbs', 'bakes_and_cakes_breadcrumbs_cb' );



/** Callback for Social Links */
 function bakes_and_cakes_social_cb(){
    $bakes_and_cakes_facebook = get_theme_mod('bakes-and-cakes_facebook');
    $bakes_and_cakes_twitter = get_theme_mod('bakes-and-cakes_twitter');
    $bakes_and_cakes_instagram = get_theme_mod('bakes-and-cakes_instagram');
    $bakes_and_cakes_youtube = get_theme_mod('bakes-and-cakes_youtube');
    $bakes_and_cakes_linkedin = get_theme_mod('bakes-and-cakes_linkedin');
    
    if( $bakes_and_cakes_facebook || $bakes_and_cakes_twitter || $bakes_and_cakes_instagram || $bakes_and_cakes_youtube || $bakes_and_cakes_linkedin ){
    ?>
    <div class="widget">
    <ul class="social-networks">
		<?php if($bakes_and_cakes_facebook){?>
            <li><a href="<?php echo esc_url($bakes_and_cakes_facebook);?>" target="_blank" title="<?php esc_html_e( 'Facebook', 'bakes-and-cakes' ); ?>"><span class="fa fa-facebook"></span></a></li>
         <?php } if($bakes_and_cakes_instagram){?>
            <li><a href="<?php echo esc_url($bakes_and_cakes_instagram);?>" target="_blank" title="<?php esc_html_e( 'Instagram', 'bakes-and-cakes' ); ?>"><span class="fa fa-instagram"></span></a></li>
		<?php } if($bakes_and_cakes_twitter){?>    
            <li><a href="<?php echo esc_url($bakes_and_cakes_twitter);?>" target="_blank" title="<?php esc_html_e( 'Twitter', 'bakes-and-cakes' ); ?>"><span class="fa fa-twitter"></span></a></li>
            <?php } if($bakes_and_cakes_youtube){?>
            <li><a href="<?php echo esc_url($bakes_and_cakes_youtube);?>" target="_blank" title="<?php esc_html_e( 'Youtube', 'bakes-and-cakes' ); ?>"><span class="fa fa-youtube-play"></span></a></li>
		<?php } if($bakes_and_cakes_linkedin){?>
            <li><a href="<?php echo esc_url($bakes_and_cakes_linkedin);?>" target="_blank" title="<?php esc_html_e( 'LinkedIn', 'bakes-and-cakes' ); ?>"><span class="fa fa-linkedin"></span></a></li>
        <?php } ?>
	</ul>
  </div>
    <?php
    }
 }
 
 add_action( 'bakes_and_cakes_social', 'bakes_and_cakes_social_cb' );

?>