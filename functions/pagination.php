<?php
/*
 * generator Pagination
*/
function generator_pagination($pages = '', $range = 1)
{
	$generator_showitems = ($range * 2)+1;
	
	global $paged;
	if(empty($paged)) $paged = 1;
	
	if($pages == '')
	{
	global $wp_query;
	$pages = wp_count_posts()->publish;
	if(!$pages)
	{
	$pages = 1;
	}
	}
	
	if(1 != $pages)
	{
	if($paged > 2 && $paged > $range+1 && $generator_showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'><span class='sprite prev-all-icon'> First </span></a></li>";
	if($paged > 1 && $generator_showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'><span class='sprite prev-icon'> Prev </span></a></li>";
	
	for ($i=1; $i <= $pages; $i++)
	{
	if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $generator_showitems ))
	{
	echo ($paged == $i)? "<li><a href='#'>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
	}
	}
	
	if ($paged < $pages && $generator_showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'><span class='sprite next-icon'> Next </span></a></li>";
	if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $generator_showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'> Last <span class='sprite next-all-icon'></span></a></li>";
	}
}