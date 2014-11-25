<?php
/**
 * The default template for displaying page content
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="page-content">
		<?php fgymm_the_content_single(); ?>
	</div>
	<div class="clean"></div>
	<?php edit_post_link( __( 'Edit', 'fgymm' ), '<span class="edit-icon">', '</span>' ); ?>
</article>