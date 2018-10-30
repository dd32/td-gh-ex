<?php
/**
 * Getting started section.
 *
 * @package akarsh_blog
 */
 $pro_ver_url = 'https://www.wponlinesupport.com/wordpress-themes/akarshblog-wordpress-blog-theme/'
?>
<div id="getting-started" class="gt-tab-pane gt-is-active">
	<div class="feature-section two-col">
		<div class="col">
			<h3><?php esc_html_e( 'Customize The Theme', 'akarsh-blog' ); ?></h3>
			<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'akarsh-blog' ); ?></p>
			<p>
				<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Start Customize', 'akarsh-blog' ); ?></a>
			</p>

			
		</div>

		<div class="col">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png" alt="<?php esc_attr_e( 'screenshot', 'akarsh-blog' ); ?>">
		</div>
	</div>
</div>