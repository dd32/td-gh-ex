	</div><!--.wrap-->


	<footer id="footer">
		<div class="footer-widgets margin">
		<?php if ( is_active_sidebar( 'footer' ) ) : ?>
			<?php dynamic_sidebar( 'footer' ); ?>

		<?php else: ?>

			<aside class="widget one-third">
				<h3><?php _e( 'Categories', 'arix' ) ?></h3>
				<ul>
					<?php
					wp_list_categories( array(
						'title_li' => '',
						'number'   => 6,
					) );
					?>
				</ul>
			</aside>

			<aside class="widget one-third widget_tag_cloud">
				<h3><?php _e( 'Tags', 'arix' ) ?></h3>
				<p class="tag-cloud"><?php wp_tag_cloud( 'number=38' ); ?></p>
			</aside>

			<aside class="widget one-third recent-comments">
				<h3><?php _e( 'Recent Comments', 'arix' ) ?></h3>
				<?php arix_recent_comments(); ?>
			</aside>

		<?php endif; ?>

			<div class="copyright">
				<p><?php esc_html_e( 'Copyright &copy;', 'arix' ); ?> <?php bloginfo( 'name' ); ?><br />
				<a href="<?php echo esc_url( __( 'https://photricity.com/', 'arix' ) ); ?>"><?php esc_html_e( 'Arix theme', 'arix' ); ?></a> <?php esc_html_e( 'by Photricity', 'arix' ); ?></p>
			</div>
		</div><!--.footer-widgets-->
	</footer>


<?php wp_footer(); ?>

</body>
</html>