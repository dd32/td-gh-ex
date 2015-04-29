<?php
/**
 * Barista - Page Content
 *
 * This is the page.php file in a WordPress Theme.
 * 
 * @package         Barista WordPress Theme
 * @copyright       Copyright (C) 2015  Benjamin Lu
 * @license         GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @author          Benjamin Lu (http://www.benluwp.com/contact/
 */
?>
<?php get_header(); ?>
    <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>
            <?php get_template_part('content', 'page'); ?>
    <?php endwhile; ?>
            <?php barista_paging_navigation(); ?>
    <?php else : ?>
            <?php get_template_part('content', 'none'); ?>
    <?php endif; ?>
<?php get_footer(); ?>