
<div id="sidebar">

	<div class="menu">
				
				
		<div id="pagemenu">		
			
		<ul>
				<li><a href="<?php echo get_settings('home'); ?>/">Home</a></li>

				<?php wp_list_pages('sort_column=menu_order&depth=-1&title_li='); ?>
		
		</ul>
	</div>
	
	
	
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) {  } ?>		
	
	

	</div>
		
</div><!-- end sidebar -->
