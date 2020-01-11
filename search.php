<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package enigma
 */

get_header();
$class = '';
if (get_theme_mod('breadcrumb', 1) == 1) {
    ?>
    <div class="enigma_header_breadcrum_title">
        <div class="container">
            <div class="row">
                <?php if (have_posts()) : ?>
                    <div class="col-md-12">
                        <?php /* translators: %s: search item. */ ?>
                        <h1><?php printf(esc_html__('Search Results for: %s', 'enigma'), '<span>' . get_search_query() . '</span>'); ?>
                        </h1>
                    </div>
                <?php endif; ?>
                <?php rewind_posts(); ?>
            </div>
        </div>
    </div>
<?php } else {
    $class = 'no-breadcrumb';
} ?>
    <div class="container">
        <div class="row enigma_blog_wrapper <?php echo esc_attr($class); ?>">
            <div class="col-md-8">
                <?php
                if (have_posts()):
                    while (have_posts()): the_post();
                        get_template_part('post', 'content'); ?>
                    <?php endwhile;
                    ?>
                    <div class="text-center wl-theme-pagination">
                        <?php echo esc_html(the_posts_pagination(array('mid_size' => 2))); ?>
                        <div class="clearfix"></div>
                    </div>
                <?php
                else :
                    get_template_part('nocontent');
                endif; ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
<?php get_footer(); ?>