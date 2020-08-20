	<div class="theme-steps-list-wrap two-col">

		<div class="theme-steps col">
			<div class="step-1-right recommend-col">
				<h3><?php echo esc_html__('Links to Customizer Settings', 'accesspress-lite'); ?></h3>
				<div class="item-wrap">
					<?php
					$data    = array(
						array(
							'icon' => 'dashicons-format-gallery',
							'text' => __( 'Upload Logo', 'accesspress-lite' ),
							'link' => add_query_arg( array( 'autofocus[section]' => 'title_tagline' ), admin_url( 'customize.php' ) ),
						),
						array(
							'icon' => 'dashicons-menu',
							'text' => __( 'Header Options', 'accesspress-lite' ),
							'link' => add_query_arg( array( 'autofocus[section]' => 'accesspresslite_header_settings' ), admin_url( 'customize.php' ) ),
						),
						array(
							'icon' => 'dashicons-admin-appearance',
							'text' => __( 'Slider Settings', 'accesspress-lite' ),
							'link' => add_query_arg( array( 'autofocus[section]' => 'accesspress_lite_slider_settings' ), admin_url( 'customize.php' ) ),
						),
						array(
							'icon' => 'dashicons-admin-home',
							'text' => __( 'HomePage Settings', 'accesspress-lite' ),
							'link' => add_query_arg( array( 'autofocus[panel]' => 'accesspress_lite_hm_settings' ), admin_url( 'customize.php' ) ),
						),
						array(
							'icon' => 'dashicons-format-aside',
							'text' => __( 'Post Settings', 'accesspress-lite' ),
							'link' => add_query_arg( array( 'autofocus[section]' => 'accesspress_lite_post_setting' ), admin_url( 'customize.php' ) ),
						),
						array(
							'icon' => 'dashicons-align-center',
							'text' => __( 'Footer Settings', 'accesspress-lite' ),
							'link' => add_query_arg( array( 'autofocus[section]' => 'accesspress_lite_footer_setting' ), admin_url( 'customize.php' ) ),
						),
					); 
					foreach ( $data as $customizer_item ) {
						?>
						<div class="ti-customizer-item ">
							<i class="dashicons <?php echo esc_attr( $customizer_item['icon']); ?> "></i><a href="<?php echo esc_url( $customizer_item['link'] ); ?>"><?php echo wp_kses_post( $customizer_item['text'] ); ?></a>
						</div>
					<?php } ?>

				</div>
			</div>
			<div class="step-1-left">
				<h3><?php echo esc_html__('Step 1 - Checkout starter sites (Demos) ', 'accesspress-lite'); ?></h3>
				<p><?php /* translators: %s : Theme Name */ printf(esc_html__('%1$s now comes with a sites library with 1 starter site to pick from. You can check them out and decide which one to start with. However you can decide not to use any one of them and start building your site from scratch.', 'accesspress-lite'),$this->theme_name); ?></p>
				<a class="nav-tab demo_import button" href="<?php echo esc_url(admin_url('/themes.php?page=welcome-page#demo_import')); ?>"><?php echo esc_html__('See Demos', 'accesspress-lite'); ?></a>
			</div>
			
		</div>

		<div class="theme-steps col">
			<h3><?php echo esc_html__('Step 2 - Import demo of your choice ', 'accesspress-lite'); ?></h3>
			<p><?php echo esc_html__('Once you chose one of the available starter sites (demos) - you can install it. Please be noted that once you install the demo, it will install all the required plugins too. It is not recommended to install demo on your existing content. A fresh WordPress installation would be required to install demo to replicate demo content exactly. ', 'accesspress-lite'); ?></p>
			<a class=" nav-tab demo_import button" href="<?php echo esc_url(admin_url('/themes.php?page=welcome-page#demo_import')); ?>"><?php echo esc_html__('Install Demo', 'accesspress-lite'); ?></a>
		</div>
		<div class="theme-steps col">
			<h3><?php echo esc_html__('Step 3 - Start editing the demo content and making your site! ', 'accesspress-lite'); ?></h3>
			<p><?php echo esc_html__('Once you install the demo, you can start editing the content, replacing images etc.', 'accesspress-lite'); ?></p>
		</div>
		<div class="theme-steps col">
			<h3><?php echo esc_html__('Step 4 - You \'re done! ', 'accesspress-lite'); ?></h3>
			<p><?php echo esc_html__('Go live with the website and get some rest', 'accesspress-lite'); ?></p>
		</div>
	</div>