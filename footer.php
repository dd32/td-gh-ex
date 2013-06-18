

</div> <!-- /#main /.site-main -->

</div> <!-- /.row-fluid -->


<footer id="colophon" class="site-footer clearfix" role="contentinfo">

	<div class="row-fluid">

		<div class="span8">
			<div class="site-footer-left">

				<?php if ( ! dynamic_sidebar( 'footer' ) ) : // footer widgetized area ?>

					<?php
						$description = '';
						if ( get_bloginfo( 'description' ) ){
							$description .= ' | '.esc_attr( get_bloginfo( 'description', 'display' ) );
						}
						echo '&copy; '.date( 'Y' ).' ';
						echo '<a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).$description.'" rel="home">'.get_bloginfo( 'name' ).'</a>';
					?>

				<?php endif; // end of the footer widgetized area ?>

			</div> <!-- /.site-footer-left -->
		</div> <!-- /.span8 -->

		<div class="span4">
			<div class="site-footer-right text-right">

				<?php if ( is_home() || is_front_page() ) : // show credit links only on homepage
					// it is completely optional, but if you like the theme I would appreciate it if you keep the credit link at the bottom ?>
					<?php _e( 'powered by', 'activetab' ); ?>
					<a href="http://wordpress.org/" title="WordPress CMS" rel="generator"><?php _e( 'WordPress', 'activetab' ); ?></a>,
					<a href="http://web-profile.com.ua/wordpress/themes/activetab/" title="activetab theme" rel="designer"><?php _e( 'activetab', 'activetab' ); ?></a>
				<?php endif; ?>

				<?php if ( ! is_home() && ! is_front_page() ) : // show rss links everywhere except homepage ?>
					<a href="<?php echo esc_url( get_bloginfo( 'rss2_url' ) ); ?>" class="rss-feed-link rss-feed-link-posts" title="<?php esc_attr_e( 'posts rss feed', 'activetab' ); ?>"></a>
					<a href="<?php echo esc_url( get_bloginfo( 'comments_rss2_url' ) ); ?>" class="rss-feed-link rss-feed-link-comments" title="<?php esc_attr_e( 'comments rss feed', 'activetab' ); ?>"></a>
				<?php endif; ?>

			</div> <!-- /.site-footer-right -->
		</div> <!-- /.span4 -->

	</div> <!-- /.row-fluid -->


</footer> <!-- /#colophon /.site-footer -->

</div> <!-- /.span12 -->
</div> <!-- /.row-fluid -->
</div> <!-- /.container-fluid -->
</div> <!-- /.site-wrapper -->

</div> <!-- /#page /.hfeed -->

<?php wp_footer(); // wp_footer() should be just before the closing </body> tag, or many plugins will be broken  ?>

</body>

</html>