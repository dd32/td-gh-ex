<div id="sidebar">
		
		<?php
			 
					if (is_front_page() && function_exists('dynamic_sidebar') )   {
								dynamic_sidebar('Home Sidebar')	;		   			
					}
					else if(get_post_type() == "giga_game" && !is_search())
					{
							dynamic_sidebar('Single Game')	;
					}
					else
					{
							dynamic_sidebar('General Sidebar');
					}
					?>
</div>