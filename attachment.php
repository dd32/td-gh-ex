<?php
	get_header();
	if(have_posts()) : 
	while(have_posts()) : the_post();
		get_template_part( 'inc/loop', 'attachment' );
		comments_template( '', true );
		
	endwhile;
		
	else :	
		get_template_part( 'inc/loop', 'none' );
	endif;
	
	echo '</div><!--#hjylPosts-->';
	
	if(!bb10_IsMobile) get_sidebar();
	
	get_footer();
?>