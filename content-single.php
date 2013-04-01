<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <h1 class="entry-title entry-title-single"><?php the_title(); ?></h1>
  
  <div class="entry-meta">    
	<?php echo chiplife_post_date() . chiplife_post_comments() . chiplife_post_author() . chiplife_post_sticky() . chiplife_post_edit_link(); ?>
  </div><!-- .entry-meta -->
  
  <div class="entry-content clearfix">
  	<?php the_content(); ?>
  </div> <!-- end .entry-content -->
  
  <?php echo chiplife_link_pages(); ?>
  
  <div class="entry-meta-bottom">
  <?php echo chiplife_post_category() . chiplife_post_tags(); ?>
  </div><!-- .entry-meta -->

</div> <!-- end #post-<?php the_ID(); ?> .post_class -->

<?php chiplife_author(); ?> 

<?php comments_template( '', true ); ?>