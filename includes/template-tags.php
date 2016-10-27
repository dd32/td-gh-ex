<?php
/*
================================================================================================
Barista - template-tags.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other being functions.php). This file is used to maintain the main functionality 
and features for this theme. The main file is the functions.php that contains the main functions 
and features for this theme.

@package        Barista WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://lumiathemes.com/)
================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
 1.0 - Entry Posted On
 2.0 - Entry Comments and Taxonomies
================================================================================================
*/

/*
================================================================================================
 1.0 - Entry Posted On
================================================================================================
*/
function barista_entry_posted_on() {
    $author_avatar_size = apply_filters('barista_author_avatar_size', 100);
    printf( '<span class="byline"><span class="author vcard">%1$s</span>',
        get_avatar( get_the_author_meta( 'user_email' ), $author_avatar_size ) 
    );
    
    printf(('<span class="by-author"><b>%3$s</b></span><span class="published"><b>%2$s</b></span>'), 'meta-prep meta-prep-author', 
    sprintf('<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
        esc_url(get_permalink()),
        esc_attr(get_the_time()),
        get_the_date(get_option('date_format'))),
    sprintf('<a href="%1$s" title="%2$s">%3$s</a>',
    esc_url(get_author_posts_url(get_the_author_meta('ID'))),
    esc_attr(sprintf(__('View all posts by %s', 'barista'), get_the_author())), 
    get_the_author()
    ));

    if ( !is_page() && !post_password_required() && (comments_open() || get_comments_number())) {
        echo '<span class="entry-comments"><b>';
            comments_popup_link( sprintf( __( 'Leave a Comment', 'barista')));
        echo '</b></span>';
    }
}

function barista_index_entry_posted_on() {
    printf(('Published <b>%2$s</b> / by <b>%3$s</b>'), 'meta-prep meta-prep-author', 
    sprintf('<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
        esc_url(get_permalink()),
        esc_attr(get_the_time()),
        get_the_date(get_option('date_format'))),
    sprintf('<a href="%1$s" title="%2$s">%3$s</a>',
    esc_url(get_author_posts_url(get_the_author_meta('ID'))),
    esc_attr(sprintf(__('View all posts by %s', 'barista'), get_the_author())), 
    get_the_author()
    ));

    if ( !is_page() && !post_password_required() && (comments_open() || get_comments_number())) {
        echo ' / <span class="comments-link"><b>';
            comments_popup_link( sprintf( __( 'Leave a Comment', 'barista')));
        echo '</b></span>';
    }
}

/*
================================================================================================
 2.0 - Entry Comments and Taxonomies
================================================================================================
*/
function barista_entry_taxonomies() {
    $cat_list = get_the_category_list(__(' | ', 'barista'));
    $tag_list = get_the_tag_list('', __(' | ', 'barista'));

    if ($cat_list) {
        printf('<div class="cat-link"> %1$s <span class="cat-list"l><b><i>%2$s</i></b></span></div>',
        __('<i class="fa fa-folder-open-o"></i> Posted In', 'barista'),  
        $cat_list
        );
    }

    if ($tag_list) {
        printf('<div class="tag-link">%1$s <span class="tag-list"><b><i>%2$s</i></b></span></div>',
        __('<i class="fa fa-tags"></i> Tagged', 'barista'),  
        $tag_list 
        );
    }
}