<article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>

<div class="post-thumb">
	<a href="<?php the_permalink();?>">
	<?php if (has_post_thumbnail()) {
		the_post_thumbnail(get_the_ID(), 'medium'); 
	} else {
		$thumb = get_template_directory_uri() .'/img/default.png';

		echo '<img src="'.esc_url("$thumb").'">';
	} ?>
</a>
</div>
	<header class="entry-header">
		<a href="<?php the_permalink();?>">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</a>			

		<?php echo esc_html(adri_post_category()); ?>			
	</header><!-- .entry-header -->
</article>