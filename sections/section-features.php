<?php
/**
 * Promoional Section
 * 
 * @package App_Landing_Page
 */

$app_landing_page_features_section_title = get_theme_mod('app_landing_page_features_section_title');
$app_landing_page_features_section_content = get_theme_mod('app_landing_page_features_section_content');
$app_landing_page_features_section_image = get_theme_mod( 'app_landing_page_features_section_image' );
$image_one = wp_get_attachment_image_src( $app_landing_page_features_section_image, 'full' );

$app_landing_page_features_one_title = get_theme_mod( 'app_landing_page_features_one_title' );
$app_landing_page_features_one_content = get_theme_mod( 'app_landing_page_features_one_content' );
$app_landing_page_features_one_fav = get_theme_mod( 'app_landing_page_features_one_fav' );

$app_landing_page_features_two_title = get_theme_mod( 'app_landing_page_features_two_title' );
$app_landing_page_features_two_content = get_theme_mod( 'app_landing_page_features_two_content' );
$app_landing_page_features_two_fav = get_theme_mod( 'app_landing_page_features_two_fav' );

$app_landing_page_features_three_title = get_theme_mod( 'app_landing_page_features_three_title' );
$app_landing_page_features_three_content = get_theme_mod( 'app_landing_page_features_three_content' );
$app_landing_page_features_three_fav = get_theme_mod( 'app_landing_page_features_three_fav' );

$app_landing_page_features_four_title = get_theme_mod( 'app_landing_page_features_four_title' );
$app_landing_page_features_four_content = get_theme_mod( 'app_landing_page_features_four_content' );
$app_landing_page_features_four_fav = get_theme_mod( 'app_landing_page_features_four_fav' );

$app_landing_page_features_five_title = get_theme_mod( 'app_landing_page_features_five_title' );
$app_landing_page_features_five_content = get_theme_mod( 'app_landing_page_features_five_content' );
$app_landing_page_features_five_fav = get_theme_mod( 'app_landing_page_features_five_fav' );

$app_landing_page_features_six_title = get_theme_mod( 'app_landing_page_features_six_title' );
$app_landing_page_features_six_content = get_theme_mod( 'app_landing_page_features_six_content' );
$app_landing_page_features_six_fav = get_theme_mod( 'app_landing_page_features_six_fav' );

?>
<div class="container">
	<?php if( $app_landing_page_features_section_title || $app_landing_page_features_section_content ){ ?>
    <header class="header wow wow fadeInUp">
		<?php if( $app_landing_page_features_section_title ) echo '<h2 class="main-title">' . esc_html( $app_landing_page_features_section_title ) . '</h2>'; 
        if( $app_landing_page_features_section_content ) echo wpautop( esc_html( $app_landing_page_features_section_content ) );
        ?>
	</header>
    <?php } ?>
	<div class="row">
		<div class="col wow wow fadeInUp">
		<?php if( $app_landing_page_features_one_title || $app_landing_page_features_one_content || $app_landing_page_features_one_fav ) {
			echo '<div class="text">';
			echo '<div class="icon-holder"><span class="fa fa-'. $app_landing_page_features_one_fav .'"></span></div>';
			echo '<div class="text-holder">';
				if( $app_landing_page_features_one_title ) echo '<h3 class="title">' . esc_html( $app_landing_page_features_one_title ) . '</h3>'; 
	        	if( $app_landing_page_features_one_content ) echo wpautop( esc_html( $app_landing_page_features_one_content ) );
			echo '</div>';
			echo '</div>';
			}?>
			<?php if( $app_landing_page_features_two_title || $app_landing_page_features_two_content || $app_landing_page_features_two_fav ) {
			echo '<div class="text">';
			echo '<div class="icon-holder"><span class="fa fa-'. $app_landing_page_features_two_fav .'"></span></div>';
			echo '<div class="text-holder">';
				if( $app_landing_page_features_two_title ) echo '<h3 class="title">' . esc_html( $app_landing_page_features_two_title ) . '</h3>'; 
	        	if( $app_landing_page_features_two_content ) echo wpautop( esc_html( $app_landing_page_features_two_content ) );
			echo '</div>';
			echo '</div>';
			}?>
			<?php if( $app_landing_page_features_three_title || $app_landing_page_features_three_content || $app_landing_page_features_three_fav ) {
			echo '<div class="text">';
			echo '<div class="icon-holder"><span class="fa fa-'. $app_landing_page_features_three_fav .'"></span></div>';
			echo '<div class="text-holder">';
				if( $app_landing_page_features_three_title ) echo '<h3 class="title">' . esc_html( $app_landing_page_features_three_title ) . '</h3>'; 
	        	if( $app_landing_page_features_three_content ) echo wpautop( esc_html( $app_landing_page_features_three_content ) );
			echo '</div>';
			echo '</div>';
			}?>
		</div>
		<?php if( $app_landing_page_features_section_image ){ 
			echo '<div class="col wow wow fadeInUp">';
			echo '<img src="' . esc_url( $image_one[0] ) .'" alt="' . esc_attr( $app_landing_page_features_section_title ) . '" />';
			echo '</div>';
		} ?>
		<div class="col wow wow fadeInUp">
		<?php if( $app_landing_page_features_four_title || $app_landing_page_features_four_content || $app_landing_page_features_four_fav ) {
			echo '<div class="text">';
			echo '<div class="icon-holder"><span class="fa fa-'. $app_landing_page_features_four_fav .'"></span></div>';
			echo '<div class="text-holder">';
				if( $app_landing_page_features_four_title ) echo '<h3 class="title">' . esc_html( $app_landing_page_features_four_title ) . '</h3>'; 
	        	if( $app_landing_page_features_four_content ) echo wpautop( esc_html( $app_landing_page_features_four_content ) );
			echo '</div>';
			echo '</div>';
			}?>
			<?php if( $app_landing_page_features_five_title || $app_landing_page_features_five_content || $app_landing_page_features_five_fav ) {
			echo '<div class="text">';
			echo '<div class="icon-holder"><span class="fa fa-'. $app_landing_page_features_five_fav .'"></span></div>';
			echo '<div class="text-holder">';
				if( $app_landing_page_features_five_title ) echo '<h3 class="title">' . esc_html( $app_landing_page_features_five_title ) . '</h3>'; 
	        	if( $app_landing_page_features_five_content ) echo wpautop( esc_html( $app_landing_page_features_five_content ) );
			echo '</div>';
			echo '</div>';
			}?>
			<?php if( $app_landing_page_features_six_title || $app_landing_page_features_six_content || $app_landing_page_features_six_fav ) {
			echo '<div class="text">';
			echo '<div class="icon-holder"><span class="fa fa-'. $app_landing_page_features_six_fav .'"></span></div>';
			echo '<div class="text-holder">';
				if( $app_landing_page_features_six_title ) echo '<h3 class="title">' . esc_html( $app_landing_page_features_six_title ) . '</h3>'; 
	        	if( $app_landing_page_features_six_content ) echo wpautop( esc_html( $app_landing_page_features_six_content ) );
			echo '</div>';
			echo '</div>';
			}?>
		</div>
	</div>
</div>