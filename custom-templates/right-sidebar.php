<?php
/*
================================================================================================
White Spektrum - right-sidebar.php
Template Name: Right Sidebar
================================================================================================
This file (right-sidebar.php) is a custom template that allows you to set a custom right sidebar
for the current page you are currently on. When you activate this template, it is using the the
following file (sidebar-page.php) to show custom widgets.

@package        White Spektrum WordPress Theme
@copyright      Copyright (C) 2014-2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.benjlu.com/)
================================================================================================
*/
?>
<?php get_header(); ?>
    <section id="site-main" class="site-main">
        <div id="page_layout" class="right-sidebar">
            <div id="content-area" class="content-area">
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/content', 'page'); ?>
                <?php endwhile; ?>
                <?php 
                    the_post_navigation(array(
                        'next_text' => '<span class="post-next" aria-hiddent="true">' . __('Next', 'white-spektrum') . '</span>' . '<span class="post-title">%title</span>',
                        'prev_text' => '<span class="post-previous" aria-hidden="true">' . __('Previous', 'white-spektrum') . '</span> ' . '<span class="post-title">%title</span>',
                    ));
                ?>
                <?php comments_template(); ?>
            </div>
            <?php get_sidebar('page'); ?>
        </div>
    </section>
<?php get_footer(); ?>