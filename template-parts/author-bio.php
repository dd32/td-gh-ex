<?php
	/**
	* Template part for displaying post author bio
	* @package anorya
	*/

?>
 
 
	<div class="post-author" itemprop="author" itemscope itemtype="https://schema.org/Person">
		<?php echo get_avatar(get_the_author_meta('ID'), 95 ,'',get_the_author_meta( 'display_name' ),array('class' => 'img-responsive img-circle',
																											'extra_attr' => 'itemprop="image"',)); ?>
		
		<h4 itemprop="name"><?php echo esc_html(the_author_meta('display_name')); ?></h4>
		<p itemprop="description"><?php echo esc_html(the_author_meta('description')); ?></p>
		<div class="author-social">
			<ul class="social-menu">
				<?php anorya_social_links_list_display(); ?>
			</ul>	
		</div>	
	</div>
