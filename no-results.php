<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package ThinkUpThemes
 */
?>

				<article id="no-results">
					<header class="entry-header">
						<h1 class="entry-title"><?php echo 'Nothing Found'; ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

							<p><?php printf( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', admin_url( 'post-new.php' ) ); ?></p>

						<?php elseif ( is_search() ) : ?>

							<p><?php echo 'Sorry, but nothing matched your search terms. Please try again with some different keywords.'; ?></p>
							<?php get_search_form(); ?>

						<?php else : ?>

							<p><?php echo 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.'; ?></p>
							<?php get_search_form(); ?>

						<?php endif; ?>
					</div><!-- .entry-content -->
				</article><!-- #no-results -->
