<?php

	if(has_post_thumbnail()) : 
	if ( get_theme_mod('promax_homecat' ) !=='disable') {
		?>
		<span class="homecat"><?php the_category(', '); ?></span><?php 
		}
	promax_post_image(); 
	do_action('promax_thumbnail_bottom');
		?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<div class="entry"><?php promax_excerpt('promax_excerptlength_index', 'promax_excerptmore'); ?></div></span>
</article>
<?php else : ?><?php if ( get_theme_mod('promax_homecat' )!=='disable') { ?><span class="homecat"><?php the_category(', '); ?></span><?php } ?>
<div class="thumbnail"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php if ( has_post_thumbnail() ) {the_post_thumbnail('promax-defaultthumb');} else { ?><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/thumb.jpg" />
<?php } ?>  </a>
</div>
<?php do_action('promax_thumbnail_bottom'); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h2 class="entry-title">
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
<?php the_title(); ?></a></h2>
<div class="entry"><?php promax_excerpt('promax_excerptlength_index', 'promax_excerptmore'); ?></div></span>
</article>
<?php endif; ?>