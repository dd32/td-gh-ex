<?php
$slides = atlast_business_get_slides();
if ($slides == false):return false; endif;
/*
 * Lets create the slider
 */
?>
<div class="atlast-slider-container">
    <!-- Slides -->
    <?php foreach ($slides as $slide):
        $slideItem = get_post($slide);
        $thumbID = get_post_thumbnail_id($slideItem->ID);
        $src = wp_get_attachment_image_src($thumbID, 'full');
        ?>
        <div class="slider-wrap">
            <div class="atlast-business-single-slide" style="height: 700px;
                    background:url('<?php echo esc_url($src[0]); ?>') center no-repeat;
                    background-size:cover !important;">
                <div class="slider-insider">
                    <div class="slide-content">
                        <h3 class="slide-title"><?php echo esc_html($slideItem->post_title); ?></h3>
                        <a href="<?php echo esc_url(get_permalink($slideItem->ID)); ?>" class="slide-btn">
                            <?php echo esc_html__('Learn More', 'atlast-business'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

