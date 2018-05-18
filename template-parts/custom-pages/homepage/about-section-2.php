<?php
$prefix = atlast_business_get_prefix();
$about_page = get_theme_mod($prefix . '_about_section_page', '');
if ($about_page != 0 && $about_page != null):
    $page = get_post(absint($about_page)); ?>
    <section class="home-about-2" id="home-about-section">

        <div class="columns col-gapless">
            <?php if (atlast_business_has_fimage($page->ID)):

                $thumbID = get_post_thumbnail_id($page->ID);
                $src = wp_get_attachment_image_src($thumbID, 'full');
                ?>
                <div class="column col-6 col-sm-12 about-image-wrapper">
                    <div class="about-section-image" style="
                            background:url(<?php echo esc_url($src[0]); ?>) center;
                            background-size: cover;
                            background-repeat: no-repeat;
                            width: 100%;
                            height: 100%;">
                    </div>
                </div>

            <?php endif; ?>
            <div class="<?php echo atlast_business_fimage_class($page->ID, 'col-6', 'col-12'); ?> col-sm-12 pad-all-80 about-texts-wrapper">
                <div class="about-section-content pad-all-10 section-editor-content text-center">

                    <h2 class="section-title-inline"><?php echo $page->post_title; ?></h2>
                    <h3 class="section-subtitle-inline">
                        <?php echo $page->post_excerpt; ?>
                    </h3>

                    <?php echo wpautop(wp_kses_post($page->post_content)); ?>
                </div>

            </div>
        </div>


    </section>

<?php endif; ?>