
<style>
<?php $typography = of_get_option('header_font'); if ($typography) {
echo 'h1, h2, h3, h4, h5, h6, .home .tiptop div b { font-family: ' . $typography['face']. '; font-size:'.$typography['size'] . '; font-style: ' . $typography['style'] . '; color:'.$typography['color'].'; } .home .post .btn a, .archive .post .btn a, .socialcount > li > a, #pitch { font-family: ' . $typography['face']. '; } .circled.avedonicon-chevron-left, .circled.avedonicon-chevron-right {color:'.$typography['color'].';}' ; } ?>
<?php $typography = of_get_option('menu_font'); if ($typography) {
echo '#main-menu, #main-menu a, .brand { font-family: ' . $typography['face']. '; font-size:'.$typography['size'] . '; font-style: ' . $typography['style'] . '; color:'.$typography['color'].'; } #controls-wrapper, .navbar-inverse .brand, .navbar-inverse .nav > li > a {color:'. $typography['color'].'; }  '; } ?>
<?php $color = of_get_option('header_color');
if ($color) { echo '.navbar .navbar-inner, ul.dropdown-menu, #pitch, #foot, #controls-wrapper { background: ' . of_get_option('header_color') . ' ;}' ; } ?>
<?php $color = of_get_option('middle_color');
if ($color) { echo '#mid, .dropdown-menu > li > a:hover, .archive .tiptop, .dropdown-menu > li > a:focus, .dropdown-submenu:hover > a, .dropdown-submenu:focus > a, .carousel-caption, .carousel-indicators li.active { background: ' . of_get_option('middle_color') . ' ;}' ; } ?>
<?php $color = of_get_option('middle_text_color');
if ($color) { echo '#mid { color: ' . of_get_option('middle_text_color') . ' ;}' ; } ?>
<?php $color = of_get_option('bottom_color');
if ($color) { echo '#bottom, .dropdown-menu > li > a:hover, .archive .tiptop, .dropdown-menu > li > a:focus, .dropdown-submenu:hover > a, .dropdown-submenu:focus > a { background: ' . of_get_option('bottom_color') . ' ;}' ; } ?>
<?php $color = of_get_option('bottom_text_color');
if ($color) { echo '#bottom { color: ' . of_get_option('bottom_text_color') . ' ;}' ; } ?>
<?php $color = of_get_option('link_color');
if ($color) { echo 'a { color: ' . of_get_option('link_color') . ' ;}' ; } ?>
<?php $color = of_get_option('button_text_color');
if ($color) { echo '.navbar .btn-navbar, .socialcount > li, .btn, .btn a, .socialbox a, .pager li a { color: ' . of_get_option('button_text_color') . ' ;} .socialbox a:hover { background: ' . of_get_option('button_text_color') . ' ;}' ; } ?>
<?php $color = of_get_option('footer_text_color');
if ($color) { echo '#foot, #foot a, #foot ul li a { color: ' . of_get_option('footer_text_color') . ' ;}' ; } ?>
</style>
