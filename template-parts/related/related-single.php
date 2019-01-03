<?php
/**
 * Template for displaying content of related post.
 *
 * @package Academib Hub
 */
?>
<!-- Related Posts  -->
    <div class="related-post">
        <div class=" post-header ">
            <h3><?php echo wp_kses_post('Related <span>Post</span>','academic-hub'); ?></h3>
        </div>
        <div class="related-part">
            <div class="row">
                <?php 
                    $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 6, 'post__not_in' => array($post->ID) ) );
                    if( $related ) foreach( $related as $post ) {
                    setup_postdata($post); 
                ?>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="related-details">
                            <a class="image-link" href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail(); ?>
                            </a>    
                            <div class="related-paragraph">
                                <p class="title-img"><a class="image-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </div>
                    <?php } 
                        wp_reset_query();
                ?>
            </div>
        </div>
    </div>
<!-- ./Related Posts --> 