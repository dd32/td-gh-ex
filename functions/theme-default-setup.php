<?php

/*
 * advent Main Sidebar
 */

function advent_widgets_init() {

    register_sidebar(array(
        'name' => __('Main Sidebar', 'advent'),
        'id' => 'sidebar-1',
        'description' => __('Main sidebar that appears on the right.', 'advent'),
        'before_widget' => '<aside id="%1$s" class="sidebar-widget widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="sidebar-widget"><h3>',
        'after_title' => '</h3></div>',
    ));
}

add_action('widgets_init', 'advent_widgets_init');

/**
 * Set up post entry meta.    
 * Meta information for current post: categories, tags, permalink, author, and date.    
 * */
if (!function_exists('advent_entry_meta')) :

    function advent_entry_meta() {
        $advent_category_list = get_the_category_list();
        $advent_author = sprintf('<a href="%1$s" title="%2$s" >%3$s</a>', esc_url(get_author_posts_url(get_the_author_meta('ID'))), esc_attr(ucwords(get_the_author())), ucwords(get_the_author()));

        if ($advent_category_list != '') {
            $advent_category_list = sprintf('<li>' . __('Post in :', 'advent') . '</li>  %1$s', get_the_category_list(' , ',''));
        }
        $advent_tag_list = sprintf('%1$s', get_the_tag_list('<li>' . __('Tags : ', 'advent') . '</li> ', ', '));
        $advent_date = sprintf('<li><time datetime="%3$s">%4$s</time></li>', esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))), esc_attr(get_the_time()), esc_attr(get_the_date('c')), esc_html(get_the_date('M d, Y')));
        printf('%1$s %2$s  %3$s %4$s', $advent_author, $advent_date, $advent_category_list, $advent_tag_list);
        echo '<li>';
        $advent_comment = comments_number(__('No Comments', 'advent'), __('1 Comment', 'advent'), __('% Comments', 'advent'));
        echo '</li>';
        }

endif;



/*
  advent Title
 */

function advent_wp_title($title, $sep) {
    global $paged, $page;

    if (is_feed()) {
        return $title;
    }

    // Add the site name.
    $title .= get_bloginfo('name', 'display');

    // Add the site description for the home/front page.
    $advent_site_description = get_bloginfo('description', 'display');
    if ($advent_site_description && ( is_home() || is_front_page() )) {
        $title = "$title $sep $advent_site_description";
    }

    // Add a page number if necessary.
    if ($paged >= 2 || $page >= 2) {
        $title = "$title $sep " . sprintf(__('Page %s', 'advent'), max($paged, $page));
    }

    return $title;
}

add_filter('wp_title', 'advent_wp_title', 10, 2);


