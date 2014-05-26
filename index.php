<?php
/*
 * The template for homepage.
 */
?>

<?php get_header(); ?>
<div id="content-full">

<div class="article">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="post-home<?php if( $wp_query->current_post%2 == 0 ) echo ' left'; ?>">

		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<div class="sticky">
				<h5><?php _e( 'Featured post', 'darkorange' ); ?></h5>
			</div>
		<?php endif; ?>

		<h4 class="post-title">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permalink to %s', 'darkorange'), the_title_attribute('echo=0')); ?>"> <?php the_title(); ?></a> 
		</h4>

		<h5 class="postmetadata">
		<?php printf( __( 'Posted on %s', 'darkorange' ), '<a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_date() ). '</a>' ); ?> | 
		<?php printf( __( 'By %s', 'darkorange' ), sprintf( '<a href="%1$s">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) ) ); ?>
		<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : echo '|'; ?>
		<?php comments_popup_link( __( 'Leave a response', 'darkorange' ), __( '1 response', 'darkorange' ), __( '% responses', 'darkorange' ) ); ?><?php endif; ?>
		</h5>

		<?php if ( has_post_thumbnail() ) { 
			the_post_thumbnail('homepage'); 
		} ?>

		<?php the_excerpt(); ?>
		<div class="more">
			<a class="readmore" href="<?php the_permalink() ?>" rel="bookmark"><?php _e( 'Read More &raquo;', 'darkorange' ); ?></a>
		</div>
		
	</div>

		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.', 'darkorange'); ?></p>
		<?php endif; ?>

	<div class="post-nav">
		<div class="nav-prev"><?php next_posts_link(__( '&laquo; Older posts', 'darkorange' )) ?></div>
		<div class="nav-next"><?php previous_posts_link(__( 'Newer posts &raquo;', 'darkorange' )) ?></div>
	</div>

</div>

</div>
<?php get_footer(); ?>