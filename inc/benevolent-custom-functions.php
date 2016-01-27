<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Benevolent
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function benevolent_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'benevolent_body_classes' );

/**
 * benevolent_excerpt can truncate a string up to a number of characters while preserving whole words and HTML tags
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
function benevolent_excerpt($text, $length = 100, $ending = '...', $exact = false, $considerHtml = true) {
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
 
function benevolent_breadcrumbs_cb() {
 
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = esc_html( get_theme_mod( 'benevolent_breadcrumb_separator', __( '>', 'benevolent' ) ) ); // delimiter between crumbs
  $home = esc_html( get_theme_mod( 'benevolent_breadcrumb_home_text', __( 'Home', 'benevolent' ) ) ); // text for the 'Home' link
  $showCurrent = get_theme_mod( 'benevolent_ed_current', '1' ); // 1 - show current post/page title in breadcrumbs, 0 - don't show
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
      echo $before . esc_html__( 'Search Result', 'benevolent' ) . $after;
 
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
      echo __( 'Page', 'benevolent' ) . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
} // end benevolent_breadcrumbs()

add_action( 'benevolent_breadcrumbs', 'benevolent_breadcrumbs_cb' );

/** Filter for Body Class **/
function benevolent_layout_class( $benevolent_classes ){
	global $post;
    $benevolent_ed_slider = get_theme_mod( 'benevolent_ed_slider' );
	if( is_404()){
		$benevolent_classes[] = '';
	}elseif( !( is_active_sidebar( 'right-sidebar' )) || is_page_template( 'template-home.php' ) || is_search() ) {
		$benevolent_classes[] = 'full-width';	
	}elseif(is_singular()){
		$benevolent_post_class = get_post_meta( $post->ID, 'benevolent_sidebar_layout', true );
        if( $benevolent_post_class == 'no-sidebar' )
		$benevolent_classes[] = 'full-width';
	}elseif( $benevolent_ed_slider ){
	   $benevolent_classes[] = 'has-slider';
	}else{
	   $benevolent_classes[] = '';
	}
    
	return $benevolent_classes;
}

add_filter( 'body_class', 'benevolent_layout_class' );

/** 
 * Hook to move comment text field to the bottom in WP 4.4 
 *
 * @link http://www.wpbeginner.com/wp-tutorials/how-to-move-comment-text-field-to-bottom-in-wordpress-4-4/  
 */
function benevolent_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter( 'comment_form_fields', 'benevolent_move_comment_field_to_bottom' );

/**
 * Callback function for Comment List *
 * 
 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments 
 */
 
 function benevolent_theme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	
    <footer class="comment-meta">
    
        <div class="comment-author vcard">
    	<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    	<?php printf( __( '<b class="fn">%s</b>', 'benevolent' ), get_comment_author_link() ); ?>
    	</div>
    	<?php if ( $comment->comment_approved == '0' ) : ?>
    		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'benevolent' ); ?></em>
    		<br />
    	<?php endif; ?>
    
    	<div class="comment-metadata commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><time datetime="<?php comment_date(); ?>">
    		<?php
    			/* translators: 1: date, 2: time */
    			printf( __( '%s', 'benevolent' ), get_comment_date() ); ?></time></a><?php edit_comment_link( __( '(Edit)', 'benevolent' ), '  ', '' );
    		?>
    	</div>
    </footer>
    
    <div class="comment-content"><?php comment_text(); ?></div>

	<div class="reply">
	<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}

