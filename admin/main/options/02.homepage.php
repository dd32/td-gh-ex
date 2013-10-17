<?php
/**
 * Homepage functions.
 *
 * @package ThinkUpThemes
 */

//----------------------------------------------------------------------------------
//	ENABLE HOMEPAGE SLIDER
//----------------------------------------------------------------------------------

// Add Slider - Homepage
function thinkup_input_sliderhome() {
global $thinkup_homepage_sliderswitch;
global $thinkup_homepage_slidername;

	if ( is_home() or site_url( '/' ) == thinkup_url_current() ) {
		if ( $thinkup_homepage_sliderswitch == '0' or empty( $thinkup_homepage_sliderswitch ) or empty( $thinkup_homepage_slidername ) ) {
			echo '';
		} else {
			echo	'<div id="slider"><div id="slider-core">',
				do_shortcode( $thinkup_homepage_slidername ),
				'</div></div>';
		}
	}
}

// Add Slider - Inner Page
function thinkup_input_sliderpage() {
global $post;
$_thinkup_meta_slider = get_post_meta( $post->ID, '_thinkup_meta_slider', true );
$_thinkup_meta_slidername = get_post_meta( $post->ID, '_thinkup_meta_slidername', true );

	if ( ! is_home() and site_url( '/' ) !== thinkup_url_current() and $_thinkup_meta_slider == 'on' ) {

		echo	'<div id="slider"><div id="slider-core">',
				do_shortcode( $_thinkup_meta_slidername ),
				'</div></div>';
	}
}


//----------------------------------------------------------------------------------
//	ENABLE HOMEPAGE BLOG - PREMIUM FEATURE
//----------------------------------------------------------------------------------


//----------------------------------------------------------------------------------
//	HOMEPAGE TEXT - PREMIUM FEATURE
//----------------------------------------------------------------------------------


//----------------------------------------------------------------------------------
//	ADDITIONAL HOMEPAGE TEXT - PREMIUM FEATURE
//----------------------------------------------------------------------------------


//----------------------------------------------------------------------------------
//	CALL TO ACTION - INTRO
//----------------------------------------------------------------------------------

function thinkup_input_ctaintro() {
global $thinkup_homepage_introswitch;
global $thinkup_homepage_introaction;
global $thinkup_homepage_introactionteaser;
global $thinkup_homepage_introactionbutton;
global $thinkup_homepage_introactionlink;
global $thinkup_homepage_introactionpage;
global $thinkup_homepage_introactioncustom;

	if ( $thinkup_homepage_introswitch == '1' and ( is_home() or site_url( '/' ) == thinkup_url_current() ) and ! empty( $thinkup_homepage_introaction ) ) {
		echo '<div id="introaction"><div id="introaction-core">';
		if (empty( $thinkup_homepage_introactionbutton ) ) {
			if ( empty( $thinkup_homepage_introactionteaser ) ) {
				echo	'<div class="action-text">
						<h3>' . $thinkup_homepage_introaction . '</h3>
						</div>';
				} else {
				echo	'<div class="action-text action-teaser">
						<h3>' . $thinkup_homepage_introaction . '</h3>
						<p>' . $thinkup_homepage_introactionteaser . '</p>
						</div>';
				}
		} else if ( ! empty( $thinkup_homepage_introactionbutton ) ) {
			if ( empty( $thinkup_homepage_introactionteaser ) ) {
				echo	'<div class="action-text three_fourth">
						<h3>' . $thinkup_homepage_introaction . '</h3>
						</div>';
				} else {
				echo	'<div class="action-text three_fourth action-teaser">
						<h3>' . $thinkup_homepage_introaction . '</h3>
						<p>' . $thinkup_homepage_introactionteaser . '</p>
						</div>';
				}
			if ( $thinkup_homepage_introactionlink == 'option1' ) {
				echo '<div class="action-button one_fourth last"><a href="' . get_page_link( $thinkup_homepage_introactionpage ) . '"><h4 class="themebutton">';
				echo $thinkup_homepage_introactionbutton;
				echo '</h4></a></div>';
			} else if ( $thinkup_homepage_introactionlink == 'option2' ) {
				echo '<div class="action-button one_fourth last"><a href="' . $thinkup_homepage_introactioncustom . '"><h4 class="themebutton">';
				echo $thinkup_homepage_introactionbutton;
				echo '</h4></a></div>';
			} else if ( $thinkup_homepage_introactionlink == 'option3' or empty( $thinkup_homepage_introactionlink ) ) {
				echo '<div class="action-button one_fourth last"><h4 class="themebutton">';
				echo $thinkup_homepage_introactionbutton;
				echo '</h4></div>';
			}
		}
		echo '</div></div>';
	}
}


?>