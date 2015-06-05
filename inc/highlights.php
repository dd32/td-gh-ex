<?php

function aaron_highlights() {
/* 
* Frontpage Highlights
*/

if(get_theme_mod( 'aaron_hide_highlight' ) =="" ){

	for ($i = 1; $i < 10; $i++) {

		if (get_theme_mod( 'aaron_highlight' . $i . '_headline' ) OR get_theme_mod( 'aaron_highlight' . $i . '_text' ) OR get_theme_mod( 'aaron_highlight' . $i . '_icon' ) AND get_theme_mod( 'aaron_highlight' . $i . '_icon' ) <>"no-icon" OR get_theme_mod( 'aaron_highlight' . $i . '_image' ) ){

			echo '<div class="highlights" style="background:' . get_theme_mod( 'aaron_highlight' . $i . '_bgcolor', '#fafafa' ) . ';">';
								
					if (get_theme_mod( 'aaron_highlight' . $i . '_icon' ) <>"" AND get_theme_mod( 'aaron_highlight' . $i . '_icon' ) <>"no-icon" AND get_theme_mod( 'aaron_highlight' . $i . '_image' ) ==""){
						echo '<i aria-hidden="true" class="dashicons '. esc_attr( get_theme_mod( 'aaron_highlight' . $i . '_icon' ) ). '"  style="color:' . get_theme_mod( 'aaron_highlight' . $i . '_textcolor', '#333333' ) . ';"></i>';
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