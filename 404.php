<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package bb wedding bliss
 */

get_header(); ?>

<main id="maincontent" role="main" class="content-ts">
	<div class="container">
        <div class="page-content">
			<h1><?php echo esc_html(get_theme_mod('bb_wedding_bliss_title_404_page',__('404 Not Found','bb-wedding-bliss')));?></h1>
			<p class="text-404"><?php echo esc_html(get_theme_mod('bb_wedding_bliss_content_404_page',__('Looks like you have taken a wrong turn&hellip. Dont worry&hellip it happens to the best of us.','bb-wedding-bliss')));?></p>
			<?php if( get_theme_mod('bb_wedding_bliss_button_404_page','Back to Home Page') != ''){ ?>
				<div class="read-moresec">
	        		<a href="<?php echo esc_url(home_url()); ?>" class="button"><?php echo esc_html(get_theme_mod('bb_wedding_bliss_button_404_page',__('Back to Home Page','bb-wedding-bliss')));?><span class="screen-reader-text"><?php esc_html_e( 'Back to Home Page', 'bb-wedding-bliss' ); ?></span></a>
	        	</div>
        	<?php } ?>
        </div>
	</div>
</main>

<?php get_footer(); ?>