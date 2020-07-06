<?php
/* 	Design Theme's Footer Sidebar Area
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Design 1.0
*/
	
	if (esc_html(design_get_option ( 'fsidebar', '1')) != '1'):	
	if (   ! is_active_sidebar( 'sidebar-2'  )
		&& ! is_active_sidebar( 'sidebar-3' )
		&& ! is_active_sidebar( 'sidebar-4' )
		&& ! is_active_sidebar( 'sidebar-5'  )
	   )
		return;
	endif;
		
	// If we get this far, we have widgets. Let do this.
?>
<div id="footer-sidebar">
	<div id="first-footer-widget" class="widgets">
	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : dynamic_sidebar( 'sidebar-2' );  endif;?>
    </div><!-- #first .widget-area -->        

	<div id="footer-widgets" class="widgets">
    <?php if ( is_active_sidebar( 'sidebar-3' ) ) : dynamic_sidebar( 'sidebar-3' );  endif;?>
	</div><!-- #second .widget-area -->	
	
	<div id="footer-widgets" class="widgets">
    <?php if ( is_active_sidebar( 'sidebar-4' ) ) : dynamic_sidebar( 'sidebar-4' ); endif;?>
	</div><!-- #third .widget-area -->
    
    <div id="footer-widgets" class="widgets">
    <?php if ( is_active_sidebar( 'sidebar-5' ) ) : dynamic_sidebar( 'sidebar-5' ); endif;?>
	</div><!-- #third .widget-area -->
</div><!-- #footerwidget -->