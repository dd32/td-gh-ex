<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package aari
 */
function gutenbergtheme_body_classes($classes) {
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    return $classes;
}

add_filter('body_class', 'gutenbergtheme_body_classes');

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function gutenbergtheme_pingback_header() {
    if (is_singular() && pings_open()) {
        echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
    }
}

add_action('wp_head', 'gutenbergtheme_pingback_header');

/*
 * Fatch related post data
 */

if (!function_exists('aari_related_posts')) :

    function aari_related_posts($display = 'category', $qty = 5, $images = true, $title = 'Related Posts') {
        global $post;
        $show = false;
        $post_qty = (int) $qty;
        switch ($display) :
            case 'tag':
                $tags = wp_get_post_tags($post->ID);
                if ($tags) {
                    $show = true;
                    $tag_ids = array();
                    foreach ($tags as $individual_tag) {
                        $tag_ids[] = $individual_tag->term_id;
                    }
                    $args = array(
                        'tag__in' => $tag_ids,
                        'post__not_in' => array($post->ID),
                        'posts_per_page' => $post_qty,
                        'ignore_sticky_posts' => 1
                    );
                }
                break;
            default :
                $categories = get_the_category($post->ID);
                if ($categories) {
                    $show = true;
                    $category_ids = array();
                    foreach ($categories as $individual_category) {
                        $category_ids[] = $individual_category->term_id;
                    }
                    $args = array(
                        'category__in' => $category_ids,
                        'post__not_in' => array($post->ID),
                        'showposts' => $post_qty,
                        'ignore_sticky_posts' => 1
                    );
                }
        endswitch;
        if ($show == true) {
            $related = new wp_query($args);
            if ($related->have_posts()) {
                $layout = '<section class="related_posts section-padding">';
                $layout .= '<div class="container">';
                $layout .= '<div class="row">';
                $layout .= '<h4 class="col-12 title text-center mb-50"> <span>' . strip_tags($title) . '</span></h4>';

                while ($related->have_posts()) {
                    $related->the_post();
                    $layout .= ' <div class="col-lg-4">';
                    $layout .= '<div class="related_posts_item">';
                    if ($images == true) {
                        $layout .= '<a class="post_card_thumbnail" href="' . esc_url(get_permalink()) . '" title="' . esc_attr(get_the_title()) . '">' . get_the_post_thumbnail() . '</a>';
                    }
                    $layout .= '<div class="post_card_body">';
                    $layout .= '<h3 class="post_card_title"><a href="' . esc_url(get_permalink()) . '">' . esc_attr(get_the_title()) . '</a></h3>';
                    $layout .= ' <div class="post_card_meta">' . aari_related_post_ext() . '</div>';
                    $layout .= '</div>';
                    $layout .= '</div>';
                    $layout .= '</div>';
                }

                $layout .= '</div>';
                $layout .= '</div>';
                $layout .= '</section>';
                echo $layout;
            }
            wp_reset_query();
        }
    }

endif;






/* * *
 * Wordpress number pagination
 * * */
if (!function_exists('aari_number_paging_nav')) :

    function aari_number_paging_nav() {

        // Don't print empty markup if there's only one page.
        if ($GLOBALS['wp_query']->max_num_pages < 2) {
            return;
        }

        $paged = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
        $pagenum_link = html_entity_decode(get_pagenum_link());
        $query_args = array();
        $url_parts = explode('?', $pagenum_link);

        if (isset($url_parts[1])) {
            wp_parse_str($url_parts[1], $query_args);
        }

        $pagenum_link = remove_query_arg(array_keys($query_args), $pagenum_link);
        $pagenum_link = trailingslashit($pagenum_link) . '%_%';

        $format = $GLOBALS['wp_rewrite']->using_index_permalinks() && !strpos($pagenum_link, 'index.php') ? 'index.php/' : '';
        $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit('page/%#%', 'paged') : '?paged=%#%';

        // Set up paginated links.
        $links = paginate_links(array(
            'base' => $pagenum_link,
            'format' => $format,
            'total' => $GLOBALS['wp_query']->max_num_pages,
            'current' => $paged,
            'mid_size' => 1,
            'add_args' => array_map('urlencode', $query_args),
            'prev_text' => __('', 'aari'),
            'next_text' => __('', 'aari'),
        ));

        if ($links) :

            $layout = '<div class="ogato-pagination text-center">';
            $layout .= '<nav class="navigation pagination">';
            $layout .= '<div class="nav-links">';
            $layout .= $links;
            $layout .= '</div>';
            $layout .= '</nav>';
            $layout .= '</div>';

            echo $layout;

        endif;
    }

endif;



/**
 * breadcrumbs
 */
