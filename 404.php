<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage fmuzz
 *
 */

get_header();

fmuzz_show_page_header_section();

$options = fmuzz_get_options(); ?>
<div id="main-content-wrapper">
	<div id="main-content-full">
		<article>
			<h1 id="not-found-title">
				<?php echo $options[ 'notfound_title' ]; ?>
			</h1><!-- #not-found-title -->
			<div class="clear">
			</div>
			<div class="text-center">
			<?php if ( array_key_exists( 'notfound_image', $options ) && $options[ 'notfound_image' ] != '' ) :

					$imgPath = $options[ 'notfound_image' ];
					$title = $options[ 'notfound_title' ];
					
					echo "<img id='not-found-image' src='$imgPath' alt='$title' title='$title' />";
					
				endif; ?>
			</div><!-- .text-center -->
			<div class="clear">
			</div>
			<div class="text-center">
				<?php echo $options[ 'notfound_content' ]; ?>
			</div><!-- .text-center -->
		</article>
	</div><!-- #main-content-full -->
</div><!-- #main-content-wrapper -->

<?php get_footer(); ?>