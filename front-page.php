<?php if('posts' == get_option('show_on_front')) :
	get_template_part('home') ;
else : 
	get_template_part('page'); 
endif; ?>