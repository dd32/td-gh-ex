<?php
/*
 * The theme optionspage.
 */
?>

<div class="wrap"> 
	<div id="icon-themes" class="icon32"></div> 
	<h2><?php _e( 'Theme Options', 'gridbulletin' ); ?></h2> 
</div> 

<p><div class="description"><?php _e( 'Welcome on the theme options page. On this page you can set all options this theme offers. Enjoy.', 'gridbulletin' ); ?></div></p>

<table class="widefat"> 
<thead> 
<tr> 
<th><?php _e( 'Description', 'gridbulletin' ); ?></th> 
<th><?php _e( 'What to do', 'gridbulletin' ); ?></th> 
</tr> 
</thead> 
<tfoot> 
<tr> 
<th><?php _e( 'Description', 'gridbulletin' ); ?></th> 
<th><?php _e( 'What to do', 'gridbulletin' ); ?></th> 
</tr> 
</tfoot> 
<tbody> 
<tr> 
<td><?php _e( 'For setting menu', 'gridbulletin' ); ?></td> 
<td><a href="<?php echo esc_url( home_url( '/wp-admin/nav-menus.php' ) ); ?>"><?php _e( 'click here', 'gridbulletin' ); ?></a></td> 
</tr> 
<tr> 
<td><?php _e( 'For setting static homepage', 'gridbulletin' ); ?></td> 
<td><a href="<?php echo esc_url( home_url( '/wp-admin/options-reading.php' ) ); ?>"><?php _e( 'click here', 'gridbulletin' ); ?></a></td> 
</tr> 
<tr> 
<td><?php _e( 'For setting header-image', 'gridbulletin' ); ?></td> 
<td><a href="<?php echo esc_url( home_url( '/wp-admin/themes.php?page=custom-header' ) ); ?>"><?php _e( 'click here', 'gridbulletin' ); ?></a></td> 
</tr> 
<tr> 
<td><?php _e( 'For setting logo', 'gridbulletin' ); ?></td> 
<td><a href="<?php echo esc_url( home_url( '/wp-admin/customize.php' ) ); ?>"><?php _e( 'click here', 'gridbulletin' ); ?></a></td> 
</tr> 
<tr> 
<td><?php _e( 'For setting background (image)', 'gridbulletin' ); ?></td> 
<td><a href="<?php echo esc_url( home_url( '/wp-admin/themes.php?page=custom-background' ) ); ?>"><?php _e( 'click here', 'gridbulletin' ); ?></a></td> 
</tr> 
<tr> 
<td><?php _e( 'For setting widgets', 'gridbulletin' ); ?></td> 
<td><a href="<?php echo esc_url( home_url( '/wp-admin/widgets.php' ) ); ?>"><?php _e( 'click here', 'gridbulletin' ); ?></a></td> 
</tr> 
</tbody> 
</table> 