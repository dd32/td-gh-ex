<?php
if ( get_option( 'show_on_front' ) == 'page' ) {
    include( get_page_template() );
}else {
	get_template_part( 'template-parts/template', 'homepage' );
}