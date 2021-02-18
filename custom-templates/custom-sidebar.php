<?php
/*
================================================================================================
White Spektrum - custom-sidebar.php
Template Name: Custom Sidebar Template
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other style.css). The index.php template file is flexible. It can be used to 
include all references to the header, content, widget, footer and any other pages created in 
WordPress. Or it can be divided into modular template files, each taking on part of the workload. 
If you do not provide other template files, WordPress may have default files or functions to 
perform their jobs.

@package        White Spektrum WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.lumiathemes.com/)
================================================================================================
*/
?>
<?php get_header(); ?>
    <div class="<?php echo esc_attr(get_theme_mod('custom_layout', 'sidebar-right')); ?>">
        <div id="content-area" class="content-area">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/content', 'custom-sidebar') ?>
            <?php endwhile; ?>
                <div class="paging-navigation">
                    <?php the_posts_pagination(); ?>
                </div>
            <?php else : ?>
                    <?php get_template_part('template-parts/content', 'none'); ?>
            <?php endif; ?>
        </div>
        <?php if ('sidebar-left' == get_theme_mod('custom_layout')) { ?>
            <?php get_sidebar(); ?>
        <?php } ?>
        <?php if ('sidebar-right' == get_theme_mod('custom_layout')) { ?>
            <?php get_sidebar(); ?>
        <?php } ?>
    </div>
<?php get_footer(); ?>