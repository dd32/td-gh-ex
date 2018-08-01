<?php
/*
 * This portfolio section has 1 large projects and four smaller ones.
 */
$prefix = atlast_agency_get_prefix();
$projects = get_theme_mod($prefix . '_portfolio_items', '');
$layout = absint(get_theme_mod($prefix.'_portfolio_layout',1));
if (!empty($projects)):

    $projectsArray = explode(',', $projects);
    $featuredItems = array();
    $otherItems = array();
    $separateItems = atlast_agency_separate_portfolio_items($projectsArray, 1);
    $counter = 0;
    ?>
    <div class="section-container portfolio-content portfolio-style-1">

        <div class="container <?php echo($layout == 1 ?'grid-xl' : ''); ?>">

            <div class="columns">

                <!-- First One -->
                <?php
                $fItems = $separateItems['featured'];
                foreach ($fItems as $fi):
                    $args = array(
                        'name' => $fi,
                        'post_type' => 'page',
                        'posts_per_page' => 1
                    );
                    $fPost = get_posts($args);
                    $postID = $fPost[0]->ID;
                    $thumbID = get_post_thumbnail_id($postID);
                    $imageSrc = wp_get_attachment_image_src($thumbID, 'atlast-agency-portfolio-style-1-big-image');
                    $imageSrc[0];

                endforeach;
                ?>
                <div class="column col-6 col-xs-12">
                    <div class="single-portfolio-item">
                        <figure class="snip1577">
                            <img src="<?php echo esc_url($imageSrc[0]); ?>"
                                 alt="<?php echo esc_html($fPost[0]->post_title); ?>"/>
                            <figcaption>
                                <h3><?php echo esc_html($fPost[0]->post_title); ?></h3>
                                <h4><?php echo esc_html($fPost[0]->post_excerpt); ?></h4>
                            </figcaption>
                            <a href="<?php echo get_the_permalink($fPost[0]->ID);?>"></a>
                        </figure>
                    </div>
                </div>

                <!-- Other 4 ones -->
                <div class="column col-6 col-xs-12">

                    <div class="columns">
                        <?php
                        $oItems = $separateItems['other'];
                        $counter = 0;
                        foreach ($oItems as $fi):
                            $args = array(
                                'name' => $fi,
                                'post_type' => 'page',
                                'posts_per_page' => 1
                            );
                            $oPost = get_posts($args);
                            $postID = $oPost[0]->ID;
                            $thumbID = get_post_thumbnail_id($postID);
                            $imageSrc = wp_get_attachment_image_src($thumbID, 'atlast-agency-portfolio-style-1-small-image'); ?>
                            <div class="column col-6">
                                <div class="single-portfolio-item">
                                    <figure class="snip1577">
                                        <img src="<?php echo esc_url($imageSrc[0]);?>"
                                             alt="<?php echo esc_attr($oPost[0]->post_title);?>"/>
                                        <figcaption>
                                            <h3><?php echo esc_html($oPost[0]->post_title); ?></h3>
                                            <h4><?php echo esc_html($oPost[0]->post_excerpt); ?></h4>
                                        </figcaption>
                                        <a href="<?php echo get_the_permalink($oPost[0]->ID);?>"></a>
                                    </figure>
                                </div>
                            </div>


                        <?php  endforeach; ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
<?php endif; ?>