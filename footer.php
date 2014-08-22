<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Bharat
 * @since Bharat 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			<?php if ('' == get_theme_mod('bharat_footertext')) : ?>
			<?php else: ?>
				<p class="copyright-info"><?php echo bharat_escape_html(get_theme_mod('bharat_footertext')); ?></p>
			<?php endif; ?>

			<?php do_action( 'bharat_credits' ); ?>
			<a href="<?php echo esc_url( __( 'http://smallenvelop.com/', 'bharat' ) ); ?>" title="<?php esc_attr_e( 'SmallEnvelop', 'bharat' ); ?>"><?php printf( __( 'Bhārat %s', 'bharat' ), 'Theme ' ); ?></a><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'bharat' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'bharat' ); ?>"><?php printf( __( 'proudly powered by %s', 'bharat' ), 'WordPress' ); ?></a>
		</div><!-- .site-info -->

		<div class="social-icons">
			<ul class="b-icons">
				<?php if ('' == get_theme_mod('bharat_social_fb')) : ?>
					<?php else: ?>
						<li class="fb"><a href="<?php echo bharat_escape_html(get_theme_mod('bharat_social_fb')); ?>" target="_blank"></a></li>
					<?php endif; ?>
				
				<?php if ('' == get_theme_mod('bharat_social_gp')) : ?>
					<?php else: ?>
					<li class="gp"><a href="<?php echo bharat_escape_html(get_theme_mod('bharat_social_gp')); ?>" target="_blank"></a></li>
					<?php endif; ?>

				<?php if ('' == get_theme_mod('bharat_social_ln')) : ?>
					<?php else: ?>
					<li class="ln"><a href="<?php echo bharat_escape_html(get_theme_mod('bharat_social_ln')); ?>" target="_blank"></a></li>
					<?php endif; ?>
				
				<?php if ('' == get_theme_mod('bharat_social_pn')) : ?>
					<?php else: ?>				
					<li class="pn"><a href="<?php echo bharat_escape_html(get_theme_mod('bharat_social_pn')); ?>" target="_blank"></a></li>
					<?php endif; ?>

				<?php if ('' == get_theme_mod('bharat_social_tw')) : ?>
					<?php else: ?>
					<li class="tw"><a href="<?php echo bharat_escape_html(get_theme_mod('bharat_social_tw')); ?>" target="_blank"></a></li>
					<?php endif; ?>
					
				<?php if ('' == get_theme_mod('bharat_social_wp')) : ?>
					<?php else: ?>
					<li class="wp"><a href="<?php echo bharat_escape_html(get_theme_mod('bharat_social_wp')); ?>" target="_blank"></a></li>
					<?php endif; ?>
					
				<?php if ('' == get_theme_mod('bharat_social_yt')) : ?>
					<?php else: ?>
					<li class="yt"><a href="<?php echo bharat_escape_html(get_theme_mod('bharat_social_yt')); ?>" target="_blank"></a></li>
					<?php endif; ?>

				<?php if ('' == get_theme_mod('bharat_social_db')) : ?>
					<?php else: ?>
					<li class="db"><a href="<?php echo bharat_escape_html(get_theme_mod('bharat_social_db')); ?>" target="_blank"></a></li>
					<?php endif; ?>
			</ul>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>