<?php
/*
# ======================================================
# content-image.php
#
# The default template for displaying image post type
# ======================================================
*/
?>

<!-- Start single post -->
<article id="post-<?php the_ID(); ?>" <?php post_class( 'masonry-entry col-md-4' ); ?>>
	<?php if( is_sticky() ) { ?> <span class="sticky-post"><i class="fa fa-paperclip"></i></span> <?php } ?>
	<div class="post-wrapper">
			
		<?php if ( has_post_thumbnail() ) : ?>

			<div class="post-thumb">

				<a class="text-center" href="<?php the_permalink(); ?>" rel="bookmark"  title="<?php the_title_attribute(); ?>" >
					<h2 class="post-title">
						<?php the_title(); ?>
					</h2>

					<?php the_post_thumbnail( 'post-thumbnail' ); ?>
				</a>

		<?php else: ?>

			<div class="post-thumb nothumb">

		<?php endif; ?>

				<div class="post-meta-1">
					<?php akyl_post_meta( 'date' ); ?>
					<?php akyl_post_meta( 'comment' ); ?>
					<div class="clearfix"></div>
				</div>

			</div>
	</div>
</article>
<!-- End single post -->