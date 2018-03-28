<?php
/**
 * Template part for displaying posts.
 *
 * @package agency-x
 */
?>


    <!-- Single Blog -->
    <div class="col-md-4">              
        <div class="single-blog">
            <div class="blog-head">
                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?> 
                <?php if( ! empty( $image ) ) { ?>
                    <img src="<?php echo esc_url( $image[0] ); ?>" class="img-responsive" alt="<?php echo esc_attr( get_the_title() ); ?>">
                <?php } ?>                                      
                <span><i class="fa fa-calendar"></i><?php echo esc_attr( get_the_date() ); ?></span>
                <a class="icon" href="<?php echo esc_url( get_the_permalink() ); ?>"><i class="fa fa-link"></i></a>
            </div>
            <div class="blog-info">
                <h4><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title(); ?></a></h4>
                <div class="meta">
                    <span><i class="fa fa-user"></i><?php echo esc_html( agency_x_get_author_role() ); ?></span>
                    <span><i class="fa fa-comments"></i>
                        <?php comments_number( __( 'No comments', 'agency-x' ), __( 'one comment', 'agency-x' ), __( '% comments', 'agency-x' ) ); ?>
                    </span>
                </div>
                <?php the_excerpt(); ?>
                <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="button"><?php esc_html_e( 'Read more', 'agency-x' ); ?><i class="fa fa-angle-double-right"></i></a>
            </div>
        </div>                      
    </div>
    <!--/ End Single Blog -->
                   