<?php
/*
 * Slider template part
 * @package atlast agency
 * @since version 1.0.0
 */
?>
<?php

$prefix = atlast_agency_get_prefix();
$sliderPageID = absint(get_theme_mod($prefix . '_slider_parent_page', ''));
if ($sliderPageID != 0 && $sliderPageID != ''):
    $sliderArgs = array(
        'post_type' => 'page',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_parent' => $sliderPageID
    );
    $sliderQ = new WP_Query($sliderArgs);
    if ($sliderQ->have_posts()):
        ?>
        <div class="fs-slider-wrapper">
            <?php while ($sliderQ->have_posts()): $sliderQ->the_post();
                $postID = get_the_ID();
                $thumbnailID = absint(get_post_thumbnail_id($postID));
                if (empty($thumbnailID) || $thumbnailID == 0):
                    continue;
                else:
                    $imageSrc = wp_get_attachment_image_src($thumbnailID, 'full');
                    ?>
                    <div class="fs-slide"
                         style="background-image:url(<?php echo esc_url($imageSrc[0]); ?>);
                                 background-size: cover !important;
                                 background-position: center;">
                        <div class="slide-contents hide-xs hide-md">
                            <h2><?php the_title(); ?> </h2>
                            <h3><?php echo esc_html(get_the_excerpt(get_the_ID())); ?></h3>
                            <a href="<?php echo esc_url(get_the_permalink($page->ID)); ?>" class="header-btn"><i
                                        class="fas fa-angle-right"></i>
                                <?php echo esc_html__('Learn More', 'atlast-agency'); ?> </a>
                        </div>

                        <div class="show-xs show-md" style="height: 100%">
                            <div class="mobile-slide-contents">
                                <div class="mobile-slider-txt">
                                    <h2><?php the_title(); ?> </h2>
                                    <h3><?php echo esc_html(get_the_excerpt(get_the_ID())); ?></h3>
                                    <a href="<?php echo esc_url(get_the_permalink($page->ID)); ?>" class="header-btn">
				                        <?php echo esc_html__('Learn More', 'atlast-agency'); ?> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    <?php endif;
    wp_reset_postdata(); ?>
<?php endif; ?>
