<?php

function aaron_highlights() {
/* 
* Frontpage Highlights
*/

if(get_theme_mod( 'aaron_hide_highlight' ) =="" ){

	if (get_theme_mod( 'aaron_highlight1_headline' ) <>"" OR get_theme_mod( 'aaron_highlight1_text' )<>""){

		echo '<div class="highlights1" id="highlight">';
							
				if (get_theme_mod( 'aaron_highlight1_icon' ) <>"" ){
					echo '<i class="dashicons '. esc_attr( get_theme_mod( 'aaron_highlight1_icon' ) ). '"></i>';
				}

				if (get_theme_mod( 'aaron_highlight1_link' ) <>"" ) {
					echo '<a href="' . esc_url( get_theme_mod( 'aaron_highlight1_link' ) ) . '">';
				}
				
				if (get_theme_mod( 'aaron_highlight1_headline' ) <>"" ){
					echo '<h2>' . esc_html(  get_theme_mod( 'aaron_highlight1_headline' ) ) . '</h2>';
				}
					
				if (get_theme_mod( 'aaron_highlight1_text' ) <>"" ){
					echo '<p>' . esc_html(  get_theme_mod( 'aaron_highlight1_text' ) ) . '</p>';
				}
					
				if (get_theme_mod( 'aaron_highlight1_link' ) <>"" ) {
					echo '</a>';
				}

		echo '</div>';

	}else{
		echo '<div class="highlights1" id="highlight">';
		echo '<i class="dashicons dashicons-admin-generic"></i>';
		echo '<a class="hll1" href="' . esc_url( home_url( '/wp-admin/customize.php' ) ) . '">';
		echo '<h2>' . __( 'Easy setup', 'aaron') . '</h2>';
		echo '<p>' . __( 'You will find all your options in the <i>Customizer</i> and setup help under <i>Appearance</i>.', 'aaron') .  '</p>';
		echo '</a>';
		echo '</div>';

	}

	if (get_theme_mod( 'aaron_highlight2_headline' ) <>"" OR get_theme_mod( 'aaron_highlight2_text' ) <>""){

		echo '<div class="highlights2">';
							
				if (get_theme_mod( 'aaron_highlight2_icon' ) <>"" ){
					echo '<i class="dashicons '. esc_attr( get_theme_mod( 'aaron_highlight2_icon' ) ) .'"></i>';
				}

				if (get_theme_mod( 'aaron_highlight2_link' ) <>"" ) {
					echo '<a href="' .esc_url( get_theme_mod( 'aaron_highlight2_link' ) ) . '">';
				}

				if (get_theme_mod( 'aaron_highlight2_headline' ) <>"" ){
					echo '<h2>' . esc_html( get_theme_mod( 'aaron_highlight2_headline' ) ) . '</h2>';
				}
					
				if (get_theme_mod( 'aaron_highlight2_text' ) <>"" ){
					echo '<p>' . esc_html( get_theme_mod( 'aaron_highlight2_text' ) ) . '</p>';
				}
					
				if (get_theme_mod( 'aaron_highlight2_link' ) <>"" ) {
					echo '</a>';
				}

		echo '</div>';

	}else{
		echo '<div class="highlights2">';
		echo '<i class="dashicons dashicons-smartphone"></i>';
		echo '<a class="hll2" href="' . esc_url( home_url( '/wp-admin/customize.php' ) ) . '">';
		echo '<h2>' . __( 'Accessible and responsive', 'aaron' ) . '</h2>';
		echo '<p>' . __( 'Keyboard friendly menus, aria roles and helpful screen reader texts', 'aaron' ) . '</p>';
		echo '</a>';
		echo '</div>';

	}

	if (get_theme_mod( 'aaron_highlight3_headline' ) <>"" OR get_theme_mod( 'aaron_highlight3_text' ) <>""){

		echo '<div class="highlights3">';
					
				if (get_theme_mod( 'aaron_highlight3_icon' ) <>"" ){
					echo '<i class="dashicons '. esc_attr( get_theme_mod( 'aaron_highlight3_icon' ) ) . '"></i>';
				}


				if (get_theme_mod( 'aaron_highlight3_link' ) <>"" ) {
					echo '<a href="' . esc_url( get_theme_mod( 'aaron_highlight3_link' ) ) . '">';
				}

				if (get_theme_mod( 'aaron_highlight3_headline' ) <>"" ){
					echo '<h2>' . esc_html( get_theme_mod( 'aaron_highlight3_headline' ) ) . '</h2>';
				}
					
				if (get_theme_mod( 'aaron_highlight3_text' ) <>"" ){
					echo '<p>' . esc_html( get_theme_mod( 'aaron_highlight3_text' ) ) . '</p>';
				}
					
				if (get_theme_mod( 'aaron_highlight3_link' ) <>"" ) {
					echo '</a>';
				}

		echo '</div>';

	}else{
		echo '<div class="highlights3">';
		echo '<i class="dashicons dashicons-admin-plugins"></i>';
		echo '<a  class="hll3" href="' . esc_url( home_url( '/wp-admin/customize.php' ) ) . '">';
		echo '<h2>' . __( 'Jetpack compatible','aaron' ) . '</h2>';
		echo '<p>' . __( 'Install Jetpack for additional featured content, logo and more','aaron' ) . '</p>';
		echo '</a>';
		echo '</div>';
	}
}
}
?>