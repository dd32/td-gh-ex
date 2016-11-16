<?php
	get_header(); 
	global $wp_query;
?>	
	<div id="primary" class="content-area">
		<div class="paginationNumbers">
			<p><?PHP echo __("Choose from the list", 'antonine'); ?></p>
			<?PHP
				the_posts_pagination( array(
					'mid_size' => 2,
					'prev_text' => __( 'Previous', 'antonine' ),
					'next_text' => __( 'Next', 'antonine' ),
				) );
			?>
			<p><?PHP echo __("Or Scroll down for more", 'antonine'); ?></p>
		</div>
		<main id="main" class="site-main"><?PHP

			while ( have_posts() ) : the_post();

				get_template_part( 'parts/content/content-all', get_post_format() );

			endwhile;
	
		?></main>
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
