<?php
/**
 * @package blogghiamo
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta smallPart">
			<?php blogghiamo_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	
	<?php
		if ( '' != get_the_post_thumbnail() ) {
			echo '<div class="entry-featuredImg"><a href="' .get_permalink(). '"><span class="overlay-img"></span>';
			the_post_thumbnail('blogghiamo-normal-post');
			echo '</a></div>';
		}
	?>

	<div class="entry-summary">
		<?php if ( '' != get_the_post_thumbnail() ): ?>
		<div class="crestaPostStripeInner">
			<i class="fa fa-lg fa-pencil"></i>
		</div>
		<?php endif; ?>
		
		<?php 
			$showfullpost = get_theme_mod('blogghiamo_theme_options_postshow', '1');
		?>
		<?php if ( $showfullpost == 1 ) : ?>
			<?php the_excerpt(); ?>
		<?php else: ?>
			<?php the_content(); ?>
		<?php endif; ?>
		
	</div><!-- .entry-content -->

	<footer class="entry-footer smallPart">
		<?php edit_post_link( __( 'Edit', 'blogghiamo' ), '<span class="edit-link"><i class="fa fa-wrench spaceRight" aria-hidden="true"></i>', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
