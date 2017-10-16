<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package atoz
 */

?>

<footer class="footer-bottom" style="background-color: <?php echo esc_attr(get_theme_mod( 'atoz_footer_bck_color' ));?>" ;>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-3 col-xs-12 col-sm-12">
					<?php if ( is_active_sidebar( 'widget-footer1' ) ) { dynamic_sidebar( 'widget-footer1' ); } else { ?>
					<section class="widget widget_text">
						<h2 class="widget-title"><?php esc_html_e( 'Footer Widgets 1', 'atoz'); ?></h2>
						<div class="textwidget">
							<p>
								<?php esc_html_e( 'Go to Appearance -> Widgets and add upto four footer widgets you like.' , 'atoz'); ?> </p>
						</div>
					</section>
					<?php }?> </div>
				<div class="col-md-3 col-xs-12 col-sm-12 ">
					<?php if ( is_active_sidebar( 'widget-footer2' ) ) { dynamic_sidebar( 'widget-footer2' ); } else { ?>
					<section class="widget widget_archive">
						<h2 class="widget-title"><?php esc_html_e( 'Footer Widgets 2', 'atoz'); ?></h2>
						<div class="textwidget">
							<p>
								<?php esc_html_e( 'Go to Appearance -> Widgets and add upto four footer widgets you like.' , 'atoz'); ?> </p>
						</div>
					</section>
					<?php }?> </div>
				<div class="col-md-3 col-xs-12 col-sm-12">
					<?php if ( is_active_sidebar( 'widget-footer3' ) ) { dynamic_sidebar( 'widget-footer3' ); } else { ?>
					<section class="widget recent-po ">
						<h2 class="widget-title"><?php esc_html_e( 'Footer Widgets 3', 'atoz'); ?></h2>
						<div class="textwidget">
							<p>
								<?php esc_html_e( 'Go to Appearance -> Widgets and add upto four footer widgets you like.' , 'atoz'); ?> </p>
						</div>
						<?php }?> </section>
				</div>
				<div class="col-md-3 col-xs-12 col-sm-12">
					<?php if ( is_active_sidebar( 'widget-footer4' ) ) { dynamic_sidebar( 'widget-footer4' ); } else { ?>
					<section class="widget recent-po ">
						<h2 class="widget-title"><?php esc_html_e( 'Footer Widgets 4', 'atoz'); ?></h2>
						<div class="textwidget">
							<p>
								<?php esc_html_e( 'Go to Appearance -> Widgets and add upto four footer widgets you like.' , 'atoz'); ?> </p>
						</div>
						<?php }?> </section>
				</div>
			</div>
			<div class=" col-md-12 col-sm-12  fnav text-center">
				<p>ALL RIGHTS RESERVED. COPYRIGHT &#169; 2017. A theme by
					<?php printf( '<a href="' . esc_url( 'https://dcrazed.com/' ) . '" target="_blank">Dcrazed</a>' ); ?> </p>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script>
	new WOW().init();
</script>
</body>
</html>