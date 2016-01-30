<?php
/*
 * The template for homepage.
 */
?>

<?php get_header(); ?>
<div id="main-content-container">
<div id="main-content">
<div id="content-full">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="post-home<?php if( $wp_query->current_post%2 == 0 ) echo ' left'; ?>">

		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<div class="sticky">
				<h4><?php _e( 'Featured post', 'multicolors' ); ?></h4>
			</div>
		<?php endif; ?>

		<h4 class="post-title">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permalink to %s', 'multicolors'), the_title_attribute('echo=0')); ?>"> <?php the_title(); ?></a> 
		</h4>

		<div class="postmetadata">
			<?php printf( __( 'Posted on %s', 'multicolors' ), '<a href="'. esc_url( get_permalink() ) .'">' . esc_html( get_the_date() ). '</a>' ); ?> <?php echo '|'; ?> 
			<?php printf( __( 'By %s', 'multicolors' ), sprintf( '<a href="%1$s">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) ) ); ?>
			<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
				<?php echo '|'; ?> <?php comments_popup_link( __( 'Leave a response', 'multicolors' ), __( '1 response', 'multicolors' ), __( '% responses', 'multicolors' ) ); ?>
			<?php endif; ?>
		</div>

		<?php if ( has_post_thumbnail() ) { 
			the_post_thumbnail(); 
		} ?>

		<?php the_excerpt(); ?>

		<div class="more">
			<a class="readmore" href="<?php the_permalink() ?>" rel="bookmark"><?php _e( 'Read More &raquo;', 'multicolors' ); ?></a>
		</div>
		
	</div>

	<?php endwhile; ?>

		<div class="post-nav">
			<?php next_posts_link(__( 'Older posts &raquo;', 'multicolors' )); ?>
			<?php previous_posts_link(__( '&laquo; Newer posts', 'multicolors' )); ?>
		</div>

		<?php else: ?>
			<h4 class="page-title"><?php _e( 'Nothing Found', 'multicolors' ); ?></h4>
			<p><?php _e('Sorry, no posts matched your criteria.', 'multicolors'); ?></p>

	<?php endif; ?>
				
</div>
</div>
</div>
<?php get_footer(); ?>