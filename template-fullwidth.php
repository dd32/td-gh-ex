<?php
/**
* Template Name: Fullwidth
*/
get_header();
?>

<?php the_post(); ?>
	
	<div id="fullwidth" style="margin: 0; padding: 0; overflow:hidden;">
			<?php the_content(); ?>
    </div>

<?php
get_footer();