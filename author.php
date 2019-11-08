<?php get_header(); ?>

<section class="full-width-container blog-section">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <?php the_post(); ?>
            <h1 class="archive-title"><?php printf( __( 'All posts by %s', 'atwood' ), get_the_author() ); ?></h1>
            <?php rewind_posts(); ?>
        <?php endif; ?>
            
	    <div class="row">
            <div class="col-md-8">
                <?php 
                /* Only show the author description if we are on page 1 to avoid duplicate content.
                 * First we check if we are paging or not
                 */
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                ?>
                
                <?php if ( get_the_author_meta( 'description' ) && 1 === $paged ) : ?>
                    <div class="post-author styled-box">
                        <?php echo get_avatar( get_the_author_meta('ID'), 80 ); ?>
                        <p><?php the_author_meta('description'); ?></p>
                    </div>
                <?php endif; ?>
                    
                <!-- page content -->
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php themeora_load_content($post->ID) ?>
                    <?php endwhile; ?>
                <?php endif; ?>
    			<!-- end page content -->

                <?php themeora_paging(); ?>
            </div><!-- end 8 cols -->

            <?php get_sidebar(); ?>

        </div><!-- end row -->
    </div><!-- end Container -->
</section><!-- end full-width-container -->


<?php get_footer(); ?>