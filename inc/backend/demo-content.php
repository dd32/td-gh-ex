<?php
	ob_start();
?>
	<div class="ot-center ot-error" style="display:none;">
		<h2><?php esc_html_e("Error", 'asterion');?></h2>
		<p><?php esc_html_e("Something went wrong...", 'asterion');?></p>
	</div>


	<div class="ot-center ot-import-font-page"<?php echo ( get_theme_mod('asterion_front_page_imported') == "1" ) ? ' style="display:none;"' : false ; ?>>

		<h1><?php esc_html_e("Import front page settings", 'asterion');?></h1>

		<p><?php esc_html_e("Here you can easy import the front page settings, so it would look like our demo page.", 'asterion');?></p>
		<p><?php esc_html_e("Before importing these settings, please make sure that you have done these steps:", 'asterion');?></p>
		<ol>
			<li class="<?php echo( get_option( 'show_on_front' ) == "page" ) ? 'ot-done' : 'ot-required'; ?>"><?php echo sprintf( esc_html__( 'Set up front page in', 'asterion' ).' %s'.esc_html__( 'Settings', 'asterion' ).'%s -> %s'.esc_html__( 'Reading', 'asterion' ).'%s -> '.esc_html__( 'Front page displays', 'asterion' ), '<a href="'.esc_url(admin_url( '/customize.php' )).'">', '</a>', '<a href="'.esc_url(admin_url( '/options-reading.php' )).'">', '</a>' ); ?></li>
			<li class="<?php echo( asterion()->panel->check_recomended_plugins() ) ? 'ot-done' : 'ot-required'; ?>"><?php echo sprintf( esc_html__( 'Install and activate all', 'asterion' ).' %s'.esc_html__( 'recomended plugins', 'asterion' ).'%s ', '<a href="'.esc_url(admin_url( '/themes.php?page=tgmpa-install-plugins' )).'">','</a>' ); ?></li>
			<li class="<?php echo( get_option( 'jetpack_portfolio' ) == "1" && get_option( 'jetpack_testimonial' ) == "1") ? 'ot-done' : 'ot-required'; ?>"><?php esc_html_e("Enable JetPack custom post types - Portfolio and Testimonials", 'asterion');?></li>
		</ol>
		<?php
			$button_class = ( asterion()->panel->check_recomended_plugins() && get_theme_mod('asterion_front_page_imported') != "1" && get_option( 'show_on_front' ) == "page" && get_option( 'jetpack_portfolio' ) == "1" && get_option( 'jetpack_testimonial' ) == "1" ) ? 'ot-active' : 'ot-disabled';

		?>
		<p><a href="#" class="ot-import-front-page button button-primary <?php echo esc_attr($button_class);?>" data-importing="<?php esc_attr_e("Importing...", 'asterion');?>" data-imported="<?php esc_attr_e("Imported", 'asterion');?>"><?php esc_html_e("Import Front Page", 'asterion');?></a></p>
	</div>

	<div class="ot-center ot-imported-font-page"<?php echo ( get_theme_mod('asterion_front_page_imported') != "1" ) ? ' style="display:none;"' : ' style="display:block;"' ; ?>>
		<h1><?php esc_html_e("Import front page settings", 'asterion');?></h1>

		<p><?php esc_html_e("Front page settings are aleady imported.", 'asterion');?></p>
		<p><?php echo sprintf( esc_html__( "Isn't it good enought? Then feel free to download also the post, portfolio and testimonial demo content here: ", 'asterion' ).' %s<strong>'.esc_html__( 'Download', 'asterion' ).'</strong>%s '.esc_html__( "Import it using the default WordPress importer plugin, and make sure you have connected to the JetPack plugin.", 'asterion' ), '<a href="http://orange-themes.net/demo/asterion/asterion.xml" target="_blank">', '</a>'); ?></p>

	</div>

	<hr>

	<div class="ot-center">
		<h1><?php esc_html_e("Import sidebar widgets", 'asterion');?></h1>
		<p><?php esc_html_e("Here you can easy import all page sidebar widgets, including front page widgets.", 'asterion');?></p>
		<p><a href="#" class="ot-import-widgets button button-primary" data-importing="<?php esc_attr_e("Importing...", 'asterion');?>" data-imported="<?php esc_attr_e("Imported", 'asterion');?>"><?php esc_html_e("Import Widgets", 'asterion');?></a></p>
	</div>

	<hr>

	<div class="ot-center">
		<h1><?php esc_html_e("Reset theme settings", 'asterion');?></h1>
		<p><?php esc_html_e("Use this if you want ro reset all theme custom settings.", 'asterion');?></p>
		<p>
			<a href="#" class="ot-setting-reset button button-primary" data-reseting="<?php esc_attr_e("Reseting...", 'asterion');?>" data-reseted="<?php esc_attr_e("Reseted", 'asterion');?>">
				<?php esc_html_e("Reset", 'asterion');?>
			</a>
		</p>

	</div>


<?php
	$content = ob_get_contents();
	ob_end_clean();

	$section_content = array(
		array(
			"type" => "navigation",
			"name" => esc_html__("Demo",'asterion'),
			"slug" => "demo_content",
			"class" => "ot-actions"
		),
		array(
			"type" => "section_start",
			"slug" => "demo_content"
		),

		array(
			"type" => "section_content",
			"content" => $content
		),

		array(
			"type" => "section_end"
		),


	);

	asterion()->panel->add_options( $section_content );