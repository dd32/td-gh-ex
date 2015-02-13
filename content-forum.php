<?php
/**
 * Forum content
 *
 * @package Atout
 * @author Frenchtastic.eu
 * @link http://codex.wordpress.org/Template_Hierarchy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header>
	<div class="page-content">
		<?php the_content(); ?>
	</div>
	<?php  wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</article>