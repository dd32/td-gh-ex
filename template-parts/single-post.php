<?php
/**
 * The template part for displaying services
 *
 * @package bb wedding bliss
 * @subpackage bb_wedding_bliss
 * @since bb wedding bliss 1.0
 */
?>
<article>
	<h1><?php the_title();?></h1>
	<div class="metabox">
		<span class="entry-date"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo esc_html( get_the_date() ); ?></span>
		<span class="entry-author"><i class="fa fa-user" aria-hidden="true"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
		<span class="entry-comments"><i class="fa fa-comments" aria-hidden="true"></i> <?php comments_number( __('0 Comment', 'bb-wedding-bliss'), __('0 Comments', 'bb-wedding-bliss'), __('% Comments', 'bb-wedding-bliss') ); ?> </span>
	</div>
	<?php if(has_post_thumbnail()) { ?>
		<hr>
		<div class="feature-box">	
			<?php the_post_thumbnail(); ?>
		</div>
		<hr>					
	<?php } 
	the_content();

	wp_link_pages( array(
		'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bb-wedding-bliss' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
		'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'bb-wedding-bliss' ) . ' </span>%',
		'separator'   => '<span class="screen-reader-text">, </span>',
	) );
		
	if ( is_singular( 'attachment' ) ) {
		// Parent post navigation.
		the_post_navigation( array(
			'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'bb-wedding-bliss' ),
		) );
	}   elseif ( is_singular( 'post' ) ) {
		// Previous/next post navigation.
		the_post_navigation( array(
			'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'bb-wedding-bliss' ) . '</span> ' .
				'<span class="screen-reader-text">' . __( 'Next post:', 'bb-wedding-bliss' ) . '</span> ' .
				'<span class="post-title">%title</span>',
			'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'bb-wedding-bliss' ) . '</span> ' .
				'<span class="screen-reader-text">' . __( 'Previous post:', 'bb-wedding-bliss' ) . '</span> ' .
				'<span class="post-title">%title</span>',
		) );
	}

	echo '<div class="clearfix"></div>';

	the_tags(); 

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}?>
</article>