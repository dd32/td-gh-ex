<?php
/**
 * The template for displaying home page post
 *
 * @package WordPress
 * @subpackage belfast
 * @since belfast 1.0
 */
?>

    
    <div class="grid-item col-sm-4">
      <div class="grid-item-content">
	      <div class="container1">
		      <?php if ( has_post_thumbnail() ) {
				the_post_thumbnail('medium img-responsive image');
				} else {
				?>
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/placeholder.png" class="medium img-responsive image" alt="<?php esc_attr_e( 'placeholder', 'belfast' ); ?>" />
				<?php } ?>
				<a class="overlay-links" href="<?php the_permalink();?>"><div class="overlay">
				<h1><?php the_title(); ?></h1>
				<p><?php echo get_the_date(); ?></p>
	      </div></a>
	      </div>
</div>
    </div>




