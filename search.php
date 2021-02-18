<?php
/*
 * The template for displaying search results.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php if ( have_posts() ) : ?>

		<h4 class="page-title"><?php printf( __( 'Search Results for: %s', 'darkorange' ), get_search_query() ); ?></h4>
					
		<?php while ( have_posts() ) : the_post(); ?>

		<h4 class="post-title">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permalink to %s', 'darkorange'), the_title_attribute('echo=0')); ?>"> <?php the_title(); ?></a> 
		</h4>

		<div class="postmetadata">
			<?php printf( __( 'Posted on %s', 'darkorange' ), '<a href="'. esc_url( get_permalink() ) .'">' . esc_html( get_the_date() ). '</a>' ); ?> <?php echo '|'; ?> 
			<?php printf( __( 'By %s', 'darkorange' ), sprintf( '<a href="%1$s">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) ) ); ?>
			<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
				<?php echo '|'; ?> <?php comments_popup_link( __( 'Leave a response', 'darkorange' ), __( '1 response', 'darkorange' ), __( '% responses', 'darkorange' ) ); ?>
			<?php endif; ?>
		</div>

		<?php if ( has_post_thumbnail() ) { 
			the_post_thumbnail(); 
		} ?>

		<?php the_excerpt(); ?>

		<div class="more">
			<a class="readmore" href="<?php the_permalink() ?>" rel="bookmark"><?php _e( 'Read More &raquo;', 'darkorange' ); ?></a>
		</div>

		<?php endwhile; else: ?>
					
		<h4 class="page-title"><?php _e( 'Nothing Found', 'darkorange' ); ?></h4>
		<p><?php _e('Sorry, no posts matched your criteria.', 'darkorange'); ?></p>

		<?php get_search_form(); ?>
			
	<?php endif; ?>

	<div class="post-nav">
		<?php next_posts_link(__( '&laquo; Older posts', 'darkorange' )); ?>
		<?php previous_posts_link(__( 'Newer posts &raquo;', 'darkorange' )); ?>
	</div>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>