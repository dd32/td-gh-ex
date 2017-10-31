<?php // About Ashe

// Add About Ashe Page
function ashe_about_page() {
	add_theme_page( esc_html__( 'About Ashe', 'ashe' ), esc_html__( 'About Ashe', 'ashe' ), 'edit_theme_options', 'about-ashe', 'ashe_about_page_output' );
}
add_action( 'admin_menu', 'ashe_about_page' );

// Render About Ashe HTML
function ashe_about_page_output() {
?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Welcome to Ashe!', 'ashe' ); ?></h1>
		<p class="welcome-text">
			<?php esc_html_e( 'Ashe is free personal and multi-author Wordpress Blog theme. It\'s perfect for any kind of blog: personal, multi-author, food, lifestyle, etc... Is fully Responsive and Retina Display ready, clean, modern and minimal. Ashe is WooCommerce compatible, also has RTL support and for sure it\'s SEO friendly. Coded with latest Wordpress\' standards.', 'ashe' ); ?>
		</p>

		<!-- Tabs -->
		<?php $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'ashe_tab_1'; ?>  

		<div class="nav-tab-wrapper">
			<a href="?page=about-ashe&tab=ashe_tab_1" class="nav-tab <?php echo $active_tab == 'ashe_tab_1' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Getting Started', 'ashe' ); ?>
			</a>
			<a href="?page=about-ashe&tab=ashe_tab_2" class="nav-tab <?php echo $active_tab == 'ashe_tab_2' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Recommended Plugins', 'ashe' ); ?>
			</a>
			<a href="?page=about-ashe&tab=ashe_tab_3" class="nav-tab <?php echo $active_tab == 'ashe_tab_3' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Support', 'ashe' ); ?>
			</a>
			<a href="?page=about-ashe&tab=ashe_tab_4" class="nav-tab <?php echo $active_tab == 'ashe_tab_4' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Free vs Pro', 'ashe' ); ?>
			</a>
		</div>

		<!-- Tab Content -->
		<?php if ( $active_tab == 'ashe_tab_1' ) : ?>

			<div class="three-columns-wrap">

				<br>

				<div class="column-wdith-3">
					<h3><?php esc_html_e( 'Theme Documentation', 'ashe' ); ?></h3>
					<p>
						<?php esc_html_e( 'Highly recommended to begin with this, read the full theme documentation to understand the basics and even more details about how to use Ashe. It is worth to spend 10 minutes and know almost everything about the theme.', 'ashe' ); ?>
					</p>
					<a target="_blank" href="<?php echo esc_url('http://wp-royal.com/themes/ashe/docs/?ref=ashe-free-backend-about-docs/'); ?>" class="button button-primary"><?php esc_html_e( 'Read Documentation', 'ashe' ); ?></a>
				</div>

				<div class="column-wdith-3">
					<h3><?php esc_html_e( 'Theme Customizer', 'ashe' ); ?></h3>
					<p>
					<?php esc_html_e( 'All theme options are located here. After reading the Theme Documentation we recommend you to open the Theme Customizer and play with some options. You will enjoy it.', 'ashe' ); ?>
					</p>
					<a target="_blank" href="<?php echo esc_url( wp_customize_url() );?>" class="button button-primary"><?php esc_html_e( 'Customize Your Site', 'ashe' ); ?></a>
				</div>

			</div>

		<?php elseif ( $active_tab == 'ashe_tab_2' ) : ?>
			
			<div class="three-columns-wrap">
				
				<br>
				<p><?php esc_html_e( 'Recommended Plugins are fully supported by Ashe theme, they are styled to fit the theme design and performing well. Not mandatory, but may be usefl.', 'ashe' ); ?></p>
				<br>

				<?php

				// WooCommerce
				ashe_recommended_plugin( 'woocommerce', 'woocommerce', esc_html__( 'WooCommerce', 'ashe' ), esc_html__( 'WooCommerce is a powerful, extendable eCommerce plugin that helps you sell anything. Beautifully.', 'ashe' ) );

				// MailPoet 2
				ashe_recommended_plugin( 'wysija-newsletters', 'index', esc_html__( 'MailPoet 2', 'ashe' ), esc_html__( 'Create and send newsletters or automated emails. Capture subscribers with a widget. Import and manage your lists. MailPoet is made with love.', 'ashe' ) );

				// Contact Form 7
				ashe_recommended_plugin( 'contact-form-7', 'wp-contact-form-7', esc_html__( 'Contact Form 7', 'ashe' ), esc_html__( 'Just another contact form plugin. Simple but flexible.', 'ashe' ) );

				// Recent Posts Widget
				ashe_recommended_plugin( 'recent-posts-widget-with-thumbnails', 'recent-posts-widget-with-thumbnails', esc_html__( 'Recent Posts Widget With Thumbnails', 'ashe' ), esc_html__( 'Small and fast plugin to display in the sidebar a list of linked titles and thumbnails of the most recent postings.', 'ashe' ) );

				// Instagram Widget
				ashe_recommended_plugin( 'wp-instagram-widget', 'wp-instagram-widget', esc_html__( 'WP Instagram Widget', 'ashe' ), esc_html__( 'A WordPress widget for showing your latest Instagram photos.', 'ashe' ) );

				// Facebook Widget
				ashe_recommended_plugin( 'facebook-pagelike-widget', 'facebook_widget', esc_html__( 'Facebook Widget', 'ashe' ), esc_html__( 'This widget adds a Simple Facebook Page Like Widget into your wordpress website sidebar within few minutes.', 'ashe' ) );

				?>


			</div>

		<?php elseif ( $active_tab == 'ashe_tab_3' ) : ?>

			<div class="three-columns-wrap">

				<br>

				<div class="column-wdith-3">
					<h3>
						<span class="dashicons dashicons-sos"></span>
						<?php esc_html_e( 'Forums', 'ashe' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Before asking a questions it\'s highly recommended to search on forums, but if you can\'t find the solution feel free to create a new topic.', 'ashe' ); ?>
						<hr>
						<a target="_blank" href="<?php echo esc_url('http://wp-royal.com/forums/forum/free-themes/ashe-free/?ref=ashe-free-backend-about-support-forum/'); ?>"><?php esc_html_e( 'Go to Support Forums', 'ashe' ); ?></a>
					</p>
				</div>

				<div class="column-wdith-3">
					<h3>
						<span class="dashicons dashicons-book"></span>
						<?php esc_html_e( 'Documentation', 'ashe' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Need more details? Please check our full documentation for detailed information on how to use Ashe.', 'ashe' ); ?>
						<hr>
						<a target="_blank" href="<?php echo esc_url('http://wp-royal.com/themes/ashe/docs/?ref=ashe-free-backend-about-docs/'); ?>"><?php esc_html_e( 'Read Full Documentation', 'ashe' ); ?></a>
					</p>
				</div>

				<div class="column-wdith-3">
					<h3>
						<span class="dashicons dashicons-admin-tools"></span>
						<?php esc_html_e( 'Changelog', 'ashe' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Stay always up to date, check for fixes, updates and some new feauters you should not miss.', 'ashe' ); ?>
						<hr>
						<a target="_blank" href="<?php echo esc_url('http://wp-royal.com/ashe-free-changelog/?ref=ashe-free-backend-about-changelog/'); ?>"><?php esc_html_e( 'See Changelog', 'ashe' ); ?></a>
					</p>
				</div>

				<div class="column-wdith-3">
					<h3>
						<span class="dashicons dashicons-smiley"></span>
						<?php esc_html_e( 'Donation', 'ashe' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Even a small sum can help us a lot with theme development. If the Ashe theme is useful and our support is helpful, please don\'t hesitate to donate a little bit, at lest buy us a Coffee or a Beer :)', 'ashe' ); ?>
						<hr>
						<a target="_blank" href="<?php echo esc_url('http://wp-royal.com/themes/ashe/ashe-donate.html'); ?>"><?php esc_html_e( 'Donate with PayPal', 'ashe' ); ?></a>
					</p>
				</div>

			</div>

		<?php elseif ( $active_tab == 'ashe_tab_4' ) : ?>

			<br><br>

			<table class="free-vs-pro form-table">
				<thead>
					<tr>
						<th>
							<a href="<?php echo esc_url('http://wp-royal.com/themes/item-ashe-pro/?ref=ashe-free-backend-about-section-getpro-btn'); ?>" target="_blank" class="button button-primary button-hero">
								<?php esc_html_e( 'Get Ashe Pro', 'ashe' ); ?>
							</a>
							<a href="<?php echo esc_url('http://wp-royal.com/ashe-trial/?ref=ashe-free-backend-about-section-trypro-btn'); ?>" target="_blank" class="button button-primary button-hero">
								<?php esc_html_e( 'Try Ashe Pro Trial', 'ashe' ); ?>
							</a>
						</th>
						<th>Ashe</th>
						<th>Ashe Pro</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<h3>100% Responsive and Retina Ready</h3>
							<p>Theme adapts to any kind of device screen, from mobile phones to high resolution Retina displays.</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3>Translation Ready</h3>
							<p>Each hard-coded string is ready for translation, means you can translate everything. Language "ashe.pot" file included.</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3>RTL Support</h3>
							<p>RTL stylesheet for languages that are read from right to left like Arabic, Hebrew, etc... Your content will adapt to RTL direction.</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3>WooCommerce Integration</h3>
							<p>
								The best eCommerce solution for Wordpress websites. Add your own Shop and sell anything from digital Goods to Coconuts.
								<br>
								<strong class="only-pro">Pro Version:</strong> Left &amp; Right WooCommerce widgetised areas. Perfectly styled to fit the theme design.
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3>Contact Form 7 Support</h3>
							<p>The most popular contact form plugin. You can build almost any kind of contact form. Very simple but super flexible.</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3>Image &amp; Text Logos</h3>
							<p>Upload your logo image(set the size) or simply type your text logo.<br><strong class="only-pro">Pro Version:</strong> Adjust Logo position to fit your custom header design.</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3>Featured Posts Slider</h3>
							<p>
								Showcase up to 5 most recent Blog Posts in header area.
								<br>
								<strong class="only-pro">Pro Version:</strong> Unlimited number of Slides. Feature specific(custom) posts and order them by date, comments or even random. Change Slider columns from 1 up to 4, set Autoplay and enable/disable any element.  
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3>Featured Links (Promo Boxes)</h3>
							<p>
								Display up to 3 eye-catching linked images under header area, which could be a Custom Page Links or Banners(ads). 
								<br>
								<strong class="only-pro">Pro Version:</strong> You can have 5 Featured Links.
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3>Background Image/Color</h3>
							<p>Set the custom body Background image or Color.</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
					<tr>
						<td>
							<h3>Header Background Image/Color</h3>
							<p>
								Set the custom header Background image or Color.
								<br>
								<strong class="only-pro">Pro Version:</strong> Adjust Header size &amp; enable <strong>Parallax Scrolling</strong> to fit your custom website design.
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3>Classic Layout</h3>
							<p>Standard one column Blog Feed layout.</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3>Multi-level Sub Menu Support</h3>
							<p>Unlimited level of sub menus. Add as much as you need.</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3>Left &amp; Right Sidebars</h3>
							<p>
								Left and Right Widgetised areas. Could be globally Enabled/Disabled.
								<br>
								<strong class="only-pro">Pro Version:</strong> Full controll - Enable/Disable on specific Posts &amp; Pages.
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3>Alternative Sidebar</h3>
							<p>Stylish and modern Alternative Widgetised area, which is hidden by default and pops up on click.</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					
					<!-- Only Pro -->
					<tr>
						<td>
							<h3>One Click Demo Import</h3>
							<p>Just a Single Click and you will get the same content as shown on our Demo website. Menus, Posts, Pages, Widgets, etc... will be imported.</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3>Unlimited Colors</h3>
							<p>Tons of color options. You can customize your Header, Content and Footer separately as much as possible.</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3>800+ Google Fonts</h3>
							<p>Rich Typography options. Choose from more than 800 Google Fonts, adjust Size, Line Height, Font Weight, etc...</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3>Grid Layout</h3>
							<p>Choose from 1 up to 4 columns grid layout for your Blog Feed.</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3>Post Formats Support</h3>
							<p>Create Audio, Video, Gallery, Link &amp; Quote Blog Posts with unique, modern and minimal styling. Full control over your Blog Posts.</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3>Post Sharing Icons</h3>
							<p>Ability to share your Blog Posts on the most popular social media: Facebook, Twitter, Pinterest, Google Plus, Linkedin, Reddit, Tumblr.</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3>Different Blog Feed Pagination</h3>
							<p>Choose from 4 Diffenet pagination styles: Default, Numeric, Load More Button and Infinite Page Scrolling.</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3>Sticky Navigation</h3>
							<p>Fix the main navigation to the page, it will be always visible at the top. </p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3>Instagram Widget Area</h3>
							<p>Showcase your Instagram photos on your website footer area.</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3>Integration with MailChimp</h3>
							<p>This plugin helps you add more subscribers to your MailChimp lists using various methods.</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3>Integration with JetPack</h3>
							<p>Jetpack is the ultimate toolkit for WordPress. It gives you everything you need to design, secure, and grow your site in one bundle.</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3>Ashe Pro Widgets</h3>
							<p>Ashe Author, Ads &amp; Social Icons widgets included.</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>


					<tr>
						<td></td>
						<td colspan="2">
							<a href="<?php echo esc_url('http://wp-royal.com/themes/item-ashe-pro/?ref=ashe-free-backend-about-section-getpro-btn'); ?>" target="_blank" class="button button-primary button-hero">
								<?php esc_html_e( 'Get Ashe Pro', 'ashe' ); ?>
							</a>
							<br><br>
							<a href="<?php echo esc_url('http://wp-royal.com/ashe-trial/?ref=ashe-free-backend-about-section-trypro-btn'); ?>" target="_blank" class="button button-primary button-hero">
								<?php esc_html_e( 'Try Ashe Pro Trial', 'ashe' ); ?>
							</a>
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
function ashe_recommended_plugin( $slug, $filename, $name, $description) {

	if ( $slug === 'facebook-pagelike-widget' ) {
		$size = '128x128';
	} else {
		$size = '256x256';
	}

?>

	<div class="plugin-card">
		<div class="name column-name">
			<h3>
				<?php echo esc_html( $name ); ?>
				<img src="<?php echo esc_url('https://ps.w.org/'. $slug .'/assets/icon-'. $size .'.png') ?>" class="plugin-icon" alt="">
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
			<p><?php echo esc_html( $description ); ?></p>
		</div>
	</div>

<?php
}

// enqueue ui CSS/JS
function enqueue_about_ashe_page_scripts($hook) {

	if ( 'appearance_page_about-ashe' != $hook ) {
		return;
	}

	// enqueue CSS
	wp_enqueue_style( 'about-ashe-page-css', get_theme_file_uri( '/inc/about/css/about-ashe-page.css' ) );

    // enqueue JS
    wp_enqueue_script( 'about-ashe-page-js', get_theme_file_uri( '/inc/about/js/about-ashe-page.js' ), array( 'jquery' ), false, true );

}
add_action( 'admin_enqueue_scripts', 'enqueue_about_ashe_page_scripts' );