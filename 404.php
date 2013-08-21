<?php
/**
 * @package WordPress
 * @subpackage Avedon
 * @since Avedon 1.04
 */

get_header(); ?>

<div id="primary" class="row-fluid">
<div id="content" role="main" class="fourofour span12">

<article id="post-0" class="row-fluid post error404 not-found">

<div class="span8 offset2">
<div class="well entry-content">

<header class="entry-header"><h1 class="entry-title"><?php echo of_get_option('fourofour_text', 'no entry'); ?></h1></header>

<?php $header_image = get_header_image();
if ( ! empty( $header_image ) ) : ?>
<img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="header" />
<?php endif; ?>

<p><?php _e( 'Lets head back home and we&rsquo;ll get you right back on track.', 'avedon' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn">Continue</a></p>

</div>
</div>
</article>

</div>
</div>

<?php get_footer(); ?>