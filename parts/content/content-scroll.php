<?PHP
	$post = get_query_var('post');
?>
<article random="hello" id="post-<?php echo $post->ID; ?>" <?php post_class("home-page infinite_scroll"); ?> resource="?<?php echo $post->ID; ?>#id" vocab="http://schema.org/" typeof="Blog">
	<header class="entry-header title-holder">
		<p class="entry-title home-align-title">
			<a href="?p=<?PHP echo $post->ID; ?>" rel="bookmark"><?PHP echo $post->post_title; ?></a>
		</p>
	</header>
	<div class="content-holder">
		<div class="entry-content-index home-align">
			<?php
				$content = strip_tags($post->post_content);
				$words = explode(" ", $content);
				$excerpt = array_slice($words,0,20);
				echo implode(" ", $excerpt);
				echo "...";
			?>
		</div>
	</div><!-- .entry-content -->	
	<div class="read-more-holder preview_link" target="<?PHP echo $post->ID; ?>">
		<div class="entry-read-more home-align">
			<?PHP echo __("Read more", "antonine"); ?>
		</div>
	</div>
</article><!-- #post-## -->