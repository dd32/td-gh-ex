<?php get_header(); ?>
<div class="container">
  <div class="row">
  <?php do_action( 'themingstrap_entry_before' );?>
      <div class="main-content col-sm-8 col-md-8">
      <?php do_action( 'themingstrap_entry_before' );?>
	  <?php do_action( 'themingstrap_entry_top' );?>
      <?php if ( have_posts() ) : ?>
      	<?php /* Start the Loop */ ?>
      	<?php while ( have_posts() ) : the_post(); ?>
      		<?php get_template_part( 'content', get_post_format() ); ?>
      	<?php endwhile; ?>
        <?php ThemingStrap_pagination_nav(); ?>
      <?php endif; // end have_posts() check ?>
	  <?php do_action( 'themingstrap_entry_bottom' );?>	  
      </div><!--/main-content-->
    <?php get_sidebar(); ?>
	<?php do_action( 'themingstrap_entry_after' );?>
  </div><!--/row-->
</div><!--/.container-->
<?php get_footer(); ?>