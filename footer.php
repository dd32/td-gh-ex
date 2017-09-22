	</div><!-- end div #page-inner -->
</div><!-- end div #page --><!-- END PAGE --><!-- BEGIN BOTTOM-MENU -->	
<div id="bottom-menu">
<div id="bottom-menu-inner" class="clearfix">
<div id="bottom-menu-1">
<?php if (!dynamic_sidebar('opbottom1') ) : ?>
			<?php endif; ?>
</div>
<div id="bottom-menu-2">
	<?php if (!dynamic_sidebar('opbottom2') ) : ?>
			<?php endif; ?>
</div> 
<div id="bottom-menu-4">
	<?php if ( !dynamic_sidebar('opbottom3') ) : ?>
			<?php endif; ?>
</div> 
</div> 
</div> 
<div id="footer">
	<div id="footer-inner" class="clearfix">
			<a href="<?php echo esc_url(home_url('/'));?>" title="<?php bloginfo('name');?>" ><?php bloginfo('name');?></a> <?php _e(' &#169;', 'optimize'); ?>  <?php echo date('Y');?> | <?php _e('Theme: ', 'optimize'); ?> <a href="<?php echo esc_url( __( 'https://www.insertcart.com/product/optimize-wp-theme/', 'optimize' ) ); ?>" title="<?php esc_attr_e( 'Optimize', 'optimize' ); ?>"><strong><?php printf( __( 'Optimize %s', 'optimize' ),''); ?></strong></a> <a class="backtop" href="#top">  <?php _e('&#8593;', 'optimize'); ?></a>
<?php wp_nav_menu( array( 'theme_location' => 'footer-menu','container_class' => '','menu_id' => 'footerhorizontal',    'echo' => true,'after' =>'|','depth' =>'1' ) ); ?>
		</div> <!-- end div #footer-right -->
	</div> <!-- end div #footer-inner -->
	</div> <!-- end div #footer -->
	<!-- END FOOTER -->
		
</div> 
<?php wp_footer(); ?>
</body>
</html>


