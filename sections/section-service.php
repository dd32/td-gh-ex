<?php
/**
 * Service Section
 * 
 * @package App_Landing_Page
 */

$app_landing_page_service_section_title = get_theme_mod( 'app_landing_page_service_section_title' );
$app_landing_page_service_section_content = get_theme_mod( 'app_landing_page_service_section_content' );

$app_landing_page_service_one_title = get_theme_mod( 'app_landing_page_service_one_title' );
$app_landing_page_service_one_content = get_theme_mod( 'app_landing_page_service_one_content' );
$app_landing_page_service_one_fav = get_theme_mod( 'app_landing_page_service_one_fav' );

$app_landing_page_service_two_title = get_theme_mod( 'app_landing_page_service_two_title' );
$app_landing_page_service_two_content = get_theme_mod( 'app_landing_page_service_two_content' );
$app_landing_page_service_two_fav = get_theme_mod( 'app_landing_page_service_two_fav' );

$app_landing_page_service_three_title = get_theme_mod( 'app_landing_page_service_three_title' );
$app_landing_page_service_three_content = get_theme_mod( 'app_landing_page_service_three_content' );
$app_landing_page_service_three_fav = get_theme_mod( 'app_landing_page_service_three_fav' );

$app_landing_page_service_four_title = get_theme_mod( 'app_landing_page_service_four_title' );
$app_landing_page_service_four_content = get_theme_mod( 'app_landing_page_service_four_content' );
$app_landing_page_service_four_fav = get_theme_mod( 'app_landing_page_service_four_fav' );

$app_landing_page_service_five_title = get_theme_mod( 'app_landing_page_service_five_title' );
$app_landing_page_service_five_content = get_theme_mod( 'app_landing_page_service_five_content' );
$app_landing_page_service_five_fav = get_theme_mod( 'app_landing_page_service_five_fav' );

$app_landing_page_service_six_title = get_theme_mod( 'app_landing_page_service_six_title' );
$app_landing_page_service_six_content = get_theme_mod( 'app_landing_page_service_six_content' );
$app_landing_page_service_six_fav = get_theme_mod( 'app_landing_page_service_six_fav' );

$app_landing_page_service_seven_title = get_theme_mod( 'app_landing_page_service_seven_title' );
$app_landing_page_service_seven_content = get_theme_mod( 'app_landing_page_service_seven_content' );
$app_landing_page_service_seven_fav = get_theme_mod( 'app_landing_page_service_seven_fav' );

$app_landing_page_service_eight_title = get_theme_mod( 'app_landing_page_service_eight_title' );
$app_landing_page_service_eight_content = get_theme_mod( 'app_landing_page_service_eight_content' );
$app_landing_page_service_eight_fav = get_theme_mod( 'app_landing_page_service_eight_fav' );

$app_landing_page_service_section_button = get_theme_mod( 'app_landing_page_service_section_button' );
$app_landing_page_service_section_button_link = get_theme_mod( 'app_landing_page_service_section_button_link' );

?>

			<div class="container">
				<header class="header wow fadeInUp">
					<?php 
            			if($app_landing_page_service_section_title){echo ' <h2 class="main-title">'.$app_landing_page_service_section_title.'</h2>';}
						if($app_landing_page_service_section_content){echo '<p>'.$app_landing_page_service_section_content.'</p>';}            
        			?>
				</header>
				<div class="row">
					<?php

					if( $app_landing_page_service_one_title || $app_landing_page_service_two_title || $app_landing_page_service_three_title || $app_landing_page_service_four_title || $app_landing_page_service_five_title || $app_landing_page_service_six_title || $app_landing_page_service_seven_title || $app_landing_page_service_eight_title || $app_landing_page_service_one_fav || $app_landing_page_service_two_fav || $app_landing_page_service_three_fav || $app_landing_page_service_four_fav || $app_landing_page_service_five_fav || $app_landing_page_service_six_fav || $app_landing_page_service_seven_fav || $app_landing_page_service_eight_fav ) { 

						$app_landing_page_service_one_titles = array( $app_landing_page_service_one_title, $app_landing_page_service_two_title, $app_landing_page_service_three_title, $app_landing_page_service_four_title, $app_landing_page_service_five_title, $app_landing_page_service_six_title, $app_landing_page_service_seven_title, $app_landing_page_service_eight_title);
						$app_landing_page_service_one_titles = array_filter( $app_landing_page_service_one_titles );

						$app_landing_page_service_one_contents = array( $app_landing_page_service_one_content, $app_landing_page_service_two_content, $app_landing_page_service_three_content, $app_landing_page_service_four_content, $app_landing_page_service_five_content, $app_landing_page_service_six_content, $app_landing_page_service_seven_content, $app_landing_page_service_eight_content);
						$app_landing_page_service_one_contents = array_filter( $app_landing_page_service_one_contents );

						$app_landing_page_service_one_favs = array( $app_landing_page_service_one_fav, $app_landing_page_service_two_fav, $app_landing_page_service_three_fav, $app_landing_page_service_four_fav, $app_landing_page_service_five_fav, $app_landing_page_service_six_fav, $app_landing_page_service_seven_fav, $app_landing_page_service_eight_fav);
						$app_landing_page_service_one_favs = array_filter( $app_landing_page_service_one_favs );

						for($x = 0; $x < 8; $x++) {
							echo '<div class="col wow fadeInUp">';

							if( isset ($app_landing_page_service_one_favs[$x] ) ){
								echo '<div class="icon-holder"><span class="fa fa-'. $app_landing_page_service_one_favs[$x] .'"></span></div>' ; } 
								echo '<div class="text-holder">';
									if( isset( $app_landing_page_service_one_titles[$x] ) ){
										echo '<h3 class="title">'. $app_landing_page_service_one_titles[$x] . '</h3>'; 
									}
									if( isset( $app_landing_page_service_one_contents[$x] ) ){
										echo $app_landing_page_service_one_contents[$x]; 
									}
								echo '</div>';
							echo '</div>';
						} } ?>
					</div>
				<?php
					if($app_landing_page_service_section_button_link){echo ' <div class="btn-holder"> <a href="'. $app_landing_page_service_section_button_link .'" class="btn-download"> '.$app_landing_page_service_section_button.'</a></div>'; }
                ?>
			</div>