<?php
/**
 * Child themes template
 */
?>
<div id="pro_plugins" class="awada-lite-tab-pane">

	<?php $current_theme = wp_get_theme(); ?>

	<div class="awada-tab-pane-center">
		<h1><?php esc_html_e( 'Our Popular Plugins', 'awada' ); ?></h1>
	</div>

	<div class="awada-tab-pane-half awada-tab-pane-first-half">
		<!-- PVGMP -->
		<div class="awada-lite-child-theme-container">
			<div class="awada-lite-child-theme-image-container">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/welcome-screen/img/PVGMP.jpg'; ?>" alt="<?php esc_html_e( 'Photo Video Gallery Master PRO', 'awada' ); ?>" />
				<div class="awada-lite-child-theme-description">
					<h2><?php esc_html_e( 'Photo Video Gallery Master PRO', 'awada' ); ?></h2>
					<p><?php esc_html_e( 'Photo Video Gallery Master PRO (PVGMP) is a plugin to show your works, photos, Portfolios, videos, Galleries beautifully.', 'awada' ); ?></p>
				</div>
			</div>
			<div class="awada-lite-child-theme-details">
					<div class="theme-details">
						<span class="theme-name"><?php esc_html_e('PVGMP RPO', 'awada' ); ?></span>
						<a href="http://webhuntinfotech.com/webhunt_plugin/photo-video-gallery-master-pro/" class="button button-primary install right"><?php printf( __( 'Get %s now', 'awada' ), '<span class="screen-reader-text">awada Basic</span>' ); ?></a>
						<a class="button button-secondary preview right" target="_blank" href="http://demo.webhuntinfotech.com/demo/#pvgmp"><?php esc_html_e( 'Live Preview','awada'); ?></a>
						<div class="awada-lite-clear"></div>
					</div>
			</div>
		</div>
		<hr />
	</div>

	<div class="awada-tab-pane-half">
		<!-- Ultimate Gallery Master PRO -->
		<div class="awada-lite-child-theme-container">
			<div class="awada-lite-child-theme-image-container">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/welcome-screen/img/UGMP.jpg'; ?>" alt="<?php esc_html_e( 'Ultimate Gallery Master PRO', 'awada' ); ?>" />
				<div class="awada-lite-child-theme-description">
					<h2><?php esc_html_e( 'Ultimate Gallery Master PRO', 'awada' ); ?></h2>
					<p><?php esc_html_e( 'Ultimate Gallery Master Pro is indeed the ultimate responsive multimedia Gallery builder packed with an insane set of features that allows to create unlimited, filterable / sortable multimedia portfolios, product showcase, image galleries with unlimited possibilities. It includes four grid types with vertical or horizontal layout variation (dynamic, classic,masonry and infinite) that allow to display various multimedia content (like image, self hosted video, youtube, vimeo, audio, flash, iframe, google maps) in a highly customizable way. It runs on all major browsers with support for older browsers like IE8 and mobile devices like iPhone, iPad, IOS, Android or Windows mobile.', 'awada' ); ?></p>
				</div>
			</div>
			<div class="awada-lite-child-theme-details">
				<div class="theme-details">
					<span class="theme-name"><?php esc_html_e('UGMP','awada'); ?></span>
					<a href="http://webhuntinfotech.com/amember/signup/ugmp" target="_blank" class="button button-primary install right"><?php printf( __( 'Get %s now', 'awada' ), '<span class="screen-reader-text">Ultimate Gallery Master Pro</span>' ); ?></a>
					<a class="button button-secondary preview right" target="_blank" href="http://demo.webhuntinfotech.com/ultimate-gallery-master-pro/"><?php esc_html_e( 'Live Preview','awada'); ?></a>
					<div class="awada-lite-clear"></div>
				</div>
			</div>
		</div>
		<hr />
	</div>	
	
</div>