<?php
/*
 * This portfolio section has 3 has 4 projects per row.
 */
$prefix = atlast_agency_get_prefix();
$projects = get_theme_mod($prefix . '_portfolio_items', '');
$layout = absint(get_theme_mod($prefix.'_portfolio_layout',1));
if (!empty($projects)):

    $projectsArray = explode(',', $projects);
    $featuredItems = array();
    $otherItems = array();
    $separateItems = atlast_agency_separate_portfolio_items($projectsArray, 3);
    $counter = 0;

    ?>
    <div class="section-container portfolio-content portfolio-style-1">

        <div class="container <?php echo($layout == 1 ?'grid-xl' : ''); ?>">
            <?php if (!empty($separateItems)): ?>
                <div class="columns">
                    <?php
                    foreach ($separateItems as $sep):
                        $args = array(
                            'name' => $sep,
                            'post_type' => 'page',
                            'posts_per_page' => -1
                        );
                        $oPost = get_posts($args);
                        $postID = $oPost[0]->ID;
                        $thumbID = get_post_thumbnail_id($postID);
                        $imageSrc = wp_get_attachment_image_src($thumbID, 'atlast-agency-portfolio-style-3-image'); ?>
                        <div class="column col-3 col-xs-6">
                            <div class="single-portfolio-item">
                                <figure class="snip1577">
                                    <img src="<?php echo esc_url($imageSrc[0]); ?>"
                                         alt="<?php echo esc_attr($oPost[0]->post_title); ?>"/>
                                    <figcaption>
                                        <h3><?php echo esc_html($oPost[0]->post_title); ?></h3>
                                        <h4><?php echo esc_html($oPost[0]->post_excerpt); ?></h4>
                                    </figcaption>
                                    <a href="<?php echo get_the_permalink($oPost[0]->ID); ?>"></a>
                                </figure>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>