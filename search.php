<?php
/*
 * The search template file 
*/
get_header(); ?>
<!-- Details Start  -->
<div class="mini-content archive">
    <div class="col-md-9">
    <div class="col-md-12 single-box">
		<h1 class="blog-title"><?php _e( 'Search Results for', 'besty' ); echo ' : '. get_search_query(); ?></h1>
	</div>
    <div class="masonry-container">    	
        <?php if( have_posts() ) : while (have_posts()) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class('col-md-6 box'); ?>>
            <div class="post-box article">
            <?php 
			if(get_post_thumbnail_id(get_the_ID())) {
			  $besty_featured_image = wp_get_attachment_link( get_post_thumbnail_id(get_the_ID()), 'besty-thumbnail', true ); 
			  echo $besty_featured_image;
			} ?>
            <a href="<?php echo esc_url( get_permalink() ); ?>" class="blog-title"><?php the_title();?></a>
            <ul class="post-box-link">
                <?php besty_entry_meta();?> 
            </ul>                        
            </div>
            </div>
         <?php endwhile; endif; ?>
         </div>
         <div class="col-md-12 besty-pagination">
		  <?php if (function_exists('faster_pagination') ) { faster_pagination(); } else { ?>
			<span class="besty-previous-link"><?php previous_posts_link(__('Previous','besty').' &raquo;'); ?></span>
            <span class="besty-next-link"><?php next_posts_link(__('Next','besty').' &raquo;'); ?></span>
		 <?php } ?>
      </div>
    </div>
    <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>