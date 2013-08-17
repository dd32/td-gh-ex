<?php
/**
 * @package WordPress
 * @subpackage Avedon
 * @since Avedon 1.03
 */

get_header(); ?>

<?php if ( ! dynamic_sidebar( 'home-fullfeature-content' ) ); ?><div id="primary" class="row-fluid">
<?php if ( ! dynamic_sidebar( 'home-feature-content' ) ); ?><div class="span6 offset1">
<?php $text = of_get_option('headertext'); if ($text) { echo '<h1 class="homehead">' . of_get_option('headertext') . '</h1>'; }; ?>
<?php $header_image = get_header_image(); if ( ! empty( $header_image ) ) : ?>
<div class="hometop"><img src="<?php echo esc_url( $header_image ); ?>" alt="headerimg" /></div>
<?php endif; ?>

<?php if ( ! dynamic_sidebar( 'top-content' ) ); ?>
<?php global $post; $custom_posts = get_posts($args); foreach($custom_posts as $post) : setup_postdata($post); ?>
<div <?php post_class(); ?>>

<a href="<?php the_permalink(); ?>" title="<?php the_title();?>" class="span11"><h3><?php the_title();?></h3></a>
<span class="comment-count span1 hidden-phone"><?php comments_number('0','1','%'); ?></span>
<p class="meta span12"><?php echo avedon_posted_on();?></p>

<div class="row-fluid">
<?php if ( has_post_thumbnail( 'primary-post-thumbnail' ) ) ?>
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail('primary-post-thumbnail', array('class' => 'span3 teasepic')); ?></a>

<?php the_excerpt();?>

</div></div>

<?php endforeach; ?>

<?php avedon_content_nav('nav-below');?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>