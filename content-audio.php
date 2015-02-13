<?php
/**
 * Audio template file
 *
 * @package atout
 * @author Frenchtastic.eu
 * @link http://codex.wordpress.org/Template_Hierarchy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-audio">
		<?php the_content(); ?>
	</div>
</article>

