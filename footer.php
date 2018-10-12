<?php
/**
 * The template file to display an attachment
 *
 * @package agncy
 */

?>
</div> <?php // page-wrapper. ?>
	</div> <?php // viewport. ?>

	<footer class="main-footer">
		<div class="container">
			<?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
			<div class="row">
				<div class="col-xs-12 footer-widgets-container">
					<ul class="footer-widgets">
						<?php dynamic_sidebar( 'footer-sidebar' ); ?>
					</ul>
				</div>
			</div>
			<?php endif; ?>
			<div class="row">
				<div class="col-xs-12">
					<?php
					$args = array(
						'theme_location' => 'footer',
						'menu_class'     => 'footer-menu clearfix footer color-secondaryLight--a-hover',
						'container'      => 'nav',
						'depth'          => 1,
					);
					wp_nav_menu( $args );
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 credit">
					<?php
					$footer_text = AGNCY_FOOTER_DEFAULT;

					if ( agncy_fs()->is__premium_only() && agncy_fs()->is_plan( 'professional' ) ) {
						$footer_text = get_theme_mod( 'footer_text', $footer_text );
					}

					echo wp_kses_post( $footer_text );
					?>
				</div>
			</div>
		</div>
	</footer>
	<div class="phone-menu-lightbox"></div>

<?php wp_footer(); ?>
</body>
</html>
