<?php get_header(); ?>
<div id = "site-article-full">
<article id = "post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class = "entry-title"><?php _e('Page Not Found', 'whitespektrum'); ?></h1>
	</header>

	<div class="entry-content">
		<p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.','whitespektrum'); ?>
		<?php get_search_form(); ?>
		</p>
	</div>
</div>
</article>
<?php get_sidebar('front'); ?>
<?php wp_footer(); ?>
<?php get_footer(); ?>
