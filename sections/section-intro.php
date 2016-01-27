<?php
/**
 * Intro Section
 * 
 * @package Benevolent
 */
 

$benevolent_intro_section_title = get_theme_mod( 'benevolent_intro_section_title' );
$benevolent_intro_section_content = get_theme_mod( 'benevolent_intro_section_content' );
$benevolent_intro_one_title = get_theme_mod( 'benevolent_intro_one_title' );
$benevolent_intro_one_link = get_theme_mod( 'benevolent_intro_one_link' );
$benevolent_intro_one_url = get_theme_mod( 'benevolent_intro_one_url' );
$benevolent_intro_one_logo = get_theme_mod( 'benevolent_intro_one_logo' );
$benevolent_intro_one_image = get_theme_mod( 'benevolent_intro_one_image' );
$benevolent_intro_two_title = get_theme_mod( 'benevolent_intro_two_title' );
$benevolent_intro_two_link = get_theme_mod( 'benevolent_intro_two_link' );
$benevolent_intro_two_url = get_theme_mod( 'benevolent_intro_two_url' );
$benevolent_intro_two_logo = get_theme_mod( 'benevolent_intro_two_logo' );
$benevolent_intro_two_image = get_theme_mod( 'benevolent_intro_two_image' );
$benevolent_intro_three_title = get_theme_mod( 'benevolent_intro_three_title' );
$benevolent_intro_three_link = get_theme_mod( 'benevolent_intro_three_link' );
$benevolent_intro_three_url = get_theme_mod( 'benevolent_intro_three_url' );
$benevolent_intro_three_logo = get_theme_mod( 'benevolent_intro_three_logo' );
$benevolent_intro_three_image = get_theme_mod( 'benevolent_intro_three_image' );

?>
 
<div class="container">
	<?php if( $benevolent_intro_section_title || $benevolent_intro_section_content ){ ?>
    <header class="header">
		<?php if( $benevolent_intro_section_title ) echo '<h2 class="main-title">' . esc_html( $benevolent_intro_section_title ) . '</h2>'; 
        if( $benevolent_intro_section_content ) echo wpautop( esc_html( $benevolent_intro_section_content ) );
        ?>
	</header>
    <?php } ?>
    
	<div class="row">
		<?php 
        if( $benevolent_intro_one_image ){
            $image_one = wp_get_attachment_image_src( $benevolent_intro_one_image, 'full' );
            $logo_one = wp_get_attachment_image_src( $benevolent_intro_one_logo, 'full' );
            
            echo '<div class="columns-3">';
            echo '<div class="img-holder"><img src="' . esc_url( $image_one[0] ) . '" alt="' . esc_attr( $benevolent_intro_one_title ) . '" /></div>';
            
            if( $benevolent_intro_one_logo ) echo '<div class="icon-holder"><img src="' . esc_url( $logo_one[0] ) .'" alt="' . esc_attr( $benevolent_intro_one_title ) . '" /></div>';
            
			if( $benevolent_intro_one_title || $benevolent_intro_one_url ){ 
                echo '<div class="text-holder">';
				if( $benevolent_intro_one_title ) echo '<strong class="title">' . esc_html( $benevolent_intro_one_title ) . '</strong>'; 
				if( $benevolent_intro_one_url ) echo '<a class="btn" href="' . esc_url( $benevolent_intro_one_url ) . '" target="_blank">' . esc_html( $benevolent_intro_one_link ) . '<span class="fa fa-angle-right"></span></a>';
                echo '</div>';
            } 
            echo '</div>';
        } if( $benevolent_intro_two_image ){ 
            $image_two = wp_get_attachment_image_src( $benevolent_intro_two_image, 'full' );
            $logo_two = wp_get_attachment_image_src( $benevolent_intro_two_logo, 'full' );
            
            echo '<div class="columns-3">';
			echo '<div class="img-holder"><img src="' . esc_url( $image_two[0] ) . '" alt="' . esc_attr( $benevolent_intro_two_title ) . '"></div>';
			
            if( $benevolent_intro_two_logo ) echo '<div class="icon-holder"><img src="' . esc_url( $logo_two[0] ) . '" alt="' . esc_attr( $benevolent_intro_two_title ) . '"></div>';
            if( $benevolent_intro_two_title || $benevolent_intro_two_url ){
                echo '<div class="text-holder">';
				if( $benevolent_intro_two_title ) echo '<strong class="title">' . esc_html( $benevolent_intro_two_title ) . '</strong>';
				if( $benevolent_intro_two_url ) echo '<a class="btn" href="' . esc_url( $benevolent_intro_two_url ) . '" target="_blank">' . esc_html( $benevolent_intro_two_link ) . '<span class="fa fa-angle-right"></span></a>';
                echo '</div>';
            }
            echo '</div>';
		} if( $benevolent_intro_three_image ){
            $image_three = wp_get_attachment_image_src( $benevolent_intro_three_image, 'full' );
            $logo_three = wp_get_attachment_image_src( $benevolent_intro_three_logo, 'full' );
            
            echo '<div class="columns-3">';
			echo '<div class="img-holder"><img src="' . esc_url( $image_three[0] ) . '" alt="' . esc_attr( $benevolent_intro_three_title ) . '"></div>';
			
            if( $benevolent_intro_three_logo ) echo '<div class="icon-holder"><img src="' . esc_url( $logo_three[0] ) . '" alt="' . esc_attr( $benevolent_intro_three_title ) . '"></div>';
            if( $benevolent_intro_three_title || $benevolent_intro_three_url ){
                echo '<div class="text-holder">';
				if( $benevolent_intro_three_title ) echo '<strong class="title">' . esc_html( $benevolent_intro_three_title ) . '</strong>';
				if( $benevolent_intro_three_url ) echo '<a class="btn" href="' . esc_url( $benevolent_intro_three_url ) . '" target="_blank">' . esc_html( $benevolent_intro_three_link ) . '<span class="fa fa-angle-right"></span></a>';
                echo '</div>';
            }
            echo '</div>';
        } ?>
	</div>
</div>