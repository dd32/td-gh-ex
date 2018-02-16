<?php
/* Custom Query */
if (have_posts()):
    $counter = 0;
    ?>
    <div class="columns">
    <?php while (have_posts()): the_post(); ?>


    <div class="column <?php echo atlast_business_blog_col_class($counter); ?>">
        <article id="post-<?php the_ID(); ?>" <?php post_class('blog-item blog-item-style-2'); ?>>

            <!-- Featured Image container -->
            <?php get_template_part('template-parts/content/content-elements/featured-image');?>
            <!-- Meta -->
            <?php get_template_part('template-parts/content/content-elements/meta');?>
            <!-- Blog Item Title -->
            <?php get_template_part('template-parts/content/content-elements/blog-item-title');?>

            <p><?php the_excerpt(); ?></p>

            <a href="<?php the_permalink(); ?>" class="read-more-link">
                <?php echo apply_filters('atlast_business_readmore_txt',esc_html__('Continue Reading','atlast-business')); ?>
            </a>

        </article>
    </div>


    <?php $counter++; endwhile; ?>
    </div> <?php endif; ?>