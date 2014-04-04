<?php
/*
 * The template for displaying search results.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php if ( have_posts() ) : ?>
		<h4 class="page-title"><?php printf( __( 'Search Results for: %s', 'shipyard' ), '<span>' . get_search_query() . '</span>' ); ?></h4>
			
			
	<?php while ( have_posts() ) : the_post(); ?>

		<h4 class="post-title">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permalink to %s', 'shipyard'), the_title_attribute('echo=0')); ?>"> <?php the_title(); ?></a> 
		</h4>

		<h5 class="postmetadata">
		<?php printf( __( 'Posted on %s', 'shipyard' ), '<a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_date() ). '</a>' ); ?> | 
		<?php printf( __( 'By %s', 'shipyard' ), sprintf( '<a href="%1$s">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) ) ); ?>
		<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : echo '|'; ?>
		<?php comments_popup_link( __( 'Leave a response', 'shipyard' ), __( '1 response', 'shipyard' ), __( '% responses', 'shipyard' ) ); ?><?php endif; ?></h5>
		</h5>

	<?php if ( has_post_thumbnail() ) { 
		the_post_thumbnail(); 
		} ?>

	<?php the_excerpt(); ?>
	<div class="more">
		<a class="readmore" href="<?php the_permalink() ?>" rel="bookmark"><?php _e( 'Read More &raquo;', 'shipyard' ); ?></a>
	</div>

		<?php endwhile; else: ?>
					
	<h3 class="page-title"><?php _e( 'Nothing Found', 'shipyard' ); ?></h3>
	<p><?php _e('Sorry, no posts matched your criteria.', 'shipyard'); ?></p>
	<?php get_search_form(); ?>
			
	<?php endif; ?>

	<div class="post-nav">
		<div class="nav-prev"><?php next_posts_link(__( '&laquo; Older posts', 'shipyard' )) ?></div>
		<div class="nav-next"><?php previous_posts_link(__( 'Newer posts &raquo;', 'shipyard' )) ?></div>
	</div>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>