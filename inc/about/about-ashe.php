<?php // About Ashe

// Add About Ashe Page
function ashe_about_page() {
	add_theme_page( esc_html__( 'About Ashe', 'ashe' ), esc_html__( 'About Ashe', 'ashe' ), 'edit_theme_options', 'about-ashe', 'ashe_about_page_output' );
}
add_action( 'admin_menu', 'ashe_about_page' );

// Render About Ashe HTML
function ashe_about_page_output() {

	$theme_data	 = wp_get_theme();

?>
	<div class="wrap">
		<h1>
		<?php /* translators: %s theme name */
			printf( esc_html__( 'Welcome to %s', 'ashe' ), esc_html( $theme_data->Name ) );
		?>
		</h1>

		<p class="welcome-text">
			<?php /* translators: %s theme name */
				printf( esc_html__( '%s theme is one of the most Popular Free WordPress theme of 2017-2018 years. To understand better what the theme can offer, please click the button below.', 'ashe' ), esc_html( $theme_data->Name ) );
			?>
			<br><br><a href="<?php echo esc_url('http://wp-royal.com/themes/ashe-free/demo/?ref=ashe-free-backend-about-theme-prev-btn'); ?>" class="button button-primary button-hero" target="_blank"><?php esc_html_e( 'Theme Demo Preview', 'ashe' ); ?></a>
		</p><br>

		<!-- Tabs -->
		<?php $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'ashe_tab_1'; ?>  

		<div class="nav-tab-wrapper">
			<a href="?page=about-ashe&tab=ashe_tab_1" class="nav-tab <?php echo $active_tab == 'ashe_tab_1' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Getting Started', 'ashe' ); ?>
			</a>
			<a href="?page=about-ashe&tab=ashe_tab_2" class="nav-tab <?php echo $active_tab == 'ashe_tab_2' ? 'nav-tab-active' : ''; ?>">
				<span class="dashicons dashicons-video-alt3"></span> <?php esc_html_e( 'Video Tutorials', 'ashe' ); ?>
			</a>
			<a href="?page=about-ashe&tab=ashe_tab_3" class="nav-tab <?php echo $active_tab == 'ashe_tab_3' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Useful Plugins', 'ashe' ); ?>
			</a>
			<a href="?page=about-ashe&tab=ashe_tab_4" class="nav-tab <?php echo $active_tab == 'ashe_tab_4' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Support', 'ashe' ); ?>
			</a>
			<a href="?page=about-ashe&tab=ashe_tab_5" class="nav-tab <?php echo $active_tab == 'ashe_tab_5' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Free vs Pro', 'ashe' ); ?>
			</a>
		</div>

		<!-- Tab Content -->
		<?php if ( $active_tab == 'ashe_tab_1' ):  ?>

			<div class="three-columns-wrap">

				<br>

				<div class="column-width-3">
					<h3><?php esc_html_e( 'Documentation', 'ashe' ); ?></h3>
					<p>
					<?php /* translators: %s theme name */
						printf( esc_html__( 'Need more details? Please check our full documentation for detailed information on how to use %s.', 'ashe' ), esc_html( $theme_data->Name ) );
					?>
					</p>
					<a target="_blank" href="<?php echo esc_url('https://wp-royal.com/themes/ashe/docs/?ref=ashe-free-backend-about-docs/'); ?>" class="button button-primary"><?php esc_html_e( 'Read Full Documentation', 'ashe' ); ?></a>
				</div>

				<div class="column-width-3">
					<h3><?php esc_html_e( 'Demo Content', 'ashe' ); ?></h3>
					<p>
						<?php esc_html_e( 'Install the Demo Content in 2 clicks. Just click the button below to install demo import plugin and wait a bit to be redirected to the demo import page.', 'ashe' ); ?>
					</p>

					<?php if ( is_plugin_active( 'one-click-demo-import/one-click-demo-import.php' ) ) : ?>
						<a href="<?php echo admin_url( '/themes.php?page=pt-one-click-demo-import' ); ?>" class="button button-primary demo-import"><?php esc_html_e( 'Go to Import page', 'ashe' ); ?></a>
					<?php elseif ( ashe_check_installed_plugin( 'one-click-demo-import', 'one-click-demo-import' ) ) : ?>
						<button class="button button-primary demo-import" id="ashe-demo-content-act"><?php esc_html_e( 'Activate Demo Import Plugin', 'ashe' ); ?></button>
					<?php else: ?>
						<button class="button button-primary demo-import" id="ashe-demo-content-inst"><?php esc_html_e( 'Install Demo Import Plugin', 'ashe' ); ?></button>
					<?php endif; ?>
					<a href="<?php echo esc_url('https://www.youtube.com/watch?v=ZCrRuCuM6oA') ?>" target="_blank" class="button button-primary import-video"><span class="dashicons dashicons-video-alt3"></span><?php esc_html_e( 'Video Tutorial', 'ashe' ); ?></a>
				</div>

				<div class="column-width-3">
					<h3><?php esc_html_e( 'Theme Customizer', 'ashe' ); ?></h3>
					<p>
					<?php /* translators: %s theme name */
						printf( esc_html__( '%s supports the Theme Customizer for all theme settings. Click "Customize" to personalize your site.', 'ashe' ), esc_html( $theme_data->Name ) );
					?>
					</p>
					<a target="_blank" href="<?php echo esc_url( wp_customize_url() );?>" class="button button-primary"><?php esc_html_e( 'Start Customizing', 'ashe' ); ?></a>
				</div>

			</div>

			<div class="four-columns-wrap">
			
				<h2 id="ashe-predefined-styles"><?php esc_html_e( 'Ashe Pro - Predefined Styles', 'ashe' ); ?></h2>
				<p>
				<?php /* translators: %s link */
					printf( __( 'Ashe Pro\'s powerful setup allows you to easily create unique looking sites. Here are a few included examples that can be installed with one click in the Pro Version. More details in the <a href="%s" target="_blank" >Theme Documentation</a>', 'ashe' ), esc_url('http://wp-royal.com/themes/ashe/docs/?ref=ashe-free-backend-about-predefined-styles#predefined') );
				?>
				</p>

				<div class="column-width-4">
					<div class="active-style"><?php esc_html_e( 'Active', 'ashe' ); ?></div>
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img1.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Main', 'ashe' ); ?></h2>
						<a href="<?php echo esc_url('http://wp-royal.com/themes/ashe-pro/demo/?ref=ashe-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Live Preview', 'ashe' ); ?></a>
					</div>
				</div>
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/food.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Food', 'ashe' ); ?></h2>
						<a href="<?php echo esc_url('http://wp-royal.com/themes/ashe-pro/food/?ref=ashe-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Live Preview', 'ashe' ); ?></a>
					</div>
				</div>
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/lifestyle.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Lifestyle', 'ashe' ); ?></h2>
						<a href="<?php echo esc_url('http://wp-royal.com/themes/ashe-pro/lifestyle/?ref=ashe-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Live Preview', 'ashe' ); ?></a>
					</div>
				</div>
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img2.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Dark', 'ashe' ); ?></h2>
						<a href="<?php echo esc_url('http://wp-royal.com/themes/ashe-pro/color-black/?ref=ashe-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Live Preview', 'ashe' ); ?></a>
					</div>
				</div>
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img7.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 1', 'ashe' ); ?></h2>
						<a href="<?php echo esc_url('http://wp-royal.com/themes/ashe-pro/typography-v2/?ref=ashe-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Live Preview', 'ashe' ); ?></a>
					</div>
				</div>
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img12.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 2', 'ashe' ); ?></h2>
						<a href="<?php echo esc_url('http://wp-royal.com/themes/ashe-pro/sample-v3/?ref=ashe-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Live Preview', 'ashe' ); ?></a>
					</div>
				</div>
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img5.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 3', 'ashe' ); ?></h2>
						<a href="<?php echo esc_url('http://wp-royal.com/themes/ashe-pro/columns2-sidebar/?ref=ashe-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Live Preview', 'ashe' ); ?></a>
					</div>
				</div>
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img3.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 4', 'ashe' ); ?></h2>
						<a href="<?php echo esc_url('http://wp-royal.com/themes/ashe-pro/sample-v5/?ref=ashe-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Live Preview', 'ashe' ); ?></a>
					</div>
				</div>
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img4.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 5', 'ashe' ); ?></h2>
						<a href="<?php echo esc_url('http://wp-royal.com/themes/ashe-pro/color-colorful/?ref=ashe-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Live Preview', 'ashe' ); ?></a>
					</div>
				</div>
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img6.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 6', 'ashe' ); ?></h2>
						<a href="<?php echo esc_url('http://wp-royal.com/themes/ashe-pro/columns4/?ref=ashe-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Live Preview', 'ashe' ); ?></a>
					</div>
				</div>
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img8.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 7', 'ashe' ); ?></h2>
						<a href="<?php echo esc_url('http://wp-royal.com/themes/ashe-pro/columns3-sidebar/?ref=ashe-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Live Preview', 'ashe' ); ?></a>
					</div>
				</div>
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img9.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 8', 'ashe' ); ?></h2>
						<a href="<?php echo esc_url('http://wp-royal.com/themes/ashe-pro/color-black-white/?ref=ashe-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Live Preview', 'ashe' ); ?></a>
					</div>
				</div>
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img10.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 9', 'ashe' ); ?></h2>
						<a href="<?php echo esc_url('http://wp-royal.com/themes/ashe-pro/columns3-nsidebar/?ref=ashe-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Live Preview', 'ashe' ); ?></a>
					</div>
				</div>
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img11.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 10', 'ashe' ); ?></h2>
						<a href="<?php echo esc_url('http://wp-royal.com/themes/ashe-pro/columns2-nsidebar/?ref=ashe-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Live Preview', 'ashe' ); ?></a>
					</div>
				</div>

			</div>

		<?php elseif ( $active_tab == 'ashe_tab_2' ) : ?>

			<div class="four-columns-wrap video-tutorials">

				<div class="column-width-4">
					<h3><?php esc_html_e( 'Demo Content', 'ashe' ); ?></h3>
					<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=ZCrRuCuM6oA"><?php esc_html_e( 'Watch Video', 'ashe' ); ?></a>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url('themes.php?page=about-ashe&tab=ashe_tab_1')); ?>"></span><?php esc_html_e( 'Get Started', 'ashe' ); ?></a>
				</div>
				<div class="column-width-4">
					<h3><?php esc_html_e( 'Setup Menu', 'ashe' ); ?></h3>
					<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=wuggfN2nzDM"><?php esc_html_e( 'Watch Video', 'ashe' ); ?></a>
					<a class="button button-secondary" target="_blank" href="<?php echo esc_url(admin_url('nav-menus.php')); ?>"></span><?php esc_html_e( 'Customize', 'ashe' ); ?></a>
				</div>
				<div class="column-width-4">
					<h3><?php esc_html_e( 'Setup Logo Image', 'ashe' ); ?></h3>
					<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=W_IoRYj1pKY"><?php esc_html_e( 'Watch Video', 'ashe' ); ?></a>
					<a class="button button-secondary" target="_blank" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=title_tagline')); ?>"></span><?php esc_html_e( 'Customize', 'ashe' ); ?></a>
				</div>
				<div class="column-width-4">
					<h3><?php esc_html_e( 'Setup Social Media', 'ashe' ); ?></h3>
					<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=yiQLoofNYYs"><?php esc_html_e( 'Watch Video', 'ashe' ); ?></a>
					<a class="button button-secondary" target="_blank" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=ashe_social_media')); ?>"></span><?php esc_html_e( 'Customize', 'ashe' ); ?></a>
				</div>
				<div class="column-width-4">
					<h3><?php esc_html_e( 'Setup Copyright', 'ashe' ); ?></h3>
					<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=NoOQmxSm5rk"><?php esc_html_e( 'Watch Video', 'ashe' ); ?></a>
					<a class="button button-secondary" target="_blank" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=ashe_page_footer')); ?>"></span><?php esc_html_e( 'Customize', 'ashe' ); ?></a>
				</div>
				<div class="column-width-4">
					<h3><?php esc_html_e( 'Setup Colors', 'ashe' ); ?></h3>
					<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=cW6qT8OocpE"><?php esc_html_e( 'Watch Video', 'ashe' ); ?></a>
					<a class="button button-secondary" target="_blank" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=ashe_colors')); ?>"></span><?php esc_html_e( 'Customize', 'ashe' ); ?></a>
				</div>
				<div class="column-width-4">
					<h3><?php esc_html_e( 'Setup Header Image', 'ashe' ); ?></h3>
					<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=xH4Z-d_KlQk"><?php esc_html_e( 'Watch Video', 'ashe' ); ?></a>
					<a class="button button-secondary" target="_blank" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=header_image')); ?>"></span><?php esc_html_e( 'Customize', 'ashe' ); ?></a>
				</div>
				<div class="column-width-4">
					<h3><?php esc_html_e( 'Setup Featured Slider', 'ashe' ); ?></h3>
					<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=H9i-cKOey98"><?php esc_html_e( 'Watch Video', 'ashe' ); ?></a>
					<a class="button button-secondary" target="_blank" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=ashe_featured_slider')); ?>"></span><?php esc_html_e( 'Customize', 'ashe' ); ?></a>
				</div>
				<div class="column-width-4">
					<h3><?php esc_html_e( 'Setup Featured Links', 'ashe' ); ?></h3>
					<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=pCtjGwieCoo"><?php esc_html_e( 'Watch Video', 'ashe' ); ?></a>
					<a class="button button-secondary" target="_blank" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=ashe_featured_links')); ?>"></span><?php esc_html_e( 'Customize', 'ashe' ); ?></a>
				</div>
				<div class="column-width-4">
					<h3><?php esc_html_e( 'Setup Instagram Widget', 'ashe' ); ?></h3>
					<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=DcjLQgrv9wc"><?php esc_html_e( 'Watch Video', 'ashe' ); ?></a>
				</div>
				<div class="column-width-4">
					<h3><?php esc_html_e( 'Create Blog Post', 'ashe' ); ?></h3>
					<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=gvW0FhT-cSQ"><?php esc_html_e( 'Watch Video', 'ashe' ); ?></a>
				</div>
				<div class="column-width-4">
					<h3><?php esc_html_e( 'Translate The Theme', 'ashe' ); ?></h3>
					<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=7LtyVjw46r8"><?php esc_html_e( 'Watch Video', 'ashe' ); ?></a>
				</div>

			</div>

		<?php elseif ( $active_tab == 'ashe_tab_3' ) : ?>
			
			<div class="three-columns-wrap">
				
				<br><br>

				<?php

				// WooCommerce
				ashe_recommended_plugin( 'woocommerce', 'woocommerce' );

				// MailPoet 2
				ashe_recommended_plugin( 'wysija-newsletters', 'index' );

				// Contact Form 7
				ashe_recommended_plugin( 'contact-form-7', 'wp-contact-form-7' );

				// Recent Posts Widget
				ashe_recommended_plugin( 'recent-posts-widget-with-thumbnails', 'recent-posts-widget-with-thumbnails' );

				// Instagram Widget
				ashe_recommended_plugin( 'wp-instagram-widget', 'wp-instagram-widget' );

				// Ajax Thumbnail Rebuild
				ashe_recommended_plugin( 'ajax-thumbnail-rebuild', 'ajax-thumbnail-rebuild' );

				// Facebook Widget
				ashe_recommended_plugin( 'facebook-pagelike-widget', 'facebook_widget' );

				?>


			</div>

		<?php elseif ( $active_tab == 'ashe_tab_4' ) : ?>

			<div class="three-columns-wrap">

				<br>

				<div class="column-width-3">
					<h3>
						<span class="dashicons dashicons-sos"></span>
						<?php esc_html_e( 'Forums', 'ashe' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Before asking a questions it\'s highly recommended to search on forums, but if you can\'t find the solution feel free to create a new topic.', 'ashe' ); ?>
						<hr>
						<a target="_blank" href="<?php echo esc_url('https://wp-royal.com/support-ashe-free/?ref=ashe-free-backend-about-support-forum/'); ?>"><?php esc_html_e( 'Go to Support Forums', 'ashe' ); ?></a>
					</p>
				</div>

				<div class="column-width-3">
					<h3>
						<span class="dashicons dashicons-admin-tools"></span>
						<?php esc_html_e( 'Changelog', 'ashe' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Want to get the gist on the latest theme changes? Just consult our changelog below to get a taste of the recent fixes and features implemented.', 'ashe' ); ?>
						<hr>
						<a target="_blank" href="<?php echo esc_url('https://wp-royal.com/ashe-free-changelog/?ref=ashe-free-backend-about-changelog/'); ?>"><?php esc_html_e( 'Changelog', 'ashe' ); ?></a>
					</p>
				</div>

			</div>

		<?php elseif ( $active_tab == 'ashe_tab_5' ) : ?>

			<br><br>

			<table class="free-vs-pro form-table">
				<thead>
					<tr>
						<th>
							<a href="<?php echo esc_url('https://wp-royal.com/themes/item-ashe-pro/?ref=ashe-free-backend-about-section-getpro-btn'); ?>" target="_blank" class="button button-primary button-hero">
								<?php esc_html_e( 'Get Ashe Pro', 'ashe' ); ?>
							</a>
						</th>
						<th><?php esc_html_e( 'Ashe', 'ashe' ); ?></th>
						<th><?php esc_html_e( 'Ashe Pro', 'ashe' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<h3><?php esc_html_e( '100% Responsive and Retina Ready', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'Theme adapts to any kind of device screen, from mobile phones to high resolution Retina displays.', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Translation Ready', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'Each hard-coded string is ready for translation, means you can translate everything. Language "ashe.pot" file included.', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'RTL Support', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'RTL stylesheet for languages that are read from right to left like Arabic, Hebrew, etc... Your content will adapt to RTL direction.', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'WooCommerce Integration', 'ashe' ); ?></h3>
							<p>
								<?php esc_html_e( 'The best eCommerce solution for WordPress websites. Add your own Shop and sell anything from digital Goods to Coconuts.', 'ashe' ); ?>
								<br>
								<strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'ashe' ); ?></strong> <?php esc_html_e( 'Left &amp; Right WooCommerce widgetised areas. Perfectly styled to fit the theme design.', 'ashe' ); ?>
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Contact Form 7 Support', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'The most popular contact form plugin. You can build almost any kind of contact form. Very simple but super flexible.', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Image &amp; Text Logos', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'Upload your logo image(set the size) or simply type your text logo.', 'ashe' ); ?><br><strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'ashe' ); ?></strong> <?php esc_html_e( 'Adjust Logo position to fit your custom header design.', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Featured Posts Slider', 'ashe' ); ?></h3>
							<p>
								<?php esc_html_e( 'Showcase up to 5 most recent Blog Posts in header area.', 'ashe' ); ?>
								<br>
								<strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'ashe' ); ?></strong> <?php esc_html_e( 'Unlimited number of Slides. Feature specific(custom) posts and order them by date, comments or even random. Change Slider columns from 1 up to 4, set Autoplay and enable/disable any element.', 'ashe' ); ?>  
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Featured Links (Promo Boxes)', 'ashe' ); ?></h3>
							<p>
								<?php esc_html_e( 'Display up to 3 eye-catching linked images under header area, which could be a Custom Page Links or Banners(ads).', 'ashe' ); ?> 
								<br>
								<strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'ashe' ); ?></strong> <?php esc_html_e( 'You can have 5 Featured Links.', 'ashe' ); ?>
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'List Layout', 'ashe' ); ?></h3>
							<p>
								<?php esc_html_e( 'Nice list style layout, perfect for the Food based websites.', 'ashe' ); ?> 
								<br>
								<strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'ashe' ); ?></strong> <?php esc_html_e( 'Adjust Featured Image crop width and height sizes.', 'ashe' ); ?>
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Background Image/Color', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'Set the custom body Background image or Color.', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Header Background Image/Color', 'ashe' ); ?></h3>
							<p>
								<?php esc_html_e( 'Set the custom header Background image or Color.', 'ashe' ); ?>
								<br>
								<strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'ashe' ); ?></strong> <?php esc_html_e( 'Adjust Header size &amp; enable ', 'ashe' ); ?><strong><?php esc_html_e( 'Parallax Scrolling', 'ashe' ); ?></strong> <?php esc_html_e( 'to fit your custom website design.', 'ashe' ); ?>
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Classic Layout', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'Standard one column Blog Feed layout.', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Multi-level Sub Menu Support', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'Unlimited level of sub menus. Add as much as you need.', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Left &amp; Right Sidebars', 'ashe' ); ?></h3>
							<p>
								<?php esc_html_e( 'Left and Right Widgetised areas. Could be globally Enabled/Disabled.', 'ashe' ); ?>
								<br>
								<strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'ashe' ); ?></strong> <?php esc_html_e( 'Full controll - Enable/Disable on specific Posts &amp; Pages.', 'ashe' ); ?>
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Alternative Sidebar', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'Stylish and modern Alternative Widgetised area, which is hidden by default and pops up on click.', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					
					<!-- Only Pro -->
					<tr>
						<td>
							<h3><?php esc_html_e( 'One Click Demo Import', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'Just a Single Click and you will get the same content as shown on our Demo website. Menus, Posts, Pages, Widgets, etc... will be imported.', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Unlimited Colors', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'Tons of color options. You can customize your Header, Content and Footer separately as much as possible.', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( '800+ Google Fonts', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'Rich Typography options. Choose from more than 800 Google Fonts, adjust Size, Line Height, Font Weight, etc...', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Advanced Header Background', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'Upload custom header background Video or display images as a Slider.', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Advanced WooCommerce Support', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'Set 2, 3 or 4 Columns on WooCommerce Product Grid. Enable/Disable Left & Right WooCommerce widgetized areas.', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Grid Layout', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'Choose from 1 up to 4 columns grid layout for your Blog Feed.', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Post Formats Support', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'Create Audio, Video, Gallery, Link &amp; Quote Blog Posts with unique, modern and minimal styling. Full control over your Blog Posts.', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Post Sharing Icons', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'Ability to share your Blog Posts on the most popular social media: Facebook, Twitter, Pinterest, Google Plus, Linkedin, Reddit, Tumblr.', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Advanced Post Options', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'Custom Post Header image upload, Full-width Post option, ability to display current post in the Featured Slider.', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Advanced Page Options', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'Custom Page Header image, Full-width page option, enable/disable Featured Slider & Featured Links on current page, Show/hide page Title & Featured Image.', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Different Blog Feed Pagination', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'Choose from 4 Diffenet pagination styles: Default, Numeric, Load More Button and Infinite Page Scrolling.', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Sticky Navigation', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'Fix the main navigation to the page, it will be always visible at the top.', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Instagram Widget Area', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'Showcase your Instagram photos in your website Footer or Header.', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Integration with MailChimp', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'This plugin helps you add more subscribers to your MailChimp lists using various methods.', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Integration with JetPack', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'Jetpack is the ultimate toolkit for WordPress. It gives you everything you need to design, secure, and grow your site in one bundle.', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Ashe Pro Widgets', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'Ashe Author, Ads &amp; Social Icons widgets included.', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Advanced Footer Options', 'ashe' ); ?></h3>
							<p><?php esc_html_e( 'Theme and Author credit links in the footer are automatically removed. You can add social icons to the footer.', 'ashe' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>


					<tr>
						<td></td>
						<td colspan="2">
							<a href="<?php echo esc_url('https://wp-royal.com/themes/item-ashe-pro/?ref=ashe-free-backend-about-section-getpro-btn'); ?>" target="_blank" class="button button-primary button-hero">
								<?php esc_html_e( 'Get Ashe Pro', 'ashe' ); ?>
							</a>
							<br><br>
						</td>
					</tr>
				</tbody>
			</table>

	    <?php endif; ?>

	</div><!-- /.wrap -->
<?php
} // end ashe_about_page_output


// Check if plugin is installed
function ashe_check_installed_plugin( $slug, $filename ) {
	return file_exists( ABSPATH . 'wp-content/plugins/' . $slug . '/' . $filename . '.php' ) ? true : false;
}

// Generate Recommended Plugin HTML
function ashe_recommended_plugin( $slug, $filename ) {

	if ( $slug === 'facebook-pagelike-widget' ) {
		$size = '128x128';
	} else {
		$size = '256x256';
	}


	$plugin_info = ashe_call_plugin_api( $slug );
	$plugin_desc = $plugin_info->short_description;
	$plugin_img  = ( ! isset($plugin_info->icons['1x']) ) ? $plugin_info->icons['default'] : $plugin_info->icons['1x'];
?>

	<div class="plugin-card">
		<div class="name column-name">
			<h3>
				<?php echo esc_html( $plugin_info->name ); ?>
				<img src="<?php echo $plugin_img; ?>" class="plugin-icon" alt="">
			</h3>
		</div>
		<div class="action-links">
			<?php if ( ashe_check_installed_plugin( $slug, $filename ) ) : ?>
			<button type="button" class="button button-disabled" disabled="disabled"><?php esc_html_e( 'Installed', 'ashe' ); ?></button>
			<?php else : ?>
			<a class="install-now button-primary" href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin='. $slug ), 'install-plugin_'. $slug ) ); ?>" >
				<?php esc_html_e( 'Install Now', 'ashe' ); ?>
			</a>							
			<?php endif; ?>
		</div>
		<div class="desc column-description">
			<p><?php echo $plugin_desc . esc_html__( '...', 'ashe' ); ?></p>
		</div>
	</div>

<?php
}

// Get Plugin Info
function ashe_call_plugin_api( $slug ) {

	$call_api = get_transient( 'ashe_about_plugin_info_' . $slug );

	if ( false === $call_api ) {

	    if ( ! function_exists( 'plugins_api' ) && file_exists( trailingslashit( ABSPATH ) . 'wp-admin/includes/plugin-install.php' ) ) {
	        require_once( trailingslashit( ABSPATH ) . 'wp-admin/includes/plugin-install.php' );
	    }

	    if ( function_exists( 'plugins_api' ) ) {

			$call_api = plugins_api(
				'plugin_information', array(
					'slug'   => $slug,
					'fields' => array(
						'downloaded'        => false,
						'rating'            => false,
						'description'       => false,
						'short_description' => true,
						'donate_link'       => false,
						'tags'              => false,
						'sections'          => true,
						'homepage'          => true,
						'added'             => false,
						'last_updated'      => false,
						'compatibility'     => false,
						'tested'            => false,
						'requires'          => false,
						'downloadlink'      => false,
						'icons'             => true,
					),
				)
			);

			if ( ! is_wp_error( $call_api ) ) {
				set_transient( 'ashe_about_plugin_info_' . $slug, $call_api, 30 * MINUTE_IN_SECONDS );
			}

		}
	}

	return $call_api;
}


// Install/Activate Demo Import Plugin 
function ashe_plugin_auto_activation() {

	// Get the list of currently active plugins (Most likely an empty array)
	$active_plugins = (array) get_option( 'active_plugins', array() );

	array_push( $active_plugins, 'one-click-demo-import/one-click-demo-import.php' );

	// Set the new plugin list in WordPress
	update_option( 'active_plugins', $active_plugins );

}
add_action( 'wp_ajax_ashe_plugin_auto_activation', 'ashe_plugin_auto_activation' );

// Import Plugin Data
function ashe_import_demo_files() {
	return array(
		array(
			'import_file_name'             => esc_html__( 'Import Demo Data', 'ashe' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/about/import/ashe-demo.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/about/import/ashe-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/about/import/ashe-customizer.dat'
		)
	);
}
add_filter( 'pt-ocdi/import_files', 'ashe_import_demo_files' );

function ashe_import_demo_files_filter( $default_text ) {

	// Activate CF7 Plugin After Import
	if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
		$cf7_plugin_link = '';
	} elseif ( ashe_check_installed_plugin( 'contact-form-7', 'wp-contact-form-7' ) ) {
		$cf7_plugin_link = '<li><a href="'. esc_url( wp_nonce_url( self_admin_url( 'plugins.php?action=activate&plugin=contact-form-7/wp-contact-form-7.php' ), 'activate-plugin_contact-form-7/wp-contact-form-7.php' ) ) .'" target="_blank">'. esc_html__( 'Activate - Contact Form 7', 'ashe' ) .'</a></li>';
	} else {
		$cf7_plugin_link = '<li><a href="'. esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=contact-form-7' ), 'install-plugin_contact-form-7' ) ) .'" target="_blank">'. esc_html__( 'Install/Activate - Contact Form 7', 'ashe' ) .'</a></li>';
	}

	// Activate RPWWT Plugin After Import
	if ( is_plugin_active( 'recent-posts-widget-with-thumbnails/recent-posts-widget-with-thumbnails.php' ) ) {
		$rpwwt_plugin_link = '';
	} elseif ( ashe_check_installed_plugin( 'recent-posts-widget-with-thumbnails', 'recent-posts-widget-with-thumbnails' ) ) {
		$rpwwt_plugin_link = '<li><a href="'. esc_url( wp_nonce_url( self_admin_url( 'plugins.php?action=activate&plugin=recent-posts-widget-with-thumbnails/recent-posts-widget-with-thumbnails.php' ), 'activate-plugin_recent-posts-widget-with-thumbnails/recent-posts-widget-with-thumbnails.php' ) ) .'" target="_blank">'. esc_html__( 'Activate - Recent Posts Widget with Thumbnails', 'ashe' ) .'</a></li>';
	} else {
		$rpwwt_plugin_link = '<li><a href="'. esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=recent-posts-widget-with-thumbnails' ), 'install-plugin_recent-posts-widget-with-thumbnails' ) ) .'" target="_blank">'. esc_html__( 'Install/Activate - Recent Posts Widget with Thumbnails', 'ashe' ) .'</a></li>';
	}

	// Activate WPIW Plugin After Import
	if ( is_plugin_active( 'wp-instagram-widget/wp-instagram-widget.php' ) ) {
		$wpiw_plugin_link = '';
	} elseif ( ashe_check_installed_plugin( 'wp-instagram-widget', 'wp-instagram-widget' ) ) {
		$wpiw_plugin_link = '<li><a href="'. esc_url( wp_nonce_url( self_admin_url( 'plugins.php?action=activate&plugin=wp-instagram-widget/wp-instagram-widget.php' ), 'activate-plugin_wp-instagram-widget/wp-instagram-widget.php' ) ) .'" target="_blank">'. esc_html__( 'Activate - WP Instagram Widget', 'ashe' ) .'</a></li>';
	} else {
		$wpiw_plugin_link = '<li><a href="'. esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=wp-instagram-widget' ), 'install-plugin_wp-instagram-widget' ) ) .'" target="_blank">'. esc_html__( 'Install/Activate - WP Instagram Widget', 'ashe' ) .'</a></li>';
	}

	$activate_plugins_notice = '';
	if ( $rpwwt_plugin_link !== '' || $wpiw_plugin_link !== '' ) {
		/* translators: %s link */
		$activate_plugins_notice = sprintf( __( 'Recommended (optional): Before you Import Demo Data to get the same demo as shown on our <a href="%s" target="_blank" >Theme Preview Page</a> you need to: ', 'ashe' ), esc_url('http://wp-royal.com/themes/ashe-free/demo/?ref=ashe-free-backend-about-section-one-click-demo-import') );
	}

	$default_text = substr($default_text, 159);

	$default_text .= '<div class="ocdi__intro-text">';

		if ( $wpiw_plugin_link !== '' || $cf7_plugin_link !== '' || $rpwwt_plugin_link !== '' ) {

			$default_text .= '<h4>'. $activate_plugins_notice .'</h4>';

			$default_text .= '<ul>';
				$default_text .= $wpiw_plugin_link;
				$default_text .= $cf7_plugin_link;
				$default_text .= $rpwwt_plugin_link;
			$default_text .= '</ul>';

		}

	$default_text .= '</div><hr>';

	return $default_text; 
}
add_filter( 'pt-ocdi/plugin_intro_text', 'ashe_import_demo_files_filter' );

// Install Menus after Import
function ashe_after_import_setup() {
	$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
	$top_menu = get_term_by( 'name', 'Top Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'main' => $main_menu->term_id,
			'top'  => $top_menu->term_id,
		)
	);
}
add_action( 'pt-ocdi/after_import', 'ashe_after_import_setup' );

// Disable PT after Import Notice
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );


// enqueue ui CSS/JS
function ashe_enqueue_about_page_scripts($hook) {

	if ( 'appearance_page_about-ashe' != $hook ) {
		return;
	}

	// enqueue CSS
	wp_enqueue_style( 'ashe-about-page-css', get_theme_file_uri( '/inc/about/css/about-ashe-page.css' ), array(), '1.6.2' );

	// Demo Import
	wp_enqueue_script( 'plugin-install' );
	wp_enqueue_script( 'updates' );
	wp_enqueue_script( 'ashe-about-page-css', get_theme_file_uri( '/inc/about/js/about-ashe-page.js' ), array(), '1.6.2' );

}
add_action( 'admin_enqueue_scripts', 'ashe_enqueue_about_page_scripts' );