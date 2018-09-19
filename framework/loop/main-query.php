<?php
/*
============================================================================================================================
Silver Quantum - framework/loop/main-query.php
============================================================================================================================
This main-query.php template file uses an array_map(); feature that allows you add or remove require file automatically 
without the need to type lines and lines of require_once();. This way it will be easier to maintain and only use the files
are needed.
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
 1.0 - Main Query (Content with Post Format)
 2.0 - Main Query (Content Single)
 3.0 - Main Query (Content Page)
============================================================================================================================
*/

/*
============================================================================================================================
 1.0 - Main Query (Content with Post Format)
============================================================================================================================
*/
function silver_quantum_display_content_post_format() {
    do_action('silver_quantum_display_content_post_format');
}

function silver_quantum_output_content_post_format() {
    if (have_posts()) :
        while (have_posts()) : the_post(); 
            get_template_part('views/content/content', get_post_format());
    endwhile;
            the_posts_pagination();
    else :
            get_template_part('views/content/content', 'none');
    endif;
}
add_action('silver_quantum_display_content_post_format', 'silver_quantum_output_content_post_format');

/*
============================================================================================================================
 2.0 - Main Query (Content Single)
============================================================================================================================
*/
function silver_quantum_display_content_single() {
    do_action('silver_quantum_display_content_single');
}

function silver_quantum_output_content_single() {
    while (have_posts()) : the_post(); 
        get_template_part('views/content/content', 'single');
    endwhile;
    the_post_navigation(array(
        'next_text' => '<span class="post-next" aria-hiddent="true">' . esc_html__('Next', 'silver-quantum') . '</span>' . '<span class="post-title">%title</span>',
        'prev_text' => '<span class="post-previous" aria-hidden="true">' . esc_html__( 'Previous', 'silver-quantum' ) . '</span> ' . '<span class="post-title">%title</span>',
    ));
    comments_template();
}
add_action('silver_quantum_display_content_single', 'silver_quantum_output_content_single');

/*
============================================================================================================================
 3.0 - Main Query (Content Page)
============================================================================================================================
*/
function silver_quantum_display_content_page() {
    do_action('silver_quantum_display_content_page');
}

function silver_quantum_output_content_page() {
    while (have_posts()) : the_post(); 
        get_template_part('views/content/content', 'page');
    endwhile;
    comments_template();
}
add_action('silver_quantum_display_content_page', 'silver_quantum_output_content_page');
