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
<?php if( get_theme_mod('sideHeading') ): ?>
<?php
echo "<div id=\"secondary\"><h2>";
echo get_theme_mod("sideHeading" , "");
echo "</h2></div>";
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
