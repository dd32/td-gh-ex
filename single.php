<?php get_header(); 
	$cherish_color_meta_value = get_post_meta( get_the_ID(), 'meta-color', true );
	echo '<div class="container" style="background:' . $cherish_color_meta_value . ';">';
	if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1 class="post-title"><?php the_title(); ?></h1>
		<?php
		if ( is_attachment() ) {
			echo '<div class="fullimg">' . wp_get_attachment_image('','full'). '</div>';
			if ( ! empty( $post->post_excerpt ) ) :
					echo '<br /><p>' . the_excerpt() .'</p>';
			endif; 					
			next_image_link();
			previous_image_link();
		} else {
			if ( has_post_thumbnail()){
				the_post_thumbnail();
			}
			the_content();
			wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages: ', 'cherish' ), 'after' => '</div>' ) ); 
		}
		cherish_meta();

	endwhile;
next_post_link('<div class="newer-posts">%link &rarr;</div>');
previous_post_link('<div class="older-posts">&larr; %link </div>');
comments_template( '', true ); 
echo '</div>';
echo '</div>';
get_footer(); 
?>