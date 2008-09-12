<?php if(function_exists('register_sidebars')){
register_sidebar(1);
register_sidebar(array('before_widget'=>'<li class="widr">','name'=>'Widgets Page Left') );
register_sidebar(array('before_widget'=>'<li class="widl">','name'=>'Widgets Page Right') );
}
?>
