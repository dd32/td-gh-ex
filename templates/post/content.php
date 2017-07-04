<?php

if ( ! is_single() ) {
	echo '<a href="'. esc_url( get_the_permalink() ). '"></a>';
}

the_post_thumbnail('ashe-full-thumbnail');

?>