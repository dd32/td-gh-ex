<?php
/**
 * Template Name: Blog
 * The template file for blog.
 * @package Artwork
 * @since Artwork 1.0
 */
get_header();
if (!(is_front_page())) {
    $GLOBALS['themePageTemplate'] = get_page_template_slug();
}
?>
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'post',
    'paged' => $paged
);
$works = new WP_Query($args);
?>
<?php
if ($works->have_posts()) {
    ?>

    <div class="work-blog">
        <?php
        while ($works->have_posts()) {
            $works->the_post();
            ?>
            <?php get_template_part('content-work', get_post_format()); ?>

        <?php }
        ?>
        <div class="clearfix"></div>

    </div>
    <div class="hidden">
        <div class="older-works">
            <?php next_posts_link('&laquo; Older Entries', $works->max_num_pages) ?>
        </div>
        <?php previous_posts_link('Newer Entries &raquo;') 
        
        ?>
    </div>
    <?php
}
get_footer();
