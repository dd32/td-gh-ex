<?php
/*
 * medics Breadcrumbs
*/
function medics_custom_breadcrumbs() {

 $medics_showonhome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $medics_showcurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    global $post;
    if (is_home() || is_front_page()) {

        if ($medics_showonhome == 1)
            echo '<div id="crumbs" class="font-14 color-fff conter-text medics-breadcrumb"><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'medics') . '</a></div>';
    } else {

        echo '<div id="crumbs" class="font-14 color-fff conter-text medics-breadcrumb"><a href="' . esc_url(home_url('/')). '">' . esc_html__('Home', 'medics') . '</a> ';
        if (is_category()) {
            $medics_thisCat = get_category(get_query_var('cat'), false);
            if ($medics_thisCat->parent != 0)
                echo esc_html(get_category_parents($medics_thisCat->parent, TRUE, ' '));
            echo  '/ '.esc_html__('Archive by category', 'medics') . ' " ' . single_cat_title('', false) . ' "';
        } elseif (is_search()) {
            echo  '/ '.esc_html__('Search Results For ', 'medics') . ' " ' . get_search_query() . ' "';
        } elseif (is_day()) {
            echo '/ '.'<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a> ';
            echo '/ '.'<a href="' . esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))) . '">' . esc_html(get_the_time('F') ). '</a> ';
            echo  '/ '.esc_html(get_the_time('d'));
        } elseif (is_month()) {
            echo '/ '.'<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a> ';
            echo  '/ '.esc_html(get_the_time('F'));
        } elseif (is_year()) {
            echo '/ '.esc_html(get_the_time('Y'));
        } elseif (is_single() && !is_attachment()) {            
            if (get_post_type() != 'post') {
                $medics_post_type = get_post_type_object(get_post_type());
                $medics_slug = $medics_post_type->rewrite;
                echo '<a href="' . esc_url(home_url('/'. $medics_slug['slug'] . '/')) .'">' . esc_html($medics_post_type->labels->singular_name) . '</a>';
                if ($medics_showcurrent == 1)
                    echo  esc_html(get_the_title()) ;
            } else {
                $medics_cat = get_the_category();
                $medics_cat = $medics_cat[0];
                $medics_cats = get_category_parents($medics_cat, TRUE, ' ');
                if ($medics_showcurrent == 0)
                    $medics_cats =
                            preg_replace("#^(.+)\s\s$#", "$1", $medics_cats);
                echo '/ '.$medics_cats;
                if ($medics_showcurrent == 1)
                    echo  '/ '.esc_html(get_the_title());
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $medics_post_type = get_post_type_object(get_post_type());
            echo esc_html($medics_post_type->labels->singular_name );
        } elseif (is_attachment()) {
            $medics_parent = get_post($post->post_parent);
            $medics_cat = get_the_category($medics_parent->ID);
            $medics_cat = $medics_cat[0];
            echo esc_html(get_category_parents($medics_cat, TRUE, '  '));
            echo '<a href="' . esc_url(get_permalink($medics_parent)) . '">' . esc_html($medics_parent->post_title) . '</a>';
            if ($medics_showcurrent == 1)
                echo   esc_html(get_the_title());
        } elseif (is_page() && !$post->post_parent) {
            if ($medics_showcurrent == 1)
                echo '/ '.esc_html(get_the_title());
        } elseif (is_page() && $post->post_parent) {
            $medics_parent_id = $post->post_parent;
            $medics_breadcrumbs = array();
            while ($medics_parent_id) {
                $medics_page = get_page($medics_parent_id);
                $medics_breadcrumbs[] = '<a href="' . get_permalink($medics_page->ID) . '">' . get_the_title($medics_page->ID) . '</a>';
                $medics_parent_id = $medics_page->post_parent;
            }
            $medics_breadcrumbs = array_reverse($medics_breadcrumbs);
            for ($medics_i = 0; $medics_i < count($medics_breadcrumbs); $medics_i++) {
                echo '/ '.$medics_breadcrumbs[$medics_i];
                if ($medics_i != count($medics_breadcrumbs) - 1)
                    echo ' ';
            }
            if ($medics_showcurrent == 1)
                echo ' / '.get_the_title();
        } elseif (is_tag()) {
            echo  ' / '.esc_html__('Posts tagged', 'medics') . ' " ' . esc_html(single_tag_title('', false)) . ' "';
        } elseif (is_author()) {
            global $author;
            $medics_userdata = get_userdata($author);
            echo  ' / '.esc_html__('Articles Published by', 'medics') . ' " ' . esc_html($medics_userdata->display_name ). ' "';
        } elseif (is_404()) {
            echo ' / '.esc_html__('Error 404', 'medics') ;
        }

        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo ' (';
            echo esc_html__('Page', 'medics') . ' ' . esc_html(get_query_var('paged'));
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo ')';
        }
        echo '</div>';
    }
} // end medics_custom_breadcrumbs()