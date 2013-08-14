<?php
/**
 * @package WordPress
 * @subpackage Avedon
 * @since Avedon 1.01
 */

get_header(); ?>

<div id="primary" class="row-fluid">
<div class="span6 offset1">

<h1 class="subhead" id="overview">
<?php
if ( is_day() ) {
printf( __( 'Daily Archives: %s', 'avedon' ), '<span>' . get_the_date() . '</span>' );
} elseif ( is_month() ) {
printf( __( 'Monthly Archives: %s', 'avedon' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'avedon' ) ) . '</span>' );
} elseif ( is_year() ) {
printf( __( 'Yearly Archives: %s', 'avedon' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'avedon' ) ) . '</span>' );
} elseif ( is_tag() ) {
printf( __( 'Tag Archives: %s', 'avedon' ), '<span>' . single_tag_title( '', false ) . '</span>' );

/* OPTIONAL TAG DESCRIPTION */
$tag_description = tag_description();
if ( $tag_description )
echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
} elseif ( is_category() ) {
printf( __( 'Category Archives: %s', 'avedon' ), '<span>' . single_cat_title( '', false ) . '</span>' );

/* OPTIONAL CATEGORY DESCRIPTION */
$category_description = category_description();
if ( $category_description )
echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
} else {
_e( 'Blog Archives', 'avedon' );
}
?>
</h1>

<?php while ( have_posts() ) : the_post(); ?>

<div <?php post_class(); ?>>
<a href="<?php the_permalink(); ?>" title="<?php the_title();?>" class="span11"><h3><?php the_title();?></h3></a>
<span class="comment-count span1 hidden-phone"><?php comments_number('0','1','%'); ?></span>
<p class="meta span12"><?php echo avedon_posted_on();?></p>

<div class="row-fluid">

<?php
if ( has_post_thumbnail( 'primary-post-thumbnail' ) ) ?>
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
<?php the_post_thumbnail('thumbnail', array('class' => 'span3 teasepic')); ?>
</a>

<?php the_excerpt();?>

</div>
</div>

<?php endwhile; ?>
<?php avedon_content_nav('nav-below');?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>