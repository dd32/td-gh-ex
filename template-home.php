<?php
/**
 * Template Name: Home Page
 *
 * @package Benevolent
 */

get_header(); 

    $benevolent_enabled_sections = benevolent_get_sections();
    
    foreach( $benevolent_enabled_sections as $benevolent_section ){ ?>
        <section class="<?php echo esc_attr( $benevolent_section['class'] ); ?>" id="<?php echo esc_attr( $benevolent_section['id'] ); ?>">
            <?php get_template_part( 'sections/section', esc_attr( $benevolent_section['id'] ) ); ?>
        </section>
    <?php
    }
    
get_footer();