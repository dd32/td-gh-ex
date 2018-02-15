<?php
/**
 * Display 404 page
 * @package Academic Education
 */

get_header(); ?>

<div id="main-content">
    <div class="container">
        <div class="page-content">
            <div class="col-md-12">
        		<h1><?php the_title();?></h1>   
                <h3><?php printf( '<strong>%s</strong> %s', esc_html__( '404', 'academic-education' ), esc_html__( 'Not Found', 'academic-education' ) ) ?></h3>
                <p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn', 'academic-education' ); ?></p>
                <p class="text-404"><?php esc_html_e( 'Dont worry it happens to the best of us.', 'academic-education' ); ?></p>
                <div class="read-moresec">
                    <div><a href="<?php echo esc_url( home_url() ); ?>" class="button hvr-sweep-to-right"><?php esc_html_e( 'Return to the home page', 'academic-education' ); ?></a></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<?php get_footer(); ?>