<?php
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<h2 class="storytitle">dygdygdgdgdafg<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

<div class="meta">
<?php edit_post_link(__('Edit This', 'northern-web-coders')); ?>
</div>

<div class="entry-attachment">
       <?php $image_size = apply_filters( 'wporg_attachment_size', 'large' ); 
             echo wp_get_attachment_image( get_the_ID(), $image_size ); ?>
 
           <?php if ( has_excerpt() ) : ?>
       
           <div class="entry-caption">
                 <?php the_excerpt(); ?>
           </div><!-- .entry-caption -->
       <?php endif; ?>
</div><!-- .entry-attachment -->




<div class="pagenav">
<span class="previous"><?php previous_image_link( false, __( '&laquo; Previous' , 'northern-web-coders' ) ); ?></span> -
<span class="next"><?php next_image_link( false, __( 'Next &raquo;' , 'northern-web-coders' ) ); ?></span>
</div>

</article>

<?php endwhile; endif; ?>

<?php comments_template( '', true ); ?> 
        
<div class="pagenav">
<span class="previous"><?php previous_post_link('%link'); ?></span> - <span class="next"><?php next_post_link('%link'); ?></span>
</div>

</div>

<?php get_sidebar(''); ?>

<?php get_footer(); ?>
