<?php
/**
 * FrontPage
 */

get_header(); ?>

    <?php if ( is_home() && is_front_page() ): ?>

        <?php get_template_part('template-parts/page/content', 'blog-page'); ?>

    <?php else: ?>

        <?php get_template_part('template-parts/page/content', 'static-page'); ?>
        
    <?php endif; ?>

<?php get_footer(); ?>