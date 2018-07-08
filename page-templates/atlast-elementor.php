<?php
/*
 * Template Name: Atlast Page with Elementor
 */
get_header(); ?>

    <section id="content" class="elementor-conten" role="main">
        <?php if (have_posts()):
            while (have_posts()): the_post();
                the_content();
            endwhile;
        endif; ?>
    </section>

<?php get_footer(); ?>