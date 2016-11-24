<footer id="footer">
	<div class="copy-right-text text-center">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p><?php echo wp_kses_post( sprintf(
							__( 'Copyright &copy; %s %s. All rights reserved.<br>Powered by %s. Developed by %s', 'aster' ),
							date_i18n( __( 'Y', 'aster' ) ),
							'<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html( get_bloginfo( 'name' ) ) . '</a>',
							'<a href="https://wordpress.org">WordPress</a>',
							'<a href="http://rubelmiah.com">Rubel</a>'
						) );
						?></p>
				</div>
			</div>
		</div>
	</div><!-- /Copyright Text -->
</footer><!-- /#Footer -->


<div class="scroll-up">
    <a href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- Scroll Up -->

<?php wp_footer(); ?>

</body>
</html>
