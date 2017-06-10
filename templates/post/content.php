<?php
if( is_single() && get_field( 'hide_featured_image' ) === 'yes' ) {
	return;
}

if ( !is_single() ) {
	echo '<a href="'. esc_url( get_the_permalink() ). '"></a>';
}

ashe_post_thumbnail();