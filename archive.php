<?php get_template_part('banner','strip'); ?>
<div class="container">
	<!-- Blog Section Content -->
	<div class="row-fluid">
		<!-- Blog Main -->
		<div class="<?php if( is_active_sidebar('sidebar-primary')) echo "span8"; else echo "span12";?> Blog_main">
			<?php 				
			     while(have_posts()):the_post();
					global $more;
					$more = 0; ?>
			<div class="blog_section2" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php $defalt_arg =array('class' => "blog_section2_img" )?>
					<?php if(has_post_thumbnail()):?>
					<a  href="<?php the_permalink(); ?>" class="pull-left blog_pull_img2">
					<?php the_post_thumbnail('blog2_section_img', $defalt_arg); ?>
					</a>
					<?php endif;?>
					<h2><a href="<?php the_permalink(); ?>"title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h2>
					<div class="blog_section2_comment">
						<a href="<?php the_permalink(); ?>"><i class="fa fa-calendar icon-spacing"></i><?php the_time('M j,Y');?></a>
						<a href="<?php the_permalink(); ?>"><i class="fa fa-comments icon-spacing"></i><?php comments_popup_link( __( 'Leave a comment', 'rambo' ) ); ?></a>
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><i class="fa fa-user icon-spacing"></i> <?php _e("By",'rambo');?>&nbsp;<?php the_author();?></a>
					</div>					
					<p><?php  the_content( __( 'Read More' , 'rambo' ) ); ?></p>
					<?php wp_link_pages( ); ?>						
					<p class="tags_alignment">
					<?php $posttags = get_the_tags(); 
						if ($posttags) { ?>
						<span class="blog_tags"><i class="fa fa-tags"></i><a href="<?php the_permalink(); ?>"><?php the_tags(__('Tags:','rambo'));?></a></span>
					<?php }  ?>
					
					</p>
			</div>
			<?php endwhile; ?>
				<div class="pagination_section">
				<div class="pagination text-center">
				  <ul>
					<li><?php previous_posts_link(); ?></li>
					<li><?php next_posts_link(); ?></li>
				  </ul>
				</div>
			</div>
		</div>
		 <?php get_sidebar();?>
	</div>
</div>
<?php get_footer();?>