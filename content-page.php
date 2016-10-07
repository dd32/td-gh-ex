<?php // The template for displaying page content ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php bento_post_thumbnail(); ?>
	
	<?php if ( get_post_meta( $post->ID, 'bento_hide_title', true ) != 'on' && get_post_meta( $post->ID, 'bento_activate_header', true ) != 'on' ) { ?>
    <header class="entry-header">
		<?php 
		// Main title
		the_title( '<h1 class="entry-title">', '</h1>' ); 
		// Subtitle
		if ( get_post_meta( $post->ID, 'bento_subtitle', true ) != '' ) {
			echo '
				<div class="post-header-subtitle">
					'.esc_html( get_post_meta( $post->ID, 'bento_subtitle', true ) ).'
				</div>
			';
		}
		?>
	</header>
    <?php } ?>
    
    <div class="entry-content clear">
		<?php the_content(); ?>
	</div>

</article>