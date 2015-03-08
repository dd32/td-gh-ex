<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package fmi
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php echo of_get_option('vs-website-error-head');?></h1>
				</header><!-- .page-header -->

				<div class="post">
				<div class="page-content">
					<p><?php echo of_get_option('vs-website-error-msg');?></p>

					<?php get_search_form(); ?>



				</div><!-- .page-content -->
                </div>
                
			</section><!-- .error-404 -->

		</main><!-- #main -->
        

        
	</div><!-- #primary -->
    
	<?php get_sidebar();?>

	<div class="clear"></div>

<?php get_footer(); ?>
