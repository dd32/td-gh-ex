<?php
$prefix = atlast_agency_get_prefix();
$teamParent = absint(get_theme_mod($prefix . '_team_parent_page', ''));
$sectionTitles = atlast_agency_show_section_title($teamParent);
?>
<div class="section-container team-member-content">
    <div class="container grid-xl">
        <div class="columns">
            <div class="column col-3 col-md-12 col-sm-12">
                <?php if (!empty($sectionTitles['title']) && $sectionTitles['title'] != false) : ?>
                    <h3><?php echo esc_html($sectionTitles['title']); ?></h3>
                <?php endif; ?>
                <p>
                    <?php if (!empty($sectionTitles['excerpt']) && $sectionTitles['excerpt'] != false) : ?>
                        <?php echo $sectionTitles['excerpt'] ?>
                    <?php endif; ?>
                </p>
            </div>
            <?php
            $args = array(
                'post_type' => 'page',
                'child_of' => $teamParent,
                'sort_column' => 'menu_order'
            );
            $pages = get_pages($args);
            if ($pages != false): ?>
                <div class="column col-8 col-md-12 col-ml-auto col-sm-12">
                    <div class="columns">
                        <?php foreach ($pages as $pp): ?>
                            <div class="column col-3 col-xs-6">
                                <div class="home-single-member">
                                    <?php
                                    $thumbID = get_post_thumbnail_id( $pp->ID );
                                    $src     = wp_get_attachment_image_src( $thumbID, 'atlast-agency-team-member-front' );
                                    ?>
                                    <div class="team-image">
                                        <img src="<?php echo esc_url($src[0]);?>" alt="<?php echo esc_attr($pp->post_title); ?>"
                                             class="img-responsive"/>
                                        <div class="member-overlay">
                                            <a href="<?php echo esc_url(get_the_permalink($pp->ID)); ?>">
                                                <span class="fas fa-link"></span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="team-texts">
                                        <h4 class="team-name"><a href="<?php echo esc_url(get_the_permalink($pp->ID)); ?>"><?php echo esc_html($pp->post_title);?></a></h4>
                                        <p class="team-job"><?php echo esc_html($pp->post_excerpt);?></p>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>