<?php
/*
 * The content used by files archive, index and search.
 */
?>

<?php if( is_home() || ( is_archive() && get_theme_mod('gridbulletin_sidebar') == 1 ) ) { ?>
	<?php if( $wp_query->current_post%4 == 0 ) : ?> 
		<article id="post-<?php the_ID(); ?>" <?php post_class('post-four left'); ?>> 
	<?php elseif( $wp_query->current_post%4 == 3 ) : ?> 
		<article id="post-<?php the_ID(); ?>" <?php post_class('post-four right'); ?>>
	<?php else : ?> 
		<article id="post-<?php the_ID(); ?>" <?php post_class('post-four'); ?>> 
	<?php endif; ?> 
<?php } else { ?> 
	<?php if( $wp_query->current_post%3 == 0 ) : ?> 
		<article id="post-<?php the_ID(); ?>" <?php post_class('post-three left'); ?>> 
	<?php elseif( $wp_query->current_post%3 == 2 ) : ?> 
		<article id="post-<?php the_ID(); ?>" <?php post_class('post-three right'); ?>>
	<?php else : ?> 
		<article id="post-<?php the_ID(); ?>" <?php post_class('post-three'); ?>> 
	<?php endif; ?> 
<?php } ?>
	<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<h4 class="sticky-title"><?php _e( 'Featured post', 'gridbulletin' ); ?></h4>
	<?php endif; ?>

	<h2 class="post-title entry-title">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permalink to %s', 'gridbulletin'), the_title_attribute('echo=0')); ?>"> <?php the_title(); ?></a> 
	</h2>

	<?php if ( has_post_thumbnail() ) { 
		the_post_thumbnail('list', array('class' => 'list-image')); 
	} ?>

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div>

	<?php get_template_part( 'content-postmeta' ); ?>
</article>