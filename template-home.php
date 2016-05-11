<?php
/**
 * Template Name: Home Page
 *
 * @package App_Landing_Page
 */

get_header(); 

    $app_landing_page_banner_section_bg = get_theme_mod( 'app_landing_page_banner_section_bg' );
    $app_landing_page_stats_section_bg = get_theme_mod( 'app_landing_page_stats_section_bg' ) ; 
    $app_landing_page_enabled_sections = app_landing_page_get_sections();
    
    foreach( $app_landing_page_enabled_sections as $app_landing_page_section ){ 
        
    if ( $app_landing_page_section['id'] == "banner") { 
    ?>  <section class="<?php echo esc_attr( $app_landing_page_section['class'] ); ?>" id="<?php echo esc_attr( $app_landing_page_section['id'] ); ?>" <?php if( $app_landing_page_banner_section_bg ) echo 'style="background: url(' . esc_url( $app_landing_page_banner_section_bg ) . ')no-repeat; background-size: cover; background-position: center; "';?> >
            <?php get_template_part( 'sections/section', esc_attr( $app_landing_page_section['id'] ) ); ?>
        </section>
    <?php }elseif ( $app_landing_page_section['id'] == "stats") { 
    ?>  <section class="<?php echo esc_attr( $app_landing_page_section['class'] ); ?>" id="<?php echo esc_attr( $app_landing_page_section['id'] ); ?>" <?php if( $app_landing_page_stats_section_bg ) echo 'style="background: url(' . esc_url( $app_landing_page_stats_section_bg ) . '); "';?> >
            <?php get_template_part( 'sections/section', esc_attr( $app_landing_page_section['id'] ) ); ?>
        </section>
    <?php 
    }else{   ?>
        <section class="<?php echo esc_attr( $app_landing_page_section['class'] ); ?>" id="<?php echo esc_attr( $app_landing_page_section['id'] ); ?>">
            <?php get_template_part( 'sections/section', esc_attr( $app_landing_page_section['id'] ) ); ?>
        </section>
    <?php
    }

  }
 
get_footer();

