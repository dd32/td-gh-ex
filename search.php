<?php
/**
 * Barista - Search Index
 *
 * This is the Search Index will help display information using content-search.php
 * 
 * @package         Barista WordPress Theme
 * @copyright       Copyright (C) 2015  Benjamin Lu
 * @license         GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @author          Benjamin Lu (http://www.benluwp.com/contact/
 */
?>
<?php get_header(); ?>
    <?php if (have_posts()) : ?>
		<div class="content-search">		
			<h2><?php printf( __( 'Search Results for: %s', 'barista' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
		</div>
        <?php while(have_posts()) : the_post(); ?>
            <?php get_template_part('content', 'search'); ?>
    <?php endwhile; ?>
    <?php else : ?>
            <?php get_template_part('content', 'none'); ?>
    <?php endif; ?>
<?php get_footer(); ?>