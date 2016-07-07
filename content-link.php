<?php
/**
 * @package mwsmall
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header post-link">
		
		<div class="entry-content post-link clearfix">
			<?php the_content( __( '[...]', 'mw-small' ) );	?>
		</div><!-- .entry-content -->
		<div class="mw_title">

			<?php mwsmall_post_icon(); ?>
			<?php if( is_sticky() ) { ?> <span class="sticky-post"><i class="fa fa-star-o fa-2x"></i></span> <?php } ?>

		</div><!-- .mw_title -->

	</header><!-- .entry-header -->
	
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary clearfix">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php endif; ?>
	
	<?php edit_post_link( __( 'Edit', 'mw-small' ), '<span class="edit-link">', '</span>' ); ?>
	
</article><!-- #post-## -->