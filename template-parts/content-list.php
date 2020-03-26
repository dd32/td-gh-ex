<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package optimize
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
	  <header class="entry-header">
          <strong class="d-inline-block mb-2 text-gray-dark">
		   <?php if ( 'post' === get_post_type() ) : ?>
		  <div class="entry-meta">		 
			<?php
			optimize_posted_on();
			optimize_posted_by();
			?>
			<?php optimize_entry_footer(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		</strong>
	</header><!-- .entry-header -->
	  <?php the_title( sprintf( '<h2 class="entry-title col-12"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	 <?php if ( has_post_thumbnail()) { ?>
	  <div class="col-4 d-sm-block d-mb-block d-lg-block">
         <?php optimize_post_thumbnail(); ?>
        </div>
        <div class="col-8 d-flex flex-column position-static">
	 <?php } else { ?>
		<div class="col-12 d-flex flex-column position-static">
		<?php } ?>
		  <div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->	  
		  <div class="readmore text-right">
		<a href="<?php echo esc_url( get_permalink()); ?>"><?php echo esc_attr('Continue reading','optimize'); ?></a></div>
        </div>  		
      </div>