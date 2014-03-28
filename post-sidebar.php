<?php 
/**
 * @package Apprise
 *
 * Short Info Sidebar */ ?> 

<div class="post-sidebar">
	<div class="short-info">
		<div class="single-meta">	
			<?php if (of_get_option('post_info') == 'sidebar') { ?>
				<div class="widget widget_post_info">
					<div class="widget-title clearfix">
						<h4>
							<span><?php echo of_get_option('post_info_header'); ?></span>
						</h4>
					</div>
					<br>
					<?php if(has_post_format('image')) {?>
						<span><i class="fa fa-camera"></i><a href="<?php printf(esc_url( get_post_format_link( 'image' ))); ?>"><?php printf( __('Image','apprise')); ?></a></span>
					<?php } elseif(has_post_format('gallery')) {?>
						<span><i class="fa fa-picture-o"></i><a href="<?php printf(esc_url( get_post_format_link( 'gallery' ))); ?>"><?php printf( __('Gallery','apprise')); ?></a></span>
					<?php } elseif(has_post_format('video')) {?>
						<span><i class="fa fa-video-camera"></i><a href="<?php printf(esc_url( get_post_format_link( 'video' ))); ?>"><?php printf( __('Video','apprise')); ?></a></span>
					<?php } elseif(has_post_format('quote')) {?>
						<span><i class="fa fa-quote-left"></i><a href="<?php printf(esc_url( get_post_format_link( 'quote' ))); ?>"><?php printf( __('Quote','apprise')); ?></a></span>
					<?php } elseif(has_post_format('link')) {?>
						<span><i class="fa fa-chain-broken"></i><a href="<?php printf(esc_url( get_post_format_link( 'link' ))); ?>"><?php printf( __('Link','apprise')); ?></a></span>
					<?php } elseif(has_post_format('aside')) {?>
						<span><i class="fa fa-file-text"></i><a href="<?php printf(esc_url( get_post_format_link( 'aside' ))); ?>"><?php printf( __('Aside','apprise')); ?></a></span>
					<?php } elseif(has_post_format('audio')) {?>
						<span><i class="fa fa-music"></i><a href="<?php printf(esc_url( get_post_format_link( 'audio' ))); ?>"><?php printf( __('Audio','apprise')); ?></a></span>
					<?php } else {?>
						<span><i class="fa fa-thumb-tack"></i><?php printf( __('Standard','apprise')); ?></span>
					<?php } ?>
					<span><i class="fa fa-user"></i>by <?php printf(esc_url(the_author_posts_link())); ?> </span>
					<span><i class="fa fa-calendar"></i><?php printf(esc_attr(human_time_diff( get_the_time('U'), current_time('timestamp') ) . __(' ago','apprise'))); ?> </span>
					<span><i class="fa fa-comment-o"></i><?php comments_number( __('No Comments','apprise'), __('1 Comment','apprise'), __('% Comments','apprise')); ?></span>
					<span><i class="fa fa-folder-open"></i><?php the_category(', '); ?></span>
					<span class="tags-list"><?php the_tags(' ', ' ', '<br />'); ?></span>	
			</div>
		<?php }
		dynamic_sidebar('secondary-sidebar'); ?>
		</div><!--single-meta-->
	</div><!--short-info-->
</div><!--post-sidebar-->