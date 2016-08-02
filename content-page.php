<?php
/**
* The template used for displaying page content in page.php
*
* @package beam
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php 
	if (strlen(get_the_title()) != 0) {

	//if (get_the_title() =! '' ) 
	?>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
	<?php 
	} 
	
	// If the post has a Post Thumbnail assigned to it.
	if ( has_post_thumbnail() ) {
	
	?>
	<div class="featured-image">
		<?php
		
		the_post_thumbnail();
		
		?>
	</div>
	<?php
	} 
	?>

	<div class="entry-content-page">
		<?php 
	
		the_content();
		
		wp_link_pages( array(
		'before' => '<div class="page-links round-corners">' . esc_html__( 'Pages:', 'beam' ),
		'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content-page -->
	

	<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'beam' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	?>
	
</article><!-- #post-## -->
