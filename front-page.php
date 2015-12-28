<?php
/**
* The front page template
*
*/

$enable_home_page = of_get_option('enable_home_page');

if ( 'posts' == get_option( 'show_on_front' ) )
{
	//echo 'index.php';
    include( get_home_template() );
}
else
{
	if(  $enable_home_page == "1" )
	{
		get_template_part( 'front-page-content' ); //front-page-content.php
	}
	else
	{
		//echo 'content-home.php';
     	get_template_part( 'content','home');
	}	
}
