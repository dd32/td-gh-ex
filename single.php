<?php 
/**
 * Single Post template file
**/
get_header(); 
?>
<div class="mini-content">
    <div class="col-md-9">
        <div class="col-md-12 no-padding-right">
        <?php
		if( have_posts() ) : while (have_posts()) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class('single-box'); ?>>
            <ul class="post-box-link">
                <?php besty_entry_meta();?> 
            </ul>            
            <?php $besty_featured_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()));?>
            <?php 
			if($besty_featured_image){
				echo'<img src="'.esc_url($besty_featured_image).'" class="img-responsive" alt="'.get_the_title().'">';
			}
			?>            
            <div class="blog-title"><?php the_title();?></div>
            <div class="besty-post-content"><?php the_content(); ?>
			<?php
				wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'besty' ),
						'after'  => '</div>',
				) );
			?>
            </div>            
            </div>            
         <?php
		endwhile; endif;		
		 ?>
		 <div class="col-md-12 besty-pagination besty-pagination-single">
      		<span class="besty-previous-link"><?php previous_post_link('%link', '&laquo; %title'); ?></span>
            <span class="besty-next-link"><?php next_post_link('%link', '%title &raquo; '); ?></span>
      </div>
		 <?php comments_template(); ?>          
        </div>
        
    </div>
    <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>
