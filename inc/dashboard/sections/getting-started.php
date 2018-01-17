<?php
/**
 * Getting started section.
 *
 * @package Gump
 * @since Gump 2.0.0
 */

?>
<div id="getting-started" class="pk-tab-pane pk-is-active">
	<div class="feature-section two-col">
		<div class="col">
			<h3><?php esc_html_e( 'Customize The Theme', 'gump' ); ?></h3>
			<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'gump' ); ?></p>
			<p>
				<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Start Customize', 'gump' ); ?></a>
			</p>
			<h3><?php esc_html_e( 'Read Full Documentation', 'gump' ); ?></h3>
			<p class="about"><?php esc_html_e( 'Need any help to setup and configure the theme? Please check our full documentation for detailed information on how to use it.', 'gump' ); ?></p>
			<p>
				<a href="<?php echo esc_url( "https://www.pankogut.com/docs/gump/?utm_source=theme_dashboard&utm_medium=docs_link&utm_campaign={$this->slug}_dashboard" ); ?>" target="_blank" class="button button-secondary"><?php esc_html_e( 'Read Documentation', 'gump' ); ?></a>
			</p>
		</div>

		<div class="col">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png" alt="<?php esc_attr_e( 'screenshot', 'gump' ); ?>">
		</div>
	</div>
</div>
