<?php if(has_post_thumbnail()) : ?>
	<span class="homecat"><?php the_category(', '); ?></span><div class="thumbnail">
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php if ( has_post_thumbnail() ) {the_post_thumbnail();} else { ?><img src="<?php echo get_template_directory_uri(); ?>/images/thumb.jpg" />
<?php } ?>  </a>
	</div>	<span class="authmt"> <?php promax_post_meta_data(); ?></span>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<div class="entry"><?php promax_excerpt('promax_excerptlength_index', 'promax_excerptmore'); ?>
			</div>
	</article>
<?php else : ?><span class="homecat"><?php the_category(', '); ?></span>
<div class="thumbnail"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php if ( has_post_thumbnail() ) {the_post_thumbnail();} else { ?><img src="<?php echo get_template_directory_uri(); ?>/images/thumb.jpg" />
<?php } ?>  </a>
</div><span class="authmt"> <?php promax_post_meta_data(); ?></span>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			
		<div class="entry">	<?php promax_excerpt('promax_excerptlength_index', 'promax_excerptmore'); ?>
</div>
	</article>
<?php endif; ?>





