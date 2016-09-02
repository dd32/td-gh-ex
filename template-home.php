<?php
/**
 * Template Name: Home Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bakes And Cakes
 */

get_header();

    $bakes_and_cakes_enabled_sections  = bakes_and_cakes_get_sections();
    $bakes_and_cakes_background_images = bakes_and_cakes_bg_image_settings();
    
    if( $bakes_and_cakes_enabled_sections )
    
    foreach( $bakes_and_cakes_enabled_sections as $bakes_and_cakes_section ){ ?>
        <section class="<?php echo esc_attr( $bakes_and_cakes_section['class'] ); ?>" id="<?php echo esc_attr( $bakes_and_cakes_section['id'] ); ?>" 
        <?php if($bakes_and_cakes_background_images){
            foreach($bakes_and_cakes_background_images as $bakes_and_cakes_background_image){
                if($bakes_and_cakes_section['id'] == $bakes_and_cakes_background_image['bgimage']){
                echo 'style="background: url(' . esc_url(  get_theme_mod( 'bakes_and_cakes_' . $bakes_and_cakes_background_image['bgimage'] .'_background_image') ). '); background-size: cover; background-repeat: no-repeat; background-position: center;"';
            }}
            } ?>>
            <?php get_template_part( 'sections/section', esc_attr( $bakes_and_cakes_section['id'] ) ); ?>
        </section>
    <?php
    }
	$iframe = get_theme_mod('bakes_and_cakes_map_section_content');
    if($iframe){
    echo '<div class="map">';
    echo  $iframe;
    echo '</div>';
    }

get_footer();