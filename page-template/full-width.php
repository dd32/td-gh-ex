<?php 
/**
* Template Name: Full Width
**/
get_header(); 
?>
<div class="mini-content">
    <div class="col-md-12">
        <div class="col-md-12 no-padding-right">
        <?php
		if( have_posts() ) : while (have_posts()) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class('single-box'); ?>>                        
            <?php $besty_featured_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()));?>
            <?php 
			if($besty_featured_image){
				echo'<img src="'.$besty_featured_image.'" class="img-responsive" alt="'.get_the_title().'">';
			}
			?>            
            <div class="blog-title"><?php the_title();?></div>
            <div class="besty-post-content"><?php the_content(); ?>
            </div>            
            </div>            
         <?php
		endwhile; endif;
		 ?><?php comments_template(); ?>
        </div>        
    </div>    
    </div>
<?php get_footer(); ?>