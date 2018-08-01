<?php
/*
 * This is the style 1 of the blog template at the front page.
 */
$args = array('post_type' => 'post', 'posts_per_page' => 3, 'ignore_sticky_posts' => true);
$blogQ = new WP_Query($args);
if ($blogQ->have_posts()): ?>
    <div class="ag-home-blog-wrapper pad-tb-20">
        <div class="container grid-xl">
            <div class="columns">
                <?php while ($blogQ->have_posts()): $blogQ->the_post(); ?>
                    <div class="column col-4 col-sm-12">

                        <article id="post-<?php the_ID(); ?>" <?php post_class('home-blog home-blog-style-1'); ?>>
                            <?php get_template_part('template-parts/content/content-elements/featured-image'); ?>
                            <div class="blog-item-inner-texts">
                                <?php get_template_part('template-parts/content/content-elements/blog-item-title'); ?>
                                
                                <a href="<?php the_permalink(); ?>" class="read-more-link is-600">
                                    <?php echo apply_filters('atlast_agency_readmore_txt',
                                        esc_html__('Continue Reading', 'atlast-agency')); ?>
                                </a>
                            </div>
                        </article>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php endif;
wp_reset_postdata() ?>