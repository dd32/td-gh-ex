<?php
function a_magazine_enqueue_child_styles()
{
    $min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
    $parent_style = 'elegant-magazine-style';

    $fonts_url = 'https://fonts.googleapis.com/css?family=Lato:400,300,400italic,900,700';
    wp_enqueue_style('a-magazine-google-fonts', $fonts_url, array(), null);
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap' . $min . '.css');
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style(
        'a-magazine-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('bootstrap', $parent_style),
        wp_get_theme()->get('Version'));


}

add_action('wp_enqueue_scripts', 'a_magazine_enqueue_child_styles');


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function a_magazine_customize_register($wp_customize) {

    $wp_customize->get_setting( 'top_header_background_color')->default = '#1a1a1a';
    $wp_customize->get_setting( 'ticker_section_title')->default = esc_html__('#Trending Now', 'a-magazine');
    $wp_customize->get_setting( 'show_main_news_section')->default = 1;


}
add_action('customize_register', 'a_magazine_customize_register', 9999);


function elegant_magazine_banner_slider(){
if (1 != elegant_magazine_get_option('show_main_news_section')) {
    return null;
}

        $em_slider_category = elegant_magazine_get_option('select_slider_news_category');
        $em_featured_category = elegant_magazine_get_option('select_featured_news_category');

        ?>

    <section class="af-blocks af-main-banner full-section-slider">
        <div class="container">
            <div class="row no-gutter">

                    <div class="col-md-12 col-sm-12 no-gutter-col" data-mh="<?php echo esc_attr($data_mh); ?>">
                        <div class="main-slider">
                            <?php
                            $slider_posts = elegant_magazine_get_posts(3, $em_slider_category);


                            if ($slider_posts->have_posts()) :
                                while ($slider_posts->have_posts()) : $slider_posts->the_post();
                                    if (has_post_thumbnail()) {
                                        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                                        $url = $thumb['0'];
                                    } else {
                                        $url = '';
                                    }
                                    global $post;

                                    ?>
                                    <figure class="slick-item">
                                        <div class="data-bg data-bg-hover data-bg-hover data-bg-slide"
                                             data-background="<?php echo esc_url($url); ?>">
                                            <a class="em-figure-link" href="<?php the_permalink(); ?>"></a>
                                            <figcaption class="slider-figcaption slider-figcaption-1">

                                                <div class="figure-categories figure-categories-bg">
                                                    <?php echo elegant_magazine_post_format($post->ID); ?>
                                                    <?php elegant_magazine_post_categories('&nbsp', 'extended'); ?>
                                                </div>
                                                <div class="title-heading">
                                                    <h3 class="article-title slide-title">
                                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    </h3>
                                                </div>
                                                <div class="grid-item-metadata grid-item-metadata-1">
                                                    <?php elegant_magazine_post_item_meta(); ?>
                                                </div>
                                            </figcaption>
                                        </div>
                                    </figure>
                                <?php
                                endwhile;
                            endif;
                            wp_reset_postdata();
                            ?>
                        </div>

                        <div class="af-navcontrols">
                            <div class="slide-count">
                                <span class="current"></span> of
                                <span class="total"></span>
                            </div>
                        </div>

                    </div>


                <?php


                    $featured_posts = $slider_posts = elegant_magazine_get_posts(4, $em_featured_category);
                    if ($featured_posts->have_posts()) :
                        while ($featured_posts->have_posts()) :
                            $featured_posts->the_post();
                            global $post;

                            if (has_post_thumbnail()) {
                                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                                $url = $thumb['0'];
                            } else {
                                $url = '';
                            }

                            ?>
                            <div class="col-md-3 col-6-3 col-xs-6 no-gutter-col banner-half"
                                 data-mh="banner-height">
                                <figure class="featured-article">
                                    <div class="featured-article-wrapper">
                                        <div class="data-bg data-bg-hover data-bg-hover data-bg-featured"
                                             data-background="<?php echo esc_url($url); ?>">
                                            <a class="em-figure-link" href="<?php the_permalink(); ?>"></a>
                                            <div class="figure-categories figure-categories-1 figure-categories-bg">
                                                <?php echo elegant_magazine_post_format($post->ID); ?>
                                                <?php elegant_magazine_post_categories(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </figure>

                                <figcaption>
                                    <div class="title-heading">
                                        <h3 class="article-title article-title-1">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="grid-item-metadata">
                                        <?php elegant_magazine_post_item_meta(); ?>
                                    </div>
                                </figcaption>
                            </div>

                        <?php endwhile;

                    wp_reset_postdata();
                endif;
                ?>

            </div>
        </div>
    </section>

    <!-- end slider-section -->
<?php
    }