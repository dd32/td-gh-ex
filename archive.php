<?php 
/**
 * The Archive template file
**/
get_header(); 
?>
<div class="mini-content">
    <div class="col-md-9">
    <div class="col-md-12 single-box">
		<h1 class="blog-title">
		<?php
		if ( is_day() ) :
				printf( __( 'Daily Archives : %s', 'besty' ), get_the_date( _x( 'd F, Y', 'Daily archives date format', 'besty' ) ) );
		elseif ( is_month() ) :
				printf( __( 'Monthly Archives : %s', 'besty' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'besty' ) ) );
		elseif ( is_year() ) :
				printf( __( 'Yearly Archives : %s', 'besty' ), get_the_date( _x( 'Y', 'yearly archives date format', 'besty' ) ) );
		else :
				_e( 'Archives', 'besty' );
		endif;
		?>
		</h1>
    </div>
    <div class="masonry-container">    	
        <?php
		if( have_posts() ) : while (have_posts()) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class('col-md-6 box'); ?>>
            <div class="post-box article">
            <?php 
			if(get_post_thumbnail_id(get_the_ID())) {
			  $besty_featured_image = wp_get_attachment_link( get_post_thumbnail_id(get_the_ID()), 'besty-thumbnail', true ); 
			  echo $besty_featured_image;
			}
			?>            
            <a href="<?php echo get_the_permalink(); ?>" class="blog-title"><?php the_title();?></a>
            <ul class="post-box-link">
                <?php besty_entry_meta();?> 
            </ul>                        
            </div>
            </div>
         <?php
		endwhile; endif;
		 ?>         
         </div>
         <div class="col-md-12 besty-pagination">
      		<span class="besty-previous-link"><?php previous_posts_link('&laquo; Previous'); ?></span>
            <span class="besty-next-link"><?php next_posts_link('Next &raquo;'); ?></span>
      </div>
    </div>
    <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>