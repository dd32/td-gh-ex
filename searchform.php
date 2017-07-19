<?php
/**
 * Template for displaying search forms in Aquaparallax
 *
 * @package aquaparallax
 * 
 */
?>

<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div>
					<label class="screen-reader-text" for="s"><?php echo esc_html_e( 'Search for:', 'aquaparallax' ); ?></label>
					<input type="text" value="" name="s" id="s">
					<input type="submit" id="searchsubmit" value="Search">
				</div>
			</form>