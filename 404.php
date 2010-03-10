<?php
/**
 * @package WordPress
 * @subpackage Belle
 */

get_header();
?>

	<div id="content" class="narrowcolumn">

			<?php locate_template( array('belle/404.php'), true ); ?>
			
	</div>


<?php get_sidebar(); ?>

<?php get_footer(); ?>