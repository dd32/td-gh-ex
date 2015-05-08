<?php
	/**
	* Template Name: Fullwidth No Subheader
	*/
	get_header();
?>

<?php the_post(); ?>
	
	<div id="fullwidth-nosubheader" style="margin: 0; padding: 0; overflow:hidden;">
			<?php the_content(); ?>
    </div>

<?php
get_footer();