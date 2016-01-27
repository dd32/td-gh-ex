<?php
/**
 * Sponsor Section
 * 
 * @package Benevolent
 */
 
 $benevolent_sponsor_section_title = get_theme_mod( 'benevolent_sponsor_section_title' );
 $benevolent_sponsor_logo_one = get_theme_mod( 'benevolent_sponsor_logo_one' );
 $benevolent_sponsor_logo_one_url = get_theme_mod( 'benevolent_sponsor_logo_one_url' );
 $benevolent_sponsor_logo_two = get_theme_mod( 'benevolent_sponsor_logo_two' );
 $benevolent_sponsor_logo_two_url = get_theme_mod( 'benevolent_sponsor_logo_two_url' );
 $benevolent_sponsor_logo_three = get_theme_mod( 'benevolent_sponsor_logo_three' );
 $benevolent_sponsor_logo_three_url = get_theme_mod( 'benevolent_sponsor_logo_three_url' );
 $benevolent_sponsor_logo_four = get_theme_mod( 'benevolent_sponsor_logo_four' );
 $benevolent_sponsor_logo_four_url = get_theme_mod( 'benevolent_sponsor_logo_four_url' );
 $benevolent_sponsor_logo_five = get_theme_mod( 'benevolent_sponsor_logo_five' );
 $benevolent_sponsor_logo_five_url = get_theme_mod( 'benevolent_sponsor_logo_five_url' );
 
 if( $benevolent_sponsor_section_title || $benevolent_sponsor_logo_one || $benevolent_sponsor_logo_two || $benevolent_sponsor_logo_three || $benevolent_sponsor_logo_four || $benevolent_sponsor_logo_five ){
    ?>
    <div class="container">
		<?php if( $benevolent_sponsor_section_title ) echo '<h2 class="main-title">' . esc_html( $benevolent_sponsor_section_title ) . '</h2>'; ?>
		<div class="row">
            <?php 
            if( $benevolent_sponsor_logo_one_url ) echo '<a href="' . esc_url( $benevolent_sponsor_logo_one_url ) . '" target="_blank">'; 
            if( $benevolent_sponsor_logo_one ) echo '<div class="columns-5"><img src="' . esc_url( $benevolent_sponsor_logo_one ) . '" alt=""></div>';
            if( $benevolent_sponsor_logo_one_url ) echo '</a>'; 
            
            if( $benevolent_sponsor_logo_two_url ) echo '<a href="' . esc_url( $benevolent_sponsor_logo_two_url ) . '" target="_blank">'; 
            if( $benevolent_sponsor_logo_two ) echo '<div class="columns-5"><img src="' . esc_url( $benevolent_sponsor_logo_two ) . '" alt=""></div>';
            if( $benevolent_sponsor_logo_two_url ) echo '</a>';
            
            if( $benevolent_sponsor_logo_three_url ) echo '<a href="' . esc_url( $benevolent_sponsor_logo_three_url ) . '" target="_blank">'; 
            if( $benevolent_sponsor_logo_three ) echo '<div class="columns-5"><img src="' . esc_url( $benevolent_sponsor_logo_three ) . '" alt=""></div>';
            if( $benevolent_sponsor_logo_three_url ) echo '</a>';
            
            if( $benevolent_sponsor_logo_four_url ) echo '<a href="' . esc_url( $benevolent_sponsor_logo_four_url ) . '" target="_blank">'; 
            if( $benevolent_sponsor_logo_four ) echo '<div class="columns-5"><img src="' . esc_url( $benevolent_sponsor_logo_four ) . '" alt=""></div>';
            if( $benevolent_sponsor_logo_four_url ) echo '</a>';
            
            if( $benevolent_sponsor_logo_five_url ) echo '<a href="' . esc_url( $benevolent_sponsor_logo_five_url ) . '" target="_blank">'; 
            if( $benevolent_sponsor_logo_five ) echo '<div class="columns-5"><img src="' . esc_url( $benevolent_sponsor_logo_five ) . '" alt=""></div>';
            if( $benevolent_sponsor_logo_five_url ) echo '</a>';
            ?>
		</div>
	</div>
 <?php
 }   