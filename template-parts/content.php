
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
			<?php
			if ( is_single() ) :
				the_title( '<h2 class="title">', '</h2>' );
			else :
				the_title( '<h2 class="title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
			endif;
			?>
			<p class="post-info">
				<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
				<span class="post-author"><?php the_author_link(); ?></span>
				<span class="post-categories"><?php the_category( ', ' ); ?></span>
				<?php comments_popup_link( 'Comment', '1&nbsp;Comment', '%&nbsp;Comments', 'post-comments', '' ); ?>
				<?php edit_post_link( __( '[Edit]', 'arix' ) ); ?>
			</p>
		</header>

		<div class="post-content">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}
			the_content( 'Continue...', false, 'arix' );
			?>
		</div>

		<?php if ( is_single() ) : ?>
		<footer>
			<?php wp_link_pages(); ?>
			<p><?php the_tags( '<span class="post-tags">' . __( 'Tags:', 'arix' ) . '</span> ', ', ' ); ?></p>
		</footer>
		<?php endif; ?>
	</article>