if (!function_exists('aari_breadcrumbs')) :

    function aari_breadcrumbs() {
        /* === OPTIONS === */
        $text['home'] = 'Home'; // text for the 'Home' link
        $text['category'] = 'Archive by Category "%s"'; // text for a category page
        $text['search'] = 'Search Results for "%s"'; // text for a search results page
        $text['tag'] = 'Posts Tagged "%s"'; // text for a tag page
        $text['author'] = 'Articles Posted by %s'; // text for an author page
        $text['404'] = 'Error 404'; // text for the 404 page
        $show_current = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show
        $show_on_home = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
        $show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
        $show_title = 1; // 1 - show the title for the links, 0 - don't show
        $delimiter = ' &raquo; '; // delimiter between crumbs
        $before = '<span class="current">'; // tag before the current crumb
        $after = '</span>'; // tag after the current crumb
        /* === END OF OPTIONS === */
        global $post;
        $home_link = home_url('/');
        $link_before = '<span typeof="v:Breadcrumb">';
        $link_after = '</span>';
        $link_attr = ' rel="v:url" property="v:title"';
        $link = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
        $post == is_singular() ? get_queried_object() : false;
        if ($post) {
            $parent_id = $parent_id_2 = $post->post_parent;
        } else {
            $parent_id = $parent_id_2 = 0;
        }
        $frontpage_id = get_option('page_on_front');
        if (is_home() || is_front_page()) {
            if ($show_on_home == 1)
                echo '<div class="breadcrumbs"><a href="' . $home_link . '">' . $text['home'] . '</a></div>';
        } else {
            echo '<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">';
            if ($show_home_link == 1) {
                echo '<a href="' . $home_link . '" rel="v:url" property="v:title">' . $text['home'] . '</a>';
                if ($frontpage_id == 0 || $parent_id != $frontpage_id)
                    echo $delimiter;
            }
            if (is_category()) {
                $this_cat = get_category(get_query_var('cat'), false);
                if ($this_cat->parent != 0) {
                    $cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
                    if ($show_current == 0)
                        $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                    $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
                    $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                    if ($show_title == 0)
                        $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                    echo $cats;
                }
                if ($show_current == 1)
                    echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
            } elseif (is_search()) {
                echo $before . sprintf($text['search'], get_search_query()) . $after;
            } elseif (is_day()) {
                echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
                echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F')) . $delimiter;
                echo $before . get_the_time('d') . $after;
            } elseif (is_month()) {
                echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
                echo $before . get_the_time('F') . $after;
            } elseif (is_year()) {
                echo $before . get_the_time('Y') . $after;
            } elseif (is_single() && !is_attachment()) {
                if (get_post_type() != 'post') {
                    $post_type = get_post_type_object(get_post_type());
                    $slug = $post_type->rewrite;
                    printf($link, $home_link . $slug['slug'] . '/', $post_type->labels->singular_name);
                    if ($show_current == 1)
                        echo $delimiter . $before . get_the_title() . $after;
                } else {
                    $cat = get_the_category();
                    $cat = $cat[0];
                    $cats = get_category_parents($cat, TRUE, $delimiter);
                    if ($show_current == 0)
                        $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                    $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
                    $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                    if ($show_title == 0)
                        $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                    echo $cats;
                    if ($show_current == 1)
                        echo $before . get_the_title() . $after;
                }
            } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
                $post_type = get_post_type_object(get_post_type());
                echo $before . $post_type->labels->singular_name . $after;
            } elseif (is_attachment()) {
                $parent = get_post($parent_id);
                $cat = get_the_category($parent->ID);
                if (isset($cat[0])) {
                    $cat = $cat[0];
                }
                if ($cat) {
                    $cats = get_category_parents($cat, TRUE, $delimiter);
                    $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
                    $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                    if ($show_title == 0)
                        $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                    echo $cats;
                }
                printf($link, get_permalink($parent), $parent->post_title);
                if ($show_current == 1)
                    echo $delimiter . $before . get_the_title() . $after;
            } elseif (is_page() && !$parent_id) {
                if ($show_current == 1)
                    echo $before . get_the_title() . $after;
            } elseif (is_page() && $parent_id) {
                if ($parent_id != $frontpage_id) {
                    $breadcrumbs = array();
                    while ($parent_id) {
                        $page = get_page($parent_id);
                        if ($parent_id != $frontpage_id) {
                            $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                        }
                        $parent_id = $page->post_parent;
                    }
                    $breadcrumbs = array_reverse($breadcrumbs);
                    for ($i = 0; $i < count($breadcrumbs); $i++) {
                        echo $breadcrumbs[$i];
                        if ($i != count($breadcrumbs) - 1)
                            echo $delimiter;
                    }
                }
                if ($show_current == 1) {
                    if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id))
                        echo $delimiter;
                    echo $before . get_the_title() . $after;
                }
            } elseif (is_tag()) {
                echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
            } elseif (is_author()) {
                global $author;
                $userdata = get_userdata($author);
                echo $before . sprintf($text['author'], $userdata->display_name) . $after;
            } elseif (is_404()) {
                echo $before . $text['404'] . $after;
            } elseif (has_post_format() && !is_singular()) {
                echo get_post_format_string(get_post_format());
            }
            if (get_query_var('paged')) {
                if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                    echo ' (';
                echo __('Page','aari') . ' ' . get_query_var('paged');
                if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                    echo ')';
            }
            echo '</div><!-- .breadcrumbs -->';
        }
    }

// end dimox_breadcrumbs()
endif;





/*
 * Change archive page title
 */

add_filter('get_the_archive_title', function ($title) {

    if (is_category()) {

        $title = single_cat_title('', false);
    } elseif (is_tag()) {

        $title = single_tag_title('', false);
    } elseif (is_author()) {

        $title = '<span class="vcard">' . get_the_author() . '</span>';
    }

    return $title;
});


/*
 * Remove migrate js
 */

function aari_dequeue_jquery_migrate($scripts) {
    if (!is_admin() && !empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff(
                $scripts->registered['jquery']->deps, ['jquery-migrate']
        );
    }
}

add_action('wp_default_scripts', 'aari_dequeue_jquery_migrate');
