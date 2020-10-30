<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ArticlePress
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="site-info">
				<div class="row">
					<div class="col-md-7">
						<p class="site-copyright">
							&copy; <?php esc_html( the_date( 'Y' )); ?> <?php esc_html( bloginfo( 'title' ) ) ;?>  <?php esc_html_e('All Rights Reserved, Developed by', 'articlepress') ?> <a href="<?php echo esc_url( 'https://themeasia.net' ); ?>"> <?php esc_html_e( 'ThemeAsia','articlepress' ) ?></a>
						</p>
					</div>

					<!-- Right -->
					<?php if ( get_theme_mod('footer_socail_icon_show_hide') == 1 ): ?>
					<div class="col-md-5">
						<div class="footer-sociaal-icon">
							<ul>
								<!-- Facebook -->
								<?php if ( !empty( get_theme_mod('footer_socail_icon_facebook') ) ): ?>
								<li><a href="<?php echo esc_url( get_theme_mod('footer_socail_icon_facebook') ); ?>" rel="nofollow"><i class="fab fa-facebook-f"></i></a></li>
								<?php endif ?>

								<!-- Twitter -->
								<?php if ( get_theme_mod('footer_socail_icon_twitter') ): ?>
									<li><a href="<?php echo esc_url( get_theme_mod('footer_socail_icon_twitter') ); ?>" rel="nofollow"><i class="fab fa-twitter"></i></a></li>
								<?php endif ?>
								
								<!-- Pinterest -->
								<?php if ( get_theme_mod('footer_socail_icon_pinterest') ): ?>
									<li><a href="<?php echo esc_url( get_theme_mod('footer_socail_icon_pinterest') ); ?>" rel="nofollow"><i class="fab fa-pinterest-p"></i></a></li>
								<?php endif ?>
								
								<!-- Linkedin -->
								<?php if ( get_theme_mod('footer_socail_icon_linkedin') ): ?>
									<li><a href="<?php echo esc_url( get_theme_mod('footer_socail_icon_linkedin') ); ?>" rel="nofollow"><i class="fab fa-linkedin-in"></i></a></li>
								<?php endif ?>
								
								<!-- Youtube -->
								<?php if ( get_theme_mod('footer_socail_icon_youtube') ): ?>
									<li><a href="<?php echo esc_url( get_theme_mod('footer_socail_icon_youtube') ); ?>" rel="nofollow"><i class="fab fa-youtube"></i></a></li>
								<?php endif ?>
								
								<!-- Feed -->
								<?php if( get_theme_mod( 'footer_socail_icon_feed_show_hide' ) == 1 ): ?>
								<li><a href="<?php esc_url( bloginfo('rss2_url') ); ?>" target="_blank"><i class="fas fa-rss"></i></a></li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
					<?php endif ?>
				</div>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->


<!-- Scroll To top -->
<?php if( get_theme_mod('articlepress_scrolltotop_button') ): ?>
<span class="scrolltotop"><i class="fas fa-long-arrow-alt-up <?php echo esc_attr( get_theme_mod('articlepress_scrolltotop_button_position') ); ?>"></i></span>
<?php endif ?>

<?php wp_footer(); ?>

</body>
</html>
