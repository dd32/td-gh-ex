<?php

/**

 * The Sidebar containing the main widget area

 *

 * @package WordPress

 * @subpackage Twenty_Fourteen

 * @since Twenty Fourteen 1.0

 */

?>

<div id="secondary">

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

<h1 class="screen-reader-text">Left Hand Sidebar</h1>

	<?php endif; ?>

<?php if ( has_nav_menu( 'secondary' ) ) : ?>

	<div role="navigation" aria-label="Global" class="navigation site-navigation secondary-navigation">

<?php
global $badeyes_options;

					$badeyes_settings = get_option( 'badeyes_options', $badeyes_options );
?>

<?php if( $badeyes_settings['side_heading'] != '' ) : ?>
<?php 
echo "<h2 class=\"sidebarH2\">";
echo $badeyes_settings['side_heading']; 
echo "</h2>";
?>
	<?php endif; ?>
<div class="navigation">
<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
</div>	
	</div>

	<?php endif; ?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

	<div id="primary-sidebar" class="primary-sidebar widget-area"> 
<?php dynamic_sidebar( 'sidebar-1' ); ?>

	</div><!-- #primary-sidebar -->

	<?php endif; ?>

</div><!-- #secondary -->
