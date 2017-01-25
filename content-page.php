<?php // The template for displaying page content ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php bento_post_thumbnail(); ?>
	
	<?php bento_post_title(); ?>
    
    <div class="entry-content clear">
		<?php the_content(); ?>
	</div>

</article>