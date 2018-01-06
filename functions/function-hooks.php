<?php
global $post;


/**
* Filter the except length to 20 characters.
*
* @param int $length Excerpt length.
* @return int (Maybe) modified excerpt length.
*/
function bestblog_custom_excerpt_length($length)
{
    return 40;
}
add_filter('excerpt_length', 'bestblog_custom_excerpt_length', 999);


/**
* Filter the excerpt "read more" string.
*
* @param string $more "Read more" excerpt string.
* @return string (Maybe) modified "read more" excerpt string.
*/
function bestblog_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'bestblog_excerpt_more');

/**
 * Link thumbnails to their posts based on attr
 *
 * @param $html
 * @param int $pid
 * @param int $post_thumbnail_id
 * @param int $size
 * @param array $attr
 *
 * @return string
 */

function bestblog_filter_post_thumbnail_html( $html, $pid, $post_thumbnail_id, $size, $attr ) {

     if ( ! empty( $attr[ 'link_thumbnail' ] ) ) {

        $html = sprintf(
            '<a class="img-link" href="%s" title="%s" rel="nofollow"><span class="thumbnail-resize" >%s</span></a>',
            esc_url(get_permalink( $pid )),
            esc_attr( get_the_title( $pid ) ),
            $html
        );
     }

    return $html;
}

add_filter( 'post_thumbnail_html', 'bestblog_filter_post_thumbnail_html', 10, 5 );


/**
* comments meta
*/
if (! function_exists('bestblog_meta_comment')) :
function bestblog_meta_comment()
{
    if (! post_password_required() && (comments_open() || get_comments_number())) {
        echo '<span class="comments-link">';
        /* translators: %s: post title */
        comments_popup_link(sprintf(wp_kses(__('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'best-blog'), array( 'span' => array( 'class' => array() ) )), get_the_title()));
        echo '</span>';
    }
}
endif;



/**
* Prints categories list.
*/
if (! function_exists('bestblog_category_list')) :
function bestblog_category_list()
{
    $categories = get_the_category();

    $output = '';
    if (is_single()) {
        $separator = '';
        if (! empty($categories)) {
            foreach ($categories as $category) {
                $output .=
                '<a class="button secondary radius " href="' . esc_url(get_category_link($category->term_id)) .
                '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'best-blog'), $category->name)) . '">' . esc_html($category->name) . '</a>' . $separator;
            }
        }
    } else {
        $separator = '';
        if (! empty($categories)) {
            foreach ($categories as $category) {
                $output .=
                '<a class="hollow button secondary radius " href="' . esc_url(get_category_link($category->term_id)) .
                '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'best-blog'), $category->name)) . '">' . esc_html($category->name) . '</a>' . $separator;
            }
        }
    }
    echo trim($output, $separator);
}
endif;

// Print categories for slider_setup

if (! function_exists('bestblog_category_slider')) :
function bestblog_category_slider()
{
    $categories = get_the_category();

    $output = '';

        $separator = '';
        if (! empty($categories)) {
            foreach ($categories as $category) {
                $output .=
                '<a class="button secondary radius " href="' . esc_url(get_category_link($category->term_id)) .
                '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'best-blog'), $category->name)) . '">' . esc_html($category->name) . '</a>' . $separator;
            }
        }
    echo trim($output, $separator);
}
endif;

// Print categories for widgets
if (! function_exists('bestblog_category_widgtesmission')) :
function bestblog_category_widgtesmission()
{
    $categories = get_the_category();

    $output = '';

        $separator = '';
        if (! empty($categories)) {
            foreach ($categories as $category) {
                $output .=
                '<a class="secondary" href="' . esc_url(get_category_link($category->term_id)) .
                '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'best-blog'), $category->name)) . '">' . esc_html($category->name) . '</a>' . $separator;
            }
        }
    echo trim($output, $separator);
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
        $tags_list = get_the_tag_list('<sapn class="button-group"><button class="hollow button secondary radius">', '</button><button class="hollow button secondary radius">', '</button></span>');
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



if (! function_exists('bestblog_time_link')) :
/**
* Gets a nicely formatted string for the published date.
*/
function bestblog_time_link()
{
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    $time_string = sprintf(
      $time_string,
      get_the_date(DATE_W3C),
      get_the_date(),
      get_the_modified_date(DATE_W3C),
      get_the_modified_date()
    );
    $archive_year  = get_the_time('Y');
    $archive_month = get_the_time('m');


    // Wrap the time string in a link, and preface it with 'Posted on'.
    return sprintf(
      /* translators: %s: post date */
      __('<span class="screen-reader-text">Posted on</span> %s', 'best-blog'),
      '<span class="meta-info meta-info-date is-font-size-6"> <a href="' . esc_url(get_month_link($archive_year, $archive_month)) . '" rel="bookmark">' . $time_string . '</a></span>'
    );
}
endif;

/* Function which displays your post date in time ago format */
function bestblog_time_ago() {
	return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.esc_html__( 'ago','best-blog' );
}

if (! function_exists('bestblog_author_bio')) :

function bestblog_author_bio()
{
    // Post meta author
    $author = sprintf(
      esc_html_x('Posts by: %s', 'post author', 'best-blog'),
      esc_html(get_the_author())
    );
    echo  $author ;
}
endif;
/**
* Post page title “Category:”, “Tag:”, “Author:”, “Archives:” and “Other taxonomy name:”
*/
if (! function_exists('bestblog_getpost_page_title')) :
function bestblog_getpost_page_title()
{
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = bestblog_author_bio();
    } elseif (is_archive()) {
        $title = the_archive_title();
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    } elseif (is_search()) {
        $title  = sprintf(esc_html__('Search Results for: %s', 'best-blog'), esc_html(get_search_query()));
    }
    return $title;
}
endif;

/**
* Post page main title “Category:”, “Tag:”, “Author:”, “Archives:” and “Other taxonomy name:”
*/
if (! function_exists('bestblog_mainpost_page_title')) :
function bestblog_mainpost_page_title()
{
    echo '<div id="sub_banner">';
    echo '<div class="top-bar">';
    echo '<div class="top-bar-left">';
    echo '<div class="top-bar-title">';
    echo '<h1 class="subheader">';
    echo bestblog_getpost_page_title();
    echo '</h1>';
    echo '</div>';
    echo '</div>';
    echo '<div class="top-bar-right">';
    echo '<div class="breadcrumb-wrap">';
    echo bestblog_breadcrumb();
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
endif;

/**
* Converts Hex color code into RGB
*
* @param  string $color    hex color code.
* @param  string $percentage rgba format.
* @return string         converted rgb value
*/
function bestblog_hex2rgba($color, $percentage = 0.5)
{
    $color = trim($color, '#');

    if (strlen($color) === 3) {
        $r = hexdec(substr($color, 0, 1) . substr($color, 0, 1));
        $g = hexdec(substr($color, 1, 1) . substr($color, 1, 1));
        $b = hexdec(substr($color, 2, 1) . substr($color, 2, 1));
    } elseif (strlen($color) === 6) {
        $r = hexdec(substr($color, 0, 2));
        $g = hexdec(substr($color, 2, 2));
        $b = hexdec(substr($color, 4, 2));
    } else {
        return $color;
    }

    return "rgba( $r, $g, $b, $percentage )";
}
