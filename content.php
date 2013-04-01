<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <?php chiplife_featured_image(); ?>
  
  <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
  
  <div class="entry-meta">    
	<?php echo chiplife_post_date() . chiplife_post_comments() . chiplife_post_author() . chiplife_post_sticky() . chiplife_post_edit_link(); ?>
  </div><!-- .entry-meta -->
  
  <div class="entry-content clearfix">	
	<?php chiplife_post_style(); ?>
  </div> <!-- end .entry-content -->
  
  <?php echo chiplife_link_pages(); ?>
  
  <div class="entry-meta-bottom">    
  <?php echo chiplife_post_category() . chiplife_post_tags(); ?>    
  </div><!-- .entry-meta-bottom -->

</div> <!-- end #post-<?php the_ID(); ?> .post_class -->