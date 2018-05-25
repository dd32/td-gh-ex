<?php
/*
 * Blog Post Carousel
 * Blog style 2
 */
$prefix = atlast_business_get_prefix();
$latest_post = absint(get_theme_mod($prefix . '_blog_section_latest_posts_number', 4));
$args = array('post_type' => 'post', 'posts_per_page' => $latest_post, 'ignore_sticky_posts' => true);
$blogQ = new WP_Query($args);
if ($blogQ->have_posts()): ?>
    <div class="blog-carousel-wrapper carousel-style">
        <?php while ($blogQ->have_posts()): $blogQ->the_post(); ?>

            <div class="single-blog-item"">
                <?php if (has_post_thumbnail()): ?>
                    <?php
                    $thumbnailID = get_post_thumbnail_id(get_the_ID());
                    $thumbInfo = wp_get_attachment_image_src($thumbnailID,'full');
                    ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" style="background:url('<?php echo esc_url($thumbInfo[0]);?>') no-repeat center; background-size: cover !important; height:280px; display:block;"></a>
                <?php endif; ?>
                <div class="blog-item-contents">
                    <div class="date">
                        <span class="fas fa-calendar-alt"></span>
                        <?php echo get_the_time(get_option('date_format')); ?>
                    </div>
                    <h4><?php the_title(); ?></h4>
                    <a href="<?php the_permalink(); ?>">
                        <?php echo __('Read More', 'atlast-business'); ?><span class="fas fa-plus"></span>
                    </a>
                </div>
            </div>
        <?php
        endwhile;
        ?>
    </div>
<?php endif;
wp_reset_postdata(); ?>