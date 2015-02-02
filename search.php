<?php
/*
 * The template for displaying search results.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php if ( have_posts() ) : ?>
		<h3 class="page-title"><?php printf( __( 'Search Results for: %s', 'privatebusiness' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
			
	<?php while ( have_posts() ) : the_post(); ?>

		<h3 class="post-title">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permalink to %s', 'privatebusiness'), the_title_attribute('echo=0')); ?>"> <?php the_title(); ?></a> 
		</h3>

		<h5 class="postmetadata">
		<?php printf( __( 'Posted on %s', 'privatebusiness' ), '<a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_date() ). '</a>' ); ?> | 
		<?php printf( __( 'By %s', 'privatebusiness' ), sprintf( '<a href="%1$s">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) ) ); ?>
		<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : echo '|'; ?>
		<?php comments_popup_link( __( 'Leave a response', 'privatebusiness' ), __( '1 response', 'privatebusiness' ), __( '% responses', 'privatebusiness' ) ); ?><?php endif; ?>
		</h5>

		<?php if ( has_post_thumbnail() ) { 
			the_post_thumbnail(); 
		} ?>

		<?php the_excerpt(); ?>

		<div class="more">
			<a class="readmore" href="<?php the_permalink() ?>" rel="bookmark"><?php _e( 'Read More &raquo;', 'privatebusiness' ); ?></a>
		</div>

	<?php endwhile; else: ?>
					
	<h3 class="page-title"><?php _e( 'Nothing Found', 'privatebusiness' ); ?></h3>
	<p><?php _e('Sorry, no posts matched your criteria.', 'privatebusiness'); ?></p>

	<?php get_search_form(); ?>
			
	<?php endif; ?>

	<div class="post-nav">
		<?php next_posts_link(__( '&laquo; Older posts', 'privatebusiness' )); ?>
		<?php previous_posts_link(__( 'Newer posts &raquo;', 'privatebusiness' )); ?>
	</div>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>