<?php
get_header(); ?>


<div class="container container-category">
        <div class="row row-advertisement">
            <div class="col-md-12">
                <div class="advertisement">
                   <?php if( function_exists('the_ad_placement') ) { the_ad_placement('catagory-header'); }?>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- RIGHT SLIDER OF CONTAINER -->
            <div class="col-md-8">


            <?php if ( have_posts() ) : ?>

                <header class="page-header">
                    <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>
                </header><!-- .page-header -->

        
                <?php
                // Start the Loop.
                global $archive_counter;
                $archive_counter = 0;
                while ( have_posts() ) : the_post();

                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    
                    
                    $archive_counter++;
                    get_template_part( 'template-parts/content', '' );

                // End the loop.
                endwhile;
                $archive_counter = 0;

                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'bee-news' ),
                    'next_text'          => __( 'Next page', 'bee-news' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bee-news' ) . ' </span>',
                ) );

            // If no content, include the "No posts found" template.
            else :
                get_template_part( 'template-parts/content', 'none' );

            endif;
            ?>
            
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
           <?php  get_sidebar('right-sidebar'); ?>
            <!-- END LEFT SLIDER OF CONTAINER -->
        </div>
    </div>
<?php get_footer(); ?>