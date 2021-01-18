<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package advance-coaching
 */

get_header(); ?>

<main role="main" id="maincontent" class="content-ts">
	<div class="container">
        <div class="middle-align my-0 mx-auto px-0 py-3">
			<h1><?php echo esc_html(get_theme_mod('advance_coaching_title_404_page',__('404 Not Found','advance-coaching')));?></h1>
			<p class="text-404 mt-0 mx-0 mb-3"><?php echo esc_html(get_theme_mod('advance_coaching_content_404_page',__('Looks like you have taken a wrong turn&hellip. Dont worry&hellip it happens to the best of us.','advance-coaching')));?></p>
			<?php if( get_theme_mod('advance_coaching_button_404_page','Back to Home Page') != ''){ ?>
				<div class="read-moresec my-3 mx-0">
	        		<a href="<?php echo esc_url(home_url()); ?>" class="button p-3"><?php echo esc_html(get_theme_mod('advance_coaching_button_404_page',__('Back to Home Page','advance-coaching')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('advance_coaching_button_404_page',__('Back to Home Page','advance-coaching')));?></span></a>
	        	</div>
        	<?php } ?>
			<div class="clearfix"></div>
        </div>
	</div>
</main>

<?php get_footer(); ?>