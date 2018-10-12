<?php
/**
 * Template part for displaying single post standard format
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package anorya
 */


 
	if(has_post_thumbnail()): ?>
		<div class="full-width-post-img-container">
			<?php  the_post_thumbnail('anorya_xlarge', array('class' => 'img-responsive', 'itemprop'=>'image')); ?>
			<div class="post-date-container">
				<div class="post-date-day"><?php print get_the_date('j',$post->ID);?></div>
				<div class="post-date-month"><?php print get_the_date('F',$post->ID);?></div>
			</div>
		</div>	
		<?php endif; ?>