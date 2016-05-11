<?php
/**
 * Intro Section
 * 
 * @package App_Landing_Page
 */

$app_landing_page_intro_section_title = get_theme_mod( 'app_landing_page_intro_section_title' );
$app_landing_page_intro_section_slogan = get_theme_mod( 'app_landing_page_intro_section_slogan' );
$app_landing_page_intro_section_content = get_theme_mod( 'app_landing_page_intro_section_content' );
$app_landing_page_intro_one_image = get_theme_mod('app_landing_page_intro_one_image');
$image_intro = wp_get_attachment_image_src( $app_landing_page_intro_one_image, 'full' );
?>


<div class="container">
	<div class="row">
		<div class="col">
			<?php if( $app_landing_page_intro_one_image ) echo '<div class="img-holder wow wow fadeInUp"><img src="' . esc_url( $image_intro [0] ) .'" alt="' . esc_attr( $app_landing_page_intro_one_image ) . '" /></div>'; ?>
		</div>
		<div class="col">
			<div class="text-holder wow fadeInRight">
				<header class="header">
					<?php 
        				if( $app_landing_page_intro_section_title ) echo '<h2 class="title">' . esc_html( $app_landing_page_intro_section_title ) . '</h2>';
						if( $app_landing_page_intro_section_slogan ) echo wpautop( esc_html( $app_landing_page_intro_section_slogan ) );
       				?>
				</header>
			<?php 	if( $app_landing_page_intro_section_content ) echo wpautop( esc_html( $app_landing_page_intro_section_content ) ); ?>
			</div>
		</div>
	</div>
</div>
