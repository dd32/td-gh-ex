<?php
/**
* Slider
*
* @package BestWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! function_exists( 'bestwp_slider' ) ) :

function bestwp_slider() { ?>
<div class="bestwp-posts-carousel-wrapper">

    <?php
    $slider_length = 5;
    if ( bestwp_get_option('slider_length') ) {
        $slider_length = bestwp_get_option('slider_length');
    }

    $slider_post_type = 'recent-posts';
    if ( bestwp_get_option('slider_post_type') ) {
        $slider_post_type = bestwp_get_option('slider_post_type');
    }

    $slider_cat = bestwp_get_option('slider_cat');

    if(($slider_post_type === 'category-posts') && $slider_cat) {
        $slider_query = new WP_Query("orderby=date&posts_per_page=".$slider_length."&nopaging=0&post_status=publish&ignore_sticky_posts=1&post_type=post&cat=$slider_cat");
    } else {
        $slider_query = new WP_Query("orderby=date&posts_per_page=".$slider_length."&nopaging=0&post_status=publish&ignore_sticky_posts=1&post_type=post");
    }

    if ($slider_query->have_posts()) : ?>

    <div class="bestwp-posts-carousel">
    <div class="bestwp-box">
    <div class="bestwp-box-inside">
    <div class="owl-carousel">
    <?php while ($slider_query->have_posts()) : $slider_query->the_post();  ?>
    <div class="bestwp-slide-item">
        <?php if(has_post_thumbnail()) { ?>
            <?php the_post_thumbnail('bestwp-medium-image', array('class' => 'bestwp-slider-post-thumbnail-img', 'title' => get_the_title())); ?>
        <?php } else { ?>
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/no-image-4-3.jpg' ); ?>" class="bestwp-slider-post-thumbnail-img"/>
        <?php } ?>
        <div class="text-over">
            <?php
            if ( 'post' == get_post_type() ) {
                /* translators: used between list items, there is a space */
                $categories_list = get_the_category_list( ' ' );
                if ( $categories_list ) {
                    /* translators: 1: list of categories. */
                    printf( '<div class="bestwp-carousel-post-categories">' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'bestwp' ) . '</div>', $categories_list ); // WPCS: XSS OK.
                }
            }
            ?>
            <h4 class="bestwp-carousel-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'bestwp' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a></h4>
            <div class="bestwp-carousel-post-footer">
            <span class="bestwp-carousel-post-author bestwp-carousel-post-meta"><i class="fa fa-user-circle-o"></i>&nbsp;<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span>
            <span class="bestwp-carousel-post-date bestwp-carousel-post-meta"><i class="fa fa-clock-o"></i>&nbsp;<?php echo get_the_date('Y-m-d'); ?></span>
            <span class="bestwp-carousel-post-comment bestwp-carousel-post-meta"><i class="fa fa-comments-o"></i>&nbsp;<?php comments_popup_link( esc_attr__( '0 Comments', 'bestwp' ), esc_attr__( '1 Comment', 'bestwp' ), esc_attr__( '% Comments', 'bestwp' ) ); ?></span>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    </div>
    </div>
    </div>
    </div>

    <?php wp_reset_postdata();  // Restore global post data stomped by the_post().
    endif; ?>

</div>
<?php }

endif;