<?php
/*
|------------------------
| Home Page
|------------------------
*/

define('CHIP_LIFE_HOME'		, home_url() . "/");

/*
|------------------------
| Template Directory
|------------------------
*/	

define('CHIP_LIFE_ABSPATH'	, get_template_directory() . "/");
define('CHIP_LIFE_URLPATH'	, get_template_directory_uri() . "/");

/*
|------------------------
| Chip Directory
| FSROOT set to relative in favour of WP locate_template
|------------------------
*/

define('CHIP_LIFE_FSROOT'	, 'chip/');
define('CHIP_LIFE_WSROOT'	, CHIP_LIFE_URLPATH . 'chip/');

/*
|------------------------
| Option Directory
|------------------------
*/

define('CHIP_LIFE_OPTION_FSROOT'	, CHIP_LIFE_FSROOT . 'option/');
define('CHIP_LIFE_OPTION_WSROOT'	, CHIP_LIFE_WSROOT . 'option/');

/*
|------------------------
| Common Directory
|------------------------
*/

define('CHIP_LIFE_COMMON_FSROOT'	, CHIP_LIFE_FSROOT . 'common/');

/*
|------------------------
| Script Directory
|------------------------
*/

define('CHIP_LIFE_SCRIPT_FSROOT'	, CHIP_LIFE_FSROOT . 'script/');
define('CHIP_LIFE_SCRIPT_WSROOT'	, CHIP_LIFE_WSROOT . 'script/');

/*
|------------------------
| Widget Directory
|------------------------
*/

define('CHIP_LIFE_WIDGET_FSROOT'	, CHIP_LIFE_FSROOT . 'widget/');

/*
|------------------------
| Sponsor Directory
|------------------------
*/

define('CHIP_LIFE_SPONSOR_FSROOT'	, CHIP_LIFE_FSROOT . 'sponsor/');

/*
|------------------------
| Image Directory
|------------------------
*/

define('CHIP_LIFE_IMAGES_WSROOT'	, CHIP_LIFE_URLPATH . 'images/');
?>