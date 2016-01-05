<?php get_header(); ?>
<?php
$GLOBALS['themePageTemplate'] = get_page_template_slug();
if (get_option('show_on_front') == 'page'):
    ?>
    <div class="container main-container <?php if (is_front_page()) : ?>home-main-container<?php endif; ?>">
        <?php if (have_posts()) : ?>
            <?php /* The loop */ ?>
            <?php while (have_posts()) : the_post(); ?>
                <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php if (has_post_thumbnail() && !post_password_required()) : ?>
                        <div class="entry-thumbnail">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    <?php endif; ?>
                    <div class="entry-content">
                        <?php the_content(); ?>                    
                    </div><!-- .entry-content -->
                </article><!-- #post -->
            <?php endwhile; ?>
        <?php endif; ?>

    </div>
    <?php
else:
    if (get_theme_mod('theme_custom_page_show', false) === false):
        get_template_part('custom-page');
    elseif (get_theme_mod('theme_custom_page_show') === 1):
        get_template_part('custom-page');
    else:
        ?>
        <div class="container main-container ">
            <div class="row clearfix">
                <div class=" col-xs-12 col-sm-8 col-md-8 col-lg-8">
                    <?php if (have_posts()) : ?>
                        <?php /* The loop */ ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php get_template_part('content', get_post_format()); ?>
                        <?php endwhile; ?>
                        <?php theme_content_nav('nav-below'); ?>
        <?php endif; ?>
                </div>
                <div class=" col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    <?php
    endif;
endif;
get_footer();
