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
	<div id="first-footer-widget" class="widget">
	<?php if ( is_active_sidebar( 'sidebar-3' ) ) : dynamic_sidebar( 'sidebar-3' ); else: if (esc_html(smallbusiness_get_option ( 'fsidebar', '1')) == '1'):?>
        
        <aside id="archives" class="widget">
					<h3 class="widget-title"><?php _e('Categories', 'small-business'); ?></h3>
					
						<ul><?php wp_list_categories('orderby=name&number=5&title_li='); ?></ul>
					
		</aside>
        <?php endif; endif;?>
        </div><!-- #first .widget-area -->
        

	<div id="footer-widgets" class="widget">
    <?php if ( is_active_sidebar( 'sidebar-4' ) ) : dynamic_sidebar( 'sidebar-4' ); else: if (esc_html(smallbusiness_get_option ( 'fsidebar', '1')) == '1'):?>
        <aside class="widget widget_text"><h3 class="widget-title"><?php _e('Sample Text', 'small-business'); ?></h3><div class="textwidget"><?php _e('Small Business is a theme for Small Business Companies. Customizable Background and other options will give the WordPress Driven Site an attractive look. Small Business is super elegant and Professional Theme which will create the business widely expressed. Right and Footer Sidebar will be usable for showing the widgets and PlunIns items', 'small-business'); ?></div></aside>
       <?php endif; endif;?>
	</div><!-- #second .widget-area -->
	
	
	<div id="footer-widgets" class="widget">
    <?php if ( is_active_sidebar( 'sidebar-5' ) ) : dynamic_sidebar( 'sidebar-5' ); else: if (esc_html(smallbusiness_get_option ( 'fsidebar', '1')) == '1'):?>
        <aside class="widget">
					<h3 class="widget-title">List Items</h3>
					<ul>
						<li><?php _e('This is a Test List 01', 'small-business'); ?></li>
                        <li><?php _e('This is a Test List 02', 'small-business'); ?></li>
                        <li><?php _e('This is a Test List 03', 'small-business'); ?></li>
                        <li><?php _e('This is a Test List 04', 'small-business'); ?></li>
                        <li><?php _e('This is a Test List 05', 'small-business'); ?></li>
					</ul>
		</aside>
        <?php endif; endif;?>
	</div><!-- #third .widget-area -->

        
</div><!-- #footerwidget -->

