<?php
/**
 * @subpackage Avedon
 * @since Avedon 1.07
 */

get_header(); ?>

<div id="primary" class="row-fluid">
<div class="span6 offset1">

<?php if ( have_posts() ) : ?>

<h1 id="overview" class="subhead"><?php printf( __( 'Search Results for: %s', 'avedon' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

<?php get_posts(); while (have_posts()) : the_post(); ?>

<div <?php post_class(); ?>>
<a href="<?php the_permalink(); ?>" title="<?php the_title();?>" class="span11"><h3><?php the_title();?></h3></a>
<span class="comment-count span1 hidden-phone"><?php comments_number('0','1','%'); ?></span>
<p class="meta span12"><?php echo avedon_posted_on();?></p>
<div class="row-fluid"><span class="span12">
<?php if ( has_post_thumbnail() ) ?>
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
<?php the_post_thumbnail( 'primary-post-thumbnail', array('class' => 'span3 teasepic'));?></a>
<?php the_excerpt();?>
</span>
</div>
</div>


<?php endwhile; ?>
<?php else : ?>

<div class="single-entry group">

<h1 id="overview" class="subhead"><?php _e( 'No Results Found', 'avedon' ); ?></h1>
<p class="lead"><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps you should try again with a different search term.', 'avedon' ); ?></p><hr />

<?php get_search_form(); ?>

</div>

<?php endif ;?>

<?php avedon_content_nav( 'nav-below' ); ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>