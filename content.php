<?php
/**
* @package beam
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
		<?php beam_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php 
		the_post_thumbnail('thumbnail', array('class' => 'alignleft'));
		the_excerpt(); 
		?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	
	<div class="entry-content">
		<?php 
		the_post_thumbnail('thumbnail', array('class' => 'alignleft'));
		
		the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'beam' ) ); 
		
		wp_link_pages( array(
		'before' => '<div class="page-links round-corners">' . __( 'Pages:', 'beam' ),
		'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
	<?php
		// See inc/template-tags.php L255
		beam_entry_footer()
		?>
	</footer><!-- .entry-meta -->

</article><!-- #post-## -->
