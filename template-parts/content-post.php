<div class="col-md-6 entry-box-wrap grid-item">
  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <article class="entry-box">
    <div class="post-single">
      <div class="post-cat"> <?php echo get_the_category_list(', ');?> </div>
      <?php 
			$entry_class = 'no-img';
			if ( '' !== get_the_post_thumbnail() && ! is_single() ) : 
			$entry_class = '';
			?>
      <div class="post-img"> <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail( 'avata-featured-image' ); ?>
        </a> </div>
      <?php endif; ?>
      <div class="post-desk <?php echo $entry_class;?>">
        <?php the_title( '<h4 class="entry-title text-uppercase"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );?>
         <?php echo avata_posted_on();?>
        <p> <?php the_excerpt();?> </p>
        <a href="<?php the_permalink();?>" class="p-read-more"><?php _e('Read More', 'avata')?> <i class="fa fa-long-arrow-right"></i></a> </div>
    </div>
  </div>
  </article>
</div>