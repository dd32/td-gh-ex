<?php
/**
 * Featured-on Section
 * 
 * @package App_Landing_Page
 */

$app_landing_page_featured_section_title = get_theme_mod( 'app_landing_page_featured_section_title' );
$app_landing_page_featured_logo_one = get_theme_mod( 'app_landing_page_featured_logo_one' );
$app_landing_page_featured_logo_one_url = get_theme_mod( 'app_landing_page_feature_button_one_url' );
$app_landing_page_featured_logo_two = get_theme_mod( 'app_landing_page_featured_logo_two' );
$app_landing_page_featured_logo_two_url = get_theme_mod( 'app_landing_page_feature_button_two_url' );
$app_landing_page_featured_logo_three = get_theme_mod( 'app_landing_page_featured_logo_three' );
$app_landing_page_featured_logo_three_url = get_theme_mod( 'app_landing_page_feature_button_three_url' );
$app_landing_page_featured_logo_four = get_theme_mod( 'app_landing_page_featured_logo_four' );
$app_landing_page_featured_logo_four_url = get_theme_mod( 'app_landing_page_feature_button_four_url' );
$app_landing_page_featured_logo_five = get_theme_mod( 'app_landing_page_featured_logo_five' );
$app_landing_page_featured_logo_five_url = get_theme_mod( 'app_landing_page_feature_button_five_url' );
$app_landing_page_featured_logo_six = get_theme_mod( 'app_landing_page_featured_logo_six' );
$app_landing_page_featured_logo_six_url = get_theme_mod( 'app_landing_page_feature_button_six_url' );

?>

<div class="container">
	<?php  if( $app_landing_page_featured_section_title ) echo '<h2 class="title">' . esc_html( $app_landing_page_featured_section_title ) . '</h2>'; ?>
	<div class="row">
		<?php 
			if( $app_landing_page_featured_logo_one ) echo '<div class="col wow fadeInUp"><a href="' . esc_url( $app_landing_page_featured_logo_one_url ) . '" class="app-store" target="_blank"><img src="' . esc_html( $app_landing_page_featured_logo_one ) . '" alt="" ></a></div>';
			if( $app_landing_page_featured_logo_two ) echo '<div class="col wow fadeInUp"><a href="' . esc_url( $app_landing_page_featured_logo_two_url ) . '" class="app-store" target="_blank"><img src="' . esc_html( $app_landing_page_featured_logo_two ) . '" alt="" ></a></div>';
			if( $app_landing_page_featured_logo_three ) echo '<div class="col wow fadeInUp"><a href="' . esc_url( $app_landing_page_featured_logo_three_url ) . '" class="app-store" target="_blank"><img src="' . esc_html( $app_landing_page_featured_logo_three ) . '" alt="" ></a></div>';
			if( $app_landing_page_featured_logo_four ) echo '<div class="col wow fadeInUp"><a href="' . esc_url( $app_landing_page_featured_logo_four_url ) . '" class="app-store" target="_blank"><img src="' . esc_html( $app_landing_page_featured_logo_four ) . '" alt="" ></a></div>';
			if( $app_landing_page_featured_logo_five ) echo '<div class="col wow fadeInUp"><a href="' . esc_url( $app_landing_page_featured_logo_five_url ) . '" class="app-store" target="_blank"><img src="' . esc_html( $app_landing_page_featured_logo_five ) . '" alt="" ></a></div>';
			if( $app_landing_page_featured_logo_six ) echo '<div class="col wow fadeInUp"><a href="' . esc_url( $app_landing_page_featured_logo_six_url ) . '" class="app-store" target="_blank"><img src="' . esc_html( $app_landing_page_featured_logo_six ) . '" alt="" ></a></div>';
		?>
	</div>
</div>
