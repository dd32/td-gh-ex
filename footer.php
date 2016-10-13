	</div><!--.wrap-->


	<footer id="footer">
		<div class="margin footer-widgets">
			<?php if ( is_active_sidebar( 'footer' ) ) : ?>
				<?php dynamic_sidebar( 'footer' ); ?>
	
			<?php else: ?>

			<div class="widget one-third">
				<h3><?php _e( 'Categories', 'arix' ) ?></h3>
				<ul>
					<?php wp_list_categories( array(
						'title_li' => '',
						'number'   => 7,
					) ); ?>
				</ul>
			</div>

			<div class="widget one-third widget_tag_cloud">
				<h3><?php _e( 'Tags', 'arix' ) ?></h3>
				<p class="tag-cloud"><?php wp_tag_cloud( 'number=38' ); ?></p>
			</div>

			<div class="widget one-third recent-comments">
				<h3><?php _e( 'Recent Comments', 'arix' ) ?></h3>
				<?php
				$args = array(
					'number'  => '3',
					'post_id' => 0,
				);
				$comments = get_comments( $args );
				foreach( $comments as $comment ) :
					echo( '<h5>' . $comment->comment_author . '</h5><p>' . $comment->comment_content . '</p>' );
				endforeach;
				?>
			</div>

			<?php endif; ?>

			<div class="copyright">
				<p><?php esc_attr_e( 'Copyright &copy;', 'arix' ); ?> <?php bloginfo( 'name' ); ?><br />
				<a href="<?php echo esc_url( __( 'http://photricity.com/', 'arix' ) ); ?>"><?php esc_attr_e( 'Arix theme', 'arix' ); ?></a> <?php esc_attr_e( 'by Photricity', 'arix' ); ?></p>
			</div>
		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>