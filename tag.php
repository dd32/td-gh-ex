<?php 
/**
 * Tag template file 
**/
get_header(); ?>
<div class="mini-content">
    <div class="col-md-9">
    <div class="col-md-12 single-box">
      <h1 class="blog-title"><?php esc_html_e( 'Tags', 'besty' ); echo ' : '. single_tag_title( '', false ) ?></h1>
		</div>
    <div class="masonry-container">    	
        <?php if( have_posts() ) : while (have_posts()) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class('col-md-6 box'); ?>>
            <div class="post-box article">
            <?php
            $besty_featured_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
            if($besty_featured_image != "") { ?> <a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($besty_featured_image); ?>" class="img-responsive besty-thumbnail" /></a><?php }
             ?>  
            <a href="<?php echo esc_url( get_permalink() ); ?>" class="blog-title"><?php the_title();?></a>
            <ul class="post-box-link">
              <?php besty_entry_meta();?> 
            </ul>                        
            </div>
            </div>
         <?php endwhile; endif; ?>
         </div>
         <div class="col-md-12 besty-pagination">
			<span class="besty-previous-link"><?php previous_posts_link(__('Previous','besty').' &raquo;'); ?></span>
            <span class="besty-next-link"><?php next_posts_link(__('Next','besty').' &raquo;'); ?></span>
      </div>
    </div>
    <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>