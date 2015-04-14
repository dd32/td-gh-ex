</section>
		<?php  get_sidebar(); ?>
	  </div>
  		<footer>
        <!-- Feel free to remove the credit below, but we'd love it if you would leave it in! -->
  			<p>
  				&copy; <?php  echo date("Y")  ?> <?php  bloginfo(__('name','Commodore')); ?> | <a href="<?php echo esc_url( __( 'http://unitednetworksonline.com/wordpress-themes/', 'Commodore' ) ); ?>" title="<?php esc_attr_e( 'WordPress Themes', 'Commodore' ); ?>"><strong><?php printf( __( 'Commodore', 'Commodore' ),''); ?></strong></a> by <a href="<?php echo esc_url( __( 'http://unitednetworksonline.com', 'Commodore' ) ); ?>" title="<?php esc_attr_e( 'Responsive WordPress Web Development', 'Commodore' ); ?>"><strong><?php printf( __( 'United Networks', 'Commodore' ),''); ?></strong></a><br />
  				<a href="<?php  bloginfo('rss2_url'); ?>">Entries (RSS)</a> and <a href="<?php  bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>
  			</p>
  		</footer>
  		<?php  wp_footer(); ?>
       <!-- closes container div from header -->
</div>
	</body>
</html>