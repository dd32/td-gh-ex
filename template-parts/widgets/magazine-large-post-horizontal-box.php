<?php
/**
 * The template for displaying large posts in the Magazine Horizontal Box widget.
 *
 * @package Beetle
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'large-post clearfix' ); ?>>

	<?php beetle_post_image( 'beetle-thumbnail-large' ); ?>

	<div class="post-content">

		<header class="entry-header">

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php beetle_magazine_entry_meta(); ?>

		</header><!-- .entry-header -->

		<div class="entry-content">

			<?php the_excerpt(); ?>
			<?php beetle_more_link(); ?>

		</div><!-- .entry-content -->

	</div>

</article>
