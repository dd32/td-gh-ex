<?php

//options

function axis_magazine_theme_info_menu() {

	add_theme_page( 
		esc_html__('Welcome To Axis Magazine WordPress Theme', 'axis-magazine'), 
		esc_html__('Axis Magazine Theme Info', 'axis-magazine'), 
		'manage_options', 
		'axis_magazine_theme_info_options', 
		'axis_magazine_theme_info_display' 
	);

}


add_action( 'admin_menu', 'axis_magazine_theme_info_menu' );



function axis_magazine_theme_info_display() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( esc_html_e( 'You do not have sufficient permissions to access this page.', 'axis-magazine' ) );
	}
	
	?>
	<div class="wrap axis-magazine-adm">
		<h1 class="header-welcome"><?php esc_html_e('Welcome to Axis Magazine - 0.0.17', 'axis-magazine'); ?></h1>
		<div class="axis-magazine-adm-dsply-fl axis-magazine-adm-fl-wrap axis-magazine-adm-jc-sp-btw">

			<div class="axis-magazine-adm-wid-49 theme-para theme-doc axis-magazine-adm-mobwid-100">
				<h4><?php esc_html_e('Theme Documentation','axis-magazine'); ?></h4>
				<p><?php esc_html_e('Documentation for this theme includes all theme information that is needed to get your site up and running', 'axis-magazine'); ?></p>
				<p>
					<a href="<?php echo esc_url('https://zidithemes.tumblr.com/post/187902110264/axis-magazine'); ?>" class="button button-secondary" target="_blank">
						<?php esc_html_e('Theme Documentation', 'axis-magazine'); ?>
					</a>
				</p>
			</div>


			<div class="axis-magazine-adm-wid-49 theme-para theme-opt axis-magazine-adm-mobwid-100">
				<h4><?php esc_html_e('Theme Options','axis-magazine'); ?></h4>
				<p class="">
					<?php esc_html_e('Axis Magazine Theme supports Theme Customizer. Click "Go To Customizer" to open the Customizer now.',  'axis-magazine'); ?>
				</p>
				<p>
					<a href="<?php echo esc_url(admin_url('customize.php')); ?>" class="button button-secondary" target="_blank">
						<?php esc_html_e('Go To Customizer', 'axis-magazine'); ?>
					</a>
				</p>
			</div>

			<div class="axis-magazine-adm-wid-49 theme-para theme-opt axis-magazine-adm-mobwid-100">
				<h4><?php esc_html_e('Axis Magazine Pro','axis-magazine'); ?></h4>
				<p class="">
					<?php esc_html_e('Axis Magazine Pro includes portfolio page templates, additional features and more options to customize your website.',  'axis-magazine'); ?>
				</p>
				<p>
					<a href="<?php echo esc_url('http://zidithemes.tumblr.com/post/189552213279/axis-magazine-pro'); ?>" class="button button-primary" target="_blank">
						<?php esc_html_e('Upgrade to Axis Magazine Pro', 'axis-magazine'); ?>
					</a>
				</p>
			</div>

			<div class="axis-magazine-adm-wid-49 theme-para theme-doc axis-magazine-adm-mobwid-100">
				<h4><?php esc_html_e('Watch Tutorial on Axis Magazine','axis-magazine'); ?></h4>
				<p><?php esc_html_e('Watch Youtube tutorial on how to install and use Axis Magazine theme.', 'axis-magazine'); ?></p>
				<p>
					<a href="<?php echo esc_url('https://www.youtube.com/watch?v=sApxRjRWn8E'); ?>" class="button button-secondary button-youtube" target="_blank">
						<?php esc_html_e('Watch Axis Magazine Tutorial', 'axis-magazine'); ?>
					</a>
				</p>
			</div>

			<div class="axis-magazine-adm-wid-49 theme-para theme-doc axis-magazine-adm-mobwid-100">
				<h4><?php esc_html_e('View All Our Themes','axis-magazine'); ?></h4>
				<p><?php esc_html_e('View all our themes.', 'axis-magazine'); ?></p>
				<p>
					<a href="<?php echo esc_url('https://wordpress.org/themes/author/zidithemes'); ?>" class="button button-secondary" target="_blank">
						<?php esc_html_e('Latest Themes', 'axis-magazine'); ?>
					</a>
				</p>
			</div>

			<div class="axis-magazine-adm-wid-49 theme-para theme-review axis-magazine-adm-mobwid-100">
				<h4><?php esc_html_e('Leave us a review','axis-magazine'); ?></h4>
				<p><?php esc_html_e('We would love to hear your feedback.', 'axis-magazine'); ?></p>
				<p>
					<a href="<?php echo esc_url('https://wordpress.org/support/theme/axis-magazine/reviews/#new-post'); ?>" class="button button-secondary" target="_blank">
						<?php esc_html_e('Submit a review', 'axis-magazine'); ?>
					</a>
				</p>
			</div>


			<div class="axis-magazine-adm-wid-49 theme-para theme-support axis-magazine-adm-mobwid-100">
				<h4><?php esc_html_e('Support','axis-magazine'); ?></h4>
				<p><?php esc_html_e('Reach out in the theme support forums', 'axis-magazine'); ?></p>
				<p>
					<a href="<?php echo esc_url('https://wordpress.org/support/theme/axis-magazine/'); ?>" class="button button-secondary" target="_blank">
						<?php esc_html_e('Support Forum', 'axis-magazine'); ?>
					</a>
				</p>
			</div>

			
			
			<div class="theme-upgrade axis-magazine-adm-wid-100">
				<table class="axis-magazine-adm-wid-100">
					<thead class="theme-table-head">
						<tr>
							<th class="feature"><h3><?php esc_html_e('Features', 'axis-magazine'); ?></h3></th>
							<th class="axis-magazine-adm-wid-33"><h3><?php esc_html_e('Axis Magazine', 'axis-magazine'); ?></h3></th>
							<th class="axis-magazine-adm-wid-33"><h3><?php esc_html_e('Axis Magazine Pro', 'axis-magazine'); ?></h3></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="feature-items-title">
								<h3><?php esc_html_e('Theme Price', 'axis-magazine'); ?></h3>
							</td>
							<td class="free-btn"><?php esc_html_e('Free', 'axis-magazine'); ?></td>
							<td>
								<a class="pro-link-btn" href="<?php echo esc_url('http://zidithemes.tumblr.com/post/189552213279/axis-magazine-pro'); ?>" target="_blank">
									<?php esc_html_e('View Pricing', 'axis-magazine'); ?>
								</a>
							</td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Responsive Design', 'axis-magazine'); ?></h3></td>
							<td><span class="dashicons dashicons-yes"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Number Of Feature Section Styles', 'axis-magazine'); ?></h3></td>
							<td><span class="number-index-styles"><?php esc_html_e('1', 'axis-magazine'); ?></span></td>
							<td><span class="number-index-styles"><?php esc_html_e('7', 'axis-magazine'); ?></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Portfolio Page Template', 'axis-magazine'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Testimonials Page Template', 'axis-magazine'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Team Page Template', 'axis-magazine'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Gallery Page Template', 'axis-magazine'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Pricing Page Template', 'axis-magazine'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Number Of Index Page Styles', 'axis-magazine'); ?></h3></td>
							<td><span class="number-index-styles"><?php esc_html_e('6', 'axis-magazine'); ?></span></td>
							<td><span class="number-index-styles"><?php esc_html_e('14', 'axis-magazine'); ?></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Full Width Template', 'axis-magazine'); ?></h3></td>
							<td><span class="dashicons dashicons-yes"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Footer Credits Options', 'axis-magazine'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Color Options', 'axis-magazine'); ?></h3></td>
							<td><span class="dashicons dashicons-yes"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Gutenberg Compatible', 'axis-magazine'); ?></h3></td>
							<td><span class="dashicons dashicons-yes"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Elementor Compatible', 'axis-magazine'); ?></h3></td>
							<td><span class="dashicons dashicons-yes"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Major Browser Compatible', 'axis-magazine'); ?></h3></td>
							<td><span class="dashicons dashicons-yes"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature-items-title"><h3><?php esc_html_e('Woocommerce Compatible', 'axis-magazine'); ?></h3></td>
							<td><span class="dashicons dashicons-yes"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class=""></td>
							<td class=""></td>
							<td class="go-pro">
								<span class="">
									<a class="link" href="<?php echo esc_url('http://zidithemes.tumblr.com/post/189552213279/axis-magazine-pro'); ?>" target="_blank">
										<?php esc_html_e('View Pro', 'axis-magazine'); ?>
									</a>
								</span>
							</td>
						</tr>
					</tbody>
				</table>
			</div>




		</div>
	</div>
	<?php
}
?>
