<article id="post-<?php the_ID(); ?>" <?php post_class("home-page"); ?> resource="?<?php the_ID() ; ?>#id" vocab="http://schema.org/" typeof="Blog">
	<header class="entry-header title-holder">
		<p class="entry-title home-align-title">
			<a href="<?PHP echo get_permalink(); ?>" rel="bookmark"><?PHP echo the_title(); ?></a>
		</p>
	</header>	
	<div class="content-holder">
		<div class="entry-content-index home-align">
		<?phps
			$content = get_the_excerpt();
			$excerpt_pos = 20;
			echo substr($content,0,$excerpt_pos) . "...";
		?>
		</div>
	</div>
	<div class="read-more-holder preview_link" target="<?PHP echo the_ID(); ?>">
		<div class="entry-read-more home-align">
			<?PHP echo __("Read more", "antonine"); ?>
		</div>
	</div>
</article>