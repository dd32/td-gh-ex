<?php 
    $pagination = get_the_posts_pagination();
    if(!empty($pagination)){
        
        the_posts_pagination(array(
            'next_text' => esc_html__('Next', 'axiohost'),
            'prev_text' => esc_html__('Prev', 'axiohost'),
            'mid_size' => 3,
            'screen_reader_text' => ' '
        )); 
               
    }