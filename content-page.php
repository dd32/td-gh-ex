<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Skirmish
 * @since Skirmish 0.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_post_thumbnail('single-post-thumbnail'); ?>
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'skirmish' ), 'after' => '</div>' ) ); ?>
		<?php edit_post_link( __( 'Edit', 'skirmish' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
