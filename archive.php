<?php
/*
================================================================================================
Amity - single.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other footer.php). The header.php template file only displays the header section
of this theme. This also displays the navigation menu as well or any extra features.

@package        Amity WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.luminathemes.com/)
================================================================================================
*/
?>
<?php get_header(); ?>
    <div id="content-area" class="content-area">
        <?php if (have_posts()) : ?>
            <?php
                the_archive_title( '<h1 class="archive-title">', '</h1>' );
                the_archive_description( '<div class="archive-description">', '</div>' );
            ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'archive'); ?>
        <?php endwhile; ?>
        <?php else : ?>
                <?php get_template_part('template-parts/content', 'none'); ?>
        <?php endif; ?>
    </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>