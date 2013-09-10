<?php if(!defined('ABSPATH')) exit; //Exit if accessed directly ?>
<div class="info-box red">
	<h1 class="title">Nothing Found</h1>
    <p>Your search for "<i><?php the_search_query() ?></i>" did not match any entries. Please try again with some different keywords.</p>
</div>
<div class="widget">
	<?php get_search_form(); ?>
</div>