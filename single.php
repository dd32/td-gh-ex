<?php
get_header(); ?>

<div class="container container-category">
        <div class="row row-advertisement">
            <div class="col-md-12">
                <div class="advertisement">
                    
                </div>
            </div>
        </div>


        <div class="row">
            <!-- RIGHT SLIDER OF CONTAINER -->
            <div class="col-md-8">
                <?php 
                while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/content', 'single' ); 

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }

                    if ( is_singular( 'attachment' ) ) {
                        // Parent post navigation.
                        the_post_navigation( array(
                            'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'bee-news' ),
                        ) );
                    } elseif ( is_singular( 'post' ) ) {
                        // Previous/next post navigation.
                        the_post_navigation( array(
                            'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'bee-news' ) . '</span> ' .
                                '<span class="screen-reader-text">' . __( 'Next post:', 'bee-news' ) . '</span> ' .
                                '<span class="post-title">%title</span>',
                            'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'bee-news' ) . '</span> ' .
                                '<span class="screen-reader-text">' . __( 'Previous post:', 'bee-news' ) . '</span> ' .
                                '<span class="post-title">%title</span>',
                            'screen_reader_text' => __( 'Previous News:', 'bee-news' )
                        ) );
                    }
                
                endwhile;

                ?>

            
              
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