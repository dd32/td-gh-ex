<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage bee-news
 */
?>

<div class="row">
	<div class="col-md-12">
	    <article id="post-<?php the_ID(); ?>" class="news-block news-block-article">
	        <header class="entry-header">
	        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	        <?php bee_news_meta_simplified(); ?>
	        </header>
	        <?php bee_news_excerpt(); ?>
	        <?php bee_news_post_thumbnail(); ?>

	        <div class="entry-content">

	        <?php
	            the_content();
	            wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bee-news' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'bee-news' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
	        ?>
	        </div>
			<footer class="entry-footer">
				<?php
					edit_post_link(
						sprintf(
							/* translators: %s: Name of current post */
							__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'bee-news' ),
							get_the_title()
						),
						'<span class="edit-link">',
						'</span>'
					);
				?>
			</footer><!-- .entry-footer -->
        </article>
    </div>
</div>
