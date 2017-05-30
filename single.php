<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Aquaparallax
 */

get_header();
?>
<div class="aqa-content-area">

<div class="aqa-blog-section">

<div class="container">

<div class="row">

<div class="col-md-8">

<div class="row">

<div class="col-md-12">

<div class="aqa-single-blog-detail">

<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'template-parts/content', 'single' ); ?>
				
<ul class="blog-detail-page-nation">
    <li>
	<?php if( previous_post_link () ) { ?>
	<a href="#0"><i class="fa fa-angle-double-left" aria-hidden="true"></i> <p> <?php previous_post_link( '%link',  '%title' ); ?></p></a>
	<?php } ?>
	</li>
	
    <li>
	<?php if( next_post_link () ) { ?>
	<a href="#0"><p><?php next_post_link( '%link', '%title' ); ?> </p> <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
    <?php } ?>
	</li>
</ul>

<?php endwhile; 
wp_reset_postdata(); ?>

<div class="row">
<div class="col-md-12">
<?php get_template_part( 'template-parts/content', 'author' ); ?>
</div>
</div>

<?php  $related = get_posts( array( 
		   'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) );
		   if( $related ) { ?>
<h3 class="you-may-like"><?php echo esc_html_e( 'You May Also Like..', 'aquaparallax' ); ?></h3>
          <?php } ?>
		  
<div class="row">
	<?php  $related = get_posts( array( 
		   'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) );
	       if( $related ) foreach( $related as $post ) {
	        setup_postdata($post); 
	?>

<div class="col-md-4">
<div class="aqa-post-inner">
<?php the_post_thumbnail(array( 300,140 )); ?>
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<p><?php the_excerpt(); ?></p>
</div>
</div>
<?php 
}
wp_reset_postdata();
?>

</div>

	<?php comments_template( '', true ); ?>
</div>
</div>
</div>
</div>

<div class="col-md-4">
<div class="aqa-blog-side-bar">

<?php get_sidebar(); ?>

</div>
</div>
</div>
</div>
</div>

<?php get_footer(); ?>