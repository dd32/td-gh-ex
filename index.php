<?php
	get_header(); 
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" tabindex="-1"><?PHP

			get_template_part( 'parts/home/all_posts'); 
		
		?>
		</main>
		<div id="scroll_bottom" <?PHP
			foreach($wp_query->query_vars as $name => $value){
				
				if(is_array($value)){
					$value = implode(",", $value);
				}
				if($value!=""){
					echo ' ' . $name . '="' . $value . '" ';
				}
			}
		?> scroll="on" page="<?PHP echo $wp_query->query_vars['posts_per_page']; ?>"></div>
	</div>
<?php 
	get_footer(); 
?>
