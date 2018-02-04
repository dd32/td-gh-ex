<?php
/**
 * Template part for displaying quote
 *
 */

?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if(is_single()){ ?>
					<header>
						<?php if ( '' !== get_the_title() ) : ?>
								<h2><i class="fa fa-quote-left" aria-hidden="true"></i> <a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php the_title_attribute( array( 'before' => '', 'after' => '' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							
						<?php else : ?>

						<div class="aside-date">
						<h2>
							<i class="fa fa-quote-left" aria-hidden="true"></i> 
							<a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php the_title_attribute( array( 'before' => '', 'after' => '' ) ); ?>" rel="bookmark">
							<span class="aside-day"><?php the_time( 'Y.m.d' ); ?></span>
							</a>
						</h2>
						</div>
						<?php endif; ?>
					</header>
					<?php } ?>
					
					<section class="hjylEntry">
					<?php
						the_content();
						wp_link_pages( array( 'before' => '<nav class="page-link"><i class="fa fa-folder-open" aria-hidden="true"></i> <span>' . __( 'Pages:', 'bb10' ) . '</span>', 'after' => '</nav>' ) );
					?>
					</section>
					<div class="clear"></div>
					<footer>
						<?php if(is_single()) {the_tags('<p class="tags"><i class="fa fa-tags"></i> ', ', ', '</p>'); }; ?>
						<?php edit_post_link( __( 'Edit', 'bb10' ), '<span class="fa fa-pencil-square-o edit-link"> ', '</span>' ); ?>
					</footer>
				</article><!-- #post-<?php the_ID(); ?> -->