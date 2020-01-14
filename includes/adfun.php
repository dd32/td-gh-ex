<div id="bottom-menu">
<div id="bottom-menu-inner" class="clearfix">
<div id="bottom-menu-1">
<?php if (!dynamic_sidebar('probottom1') ) : ?>
		<?php endif; ?>
</div> <!-- end div #bottom-menu-left -->
<div id="bottom-menu-2">
	<?php if (!dynamic_sidebar('probottom2') ) : ?>
			<?php endif; ?>
</div> <!-- end div #bottom-menu-center -->
<div id="bottom-menu-4">
	<?php if ( !dynamic_sidebar('probottom3') ) : ?>
	<?php endif; ?>
</div> </div> </div>
	<div id="footer">
	<div id="footer-inner" class="clearfix">
	
<?php echo get_theme_mod('promax_copyright_label','Copyright &#169; 2020' ); ?>
<a href="<?php echo esc_url(home_url('/'));?>" title="<?php bloginfo('name');?>" ><?php bloginfo('name');?></a> | <?php _e(' Theme ', 'promax'); ?><a href="<?php echo esc_url( __( 'https://www.insertcart.com/product/promax-wordpress-theme/', 'promax' ) ); ?>" title="<?php esc_attr_e( 'InsertCart', 'promax' ); ?>"><?php printf( __( 'ProMax %s', 'promax' ),''); ?></a>	   
	<?php wp_nav_menu( array( 'theme_location' => 'footer-menu','menu_id' => 'footerhorizontal','echo' => true,'depth' =>'1','fallback_cb' => false ) ); ?>	
	</div> <!-- end div #footer-inner -->
	</div> <!-- end div #footer -->
	<!-- END FOOTER -->
		
</div> 