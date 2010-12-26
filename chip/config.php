<?php
/*
|------------------------
| Template Directory
|------------------------
*/	

define('TEMPLATE_FSROOT'	, TEMPLATEPATH . "/");
define('TEMPLATE_WSROOT'	, get_bloginfo('template_directory') . "/");

/*
|------------------------
| Blog Directory
|------------------------
*/

define('BLOG_WSROOT'		, get_bloginfo('url') . "/");

/*
|------------------------
| Chip Directory
|------------------------
*/

define('CHIP_FSROOT'		, TEMPLATE_FSROOT . "chip/");
define('CHIP_WSROOT'		, TEMPLATE_WSROOT . "chip/");

/*
|------------------------
| Chip Gateway
| Dissect logic into relevant files.
|------------------------
*/

require_once(CHIP_FSROOT . 'gateway.php');

/*
|------------------------
| Chip Gateway for User
| Keep user logic safe while upgrading Chip theme.
| Write your constants and other logic in gateway-user.php
|------------------------
*/

if( file_exists( CHIP_FSROOT . 'gateway-user.php' ) ) {
require_once(CHIP_FSROOT . 'gateway-user.php');
}

?>