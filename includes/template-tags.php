<?php
function white_spektrum_entry_posted_on() {
    printf(('Published <b>%2$s</b> / by <b>%3$s</b>'), 'meta-prep meta-prep-author', 
    sprintf('<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
        esc_url(get_permalink()),
        esc_attr(get_the_time()),
        get_the_date('F d, Y')),
    sprintf('<a href="%1$s" title="%2$s">%3$s</a>',
    esc_url(get_author_posts_url(get_the_author_meta('ID'))),
    esc_attr(sprintf(__('View all posts by $s', 'white-spektrum'), get_the_author())), 
    get_the_author()
    ));

    if ( !is_page() && !post_password_required() && (comments_open() || get_comments_number())) {
        echo ' / <span class="comments-link"><b>';
            comments_popup_link( sprintf( __( 'Leave a Comment', 'white-spektrum')));
        echo '</b></span>';
    }
}

function white_spektrum_entry_taxonomies() {
    $cat_list = get_the_category_list(__(' | ', 'white-spektrum'));
    $tag_list = get_the_tag_list('', __(' | ', 'white-spektrum'));

    if ($cat_list) {
        printf('<div class="cat-link"> %1$s <span class="cat-list"l><b><i>%2$s</i></b></span></div>',
        __('<i class="fa fa-folder-open-o"></i> Posted In', 'white-spektrum'),  
        $cat_list
        );
    }

    if ($tag_list) {
        printf('<div class="tag-link">%1$s <span class="tag-list"><b><i>%2$s</i></b></span></div>',
        __('<i class="fa fa-tags"></i> Tagged', 'white-spektrum'),  
        $tag_list 
        );
    }
}