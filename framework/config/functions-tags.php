<?php
/*
============================================================================================================================
Silver Quantum - framework/config/functions-sidebars.php
============================================================================================================================
This functions-sidebars.php template file allows you register and add sidebars to the current theme. It currently supports
primary, secondary, custom,  about me, and portfolio sidebars. 

@package        Silver Quantum WordPress Theme
@copyright      Copyright (C) 2014-2018. Benjamin Lu
@license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com)
============================================================================================================================
*/
/*
============================================================================================================================
Table of Content
============================================================================================================================
 1.0 - Entry Posted On
 2.0 - Entry Time Stamp
 3.0 - Entry Taxonomies
============================================================================================================================
*/
/*
============================================================================================================================
 1.0 - Entry Posted On
============================================================================================================================
*/
function silver_quantum_entry_posted_on() {
    $avatar_size = apply_filters('silver_quantum_author_avatar_size', 80);
    $date = sprintf(
        '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
        esc_url(get_permalink()),
        esc_attr(get_the_time()),
        get_the_date(get_option('date_format'))
    );
    $author = sprintf(
        '<a href="%1$s" title="%2$s">%3$s</a>',
        esc_url(get_author_posts_url(get_the_author_meta('ID'))),
        esc_attr(sprintf(__('View all posts by %s', 'silver-quantum'), get_the_author())),
        get_the_author()
    );
    printf(
        '<span class="byline"><span class="author vcard">%1$s</span>',
        get_avatar(get_the_author_meta('user_email'), $avatar_size)
    );
    printf(
        '<span class="by-author"><b>%1$s</b></span><span class="published"><b>%2$s</b></span>',
        $author,
        $date
    );
}
/*
============================================================================================================================
 2.0 - Entry Time Stamp
============================================================================================================================
*/
function silver_quantum_entry_time_stamp() {
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
		__('<span class="screen-reader-text">Posted on</span> %s', 'silver-quantum'),
		'<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
	);
}
/*
============================================================================================================================
 3.0 - Entry Taxonomies
============================================================================================================================
*/
function silver_quantum_entry_taxonomies() {
    $cat_list = get_the_category_list(__(' | ', 'silver-quantum'));
    $tag_list = get_the_tag_list('', __(' | ', 'silver-quantum'));
    if ($cat_list) {
        printf('<div class="cat-link"><i class="fa fa-folder-open-o"></i> %1$s <span class="cat-list"l><b><i>%2$s</i></b></span></div>',
        __(' Posted In', 'silver-quantum'),  
        $cat_list
        );
    }
    if ($tag_list) {
        printf('<div class="tag-link"><i class="fa fa-tags"></i> %1$s <span class="tag-list"><b><i>%2$s</i></b></span></div>',
        __(' Tagged', 'silver-quantum'),  
        $tag_list 
        );
    }
}
