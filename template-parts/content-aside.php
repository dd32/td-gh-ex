<?php
/**
 * The template for displaying  posts with post format aside.
 *
 * Used for index/archive/search.
 *
 * @package Bassist
 * @since Bassist 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<header class="entry-header">

<?php
	bassist_entry_title();

	if ( is_sticky() && is_home() && ! is_paged() ) {
		echo '<span class="featured-post"><i class="fa fa-thumb-tack"></i>' . __( 'Featured', 'bassist' ) . '</span>';
	}
?>
	<div class="entry-meta">
		<?php
			// This is used for the styling of post formats.
			$format = get_post_format(); 
			if ($format):
				bassist_post_format_info();
			endif;
		?>

		<span class="byline">
			<?php
				if ( 'post' == get_post_type() ) {
				// Translators: there is a space after "By".
				print(__('By ', 'bassist'));
				printf( '<a href="%1$s" rel="author"><i class="fa fa-user" aria-hidden="true"></i>%2$s</a>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author() );
				}
			?>
		</span><!--.byline -->
		<?php edit_post_link('<i class="fa fa-pencil" aria-hidden="true"></i>'. __('Edit', 'bassist') ) ?>
	</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() ) : ?>
	<div class="post-thumbnail">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
    	<?php the_post_thumbnail(); ?>
		</a>
	</div><!-- post-thumbnail -->
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content();?>
	</div><!-- .entry-content -->

	<?php bassist_entry_footer(); ?>

</article><!-- #post-## -->

