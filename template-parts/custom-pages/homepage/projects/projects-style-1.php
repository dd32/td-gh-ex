<?php
$pages = atlast_business_show_projects();
if (!empty($pages)):
    foreach ($pages as $pg) :
        $page = get_post($pg); ?>
        <div class="column col-3 col-md-6 col-xs-12">
            <div class="front-single-project">
                <?php  $thumbUrl = get_the_post_thumbnail_url($page->ID, 'front-projects'); ?>

                <figure class="front-single-project-img">
                    <img class="border-radius-5 img-responsive" src="<?php echo esc_url($thumbUrl); ?>" alt="<?php echo esc_attr($page->post_title); ?>"/>
                    <a href="<?php echo esc_url(get_permalink($page->ID)); ?>" title="<?php echo esc_attr($page->post_title); ?>"></a>
                </figure>
                <div class="project-details text-center">
                    <h4>
                        <a href="<?php echo esc_url(get_permalink($page->ID)); ?>"><?php echo esc_html($page->post_title); ?></a></h4>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>