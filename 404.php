<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.1
 */

get_header(); ?>

<div class="inner">
    <div id="main-content">
        <section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'aguafuerte' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'aguafuerte' ); ?></p>

					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
        <div class="clearfix"></div>
        
    </div><!--/main-content-->
    <?php get_sidebar('sidebar'); ?>  
    

</div><!--/inner-->


<div class="clearfix"></div>
<?php get_footer(); ?>



