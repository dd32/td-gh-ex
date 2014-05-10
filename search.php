<?php get_header(); ?>
<div class="container">
	<?php 
	if ( have_posts() && strlen( trim(get_search_query()) ) != 0 ) {
	?>
		<div class="search-post"> 	
			<h1 class="post-title"><?php printf( __( 'Search Results for: %s', 'cherish'), get_search_query()); ?></h1>		
			<?php get_search_form(); ?>
		</div>
		<?php while ( have_posts() ) : the_post(); ?> 					
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<?php
				if (strpos($post->post_content,'[gallery') === false){
					if ( has_post_thumbnail()) {
						the_post_thumbnail();
					}
				}
				the_content(); 
				wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages: ', 'cherish' ), 'after' => '</div>' ) ); 
				cherish_meta();
				?>						
			</div>
		<?php endwhile; 
	}else{
	?>
		<div class="search-post"> 	
			<h1 class="post-title"><?php _e( 'No results found', 'cherish'); ?></h1>

			<?php get_search_form(); ?>
		</div>
	<?php
	}
	?>
</div>
<?php get_footer(); ?> 