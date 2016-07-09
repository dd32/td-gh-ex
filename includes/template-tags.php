<?php
/*
================================================================================================
Silver Quantum - template-tags.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other being functions.php). This file is used to maintain the main functionality 
and features for this theme. The main file is the functions.php that contains the main functions 
and features for this theme.

@package        Splendid Portfolio WordPress Theme
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
function silver_quantum_entry_posted_on() {
    printf(('Published <b>%2$s</b> / by <b>%3$s</b>'), 'meta-prep meta-prep-author', 
    sprintf('<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
        esc_url(get_permalink()),
        esc_attr(get_the_time()),
        get_the_date('F d, Y')),
    sprintf('<a href="%1$s" title="%2$s">%3$s</a>',
    esc_url(get_author_posts_url(get_the_author_meta('ID'))),
    esc_attr(sprintf(__('View all posts by %s', 'silver-quantum'), get_the_author())), 
    get_the_author()
    ));

    if ( !is_page() && !post_password_required() && (comments_open() || get_comments_number())) {
        echo ' / <span class="comments-link"><b>';
            comments_popup_link( sprintf( __( 'Leave a Comment', 'silver-quantum')));
        echo '</b></span>';
    }
}

/*
================================================================================================
 2.0 - Entry Comments and Taxonomies
================================================================================================
*/
function silver_quantum_entry_taxonomies() {
    $cat_list = get_the_category_list(__(' | ', 'silver-quantum'));
    $tag_list = get_the_tag_list('', __(' | ', 'silver-quantum'));

    if ($cat_list) {
        printf('<div class="cat-link"> %1$s <span class="cat-list"l><b><i>%2$s</i></b></span></div>',
        __('<i class="fa fa-folder-open-o"></i> Posted In', 'silver-quantum'),  
        $cat_list
        );
    }

    if ($tag_list) {
        printf('<div class="tag-link">%1$s <span class="tag-list"><b><i>%2$s</i></b></span></div>',
        __('<i class="fa fa-tags"></i> Tagged', 'silver-quantum'),  
        $tag_list 
        );
    }
}

function splendid_portfolio_custom_excerpt($class = 'entry-excerpt') {
    $class = esc_attr($class);

    if (has_excerpt() || is_search()) : ?>
        <div class="<?php echo $class; ?>">
            <?php the_excerpt(); ?>
            <?php if (!is_singular() || is_front_page()) { ?>
                <div class="continue-reading">
                    <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                        <?php
                            printf(
                                wp_kses( __( 'Continue reading %s', 'silver-quantum' ), array( 'span' => array( 'class' => array() ) ) ),
                                the_title( '<span class="screen-reader-text">"', '"</span>', false )
                            );
                        ?>
                    </a>
                </div>
            <?php } ?>
        </div>
    <?php endif;
}

function splendid_portfolio_post_type_archive_title() {
    $obj = get_post_type_object(get_post_type()); 
    $post_type = $obj->labels->name; 

    if ($post_type == $post_type) {
        return __('Portfolio', 'silver-quantum');
    }
    else {
        return $type;
    }
}
add_filter('post_type_archive_title', 'splendid_portfolio_post_type_archive_title');

function splendid_portfolio_remove_grunion_style() {
     wp_deregister_style('grunion.css');
}
add_action('wp_print_styles', 'splendid_portfolio_remove_grunion_style');
