<?php
$prefix = atlast_business_get_prefix();
$about_page = get_theme_mod($prefix . '_about_section_page', '');
 if ($about_page != 0 && $about_page != null):
    $page = get_post(absint($about_page)); ?>

    <section class="home-about pad-tb-80" id="home-about-section">
        <div class="container grid-xl">
            <div class="columns">
                <div class="column col-12 text-center mb-100">
                    <h2 class="section-title"><?php echo $page->post_title; ?></h2>
                    <h3 class="section-subtitle">
                        <?php echo atlast_business_get_citem('_about_section_subtitle'); ?>
                    </h3>
                </div>

                <?php if (atlast_business_has_fimage($page->ID)): ?>
                    <div class="column col-6 col-sm-12">
                        <div class="about-section-image pad-all-10">
                            <?php
                            $thumbID = get_post_thumbnail_id($page->ID);
                            $src = wp_get_attachment_image_src($thumbID, 'atlast-business-front-about');
                            ?>
                            <img src="<?php echo esc_url($src[0]); ?>"
                                 class="front-about-image img-responsive border-radius-3" alt="<?php echo esc_attr($page->post_title); ?>"/>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="<?php echo atlast_business_fimage_class($page->ID, 'col-6', 'col-12'); ?> col-sm-12">
                    <div class="about-section-content pad-all-10 section-editor-content">
                        <?php echo wpautop(wp_kses_post($page->post_content)); ?>
                    </div>

                </div>
            </div>
        </div>

    </section>

<?php endif; ?>