<?php
/**
 * Banner Section
 * 
 * @package App_Landing_Page
 */

$app_landing_page_banner_section_title = get_theme_mod( 'app_landing_page_banner_section_title' );
$app_landing_page_banner_section_content = get_theme_mod( 'app_landing_page_banner_section_content' );
$app_landing_page_banner_button_one = get_theme_mod( 'app_landing_page_banner_button_one' );
$app_landing_page_banner_button_one_url = get_theme_mod( 'app_landing_page_banner_button_one_url' );
$app_landing_page_banner_button_two = get_theme_mod( 'app_landing_page_banner_button_two' );
$app_landing_page_banner_button_two_url = get_theme_mod( 'app_landing_page_banner_button_two_url' );
$app_landing_page_banner_button_url = get_theme_mod( 'app_landing_page_banner_button_url' );
$app_landing_page_banner_button_text = get_theme_mod( 'app_landing_page_banner_button_text' );
?>

<div class="container">
	<div class="banner-text">
		<?php 
        if( $app_landing_page_banner_section_title ) echo '<strong class="title">' . esc_html( $app_landing_page_banner_section_title ) . '</strong>';
		if( $app_landing_page_banner_section_content ) echo '<p>'.esc_html( $app_landing_page_banner_section_content ). '</p>'
       ?>
		<div class="appstrore-holder">
			<?php 
			if( $app_landing_page_banner_button_one_url ) echo '<a href="' . esc_url( $app_landing_page_banner_button_one_url ) . '" class="app-store" target="_blank"><img src="' . esc_html( $app_landing_page_banner_button_one ) . '" alt="" ></a>';
			if( $app_landing_page_banner_button_two_url ) echo '<a href="' . esc_url( $app_landing_page_banner_button_two_url ) . '" class="android-market" target="_blank"><img src="' . esc_html( $app_landing_page_banner_button_two ) . '" alt="" ></a>';
			?>
		</div>

		<?php
		if( $app_landing_page_banner_button_url ) echo '<a href="' . esc_url( $app_landing_page_banner_button_url ) . '" class="btn-download" target="_blank">'. esc_html( $app_landing_page_banner_button_text ) . '</a>';
		?>
	</div>
</div>