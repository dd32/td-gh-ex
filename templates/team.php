<?php
/*
 * Template Name: Team
 */
get_header();
$args = array('post_type' => 'smartcat_team', 'posts_per_page' => -1);
$the_team_query = new WP_Query( $args );
$count = $the_team_query->post_count;
?>

<div id="content" class="site-content site-content-wrapper">
    <?php while (have_posts()) : the_post(); ?>
        <?php // get_template_part('content', 'page'); ?>
        <div class="page-content row ">
            <article class="col-md-12 item-page">
                <h2 class="post-title"><?php the_title(); ?></h2>
                <div class="avenue-underline"></div>
                <?php
                
                
                
                
            the_content(); ?>
            <div class="">

                <?php echo smartcat_show_team(); ?>
                
            </div><!-- /.container -->
            
            <?php
                wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'avenue'), 'after' => '</div>'));

                // If comments are open or we have at least one comment, load up the comment template
                if (comments_open() || '0' != get_comments_number()) :
                    comments_template();
                endif;
                ?>
            </article>

        </div>

    <?php endwhile; // end of the loop.   ?>
</div>

<?php get_footer(); ?>
