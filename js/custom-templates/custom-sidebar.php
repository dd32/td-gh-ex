<?php
/*
================================================================================================
Tifology - custom-sidebar.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other content-custom-sidebar.php). The custom-sidebar.php template file is used
to display in the content-custom-sidebar.php.

@package        Tifology WordPress Theme
@copyright      Copyright (C) 2015. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://luminathemes.com/contact/
@since          0.0.1
================================================================================================

Template Name: Custom Sidebar
*/
?>
<?php get_header(); ?>
    <div id="main-content" class="content-area">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'custom-sidebar'); ?>
        <?php endwhile; ?>
        <?php else : ?>
                <?php get_template_part('template-parts/content', 'none'); ?>
        <?php endif; ?>
    </div>
<?php get_sidebar('custom'); ?>
<?php get_footer(); ?>