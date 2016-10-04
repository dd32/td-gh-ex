<?php
/**
 * Child themes template
 */
?>
<div id="child_themes" class="avis-lite-tab-pane">

	<?php
		$current_theme = wp_get_theme();
	?>

	<div class="avis-tab-pane-center">

		<h1><?php esc_html_e( 'Get a whole new look for your site', 'avis-lite' ); ?></h1>

		<p><?php esc_html_e( 'Below you will find a selection of Avis Lite child themes that will totally transform the look of your site.', 'avis-lite' ); ?></p>

	</div>


	<div class="avis-tab-pane-half avis-tab-pane-first-half">

		<!-- ZBlackBeard -->
		<div class="avis-lite-child-theme-container">
			<div class="avis-lite-child-theme-image-container">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/includes/admin/welcome-screen/img/zblackbeard.jpg'; ?>" alt="<?php esc_html_e( 'ZBlackBeard Child Theme', 'avis-lite' ); ?>" />
				<div class="avis-lite-child-theme-description">
					<h2><?php esc_html_e( 'ZBlackBeard', 'avis-lite' ); ?></h2>
				</div>
			</div>
			<div class="avis-lite-child-theme-details">
				<?php if ( 'ZBlackBeard' != $current_theme['Name'] ) { ?>
					<div class="theme-details">
						<span class="theme-name">Zblackbeard</span>
						<a href="http://themeisle.com/themes/zblackbeard/#pricing-single" class="button button-primary install right"><?php esc_html_e( 'Get now', 'avis-lite' ); ?></a>
						<a class="button button-secondary preview right" target="_blank" href="https://wp-themes.com/zblackbeard"><?php esc_html_e( 'Live Preview','avis-lite'); ?></a>
						<div class="avis-lite-clear"></div>
					</div>
				<?php } else { ?>
					<div class="theme-details active">
						<span class="theme-name"><?php echo esc_html_e( 'Zblackbeard - Current theme', 'avis-lite' ); ?></span>
						<a class="button button-secondary customize right" target="_blank" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>"><?php esc_html_e('Customize','avis-lite'); ?></a>
						<div class="avis-lite-clear"></div>
					</div>
				<?php } ?>
			</div>
		</div>
		<hr />

		<!-- OnePirate -->
		<div class="avis-lite-child-theme-container">
			<div class="avis-lite-child-theme-image-container">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/includes/admin/welcome-screen/img/onepirate.jpg'; ?>" alt="<?php esc_html_e( 'OnePirate Child Theme', 'avis-lite' ); ?>" />
				<div class="avis-lite-child-theme-description">
					<h2><?php esc_html_e( 'OnePirate', 'avis-lite' ); ?></h2>
				</div>
			</div>
			<div class="avis-lite-child-theme-details">
				<?php if ( 'OnePirate' != $current_theme['Name'] ) { ?>
					<div class="theme-details">
						<span class="theme-name">OnePirate</span>
						<a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-theme&theme=onepirate' ), 'install-theme_onepirate' ) ); ?>" class="button button-primary install right"><?php printf( __( 'Install %s now', 'avis-lite' ), '<span class="screen-reader-text">ZblackBeard</span>' ); ?></a>
						<a class="button button-secondary preview right" target="_blank" href="https://wp-themes.com/onepirate"><?php esc_html_e( 'Live Preview','avis-lite'); ?></a>
						<div class="avis-lite-clear"></div>
					</div>
				<?php } else { ?>
					<div class="theme-details active">
						<span class="theme-name"><?php echo esc_html_e( 'OnePirate - Current theme', 'avis-lite' ); ?></span>
						<a class="button button-secondary customize right" target="_blank" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>"><?php esc_html_e('Customize','avis-lite'); ?></a>
						<div class="avis-lite-clear"></div>
					</div>
				<?php } ?>
			</div>
		</div>
		
		<hr/>
		<!-- Zifer Child -->
		<div class="avis-lite-child-theme-container">
			<div class="avis-lite-child-theme-image-container">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/includes/admin/welcome-screen/img/zifer-child.jpg'; ?>" alt="<?php esc_html_e( 'Zifer Child Theme', 'avis-lite' ); ?>" />
				<div class="avis-lite-child-theme-description">
					<h2><?php esc_html_e( 'Zifer', 'avis-lite' ); ?></h2>
				</div>
			</div>
			<div class="avis-lite-child-theme-details">
				<?php if ( 'Zifer Child' != $current_theme['Name'] ) { ?>
					<div class="theme-details">
						<span class="theme-name">Zifer Child</span>
						<a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-theme&theme=zifer-child' ), 'install-theme_zifer-child' ) ); ?>" class="button button-primary install right"><?php printf( __( 'Install %s now', 'avis-lite' ), '<span class="screen-reader-text">Zerius</span>' ); ?></a>
						<a class="button button-secondary preview right" target="_blank" href="https://wp-themes.com/zifer-child"><?php esc_html_e( 'Live Preview','avis-lite'); ?></a>
						<div class="avis-lite-clear"></div>
					</div>
				<?php } else { ?>
					<div class="theme-details active">
						<span class="theme-name"><?php echo esc_html_e( 'Zifer Child - Current theme', 'avis-lite' ); ?></span>
						<a class="button button-secondary customize right" target="_blank" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>"><?php esc_html_e( 'Customize','avis-lite'); ?></a>
						<div class="avis-lite-clear"></div>
					</div>
				<?php } ?>
			</div>
		</div>

	</div>

	<div class="avis-tab-pane-half">
		<!-- ResponsiveBoat -->
		<div class="avis-lite-child-theme-container">
			<div class="avis-lite-child-theme-image-container">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/includes/admin/welcome-screen/img/responsiveboat.png'; ?>" alt="<?php esc_html_e( 'ResponsiveBoat', 'avis-lite' ); ?>" />
				<div class="avis-lite-child-theme-description">
					<h2><?php esc_html_e( 'ResponsiveBoat', 'avis-lite' ); ?></h2>
				</div>
			</div>
			<div class="avis-lite-child-theme-details">
				<?php if ( 'ResponsiveBoat' != $current_theme['Name'] ) { ?>
					<div class="theme-details">
						<span class="theme-name">ResponsiveBoat</span>
						<a href="http://themeisle.com/themes/responsiveboat-theme/#pricing-single" class="button button-primary install right"><?php printf( __( 'Get %s now', 'avis-lite' ), '<span class="screen-reader-text">ResponsiveBoat</span>' ); ?></a>
						<a class="button button-secondary preview right" target="_blank" href="https://wp-themes.com/responsiveboat"><?php esc_html_e( 'Live Preview','avis-lite'); ?></a>
						<div class="avis-lite-clear"></div>
					</div>
				<?php } else { ?>
				<div class="theme-details active">
					<span class="theme-name"><?php echo esc_html_e( 'ResponsiveBoat - Current theme', 'avis-lite' ); ?></span>
					<a class="button button-secondary customize right" target="_blank" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>"><?php esc_html_e('Customize','avis-lite'); ?></a>
					<div class="avis-lite-clear"></div>
				</div>
				<?php } ?>
			</div>
		</div>
		<hr />

		<!-- Zerius -->
		<div class="avis-lite-child-theme-container">
			<div class="avis-lite-child-theme-image-container">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/includes/admin/welcome-screen/img/zerius.jpg'; ?>" alt="<?php esc_html_e( 'Zerius Child Theme', 'avis-lite' ); ?>" />
				<div class="avis-lite-child-theme-description">
					<h2><?php esc_html_e( 'Zerius', 'avis-lite' ); ?></h2>
				</div>
			</div>
			<div class="avis-lite-child-theme-details">
				<?php if ( 'Zerius' != $current_theme['Name'] ) { ?>
					<div class="theme-details">
						<span class="theme-name">Zerius</span>
						<a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-theme&theme=zerius' ), 'install-theme_zerius' ) ); ?>" class="button button-primary install right"><?php printf( __( 'Install %s now', 'avis-lite' ), '<span class="screen-reader-text">Zerius</span>' ); ?></a>
						<a class="button button-secondary preview right" target="_blank" href="https://wp-themes.com/zerius"><?php esc_html_e( 'Live Preview','avis-lite'); ?></a>
						<div class="avis-lite-clear"></div>
					</div>
				<?php } else { ?>
				<div class="theme-details active">
					<span class="theme-name"><?php echo esc_html_e( 'Zerius - Current theme', 'avis-lite' ); ?></span>
					<a class="button button-secondary customize right" target="_blank" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>"><?php esc_html_e('Customize','avis-lite'); ?></a>
					<div class="avis-lite-clear"></div>
				</div>
				<?php } ?>
			</div>
		</div>

	</div>

</div>
