<?php query_posts( array ( 'category_name' => 'post-formats', 'posts_per_page' => -1 ) ); ?>
<div class="container">
	<div class="multiple-items">
		<?php if ( have_posts() ) : ?>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class=" animated fadeIn">
					<div class="slide-content">
						<?php 
							if ( has_post_thumbnail() ) {
								$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
								echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute( 'echo=0' ) . '" >';
								echo get_the_post_thumbnail( $post->ID, 'post-thumb-1170' ); 
								echo '</a>';
							}
							else{
								$dummy_img = '<img src="http://placehold.it/288x180">';
								echo $dummy_img;
							}
						?>
						<h2><?php the_title( sprintf( '<span class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></span>' ); ?></h2>
						<p>

						</p>
					</div>
				</div>
			<?php endwhile; ?>
			<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
			
		<?php endif; ?>
	</div>
</div>