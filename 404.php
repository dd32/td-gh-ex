<?php
/**
 * Display 404 page
 * @package Academic Education
 */

get_header(); ?>

<div id="main-content">
    <div class="container">
        <h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404', 'academic-education' ), esc_html__( 'Not Found', 'academic-education' ) ) ?></h1>
        <p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn', 'academic-education' ); ?></p>
        <p class="text-404"><?php esc_html_e( 'Dont worry it happens to the best of us.', 'academic-education' ); ?></p>
        <div class="read-moresec">
            <a href="<?php echo esc_url( home_url() ); ?>" class="button hvr-sweep-to-right"><?php esc_html_e( 'Return to the home page', 'academic-education' ); ?></a>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<?php get_footer(); ?>