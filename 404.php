<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package BB Mobile Application
 */

get_header(); ?>

	<div class="title-box" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/not-found.jpg')">
		<div class="container">
			<h1><?php the_title();?></h1>	
		</div>
	</div>

	<div id="content-vw">
		<div class="container">
            <div class="page-content">		
				<div class="col-md-12">
					<h3><?php _e('<strong>404</strong> Not Found', 'bb-mobile-application' ); ?></h3>
					<p class="text-404"><?php _e( 'Looks like you have taken a wrong turn.....', 'bb-mobile-application' ); ?></p>
					<p class="text-404"><?php _e( 'Don\'t worry... it happens to the best of us.', 'bb-mobile-application' ); ?></p>
					<div class="read-moresec">
                		<div><a href="#" class="button hvr-sweep-to-right"><?php _e( 'Back to Home Page', 'bb-mobile-application' ); ?></a></div>
 					</div>
				</div>
				<div class="clearfix"></div>
            </div>
        <div class="clearfix"></div>
		</div>
	</div>
<?php get_footer(); ?>