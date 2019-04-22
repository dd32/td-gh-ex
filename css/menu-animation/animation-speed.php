<?php if( ! defined( 'ABSPATH' ) ) exit; 

add_action('wp_head', 'baw_ads_menu_animation');

function baw_ads_menu_animation() {
  echo '<style>
  
.main-navigation ul li:hover > ul {
	display: block;
	-webkit-animation-duration: '. get_theme_mod('baw_sub_menu_animation_speed'). 's !important;
    animation-duration: '. get_theme_mod('baw_sub_menu_animation_speed'). 's  !important;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
    -webkit-transition: all 0.1s ease-in-out;
    -moz-transition: all 0.1s ease-in-out;
    -o-transition: all 0.1s ease-in-out;
    -ms-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;
	z-index: 99999;
}

</style>';
}
