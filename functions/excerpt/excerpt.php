<?php
//code to change length of Home service section excerpt
	function get_home_blog_excerpt()
	{
		global $post;
		$excerpt = get_the_content();
		$excerpt = strip_tags(preg_replace(" (\[.*?\])",'',$excerpt));
		$excerpt = strip_shortcodes($excerpt);
		$original_len = strlen($excerpt);
		$excerpt = substr($excerpt, 0, 145);
		$len=strlen($excerpt);
		if($original_len>275) {
		$excerpt = $excerpt;
		return $excerpt . '<p><a href="' . get_permalink() . '" class="more-link">'.__('Read More','corpbiz').'</a></p>';
		}
		else
		{ return $excerpt; }
	}
?>