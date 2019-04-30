<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Best_Charity
 */

?>
<div class="card b-card">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="img-holder">
			<?php best_charity_post_thumbnail(); ?>
		</div>
		<div class="card-body">
			<div class="date">
				<?php
				best_charity_posted_on();
				?>
			</div>
			<h2 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
			<?php the_content();?>
			<div class="card-footer">
				<span class="author"><i class="fa fa-user-o" aria-hidden="true"></i><?php best_charity_posted_by();?></span>
				<span class="cmnt"><i class="fa fa-comment-o" aria-hidden="true"></i><?php echo esc_html( get_comments_number() );?> <?php esc_html_e( 'Comments', 'best-charity' );?></span>
				<span class="tag"><?php echo get_the_tag_list('','/','',get_the_ID());?></span>
			</div>
		</div>
	</article>

	<?php
	wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'best-charity' ),
		'after'  => '</div>',
	) );
	?>
</div>
