<?php
/**
 * The main template file.
 *
 *
 * @package auckland
 */

get_header(); ?>

    <div class="container">
        <div class="row">
                <?php
                if ( have_posts() ) :
                    $clear = 0;
                    $sticky = get_option( 'sticky_posts' );
                    if(count($sticky) > 0) {
                        $query_sticky = new WP_Query( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1 ) );
                        while ( $query_sticky->have_posts() ) : $query_sticky->the_post();  ?>

                            <div class="blog-item sticky">
                                <?php get_template_part( 'contents/content', 'sticky' ); ?>
                            </div>
                        
                        <?php endwhile; wp_reset_postdata(); 
                    }

                    $query = new WP_Query( array( 'post__not_in' => $sticky, 'ignore_sticky_posts' => 1 ,'paged' => $paged) ); 
                    while ( $query->have_posts() ) : $query->the_post(); ?>
                        
                        <div class="col-md-4 blog-item">
                            <?php get_template_part( 'contents/content', get_post_format() ); ?>
                        </div>

                    <?php 
                    if($clear++ == 2){
                        echo '<span class="clearfix"></span>';
                        $clear = 0;
                    }
                    endwhile;
                    ?>
                    <span class="clearfix"></span>
                    <?php
                    auckland_pagination();
                    wp_reset_postdata();

                else : ?>
                    <div class="col-md-12">
                        <?php get_template_part( 'contents/content', 'none' ); ?>
                    </div>
                <?php
                endif; ?>

        </div>
    </div>

<?php get_footer(); ?>