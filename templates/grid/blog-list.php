<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post clear-fix'); ?>>
				
	<div class="post-media">
		<a href="<?php echo esc_url( get_permalink() ); ?>"></a>
		<?php the_post_thumbnail('bard-list-thumbnail'); ?>
	</div>

	<div class="post-content-wrap">
		<header class="post-header">

			<?php if ( bard_options( 'blog_page_show_categories' ) === true ) : ?>
			<div class="post-categories"><?php the_category( ',&nbsp;&nbsp;' ); ?></div>
			<?php endif; ?>

			<?php if ( get_the_title() ) : ?>
			<h1 class="post-title">
				<a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a>
			</h1>
			<?php endif; ?>

			<div class="post-meta clear-fix">

				<?php if ( bard_options( 'blog_page_show_author' ) === true ) : ?>
				<span class="post-author"><?php the_author_posts_link(); ?></span>
				<?php endif; ?>

				<?php if ( bard_options( 'blog_page_show_date' ) === true ) : ?>			
				<span class="meta-sep">/</span>
				<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
				<?php endif; ?>

				<?php if (  bard_options( 'blog_page_show_comments' ) === true && comments_open() ) : ?>
				<span class="meta-sep">/</span>
					<?php comments_popup_link( esc_html__( 'No Comments', 'bard' ), esc_html__( '1 Comment', 'bard' ), '% '. esc_html__( 'Comments', 'bard' ), 'post-comments'); ?>
				<?php endif; ?>
				
			</div>
			
		</header>

		<?php if ( bard_options( 'blog_page_post_description' ) !== 'none' ) : ?>

		<div class="post-content">
			<?php

			if ( bard_options( 'blog_page_post_description' ) === 'content' ) {
				the_content('');
			} elseif ( bard_options( 'blog_page_post_description' ) === 'excerpt' ) {
				bard_excerpt( 33 );												
			}
			
			?>
		</div>

		<?php endif; ?>

		<div class="read-more">
			<a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'read more','bard' ); ?></a>
		</div>
		
	</div>

</article>