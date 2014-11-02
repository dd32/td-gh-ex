<?php get_header(); ?>

<?php tishonator_show_page_header_section(); ?>

<?php
	$options = get_option( 'fkidd_tishonator_notfound_settings' );
?>
<div id="main-content-wrapper">
	<div id="main-content-full">
		<article>
		<h1 id="not-found-title"><?php echo $options[ 'tishonator_notfound_title' ]; ?></h1>
		<div class="clear">
		</div>
		<div class="text-center">
		<?php
			if ( array_key_exists( 'tishonator_notfound_image', $options )
				&& $options[ 'tishonator_notfound_image' ] != '' ) {

				$imgPath = $options[ 'tishonator_notfound_image' ];
				$title = __('Error 404: Not Found', 'tishonator' );
				
				echo "<img id='not-found-image' src='$imgPath' alt='$title' title='$title' />";
			}
		?>
		</div>
		<div class="clear">
		</div>
		<div class="text-center">
			<?php echo $options[ 'tishonator_notfound_content' ]; ?>
		</div>
		</article>
	</div>
</div>

<?php get_footer(); ?>