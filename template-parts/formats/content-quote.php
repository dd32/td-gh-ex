<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nnfy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>

	<?php 
	$quote_cite = get_post_meta( get_the_ID(), '_nnfy_city_text', true );
	?>
	<?php if ($quote_cite): ?>
		<div class="blog-quote nnfy_quote blog-content">
			<blockquote>
				<?php the_content(); ?>
				<?php if ($quote_cite): ?>
					<footer>
						<cite><?php echo esc_html( $quote_cite ); ?></cite>
					</footer>
				<?php endif ?>
			</blockquote>
		</div>
	<?php else: ?>
		<div class="blog-quote default__quote ">
			<?php the_content(); ?>
		</div>
	<?php endif ?>

</article>