/** Fuction to get Sections */
 function benevolent_get_sections(){
    
    $benevolent_sections = array( 
        'intro-section' => array(
            'class' => 'intro',
            'id'    => 'intro'    
        ),
        'community-section' => array(
            'class' => 'our-community',
            'id'    => 'community'
        ),
        'stats-section' => array(
            'class' => 'stats',
            'id'    => 'stats'
        ),
        'blog-section' => array(
            'class' => 'blog-section',
            'id'    => 'blog'
        ),
        'sponsor-section' => array(
            'class' => 'sponsors',
            'id'    => 'sponsor'
        )              
    );
    
    
    $benevolent_enabled_section = array();
    foreach ( $benevolent_sections as $benevolent_section ) {
        
        if ( esc_attr( get_theme_mod( 'benevolent_ed_' . $benevolent_section['id'] . '_section' ) ) == 1 ){
            $benevolent_enabled_section[] = array(
                'id' => $benevolent_section['id'],
                'class' => $benevolent_section['class']
            );
        }
    }
    return $benevolent_enabled_section;
 }
 
 /** Callback for Banner Slider */
 function benevolent_slider_cb(){
    $benevolent_slider_caption = get_theme_mod( 'benevolent_slider_caption', '1' );
    $benevolent_slider_readmore = get_theme_mod( 'benevolent_slider_readmore', __( 'Learn More', 'benevolent' ) );
    $benevolent_slider_cat = get_theme_mod( 'benevolent_slider_cat' );
    
    if( $benevolent_slider_cat ){
        $slider_qry = new WP_Query( array( 
            'post_type'             => 'post', 
            'post_status'           => 'publish',
            'posts_per_page'        => -1,                    
            'cat'                   => $benevolent_slider_cat,
            'ignore_sticky_posts'   => true
        ) );
        if( $slider_qry->have_posts() ){
            echo '<div class="banner"><div class="flexslider"><ul class="slides">';
            
            while( $slider_qry->have_posts()) {
                $slider_qry->the_post();
                if( has_post_thumbnail() ){
                ?>
    			<li>
    				<?php 
                    the_post_thumbnail( 'benevolent-slider' ); 
                    if( $benevolent_slider_caption ){
                    ?>
                    <div class="banner-text">
    					<div class="container">
    						<div class="text">
    							<strong class="main-title"><?php the_title(); ?></strong>
    							<?php echo wpautop( benevolent_excerpt( get_the_content(), 75, '.', false, false ) ); ?>
    							<a href="<?php the_permalink(); ?>" class="btn-learn"><?php echo esc_html( $benevolent_slider_readmore );?></a>
    						</div>
    					</div>
    				</div>
                    <?php
                    }
                    ?>
    			</li>
                <?php 
                }
            } 
            echo '</ul></div></div>';
            wp_reset_postdata(); 
        }
    }   
 }
 
 add_action( 'benevolent_slider', 'benevolent_slider_cb' );
 
 /** Callback Function for Promotional Block */
 function benevolent_promotional_cb(){
    $benevolent_ed_promotional_section = get_theme_mod( 'benevolent_ed_promotional_section' );
    $benevolent_promotional_section_title = get_theme_mod( 'benevolent_promotional_section_title' );
    $benevolent_promotional_button_text = get_theme_mod( 'benevolent_promotional_button_text' );
    $benevolent_promotional_button_url = get_theme_mod( 'benevolent_promotional_button_url' );
    $benevolent_promotional_section_bg = get_theme_mod( 'benevolent_promotional_section_bg' );
    
    if( $benevolent_ed_promotional_section ){
    ?>
    <div class="promotional-block" <?php if( $benevolent_promotional_section_bg ) echo 'style="background: url(' . esc_url( $benevolent_promotional_section_bg ) . '); background-size: cover; background-repeat: no-repeat; background-position: center;"';?>>
			<div class="container">
				<div class="text">
					<?php 
                    if( $benevolent_promotional_section_title ) echo '<h3 class="title">' . esc_html( $benevolent_promotional_section_title ) . '</h3>';
					if( $benevolent_promotional_button_url ) echo '<a href="' . esc_url( $benevolent_promotional_button_url ) . '" class="btn-donate" target="_blank">' . esc_html( $benevolent_promotional_button_text ) . '</a>';
                    ?>
				</div>
			</div>
		</div>
    <?php
    }
 }
 
 add_action( 'benevolent_promotional', 'benevolent_promotional_cb' );