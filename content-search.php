<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <?php $entry_title = ( 'page' == get_post_type() && chiplife_post_edit_link() == '' )? 'entry-title entry-title-page' : 'entry-title'; ?>
  <h2 class="<?php echo $entry_title; ?>"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
  
  <?php if ( 'post' == get_post_type() ) : ?>  
  <div class="entry-meta">    
	<?php echo chiplife_post_date() . chiplife_post_comments() . chiplife_post_author() . chiplife_post_sticky() . chiplife_post_edit_link(); ?>
  </div><!-- .entry-meta -->  
  <?php elseif ( 'page' == get_post_type() && chiplife_post_edit_link() != '' ) : ?>  
  <div class="entry-meta"> 
    <?php echo chiplife_post_edit_link(); ?> 
  </div>  
  <?php endif;?>
  
  <?php chiplife_featured_image(); ?>  
  
  <div class="entry-content clearfix">
	<?php chiplife_post_style(); ?>
  </div> <!-- end .entry-content -->
  
  <?php echo chiplife_link_pages(); ?>
  
  <?php if ( 'post' == get_post_type() ) : ?>
  <div class="entry-meta-bottom">    
  <?php echo chiplife_post_category() . chiplife_post_tags(); ?>    
  </div><!-- .entry-meta-bottom -->
  <?php endif; ?>

</div> <!-- end #post-<?php the_ID(); ?> .post_class -->