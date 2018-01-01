<?php
/**
 * Template Name: Contact Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bcorporate
 */

get_header(); ?>
<?php
	while ( have_posts() ) : the_post();
		?>
		<div class="bcorporate_banner_section bcorporate_home_banner_section">
			<div class="text-center caption-text">
				<h1 class="inner_page_title"><?php the_title(); ?></h1>
				<?php
					// Check if NavXT plugin activated
					if( class_exists( 'breadcrumb_navxt' ) ) {
						bcn_display();
					} 
				?>
			</div>
			<?php if( has_post_thumbnail() ): ?>
				<img src="<?php echo esc_url( get_the_post_thumbnail_url() );?>" class="banner_img inner_banner_img" />
			<?php else: ?>
				<img src="<?php echo esc_url( get_template_directory_uri() );?>/inc/img/blog_header_img.jpg" class="banner_img inner_banner_img" />
			<?php endif; ?>
		</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
	<!-- end of the header part -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			 
				<?php the_content(); ?>
			 
		</main>
	</div>
<?php endwhile; ?>

<?php
get_footer();

