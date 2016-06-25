<?php
/**
 * Getting started template
 */

$customizer_url = admin_url() . 'customize.php' ;
$Awada_lite = wp_get_theme( 'awada' );
?>

<div id="getting_started" class="awada-lite-tab-pane active">

	<div class="awada-tab-pane-center">
		
		<h1 class="awada-lite-welcome-title"><?php _e('Welcome to Awada!', 'awada'); if( !empty($Awada_lite['Version']) ): ?> <sup id="awada-lite-theme-version"><?php echo esc_attr( $Awada_lite['Version'] ); ?> </sup><?php endif; ?></h1>
	</div>

	<hr />

	<div class="awada-tab-pane-center">

		<h1><?php esc_html_e( 'Getting started', 'awada' ); ?></h1>

		<h4><?php esc_html_e( 'Customize Whole theme in a single place.' ,'awada' ); ?></h4>
		<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'awada' ); ?></p>
		<p><a href="<?php echo esc_url( $customizer_url ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer', 'awada' ); ?></a></p>
	</div>

	<hr />
	<div class="awada-tab-pane-center">
		<h1><?php esc_html_e( 'FAQ', 'awada' ); ?></h1>
	</div>
	<div class="awada-tab-pane-half awada-tab-pane-first-half">
		<h4><?php esc_html_e( 'Create a child theme', 'awada' ); ?></h4>
		<p><?php esc_html_e( 'If you want to make changes to the theme\'s files, those changes are likely to be overwritten when you next update the theme. In order to prevent that from happening, you need to create a child theme. For this, please follow the documentation below.', 'awada' ); ?></p>
		<p><a href="http://demo.webhuntinfotech.com/blog/2016/01/11/how-to-create-a-child-theme/" class="button" target="_blank"><?php esc_html_e( 'View how to do this', 'awada' ); ?></a></p>

		<hr />

		<h4><?php esc_html_e( 'Gallery in Blog Posts', 'awada' ); ?></h4>
		<p><?php esc_html_e( 'If you want to use more than one images in your post or want to make gallery images in your post. This can be accomplished by following the documention below.', 'awada' ); ?></p>
		<p><a href="http://demo.webhuntinfotech.com/blog/2016/01/11/add-gallery-posts-in-matrix-or-awada-theme/" class="button" target="_blank"><?php esc_html_e( 'View how to do this', 'awada' ); ?></a></p>
	</div>

	<div class="awada-tab-pane-half">
	
		<h4><?php esc_html_e( 'Translate awada Lite', 'awada' ); ?></h4>
		<p><?php esc_html_e( 'In the below documentation you will find an easy way to translate awada Lite into your native language or any other language you need for you site.', 'awada' ); ?></p>
		<p><a href="http://demo.webhuntinfotech.com/blog/2016/01/11/how-to-translate-any-translation-ready-theme/" class="button" target="_blank"><?php esc_html_e( 'View how to do this', 'awada' ); ?></a></p>
		
	<hr />

	<h4><?php esc_html_e( 'How To Setup Home Page', 'awada' ); ?></h4>
		<p><?php esc_html_e( 'See below document. It will help you to setup Home Page' , 'awada' ); ?></p>
		<p><a href="http://demo.webhuntinfotech.com/blog/2016/02/02/how-to-setup-home-page-in-matrix-or-awada-lite/" class="button" target="_blank"><?php esc_html_e( 'View how to do this', 'awada' ); ?></a></p>

	</div>

	<div class="awada-lite-clear"></div>

</div>
