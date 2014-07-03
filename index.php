<?php 
get_header();
	while ( have_posts() ) : the_post(); 
		$cherish_color_meta_value = get_post_meta( get_the_ID(), 'meta-color', true );
		if ($cherish_color_meta_value == '' AND is_sticky()){
			echo '<div class="container" style="background:#edaeae">';
		}else{		
			echo '<div class="container" style="background:' . esc_attr($cherish_color_meta_value) . ';">';
		}
		get_template_part( 'content', get_post_format() ); 
		echo '</div>';
	endwhile;
	
	echo '<div class="nav">';
	if( get_next_posts_link() ){
		echo '<div class="newer-posts">';
		next_posts_link(__('Next page &rarr;', 'cherish'));
		echo '</div>'; 
	}
	if( get_previous_posts_link() ){
		echo '<div class="older-posts">';
		previous_posts_link(__('&larr; Previous page','cherish'));
		echo '</div>'; 
	}
	echo '</div>';
get_footer(); 
?>