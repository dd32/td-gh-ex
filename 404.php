<?php
get_header(); ?>

<div class="container container-category">
    <div class="row row-advertisement">
        <div class="col-md-12">
            <div class="advertisement">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/adv-half.jpg" alt="">
            </div>
        </div>
    </div>
    <div class="row">
        <!-- RIGHT SLIDER OF CONTAINER -->
        <div class="col-md-8">

        	<section class="error-404 not-found">
					<header class="page-header">
					<h4 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'bee-news' ); ?></h4>
					</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'bee-news' ); ?></p>

					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

        
        
            <div class="row row-advertisement">
                <div class="col-md-12">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/adv-full.jpg" alt="">
                </div>
            </div>
        </div>
        <!-- END RIGHT SLIDER OF CONTAINER -->
        <!-- //
        // -->
        <!-- LEFT SLIDER OF CONTAINER -->
       <?php get_sidebar(); ?>
        <!-- END LEFT SLIDER OF CONTAINER -->
    </div>
</div>
<?php get_footer(); ?>


