<?php

/*
	Section: Meta
	Authors: Trent Lapinski, Tyler Cunningham 
	Description: Creates post meta content.
	Version: 1.0	
*/

?>

<div class="meta">
	Published by <?php the_author() ?> on <?php the_time('F jS, Y') ?> - in <?php the_category(', ') ?>
</div>