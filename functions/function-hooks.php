<?php

 /**
 * Link all post thumbnails to the post permalink.
 *
 * @param string $html          Post thumbnail HTML.
 * @param int    $post_id       Post ID.
 * @param int    $post_image_id Post image ID.
 * @return string Filtered post image HTML.
 */
function bestblog_post_image_html( $html, $post_id, $post_image_id ) {
    $html = ' <a href="' . esc_url(get_permalink( $post_id )) . '" alt="' . esc_attr( get_the_title( $post_id ) ) . '"> <span class="thumbnail-resize" > ' . $html . '</a> </span>';
    return $html;
}
add_filter( 'post_thumbnail_html', 'bestblog_post_image_html', 10, 3 );

/**
 * Prints categories list.
 */
 if (! function_exists('bestblog_category_list')) :
 function bestblog_category_list()
 {
     $categories = get_the_category();
     $separator = ' ';
     $output = '';
     if (! empty($categories)) {
         foreach ($categories as $category) {
             $output .=
              '<a class="hollow button secondary radius " href="' . esc_url(get_category_link($category->term_id)) .
              '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'best-blog'), $category->name)) . '">' . esc_html($category->name) . '</a>' . $separator;
         }
         echo trim($output, $separator);
     }
 }
  endif;

  /**
   * Prints first category link and name
   */
if (! function_exists('bestblog_firstcategory_link')) :
 function bestblog_firstcategory_link()
 {
     $categories = get_the_category();
     if (! empty($categories)) {
         echo  '<a class="cat-info-el" href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
     }
 }
endif;


if (! function_exists('bestblog_meta_tag')) :
/**
 * Prints HTML with meta information for the tags .
 */
function bestblog_meta_tag()
{
		// Hide category and tag text for pages.
		if ('post' === get_post_type()) {
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list();
				if ($tags_list) {
						echo '<span class="single-tag-text">';
						_e('Tagged:', 'best-blog');
						echo '</span>';
						echo $tags_list;
				}
		}
}
endif;

if (! function_exists('bestblog_edit_link')) :
/**
 * Prints HTML with meta information for the tags .
 */
function bestblog_edit_link()
{
edit_post_link(
		sprintf(
				/* translators: %s: Name of current post */
				esc_html__('Edit %s', 'best-blog'),
				the_title('<span class="screen-reader-text">"', '"</span>', false)
		),
		'<button class="hollow button secondary" >',
		'</button>'
);
}
endif;

if ( ! function_exists( 'bestblog_time_link' ) ) :
/**
 * Gets a nicely formatted string for the published date.
 */
function bestblog_time_link() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	$time_string = sprintf( $time_string,
		get_the_date( DATE_W3C ),
		get_the_date(),
		get_the_modified_date( DATE_W3C ),
		get_the_modified_date()
	);
  $archive_year  = get_the_time('Y');
  $archive_month = get_the_time('m');
  

	// Wrap the time string in a link, and preface it with 'Posted on'.
	return sprintf(
		/* translators: %s: post date */
		__( '<span class="screen-reader-text">Posted on</span> %s', 'best-blog' ),
		'<span class="meta-info meta-info-date is-font-size-6"> <a href="' . esc_url( get_month_link( $archive_year, $archive_month )) . '" rel="bookmark">' . $time_string . '</a></span>'
	);
}
endif;

/**
 * bestblog gradient color set .
 */
if (! function_exists('bestblog_gradient_color')) :

function bestblog_gradient_color()
{
 $saved_palette = get_theme_mod( 'my_setting', 'crazyorange' );
if ( 'crazyorange' == $saved_palette ) {
$background   = '#d38312';
$background_gradient   = '-webkit-linear-gradient(to right, #d38312, #a83279)';
$background_gradient_sf = 'linear-gradient(to right, #d38312, #a83279)';
}

 if ( 'endlessriver' == $saved_palette ) {
	$background   = '#43cea2';
	$background_gradient   = '-webkit-linear-gradient(to right, #43cea2, #185a9d)';
	$background_gradient_sf = 'linear-gradient(to right, #43cea2, #185a9d)';

	}
	if ( 'portrait' == $saved_palette ) {
 	$background   = '#8e9eab';
 	$background_gradient   = '-webkit-linear-gradient(to bottom, #8e9eab, #eef2f3)';
 	$background_gradient_sf = 'linear-gradient(to bottom, #8e9eab, #eef2f3)';
}
	if ( 'piglet' == $saved_palette ) {
 	$background   = '#ee9ca7';
 	$background_gradient   = '-webkit-linear-gradient(to bottom, #ee9ca7, #ffdde1)';
 	$background_gradient_sf = 'linear-gradient(to bottom, #ee9ca7, #ffdde1)';

 	}
	if ( 'reef' == $saved_palette ) {
 	$background   = '#00d2ff';
 	$background_gradient   = '-webkit-linear-gradient(to top, #00d2ff, #3a7bd5)';
 	$background_gradient_sf = 'linear-gradient(to top, #00d2ff, #3a7bd5)';

 	}

$styles = "background:{$background}; background:{$background_gradient}; background:{$background_gradient_sf};";
return $styles;
}
endif;


 /**
  * Post page title “Category:”, “Tag:”, “Author:”, “Archives:” and “Other taxonomy name:”
  */
if (! function_exists('bestblog_getpost_page_title')) :
function bestblog_getpost_page_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = $author_bio_avatar_size = apply_filters( 'bestblog_author_bio_avatar_size', 42 );
                 get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
                esc_attr__('Posts by ', 'best-blog'); get_the_author(); ;
    } elseif ( is_archive() ) {
        $title = the_archive_title(  );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
    elseif ( is_search() ) {
      $bestblog_header_title  = sprintf( esc_html__( 'Search Results for: %s', 'best-blog' ), esc_html( get_search_query() ) );
    }
    return $title;
}
endif;

/**
 * Post page main title “Category:”, “Tag:”, “Author:”, “Archives:” and “Other taxonomy name:”
 */
  if (! function_exists('bestblog_mainpost_page_title')) :
  function bestblog_mainpost_page_title( ) {
  echo '<div id="sub_banner">
          <div class="grid-container">
            <div class="top-bar">
              <div class="top-bar-left">
                <div class="top-bar-title">
                  <h1>';
                echo bestblog_getpost_page_title( $title );
                  echo'</h1>
                </div>
              </div>';
              echo'<div class="top-bar-right">
                <div class="breadcrumb-wrap">';
                echo bestblog_breadcrumb();
                echo'</div>
              </div>
            </div>
          </div>
        </div>';
}
endif;
