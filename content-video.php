<?php
/**
 * Quote template file
 *
 * @package atout
 * @author Frenchtastic.eu
 * @link http://codex.wordpress.org/Template_Hierarchy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div id="video-frame">
		<?php the_content(); ?>
	</div>
		<?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<div class="post-meta uppercase">
			<?php atout_posted_on(); ?>
		</div><!-- .entry-meta -->
</article>