<?php
/*
|--------------------------
| Header - WP Method
|--------------------------
*/

get_header();

/*
|--------------------------
| Template Parts by Chip Logic
|--------------------------
*/

$left_chip = get_left_chip();
$sidebar_chip = "";

/*
|--------------------------
| Content - Chip Logic
|--------------------------
*/

require_once(TEMPLATE_FSROOT . 'content.php');

/*
|--------------------------
| Footer - WP Method
|--------------------------
*/

get_footer();
?>   