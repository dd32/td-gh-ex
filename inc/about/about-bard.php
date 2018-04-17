<?php // About Bard

// Add About Bard Page
function bard_about_page() {
	add_theme_page( esc_html__( 'About Bard', 'bard' ), esc_html__( 'About Bard', 'bard' ), 'edit_theme_options', 'about-bard', 'bard_about_page_output' );
}
add_action( 'admin_menu', 'bard_about_page' );

// Render About Bard HTML
function bard_about_page_output() {
?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Welcome to Bard!', 'bard' ); ?></h1>
		<p class="welcome-text">
			<?php esc_html_e( 'Bard is free personal and multi-author WordPress Blog theme. It\'s perfect for any kind of blog: personal, multi-author, food, lifestyle, etc... Is fully Responsive and Retina Display ready, clean, modern and minimal. Bard is WooCommerce compatible, also has RTL support and for sure it\'s SEO friendly. Coded with latest WordPress\' standards.', 'bard' ); ?>
		</p>

		<?php

		// Get Active Tab
		if ( isset($_GET[ 'tab' ]) ) {
			$active_tab = sanitize_key($_GET[ 'tab' ]);
		} else {
			$active_tab = 'bard_tab_1';
		}


		?>

		<!-- Tabs -->
		<div class="nav-tab-wrapper">
			<a href="?page=about-bard&tab=bard_tab_1" class="nav-tab <?php echo $active_tab == 'bard_tab_1' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Getting Started', 'bard' ); ?>
			</a>
			<a href="?page=about-bard&tab=bard_tab_2" class="nav-tab <?php echo $active_tab == 'bard_tab_2' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Recommended Plugins', 'bard' ); ?>
			</a>
			<a href="?page=about-bard&tab=bard_tab_3" class="nav-tab <?php echo $active_tab == 'bard_tab_3' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Support', 'bard' ); ?>
			</a>
			<a href="?page=about-bard&tab=bard_tab_4" class="nav-tab <?php echo $active_tab == 'bard_tab_4' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Free vs Pro', 'bard' ); ?>
			</a>
		</div>

		<!-- Tab Content -->
		<?php if ( $active_tab == 'bard_tab_1' ) : ?>

			<div class="three-columns-wrap">

				<br>

				<div class="column-wdith-3">
					<h3><?php esc_html_e( 'Theme Documentation', 'bard' ); ?></h3>
					<p>
						<?php esc_html_e( 'Highly recommended to begin with this, read the full theme documentation to understand the basics and even more details about how to use Bard. It is worth to spend 10 minutes and know almost everything about the theme.', 'bard' ); ?>
					</p>
					<a target="_blank" href="<?php echo esc_url('https://wp-royal.com/themes/bard/docs/?ref=bard-free-backend-about-docs/'); ?>" class="button button-primary"><?php esc_html_e( 'Read Documentation', 'bard' ); ?></a>
				</div>

				<div class="column-wdith-3">
					<h3><?php esc_html_e( 'Demo Content', 'bard' ); ?></h3>
					<p>
						<?php esc_html_e( 'If you are a WordPress beginner it\'s highly recomended to install the Demo Content. This file includes: Menus, Posts, Pages, Widgets, etc. Read More about demo import in the ', 'bard' ); ?>
						<a href="<?php echo esc_url('https://wp-royal.com/themes/bard/docs/?ref=bard-free-backend-about-docs/#demo'); ?>" target="_blank"><?php esc_html_e( 'Theme Documentation.', 'bard' ); ?></a>
					</p>
					<a target="_blank" target="_blank" href="<?php echo esc_url('https://wp-royal.com/themes/bard/democontent/bard_free_demo_content.html?ref=bard-free-backend-about-demoxml-btn'); ?>" class="button button-primary"><?php esc_html_e( 'Download Import File', 'bard' ); ?></a>
				</div>

				<div class="column-wdith-3">
					<h3><?php esc_html_e( 'Theme Customizer', 'bard' ); ?></h3>
					<p>
					<?php esc_html_e( 'All theme options are located here. After reading the Theme Documentation we recommend you to open the Theme Customizer and play with some options. You will enjoy it.', 'bard' ); ?>
					</p>
					<a target="_blank" href="<?php echo esc_url( wp_customize_url() );?>" class="button button-primary"><?php esc_html_e( 'Customize Your Site', 'bard' ); ?></a>
				</div>

			</div>


		<?php elseif ( $active_tab == 'bard_tab_2' ) : ?>
			
			<div class="three-columns-wrap">
				
				<br>
				<p><?php esc_html_e( 'Recommended Plugins are fully supported by Bard theme, they are styled to fit the theme design and performing well. Not mandatory, but may be usefl.', 'bard' ); ?></p>
				<br>

				<?php

				// WooCommerce
				bard_recommended_plugin( 'woocommerce', 'woocommerce', esc_html__( 'WooCommerce', 'bard' ), esc_html__( 'WooCommerce is a powerful, extendable eCommerce plugin that helps you sell anything. Beautifully.', 'bard' ) );

				// MailPoet 2
				bard_recommended_plugin( 'wysija-newsletters', 'index', esc_html__( 'MailPoet 2', 'bard' ), esc_html__( 'Create and send newsletters or automated emails. Capture subscribers with a widget. Import and manage your lists. MailPoet is made with love.', 'bard' ) );

				// Contact Form 7
				bard_recommended_plugin( 'contact-form-7', 'wp-contact-form-7', esc_html__( 'Contact Form 7', 'bard' ), esc_html__( 'Just another contact form plugin. Simple but flexible.', 'bard' ) );

				// Recent Posts Widget
				bard_recommended_plugin( 'recent-posts-widget-with-thumbnails', 'recent-posts-widget-with-thumbnails', esc_html__( 'Recent Posts Widget With Thumbnails', 'bard' ), esc_html__( 'Small and fast plugin to display in the sidebar a list of linked titles and thumbnails of the most recent postings.', 'bard' ) );

				// Instagram Slider
				bard_recommended_plugin( 'instagram-slider-widget', 'instaram_slider', esc_html__( 'Instagram Slider Widget', 'bard' ), esc_html__( 'Instagram Widget is a responsive slider widget that shows up to 18 images latest images from a public instagram user hashtag.', 'bard' ) );

				// Instagram Widget
				bard_recommended_plugin( 'wp-instagram-widget', 'wp-instagram-widget', esc_html__( 'WP Instagram Widget', 'bard' ), esc_html__( 'A WordPress widget for showing your latest Instagram photos.', 'bard' ) );

				// Ajax Thumbnail Rebuild
				bard_recommended_plugin( 'ajax-thumbnail-rebuild', 'ajax-thumbnail-rebuild', esc_html__( 'Ajax Thumbnail Rebuild', 'bard' ), esc_html__( 'AJAX Thumbnail Rebuild allows you to rebuild all thumbnails at once without script timeouts on your server.', 'bard' ) );

				// Facebook Widget
				bard_recommended_plugin( 'facebook-pagelike-widget', 'facebook_widget', esc_html__( 'Facebook Widget', 'bard' ), esc_html__( 'This widget adds a Simple Facebook Page Like Widget into your WordPress website sidebar within few minutes.', 'bard' ) );

				?>


			</div>

		<?php elseif ( $active_tab == 'bard_tab_3' ) : ?>

			<div class="three-columns-wrap">

				<br>

				<div class="column-wdith-3">
					<h3>
						<span class="dashicons dashicons-sos"></span>
						<?php esc_html_e( 'Forums', 'bard' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Before asking a questions it\'s highly recommended to search on forums, but if you can\'t find the solution feel free to create a new topic.', 'bard' ); ?>
						<hr>
						<a target="_blank" href="<?php echo esc_url('https://wp-royal.com/support-bard-free/?ref=bard-free-backend-about-support-forum/'); ?>"><?php esc_html_e( 'Go to Support Forums', 'bard' ); ?></a>
					</p>
				</div>

				<div class="column-wdith-3">
					<h3>
						<span class="dashicons dashicons-book"></span>
						<?php esc_html_e( 'Documentation', 'bard' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Need more details? Please check out Bard Theme Documentation for detailed information.', 'bard' ); ?>
						<hr>
						<a target="_blank" href="<?php echo esc_url('https://wp-royal.com/themes/bard/docs/?ref=bard-free-backend-about-docs/'); ?>"><?php esc_html_e( 'Read Full Documentation', 'bard' ); ?></a>
					</p>
				</div>

				<div class="column-wdith-3">
					<h3>
						<span class="dashicons dashicons-admin-tools"></span>
						<?php esc_html_e( 'Changelog', 'bard' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Stay always up to date, check for fixes, updates and some new feauters you should not miss.', 'bard' ); ?>
						<hr>
						<a target="_blank" href="<?php echo esc_url('https://wp-royal.com/bard-free-changelog/?ref=bard-free-backend-about-changelog/'); ?>"><?php esc_html_e( 'See Changelog', 'bard' ); ?></a>
					</p>
				</div>

				<div class="column-wdith-3">
					<h3>
						<span class="dashicons dashicons-smiley"></span>
						<?php esc_html_e( 'Donation', 'bard' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Even a small sum can help us a lot with theme development. If the Bard theme is useful and our support is helpful, please don\'t hesitate to donate a little bit, at least buy us a Coffee or a Beer :)', 'bard' ); ?>
						<hr>
						<a target="_blank" href="<?php echo esc_url('https://wp-royal.com/themes/bard/bard-donate.html'); ?>"><?php esc_html_e( 'Donate with PayPal', 'bard' ); ?></a>
					</p>
				</div>

			</div>

		<?php elseif ( $active_tab == 'bard_tab_4' ) : ?>

			<br><br>

			<table class="free-vs-pro form-table">
				<thead>
					<tr>
						<th>
							<a href="<?php echo esc_url('https://wp-royal.com/themes/item-bard-pro/?ref=bard-free-backend-about-section-getpro-btn'); ?>" target="_blank" class="button button-primary button-hero">
								<?php esc_html_e( 'Get Bard Pro', 'bard' ); ?>
							</a>
						</th>
						<th><?php esc_html_e( 'Bard', 'bard' ); ?></th>
						<th><?php esc_html_e( 'Bard Pro', 'bard' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<h3><?php esc_html_e( '100% Responsive and Retina Ready', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Theme adapts to any kind of device screen, from mobile phones to high resolution Retina displays.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Translation Ready', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Each hard-coded string is ready for translation, means you can translate everything. Language "bard.pot" file included.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'RTL Support', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'RTL stylesheet for languages that are read from right to left like Arabic, Hebrew, etc... Your content will adapt to RTL direction.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'WooCommerce Integration', 'bard' ); ?></h3>
							<p>
								<?php esc_html_e( 'The best eCommerce solution for WordPress websites. Add your own Shop and sell anything from digital Goods to Coconuts.', 'bard' ); ?>
								<br>
								<strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'bard' ); ?></strong> <?php esc_html_e( 'Left &amp; Right WooCommerce widgetised areas. Perfectly styled to fit the theme design.', 'bard' ); ?>
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Contact Form 7 Support', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'The most popular contact form plugin. You can build almost any kind of contact form. Very simple but super flexible.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Image &amp; Text Logos', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Upload your logo image(set the size) or simply type your text logo.', 'bard' ); ?><br><strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'bard' ); ?></strong> <?php esc_html_e( 'Adjust Logo position to fit your custom header design.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Featured Posts Slider', 'bard' ); ?></h3>
							<p>
								<?php esc_html_e( 'Showcase up to 5 most recent Blog Posts in header area.', 'bard' ); ?>
								<br>
								<strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'bard' ); ?></strong> <?php esc_html_e( 'Unlimited number of Slides. Feature specific(custom) posts and order them by date, comments or even random. Change Slider columns from 1 up to 4, set Autoplay and enable/disable any element.', 'bard' ); ?>  
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Featured Links (Promo Boxes)', 'bard' ); ?></h3>
							<p>
								<?php esc_html_e( 'Display up to 3 eye-catching linked images under header area, which could be a Custom Page Links or Banners(ads).', 'bard' ); ?> 
								<br>
								<strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'bard' ); ?></strong> <?php esc_html_e( 'You can have 5 Featured Links.', 'bard' ); ?>
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Background Image/Color', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Set the custom body Background image or Color.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Header Background Image/Color', 'bard' ); ?></h3>
							<p>
								<?php esc_html_e( 'Set the custom header Background image or Color.', 'bard' ); ?>
								<br>
								<strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'bard' ); ?></strong> <?php esc_html_e( 'Adjust Header size &amp; enable ', 'bard' ); ?><strong><?php esc_html_e( 'Parallax Scrolling', 'bard' ); ?></strong> <?php esc_html_e( 'to fit your custom website design.', 'bard' ); ?>
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Classic Layout', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Standard one column Blog Feed layout.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Multi-level Sub Menu Support', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Unlimited level of sub menus. Add as much as you need.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Left &amp; Right Sidebars', 'bard' ); ?></h3>
							<p>
								<?php esc_html_e( 'Left and Right Widgetised areas. Could be globally Enabled/Disabled.', 'bard' ); ?>
								<br>
								<strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'bard' ); ?></strong> <?php esc_html_e( 'Full controll - Enable/Disable on specific Posts &amp; Pages.', 'bard' ); ?>
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Alternative Sidebar', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Stylish and modern Alternative Widgetised area, which is hidden by default and pops up on click.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					
					<!-- Only Pro -->
					<tr>
						<td>
							<h3><?php esc_html_e( 'One Click Demo Import', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Just a Single Click and you will get the same content as shown on our Demo website. Menus, Posts, Pages, Widgets, etc... will be imported.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Unlimited Colors', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Tons of color options. You can customize your Header, Content and Footer separately as much as possible.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( '800+ Google Fonts', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Rich Typography options. Choose from more than 800 Google Fonts, adjust Size, Line Height, Font Weight, etc...', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Advanced WooCommerce Support', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Set 2, 3 or 4 Columns on WooCommerce Product Grid. Enable/Disable Left & Right WooCommerce widgetized areas.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Grid Layout', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Choose from 1 up to 4 columns grid layout for your Blog Feed.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Post Formats Support', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Create Audio, Video, Gallery, Link &amp; Quote Blog Posts with unique, modern and minimal styling. Full control over your Blog Posts.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Post Sharing Icons', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Ability to share your Blog Posts on the most popular social media: Facebook, Twitter, Pinterest, Google Plus, Linkedin, Reddit, Tumblr.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Advanced Post Options', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Custom Post Header image upload, Full-width Post option, ability to display current post in the Featured Slider.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Advanced Page Options', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Custom Page Header image, Full-width page option, enable/disable Featured Slider & Featured Links on current page, Show/hide page Title & Featured Image.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Different Blog Feed Pagination', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Choose from 4 Diffenet pagination styles: Default, Numeric, Load More Button and Infinite Page Scrolling.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Sticky Navigation', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Fix the main navigation to the page, it will be always visible at the top.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Instagram Widget Area', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Showcase your Instagram photos on your website footer area.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Integration with MailChimp', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'This plugin helps you add more subscribers to your MailChimp lists using various methods.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Integration with JetPack', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Jetpack is the ultimate toolkit for WordPress. It gives you everything you need to design, secure, and grow your site in one bundle.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Bard Pro Widgets', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Bard Author, Ads &amp; Social Icons widgets included.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>


					<tr>
						<td></td>
						<td colspan="2">
							<a href="<?php echo esc_url('https://wp-royal.com/themes/item-bard-pro/?ref=bard-free-backend-about-section-getpro-btn'); ?>" target="_blank" class="button button-primary button-hero">
								<?php esc_html_e( 'Get Bard Pro', 'bard' ); ?>
							</a>
							<br><br>
						</td>
					</tr>
				</tbody>
			</table>

	    <?php endif; ?>

	</div><!-- /.wrap -->
<?php
} // end bard_about_page_output

