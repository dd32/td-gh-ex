<?php 
get_header(); 
if ( have_posts() ) :

	while (have_posts() ) : the_post(); 
		get_template_part( 'content', get_post_format() ); 
	endwhile; 

	the_posts_navigation( array( 'prev_text' => __('&larr; Previous page','bunny'), 'next_text' => __('Next page &rarr;', 'bunny') ) );
	
endif;
?>
<br/><br/>
</div>

<?php
if ( is_active_sidebar( 'sidebar_widget' ) ) {
	get_sidebar(); 
}

get_footer(); 
?>