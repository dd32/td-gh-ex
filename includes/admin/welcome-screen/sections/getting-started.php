<?php
/**
 * Getting started template
 */

$customizer_url = admin_url() . 'customize.php' ;
?>

<div id="getting_started" class="avis-lite-tab-pane active">

	<div class="avis-tab-pane-center">

		<h1 class="avis-lite-welcome-title">Welcome to Avis Lite! <?php if( !empty($avis_lite['Version']) ): ?> <sup id="avis-lite-theme-version"><?php echo esc_attr( $avis_lite['Version'] ); ?> </sup><?php endif; ?></h1>

		<p><?php esc_html_e( 'Our one of the popular free minimal, responsive and Elegant Business WordPress theme, Avis Lite!','avis-lite'); ?></p>
		<p><?php esc_html_e( 'We want to make sure you have the best experience using Avis Lite and that is why we gathered here all the necessary informations for you. We hope you will enjoy using Avis Lite, as much as we enjoy creating great products.', 'avis-lite' ); ?>

	</div>

	<hr />

	<div class="avis-tab-pane-center">

		<h1><?php esc_html_e( 'Getting started', 'avis-lite' ); ?></h1>

		<h4><?php esc_html_e( 'Customize everything in a single place.' ,'avis-lite' ); ?></h4>
		<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'avis-lite' ); ?></p>
		<p><a href="<?php echo esc_url( $customizer_url ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer', 'avis-lite' ); ?></a></p>

	</div>

	<hr />

	<div class="avis-tab-pane-center">

		<h1><?php esc_html_e( 'FAQ', 'avis-lite' ); ?></h1>

	</div>

	<div class="avis-tab-pane-half avis-tab-pane-first-half">

		<h4><?php esc_html_e( 'Create a child theme', 'avis-lite' ); ?></h4>
		<p><?php esc_html_e( 'If you want to make changes to the theme\'s files, those changes are likely to be overwritten when you next update the theme. In order to prevent that from happening, you need to create a child theme. For this, please follow the documentation below.', 'avis-lite' ); ?></p>
		<p><a href="<?php echo esc_url( 'https://codex.wordpress.org/Child_Themes' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'avis-lite' ); ?></a></p>

		<hr />
		
		<h4><?php esc_html_e( 'How to set front page?', 'avis-lite' ); ?></h4>
		<p><?php esc_html_e( 'You can set the front page to a static page from Setting -> Reading.', 'avis-lite' ); ?></p>
		<p><a href="<?php echo esc_url( 'https://codex.wordpress.org/Creating_a_Static_Front_Page#WordPress_Static_Front_Page_Process/' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'avis-lite' ); ?></a></p>

	</div>

	<div class="avis-tab-pane-half">

		<h4><?php esc_html_e( 'Translate Avis Lite', 'avis-lite' ); ?></h4>
		<p><?php esc_html_e( 'In the below documentation you will find an easy way to translate Avis Lite into your native language or any other language you need for you site.', 'avis-lite' ); ?></p>
		<p><a href="<?php echo esc_url( 'https://sketchthemes.com/blog/effective-steps-to-translate-your-wordpress-theme-using-qtranslate-x/' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'avis-lite' ); ?></a></p>

		<hr />

		<h4><?php esc_html_e( 'What if I have any problems?', 'avis-lite' ); ?></h4>
		<p><?php esc_html_e( 'In case of any problems or help you can search to see if your topic has been started already or post a new support topic.', 'avis-lite' ); ?></p>
		<p><a href="<?php echo esc_url( 'https://wordpress.org/support/theme/avis-lite' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'avis-lite' ); ?></a></p>
		
	</div>

	<div class="avis-lite-clear"></div>

</div>
