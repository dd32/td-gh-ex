<?php
/**
* The front page template
*
*/

$enable_home_page = acool_get_option( 'ct_acool','enable_home_page',0);

if ( 'posts' == get_option( 'show_on_front' ) )
{
	//echo 'index.php';
    get_template_part( 'index' );
}
else
{
	if(  $enable_home_page  )
	{		
		get_template_part( 'front-page-content' ); //front-page-content.php
	}
	else
	{
		//echo 'content-home.php';
     	get_template_part( 'content','home');
	}	
}
