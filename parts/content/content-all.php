<article id="post-<?php the_ID(); ?>" <?php post_class("home-page"); ?> resource="?<?php the_ID() ; ?>#id" vocab="http://schema.org/" typeof="Blog">
	<header class="entry-header title-holder">
		<p class="entry-title home-align-title">
			<a href="<?PHP echo get_permalink(); ?>" rel="bookmark"><?PHP echo the_title(); ?></a>
		</p>
	</header>	
	<div class="content-holder">
		<div class="entry-content-index home-align">
		<?php
			/* translators: %s: Name of current post */
			$content = get_the_excerpt();
			$excerpt_pos = strpos($content,"[..---..]");
			if($excerpt_pos===FALSE){
				$excerpt_pos = 100;
			}
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