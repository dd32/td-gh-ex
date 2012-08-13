<?php get_header()?>
	<div id="maincontent">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); //The Loop?>
		<div <?php post_class()?>>
			<h1><?php the_title()?></h1>
			
			
<?php the_content()?>
			
			<div class="postfooter">
			<?php the_date()?> <?php wp_link_pages( array( 'before' => __('Pages', 'appliance'), 'after' =>'' ) ); ?><br/>
			<?php _e('Categories','appliance');?>: <?php the_category(', '); ?> <?php if(has_tag()){the_tags( _e('Tags','appliance') . ': ', ', ');}?>
			</div>
			
		
		</div>
		
		
<?php comments_template( '', true ); ?>
		<?php endwhile;endif;?>
	</div>
	
<?php get_footer()?>