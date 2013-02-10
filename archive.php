<?php get_header(); ?>


<?php get_template_part( 'template-part', 'wrap-before' ); ?>

				<?php if (have_posts()) : ?>

					<header class="entry-header page-header">
						<h1 class="entry-title">
							<?php
							if ( is_category() ) {
								printf( __( 'Category archives: %s', 'activetab' ), '<span>' . single_cat_title( '', false ) . '</span>' );
								echo '<a href="'.get_category_feed_link( get_query_var( 'cat' ) ).'" class="rss-feed-link rss-feed-link-category" title="'.__( 'category rss feed', 'activetab' ).'"></a>';

							} elseif ( is_tag() ) {
								printf( __( 'Tag archives: %s', 'activetab' ), '<span>' . single_tag_title( '', false ) . '</span>' );
								echo '<a href="'.get_tag_feed_link( get_query_var( 'tag_id' ) ).'" class="rss-feed-link rss-feed-link-tag" title="'.__( 'tag rss feed', 'activetab' ).'"></a>';

							} elseif ( is_author() ) {
								/* Queue the first post, that way we know what author we're dealing with (if that is the case). */
								the_post();
								printf( __( 'Author archives: %s', 'activetab' ), '<span class="vcard">' . get_the_author() . '</span>' );
								/* Since we called the_post() above, we need to rewind the loop back to the beginning that way we can run the loop properly, in full. */
								rewind_posts();
								echo '<a href="'.get_author_feed_link( get_the_author_meta( 'ID' ) ).'" class="rss-feed-link rss-feed-link-author" title="'.__( 'author rss feed', 'activetab' ).'"></a>';

							} elseif ( is_day() ) {
								printf( __( 'Daily archives: %s', 'activetab' ), '<span>' . get_the_date() . '</span>' );

							} elseif ( is_month() ) {
								printf( __( 'Monthly archives: %s', 'activetab' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

							} elseif ( is_year() ) {
								printf( __( 'Yearly archives: %s', 'activetab' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

							} else {
								_e( 'Archives', 'activetab' );

							}
							?>
						</h1>

						<?php
						if ( is_category() ) {
							// show an optional category description
							$category_description = category_description();
							if ( ! empty( $category_description ) )
								echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

						} elseif ( is_tag() ) {
							// show an optional tag description
							$tag_description = tag_description();
							if ( ! empty( $tag_description ) )
								echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
						}
						?>

					</header> <!-- /.entry-header /.page-header -->


					<?php echo activetab_nav(); ?>

					<?php while ( have_posts() ) : the_post(); // the loop ?>

						<?php get_template_part( 'content', 'list' ); ?>

					<?php endwhile; // end of the loop ?>

					<?php echo activetab_nav(); ?>

				<?php else : ?>

					<?php get_template_part( 'template-part', 'nothing-found' ); ?>

				<?php endif; ?>

<?php get_template_part( 'template-part', 'wrap-after' ); ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>