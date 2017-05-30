<?php get_header(); ?>

<div class="aqa-content-area">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="aqa-pag">
   <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
       <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
         <div>
           <?php the_content(); ?>
         </div>
  <?php endwhile;  wp_reset_postdata(); ?>
  <?php endif; ?>
 </div>
</div>
</div>
</div>
</div>
<?php get_footer(); ?>