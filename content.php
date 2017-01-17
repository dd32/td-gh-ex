<?php 
$corpbiz_options=theme_data_setup(); 
$current_options = wp_parse_args(  get_option( 'corpbiz_options', array() ), $corpbiz_options ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
	<?php if(has_post_thumbnail()): ?>
	<a class="post-thumbnail" href="<?php the_permalink(); ?>">
	<?php $defalt_arg =array('class' => "img-responsive"); ?>
	<?php the_post_thumbnail('', $defalt_arg); ?>					
	<?php endif; ?>
	</a>
	<div class="entry-header">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</div>	
		<?php if($current_options['blog_meta_section_settings']==true) { ?>
		<div class="entry-meta">
			<span class="entry-date">
			<a href="<?php echo get_month_link(get_post_time('Y'),get_post_time('m')); ?>"><?php echo get_the_date('M j, Y'); ?> </a>
			</span>
			<span class="author">
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
			<?php _e('Posted by', 'corpbiz'); ?> <?php the_author(); ?> </a>
			</span>
			<span class="comments-link">
			<a href="<?php comments_link(); ?>"><?php comments_number('No Comments', '1 Comment','% Comments'); ?></a>
			</span>
			<?php 	$tag_list = get_the_tag_list();
					if(!empty($tag_list)) { ?>
			<span class="tag-links">		
			<?php the_tags('', ',', '<br />'); ?>
			</span>
			<?php } ?>						
		</div>
		<?php } ?>
	<div class="entry-content">
		<p>
			<?php 
			  the_content();
			?>
		</p>
	</div>	
</article>