<?php

function aaron_highlights() {
/* 
* Frontpage Highlights
*/

	if(get_theme_mod( 'aaron_hide_highlight' ) =="" ){

		if ( current_user_can( 'edit_theme_options' ) ) {

			$aaron_show_fallback=array();
			//The example Highlights should only show if the user is logged in and the highlights have not been edited.

			for ($i = 1; $i < 10; $i++) {
				if (get_theme_mod( 'aaron_highlight' . $i . '_headline' ) OR get_theme_mod( 'aaron_highlight' . $i . '_text' ) OR get_theme_mod( 'aaron_highlight' . $i . '_image' ) OR get_theme_mod( 'aaron_highlight' . $i . '_icon' ) ){
					array_push($aaron_show_fallback,"no");
				}else{
					array_push($aaron_show_fallback,"yes");
				}
			}

			if (! in_array("no", $aaron_show_fallback)) {
			 		echo '<div class="highlights">';
					echo '<i class="dashicons dashicons-admin-generic"></i>';
					echo '<a class="hll1" href="' . esc_url( home_url( '/wp-admin/customize.php' ) ) . '">';
					echo '<h2>' . __( 'Easy setup', 'aaron') . '</h2>';
					echo '<p>' . __( 'You will find all your options in the <i>Customizer</i> and setup help under <i>Appearance</i>.', 'aaron') .  '</p>';
					echo '</a>';
					echo '</div>';

					echo '<div class="highlights">';
					echo '<i class="dashicons dashicons-smartphone"></i>';
					echo '<a class="hll2" href="' . esc_url( home_url( '/wp-admin/customize.php' ) ) . '">';
					echo '<h2>' . __( 'Accessible and responsive', 'aaron' ) . '</h2>';
					echo '<p>' . __( 'Keyboard friendly menus, aria roles and helpful screen reader texts', 'aaron' ) . '</p>';
					echo '</a>';
					echo '</div>';

					echo '<div class="highlights">';
					echo '<i class="dashicons dashicons-admin-plugins"></i>';
					echo '<a  class="hll3" href="' . esc_url( home_url( '/wp-admin/customize.php' ) ) . '">';
					echo '<h2>' . __( 'Jetpack compatible','aaron' ) . '</h2>';
					echo '<p>' . __( 'Install Jetpack for additional featured content, portfolio, logo and more','aaron' ) . '</p>';
					echo '</a>';
					echo '</div>';
			}
		}

	for ($i = 1; $i < 10; $i++) {

		if (get_theme_mod( 'aaron_highlight' . $i . '_headline' ) OR get_theme_mod( 'aaron_highlight' . $i . '_text' ) OR get_theme_mod( 'aaron_highlight' . $i . '_icon' ) AND get_theme_mod( 'aaron_highlight' . $i . '_icon' ) <>"no-icon" OR get_theme_mod( 'aaron_highlight' . $i . '_image' ) ){

			echo '<div class="highlights" style="background:' . get_theme_mod( 'aaron_highlight' . $i . '_bgcolor', '#fafafa' ) . ';">';
								
					if (get_theme_mod( 'aaron_highlight' . $i . '_icon' ) <>"" AND get_theme_mod( 'aaron_highlight' . $i . '_icon' ) <>"no-icon" AND get_theme_mod( 'aaron_highlight' . $i . '_image' ) ==""){
						echo '<i class="dashicons '. esc_attr( get_theme_mod( 'aaron_highlight' . $i . '_icon' ) ). '"  style="color:' . get_theme_mod( 'aaron_highlight' . $i . '_textcolor', '#333333' ) . ';"></i>';
					}

					if (get_theme_mod( 'aaron_highlight' . $i . '_image' ) <>"" ){
						echo '<img src="' . esc_url( get_theme_mod( 'aaron_highlight' . $i . '_image' ) ) . '">';
					}

					if (get_theme_mod( 'aaron_highlight' . $i . '_link' ) <>"" ) {
						echo '<a href="' . esc_url( get_theme_mod( 'aaron_highlight' . $i . '_link' ) ) . '">';
					}
					
					if (get_theme_mod( 'aaron_highlight' . $i . '_headline' ) <>"" ){
						echo '<h2 style="color:' . get_theme_mod( 'aaron_highlight' . $i . '_textcolor', '#333333' ) . ';">' . esc_html(  get_theme_mod( 'aaron_highlight' . $i . '_headline' ) ) . '</h2>';
					}
						
					if (get_theme_mod( 'aaron_highlight' . $i . '_text' ) <>"" ){
						echo '<p style="color:' . get_theme_mod( 'aaron_highlight' . $i . '_textcolor', '#333333' ) . ';">' . esc_html(  get_theme_mod( 'aaron_highlight' . $i . '_text' ) ) . '</p>';
					}
						
					if (get_theme_mod( 'aaron_highlight' . $i . '_link' ) <>"" ) {
						echo '</a>';
					}

			echo '</div>';
		}

	}


	}
}