// Check if plugin is installed
function bard_check_installed_plugin( $slug, $filename ) {
	return file_exists( ABSPATH . 'wp-content/plugins/' . $slug . '/' . $filename . '.php' ) ? true : false;
}

// Generate Recommended Plugin HTML
function bard_recommended_plugin( $slug, $filename, $name, $description) {

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

				<?php if ( $slug === 'ajax-thumbnail-rebuild' ) : ?>
					<img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/images/ajax-thumbnail-rebuild.jpeg'; ?>" class="plugin-icon" alt="">
				<?php else: ?>
					<img src="<?php echo esc_url('https://ps.w.org/'. $slug .'/assets/icon-'. $size .'.png') ?>" class="plugin-icon" alt="">
				<?php endif; ?>
			</h3>
		</div>
		<div class="action-links">
			<?php if ( bard_check_installed_plugin( $slug, $filename ) ) : ?>
			<button type="button" class="button button-disabled" disabled="disabled"><?php esc_html_e( 'Installed', 'bard' ); ?></button>
			<?php else : ?>
			<a class="install-now button-primary" href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin='. $slug ), 'install-plugin_'. $slug ) ); ?>" >
				<?php esc_html_e( 'Install Now', 'bard' ); ?>
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
function bard_enqueue_about_page_scripts($hook) {

	if ( 'appearance_page_about-bard' != $hook ) {
		return;
	}

	// enqueue CSS
	wp_enqueue_style( 'bard-about-css', get_theme_file_uri( '/inc/about/css/about-page.css' ) );

}
add_action( 'admin_enqueue_scripts', 'bard_enqueue_about_page_scripts' );