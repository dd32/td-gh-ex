<?php
/**
 * The template part for displaying slider
 * @package Academic Education 
 * @subpackage academic_education
 * @since 1.0
 */
?>

<h1><?php the_title();?></h1>
<div class="adminbox">
	<i class="fas fa-calendar-alt"></i><span><?php echo esc_html( get_the_date() ); ?></span>
	<i class="fas fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
	<i class="fas fa-comments"></i><span class="entry-comments"> <?php comments_number( __('0 Comment', 'academic-education'), __('0 Comments', 'academic-education'), __('% Comments', 'academic-education') ); ?> </span>
</div>
<?php if(has_post_thumbnail()) { ?>
	<hr>
	<div class="feature-box">	
		<img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
	</div>
	<hr>
<?php } 
the_content();

wp_link_pages( array(
	'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'academic-education' ) . '</span>',
	'after'       => '</div>',
	'link_before' => '<span>',
	'link_after'  => '</span>',
	'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'academic-education' ) . ' </span>%',
	'separator'   => '<span class="screen-reader-text">, </span>',
) );
	
if ( is_singular( 'attachment' ) ) {
	// Parent post navigation.
	the_post_navigation( array(
		'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'academic-education' ),
	) );
} elseif ( is_singular( 'post' ) ) {
	// Previous/next post navigation.
	the_post_navigation( array(
		'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next page', 'academic-education' ) . '</span> ' .
			'<span class="screen-reader-text">' . __( 'Next post:', 'academic-education' ) . '</span> ' .
			'<span class="post-title">%title</span>',
		'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous page', 'academic-education' ) . '</span> ' .
			'<span class="screen-reader-text">' . __( 'Previous post:', 'academic-education' ) . '</span> ' .
			'<span class="post-title">%title</span>',
	) );
}

echo '<div class="clearfix"></div>';

the_tags();

if ( comments_open() || get_comments_number() ) {
	comments_template();
}
?>
<?php edit_post_link( __( 'Edit', 'academic-education' ), '<span class="edit-link">', '</span>' ); ?>