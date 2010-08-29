<?php
load_theme_textdomain('rcg-forest');

if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));

//Custom image header
define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE_WIDTH', 774);
define('HEADER_IMAGE', '%s/images/forest.png');
define('HEADER_IMAGE_HEIGHT', 120);
define('NO_HEADER_TEXT', true);

function header_style() {
?>
<style type="text/css">
#header {
  background: url(<?php header_image() ?>) no-repeat;
  height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
  width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
  border: #fff solid;
}
</style>
<?php
}

function rcg_admin_header_style() {
?>
<style type="text/css">
#headimg {
  background: url(<?php header_image() ?>) no-repeat;
  height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
  width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
  border: #fff solid;
}

#headimg * {
  display:none;
}
</style>
<?php
}

add_custom_image_header('header_style', 'rcg_admin_header_style');

?>
