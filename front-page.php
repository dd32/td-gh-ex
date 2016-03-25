<?php
if('posts' == get_option('show_on_front')){
    include(get_home_template());
}else{
    if(adney_check_plugin_active()){
        get_template_part('home','template');
    }else{
        include(get_page_template());
    }
}
?>