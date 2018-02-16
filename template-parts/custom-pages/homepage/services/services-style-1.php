<?php
$pages = atlast_business_show_services();
$icons = atlast_business_show_icons();
if (!empty($pages)):
    foreach ($pages as $pp):
        $page = get_post($pp); ?>
        <div class="column col-4 col-md-12 pad-lr-15">
            <div class="front-single-service link-transition sameHeightDiv">
                <?php if(!empty($icons[$page->ID])): ?>
                <div class="service-icon">
                    <span class="<?php echo esc_attr($icons[$page->ID]); ?> fa-2x"></span>
                </div>
                <?php endif; ?>
                <div class="front-service-texts">
                    <h3><?php echo esc_html($page->post_title); ?></h3>
                    <?php $post_content = wp_kses_post($page->post_content); ?>
                    <p><?php echo wp_trim_words($post_content,'12','..');?> </p>
                </div>
                <a href="<?php echo esc_url(get_permalink(absint($page->ID))); ?>"></a>
            </div>

        </div>
    <?php endforeach;
endif; ?>