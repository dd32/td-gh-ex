<?php
/**
 * Support section.
 *
 * @package Gump
 * @since Gump 2.0.0
 */

?>
<div id="support" class="pk-tab-pane">
	<div class="feature-section two-col">
		<div class="col">
			<h3><?php esc_html_e( 'Contact Support', 'gump' ); ?></h3>
			<p><?php esc_html_e( 'Our priority support is only available for pro version. Upgrade to Gump Pro now to get access to our excellent support as well as variety of useful features', 'gump' ); ?></p>
			<a class="button button-primary" href='<?php echo esc_url( "https://www.pankogut.com/pro/wordpress-themes/gump-pro/?utm_source=theme_dashboard&utm_medium=product_links&utm_campaign={$this->slug}_dashboard" ); ?>' target="_blank"><?php esc_html_e( 'Upgrade Now', 'gump' ); ?></a>
		</div>
		<div class="col">
			<h3><?php esc_html_e( 'More Themes From Us', 'gump' ); ?></h3>
			<p>
				<?php
					// Translators: theme name.
					echo esc_html( sprintf( __( 'If you like %s, you might want to see another beautiful themes from ', 'gump' ),  $this->theme->name ) );
				?>
				<a href="<?php echo esc_url( "https://www.pankogut.com/wordpress-themes/?utm_source=theme_dashboard&utm_medium=product_links&utm_campaign={$this->slug}_dashboard" ); ?>"><?php esc_html_e( 'PanKogut', 'gump' ); ?></a>
				<?php esc_html_e( 'We build high quality WordPress themes that are well designed and simple to set up. Check them out here!', 'gump' ); ?>
			</p>
			<a class="button button-primary" href='<?php echo esc_url( "https://www.pankogut.com/wordpress-themes/?utm_source=theme_dashboard&utm_medium=product_links&utm_campaign={$this->slug}_dashboard" ); ?>' target="_blank"><?php esc_html_e( 'Visit PanKogut', 'gump' ); ?></a>
		</div>
	</div>
</div>
