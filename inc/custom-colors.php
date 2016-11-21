<?php

function aza_preloader_styles() {
		$preloader_color = get_theme_mod('aza_preloader_color','#fc535f');
		$preloader_background_color = get_theme_mod('aza_preloader_background_color','#333333');
		$navbar_color = get_theme_mod('aza_navbar_color','rgba(0, 0, 0, 0.75)');
		$contact_background_color = get_theme_mod('aza_contact_background','rgba(0, 0, 0, 0.75)');
		$aza_hero_background = get_theme_mod('aza_hero_color', 'rgba(0, 0, 0, 0.25)');
		$aza_button_color_1 = get_theme_mod('aza_button_color_1', '#3399df');
		$aza_button_color_2 = get_theme_mod('aza_button_color_2', '#fc535f');
		$aza_button_text_color_1 = get_theme_mod('aza_button_text_color_1', '#ffffff');
		$aza_button_text_color_2 = get_theme_mod('aza_button_text_color_2', '#ffffff');
		$parallax_background = get_theme_mod('aza_parallax_background', get_template_directory_uri() . '/images/parallax-background.jpg');
		$parallax_layer_1 = get_theme_mod('aza_parallax_layer_1', get_template_directory_uri() . '/images/parallax-layer1.png');
		$parallax_layer_2 = get_theme_mod('aza_parallax_layer_2', get_template_directory_uri() . '/images/parallax-layer2.png');
		$aza_ribbon_background_color = get_theme_mod ('aza_ribbon_background_color', 'rgba(0, 69, 97, 0.35)');
		$ribbon_button_color = get_theme_mod ('aza_ribbon_button_color', '#fc535f');
		$ribbon_button_text_color = get_theme_mod  ('aza_ribbon_button_text_color','#ffffff');
		$ribbon_text_color = get_theme_mod ('aza_ribbon_text_color', '#ffffff');
		$header_image = get_header_image();

		echo "<style>

						body.home.page { background-image: url(". esc_url($header_image) ."); }

						.loader-section, .sk-folding-cube .sk-cube:before { background-color:" . esc_attr($preloader_background_color) . "; }

						#loader .sk-rotating-plane, #loader .sk-child, #loader .sk-cube, #loader .spinner > div { background-color:" . esc_attr($preloader_color) . "; }

						.sticky-navigation-open .sticky-navigation { background-color: " . esc_attr($navbar_color) . "; }

						section#contact { background-color: " . esc_attr($contact_background_color) . "; }


						.header-image { background-color: " . esc_attr($aza_hero_background) . "; }

						.first-header-button { background-color: " . esc_attr($aza_button_color_1) . "; color:" . esc_attr($aza_button_text_color_1) . "; }

						.second-header-button { background-color: " . esc_attr($aza_button_color_2) . "; color:" . esc_attr($aza_button_text_color_2) . "; }

						#parallax .parallax-background { background-image: url( " . esc_url($parallax_background) . "); }

						#parallax .parallax-layer-1 { background-image: url( " . esc_url($parallax_layer_1) . "); }

						#parallax .parallax-layer-2 { background-image: url( " . esc_url($parallax_layer_2) . "); }

						#ribbon { background-color: ". esc_attr($aza_ribbon_background_color) ."; }

						#ribbon h3 { color: " . esc_attr($ribbon_text_color) . "; }

						#ribbon button { color: " . esc_attr($ribbon_button_text_color) . "; background-color: " . esc_attr($ribbon_button_color) . "; }


					</style>";
}
add_action('wp_head', 'aza_preloader_styles', 100);

?>
