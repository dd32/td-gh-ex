<?php

function bs_load_widgets()
{
    //social widget
    require (get_template_directory() . "/inc/widgets/social.php");
    register_widget('BS_Social_Widget');

    //advertisement widget
    require (get_template_directory() . "/inc/widgets/advertisement.php");
    register_widget('BS_Advertisement_Widget');
}


add_action('widgets_init', 'bs_load_widgets');
