<?php 
// Breadcrumbs
function astrology_custom_breadcrumbs() {
       
    // Settings
    $astrology_separator          = '&gt;';
    $astrology_breadcrums_id      = 'breadcrumbs';
    $astrology_breadcrums_class   = 'breadcrumbs';
    $astrology_home_title         =  __('Homepage','astrology');
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        echo '<ul id="' . $astrology_breadcrums_id . '" class="' . $astrology_breadcrums_class . '">';
           
        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . esc_url(get_home_url()) . '" title="' . $astrology_home_title . '">' . $astrology_home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $astrology_separator . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . the_archive_title() . '</strong></li>';

        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

            // If post is a custom post type
            $astrology_post_type = get_post_type();

            // If it is a custom post type display name and link
            if($astrology_post_type != 'post') {
                  
                $astrology_post_type_object = get_post_type_object($astrology_post_type);
                $astrology_post_type_archive = get_post_type_archive_link($astrology_post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $astrology_post_type . '"><a class="bread-cat bread-custom-post-type-' . $astrology_post_type . '" href="' . $astrology_post_type_archive . '" title="' . $astrology_post_type_object->labels->name . '">' . $astrology_post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $astrology_separator . ' </li>';

            }

            $astrology_custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $astrology_custom_tax_name . '</strong></li>';

        } else if ( is_single() ) {

            // If post is a custom post type
            $astrology_post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($astrology_post_type != 'post') {
                  
                $astrology_post_type_object = get_post_type_object($astrology_post_type);
                $astrology_post_type_archive = get_post_type_archive_link($astrology_post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $astrology_post_type . '"><a class="bread-cat bread-custom-post-type-' . $astrology_post_type . '" href="' . $astrology_post_type_archive . '" title="' . $astrology_post_type_object->labels->name . '">' . $astrology_post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $astrology_separator . ' </li>';

            }
              
            // Get post category info
            $astrology_category = get_the_category();
             
            if(!empty($astrology_category)) {
              
                // Get last category post is in
               
                $astrology_last_category = end($astrology_category);
                  
                // Get parent any categories and create array
                $astrology_get_cat_parents = rtrim(get_category_parents($astrology_last_category->term_id, true, ','),',');
                $astrology_cat_parents = explode(',',$astrology_get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $astrology_cat_display = '';
                foreach($astrology_cat_parents as $astrology_parents) {
                    $astrology_cat_display .= '<li class="item-cat">'.$astrology_parents.'</li>';
                    $astrology_cat_display .= '<li class="separator"> ' . $astrology_separator . ' </li>';
                }
             
            }
              
            // Check if the post is in a category
            if(!empty($astrology_last_category)) {
                echo $astrology_cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($astrology_cat_id)) {
                  
                echo '<li class="item-cat item-cat-' . $astrology_cat_id . ' item-cat-' . $astrology_cat_nicename . '"><a class="bread-cat bread-cat-' . $astrology_cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $astrology_separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
              
            } else {
                  
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $astrology_anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $astrology_anc = array_reverse($astrology_anc);
                   
                // Parent page loop
                if ( !isset( $parents ) ) $astrology_parents = null;
                foreach ( $astrology_anc as $astrology_ancestor ) {
                    $astrology_parents .= '<li class="item-parent item-parent-' . $astrology_ancestor . '"><a class="bread-parent bread-parent-' . $astrology_ancestor . '" href="' . get_permalink($astrology_ancestor) . '" title="' . get_the_title($astrology_ancestor) . '">' . get_the_title($astrology_ancestor) . '</a></li>';
                    $astrology_parents .= '<li class="separator separator-' . $astrology_ancestor . '"> ' . $astrology_separator . ' </li>';
                }
                   
                // Display parent pages
                echo $astrology_parents;
                   
                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $astrology_term_id        = get_query_var('tag_id');
            $astrology_taxonomy       = 'post_tag';
            $astrology_args           = 'include=' . $astrology_term_id;
            $astrology_terms          = get_terms( $astrology_taxonomy, $astrology_args );
            $astrology_get_term_id    = $astrology_terms[0]->term_id;
            $astrology_get_term_slug  = $astrology_terms[0]->slug;
            $astrology_get_term_name  = $astrology_terms[0]->name;
               
            // Display the tag name
            echo '<li class="item-current item-tag-' . $astrology_get_term_id . ' item-tag-' . $astrology_get_term_slug . '"><strong class="bread-current bread-tag-' . $astrology_get_term_id . ' bread-tag-' . $astrology_get_term_slug . '">' . $astrology_get_term_name . '</strong></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $astrology_separator . ' </li>';
               
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $astrology_separator . ' </li>';
               
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $astrology_separator . ' </li>';
               
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $astrology_userdata = get_userdata( $author );
               
            // Display author name
            echo '<li class="item-current item-current-' . $astrology_userdata->user_nicename . '"><strong class="bread-current bread-current-' . $astrology_userdata->user_nicename . '" title="' . $astrology_userdata->display_name . '">' . 'Author: ' . $astrology_userdata->display_name . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page','astrology') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
       
        echo '</ul>';
           
    }
       
}