<?php 
/**
 * The main page template file.
**/
get_header(); ?>
<div class="mini-content">
    <div class="col-md-9">
        <div class="col-md-12 no-padding-right">
        <?php if( have_posts() ) : while (have_posts()) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class('single-box'); ?>>                        
            <?php $besty_featured_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()));
			if($besty_featured_image){
				echo'<img src="'.esc_url($besty_featured_image).'" class="img-responsive" alt="'.get_the_title().'">';
			} ?>
            <div class="blog-title"><?php the_title();?></div>
            <div class="besty-post-content"><?php the_content(); ?>
		<?php wp_link_pages( array(
			    'before' => '<div class="page-links">' . __( 'Pages:', 'besty' ),
			    'after' => '</div>',
		    ) ); ?>
			</div>            
            </div>
         <?php endwhile; endif;
         comments_template(); ?>
        </div>
    </div>
    <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>