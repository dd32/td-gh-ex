</section>
		<?php  get_sidebar(); ?>
	  </div>
  		<footer>
        <!-- Feel free to remove the credit below, but we'd love it if you would leave it in! -->
  			<p>
  				&copy; <?php  echo date("Y")  ?> <?php  bloginfo('name'); ?> | <strong><?php printf( __( 'Commodore by', 'commodore' ),''); ?></strong> <a href="<?php echo esc_url('http://unitednetworksonline.com/wordpress-themes/'); ?>" title="<?php esc_attr_e( 'United Networks', 'commodore' ); ?>"><strong><?php printf( __( 'United Networks', 'commodore' ),''); ?></strong></a><br />
  				<a href="<?php  bloginfo('rss2_url'); ?>"><?php _e("Entries (RSS)","commodore"); ?></a> <?php _e("and","commodore"); ?> <a href="<?php  bloginfo('comments_rss2_url'); ?>"><?php _e("Comments (RSS)","commodore"); ?></a>
  			</p>
  		</footer>
  		<?php  wp_footer(); ?>
       <!-- closes container div from header -->
</div>
	</body>
</html>
