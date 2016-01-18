<?php

function aaron_highlights() {
/* 
* Frontpage Highlights
*/
	if( !get_theme_mod( 'aaron_hide_highlight' ) ){
		for ($i = 1; $i < 10; $i++) {
			//Is this highlight visisble?
			if ( !get_theme_mod( 'aaron_highlight' . $i . '_hide' ) ){
			//Now check if there is any actual content to show:
				if ( get_theme_mod( 'aaron_highlight' . $i . '_headline' ) OR get_theme_mod( 'aaron_highlight' . $i . '_text' ) 
					OR get_theme_mod( 'aaron_highlight' . $i . '_icon' ) AND get_theme_mod( 'aaron_highlight' . $i . '_icon' ) <>"no-icon" 
					OR get_theme_mod( 'aaron_highlight' . $i . '_image' ) ){
					echo '<div class="highlights" style="background:' . get_theme_mod( 'aaron_highlight' . $i . '_bgcolor', '#fafafa' ) . ';">';

					//If there is an icon, show it unless there is also an image, then the image will replace the icon.				
					if ( get_theme_mod( 'aaron_highlight' . $i . '_icon' ) AND get_theme_mod( 'aaron_highlight' . $i . '_icon' ) <>"no-icon" AND !get_theme_mod( 'aaron_highlight' . $i . '_image' ) ){
						echo '<i aria-hidden="true" class="dashicons '. esc_attr( get_theme_mod( 'aaron_highlight' . $i . '_icon' ) ). '"  style="color:' . esc_attr( get_theme_mod( 'aaron_highlight' . $i . '_textcolor', '#333333' ) ) . ';"></i>';
					}
					//If there is an image, show it :)
					if ( get_theme_mod( 'aaron_highlight' . $i . '_image' ) ){
						echo '<img src="' . esc_url( get_theme_mod( 'aaron_highlight' . $i . '_image' ) ) . '" class="highlight-img"' ;
						//include the alt attribute
						if ( get_theme_mod( 'aaron_highlight' . $i . '_alt' ) <>"" ){
							echo 'alt="' . esc_attr( get_theme_mod( 'aaron_highlight' . $i . '_alt' ) ) . '" >' ;
						}else{
							echo '>';
						}
					}
					if (get_theme_mod( 'aaron_highlight' . $i . '_link' ) <>"" ) {
						echo '<a href="' . esc_url( get_theme_mod( 'aaron_highlight' . $i . '_link' ) ) . '">';
					}	
					if (get_theme_mod( 'aaron_highlight' . $i . '_headline' ) <>"" ){
						echo '<h2 style="color:' . esc_attr( get_theme_mod( 'aaron_highlight' . $i . '_textcolor', '#333333' ) ). ';">' . esc_html(  get_theme_mod( 'aaron_highlight' . $i . '_headline' ) ) . '</h2>';
					}			
					if (get_theme_mod( 'aaron_highlight' . $i . '_text' ) <>"" ){
						echo '<p style="color:' . esc_attr( get_theme_mod( 'aaron_highlight' . $i . '_textcolor', '#333333' ) ). ';">' . esc_html(  get_theme_mod( 'aaron_highlight' . $i . '_text' ) ) . '</p>';
					}	
					if (get_theme_mod( 'aaron_highlight' . $i . '_link' ) <>"" ) {
						echo '</a>';
					}

					echo '</div>';
				}
			}
		}//end for...
	}
}