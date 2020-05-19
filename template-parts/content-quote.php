<?php
/**
 * The template for displaying  posts with post format quote.
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
		echo '<span class="featured-post"><span class="fa fa-thumb-tack"></span>' . __( 'Featured', 'bassist' ) . '</span>';
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
		<?php edit_post_link('<span class="fa fa-pencil" aria-hidden="true"></span>'. __('Edit', 'bassist') ) ?>
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
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<?php bassist_entry_footer(); ?>

</article><!-- #post-## -->

