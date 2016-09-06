<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package BOXY
 */

get_header(); ?>
<div class="breadcrumb-wrap">
	<div class="container">
		<div class="sixteen columns">
	        <header class="entry-header ten columns">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->
			<div class="breadcrumb six columns">
				<?php if ( get_theme_mod('breadcrumb' ) && function_exists( 'boxy_breadcrumbs' ) ) : ?>
					<div id="breadcrumb" role="navigation">
						<?php boxy_breadcrumbs(); ?>
					</div>
				<?php endif; ?>  
			</div>
		</div>
	</div>
</div>
<?php do_action('boxy_single_page_flexslider_featured_image'); ?>

<div id="content" class="site-content container">

		<?php do_action('boxy_two_sidebar_left'); ?>	

	<div id="primary" class="content-area <?php boxy_layout_class();?> columns">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>    	

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

    <?php do_action('boxy_two_sidebar_right'); ?>	

<?php get_footer(); ?>