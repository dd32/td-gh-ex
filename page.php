<?php get_header(); ?>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="post-title"><?php the_title(); ?></h1>
				<?php 
				bunny_breadcrumbs();
				if (strpos($post->post_content,'[gallery') === false){
					if ( has_post_thumbnail()){
						the_post_thumbnail();
					}
				}
				the_content();
				wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages: ', 'bunny' ), 'after' => '</div>' ) );
				echo '<br />';
				if (get_theme_mod( 'bunny_meta' ) == '') {
				?>
					<div class="page-link"><?php edit_post_link(' <i class="edit-links fa"></i> '); ?></div>
				<?php 
				}
				?>
			</div>
<?php
endwhile;
comments_template( '', true );
?>
</div>
<?php 
if (is_active_sidebar('sidebar_widget')){
	get_sidebar(); 
}
get_footer(); 
?>