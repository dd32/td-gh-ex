<?php
/*
 * The content used by files archive, index and search.
 */
?>

<?php if( is_home() ) { ?>
	<?php if( $wp_query->current_post%2 == 0 ) : ?> 
		<article id="post-<?php the_ID(); ?>" <?php post_class('post-home left'); ?>> 
	<?php else : ?> 
		<article id="post-<?php the_ID(); ?>" <?php post_class('post-home'); ?>>
	<?php endif; ?> 
<?php } else { ?> 
	<article id="post-<?php the_ID(); ?>" <?php post_class('post-not-home'); ?>>
<?php } ?> 
	<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<h4 class="sticky-title"><?php _e( 'Featured post', 'multicolors' ); ?></h4>
	<?php endif; ?>

	<h2 class="post-title entry-title">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permalink to %s', 'multicolors'), the_title_attribute('echo=0')); ?>"> <?php the_title(); ?></a> 
	</h2>

	<?php get_template_part( 'content-postmeta' ); ?>

	<div class="entry-content">
		<?php if ( has_post_thumbnail() ) { 
			the_post_thumbnail(); 
		} ?>
		<?php if ( get_theme_mod( 'multicolors_content_type' ) == "no" ) { ?>
			<?php the_content(); ?> 
		<?php } else { ?>
			<?php the_excerpt(); ?>
		<?php } ?>	
	</div>

	<?php if ( get_theme_mod( 'multicolors_read_more' ) != "no" ) { ?>
		<div class="more">
			<a class="readmore" href="<?php the_permalink() ?>" rel="bookmark"><?php _e( 'Read More &raquo;', 'multicolors' ); ?></a>
		</div>
	<?php } ?>	
</article>
