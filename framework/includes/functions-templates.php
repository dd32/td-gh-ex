<?php
/*
===========================================================================================================
Silver Quantum - functions-layouts.php
===========================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files for a 
theme. This framework.php template file allows you to add features and functionality that has been preset 
to be use in this WordPress theme which is stored in the theme's framework directory in the theme folder.

@package        Silver Quantum WordPress Theme
@copyright      Copyright (C) 2014-2018. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.benjlu.com/)
===========================================================================================================
*/

/*
===========================================================================================================
Table of Content
===========================================================================================================
 1.0 - Content (Get Post Type)
 2.0 - Content (Post Content)
 3.0 - Content (Page Conent)
 4.0 - Content (Archive Content)
===========================================================================================================
*/

/*
===========================================================================================================
 1.0 - Content (Get Post Type)
===========================================================================================================
*/
function silver_quantum_content_post_format_setup() { ?>
    <div id="content-area" class="content-area">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', get_post_format()); ?>
        <?php endwhile; ?>
                <?php the_posts_pagination(); ?>
        <?php else : ?>
                <?php get_template_part('template-parts/content', 'none'); ?>
        <?php endif; ?>
    </div>
<?php }

/*
===========================================================================================================
 2.0 - Content (Post Content)
===========================================================================================================
*/
function silver_quantum_content_single_setup() { ?>
    <div id="content-area" class="content-area">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content', 'single'); ?>
        <?php endwhile; ?>
        <?php 
            the_post_navigation(array(
                'next_text' => '<span class="post-next" aria-hiddent="true">' . esc_html__('Next', 'silver-quantum') . '</span>' . '<span class="post-title">%title</span>',
                'prev_text' => '<span class="post-previous" aria-hidden="true">' . esc_html__( 'Previous', 'silver-quantum' ) . '</span> ' . '<span class="post-title">%title</span>',
            ));
        ?>
        <?php comments_template(); ?>
    </div>
<?php }

/*
===========================================================================================================
 3.0 - Content (Page Conent)
===========================================================================================================
*/
function silver_quantum_content_page_setup() { ?>
    <div id="content-area" class="content-area">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content', 'page'); ?>
        <?php endwhile; ?>
        <?php comments_template(); ?>
    </div>
<?php }

/*
===========================================================================================================
 4.0 - Content (Archive Content)
===========================================================================================================
*/
function silver_quantum_content_archive_setup() { ?>
    <div id="content-area" class="content-area">
        <?php if (have_posts()) : ?>
                <div id="archive-header" class="archive-header">
                    <h2 class="archive-title"><?php the_archive_title(); ?></h2>
                </div>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', get_post_format()); ?>
        <?php endwhile; ?>
                <?php the_posts_pagination(); ?>
        <?php else : ?>
                <?php get_template_part('template-parts/content', 'none'); ?>
        <?php endif; ?>
    </div>
<?php }