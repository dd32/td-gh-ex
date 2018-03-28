<?php
/**
 * Template part for displaying single posts.
 *
 * @package agency-x
 */

?>

<div class="col-md-8">
  <div class="entry-blog">
    <!-- Single Blog -->
    <div class="single-blog">
      <div class="blog-head">
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?> 
        <?php if( ! empty( $image ) ) { ?>
            <img src="<?php echo esc_url( $image[0] ); ?>" class="img-responsive" alt="<?php echo esc_attr( get_the_title() ); ?>">
        <?php } ?>
        <span><i class="fa fa-calendar"></i><?php echo esc_attr( get_the_date() ); ?></span>
        <a class="icon" href="#"><i class="fa fa-link"></i></a>
      </div>
      <div class="blog-info">
        <h4><?php the_title(); ?></h4>
        <div class="meta">
          <span><i class="fa fa-user"></i><?php echo esc_html( agency_x_get_author_role() ); ?></span>
          <span><i class="fa fa-comments"></i><?php comments_number( __( 'No comments', 'agency-x' ), __( 'one comment', 'agency-x' ), __( '% comments', 'agency-x' ) ); ?></span>
        </div>
       <?php the_content(); ?>
      </div>
      
      <!-- Blog Prev Next -->
      <div class="prev-next">
        <ul>
          <li class="prev"><?php previous_post_link( '&laquo; %link', 'Prev', false ); ?></li>
          <li class="next"><?php next_post_link( '%link &raquo;', 'Next', false ); ?></li>          
        </ul>
      </div>
      <!--/ End Blog Prev Next -->
      <?php comments_template(); ?>
    </div>
    <!--/ End Single Blog -->
  </div>
</div>
         