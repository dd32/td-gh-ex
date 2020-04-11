<?php
/**
 * The template part for displaying single-post
 *
 * @package Advance Blogging
 * @subpackage advance_blogging
 * @since Advance Blogging 1.0
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<article>
	<h1><?php esc_html(the_title()); ?></h1>
	<?php if( get_theme_mod( 'advance_blogging_date_hide',true) != '' || get_theme_mod( 'advance_blogging_comment_hide',true) != '' || get_theme_mod( 'advance_blogging_author_hide',true) != '') { ?>
		<div class="metbox">
			<?php if( get_theme_mod( 'advance_blogging_date_hide',true) != '') { ?>
				<span class="entry-date"><i class="far fa-calendar-alt"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
			<?php } ?>
			<?php if( get_theme_mod( 'advance_blogging_author_hide',true) != '') { ?>
				<span class="entry-author"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php esc_html(the_author()); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
			<?php } ?>

			<?php if( get_theme_mod( 'advance_blogging_comment_hide',true) != '') { ?>
				<span class="entry-comments"><i class="fa fa-comments" aria-hidden="true"></i><?php comments_number( __('0 Comment', 'advance-blogging'), __('0 Comments', 'advance-blogging'), __('% Comments', 'advance-blogging') ); ?> </span>
			<?php } ?>
	    </div><!-- metabox -->
    <?php } ?>
	<?php if(has_post_thumbnail()) { ?>
		<hr>
		<div class="feature-box">	
			<?php the_post_thumbnail(); ?>
		</div>
		<hr>					
	<?php }?> 
		<div class="entry-content"><?php the_content();?></div>
		<div class="tags"><?php the_tags(); ?></div>
	<div class="clearfix"></div>	             
	<?php
	 wp_link_pages( array(
	    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'advance-blogging' ) . '</span>',
	    'after'       => '</div>',
	    'link_before' => '<span>',
	    'link_after'  => '</span>',
	    'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'advance-blogging' ) . ' </span>%',
	    'separator'   => '<span class="screen-reader-text">, </span>',
	) );
	// If comments are open or we have at least one comment, load up the comment template
	if ( comments_open() || '0' != get_comments_number() )
	    comments_template();

	if ( is_singular( 'attachment' ) ) {
		// Parent post navigation.
		the_post_navigation( array(
			'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'advance-blogging' ),
		) );
	} elseif ( is_singular( 'post' ) ) {
		// Previous/next post navigation.
		the_post_navigation( array(
			'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post<i class="fas fa-chevron-right"></i>', 'advance-blogging' ) . '</span> ' .
				'<span class="screen-reader-text">' . __( 'Next post', 'advance-blogging' ) . '</span> ' .
				'',
			'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( '<i class="fas fa-chevron-left"></i>Previous Post', 'advance-blogging' ) . '</span> ' .
				'<span class="screen-reader-text">' . __( 'Previous post', 'advance-blogging' ) . '</span> ' .
				'',
		) );
	}
	?>
</article>

<?php if (get_theme_mod('advance_blogging_related_posts',true) != '') {
	get_template_part( 'template-parts/related-posts' );
}