<?php
/**
* The main template file.
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package BestWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

get_header(); ?>

<div class="bestwp-main-wrapper clearfix" id="bestwp-main-wrapper" itemscope="itemscope" itemtype="http://schema.org/Blog" role="main">
<div class="theiaStickySidebar">
<div class="bestwp-main-wrapper-inside clearfix">

<?php bestwp_top_widgets(); ?>

<div class="bestwp-posts-wrapper" id="bestwp-posts-wrapper">

<div class="bestwp-posts bestwp-box">
<div class='bestwp-box-inside'>

<?php if ( !(bestwp_get_option('hide_posts_heading')) ) { ?>
<?php if(is_home() && !is_paged()) { ?>
<?php if ( bestwp_get_option('posts_heading') ) : ?>
<h1 class="bestwp-posts-heading"><span><?php echo esc_html( bestwp_get_option('posts_heading') ); ?></span></h1>
<?php else : ?>
<h1 class="bestwp-posts-heading"><span><?php esc_html_e( 'Recent Posts', 'bestwp' ); ?></span></h1>
<?php endif; ?>
<?php } ?>
<?php } ?>

<div class="bestwp-posts-content">

<?php if (have_posts()) : ?>

    <div class="bestwp-posts-container">
    <?php $bestwp_total_posts = $wp_query->post_count; ?>
    <?php $bestwp_post_counter=1; while (have_posts()) : the_post(); ?>

        <?php get_template_part( 'template-parts/content', bestwp_post_style() ); ?>

    <?php $bestwp_post_counter++; endwhile; ?>
    </div>
    <div class="clear"></div>

    <?php bestwp_posts_navigation(); ?>

<?php else : ?>

  <?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

</div>

</div>
</div>

</div><!--/#bestwp-posts-wrapper -->

<?php bestwp_bottom_widgets(); ?>

</div>
</div>
</div><!-- /#bestwp-main-wrapper -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>