<?php
/*
================================================================================================
Beyond Expectations - page.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other content-page.php). The page.php template file is used to declare the 
loop and displays the content in a separate file called the content-page.php.

@package        Beyond Expectations WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://luminathemes.com/contact/
@since          0.0.1
================================================================================================
*/
?>
<?php get_header(); ?>
    <div id="main-content" class="content-area">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'page'); ?>
        <?php endwhile; ?>
        <?php else : ?>
                <?php get_template_part('template-parts/content', 'none'); ?>
        <?php endif; ?>
    </div>
<?php get_sidebar('page'); ?>
<?php get_footer(); ?>