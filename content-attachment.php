<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <h1 class="entry-title entry-title-single"><?php the_title(); ?></h1>
  
  <div class="entry-meta">    
	<?php echo chiplife_post_date() . chiplife_post_comments() . chiplife_post_author() . chiplife_post_sticky() . chiplife_post_edit_link(); ?>
  </div><!-- .entry-meta -->
  
  <?php chiplife_loop_nav_singular(); ?>
  
  <div class="entry-content entry-attachment clearfix">
  	<p><a href="<?php echo wp_get_attachment_url( $post->ID ); ?>"><?php echo wp_get_attachment_image( $post->ID, 'large' ); ?></a></p>
    <?php the_excerpt(); ?>
  </div> <!-- end .entry-content -->
  
</div> <!-- end #post-<?php the_ID(); ?> .post_class -->

<?php chiplife_loop_nav_singular_attachment(); ?>

<?php comments_template( '', true ); ?>