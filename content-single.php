<?php
/**
 * @package Atomic
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		
	</header><!-- .entry-header -->

	<div class="entry-content">

		<div class="entry-meta">
			
			<div class="meta-list">	
				<?php atomic_display_categories(); atomic_comment_count(); //atomic_display_edit(); ?>
			</div>
		</div><!-- .entry-meta -->
		<?php if ( '' != get_theme_mod( 'post_sidebar' ) ) { get_sidebar();} ?>




		<!-- Get the featured image -->
		
		<?php the_content(); ?>

		<?php atomic_display_tags() ?>

		<?php echo '<span class="vcard author"><span class="fn">' . get_the_author() . '</span></span>'; ?>
		
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'atomic' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer clear">
		
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->