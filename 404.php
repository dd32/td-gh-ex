<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package advance-business
 */

get_header(); ?>

<main id="maincontent" role="main" class="content-ts">
	<div class="container">
        <div class="middle-align">
			<h1><?php echo esc_html(get_theme_mod('advance_business_title_404_page',__('404 Not Found','advance-business')));?></h1>
			<p class="text-404"><?php echo esc_html(get_theme_mod('advance_business_content_404_page',__('Looks like you have taken a wrong turn&hellip. Dont worry&hellip it happens to the best of us.','advance-business')));?></p>
			<?php if( get_theme_mod('advance_business_button_404_page','Back to Home Page') != ''){ ?>
				<div class="read-moresec my-3 mx-0">
	        		<a href="<?php echo esc_url(home_url()); ?>" class="button mt-3 mx-0 mb-0 py-3 px-4"><?php echo esc_html(get_theme_mod('advance_business_button_404_page',__('Back to Home Page','advance-business')));?><span class="screen-reader-text"><?php esc_html_e( 'Back to Home Page', 'advance-business' ); ?></span></a>
	        	</div>
        	<?php } ?>
			<div class="clearfix"></div>
        </div>
	</div>
</main>

<?php get_footer(); ?>