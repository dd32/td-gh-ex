</section>
		<?php  get_sidebar(); ?>
	  </div>
  		<footer>
        <!-- Feel free to remove the credit below, but we'd love it if you would leave it in! -->
  			<p>
  				&copy; <?php  echo date("Y")  ?> <?php  bloginfo('name'); ?> | <a href="<?php echo esc_url( __( 'http://unitednetworksonline.com/wordpress-themes/', 'wordpresstheme' ) ); ?>" title="<?php esc_attr_e( 'WordPress Theme', 'wordpresstheme' ); ?>"><strong><?php printf( __( 'WordPress Theme', 'wordpresstheme' ),''); ?></strong></a> by <a href="<?php echo esc_url( __( 'http://unitednetworksonline.com', 'unitednetworks' ) ); ?>" title="<?php esc_attr_e( 'United Networks', 'unitednetworks' ); ?>"><strong><?php printf( __( 'United Networks', 'unitednetworks' ),''); ?></strong></a><br />
  				<a href="<?php  bloginfo('rss2_url'); ?>">Entries (RSS)</a> and <a href="<?php  bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>
  			</p>
  		</footer>
  		<?php  wp_footer(); ?>
       <!-- closes container div from header -->
</div>
	</body>
</html>