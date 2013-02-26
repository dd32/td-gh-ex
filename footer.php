

</div> <!-- /#main /.site-main -->

</div> <!-- /.row -->


<footer id="colophon" class="site-footer clearfix" role="contentinfo">

	<div class="row">

		<div class="span8">
			<div class="site-footer-left">

				<?php if ( ! dynamic_sidebar( 'footer' ) ) : // footer widgetized area ?>

					<?php
						echo do_shortcode( '[c] [year] [homelink]' ); // show by default if there are no footer widgets
					?>

				<?php endif; // end of the footer widgetized area ?>

			</div> <!-- /.site-footer-left -->
		</div> <!-- /.span8 -->

		<div class="span4">
			<div class="site-footer-right text-right">
			<?php if( is_home() || is_front_page() ): ?>
				<?php /*
				please do not remove this block with links, it will be shown only on homepage
				it is the best way to support the free open source development
                */ ?>
				<?php _e( 'powered by', 'activetab' ); ?>
				<a href="http://wordpress.org/" title="WordPress CMS" rel="generator"><?php _e( 'WordPress', 'activetab' ); ?></a>
				<?php _e( '&', 'activetab' ); ?>
				<a href="http://web-profile.com.ua/wordpress/themes/activetab/" title="activetab WordPress theme" rel="designer"><?php _e( 'activetab', 'activetab' ); ?></a>
			<?php endif; ?>
			</div> <!-- /.site-footer-right -->
		</div> <!-- /.span4 -->

	</div> <!-- /.row -->


</footer> <!-- /#colophon /.site-footer -->

</div> <!-- /.span12 /.global-wrapper -->
</div> <!-- /.row -->
</div> <!-- /.container -->

</div> <!-- /#page /.hfeed -->

<?php wp_footer(); // js scripts are inserted using this function ?>

</body>

</html>