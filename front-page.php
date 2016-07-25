<?php
/**
* The front page template
*
*/


//$enable_home_page = acool_get_option( 'ct_acool','enable_home_page',0);

if ( 'page' == get_option( 'show_on_front' ) )
{	
	get_template_part( 'front-page-content' ); //front-page-content.php

}else{
	//echo 'index.php';
	get_template_part('index');
} 