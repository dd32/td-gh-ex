<?php get_header(); ?>

<section class="full-width-container blog-section">
    <div class="container">
        <h1 class="archive-title"><?php printf( __( 'Posts On %s', THEMEORA_THEME_NAME ), single_cat_title( '', false ) ); ?></h1>
        <?php if ( category_description() ) : // Show an optional category description ?>
            <div class="category-description"><?php echo category_description(); ?></div>
        <?php endif; ?>
            
	    <div class="row">
            <div class="col-md-8">    
                <!-- page content -->
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php themeora_load_content($post->ID) ?>
                    <?php endwhile; ?>
                <?php endif; ?>
    			<!-- end page content -->

                <?php themeora_paging(); ?>                
            </div>

            <?php get_sidebar(); ?>

        </div><!-- end row -->
    </div><!-- end Container -->
</section><!-- end full-width-container -->

<?php get_footer(); ?>