<?php
/**
 * @package WordPress
 * @subpackage Avedon
 * @since Avedon 1.01
 */

get_header(); ?>

<div class="row-fluid">
<div class="row-container">
<?php if ( ! dynamic_sidebar( 'home-feature-content' ) ); ?>
<?php avedon_breadcrumbs();?>
</div>
</div>

<div class="row-fluid">
<div class="span12">
<div class="span6 offset1">

<?php if ( ! dynamic_sidebar( 'headertext' ) ) : ?>

<h1 class="homehead">
<?php echo of_get_option('headertext', 'no entry'); ?>
</h1>
<?php endif; ?>


<div class="hometop">
<?php $header_image = get_header_image();
if ( ! empty( $header_image ) ) : ?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
<?php endif; ?>

<?php if ( ! dynamic_sidebar( 'top-content' ) ); ?>
</div>

<?php
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$query = new WP_Query( array( 'post_type' => 'post', 'paged'=>$paged, 'showposts'=>0) );
if (have_posts()) : while ( have_posts() ) : the_post();
?>

    <div <?php post_class(); ?>>
      <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" class="span11"><h3><?php the_title();?></h3></a>
      <span class="comment-count span1"><?php comments_number('0','1','%'); ?></span>
      <p class="meta span12"><?php echo avedon_posted_on();?></p>
      <div class="row-fluid">
        <?php
        if ( has_post_thumbnail() ) ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
          <?php the_post_thumbnail('thumbnail', array('class' => 'span3 teasepic')); ?>
        </a>
        <div class="span9">
         <?php the_excerpt();?>
       </div>
     </div>
   </div>
 <?php endwhile; endif; ?>
 <?php avedon_content_nav('nav-below');?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>


