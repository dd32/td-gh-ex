<?php
/* 	Small Business Theme's Footer Sidebar Area
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Small Business 1.0
*/

	if (smallbusiness_get_option ( 'fsidebar', '1') != '1'):	
	if (   ! is_active_sidebar( 'sidebar-3'  )
		&& ! is_active_sidebar( 'sidebar-4' )
		&& ! is_active_sidebar( 'sidebar-5'  )
	   )
		return;
	endif;

?>
<div id="footer-sidebar">
	<div class="first-footer-widget widgets">	<?php if ( is_active_sidebar( 'sidebar-3' ) ) : dynamic_sidebar( 'sidebar-3' ); endif;?></div>
	<div class="footer-widgets widgets"><?php if ( is_active_sidebar( 'sidebar-4' ) ) : dynamic_sidebar( 'sidebar-4' ); endif;?>
	</div>	
	<div class="footer-widgets widgets"><?php if ( is_active_sidebar( 'sidebar-5' ) ) : dynamic_sidebar( 'sidebar-5' ); endif;?>
	</div>
        
</div><!-- #footerwidget -->