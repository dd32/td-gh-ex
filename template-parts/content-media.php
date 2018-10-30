<?php
/**
 * Display an optional post thumbnail
 * above the post excerpt in the archive page.
 *
 * @package Akarsh Blog
 */
?>
<?php if(has_post_thumbnail()) { ?>
	<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a>			
	</div>
<?php } ?>