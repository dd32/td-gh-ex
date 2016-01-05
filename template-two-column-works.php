<?php
/**
 * Template Name: Works Archive
 * The template file for works archive.
 * @package Artwork
 * @since Artwork 1.0
 */
get_header();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => theme_get_post_type_slug(),
    'paged' => $paged
);
$works = new WP_Query($args);
if ($works->have_posts()) {
    ?>
    <div class="two-col-works">
        <?php
        while ($works->have_posts()) {
            $works->the_post();
            $feat_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumb-large');
            $widthImg = $feat_image_url[1];
            $classPage = '';
            if ($widthImg >= 600) {
                $classPage = 'work-wrapper-cover';
            }
            $workBg = get_post_meta(get_the_ID(), '_work_bg', true);
            if (empty($workBg)):
                $workBg = "work-wrapper-light";
            endif;
            if ($feat_image_url):
                ?>
                <a href="<?php the_permalink(); ?>" class="work-element">
                    <div class="work-wrapper work-wrapper-bg <?php echo $workBg; ?> <?php echo $classPage; ?>" style="background-image: url(<?php echo $feat_image_url[0]; ?>)">
                    </div>
                    <?php the_title('<div class="work-content"><div class="work-header"><h5>','</h5></div></div>'); ?>  
                </a>
            <?php else: ?>
                <a href="<?php the_permalink(); ?>" class="work-element default-elemet" >
                    <div class="work-wrapper <?php echo $workBg; ?> <?php echo $classPage; ?>" >
                    </div>
                    <?php the_title('<div class="work-content"><div class="work-header"><h5>','</h5></div></div>'); ?>  
                </a>
            <?php
            endif;
        }
        ?>
    </div>
    <div class="clearfix"></div>			           
    <div class="hidden">
        <div class="older-works">
            <?php next_posts_link('&laquo; Older Entries', $works->max_num_pages) ?>
        </div>
        <?php previous_posts_link('Newer Entries &raquo;') ?>
    </div>
    <?php
}
get_footer();
