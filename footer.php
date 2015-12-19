<footer id="footer">
	<div class="copy-right-text text-center">
		<?php if(get_theme_mod('aster_footer_copyright')): ?>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p><?php
							$copyright = get_theme_mod('aster_footer_copyright');
							$allowed_tags = array(
								'strong' => array(),
								'a' => array(
									'href' => array(),
									'title' => array()
								)
							);
							echo wp_kses( $copyright, $allowed_tags ); ?></p>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div><!-- /Copyright Text -->
</footer><!-- /#Footer -->

<?php if (!get_theme_mod('aster_back_to_top')): ?>
    <div class="scroll-up">
        <a href="#"><i class="fa fa-angle-up"></i></a>
    </div>
<?php endif; ?>
<!-- Scroll Up -->

<?php wp_footer(); ?>

</body>
</html>
