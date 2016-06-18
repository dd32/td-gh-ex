<?php get_header(); ?>
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="post-title"><?php the_title(); ?></h1>
				<div class="post-date"><?php echo get_the_date(get_option('date_format'));?></div>
				<?php		
				if ( is_attachment() ) {
					echo '<div class="fullimg">' . wp_get_attachment_image('','full'). '</div>';
					if ( ! empty( $post->post_excerpt ) ) :
							echo '<br /><p>' . the_excerpt() .'</p>';
					endif;				
				} else {
					if (strpos($post->post_content,'[gallery') === false){
						if ( has_post_thumbnail()){
							the_post_thumbnail();
						}
					}
					the_content();
					wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages: ', 'bunny' ), 'after' => '</div>' ) ); 
				}
				bunny_meta();
				?>	
			</div>
	<?php
	endwhile;
	if ( ! is_attachment() ) {

		next_post_link('<div class="newer-posts">%link &rarr;</div>');
		previous_post_link('<div class="older-posts">&larr; %link </div>');
	}
	
	comments_template( '', true ); 
	?>
</div>

<?php
if ( is_active_sidebar( 'sidebar_widget' ) ) {
	get_sidebar(); 
}
get_footer(); 
?>