<?php
/**
 * @subpackage Avedon
 * @since Avedon 1.11
 */

get_header(); ?>

<div id="primary" class="container">
<div id="content" role="main" class="fourofour container panel panel-default">

<article id="post-0" class="post not-found col-md-12">

<header class="entry-header"><h1 class="entry-title"><?php echo of_get_option('fourofour_text', 'no entry'); ?></h1></header>

<?php $header_image = get_header_image(); if ( ! empty( $header_image ) ) : ?>
<img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="header" />
<?php endif; ?>

<p><?php _e( 'Lets head back home and we&rsquo;ll get you right back on track.', 'avedon' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" role="button" class="btn btn-default pull-right">Continue</a></p>

</article></div></div>

<?php get_footer(); ?>