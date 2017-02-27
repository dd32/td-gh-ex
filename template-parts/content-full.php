<?php
/**
 * The template for displaying the content of full width page.
 *
 * @package astrology
 */
?>
<div class="fullwidth-content-part">         
    <?php the_post_thumbnail('full');
    the_content();
    if ( comments_open() || get_comments_number() ) {
		comments_template();
	} ?>
</div>