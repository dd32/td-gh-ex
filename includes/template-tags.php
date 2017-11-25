<?php
/*
================================================================================================
White Spektrum - template-tags.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other being functions.php). This template-tags.php template file allows you to 
add additional features and functionality to a WordPress theme which is stored in the includes 
folder. The primary template file functions.php contains the main features and functionality to 
the WordPress theme which is stored in the root of the theme's directory.

@package        White Spektrum WordPress Theme
@copyright      Copyright (C) 2014-2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.benjlu.com/)
================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
 1.0 - Entry Posted On Setup
 2.0 - Entry Time Stamp Setup
 3.0 - Entry Taxonomies Setup
================================================================================================
*/

/*
================================================================================================
 1.0 - Entry Posted On Setup
================================================================================================
*/
function white_spektrum_entry_posted_on_setup() {
    $author_avatar_size = apply_filters('white_spektrum_author_avatar_size', 80);
    printf('<span class="byline"><span class="author vcard">%1$s</span>',
        get_avatar(get_the_author_meta('user_email' ), $author_avatar_size) 
    );
    
    printf(('<span class="by-author"><b>%3$s</b></span><span class="published"><b>%2$s</b></span>'), 'meta-prep meta-prep-author', 
    sprintf('<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
        esc_url(get_permalink()),
        esc_attr(get_the_time()),
        get_the_date(get_option('date_format'))),
    sprintf('<a href="%1$s" title="%2$s">%3$s</a>',
    esc_url(get_author_posts_url(get_the_author_meta('ID'))),
    esc_attr(sprintf(__('View all posts by %s', 'white-spektrum'), get_the_author())), 
    get_the_author()
    ));

    if ( !is_page() && !post_password_required() && (comments_open() || get_comments_number())) {
        echo '<span class="entry-comments"><b>';
            comments_popup_link( sprintf( __( 'Add a Comment', 'white-spektrum')));
        echo '</b></span>';
    }
}

/*
================================================================================================
 2.0 - Entry Time Stamp Setup
================================================================================================
*/
function white_spektrum_entry_time_stamp_setup() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if (get_the_time('U') !== get_the_modified_time('U')) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr(get_the_date('c')),
		esc_html(get_the_date()),
		esc_attr(get_the_modified_date('c')),
		esc_html(get_the_modified_date())
	);

	return sprintf(
		__('<span class="screen-reader-text">Posted on</span> %s', 'white-spektrum'),
		'<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
	);
}

/*
================================================================================================
 3.0 - Entry Taxonomies Setup
================================================================================================
*/
function white_spektrum_entry_taxonomies_setup() {
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