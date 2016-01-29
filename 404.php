<?php

/* 	404 Error Page
	Copyright: 2014-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since NewsPress 1.0
*/

get_header(); ?>
<div id="content-full">
<h1 class="notfound"><?php echo __('404: Not Found','newspress-lite'); ?></h1>

<?php newspress_404();  ?>

</div>

<?php get_footer(); ?>