<?php
/**
 * The template for displaying the content of full width page.
 *
 * @package astrology
 */
?>
<div class="fullwidth-content-part">         
    <?php the_post_thumbnail('full');
    the_content(); ?>
</div>
<?php edit_post_link(	
	sprintf(
		/* translators: %s: Name of current post */
		__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'astrology' ),
		get_the_title()
	),
	'<span class="edit-link">',
	'</span>'
);