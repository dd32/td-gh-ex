<?php
/*
 * The template for homepage.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<div class="sticky">
				<h4><?php _e( 'Featured post', 'medical' ); ?></h4>
			</div>
		<?php endif; ?>

		<h4 class="post-title">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permalink to %s', 'medical'), the_title_attribute('echo=0')); ?>"> <?php the_title(); ?></a> 
		</h4>

		<div class="postmetadata">
			<?php printf( __( 'Posted on %s', 'medical' ), '<a href="'. esc_url( get_permalink() ) .'">' . esc_html( get_the_date() ). '</a>' ); ?> <?php echo '|'; ?> 
			<?php printf( __( 'By %s', 'medical' ), sprintf( '<a href="%1$s">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) ) ); ?>
			<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
				<?php echo '|'; ?> <?php comments_popup_link( __( 'Leave a response', 'medical' ), __( '1 response', 'medical' ), __( '% responses', 'medical' ) ); ?>
			<?php endif; ?>
		</div>

		<?php if ( has_post_thumbnail() ) { 
			the_post_thumbnail(); 
		} ?>

		<?php the_excerpt(); ?>

		<div class="more">
			<a class="readmore" href="<?php the_permalink() ?>" rel="bookmark"><?php _e( 'Read More &raquo;', 'medical' ); ?></a>
		</div>

	<?php endwhile; ?>

		<div class="post-nav">
			<?php next_posts_link(__( 'Older posts &raquo;', 'medical' )); ?>
			<?php previous_posts_link(__( '&laquo; Newer posts', 'medical' )); ?>
		</div>

		<?php else: ?>
			<h4 class="page-title"><?php _e( 'Nothing Found', 'medical' ); ?></h4>
			<p><?php _e('Sorry, no posts matched your criteria.', 'medical'); ?></p>

	<?php endif; ?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>