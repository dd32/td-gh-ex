<?php
/**
 * The template for displaying author pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage astral
 * @since 0.1
 */
get_header();
?>

<?php
/* 
* Functions hooked into astral_top_banner action
* 
* @hooked astral_inner_banner
*/
do_action( 'astral_top_banner' );
?>

<?php
/* 
* Functions hooked into astral_breadcrumb_area action
* 
* @hooked astral_breadcrumb_area
*/
do_action( 'astral_breadcrumb_area' );
?>

    <!-- blog post-->
    <section class="align-blog" id="blog">
        <div class="container">
            <div class="row">
                <!-- left side -->
                <div class="col-lg-8 single-left mt-lg-0 mt-4">

					<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

						get_template_part( 'post', 'content' );

					endwhile;
					endif;
					?>

					<?php
					/*
					* Functions hooked into astral_pagination action
					*
					* @hooked astral_navigation
					*/
					do_action( 'astral_pagination' ); ?>

                </div>
                <!-- right side -->
                <div class="col-lg-4 event-right">

					<?php get_sidebar(); ?>

                </div>
            </div>
        </div>
    </section>
    <!-- //blog post -->
<?php
get_footer();
?>