<?php 
/** 
 *
 * @package mwsmall
 */
function mwsmall_theme_info_menu() {

	// Get theme details.
	$theme = wp_get_theme();

	add_theme_page(
		sprintf( esc_html__( 'Welcome to %1$s %2$s', 'mw-small' ), $theme->display( 'Name' ), $theme->display( 'Version' ) ),
		esc_html__( 'Theme Info', 'mw-small' ),
		'edit_theme_options',
		'mwsmall',
		'mwsmall_theme_info'
	);
}
add_action( 'admin_menu', 'mwsmall_theme_info_menu' );

function mwsmall_theme_info() {
	
	// Get theme details.
	$theme = wp_get_theme();
	?>
	<div class="wrap mw-themes-info">
		<h2><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'mw-small' ), $theme->display( 'Name' ), $theme->display( 'Version' ) ); ?></h2>
		
		<hr>
		<div class="theme-info-links clearfix">
			<p><strong><?php esc_html_e( 'Theme Links', 'mw-small' ); ?>:</strong>
				<a href="<?php echo esc_url( 'http://mwthemes.net/portfolio/mw-small-blog-responsive-theme/?utm_source=theme-info&utm_medium=textlink&utm_campaign=mwsmall&utm_content=theme-page' ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'mw-small' ); ?></a>
				<a href="<?php echo esc_url( 'http://demo.mwthemes.net/mw-small/' ); ?>" target="_blank"><?php esc_html_e( 'Theme Demo', 'mw-small' ); ?></a>
				<a href="<?php echo esc_url( 'http://mwthemes.net/wordpress-themes/?utm_source=theme-info&utm_medium=textlink&utm_campaign=mwsmall&utm_content=morethemes' ); ?>" target="_blank"><?php esc_html_e( 'More Themes', 'mw-small' ); ?></a>
				<a href="<?php echo esc_url( 'https://wordpress.org/support/theme/mw-small/reviews/?filter=5' ); ?>" target="_blank"><?php esc_html_e( 'Rate this theme', 'mw-small' ); ?></a>
			</p>
		</div>
		<hr>
		<div class="theme-info-box clearfix">
			<div class="box-50">
				<h3><?php esc_html_e('Theme Options', 'mw-small'); ?></h3>
				<p class="about"><?php printf(esc_html__('Click "Customize" to open the Customizer.',  'mw-small'), $theme->display( 'Name' ) ); ?></p>
				<p>
					<a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary">
					<?php esc_html_e('Customize Theme', 'mw-small'); ?></a>
				</p>
				
				<h3><?php esc_html_e('Theme Documentation', 'mw-small'); ?></h3>
				<p>
					<?php esc_html_e( 'Please check our theme documentation for detailed information on how to setup and use theme.', 'mw-small' ); ?>
				</p>
				<p>
					<a href="<?php echo esc_url( 'http://mwthemes.net/documents-mw-small/?utm_source=theme-info&utm_medium=button&utm_campaign=mwsmall&utm_content=document' ); ?>" class="button"><?php esc_html_e('Theme Documentation', 'mw-small'); ?></a>
				</p>
			</div>
			<div class="box-50">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/inc/images/mwsmall-theme-wordpress-blog.jpg" />
			</div>
		</div>

		<div class="theme-more-img theme-browser clearfix">
			<div class="theme">
				<div class="theme-screenshot">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/inc/images/mwsmall-style-1.jpg" alt="">
				</div>
				<span class="more-details">
					<a href="<?php echo esc_url( 'http://mwthemes.net/portfolio/mw-small-pro/?utm_source=theme-info&utm_medium=link&utm_campaign=mwsmall&utm_content=img1' ); ?>" target="_blank"><?php esc_html_e( 'Theme Details', 'mw-small' ); ?></a></span>
				<div class="theme-id-container">
						<h2 class="theme-name"><?php esc_html_e( 'Theme Fashion', 'mw-small' ); ?></h2>
						<div class="theme-actions">	
							<a class="button button-primary customize hide-if-no-customize" href="<?php echo get_admin_url(); ?>customize.php?theme=mw-small"><?php esc_html_e( 'Customize', 'mw-small' ); ?></a>
					</div>
				</div>		
			</div>
			<div class="theme">
				<div class="theme-screenshot">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/inc/images/mwsmall-style-2.jpg" alt="">
				</div>
				<span class="more-details">
					<a href="<?php echo esc_url( 'http://mwthemes.net/portfolio/mw-small-pro/?utm_source=theme-info&utm_medium=link&utm_campaign=mwsmall&utm_content=img2' ); ?>" target="_blank"><?php esc_html_e( 'Theme Details', 'mw-small' ); ?></a></span>
				<div class="theme-id-container">
						<h2 class="theme-name"><?php esc_html_e( 'Theme Tech', 'mw-small' ); ?></h2>
						<div class="theme-actions">	
							<a class="button button-primary customize hide-if-no-customize" href="<?php echo get_admin_url(); ?>customize.php?theme=mw-small"><?php esc_html_e( 'Customize', 'mw-small' ); ?></a>
					</div>
				</div>
			</div>
			<div class="theme">
				<div class="theme-screenshot">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/inc/images/mwsmall-style-3.jpg" alt="">
				</div>
				<span class="more-details">
					<a href="<?php echo esc_url( 'http://mwthemes.net/portfolio/mw-small-pro/?utm_source=theme-info&utm_medium=link&utm_campaign=mwsmall&utm_content=img3' ); ?>" target="_blank"><?php esc_html_e( 'Theme Details', 'mw-small' ); ?></a></span>
				<div class="theme-id-container">
						<h2 class="theme-name"><?php esc_html_e( 'Theme Recipes', 'mw-small' ); ?></h2>
						<div class="theme-actions">	
							<a class="button button-primary customize hide-if-no-customize" href="<?php echo get_admin_url(); ?>customize.php?theme=mw-small"><?php esc_html_e( 'Customize', 'mw-small' ); ?></a>
					</div>
				</div>
			</div>
			<div class="theme">
				<div class="theme-screenshot">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/inc/images/mwsmall-style-4.jpg" alt="">
				</div>
				<span class="more-details">
					<a href="<?php echo esc_url( 'http://mwthemes.net/portfolio/mw-small-pro/?utm_source=theme-info&utm_medium=link&utm_campaign=mwsmall&utm_content=img4' ); ?>" target="_blank"><?php esc_html_e( 'Theme Details', 'mw-small' ); ?></a></span>
				<div class="theme-id-container">
						<h2 class="theme-name"><?php esc_html_e( 'Theme Personal Blog', 'mw-small' ); ?></h2>
						<div class="theme-actions">	
							<a class="button button-primary customize hide-if-no-customize" href="<?php echo get_admin_url(); ?>customize.php?theme=mw-small"><?php esc_html_e( 'Customize', 'mw-small' ); ?></a>
					</div>
				</div>
			</div>
			<div class="theme">
				<div class="theme-screenshot">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/inc/images/mwsmall-style-5.jpg" alt="">
				</div>
				<span class="more-details">
					<a href="<?php echo esc_url( 'http://mwthemes.net/portfolio/mw-small-pro/?utm_source=theme-info&utm_medium=link&utm_campaign=mwsmall&utm_content=img5' ); ?>" target="_blank"><?php esc_html_e( 'Theme Details', 'mw-small' ); ?></a></span>
				<div class="theme-id-container">
						<h2 class="theme-name"><?php esc_html_e( 'Theme Travel', 'mw-small' ); ?></h2>
						<div class="theme-actions">	
							<a class="button button-primary customize hide-if-no-customize" href="<?php echo get_admin_url(); ?>customize.php?theme=mw-small"><?php esc_html_e( 'Customize', 'mw-small' ); ?></a>
					</div>
				</div>
			</div>
			<div class="theme">
				<div class="theme-screenshot">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/inc/images/mwsmall-style-6.jpg" alt="">
				</div>
				<span class="more-details">
					<a href="<?php echo esc_url( 'http://mwthemes.net/portfolio/mw-small-pro/?utm_source=theme-info&utm_medium=link&utm_campaign=mwsmall&utm_content=img6' ); ?>" target="_blank"><?php esc_html_e( 'Theme Details', 'mw-small' ); ?></a></span>
				<div class="theme-id-container">
						<h2 class="theme-name"><?php esc_html_e( 'Theme Personal Blog', 'mw-small' ); ?></h2>
						<div class="theme-actions">	
							<a class="button button-primary customize hide-if-no-customize" href="<?php echo get_admin_url(); ?>customize.php?theme=mw-small"><?php esc_html_e( 'Customize', 'mw-small' ); ?></a>
					</div>
				</div>
			</div>
			<div class="theme">
				<div class="theme-screenshot">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/inc/images/mwsmall-style-7.jpg" alt="">
				</div>
				<span class="more-details">
					<a href="<?php echo esc_url( 'http://mwthemes.net/portfolio/mw-small-pro/?utm_source=theme-info&utm_medium=link&utm_campaign=mwsmall&utm_content=img7' ); ?>" target="_blank"><?php esc_html_e( 'Theme Details', 'mw-small' ); ?></a></span>
				<div class="theme-id-container">
						<h2 class="theme-name"><?php esc_html_e( 'Theme Personal Blog', 'mw-small' ); ?></h2>
						<div class="theme-actions">	
							<a class="button button-primary customize hide-if-no-customize" href="<?php echo get_admin_url(); ?>customize.php?theme=mw-small"><?php esc_html_e( 'Customize', 'mw-small' ); ?></a>
					</div>
				</div>
			</div>
			<div class="theme">
				<div class="theme-screenshot">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/inc/images/mwsmall-style-8.jpg" alt="">
				</div>
				<span class="more-details">
					<a href="<?php echo esc_url( 'http://mwthemes.net/portfolio/mw-small-pro/?utm_source=theme-info&utm_medium=link&utm_campaign=mwsmall&utm_content=img8' ); ?>" target="_blank"><?php esc_html_e( 'Theme Details', 'mw-small' ); ?></a></span>
				<div class="theme-id-container">
						<h2 class="theme-name"><?php esc_html_e( 'Theme Personal Blog', 'mw-small' ); ?></h2>
						<div class="theme-actions">	
							<a class="button button-primary customize hide-if-no-customize" href="<?php echo get_admin_url(); ?>customize.php?theme=mw-small"><?php esc_html_e( 'Customize', 'mw-small' ); ?></a>
					</div>
				</div>
			</div>
			<div class="theme">
				<div class="theme-screenshot">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/inc/images/mwsmall-style-9.jpg" alt="">
				</div>
				<span class="more-details">
					<a href="<?php echo esc_url( 'http://mwthemes.net/portfolio/mw-small-pro/?utm_source=theme-info&utm_medium=link&utm_campaign=mwsmall&utm_content=img9' ); ?>" target="_blank"><?php esc_html_e( 'Theme Details', 'mw-small' ); ?></a></span>
				<div class="theme-id-container">
						<h2 class="theme-name"><?php esc_html_e( 'Theme Personal Blog', 'mw-small' ); ?></h2>
						<div class="theme-actions">	
							<a class="button button-primary customize hide-if-no-customize" href="<?php echo get_admin_url(); ?>customize.php?theme=mw-small"><?php esc_html_e( 'Customize', 'mw-small' ); ?></a>
					</div>
				</div>
			</div>
		</div>
		
		<hr class="clearfix">
		
		<p>
			<?php printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme - %3$s', 'mw-small' ),
			$theme->display( 'Name' ),
			'<a target="_blank" href="' . __( 'http://mwthemes.net/', 'mw-small' ) . '?utm_source=theme-info&utm_medium=footer&utm_campaign=mwsmall" title="MWThemes">MWThemes</a>',
			'<a target="_blank" href="' . __( 'https://wordpress.org/support/theme/mw-small/reviews/?filter=5', 'mw-small' ) . '" title="' . esc_attr__( 'Theme MW Small Review', 'mw-small' ) . '">' . esc_html__( 'rate it', 'mw-small' ) . '</a>'); ?>
		</p>
	</div>
	<style type="text/css">
	.mw-themes-info .clearfix {
		clear: both;
	}
	.mw-themes-info {
		max-width: 1000px;
	}
	.box-50 {
		width: 49%;
		float:  left;
		margin-right: 1%;
	}
	.mw-themes-info img {
		width: 100%;
	}
	.theme-info-links strong,
	.theme-info-links a {
		font-size: 16px;
		margin-right: 10px;
	}
	.theme-more-img {
		padding-top: 30px;
	}
	.theme-browser .theme:hover .more-details {
		opacity: 1;
	}
	.theme-browser .theme:hover .theme-screenshot img {
		opacity: .4;
	}
	.theme-more-img .theme-screenshot {
		height: 380px;
	}
	.theme-more-img .theme {
		width: 31%;
		margin: 0 3% 3% 0;
	}
	.theme-more-img .theme:nth-child(3n) {
		margin-right: 0;
	}
	.theme-more-img .theme:nth-child(4n) {
		margin-right: 3%;
	}

	.theme-browser .theme .more-details a {
		color: #fff;
		font-size: 15px;
		text-shadow: 0 1px 0 rgba(0,0,0,.6);
		-webkit-font-smoothing: antialiased;
		font-weight: 600;
		text-decoration: none;
	}
	</style>
	<?php
}