<?php
/*
 * The template for homepage.
 */
?>

<?php get_header(); ?>
<div id="content-full">

<div class="article-full">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div class="post-home<?php if( $wp_query->current_post%4 == 0 ) echo ' left'; elseif ( $wp_query->current_post%4 == 3 ) echo ' right'; ?>">

		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<div class="sticky">
				<h4><?php _e( 'Featured post', 'gridbulletin' ); ?></h4>
			</div>
		<?php endif; ?>

		<h5 class="entry-title-grid"><a href="<?php the_permalink(); ?>" title="<?php _e('Permalink to ', 'gridbulletin'); ?><?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h5>

		<?php if ( has_post_thumbnail() ) { 
			the_post_thumbnail('homepage'); 
		} ?>

		<?php the_excerpt(); ?>

		<h5 class="postmetadata"><?php _e('Posted on ', 'gridbulletin'); ?><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a> | <?php _e('By ', 'gridbulletin'); ?> 
		<?php the_author_posts_link(); ?> <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : echo '|'; ?>
		<?php comments_popup_link( __( 'Leave a response', 'gridbulletin' ), __( '1 response', 'gridbulletin' ), __( '% responses', 'gridbulletin' ) ); ?><?php endif; ?></h5>

	</div>

		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.', 'gridbulletin'); ?></p>
		<?php endif; ?>

	<div class="post-nav">
		<div class="nav-prev"><?php next_posts_link(__( '&laquo; Older posts', 'gridbulletin' )) ?></div>
		<div class="nav-next"><?php previous_posts_link(__( 'Newer posts &raquo;', 'gridbulletin' )) ?></div>
	</div>

</div>
</div>

<?php get_footer('home'); ?>