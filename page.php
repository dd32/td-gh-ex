<?php get_header(); ?>
<div class="container">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="post-title"><?php the_title(); ?></h1>
				<?php
				the_content();
					wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages: ', 'cherish' ), 'after' => '</div>' ) );
				?>					
				<div class="page-link"><?php edit_post_link( __( 'Edit', 'cherish' ) . '<span class="screen-reader-text">' . get_the_title( $id ) . '</span>'); ?></div>
	<?php
	endwhile;
	comments_template( '', true );
	?>
</div>
</div>
<?php
get_footer(); 
?>