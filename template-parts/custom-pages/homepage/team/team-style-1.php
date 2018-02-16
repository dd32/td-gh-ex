<?php $team_members = atlast_business_show_team_members();

if (!empty($team_members)):
    foreach ($team_members as $tm):
        $page = get_post($tm);
        ?>
        <div class="column col-3 col-xs-12">
            <div class="single-team-item text-center">
                <?php
                $thumbUrl = get_the_post_thumbnail_url($page->ID, 'front-team');
                if ($thumbUrl != false): ?>
                    <div class="single-team-item-image">
                        <img class="circle single-team-item-image img-responsive" src="<?php echo esc_url($thumbUrl); ?>"
                             alt="<?php echo esc_attr($page->post_title); ?>"/>
                        <a href="<?php echo esc_url(get_permalink($page->ID)); ?>"></a>
                    </div>
                <?php endif; ?>
                <h4>
                    <a href="<?php echo esc_url(get_permalink($page->ID)); ?>">
                        <?php echo esc_html($page->post_title); ?>
                    </a>
                </h4>
                <p><?php echo atlast_business_get_first_paragraph($page->post_content); ?></p>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>