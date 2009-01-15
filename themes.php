<?php
/*
Template Name: Themes Page Template
*/
?>
<?php get_header(); ?>
<div class="post">

<h3 class="storytitle">GENERAL STATS</h3>
<?php class_exists('GooglePR') ? GooglePR::bar(): ''; ?>
<?php cypher_sitestats(); ?>
<p>&nbsp;</p>
<h3 class="storytitle">USELESS STATS</h3>
<?php echo useless_stats_box (true); ?>
<h3 class="storytitle">POPULAR TAGS</h3>
<?php top_keywords('','<span style="font-size: %count%mm" ><a href="'.get_bloginfo('home').'/search/%keylink%">%keyword%</a>(%count%) | </span>', '<span style="font-size: %count%mm" ><a href="/search/%keylink%">%keyword%</a>(%count%) | </span>', 3); ?>
<p>&nbsp;</p>
<h3 class="storytitle">ADD TO ANY FEED READER</h3>
<? if( function_exists('ADDTOANY_SHARE_SAVE_BUTTON') ) { ADDTOANY_SHARE_SAVE_BUTTON(); } ?>

</div>
</div><!-- end CONTENT -->
<?php get_sidebar(); ?>