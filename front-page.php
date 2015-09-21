<?php
/**
 * The frontpage file.
 * 
 * @package Actuate
 */
?>

<?php 
    
    if(get_option('show_on_front') == 'page'):

        get_template_part('page');

    else :
        
        get_header();
        get_template_part('content', 'blog');        
        get_footer();

    endif;
?>