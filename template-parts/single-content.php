<h1><?php the_title();?></h1>
<div class="metabox">
	<span class="entry-date"><i class="fas fa-calendar-alt"></i><?php echo esc_html( get_the_date() ); ?></span>
	<span class="entry-author"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
	<span class="entry-comments"><i class="fas fa-comments"></i> <?php comments_number( __('0 Comment', 'advance-portfolio'), __('0 Comments', 'advance-portfolio'), __('% Comments', 'advance-portfolio') ); ?> </span>
</div>
<?php if(has_post_thumbnail()) { ?>
	<hr>
	<div class="feature-box">	
		<img src="<?php the_post_thumbnail_url('full'); ?>" >
	</div>
	<hr>
<?php } 
the_content();

wp_link_pages( array(
	'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'advance-portfolio' ) . '</span>',
	'after'       => '</div>',
	'link_before' => '<span>',
	'link_after'  => '</span>',
	'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'advance-portfolio' ) . ' </span>%',
	'separator'   => '<span class="screen-reader-text">, </span>',
) );
	
if ( is_singular( 'attachment' ) ) {
	// Parent post navigation.
	the_post_navigation( array(
		'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'advance-portfolio' ),
	) );
} elseif ( is_singular( 'post' ) ) {
	// Previous/next post navigation.
	the_post_navigation( array(
		'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'advance-portfolio' ) . '</span> ' .
			'<span class="screen-reader-text">' . __( 'Next post:', 'advance-portfolio' ) . '</span> ' .
			'<span class="post-title">%title</span>',
		'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'advance-portfolio' ) . '</span> ' .
			'<span class="screen-reader-text">' . __( 'Previous post:', 'advance-portfolio' ) . '</span> ' .
			'<span class="post-title">%title</span>',
	) );
}

echo '<div class="clearfix"></div>'; 
the_tags(); 

// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) {
	comments_template();
}
?>