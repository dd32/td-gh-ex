<?php
/**
 * @package WordPress
 * @subpackage Avedon
 * @since Avedon 1.03
 */

get_header(); ?>

<div class="row-fluid">

<?php if ( have_posts() ) : ?>

<div class="span6 offset1 well">

<header class="jumbotron subhead" id="overview">
<h1><?php printf( __( 'Search Results for: %s', 'avedon' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

</header>

<?php while ( have_posts() ) : the_post(); ?>
<a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h2> <?php the_title();?></h2></a><?php the_excerpt();?>

<?php endwhile; ?>
<?php else : ?>

<div class="span6 offset1">

<header class="jumbotron subhead" id="overview">
<h1><?php _e( 'No Results Found', 'avedon' ); ?></h1>
<p class="lead"><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps you should try again with a different search term.', 'avedon' ); ?></p><hr />

<?php get_search_form(); ?>

</header>

<?php endif ;?>

</div>

<?php avedon_content_nav( 'nav-below' ); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>